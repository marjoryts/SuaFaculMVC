<?php
// Página de Vestibulares
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vestibulares | SuaFacul</title>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/vestibulares.css">
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
                    <a href="/SuaFacul/public/sobrenos">Sobre nós</a>
                    <button class="btn-login" onclick="location.href='/SuaFacul/public/login'">Entrar</button>
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
                    <h1>Seu caminho para a universidade começa aqui: <span>Vestibulares</span></h1>
                    <p>Encontre os principais vestibulares do Brasil, datas importantes, editais e dicas de estudo para garantir sua vaga.</p>
                    
                    <div class="search-box">
                        <input type="text" placeholder="Pesquise por vestibular, instituição ou cidade">
                        <button class="btn-search">
                            Buscar <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="wave"></div>
        
        <section class="vestibulares-section">
            <div class="container">
                <div class="vestibulares-container">
                    <div class="filters">
                        <div class="filters-content">
                            <h3><i class="fas fa-filter"></i> Filtros</h3>
                            
                            <div class="filter-group">
                                <h4>Instituição</h4>
                                <div class="filter-options">
                                    <button><i class="fas fa-university"></i> Universidades Públicas</button>
                                    <button><i class="fas fa-school"></i> Universidades Privadas</button>
                                    <button class="active"><i class="fas fa-ellipsis-h"></i> Todas as Instituições</button>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <h4>Região</h4>
                                <div class="filter-options">
                                    <label>
                                        <input type="checkbox"> Sudeste
                                    </label>
                                    <label>
                                        <input type="checkbox"> Sul
                                    </label>
                                    <label>
                                        <input type="checkbox"> Nordeste
                                    </label>
                                    <label>
                                        <input type="checkbox"> Norte
                                    </label>
                                    <label>
                                        <input type="checkbox"> Centro-Oeste
                                    </label>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <h4>Mês do Vestibular</h4>
                                <div class="filter-options">
                                    <label>
                                        <input type="checkbox"> Janeiro
                                    </label>
                                    <label>
                                        <input type="checkbox"> Junho
                                    </label>
                                    <label>
                                        <input type="checkbox"> Novembro
                                    </label>
                                    </div>
                            </div>
                            
                            <button class="btn-apply">Aplicar Filtros</button>
                        </div>
                    </div>
                    
                    <div class="vestibulares-list">
                        <div class="vestibulares-header">
                            <h2><i class="fas fa-clipboard-list"></i> Próximos Vestibulares</h2>
                            <div class="vestibulares-count">1-10 de 50 vestibulares</div>
                        </div>
                        
                        <div class="vestibulares-grid">
                            <div class="vestibular-card">
                                <div class="vestibular-header">
                                    <h3>Fuvest 2025</h3>
                                    <span class="tag instituicao">USP</span>
                                </div>
                                <p class="periodo">
                                    <i class="fas fa-calendar-alt"></i> Inscrições: 15/08 a 15/09
                                </p>
                                <p class="data">
                                    <i class="fas fa-calendar-check"></i> Prova 1ª fase: 15/11
                                </p>
                                <p class="description">
                                    O vestibular da Fuvest é a principal porta de entrada para a Universidade de São Paulo (USP).
                                </p>
                                <div class="vestibular-footer">
                                    <div class="vestibular-info">
                                        <span><i class="fas fa-map-marker-alt"></i> São Paulo - SP</span>
                                    </div>
                                    <a href="#" class="vestibular-link">
                                        Ver edital <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="vestibular-card">
                                <div class="vestibular-header">
                                    <h3>Enem 2024</h3>
                                    <span class="tag instituicao">MEC</span>
                                </div>
                                <p class="periodo">
                                    <i class="fas fa-calendar-alt"></i> Inscrições: 01/05 a 15/05
                                </p>
                                <p class="data">
                                    <i class="fas fa-calendar-check"></i> Provas: 03/11 e 10/11
                                </p>
                                <p class="description">
                                    O Exame Nacional do Ensino Médio é usado como porta de entrada para diversas universidades federais e programas governamentais.
                                </p>
                                <div class="vestibular-footer">
                                    <div class="vestibular-info">
                                        <span><i class="fas fa-globe"></i> Nacional</span>
                                    </div>
                                    <a href="#" class="vestibular-link">
                                        Ver edital <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="vestibular-card">
                                <div class="vestibular-header">
                                    <h3>Unicamp 2025</h3>
                                    <span class="tag instituicao">Unicamp</span>
                                </div>
                                <p class="periodo">
                                    <i class="fas fa-calendar-alt"></i> Inscrições: 29/07 a 30/08
                                </p>
                                <p class="data">
                                    <i class="fas fa-calendar-check"></i> Prova 1ª fase: 20/10
                                </p>
                                <p class="description">
                                    O vestibular da Unicamp é um dos mais concorridos do país, conhecido por sua prova dissertativa.
                                </p>
                                <div class="vestibular-footer">
                                    <div class="vestibular-info">
                                        <span><i class="fas fa-map-marker-alt"></i> Campinas - SP</span>
                                    </div>
                                    <a href="#" class="vestibular-link">
                                        Ver edital <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                            
                            </div>
                        
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
                    <p>Responda algumas perguntas simples e descubra quais cursos combinam mais com seu perfil e interesses.</p>
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
                        <li><a href="cursos">Cursos</a></li>
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