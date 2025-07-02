<?php
require_once __DIR__ . '/../config/Database.php';

/**
 * Modelo Vestibular
 * Responsável por todas as operações relacionadas aos vestibulares no banco de dados
 */
class Vestibular {
    private $conn;
    private $table_name = "vestibulares";

    public $id;
    public $nome;
    public $instituicao;
    public $data_prova;
    public $data_inscricao_inicio;
    public $data_inscricao_fim;
    public $descricao;
    public $link_inscricao;
    public $status; // aberto, fechado, em espera

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Lista todos os vestibulares
     * @return array Retorna array com todos os vestibulares
     */
    public function listarTodos() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY data_prova ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lista vestibulares próximos (próximos 30 dias)
     * @return array Retorna array com vestibulares próximos
     */
    public function listarProximos() {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE data_prova >= CURDATE() 
                  AND data_prova <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)
                  ORDER BY data_prova ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lista vestibulares por status
     * @param string $status Status do vestibular
     * @return array Retorna array com vestibulares do status especificado
     */
    public function listarPorStatus($status) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE status = :status ORDER BY data_prova ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca vestibulares por instituição
     * @param string $instituicao Nome da instituição
     * @return array Retorna array com vestibulares da instituição
     */
    public function buscarPorInstituicao($instituicao) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE instituicao LIKE :instituicao ORDER BY data_prova ASC";
        $stmt = $this->conn->prepare($query);
        $instituicao = "%" . $instituicao . "%";
        $stmt->bindParam(":instituicao", $instituicao);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca um vestibular por ID
     * @param int $id ID do vestibular
     * @return array|null Retorna os dados do vestibular ou null se não encontrado
     */
    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lista todas as instituições disponíveis
     * @return array Retorna array com todas as instituições
     */
    public function listarInstituicoes() {
        $query = "SELECT DISTINCT instituicao FROM " . $this->table_name . " ORDER BY instituicao ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Cria um novo vestibular
     * @return bool Retorna true se o vestibular foi criado com sucesso
     */
    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nome, instituicao, data_prova, data_inscricao_inicio, data_inscricao_fim, 
                   descricao, link_inscricao, status) 
                  VALUES (:nome, :instituicao, :data_prova, :data_inscricao_inicio, 
                          :data_inscricao_fim, :descricao, :link_inscricao, :status)";

        $stmt = $this->conn->prepare($query);

        // Limpa e valida os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->instituicao = htmlspecialchars(strip_tags($this->instituicao));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->link_inscricao = htmlspecialchars(strip_tags($this->link_inscricao));
        $this->status = htmlspecialchars(strip_tags($this->status));

        // Vincula os parâmetros
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":instituicao", $this->instituicao);
        $stmt->bindParam(":data_prova", $this->data_prova);
        $stmt->bindParam(":data_inscricao_inicio", $this->data_inscricao_inicio);
        $stmt->bindParam(":data_inscricao_fim", $this->data_inscricao_fim);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":link_inscricao", $this->link_inscricao);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    /**
     * Atualiza os dados de um vestibular
     * @return bool Retorna true se a atualização foi bem-sucedida
     */
    public function atualizar() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nome = :nome, instituicao = :instituicao, data_prova = :data_prova, 
                      data_inscricao_inicio = :data_inscricao_inicio, data_inscricao_fim = :data_inscricao_fim, 
                      descricao = :descricao, link_inscricao = :link_inscricao, status = :status 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Limpa e valida os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->instituicao = htmlspecialchars(strip_tags($this->instituicao));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->link_inscricao = htmlspecialchars(strip_tags($this->link_inscricao));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincula os parâmetros
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":instituicao", $this->instituicao);
        $stmt->bindParam(":data_prova", $this->data_prova);
        $stmt->bindParam(":data_inscricao_inicio", $this->data_inscricao_inicio);
        $stmt->bindParam(":data_inscricao_fim", $this->data_inscricao_fim);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":link_inscricao", $this->link_inscricao);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    /**
     * Deleta um vestibular
     * @param int $id ID do vestibular a ser deletado
     * @return bool Retorna true se a exclusão foi bem-sucedida
     */
    public function deletar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    /**
     * Atualiza o status dos vestibulares automaticamente
     * @return bool Retorna true se a atualização foi bem-sucedida
     */
    public function atualizarStatusAutomatico() {
        // Atualiza vestibulares com inscrições abertas
        $query_aberto = "UPDATE " . $this->table_name . " 
                        SET status = 'aberto' 
                        WHERE data_inscricao_inicio <= CURDATE() 
                        AND data_inscricao_fim >= CURDATE()";
        $stmt_aberto = $this->conn->prepare($query_aberto);
        $stmt_aberto->execute();

        // Atualiza vestibulares com inscrições fechadas
        $query_fechado = "UPDATE " . $this->table_name . " 
                         SET status = 'fechado' 
                         WHERE data_inscricao_fim < CURDATE()";
        $stmt_fechado = $this->conn->prepare($query_fechado);
        return $stmt_fechado->execute();
    }
}
?> 