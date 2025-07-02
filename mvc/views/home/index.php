<?php
$page_title = 'Página Inicial';
$page_css = 'style';

// Captura o conteúdo para o layout
ob_start();
?>

<section class="hero">
    <h1>Seu <em><strong>futuro</strong></em> em um só lugar!</h1>
    <div class="container">
        <div class="container-input">
            <div class="card">
                <label for="curso">Qual curso deseja estudar?</label>
                <input type="text" class="text-input" placeholder="Digite o curso">
                <div class="filtros1">
                    <label><input type="checkbox"> Presencial</label>
                    <label><input type="checkbox"> Híbrido</label>
                    <label><input type="checkbox"> EaD</label>
                </div>
            </div>
            <div class="card">
                <label for="faculdade">Em qual faculdade?</label>
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
            <img src="<?php echo getAssetPath('imagens/usp.jpg'); ?>" alt="USP">
            <h3>USP (Universidade de São Paulo)</h3>
            <p>Butantã - SP</p>
            <a href="/SuaFacul/faculdades/buscar/1">Saiba Mais</a>
        </div>

        <div class="faculdade">
            <img src="<?php echo getAssetPath('imagens/fatecfv.jpeg'); ?>" alt="FATEC">
            <h3>FATEC (Faculdade de Tecnologia)</h3>
            <p>Ferraz de Vasconcelos - SP</p>
            <a href="/SuaFacul/faculdades/buscar/2">Saiba Mais</a>
        </div>
        
        <div class="faculdade">
            <img src="<?php echo getAssetPath('imagens/unicamp.jpg'); ?>" alt="UNICAMP">
            <h3>UNICAMP (Universidade de Campinas)</h3>
            <p>Campinas - SP</p>
            <a href="/SuaFacul/faculdades/buscar/3">Saiba Mais</a>
        </div>

        <div class="faculdade">
            <img src="<?php echo getAssetPath('imagens/unifesp.jpg'); ?>" alt="UNIFESP">
            <h3>UNIFESP (Universidade Federal de São Paulo)</h3>
            <p>São Paulo - SP</p>
            <a href="/SuaFacul/faculdades/buscar/4">Saiba Mais</a>
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
            <a href="/SuaFacul/vestibulares/buscar/1">Saiba mais</a>
        </div>

        <div class="vestibular">
            <h3>Comvest</h3>
            <p>Em espera</p>
            <p>Universidade Estadual de Campinas</p>
            <a href="/SuaFacul/vestibulares/buscar/2">Saiba mais</a>
        </div>

        <div class="vestibular">
            <h3>FATEC</h3>
            <p>29/06</p>
            <p>Faculdade de Tecnologia do Estado de São Paulo</p>
            <a href="/SuaFacul/vestibulares/buscar/3">Saiba mais</a>
        </div>
        
        <div class="vestibular">
            <h3>UNESP</h3>
            <p>02/11</p>
            <p>Universidade Estadual Paulista</p>
            <a href="/SuaFacul/vestibulares/buscar/4">Saiba mais</a>
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

<script>
// Função simples para o botão buscar
document.querySelector('.btn-buscar').addEventListener('click', function() {
    alert('Funcionalidade de busca será implementada em breve!');
});

// Função para pesquisa de cursos
document.querySelector('.pesquisa-container input').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const cursoItems = document.querySelectorAll('.curso-item');
    
    cursoItems.forEach(item => {
        const text = item.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});
</script>

<?php
// Finaliza o buffer e inclui o layout
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?> 