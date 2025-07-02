<?php
// Página de Cursos
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos | SuaFacul</title>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/cursos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="/SuaFacul/public/">
                        <img src="/SuaFacul/public/imagens/suafacul_icon.png" alt="Logo SuaFacul" width="80" height="60">
                    </a>
                </div>

                <nav class="navbar">
                    <a href="/SuaFacul/public/vestibulares">Vestibulares</a>
                    <a href="/SuaFacul/public/testevocacional">Teste Vocacional</a>
                    <a href="/SuaFacul/public/faculdades">Faculdades</a>
                    <a href="/SuaFacul/public/cursos" class="active">Cursos</a>
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
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Encontre o <strong>curso ideal</strong> para você</h1>
                    <p>Explore nossa lista completa de cursos e descubra opções que combinam com seu perfil e objetivos
                    </p>

                    <div class="search-box">
                        <input type="text" placeholder="Pesquise por curso, área ou palavra-chave">
                        <button class="btn-search">
                            Buscar <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <div class="wave"></div>

        <section class="courses-section">
            <div class="container">
                <div class="courses-container">
                    <!-- Filtros -->
                    <div class="filters">
                        <div class="filters-content">
                            <h3><i class="fas fa-filter"></i> Filtros</h3>

                            <div class="filter-group">
                                <h4>Área de Conhecimento</h4>
                                <div class="filter-options">
                                    <button><i class="fas fa-laptop-code"></i> Tecnologia</button>
                                    <button><i class="fas fa-heartbeat"></i> Saúde</button>
                                    <button><i class="fas fa-gavel"></i> Direito</button>
                                    <button><i class="fas fa-chart-line"></i> Negócios</button>
                                    <button><i class="fas fa-paint-brush"></i> Artes e Design</button>
                                    <button class="active"><i class="fas fa-ellipsis-h"></i> Todas as áreas</button>
                                </div>
                            </div>

                            <div class="filter-group">
                                <h4>Modalidade</h4>
                                <div class="filter-options">
                                    <label>
                                        <input type="checkbox"> Presencial
                                    </label>
                                    <label>
                                        <input type="checkbox"> EaD
                                    </label>
                                    <label>
                                        <input type="checkbox"> Semipresencial
                                    </label>
                                </div>
                            </div>

                            <div class="filter-group">
                                <h4>Tipo de Instituição</h4>
                                <div class="filter-options">
                                    <label>
                                        <input type="checkbox"> Pública
                                    </label>
                                    <label>
                                        <input type="checkbox"> Privada
                                    </label>
                                </div>
                            </div>

                            <button class="btn-apply">Aplicar Filtros</button>
                        </div>
                    </div>

                    <!-- Lista de Cursos -->
                    <div class="courses-list">
                        <div class="courses-header">
                            <h2><i class="fas fa-book-open"></i> Todos os Cursos</h2>
                            <div class="courses-count">1-10 de 128 cursos</div>
                        </div>

                        <div class="courses-grid">
                            <!-- Curso 1 -->
                            <div class="course-card">
                                <div class="course-header">
                                    <h3>Engenharia de Software</h3>
                                    <span class="tag presencial">Presencial</span>
                                </div>
                                <p class="institution">
                                    <i class="fas fa-university"></i> USP - Universidade de São Paulo
                                </p>
                                <p class="description">
                                    Curso focado no desenvolvimento de sistemas complexos e aplicações de software de
                                    alta qualidade.
                                </p>
                                <div class="course-footer">
                                    <div class="course-info">
                                        <span><i class="fas fa-clock"></i> 4 anos</span>
                                        <span><i class="fas fa-graduation-cap"></i> Bacharelado</span>
                                    </div>
                                    <a href="#" class="course-link">
                                        Ver detalhes <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Curso 2 -->
                            <div class="course-card">
                                <div class="course-header">
                                    <h3>Medicina</h3>
                                    <span class="tag presencial">Presencial</span>
                                </div>
                                <p class="institution">
                                    <i class="fas fa-university"></i> UNIFESP - Universidade Federal de São Paulo
                                </p>
                                <p class="description">
                                    Formação de médicos generalistas com sólida base científica, técnica e humanística.
                                </p>
                                <div class="course-footer">
                                    <div class="course-info">
                                        <span><i class="fas fa-clock"></i> 6 anos</span>
                                        <span><i class="fas fa-graduation-cap"></i> Bacharelado</span>
                                    </div>
                                    <a href="#" class="course-link">
                                        Ver detalhes <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Adicione os outros cursos seguindo o mesmo padrão -->
                        </div>

                        <!-- Paginação -->
                        <div class="pagination">
                            <a href="#"><i class="fas fa-chevron-left"></i></a>
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="vocational-test">
            <div class="container">
                <h2><i class="fas fa-question-circle"></i> Não sabe qual curso escolher?</h2>

                <div class="test-container">
                    <h3>Faça nosso Teste Vocacional!</h3>
                    <p>Responda algumas perguntas simples e descubra quais cursos combinam mais com seu perfil e
                        interesses.</p>
                    <button class="btn-test">
                        Começar Teste <i class="fas fa-arrow-right"></i>
                    </button>
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
    <script src="/SuaFacul/public/cursos.js"></script>
</body>

</html>