<?php
session_start();

// Configurar autoload do Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Incluir controllers manualmente se necessário
if (!class_exists('App\Controllers\UsuarioController')) {
    require_once __DIR__ . '/../app/controllers/UsuarioController.php';
}
if (!class_exists('App\Controllers\DashboardController')) {
    require_once __DIR__ . '/../app/controllers/DashboardController.php';
}

use App\Controllers\UsuarioController;
use App\Controllers\DashboardController;

// Obter a URL da requisição
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = '/SuaFacul/public/';
$path = str_replace($base_path, '', $request_uri);
$path = parse_url($path, PHP_URL_PATH);

// Remover trailing slash
$path = rtrim($path, '/');

// Se não houver path, definir como home
if (empty($path)) {
    $path = 'home';
}
// routerr
switch ($path) {
    case 'home':
        include __DIR__ . '/../app/views/home.php';
        break;
        
    case 'login':
        include __DIR__ . '/../app/views/login.php';
        break;
        
    case 'cursos':
        include __DIR__ . '/../app/views/cursos.php';
        break;
        
    case 'faculdades':
        include __DIR__ . '/../app/views/faculdades.php';
        break;
        
    case 'vestibulares':
        include __DIR__ . '/../app/views/vestibulares.php';
        break;
        
    case 'testevocacional':
        include __DIR__ . '/../app/views/testevocacional.php';
        break;
        
    case 'sobrenos':
        include __DIR__ . '/../app/views/sobrenos.php';
        break;
        
    case 'ajuda':
        include __DIR__ . '/../app/views/ajuda.php';
        break;
        
    case 'dashboard':
        $controller = new DashboardController();
        $controller->dashboard();
        break;
        
    case 'admin':
        $controller = new DashboardController();
        $controller->admin();
        break;
        
    case 'logout':
        $controller = new DashboardController();
        $controller->logout();
        break;
        
    // API endpoints
    case 'api/usuario/registrar':
        $controller = new UsuarioController();
        $controller->registrar();
        break;
        
    case 'api/usuario/login':
        $controller = new UsuarioController();
        $controller->login();
        break;
        
    case 'api/usuario/logout':
        $controller = new UsuarioController();
        $controller->logout();
        break;
        
    case 'api/usuario/listar':
        $controller = new UsuarioController();
        $controller->listar();
        break;
        
    case 'api/usuario/buscar':
        $controller = new UsuarioController();
        $controller->buscar();
        break;
        
    case 'api/usuario/atualizar':
        $controller = new UsuarioController();
        $controller->atualizar();
        break;
        
    case 'api/usuario/deletar':
        $controller = new UsuarioController();
        $controller->deletar();
        break;
        
    case 'test_session':
        include __DIR__ . '/test_session.php';
        break;
        
    default:
        http_response_code(404);
        include __DIR__ . '/../app/views/404.php';
        break;
} 