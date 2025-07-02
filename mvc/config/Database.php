<?php
/**
 * Classe de conexão com o banco de dados
 * Responsável por gerenciar a conexão PDO com MySQL
 */
class Database {
    private $host = "localhost";
    private $db_name = "Suafacul_crud";
    private $username = "root";
    private $password = "";
    public $conn;

    /**
     * Obtém a conexão com o banco de dados
     * @return PDO|null Retorna a conexão PDO ou null em caso de erro
     */
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            error_log("Erro de conexão: " . $exception->getMessage());
        }
        return $this->conn;
    }
}
?> 