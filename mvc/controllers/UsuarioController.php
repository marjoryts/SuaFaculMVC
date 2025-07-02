<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }
    public function login() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => '', 'username' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username_or_email = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($username_or_email) || empty($password)) {
                $response['message'] = "Por favor, preencha todos os campos.";
            } else {
                $user = $this->usuario->buscarPorCredenciais($username_or_email);

                if ($user && password_verify($password, $user['senha'])) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $user['id'];
                    $_SESSION["username"] = $user['nome_usuario'];
                    $_SESSION["email"] = $user['email'];

                    $response['success'] = true;
                    $response['message'] = "Login efetuado com sucesso!";
                    $response['username'] = $user['nome_usuario'];
                } else {
                    $response['message'] = "Credenciais inválidas.";
                }
            }
        } else {
            $response['message'] = "Requisição inválida.";
        }

        echo json_encode($response);
    }

    public function registrar() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome_usuario = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['password'] ?? '');
            $confirmar_senha = trim($_POST['confirm_password'] ?? '');

            if (empty($nome_usuario) || empty($email) || empty($senha) || empty($confirmar_senha)) {
                $response['message'] = "Por favor, preencha todos os campos.";
            } elseif ($senha !== $confirmar_senha) {
                $response['message'] = "As senhas não coincidem.";
            } elseif (strlen($senha) < 6) {
                $response['message'] = "A senha deve ter pelo menos 6 caracteres.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response['message'] = "Email inválido.";
            } elseif ($this->usuario->nomeUsuarioExiste($nome_usuario)) {
                $response['message'] = "Este nome de usuário já está em uso.";
            } elseif ($this->usuario->emailExiste($email)) {
                $response['message'] = "Este email já está cadastrado.";
            } else {
                $this->usuario->nome_usuario = $nome_usuario;
                $this->usuario->email = $email;
                $this->usuario->senha = $senha;

                if ($this->usuario->criar()) {
                    $response['success'] = true;
                    $response['message'] = "Usuário registrado com sucesso!";
                } else {
                    $response['message'] = "Erro ao registrar usuário.";
                }
            }
        } else {
            $response['message'] = "Requisição inválida.";
        }

        echo json_encode($response);
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Logout realizado com sucesso!']);
    }

    public function listarTodos() {
        header('Content-Type: application/json');
        
        if (!$this->verificarSessao()) {
            echo json_encode(['success' => false, 'message' => 'Acesso negado.']);
            return;
        }

        $usuarios = $this->usuario->listarTodos();
        echo json_encode(['success' => true, 'data' => $usuarios]);
    }

    public function buscarPorId($id) {
        header('Content-Type: application/json');
        
        if (!$this->verificarSessao()) {
            echo json_encode(['success' => false, 'message' => 'Acesso negado.']);
            return;
        }

        $usuario = $this->usuario->buscarPorId($id);
        if ($usuario) {
            echo json_encode(['success' => true, 'data' => $usuario]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
        }
    }

    public function atualizar() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];

        if (!$this->verificarSessao()) {
            $response['message'] = 'Acesso negado.';
            echo json_encode($response);
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = trim($_POST['id'] ?? '');
            $nome_usuario = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');

            if (empty($id) || empty($nome_usuario) || empty($email)) {
                $response['message'] = "Por favor, preencha todos os campos.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response['message'] = "Email inválido.";
            } else {
                $this->usuario->id = $id;
                $this->usuario->nome_usuario = $nome_usuario;
                $this->usuario->email = $email;

                if ($this->usuario->atualizar()) {
                    $response['success'] = true;
                    $response['message'] = "Usuário atualizado com sucesso!";
                } else {
                    $response['message'] = "Erro ao atualizar usuário.";
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

        if (!$this->verificarSessao()) {
            $response['message'] = 'Acesso negado.';
            echo json_encode($response);
            return;
        }

        if ($this->usuario->deletar($id)) {
            $response['success'] = true;
            $response['message'] = "Usuário deletado com sucesso!";
        } else {
            $response['message'] = "Erro ao deletar usuário.";
        }

        echo json_encode($response);
    }

    private function verificarSessao() {
        session_start();
        return isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;
    }

    public function perfil() {
        header('Content-Type: application/json');
        
        if (!$this->verificarSessao()) {
            echo json_encode(['success' => false, 'message' => 'Usuário não logado.']);
            return;
        }

        $usuario = $this->usuario->buscarPorId($_SESSION["id"]);
        echo json_encode(['success' => true, 'data' => $usuario]);
    }

    public function exibirPerfil() {
        if (!$this->verificarSessao()) {
            header('Location: /SuaFacul/login');
            exit;
        }

        $usuario = $this->usuario->buscarPorId($_SESSION['id']);
        
        include __DIR__ . '/../views/usuario/perfil.php';
    }
}
?> 