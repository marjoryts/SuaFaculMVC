<?php
// Página de Faculdades
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculdades | SuaFacul</title>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/faculdades.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="/SuaFacul/public/imagens/suafacul_icon.png" alt="Logo SuaFacul" width="80" height="60">
            </div>
            <nav class="navbar">
                <a href="/SuaFacul/public/vestibulares">Vestibulares</a>
                <a href="/SuaFacul/public/testevocacional">Teste Vocacional</a>
                <a href="/SuaFacul/public/cursos">Cursos</a>
                <a href="/SuaFacul/public/faculdades" class="active">Faculdades</a>
                <a href="/SuaFacul/public/ajuda">Ajuda</a>
                <a href="/SuaFacul/public/sobrenos">Sobre nós</a>
                <button class="btn-login" onclick="location.href='/SuaFacul/public/login'">Entrar</button>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <h1>Encontre a sua <em><strong>faculdade</strong></em> ideal!</h1>
            <div class="container">
                <div class="container-input">
                    <div class="card">
                        <label for="curso"> Qual curso deseja estudar?</label>
                        <input type="text" class="text-input" placeholder="Digite o curso">
                        <div class="filtros1">
                            <label><input type="checkbox"> Presencial</label>
                            <label><input type="checkbox"> Híbrido</label>
                            <label><input type="checkbox"> EaD</label>
                        </div>
                    </div>
                    <div class="card">
                        <label for="faculdade"> Em qual faculdade?</label>
                        <input type="text" class="text-input" placeholder="Digite a faculdade">
                        <div class="filtros">
                            <label><input type="radio">Pública</label>
                            <label><input type="radio">Particular</label>
                        </div>
                    </div>
                    <div class="card">
                        <label for="cidade">Em que cidade quer estudar?</label>
                        <input type="text" class="text-input" placeholder="Digite a cidade">
                        <div class="filtros">
                            <button class="btn-buscar">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-grid">
            <div class="footer-about">
                <h3>SuaFacul</h3>
                <p>Seu futuro em um só lugar! Encontre a faculdade e o curso perfeitos para você.</p>
            </div>
            <div class="footer-links">
                <h4>Links Úteis</h4>
                <ul>
                    <li><a href="/SuaFacul/public/vestibulares">Vestibulares</a></li>
                    <li><a href="/SuaFacul/public/testevocacional">Teste Vocacional</a></li>
                    <li><a href="/SuaFacul/public/faculdades">Faculdades</a></li>
                    <li><a href="/SuaFacul/public/cursos">Cursos</a></li>
                </ul>
            </div>
            <div class="footer-help">
                <h4>Ajuda</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="#">Termos de Uso</a></li>
                    <li><a href="#">Política de Privacidade</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h4>Redes Sociais</h4>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2025 SuaFacul. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>