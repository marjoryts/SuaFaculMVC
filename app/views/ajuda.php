<?php
// Página de Ajuda
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda | SuaFacul</title>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/ajuda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <img src="/SuaFacul/public/imagens/suafacul_icon.png" alt="Logo SuaFacul" width="80" height="60">
                </div>
                
                <nav class="navbar">
                    <a href="/SuaFacul/public/vestibulares">Vestibulares</a>
                    <a href="/SuaFacul/public/testevocacional">Teste Vocacional</a>
                    <a href="/SuaFacul/public/faculdades">Faculdades</a>
                    <a href="/SuaFacul/public/cursos">Cursos</a>
                    <a href="/SuaFacul/public/ajuda" class="active">Ajuda</a>
                    <a href="/SuaFacul/public/sobrenos">Sobre nós</a>
                    <button class="btn-login" onclick="location.href='/SuaFacul/public/login'">Entrar</button>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <section class="hero ajuda-hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Como podemos <span>ajudar você</span>?</h1>
                    <p>Encontre respostas para suas dúvidas, explore nossos recursos ou entre em contato com nossa equipe de suporte.</p>
                    
                    <div class="search-box">
                        <input type="text" placeholder="Pesquise por uma dúvida ou tópico">
                        <button class="btn-search">
                            Buscar <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="wave"></div>
        
        <section class="help-content-section">
            <div class="container">
                <div class="help-sections-grid">
                    <div class="faq-section">
                        <h2><i class="fas fa-question-circle"></i> Perguntas Frequentes (FAQ)
    <ul class="faq-list">
        <li><strong>Como me cadastrar no site?</strong><br> Basta clicar no botão "Entrar" e seguir as instruções para criar sua conta.</li>
        <li><strong>O teste vocacional é gratuito?</strong><br> Sim! Nosso teste é 100% gratuito e online.</li>
        <li><strong>Como encontro faculdades perto de mim?</strong><br> Use nosso buscador e permita o acesso à sua localização.</li>
    </ul>