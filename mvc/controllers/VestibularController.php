<?php
require_once __DIR__ . '/../models/Vestibular.php';

class VestibularController {
    private $vestibular;

    public function __construct() {
        $this->vestibular = new Vestibular();
    }


    public function listarTodos() {
        header('Content-Type: application/json');
        $vestibulares = $this->vestibular->listarTodos();
        echo json_encode(['success' => true, 'data' => $vestibulares]);
    }

    public function listarProximos() {
        header('Content-Type: application/json');
        $vestibulares = $this->vestibular->listarProximos();
        echo json_encode(['success' => true, 'data' => $vestibulares]);
    }

    public function listarPorStatus($status) {
        header('Content-Type: application/json');
        $vestibulares = $this->vestibular->listarPorStatus($status);
        echo json_encode(['success' => true, 'data' => $vestibulares]);
    }

    public function buscarPorInstituicao($instituicao) {
        header('Content-Type: application/json');
        $vestibulares = $this->vestibular->buscarPorInstituicao($instituicao);
        echo json_encode(['success' => true, 'data' => $vestibulares]);
    }

    public function buscarPorId($id) {
        header('Content-Type: application/json');
        $vestibular = $this->vestibular->buscarPorId($id);
        if ($vestibular) {
            echo json_encode(['success' => true, 'data' => $vestibular]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Vestibular não encontrado.']);
        }
    }

    public function listarInstituicoes() {
        header('Content-Type: application/json');
        $instituicoes = $this->vestibular->listarInstituicoes();
        echo json_encode(['success' => true, 'data' => $instituicoes]);
    }

    public function criar() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim($_POST['nome'] ?? '');
            $instituicao = trim($_POST['instituicao'] ?? '');
            $data_prova = trim($_POST['data_prova'] ?? '');
            $data_inscricao_inicio = trim($_POST['data_inscricao_inicio'] ?? '');
            $data_inscricao_fim = trim($_POST['data_inscricao_fim'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $link_inscricao = trim($_POST['link_inscricao'] ?? '');
            $status = trim($_POST['status'] ?? 'em espera');

            // Validações
            if (empty($nome) || empty($instituicao) || empty($data_prova)) {
                $response['message'] = "Por favor, preencha todos os campos obrigatórios.";
            } elseif (!in_array($status, ['aberto', 'fechado', 'em espera'])) {
                $response['message'] = "Status inválido.";
            } else {
                $this->vestibular->nome = $nome;
                $this->vestibular->instituicao = $instituicao;
                $this->vestibular->data_prova = $data_prova;
                $this->vestibular->data_inscricao_inicio = $data_inscricao_inicio;
                $this->vestibular->data_inscricao_fim = $data_inscricao_fim;
                $this->vestibular->descricao = $descricao;
                $this->vestibular->link_inscricao = $link_inscricao;
                $this->vestibular->status = $status;

                if ($this->vestibular->criar()) {
                    $response['success'] = true;
                    $response['message'] = "Vestibular criado com sucesso!";
                } else {
                    $response['message'] = "Erro ao criar vestibular.";
                }
            }
        } else {
            $response['message'] = "Requisição inválida.";
        }

        echo json_encode($response);
    }

    public function atualizar() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = trim($_POST['id'] ?? '');
            $nome = trim($_POST['nome'] ?? '');
            $instituicao = trim($_POST['instituicao'] ?? '');
            $data_prova = trim($_POST['data_prova'] ?? '');
            $data_inscricao_inicio = trim($_POST['data_inscricao_inicio'] ?? '');
            $data_inscricao_fim = trim($_POST['data_inscricao_fim'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $link_inscricao = trim($_POST['link_inscricao'] ?? '');
            $status = trim($_POST['status'] ?? 'em espera');

            // Validações
            if (empty($id) || empty($nome) || empty($instituicao) || empty($data_prova)) {
                $response['message'] = "Por favor, preencha todos os campos obrigatórios.";
            } elseif (!in_array($status, ['aberto', 'fechado', 'em espera'])) {
                $response['message'] = "Status inválido.";
            } else {
                $this->vestibular->id = $id;
                $this->vestibular->nome = $nome;
                $this->vestibular->instituicao = $instituicao;
                $this->vestibular->data_prova = $data_prova;
                $this->vestibular->data_inscricao_inicio = $data_inscricao_inicio;
                $this->vestibular->data_inscricao_fim = $data_inscricao_fim;
                $this->vestibular->descricao = $descricao;
                $this->vestibular->link_inscricao = $link_inscricao;
                $this->vestibular->status = $status;

                if ($this->vestibular->atualizar()) {
                    $response['success'] = true;
                    $response['message'] = "Vestibular atualizado com sucesso!";
                } else {
                    $response['message'] = "Erro ao atualizar vestibular.";
                }
            }
        } else {
            $response['message'] = "Requisição inválida.";
        }

        echo json_encode($response);
    }

    public function deletar($id) {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($this->vestibular->deletar($id)) {
            $response['success'] = true;
            $response['message'] = "Vestibular deletado com sucesso!";
        } else {
            $response['message'] = "Erro ao deletar vestibular.";
        }

        echo json_encode($response);
    }

    public function atualizarStatusAutomatico() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($this->vestibular->atualizarStatusAutomatico()) {
            $response['success'] = true;
            $response['message'] = "Status dos vestibulares atualizado automaticamente!";
        } else {
            $response['message'] = "Erro ao atualizar status dos vestibulares.";
        }

        echo json_encode($response);
    }

    public function index() {
        $vestibulares = $this->vestibular->listarTodos();
        $instituicoes = $this->vestibular->listarInstituicoes();
        
        $page_title = 'Vestibulares';
        $page_css = 'vestibulares';
        
        include __DIR__ . '/../views/vestibulares/index.php';
    }


    public function detalhes($id) {
        $vestibular = $this->vestibular->buscarPorId($id);
        
        if ($vestibular) {
            $page_title = $vestibular['nome'];
            $page_css = 'vestibulares';
            
            include __DIR__ . '/../views/vestibulares/detalhes.php';
        } else {
            // Redireciona para 404 se o vestibular não existir
            header('Location: /erro404');
            exit;
        }
    }

    public function calendario() {
        $vestibulares = $this->vestibular->listarTodos();
        
        $page_title = 'Calendário de Vestibulares';
        $page_css = 'vestibulares';
        
        include __DIR__ . '/../views/vestibulares/calendario.php';
    }
}
?> 