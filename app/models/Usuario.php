<?php

namespace App\Models;

require_once __DIR__ . '/../../config/database.php';

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public function __construct() {
        $database = new \Database();
        $this->conn = $database->getConnection();
    }

    public function criar($username, $email, $password) {
        try {
            $sql_check = "SELECT id FROM " . $this->table_name . " WHERE nome_usuario = :username OR email = :email";
            $stmt_check = $this->conn->prepare($sql_check);
            $stmt_check->bindParam(':username', $username, \PDO::PARAM_STR);
            $stmt_check->bindParam(':email', $email, \PDO::PARAM_STR);
            $stmt_check->execute();

            if ($stmt_check->rowCount() > 0) {
                return ['success' => false, 'message' => 'Nome de usuário ou e-mail já cadastrado.'];
            }

            // Criar novo usuário
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql_insert = "INSERT INTO " . $this->table_name . " (nome_usuario, email, senha) VALUES (:username, :email, :password)";
            $stmt_insert = $this->conn->prepare($sql_insert);
            $stmt_insert->bindParam(':username', $username, \PDO::PARAM_STR);
            $stmt_insert->bindParam(':email', $email, \PDO::PARAM_STR);
            $stmt_insert->bindParam(':password', $hashed_password, \PDO::PARAM_STR);

            if ($stmt_insert->execute()) {
                return ['success' => true, 'message' => 'Usuário registrado com sucesso!'];
            } else {
                return ['success' => false, 'message' => 'Erro ao registrar usuário.'];
            }
        } catch (\PDOException $e) {
            return ['success' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()];
        }
    }

    public function autenticar($username, $password) {
        try {
            $sql = "SELECT id, nome_usuario, email, senha FROM " . $this->table_name . " WHERE nome_usuario = :username OR email = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                if (password_verify($password, $row['senha'])) {
                    return ['success' => true, 'user' => $row];
                } else {
                    return ['success' => false, 'message' => 'Senha incorreta.'];
                }
            } else {
                return ['success' => false, 'message' => 'Usuário não encontrado.'];
            }
        } catch (\PDOException $e) {
            return ['success' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()];
        }
    }

    public function listar() {
        try {
            $sql = "SELECT id, nome_usuario, email FROM " . $this->table_name . " ORDER BY id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function buscarPorId($id) {
        try {
            $sql = "SELECT id, nome_usuario, email FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function atualizar($id, $username, $email, $password = null) {
        try {
            if ($password) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE " . $this->table_name . " SET nome_usuario = :username, email = :email, senha = :password WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':password', $hashed_password, \PDO::PARAM_STR);
            } else {
                $sql = "UPDATE " . $this->table_name . " SET nome_usuario = :username, email = :email WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
            }

            $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

            if ($stmt->execute()) {
                return ['success' => true, 'message' => 'Usuário atualizado com sucesso!'];
            } else {
                return ['success' => false, 'message' => 'Erro ao atualizar usuário.'];
            }
        } catch (\PDOException $e) {
            return ['success' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()];
        }
    }

    public function deletar($id) {
        try {
            $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

            if ($stmt->execute()) {
                return ['success' => true, 'message' => 'Usuário deletado com sucesso!'];
            } else {
                return ['success' => false, 'message' => 'Erro ao deletar usuário.'];
            }
        } catch (\PDOException $e) {
            return ['success' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()];
        }
    }
} 