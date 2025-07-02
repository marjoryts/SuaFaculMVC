<?php

namespace App\Controllers;

require_once __DIR__ . '/../models/Usuario.php';

use App\Models\Usuario;

class DashboardController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function dashboard() {
        // Verificar se o usuário está logado
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            header('Location: /SuaFacul/public/login');
            exit;
        }

        // Buscar dados do usuário
        $usuario = $this->usuarioModel->buscarPorId($_SESSION['user_id']);
        
        // Renderizar a view do dashboard
        include __DIR__ . '/../views/dashboard.php';
    }

    public function admin() {
        // Verificar se o usuário está logado
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            header('Location: /SuaFacul/public/login');
            exit;
        }

        include __DIR__ . '/../views/admin.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: /SuaFacul/public/login');
        exit;
    }
} 