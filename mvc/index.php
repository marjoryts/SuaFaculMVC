<?php
/**
 * Arquivo Principal da Aplicação MVC - SuaFacul
 * Ponto de entrada para todas as requisições
 */

// Configurações de erro
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configurações de sessão
session_start();

// Configurações de timezone
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