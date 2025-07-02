<?php
/**
 * Roteador Principal
 * Responsável por gerenciar todas as rotas da aplicação
 */
class Router {
    private $routes = [];

    /**
     * Adiciona uma rota GET
     * @param string $path Caminho da rota
     * @param string $controller Controlador
     * @param string $method Método do controlador
     */
    public function get($path, $controller, $method) {
        $this->routes['GET'][$path] = ['controller' => $controller, 'method' => $method];
    }

    /**
     * Adiciona uma rota POST
     * @param string $path Caminho da rota
     * @param string $controller Controlador
     * @param string $method Método do controlador
     */
    public function post($path, $controller, $method) {
        $this->routes['POST'][$path] = ['controller' => $controller, 'method' => $method];
    }

    /**
     * Processa a requisição atual
     */
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Remove o diretório base da URI se necessário
        $base_path = dirname($_SERVER['SCRIPT_NAME']);
        if ($base_path !== '/') {
            $uri = str_replace($base_path, '', $uri);
        }
        
        // Remove o prefixo /SuaFacul se existir
        $uri = str_replace('/SuaFacul', '', $uri);
        
        // Remove trailing slash
        $uri = rtrim($uri, '/');
        if (empty($uri)) {
            $uri = '/';
        }

        // Debug: mostra a URI que está sendo processada
        error_log("URI sendo processada: " . $uri);
        
        // Se a URI contém parâmetros de query string, remove-os
        $uri = strtok($uri, '?');

        // Verifica se a rota existe
        if (isset($this->routes[$method][$uri])) {
            $route = $this->routes[$method][$uri];
            $controller_name = $route['controller'];
            $method_name = $route['method'];

            // Carrega o controlador
            require_once __DIR__ . "/../controllers/{$controller_name}.php";
            
            // Instancia o controlador e chama o método
            $controller = new $controller_name();
            $controller->$method_name();
        } else {
            // Rota não encontrada - redireciona para 404
            $this->handle404();
        }
    }

    /**
     * Trata rotas não encontradas
     */
    private function handle404() {
        require_once __DIR__ . '/../controllers/HomeController.php';
        $controller = new HomeController();
        $controller->erro404();
    }

    /**
     * Configura as rotas padrão da aplicação
     */
    public function setupRoutes() {
        // Rotas da página inicial
        $this->get('/', 'HomeController', 'index');
        $this->get('/dashboard', 'HomeController', 'dashboard');
        $this->get('/pesquisar', 'HomeController', 'pesquisar');
        $this->get('/sobre-nos', 'HomeController', 'sobreNos');
        $this->get('/ajuda', 'HomeController', 'ajuda');
        $this->get('/contato', 'HomeController', 'contato');
        $this->post('/contato/enviar', 'HomeController', 'enviarContato');

        // Rotas de autenticação
        $this->get('/login', 'AuthController', 'login');
        $this->get('/register', 'AuthController', 'register');
        $this->get('/logout', 'AuthController', 'logout');
        $this->get('/recuperar-senha', 'AuthController', 'recuperarSenha');
        $this->post('/recuperar-senha/processar', 'AuthController', 'processarRecuperacao');

        // Rotas de usuários
        $this->post('/usuario/login', 'UsuarioController', 'login');
        $this->post('/usuario/registrar', 'UsuarioController', 'registrar');
        $this->post('/usuario/logout', 'UsuarioController', 'logout');
        $this->get('/usuario/perfil', 'UsuarioController', 'perfil');
        $this->get('/usuario/perfil-pagina', 'UsuarioController', 'exibirPerfil');
        $this->get('/usuario/listar', 'UsuarioController', 'listarTodos');
        $this->get('/usuario/buscar/{id}', 'UsuarioController', 'buscarPorId');
        $this->post('/usuario/atualizar', 'UsuarioController', 'atualizar');
        $this->post('/usuario/deletar/{id}', 'UsuarioController', 'deletar');

        // Rotas de faculdades
        $this->get('/faculdades', 'FaculdadeController', 'listarTodas');
        $this->get('/faculdades/destaque', 'FaculdadeController', 'listarDestaque');
        $this->get('/faculdades/cidade/{cidade}', 'FaculdadeController', 'buscarPorCidade');
        $this->get('/faculdades/tipo/{tipo}', 'FaculdadeController', 'buscarPorTipo');
        $this->get('/faculdades/buscar/{id}', 'FaculdadeController', 'buscarPorId');
        $this->get('/faculdades/filtros', 'FaculdadeController', 'buscarComFiltros');
        $this->post('/faculdades/criar', 'FaculdadeController', 'criar');
        $this->post('/faculdades/atualizar', 'FaculdadeController', 'atualizar');
        $this->post('/faculdades/deletar/{id}', 'FaculdadeController', 'deletar');

        // Rotas de cursos
        $this->get('/cursos', 'CursoController', 'listarTodos');
        $this->get('/cursos/buscar/{nome}', 'CursoController', 'buscarPorNome');
        $this->get('/cursos/area/{area}', 'CursoController', 'buscarPorArea');
        $this->get('/cursos/tipo/{tipo}', 'CursoController', 'buscarPorTipo');
        $this->get('/cursos/buscar/{id}', 'CursoController', 'buscarPorId');
        $this->get('/cursos/areas', 'CursoController', 'listarAreas');
        $this->post('/cursos/criar', 'CursoController', 'criar');
        $this->post('/cursos/atualizar', 'CursoController', 'atualizar');
        $this->post('/cursos/deletar/{id}', 'CursoController', 'deletar');

        // Rotas de vestibulares
        $this->get('/vestibulares', 'VestibularController', 'listarTodos');
        $this->get('/vestibulares/proximos', 'VestibularController', 'listarProximos');
        $this->get('/vestibulares/status/{status}', 'VestibularController', 'listarPorStatus');
        $this->get('/vestibulares/instituicao/{instituicao}', 'VestibularController', 'buscarPorInstituicao');
        $this->get('/vestibulares/buscar/{id}', 'VestibularController', 'buscarPorId');
        $this->get('/vestibulares/instituicoes', 'VestibularController', 'listarInstituicoes');
        $this->post('/vestibulares/criar', 'VestibularController', 'criar');
        $this->post('/vestibulares/atualizar', 'VestibularController', 'atualizar');
        $this->post('/vestibulares/deletar/{id}', 'VestibularController', 'deletar');
        $this->post('/vestibulares/atualizar-status', 'VestibularController', 'atualizarStatusAutomatico');
    }
}
?> 