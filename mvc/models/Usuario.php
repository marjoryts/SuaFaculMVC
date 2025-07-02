<?php
require_once __DIR__ . '/../config/Database.php';

/**
 * Modelo Usuario
 * Responsável por todas as operações relacionadas aos usuários no banco de dados
 */
class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $nome_usuario;
    public $email;
    public $senha;
    public $data_criacao;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Cria um novo usuário
     * @return bool Retorna true se o usuário foi criado com sucesso
     */
    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nome_usuario, email, senha, data_criacao) 
                  VALUES (:nome_usuario, :email, :senha, NOW())";

        $stmt = $this->conn->prepare($query);

        // Limpa e valida os dados
        $this->nome_usuario = htmlspecialchars(strip_tags($this->nome_usuario));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);

        // Vincula os parâmetros
        $stmt->bindParam(":nome_usuario", $this->nome_usuario);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);

        return $stmt->execute();
    }

    /**
     * Busca um usuário por nome de usuário ou email
     * @param string $username_or_email Nome de usuário ou email
     * @return array|null Retorna os dados do usuário ou null se não encontrado
     */
    public function buscarPorCredenciais($username_or_email) {
        $query = "SELECT id, nome_usuario, email, senha FROM " . $this->table_name . " 
                  WHERE nome_usuario = :user_email OR email = :user_email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_email", $username_or_email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lista todos os usuários
     * @return array Retorna array com todos os usuários
     */
    public function listarTodos() {
        $query = "SELECT id, nome_usuario, email, data_criacao FROM " . $this->table_name . " ORDER BY data_criacao DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca um usuário por ID
     * @param int $id ID do usuário
     * @return array|null Retorna os dados do usuário ou null se não encontrado
     */
    public function buscarPorId($id) {
        $query = "SELECT id, nome_usuario, email, data_criacao FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Atualiza os dados de um usuário
     * @return bool Retorna true se a atualização foi bem-sucedida
     */
    public function atualizar() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nome_usuario = :nome_usuario, email = :email 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Limpa e valida os dados
        $this->nome_usuario = htmlspecialchars(strip_tags($this->nome_usuario));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincula os parâmetros
        $stmt->bindParam(":nome_usuario", $this->nome_usuario);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    /**
     * Deleta um usuário
     * @param int $id ID do usuário a ser deletado
     * @return bool Retorna true se a exclusão foi bem-sucedida
     */
    public function deletar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    /**
     * Verifica se um email já existe
     * @param string $email Email a ser verificado
     * @return bool Retorna true se o email já existe
     */
    public function emailExiste($email) {
        $query = "SELECT id FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Verifica se um nome de usuário já existe
     * @param string $nome_usuario Nome de usuário a ser verificado
     * @return bool Retorna true se o nome de usuário já existe
     */
    public function nomeUsuarioExiste($nome_usuario) {
        $query = "SELECT id FROM " . $this->table_name . " WHERE nome_usuario = :nome_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome_usuario", $nome_usuario);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
?> 