<?php
// Função para obter o caminho base correto
function getAssetPath($path) {
    return '/SuaFacul/' . $path;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>SuaFacul</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo getAssetPath('css/pages/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- CSS específico da página -->
    <?php if (isset($page_css)): ?>
        <link rel="stylesheet" href="<?php echo getAssetPath('css/pages/' . $page_css . '.css'); ?>">
    <?php endif; ?>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="/SuaFacul/">
                    <img src="<?php echo getAssetPath('imagens/suafacul_icon.png'); ?>" alt="Logo SuaFacul" width="80" height="60">
                </a>
            </div>
            <nav>
                <a href="/SuaFacul/vestibulares">Vestibulares</a>
                <a href="/SuaFacul/teste-vocacional">Teste Vocacional</a>
                <a href="/SuaFacul/faculdades">Faculdades</a>
                <a href="/SuaFacul/cursos">Cursos</a>
                <a href="/SuaFacul/ajuda">Ajuda</a>
                <a href="/SuaFacul/sobre-nos">Sobre nós</a>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <div class="user-menu">
                        <span>Olá, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        <a href="/SuaFacul/usuario/perfil-pagina">Perfil</a>
                        <a href="/SuaFacul/usuario/logout">Sair</a>
                    </div>
                <?php else: ?>
                    <button class="btn-entrar" onclick="location.href='/SuaFacul/login'">Entrar</button>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- Conteúdo principal -->
    <main>
        <?php echo $content ?? ''; ?>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div class="footer-about">
                <h3>SuaFacul</h3>
                <p>Seu futuro em um só lugar! Encontre a faculdade e o curso perfeitos para você.</p>
            </div>
            
            <div class="footer-links">
                <h4>Links Úteis</h4>
                <ul>
                    <li><a href="/SuaFacul/vestibulares">Vestibulares</a></li>
                    <li><a href="/SuaFacul/teste-vocacional">Teste Vocacional</a></li>
                    <li><a href="/SuaFacul/faculdades">Faculdades</a></li>
                    <li><a href="/SuaFacul/cursos">Cursos</a></li>
                </ul>
            </div>
            
            <div class="footer-help">
                <h4>Ajuda</h4>
                <ul>
                    <li><a href="/SuaFacul/ajuda">FAQ</a></li>
                    <li><a href="/SuaFacul/contato">Contato</a></li>
                    <li><a href="/SuaFacul/termos">Termos de Uso</a></li>
                    <li><a href="/SuaFacul/privacidade">Política de Privacidade</a></li>
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
        
        <div class="footer-bottom">
            <p>&copy; 2025 SuaFacul. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="<?php echo getAssetPath('script.js'); ?>"></script>
    
    <!-- JavaScript específico da página -->
    <?php if (isset($page_js)): ?>
        <script src="<?php echo getAssetPath('js/' . $page_js . '.js'); ?>"></script>
    <?php endif; ?>
    
    <!-- VLibras -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
</body>
</html> 