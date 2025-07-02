<?php
require_once __DIR__ . '/../models/Faculdade.php';

class FaculdadeController {
    private $faculdade;

    public function __construct() {
        $this->faculdade = new Faculdade();
    }

    public function listarTodas() {
        header('Content-Type: application/json');
        $faculdades = $this->faculdade->listarTodas();
        echo json_encode(['success' => true, 'data' => $faculdades]);
    }

    public function listarDestaque() {
        header('Content-Type: application/json');
        $faculdades = $this->faculdade->listarDestaque();
        echo json_encode(['success' => true, 'data' => $faculdades]);
    }

    public function buscarPorCidade($cidade) {
        header('Content-Type: application/json');
        $faculdades = $this->faculdade->buscarPorCidade($cidade);
        echo json_encode(['success' => true, 'data' => $faculdades]);
    }

    public function buscarPorTipo($tipo) {
        header('Content-Type: application/json');
        $faculdades = $this->faculdade->buscarPorTipo($tipo);
        echo json_encode(['success' => true, 'data' => $faculdades]);
    }

    public function buscarPorId($id) {
        header('Content-Type: application/json');
        $faculdade = $this->faculdade->buscarPorId($id);
        if ($faculdade) {
            echo json_encode(['success' => true, 'data' => $faculdade]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Faculdade não encontrada.']);
        }
    }
    public function criar() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim($_POST['nome'] ?? '');
            $cidade = trim($_POST['cidade'] ?? '');
            $estado = trim($_POST['estado'] ?? '');
            $tipo = trim($_POST['tipo'] ?? '');
            $imagem = trim($_POST['imagem'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $endereco = trim($_POST['endereco'] ?? '');
            $telefone = trim($_POST['telefone'] ?? '');
            $website = trim($_POST['website'] ?? '');

            if (empty($nome) || empty($cidade) || empty($estado) || empty($tipo)) {
                $response['message'] = "Por favor, preencha todos os campos obrigatórios.";
            } elseif (!in_array($tipo, ['pública', 'particular'])) {
                $response['message'] = "Tipo de faculdade inválido.";
            } else {
                $this->faculdade->nome = $nome;
                $this->faculdade->cidade = $cidade;
                $this->faculdade->estado = $estado;
                $this->faculdade->tipo = $tipo;
                $this->faculdade->imagem = $imagem;
                $this->faculdade->descricao = $descricao;
                $this->faculdade->endereco = $endereco;
                $this->faculdade->telefone = $telefone;
                $this->faculdade->website = $website;

                if ($this->faculdade->criar()) {
                    $response['success'] = true;
                    $response['message'] = "Faculdade criada com sucesso!";
                } else {
                    $response['message'] = "Erro ao criar faculdade.";
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
            $cidade = trim($_POST['cidade'] ?? '');
            $estado = trim($_POST['estado'] ?? '');
            $tipo = trim($_POST['tipo'] ?? '');
            $imagem = trim($_POST['imagem'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $endereco = trim($_POST['endereco'] ?? '');
            $telefone = trim($_POST['telefone'] ?? '');
            $website = trim($_POST['website'] ?? '');

            
            if (empty($id) || empty($nome) || empty($cidade) || empty($estado) || empty($tipo)) {
                $response['message'] = "Por favor, preencha todos os campos obrigatórios.";
            } elseif (!in_array($tipo, ['pública', 'particular'])) {
                $response['message'] = "Tipo de faculdade inválido.";
            } else {
                $this->faculdade->id = $id;
                $this->faculdade->nome = $nome;
                $this->faculdade->cidade = $cidade;
                $this->faculdade->estado = $estado;
                $this->faculdade->tipo = $tipo;
                $this->faculdade->imagem = $imagem;
                $this->faculdade->descricao = $descricao;
                $this->faculdade->endereco = $endereco;
                $this->faculdade->telefone = $telefone;
                $this->faculdade->website = $website;

                if ($this->faculdade->atualizar()) {
                    $response['success'] = true;
                    $response['message'] = "Faculdade atualizada com sucesso!";
                } else {
                    $response['message'] = "Erro ao atualizar faculdade.";
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

        if ($this->faculdade->deletar($id)) {
            $response['success'] = true;
            $response['message'] = "Faculdade deletada com sucesso!";
        } else {
            $response['message'] = "Erro ao deletar faculdade.";
        }

        echo json_encode($response);
    }

    public function buscarComFiltros() {
        header('Content-Type: application/json');
        
        $cidade = trim($_GET['cidade'] ?? '');
        $tipo = trim($_GET['tipo'] ?? '');
        $estado = trim($_GET['estado'] ?? '');

        $faculdades = $this->faculdade->listarTodas();

        if (!empty($cidade)) {
            $faculdades = array_filter($faculdades, function($faculdade) use ($cidade) {
                return stripos($faculdade['cidade'], $cidade) !== false;
            });
        }

        if (!empty($tipo)) {
            $faculdades = array_filter($faculdades, function($faculdade) use ($tipo) {
                return $faculdade['tipo'] === $tipo;
            });
        }

        if (!empty($estado)) {
            $faculdades = array_filter($faculdades, function($faculdade) use ($estado) {
                return stripos($faculdade['estado'], $estado) !== false;
            });
        }

        echo json_encode(['success' => true, 'data' => array_values($faculdades)]);
    }
}
?> 