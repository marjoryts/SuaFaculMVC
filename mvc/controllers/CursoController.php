<?php
require_once __DIR__ . '/../models/Curso.php';

/**
 * Controlador de Cursos
 * Responsável por gerenciar todas as operações relacionadas aos cursos
 */
class CursoController {
    private $curso;

    public function __construct() {
        $this->curso = new Curso();
    }

    /**
     * Lista todos os cursos
     * @return array Retorna resposta JSON com lista de cursos
     */
    public function listarTodos() {
        header('Content-Type: application/json');
        $cursos = $this->curso->listarTodos();
        echo json_encode(['success' => true, 'data' => $cursos]);
    }

    /**
     * Busca cursos por nome
     * @param string $nome Nome do curso
     * @return array Retorna resposta JSON com cursos encontrados
     */
    public function buscarPorNome($nome) {
        header('Content-Type: application/json');
        $cursos = $this->curso->buscarPorNome($nome);
        echo json_encode(['success' => true, 'data' => $cursos]);
    }

    /**
     * Busca cursos por área
     * @param string $area Área do curso
     * @return array Retorna resposta JSON com cursos da área
     */
    public function buscarPorArea($area) {
        header('Content-Type: application/json');
        $cursos = $this->curso->buscarPorArea($area);
        echo json_encode(['success' => true, 'data' => $cursos]);
    }

    /**
     * Busca cursos por tipo
     * @param string $tipo Tipo do curso (presencial, híbrido, EaD)
     * @return array Retorna resposta JSON com cursos do tipo
     */
    public function buscarPorTipo($tipo) {
        header('Content-Type: application/json');
        $cursos = $this->curso->buscarPorTipo($tipo);
        echo json_encode(['success' => true, 'data' => $cursos]);
    }

    /**
     * Busca um curso por ID
     * @param int $id ID do curso
     * @return array Retorna resposta JSON com dados do curso
     */
    public function buscarPorId($id) {
        header('Content-Type: application/json');
        $curso = $this->curso->buscarPorId($id);
        if ($curso) {
            echo json_encode(['success' => true, 'data' => $curso]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Curso não encontrado.']);
        }
    }

    /**
     * Lista todas as áreas disponíveis
     * @return array Retorna resposta JSON com lista de áreas
     */
    public function listarAreas() {
        header('Content-Type: application/json');
        $areas = $this->curso->listarAreas();
        echo json_encode(['success' => true, 'data' => $areas]);
    }

    /**
     * Cria um novo curso
     * @return array Retorna resposta JSON com status da criação
     */
    public function criar() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim($_POST['nome'] ?? '');
            $area = trim($_POST['area'] ?? '');
            $duracao = trim($_POST['duracao'] ?? '');
            $tipo = trim($_POST['tipo'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $grade_curricular = trim($_POST['grade_curricular'] ?? '');
            $mercado_trabalho = trim($_POST['mercado_trabalho'] ?? '');

            // Validações
            if (empty($nome) || empty($area) || empty($duracao) || empty($tipo)) {
                $response['message'] = "Por favor, preencha todos os campos obrigatórios.";
            } elseif (!in_array($tipo, ['presencial', 'híbrido', 'EaD'])) {
                $response['message'] = "Tipo de curso inválido.";
            } else {
                $this->curso->nome = $nome;
                $this->curso->area = $area;
                $this->curso->duracao = $duracao;
                $this->curso->tipo = $tipo;
                $this->curso->descricao = $descricao;
                $this->curso->grade_curricular = $grade_curricular;
                $this->curso->mercado_trabalho = $mercado_trabalho;

                if ($this->curso->criar()) {
                    $response['success'] = true;
                    $response['message'] = "Curso criado com sucesso!";
                } else {
                    $response['message'] = "Erro ao criar curso.";
                }
            }
        } else {
            $response['message'] = "Requisição inválida.";
        }

        echo json_encode($response);
    }

    /**
     * Atualiza os dados de um curso
     * @return array Retorna resposta JSON com status da atualização
     */
    public function atualizar() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = trim($_POST['id'] ?? '');
            $nome = trim($_POST['nome'] ?? '');
            $area = trim($_POST['area'] ?? '');
            $duracao = trim($_POST['duracao'] ?? '');
            $tipo = trim($_POST['tipo'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $grade_curricular = trim($_POST['grade_curricular'] ?? '');
            $mercado_trabalho = trim($_POST['mercado_trabalho'] ?? '');

            // Validações
            if (empty($id) || empty($nome) || empty($area) || empty($duracao) || empty($tipo)) {
                $response['message'] = "Por favor, preencha todos os campos obrigatórios.";
            } elseif (!in_array($tipo, ['presencial', 'híbrido', 'EaD'])) {
                $response['message'] = "Tipo de curso inválido.";
            } else {
                $this->curso->id = $id;
                $this->curso->nome = $nome;
                $this->curso->area = $area;
                $this->curso->duracao = $duracao;
                $this->curso->tipo = $tipo;
                $this->curso->descricao = $descricao;
                $this->curso->grade_curricular = $grade_curricular;
                $this->curso->mercado_trabalho = $mercado_trabalho;

                if ($this->curso->atualizar()) {
                    $response['success'] = true;
                    $response['message'] = "Curso atualizado com sucesso!";
                } else {
                    $response['message'] = "Erro ao atualizar curso.";
                }
            }
        } else {
            $response['message'] = "Requisição inválida.";
        }

        echo json_encode($response);
    }

    /**
     * Deleta um curso
     * @param int $id ID do curso a ser deletado
     * @return array Retorna resposta JSON com status da exclusão
     */
    public function deletar($id) {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($this->curso->deletar($id)) {
            $response['success'] = true;
            $response['message'] = "Curso deletado com sucesso!";
        } else {
            $response['message'] = "Erro ao deletar curso.";
        }

        echo json_encode($response);
    }

    /**
     * Exibe a página de listagem de cursos
     */
    public function index() {
        $cursos = $this->curso->listarTodos();
        $areas = $this->curso->listarAreas();
        
        $page_title = 'Cursos';
        $page_css = 'cursos';
        
        include __DIR__ . '/../views/cursos/index.php';
    }

    /**
     * Exibe a página de detalhes de um curso
     * @param int $id ID do curso
     */
    public function detalhes($id) {
        $curso = $this->curso->buscarPorId($id);
        
        if ($curso) {
            $page_title = $curso['nome'];
            $page_css = 'cursos';
            
            include __DIR__ . '/../views/cursos/detalhes.php';
        } else {
            // Redireciona para 404 se o curso não existir
            header('Location: /erro404');
            exit;
        }
    }
}
?> 