<?php
// Página de Teste Vocacional
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Vocacional | SuaFacul</title>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/teste-vocacional.css">
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
                    <a href="/SuaFacul/public/testevocacional" class="active">Teste Vocacional</a>
                    <a href="/SuaFacul/public/faculdades">Faculdades</a>
                    <a href="/SuaFacul/public/cursos">Cursos</a>
                    <a href="/SuaFacul/public/ajuda">Ajuda</a>
                    <a href="/SuaFacul/public/sobrenos">Sobre nós</a>
                    <button class="btn-login" onclick="location.href='/SuaFacul/public/login'"> 
                        Entrar
                    </button>
                </nav>
                
                <button class="mobile-menu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <main>
        <section class="hero teste-vocacional-hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Descubra seu futuro com nosso <span>Teste Vocacional</span></h1>
                    <p>Responda a perguntas simples e encontre os **cursos e áreas que mais combinam** com sua personalidade, habilidades e interesses.</p>
                    
                    <div class="hero-actions">
                        <button class="btn-start-test" onclick="location.href='teste-vocacional-quiz.php'"> Começar Teste Agora <i class="fas fa-arrow-right"></i>
                        </button>
                        <a href="#how-it-works" class="btn-outline">Como funciona? <i class="fas fa-question"></i></a>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="wave"></div>
        
        <section class="how-it-works-section" id="how-it-works">
            <div class="container">
                <h2><i class="fas fa-lightbulb"></i> Como funciona o Teste Vocacional?</h2>
                <p class="section-description">Nosso teste foi desenvolvido para te guiar na descoberta de suas aptidões e te ajudar a tomar a melhor decisão para sua carreira.</p>

                <div class="steps-grid">
                    <div class="step-card">
                        <div class="step-icon">1</div>
                        <h3>Perguntas Interativas</h3>
                        <p>Responda a uma série de perguntas sobre suas preferências, hobbies e o que te motiva.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon">2</div>
                        <h3>Análise Personalizada</h3>
                        <p>Nosso sistema analisa suas respostas para identificar padrões e áreas de maior compatibilidade.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon">3</div>
                        <h3>Resultados e Sugestões</h3>
                        <p>Receba sugestões de cursos e áreas profissionais, além de faculdades que oferecem essas opções.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon">4</div>
                        <h3>Explore e Decida</h3>
                        <p>Com base nos resultados, explore os detalhes de cursos e faculdades e dê o próximo passo!</p>
                    </div>
                </div>

                <div class="important-note">
                    <p><i class="fas fa-info-circle"></i> O teste é **gratuito** e leva apenas alguns minutos para ser concluído. Suas respostas são confidenciais.</p>
                </div>
                <button class="btn-start-test-bottom" onclick="location.href='teste-vocacional-quiz.php'">
                    Iniciar meu Teste Vocacional <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </section>

        ---
        
        <section class="testimonials-section">
            <div class="container">
                <h2><i class="fas fa-quote-left"></i> O que dizem nossos usuários</h2>
                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <p>"Eu estava super indecisa sobre qual curso fazer, mas o teste da SuaFacul me deu um direcionamento incrível! Descobri uma área que eu nem tinha pensado antes."</p>
                        <div class="author-info">
                            <img src="imagens/user_avatar_1.png" alt="Avatar da Maria S.">
                            <span>Maria S. - Estudante</span>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <p>"Fiz o teste por curiosidade e me surpreendi com a precisão dos resultados. Me ajudou a confirmar a minha escolha e me sentir mais confiante."</p>
                        <div class="author-info">
                            <img src="imagens/user_avatar_2.png" alt="Avatar do João L.">
                            <span>João L. - Vestibulando</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>SuaFacul</h3>
                    <p>Seu futuro em um só lugar! Encontre a faculdade e o curso perfeitos para você.</p>
                </div>
                
                <div class="footer-links">
                    <h4>Links Úteis</h4>
                    <ul>
                        <li><a href="#">Vestibulares</a></li>
                        <li><a href="#">Teste Vocacional</a></li>
                        <li><a href="#">Faculdades</a></li>
                        <li><a href="cursos.php">Cursos</a></li>
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
        </div>
    </footer>
</body>
</html>