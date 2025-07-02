<?php
$page_title = 'Cursos';
$page_css = 'cursos';

// Captura o conteúdo para o layout
ob_start();
?>

<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Encontre o <strong>curso ideal</strong> para você</h1>
            <p>Explore nossa lista completa de cursos e descubra opções que combinam com seu perfil e objetivos</p>

            <div class="search-box">
                <input type="text" id="search-courses" placeholder="Pesquise por curso, área ou palavra-chave">
                <button class="btn-search" onclick="searchCourses()">
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
                            <button data-area="tecnologia"><i class="fas fa-laptop-code"></i> Tecnologia</button>
                            <button data-area="saude"><i class="fas fa-heartbeat"></i> Saúde</button>
                            <button data-area="direito"><i class="fas fa-gavel"></i> Direito</button>
                            <button data-area="negocios"><i class="fas fa-chart-line"></i> Negócios</button>
                            <button data-area="artes"><i class="fas fa-paint-brush"></i> Artes e Design</button>
                            <button class="active" data-area="todas"><i class="fas fa-ellipsis-h"></i> Todas as áreas</button>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h4>Modalidade</h4>
                        <div class="filter-options">
                            <label>
                                <input type="checkbox" name="modalidade" value="presencial"> Presencial
                            </label>
                            <label>
                                <input type="checkbox" name="modalidade" value="ead"> EaD
                            </label>
                            <label>
                                <input type="checkbox" name="modalidade" value="semipresencial"> Semipresencial
                            </label>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h4>Tipo de Instituição</h4>
                        <div class="filter-options">
                            <label>
                                <input type="checkbox" name="tipo" value="publica"> Pública
                            </label>
                            <label>
                                <input type="checkbox" name="tipo" value="privada"> Privada
                            </label>
                        </div>
                    </div>

                    <button class="btn-apply" onclick="applyFilters()">Aplicar Filtros</button>
                </div>
            </div>

            <!-- Lista de Cursos -->
            <div class="courses-list">
                <div class="courses-header">
                    <h2><i class="fas fa-book-open"></i> Todos os Cursos</h2>
                    <div class="courses-count" id="courses-count">1-10 de 128 cursos</div>
                </div>

                <div class="courses-grid" id="courses-grid">
                    <!-- Curso 1 -->
                    <div class="course-card" data-area="tecnologia" data-modalidade="presencial" data-tipo="publica">
                        <div class="course-header">
                            <h3>Engenharia de Software</h3>
                            <span class="tag presencial">Presencial</span>
                        </div>
                        <p class="institution">
                            <i class="fas fa-university"></i> USP - Universidade de São Paulo
                        </p>
                        <p class="description">
                            Curso focado no desenvolvimento de sistemas complexos e aplicações de software de alta qualidade.
                        </p>
                        <div class="course-footer">
                            <div class="course-info">
                                <span><i class="fas fa-clock"></i> 4 anos</span>
                                <span><i class="fas fa-graduation-cap"></i> Bacharelado</span>
                            </div>
                            <a href="/SuaFacul/cursos/detalhes/1" class="course-link">
                                Ver detalhes <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Curso 2 -->
                    <div class="course-card" data-area="saude" data-modalidade="presencial" data-tipo="publica">
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
                            <a href="/SuaFacul/cursos/detalhes/2" class="course-link">
                                Ver detalhes <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Curso 3 -->
                    <div class="course-card" data-area="direito" data-modalidade="presencial" data-tipo="publica">
                        <div class="course-header">
                            <h3>Direito</h3>
                            <span class="tag presencial">Presencial</span>
                        </div>
                        <p class="institution">
                            <i class="fas fa-university"></i> UNICAMP - Universidade de Campinas
                        </p>
                        <p class="description">
                            Formação de profissionais do direito com visão crítica e compromisso social.
                        </p>
                        <div class="course-footer">
                            <div class="course-info">
                                <span><i class="fas fa-clock"></i> 5 anos</span>
                                <span><i class="fas fa-graduation-cap"></i> Bacharelado</span>
                            </div>
                            <a href="/SuaFacul/cursos/detalhes/3" class="course-link">
                                Ver detalhes <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Curso 4 -->
                    <div class="course-card" data-area="tecnologia" data-modalidade="presencial" data-tipo="publica">
                        <div class="course-header">
                            <h3>Análise e Desenvolvimento de Sistemas</h3>
                            <span class="tag presencial">Presencial</span>
                        </div>
                        <p class="institution">
                            <i class="fas fa-university"></i> FATEC - Faculdade de Tecnologia
                        </p>
                        <p class="description">
                            Desenvolvimento de sistemas computacionais e aplicações para diferentes plataformas.
                        </p>
                        <div class="course-footer">
                            <div class="course-info">
                                <span><i class="fas fa-clock"></i> 3 anos</span>
                                <span><i class="fas fa-graduation-cap"></i> Tecnólogo</span>
                            </div>
                            <a href="/SuaFacul/cursos/detalhes/4" class="course-link">
                                Ver detalhes <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Curso 5 -->
                    <div class="course-card" data-area="negocios" data-modalidade="ead" data-tipo="privada">
                        <div class="course-header">
                            <h3>Administração</h3>
                            <span class="tag ead">EaD</span>
                        </div>
                        <p class="institution">
                            <i class="fas fa-university"></i> Universidade Anhanguera
                        </p>
                        <p class="description">
                            Gestão de organizações e desenvolvimento de habilidades administrativas.
                        </p>
                        <div class="course-footer">
                            <div class="course-info">
                                <span><i class="fas fa-clock"></i> 4 anos</span>
                                <span><i class="fas fa-graduation-cap"></i> Bacharelado</span>
                            </div>
                            <a href="/SuaFacul/cursos/detalhes/5" class="course-link">
                                Ver detalhes <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Curso 6 -->
                    <div class="course-card" data-area="artes" data-modalidade="presencial" data-tipo="publica">
                        <div class="course-header">
                            <h3>Design Gráfico</h3>
                            <span class="tag presencial">Presencial</span>
                        </div>
                        <p class="institution">
                            <i class="fas fa-university"></i> UNESP - Universidade Estadual Paulista
                        </p>
                        <p class="description">
                            Criação de projetos visuais e comunicação através do design.
                        </p>
                        <div class="course-footer">
                            <div class="course-info">
                                <span><i class="fas fa-clock"></i> 4 anos</span>
                                <span><i class="fas fa-graduation-cap"></i> Bacharelado</span>
                            </div>
                            <a href="/SuaFacul/cursos/detalhes/6" class="course-link">
                                Ver detalhes <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Paginação -->
                <div class="pagination">
                    <a href="#" onclick="changePage(1)"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="active" onclick="changePage(1)">1</a>
                    <a href="#" onclick="changePage(2)">2</a>
                    <a href="#" onclick="changePage(3)">3</a>
                    <a href="#" onclick="changePage(4)">4</a>
                    <a href="#" onclick="changePage(5)">5</a>
                    <a href="#" onclick="changePage(2)"><i class="fas fa-chevron-right"></i></a>
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
            <button class="btn-test" onclick="location.href='/SuaFacul/teste-vocacional'">
                Começar Teste <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>

<script>
// Função de busca
function searchCourses() {
    const searchTerm = document.getElementById('search-courses').value.toLowerCase();
    const courseCards = document.querySelectorAll('.course-card');
    let visibleCount = 0;

    courseCards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        const description = card.querySelector('.description').textContent.toLowerCase();
        const institution = card.querySelector('.institution').textContent.toLowerCase();

        if (title.includes(searchTerm) || description.includes(searchTerm) || institution.includes(searchTerm)) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    updateCoursesCount(visibleCount);
}

// Função para aplicar filtros
function applyFilters() {
    const selectedArea = document.querySelector('.filter-options button.active').dataset.area;
    const selectedModalidades = Array.from(document.querySelectorAll('input[name="modalidade"]:checked')).map(cb => cb.value);
    const selectedTipos = Array.from(document.querySelectorAll('input[name="tipo"]:checked')).map(cb => cb.value);
    
    const courseCards = document.querySelectorAll('.course-card');
    let visibleCount = 0;

    courseCards.forEach(card => {
        const cardArea = card.dataset.area;
        const cardModalidade = card.dataset.modalidade;
        const cardTipo = card.dataset.tipo;

        let showCard = true;

        // Filtro por área
        if (selectedArea !== 'todas' && cardArea !== selectedArea) {
            showCard = false;
        }

        // Filtro por modalidade
        if (selectedModalidades.length > 0 && !selectedModalidades.includes(cardModalidade)) {
            showCard = false;
        }

        // Filtro por tipo
        if (selectedTipos.length > 0 && !selectedTipos.includes(cardTipo)) {
            showCard = false;
        }

        if (showCard) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    updateCoursesCount(visibleCount);
}

// Função para atualizar contador de cursos
function updateCoursesCount(count) {
    const countElement = document.getElementById('courses-count');
    countElement.textContent = `1-${count} de ${count} cursos`;
}

// Função para mudar página
function changePage(page) {
    // Aqui você pode implementar a lógica de paginação
    console.log('Mudando para página:', page);
    alert(`Funcionalidade de paginação será implementada em breve! Página ${page}`);
}

// Event listeners para filtros de área
document.querySelectorAll('.filter-options button').forEach(button => {
    button.addEventListener('click', function() {
        // Remove active de todos os botões
        document.querySelectorAll('.filter-options button').forEach(btn => btn.classList.remove('active'));
        // Adiciona active ao botão clicado
        this.classList.add('active');
    });
});

// Event listener para busca em tempo real
document.getElementById('search-courses').addEventListener('input', function() {
    if (this.value.length > 2 || this.value.length === 0) {
        searchCourses();
    }
});
</script>

<?php
// Finaliza o buffer e inclui o layout
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?> 