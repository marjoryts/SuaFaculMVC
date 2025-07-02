<?php

class HomeController {

    public function __construct() {
    }

    public function index() {
        include __DIR__ . '/../views/home/index.php';
    }

    public function dashboard() {
        header('Content-Type: application/json');
        
        try {
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

    public function pesquisar() {
        header('Content-Type: application/json');
        
        $curso = trim($_GET['curso'] ?? '');
        $faculdade = trim($_GET['faculdade'] ?? '');
        $cidade = trim($_GET['cidade'] ?? '');
        $tipo_modalidade = trim($_GET['tipo_modalidade'] ?? '');
        $tipo_instituicao = trim($_GET['tipo_instituicao'] ?? '');

        $resultados = [];

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


        if (!empty($curso)) {
            $resultados['cursos'] = array_filter($cursos_mock, function($c) use ($curso) {
                return stripos($c['nome'], $curso) !== false;
            });
        }


        if (!empty($faculdade) || !empty($cidade) || !empty($tipo_instituicao)) {
            $faculdades = $faculdades_mock;
            
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

    public function sobreNos() {
        include __DIR__ . '/../views/home/sobre-nos.php';
    }

    public function ajuda() {
        include __DIR__ . '/../views/home/ajuda.php';
    }

    public function contato() {
        include __DIR__ . '/../views/home/contato.php';
    }

    public function enviarContato() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $assunto = trim($_POST['assunto'] ?? '');
            $mensagem = trim($_POST['mensagem'] ?? '');

            
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

    public function erro404() {
        http_response_code(404);
        include __DIR__ . '/../views/errors/404.php';
    }

    public function erro500() {
        http_response_code(500);
        include __DIR__ . '/../views/errors/500.php';
    }
}
?> 