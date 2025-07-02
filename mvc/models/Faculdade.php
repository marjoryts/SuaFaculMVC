<?php
require_once __DIR__ . '/../config/Database.php';

class Faculdade {
    private $conn;
    private $table_name = "faculdades";

    public $id;
    public $nome;
    public $cidade;
    public $estado;
    public $tipo; // pública ou particular
    public $imagem;
    public $descricao;
    public $endereco;
    public $telefone;
    public $website;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    
    public function listarTodas() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function listarDestaque($limite = 4) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE destaque = 1 ORDER BY nome ASC LIMIT :limite";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":limite", $limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorCidade($cidade) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE cidade LIKE :cidade ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $cidade = "%" . $cidade . "%";
        $stmt->bindParam(":cidade", $cidade);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorTipo($tipo) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE tipo = :tipo ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nome, cidade, estado, tipo, imagem, descricao, endereco, telefone, website) 
                  VALUES (:nome, :cidade, :estado, :tipo, :imagem, :descricao, :endereco, :telefone, :website)";

        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->cidade = htmlspecialchars(strip_tags($this->cidade));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->imagem = htmlspecialchars(strip_tags($this->imagem));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->endereco = htmlspecialchars(strip_tags($this->endereco));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->website = htmlspecialchars(strip_tags($this->website));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cidade", $this->cidade);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":imagem", $this->imagem);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":website", $this->website);

        return $stmt->execute();
    }
    public function atualizar() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nome = :nome, cidade = :cidade, estado = :estado, tipo = :tipo, 
                      imagem = :imagem, descricao = :descricao, endereco = :endereco, 
                      telefone = :telefone, website = :website 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->cidade = htmlspecialchars(strip_tags($this->cidade));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->imagem = htmlspecialchars(strip_tags($this->imagem));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->endereco = htmlspecialchars(strip_tags($this->endereco));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->website = htmlspecialchars(strip_tags($this->website));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cidade", $this->cidade);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":imagem", $this->imagem);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":website", $this->website);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function deletar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?> 