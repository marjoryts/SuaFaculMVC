<?php
/**
 * Controlador de Autenticação
 * Responsável por gerenciar as páginas de login, registro e logout
 */
class AuthController {
    
    /**
     * Exibe a página de login
     */
    public function login() {
        // Se já estiver logado, redireciona para a página inicial
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            header('Location: /SuaFacul/');
            exit;
        }
        
        include __DIR__ . '/../views/auth/login.php';
    }
    
    /**
     * Exibe a página de registro
     */
    public function register() {
        // Se já estiver logado, redireciona para a página inicial
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            header('Location: /SuaFacul/');
            exit;
        }
        
        include __DIR__ . '/../views/auth/login.php';
    }
    
    /**
     * Processa o logout
     */
    public function logout() {
        session_start();
        session_destroy();
        header('Location: /SuaFacul/');
        exit;
    }
    
    /**
     * Exibe a página de recuperação de senha
     */
    public function recuperarSenha() {
        include __DIR__ . '/../views/auth/recuperar-senha.php';
    }
    
    /**
     * Processa a recuperação de senha
     */
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
                // Aqui você implementaria a lógica de recuperação de senha
                // Por enquanto, apenas simula o sucesso
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