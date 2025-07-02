<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuaFacul</title>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="/SuaFacul/public/">
                <img src="/SuaFacul/public/imagens/suafacul_icon.png" alt="Logo SuaFacul" width="80" height="60">
                </a>
            </div>
            <nav>
                <a href="/SuaFacul/public/vestibulares">Vestibulares</a>
                <a href="/SuaFacul/public/testevocacional">Teste Vocacional</a>
                <a href="/SuaFacul/public/faculdades">Faculdades</a>
                <a href="/SuaFacul/public/cursos">Cursos</a>
                <a href="/SuaFacul/public/ajuda">Ajuda</a>
                <a href="/SuaFacul/public/sobrenos">Sobre nós</a>
                <button class="btn-entrar" onclick="location.href='/SuaFacul/public/login'">Entrar</button>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <h1>Seu <em><strong>futuro</strong></em> em um só lugar!</h1>
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
            <div class="container-filtros">
                <div class="filtros">
                </div>
            </div>
        </section>

        <section class="faculdades">
            <h2>Faculdades em destaque</h2>
            <div class="faculdades-lista">
                <div class="faculdade">
                    <img src="/SuaFacul/public/imagens/usp.jpg">
                    <h3>USP (Universidade de São Paulo)</h3>
                    <p>Butantã - SP</p>
                    <a href="#">Saiba Mais</a>
                </div>

                <div class="faculdade">
                    <img src="/SuaFacul/public/imagens/fatecfv.jpeg">
                    <h3>FATEC (Faculdade de Tecnologia)</h3>
                    <p>Ferraz de Vasconcelos - SP </p>
                    <a href="#">Saiba Mais</a>
                </div>
                
                <div class="faculdade">
                    <img src="/SuaFacul/public/imagens/unicamp.jpg">
                    <h3>UNICAMP (Universidade de Campinas)</h3>
                    <p>Campinas - SP</p>
                    <a href="#">Saiba Mais</a>
                </div>

                <div class="faculdade">
                    <img src="/SuaFacul/public/imagens/unifesp.jpg">
                    <h3>UNIFESP (Universidade Federal de São Paulo)</h3>
                    <p> São Paulo - SP</p>
                    <a href="#">Saiba Mais</a>
                </div>    
            </div>    
        </section>

        <section class="vestibulares">
            <h2>Próximos vestibulares</h2>
            <div class="vestibulares-lista">
                <div class="vestibular">
                    <h3>Fuvest</h3>
                    <p>23/11</p>
                    <p>Universidade de São Paulo</p>
                    <a href="#">Saiba mais</a>
                </div>

                <div class="vestibular">
                    <h3>Comvest</h3>
                    <p>Em espera</p>
                    <p>Universidade Estadual de Campinas</p>
                    <a href="#">Saiba mais</a>
                </div>

                <div class="vestibular">
                    <h3>FATEC</h3>
                    <p>29/06</p>
                    <p>Faculdade de Tecnologia do Estado de São Paulo</p>
                    <a href="#">Saiba mais</a>
                </div>
                
                <div class="vestibular">
                    <h3>UNESP</h3>
                    <p>02/11</p>
                    <p>Universidade Estadual Paulista</p>
                    <a href="#">Saiba mais</a>
                </div>
            </div>
        </section>
        
        <div class="container-curso">
            <h1>Cursos</h1>
            
            <div>
                <div class="pesquisa-container">
                    <div class="pesquisa-titulo">Pesquise o curso</div>
                    <input type="text" placeholder="Digite o curso">
                </div>

                <div class="cursos-lista">
                    <div class="curso-item">Análise e Desenvolvimento de Sistemas</div>
                    <div class="curso-item">Medicina</div>
                    <div class="curso-item">Engenharia de Software</div>
                    <div class="curso-item">Administração</div>
                    <div class="curso-item">Direito</div>
                    <div class="curso-item">Letras</div>
                    <div class="curso-item">Ciência da Computação</div>
                    <div class="curso-item">Sistema de Informações</div>
                </div>
            </div>
        </div>
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
        
        <div class="footer-bottom">
            <p>&copy; 2024 SuaFacul. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="/SuaFacul/public/script.js"></script>
</body>
</html> 