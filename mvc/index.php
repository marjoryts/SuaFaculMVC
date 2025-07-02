<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configurações de sessão
session_start();

date_default_timezone_set('America/Sao_Paulo');

// Carrega o roteador
require_once __DIR__ . '/core/Router.php';

// Instancia o roteador
$router = new Router();

// Configura as rotas
$router->setupRoutes();

// Processa a requisição
$router->dispatch();
?> 