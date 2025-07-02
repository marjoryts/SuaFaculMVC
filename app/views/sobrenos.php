<?php
// Página Sobre Nós
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós | SuaFacul</title>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/sobrenos.css">
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
                    <a href="/SuaFacul/public/ajuda">Ajuda</a>
                    <a href="/SuaFacul/public/sobrenos" class="active">Sobre nós</a>
                    <button class="btn-login" onclick="location.href='/SuaFacul/public/login'">
                        Entrar
                    </button>
                </nav>
            </div>
        </div>
    </header>
 
    <main>
        <section class="hero sobre-nos-hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Conheça a <strong>SuaFacul</strong></h1>
                    <p>Nossa missão é democratizar a sua jornada educacional e te ajudar a encontrar o futuro ideal.</p>
                </div>
            </div>
        </section>
       
        <div class="wave"></div>
       
        <section class="about-section">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2>Nossa História e Propósito</h2>
                        <p>A SuaFacul nasceu da paixão por educação e do desejo de tornar o acesso à informação sobre cursos e faculdades mais fácil e transparente. Percebemos que muitos estudantes se sentiam perdidos em meio a tantas opções e processos seletivos complexos. Por isso, criamos uma plataforma completa para guiar você em cada etapa, desde a descoberta de seu perfil vocacional até a escolha da instituição ideal.</p>
                        <p>Acreditamos que a escolha de uma carreira é um dos momentos mais importantes na vida de um estudante. Nosso propósito é empoderar você com as ferramentas e o conhecimento necessários para tomar decisões informadas e confiantes sobre seu futuro acadêmico e profissional.</p>
                    </div>
                    <div class="about-image">
                        <img src="/SuaFacul/public/imagens/about_us_image.png" alt="Grupo de estudantes sorrindo e estudando"> </div>
                </div>
            </div>
        </section>
 
 
        <section class="mission-vision-values">
            <div class="container">
                <h2>O que nos move</h2>
                <div class="mvv-grid">
                    <div class="mvv-card">
                        <i class="fas fa-bullseye icon-mission"></i>
                        <h3>Nossa Missão</h3>
                        <p>Democratizar a busca por educação superior, conectando estudantes aos cursos e faculdades que melhor se encaixam em seus sonhos e objetivos.</p>
                    </div>
                    <div class="mvv-card">
                        <i class="fas fa-eye icon-vision"></i>
                        <h3>Nossa Visão</h3>
                        <p>Ser a plataforma líder e mais confiável para orientação educacional no Brasil, reconhecida pela inovação e pelo impacto positivo na vida dos estudantes.</p>
                    </div>
                    <div class="mvv-card">
                        <i class="fas fa-handshake icon-values"></i>
                        <h3>Nossos Valores</h3>
                        <ul>
                            <li>Transparência: Oferecer informações claras e imparciais.</li>
                            <li>Inovação: Buscar constantemente novas formas de ajudar e inspirar.</li>
                            <li>Empatia: Entender as necessidades e desafios dos estudantes.</li>
                            <li>Excelência: Comprometimento com a qualidade em tudo o que fazemos.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
 
        <section class="team-section">
            <div class="container">
                <h2>Conheça Nossa Equipe</h2>
                <p class="team-description">Somos um time dedicado de desenvolvedores unidos pelo objetivo de transformar a educação no Brasil.</p>
                <div class="team-grid">
                    <div class="team-member-card">
                        <img class= "foto_1" src = "/SuaFacul/public/imagens/membro_1.jpeg" alt="Foto do Membro 1"> <h3>Vinícius Henrique </h3>
                        <p class="role">Scrum Master</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="team-member-card">
                        <img class="foto_2" src="/SuaFacul/public/imagens/membro_2.jpeg" alt="Foto do Membro 2">
                        <h3>Erick Dantas</h3>
                        <p class="role">Diretor de Conteúdo</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="team-member-card">
                        <img class= "foto_3" src="/SuaFacul/public/imagens/membro_3.jpeg" alt="Foto do Membro 3">
                        <h3>Gabriella Sampaio</h3>
                        <p class="role">Analista de Dados</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                     <div class="team-member-card">
                        <img class="foto_4" src="/SuaFacul/public/imagens/membro_4.jpeg" alt="Foto do Membro 4">
                        <h3>Marjory Souza</h3>
                        <p class="role">Arquiteta de Software</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    </div>
            </div>
        </section>
 
       
        <section class="call-to-action">
            <div class="container">
                <h2>Pronto para começar sua jornada?</h2>
                <p>Explore nossos recursos e encontre o seu caminho para o sucesso acadêmico!</p>
                <a href="/SuaFacul/public/cursos" class="btn-primary">Ver Cursos <i class="fas fa-arrow-right"></i></a>
                <a href="#" class="btn-secondary">Fazer Teste Vocacional <i class="fas fa-flask"></i></a>
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
        </div>
    </footer>
</body>
</html>
 