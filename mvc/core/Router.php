<?php
class Router {
    private $routes = [];

    
    public function get($path, $controller, $method) {
        $this->routes['GET'][$path] = ['controller' => $controller, 'method' => $method];
    }

    
    public function post($path, $controller, $method) {
        $this->routes['POST'][$path] = ['controller' => $controller, 'method' => $method];
    }

    
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        
        $base_path = dirname($_SERVER['SCRIPT_NAME']);
        if ($base_path !== '/') {
            $uri = str_replace($base_path, '', $uri);
        }
        
        
        $uri = str_replace('/SuaFacul', '', $uri);
        
        
        $uri = rtrim($uri, '/');
        if (empty($uri)) {
            $uri = '/';
        }

        
        error_log("URI sendo processada: " . $uri);
        
        
        $uri = strtok($uri, '?');

        
        if (isset($this->routes[$method][$uri])) {
            $route = $this->routes[$method][$uri];
            $controller_name = $route['controller'];
            $method_name = $route['method'];

            require_once __DIR__ . "/../controllers/{$controller_name}.php";
            
            $controller = new $controller_name();
            $controller->$method_name();
        } else {
            
            $this->handle404();
        }
    }

    private function handle404() {
        require_once __DIR__ . '/../controllers/HomeController.php';
        $controller = new HomeController();
        $controller->erro404();
    }


    public function setupRoutes() {
        $this->get('/', 'HomeController', 'index');
        $this->get('/dashboard', 'HomeController', 'dashboard');
        $this->get('/pesquisar', 'HomeController', 'pesquisar');
        $this->get('/sobre-nos', 'HomeController', 'sobreNos');
        $this->get('/ajuda', 'HomeController', 'ajuda');
        $this->get('/contato', 'HomeController', 'contato');
        $this->post('/contato/enviar', 'HomeController', 'enviarContato');

        $this->get('/login', 'AuthController', 'login');
        $this->get('/register', 'AuthController', 'register');
        $this->get('/logout', 'AuthController', 'logout');
        $this->get('/recuperar-senha', 'AuthController', 'recuperarSenha');
        $this->post('/recuperar-senha/processar', 'AuthController', 'processarRecuperacao');

        $this->post('/usuario/login', 'UsuarioController', 'login');
        $this->post('/usuario/registrar', 'UsuarioController', 'registrar');
        $this->post('/usuario/logout', 'UsuarioController', 'logout');
        $this->get('/usuario/perfil', 'UsuarioController', 'perfil');
        $this->get('/usuario/perfil-pagina', 'UsuarioController', 'exibirPerfil');
        $this->get('/usuario/listar', 'UsuarioController', 'listarTodos');
        $this->get('/usuario/buscar/{id}', 'UsuarioController', 'buscarPorId');
        $this->post('/usuario/atualizar', 'UsuarioController', 'atualizar');
        $this->post('/usuario/deletar/{id}', 'UsuarioController', 'deletar');

        $this->get('/faculdades', 'FaculdadeController', 'listarTodas');
        $this->get('/faculdades/destaque', 'FaculdadeController', 'listarDestaque');
        $this->get('/faculdades/cidade/{cidade}', 'FaculdadeController', 'buscarPorCidade');
        $this->get('/faculdades/tipo/{tipo}', 'FaculdadeController', 'buscarPorTipo');
        $this->get('/faculdades/buscar/{id}', 'FaculdadeController', 'buscarPorId');
        $this->get('/faculdades/filtros', 'FaculdadeController', 'buscarComFiltros');
        $this->post('/faculdades/criar', 'FaculdadeController', 'criar');
        $this->post('/faculdades/atualizar', 'FaculdadeController', 'atualizar');
        $this->post('/faculdades/deletar/{id}', 'FaculdadeController', 'deletar');

        $this->get('/cursos', 'CursoController', 'listarTodos');
        $this->get('/cursos/buscar/{nome}', 'CursoController', 'buscarPorNome');
        $this->get('/cursos/area/{area}', 'CursoController', 'buscarPorArea');
        $this->get('/cursos/tipo/{tipo}', 'CursoController', 'buscarPorTipo');
        $this->get('/cursos/buscar/{id}', 'CursoController', 'buscarPorId');
        $this->get('/cursos/areas', 'CursoController', 'listarAreas');
        $this->post('/cursos/criar', 'CursoController', 'criar');
        $this->post('/cursos/atualizar', 'CursoController', 'atualizar');
        $this->post('/cursos/deletar/{id}', 'CursoController', 'deletar');

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