<?php
$page_title = 'Vestibulares';
$page_css = 'vestibulares';

// Captura o conteúdo para o layout
ob_start();
?>

<section class="hero">
    <h1>Vestibulares</h1>
    <p>Encontre os principais vestibulares e suas datas</p>
</section>

<section class="vestibulares-principais">
    <h2>Próximos Vestibulares</h2>
    <div class="vestibulares-grid">
        <?php if (!empty($vestibulares_proximos)): ?>
            <?php foreach ($vestibulares_proximos as $vestibular): ?>
                <div class="vestibular-card">
                    <div class="vestibular-header">
                        <h3><?php echo htmlspecialchars($vestibular['nome']); ?></h3>
                        <span class="data"><?php echo date('d/m/Y', strtotime($vestibular['data_prova'])); ?></span>
                    </div>
                    <div class="vestibular-info">
                        <p><strong>Instituição:</strong> <?php echo htmlspecialchars($vestibular['instituicao']); ?></p>
                        <p><strong>Status:</strong> <span class="status aberto">Inscrições Abertas</span></p>
                    </div>
                    <div class="vestibular-actions">
                        <a href="/SuaFacul/vestibulares/buscar/<?php echo $vestibular['id']; ?>" class="btn-detalhes">Ver Detalhes</a>
                        <a href="#" class="btn-inscrever">Inscrever-se</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum vestibular próximo no momento.</p>
        <?php endif; ?>
    </div>
</section>

<section class="filtros-vestibulares">
    <h2>Filtrar Vestibulares</h2>
    <div class="filtros-container">
        <div class="filtro-grupo">
            <label for="instituicao">Instituição:</label>
            <select id="instituicao">
                <option value="">Todas</option>
                <option value="USP">USP</option>
                <option value="Unicamp">Unicamp</option>
                <option value="Unifesp">Unifesp</option>
            </select>
        </div>
        <div class="filtro-grupo">
            <label for="status">Status:</label>
            <select id="status">
                <option value="">Todos</option>
                <option value="aberto">Inscrições Abertas</option>
                <option value="fechado">Inscrições Fechadas</option>
                <option value="proximo">Próximo</option>
            </select>
        </div>
        <div class="filtro-grupo">
            <label for="mes">Mês:</label>
            <select id="mes">
                <option value="">Todos</option>
                <option value="12">Dezembro</option>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
            </select>
        </div>
        <button class="btn-filtrar" onclick="filtrarVestibulares()">Filtrar</button>
    </div>
</section>

<script>
function filtrarVestibulares() {
    const instituicao = document.getElementById('instituicao').value;
    const status = document.getElementById('status').value;
    const mes = document.getElementById('mes').value;
    
    // Aqui você pode implementar a lógica de filtro
    console.log('Filtrando vestibulares:', { instituicao, status, mes });
    
    // Por enquanto, apenas recarrega a página com os filtros
    const params = new URLSearchParams();
    if (instituicao) params.append('instituicao', instituicao);
    if (status) params.append('status', status);
    if (mes) params.append('mes', mes);
    
    window.location.href = '/SuaFacul/vestibulares?' + params.toString();
}
</script>

<?php
// Finaliza o buffer e inclui o layout
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?> 