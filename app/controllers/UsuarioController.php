<?php

namespace App\Controllers;

require_once __DIR__ . '/../models/Usuario.php';

use App\Models\Usuario;

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }
    

    public function registrar() {
        header('Content-Type: application/json');
        
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
            return;
        }

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($username) || empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos.']);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Formato de e-mail inválido.']);
            return;
        }

        $result = $this->usuarioModel->criar($username, $email, $password);
        echo json_encode($result);
    }

    public function login() {
        error_log('DEBUG: ENTROU NO MÉTODO LOGIN');
        error_log('REQUEST_METHOD: ' . $_SERVER["REQUEST_METHOD"]);
        error_log('POST: ' . print_r($_POST, true));
        error_log('RAW: ' . file_get_contents('php://input'));
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        header('Content-Type: application/json');
        
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
            return;
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($username) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos.']);
            return;
        }

        $result = $this->usuarioModel->autenticar($username, $password);
        error_log('Resultado do login: ' . print_r($result, true));
        if ($result['success']) {
            $_SESSION['user_id'] = $result['user']['id'];
            $_SESSION['username'] = $result['user']['nome_usuario'];
            $_SESSION['email'] = $result['user']['email'];
        }
        
        echo json_encode($result);
    }

    public function logout() {
        session_destroy();
        header('Location: /SuaFacul/public/login');
        exit;
    }

    public function listar() {
        header('Content-Type: application/json');
        
        if ($_SERVER["REQUEST_METHOD"] != "GET") {
            echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
            return;
        }

        $usuarios = $this->usuarioModel->listar();
        echo json_encode(['success' => true, 'usuarios' => $usuarios]);
    }

    public function buscar() {
        header('Content-Type: application/json');
        
        if ($_SERVER["REQUEST_METHOD"] != "GET") {
            echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
            return;
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID não fornecido.']);
            return;
        }

        $usuario = $this->usuarioModel->buscarPorId($id);
        if ($usuario) {
            echo json_encode(['success' => true, 'usuario' => $usuario]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
        }
    }

    public function atualizar() {
        header('Content-Type: application/json');
        
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
            return;
        }

        $id = $_POST['id'] ?? null;
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (!$id || empty($username) || empty($email)) {
            echo json_encode(['success' => false, 'message' => 'Dados obrigatórios não fornecidos.']);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Formato de e-mail inválido.']);
            return;
        }

        $result = $this->usuarioModel->atualizar($id, $username, $email, $password);
        echo json_encode($result);
    }

    public function deletar() {
        header('Content-Type: application/json');
        
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
            return;
        }

        $id = $_POST['id'] ?? null;
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID não fornecido.']);
            return;
        }

        $result = $this->usuarioModel->deletar($id);
        echo json_encode($result);
    }
    
} 