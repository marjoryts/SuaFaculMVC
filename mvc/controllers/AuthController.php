<?php
class AuthController {

    public function login() {
        // Se já estiver logado, redireciona para a página inicial
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            header('Location: /SuaFacul/');
            exit;
        }
        
        include __DIR__ . '/../views/auth/login.php';
    }
    
    public function register() {
        // Se já estiver logado, redireciona para a página inicial
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            header('Location: /SuaFacul/');
            exit;
        }
        
        include __DIR__ . '/../views/auth/login.php';
    }
    
    public function logout() {
        session_start();
        session_destroy();
        header('Location: /SuaFacul/');
        exit;
    }
    
    public function recuperarSenha() {
        include __DIR__ . '/../views/auth/recuperar-senha.php';
    }

    public function processarRecuperacao() {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => ''];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST['email'] ?? '');
            
            if (empty($email)) {
                $response['message'] = "Por favor, informe seu email.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response['message'] = "Email inválido.";
            } else {
                // futuro recuperação de senha ainda não está pronto
                $response['success'] = true;
                $response['message'] = "Email de recuperação enviado com sucesso!";
            }
        } else {
            $response['message'] = "Requisição inválida.";
        }
        
        echo json_encode($response);
    }
}
?> 