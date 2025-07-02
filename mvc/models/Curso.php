<?php
require_once __DIR__ . '/../config/Database.php';

class Curso {
    private $conn;
    private $table_name = "cursos";

    public $id;
    public $nome;
    public $area;
    public $duracao;
    public $tipo; // presencial, híbrido, EaD
    public $descricao;
    public $grade_curricular;
    public $mercado_trabalho;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Lista todos os cursos
     * @return array Retorna array com todos os cursos
     */
    public function listarTodos() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca cursos por nome
     * @param string $nome Nome do curso
     * @return array Retorna array com cursos que contêm o nome
     */
    public function buscarPorNome($nome) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nome LIKE :nome ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $nome = "%" . $nome . "%";
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca cursos por área
     * @param string $area Área do curso
     * @return array Retorna array com cursos da área especificada
     */
    public function buscarPorArea($area) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE area = :area ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":area", $area);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca cursos por tipo (presencial, híbrido, EaD)
     * @param string $tipo Tipo do curso
     * @return array Retorna array com cursos do tipo especificado
     */
    public function buscarPorTipo($tipo) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE tipo = :tipo ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca um curso por ID
     * @param int $id ID do curso
     * @return array|null Retorna os dados do curso ou null se não encontrado
     */
    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lista todas as áreas disponíveis
     * @return array Retorna array com todas as áreas
     */
    public function listarAreas() {
        $query = "SELECT DISTINCT area FROM " . $this->table_name . " ORDER BY area ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Cria um novo curso
     * @return bool Retorna true se o curso foi criado com sucesso
     */
    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nome, area, duracao, tipo, descricao, grade_curricular, mercado_trabalho) 
                  VALUES (:nome, :area, :duracao, :tipo, :descricao, :grade_curricular, :mercado_trabalho)";

        $stmt = $this->conn->prepare($query);

        // Limpa e valida os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->area = htmlspecialchars(strip_tags($this->area));
        $this->duracao = htmlspecialchars(strip_tags($this->duracao));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->grade_curricular = htmlspecialchars(strip_tags($this->grade_curricular));
        $this->mercado_trabalho = htmlspecialchars(strip_tags($this->mercado_trabalho));

        // Vincula os parâmetros
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":area", $this->area);
        $stmt->bindParam(":duracao", $this->duracao);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":grade_curricular", $this->grade_curricular);
        $stmt->bindParam(":mercado_trabalho", $this->mercado_trabalho);

        return $stmt->execute();
    }

    /**
     * Atualiza os dados de um curso
     * @return bool Retorna true se a atualização foi bem-sucedida
     */
    public function atualizar() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nome = :nome, area = :area, duracao = :duracao, tipo = :tipo, 
                      descricao = :descricao, grade_curricular = :grade_curricular, 
                      mercado_trabalho = :mercado_trabalho 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Limpa e valida os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->area = htmlspecialchars(strip_tags($this->area));
        $this->duracao = htmlspecialchars(strip_tags($this->duracao));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->grade_curricular = htmlspecialchars(strip_tags($this->grade_curricular));
        $this->mercado_trabalho = htmlspecialchars(strip_tags($this->mercado_trabalho));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincula os parâmetros
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":area", $this->area);
        $stmt->bindParam(":duracao", $this->duracao);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":grade_curricular", $this->grade_curricular);
        $stmt->bindParam(":mercado_trabalho", $this->mercado_trabalho);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    /**
     * Deleta um curso
     * @param int $id ID do curso a ser deletado
     * @return bool Retorna true se a exclusão foi bem-sucedida
     */
    public function deletar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?> 