<?php

class HomeController {
    // private $faculdade;
    // private $vestibular;
    // private $curso;

    public function __construct() {
        // $this->faculdade = new Faculdade();
        // $this->vestibular = new Vestibular();
        // $this->curso = new Curso();
    }

    /**
     * Exibe a página inicial
     */
    public function index() {
        // Inclui a view da página inicial (que agora usa o layout)
        include __DIR__ . '/../views/home/index.php';
    }

    /**
     * Busca dados para o dashboard
     * @return array Retorna resposta JSON com dados do dashboard
     */
    public function dashboard() {
        header('Content-Type: application/json');
        
        try {
            // Dados mock para teste
            $faculdades_destaque = [
                [
                    'id' => 1,
                    'nome' => 'USP',
                    'cidade' => 'São Paulo',
                    'estado' => 'SP',
                    'imagem' => '/SuaFacul/imagens/usp.jpg'
                ],
                [
                    'id' => 2,
                    'nome' => 'Unicamp',
                    'cidade' => 'Campinas',
                    'estado' => 'SP',
                    'imagem' => '/SuaFacul/imagens/unicamp.jpg'
                ]
            ];
            
            $vestibulares_proximos = [
                [
                    'id' => 1,
                    'nome' => 'FUVEST 2024',
                    'data_prova' => '2024-12-10',
                    'instituicao' => 'USP'
                ]
            ];
            
            $cursos_populares = [
                [
                    'id' => 1,
                    'nome' => 'Medicina',
                    'area' => 'Ciências da Saúde'
                ],
                [
                    'id' => 2,
                    'nome' => 'Direito',
                    'area' => 'Ciências Humanas'
                ]
            ];

            $dashboard_data = [
                'faculdades_destaque' => $faculdades_destaque,
                'vestibulares_proximos' => $vestibulares_proximos,
                'cursos_populares' => $cursos_populares
            ];

            echo json_encode(['success' => true, 'data' => $dashboard_data]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Erro ao carregar dados do dashboard.']);
        }
    }

    /**
     * Busca dados para a pesquisa na página inicial
     * @return array Retorna resposta JSON com resultados da pesquisa
     */
    public function pesquisar() {
        header('Content-Type: application/json');
        
        $curso = trim($_GET['curso'] ?? '');
        $faculdade = trim($_GET['faculdade'] ?? '');
        $cidade = trim($_GET['cidade'] ?? '');
        $tipo_modalidade = trim($_GET['tipo_modalidade'] ?? '');
        $tipo_instituicao = trim($_GET['tipo_instituicao'] ?? '');

        $resultados = [];

        // Dados mock para teste
        $cursos_mock = [
            ['id' => 1, 'nome' => 'Medicina', 'area' => 'Ciências da Saúde'],
            ['id' => 2, 'nome' => 'Direito', 'area' => 'Ciências Humanas'],
            ['id' => 3, 'nome' => 'Engenharia Civil', 'area' => 'Ciências Exatas']
        ];
        
        $faculdades_mock = [
            ['id' => 1, 'nome' => 'USP', 'cidade' => 'São Paulo', 'estado' => 'SP', 'tipo' => 'publica'],
            ['id' => 2, 'nome' => 'Unicamp', 'cidade' => 'Campinas', 'estado' => 'SP', 'tipo' => 'publica'],
            ['id' => 3, 'nome' => 'Unifesp', 'cidade' => 'São Paulo', 'estado' => 'SP', 'tipo' => 'publica']
        ];

        // Busca cursos se especificado
        if (!empty($curso)) {
            $resultados['cursos'] = array_filter($cursos_mock, function($c) use ($curso) {
                return stripos($c['nome'], $curso) !== false;
            });
        }

        // Busca faculdades se especificado
        if (!empty($faculdade) || !empty($cidade) || !empty($tipo_instituicao)) {
            $faculdades = $faculdades_mock;
            
            // Aplica filtros
            if (!empty($faculdade)) {
                $faculdades = array_filter($faculdades, function($f) use ($faculdade) {
                    return stripos($f['nome'], $faculdade) !== false;
                });
            }
            
            if (!empty($cidade)) {
                $faculdades = array_filter($faculdades, function($f) use ($cidade) {
                    return stripos($f['cidade'], $cidade) !== false;
                });
            }
            
            if (!empty($tipo_instituicao)) {
                $faculdades = array_filter($faculdades, function($f) use ($tipo_instituicao) {
                    return $f['tipo'] === $tipo_instituicao;
                });
            }
            
            $resultados['faculdades'] = array_values($faculdades);
        }

        echo json_encode(['success' => true, 'data' => $resultados]);
    }

    /**
     * Exibe a página de sobre nós
     */
    public function sobreNos() {
        include __DIR__ . '/../views/home/sobre-nos.php';
    }

    /**
     * Exibe a página de ajuda
     */
    public function ajuda() {
        include __DIR__ . '/../views/home/ajuda.php';
    }

    /**
     * Exibe a página de contato
     */
    public function contato() {
        include __DIR__ . '/../views/home/contato.php';
    }

    /**
     * Processa formulário de contato
     * @return array Retorna resposta JSON com status do envio
     */
    public function enviarContato() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $assunto = trim($_POST['assunto'] ?? '');
            $mensagem = trim($_POST['mensagem'] ?? '');

            // Validações
            if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
                $response['message'] = "Por favor, preencha todos os campos.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response['message'] = "Email inválido.";
            } else {
                $response['success'] = true;
                $response['message'] = "Mensagem enviada com sucesso! Entraremos em contato em breve.";
            }
        } else {
            $response['message'] = "Requisição inválida.";
        }

        echo json_encode($response);
    }

    /**
     * Exibe página de erro 404
     */
    public function erro404() {
        http_response_code(404);
        include __DIR__ . '/../views/errors/404.php';
    }

    /**
     * Exibe página de erro 500
     */
    public function erro500() {
        http_response_code(500);
        include __DIR__ . '/../views/errors/500.php';
    }
}
?> 