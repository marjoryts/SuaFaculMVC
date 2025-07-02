<?php
$page_title = 'Meu Perfil';
$page_css = 'perfil';

// Captura o conteúdo para o layout
ob_start();
?>

<section class="hero">
    <h1>Meu Perfil</h1>
    <p>Gerencie suas informações pessoais</p>
</section>

<section class="perfil-container">
    <div class="perfil-card">
        <div class="perfil-header">
            <h2><?php echo htmlspecialchars($_SESSION['username'] ?? 'Usuário'); ?></h2>
            <p><?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?></p>
        </div>

        <form id="perfilForm" class="perfil-form">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="username">Nome de Usuário</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($usuario['nome_usuario'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email'] ?? ''); ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-salvar">Salvar Alterações</button>
                <button type="button" class="btn-cancelar" onclick="resetForm()">Cancelar</button>
            </div>
        </form>
    </div>
</section>

<script>
// Atualizar perfil
document.getElementById('perfilForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    formData.append('id', '<?php echo $_SESSION['id'] ?? ''; ?>');
    
    fetch('/SuaFacul/usuario/atualizar', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Perfil atualizado com sucesso!');
        } else {
            alert('Erro: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao atualizar perfil. Tente novamente.');
    });
});

function resetForm() {
    // Recarrega os dados do usuário
    location.reload();
}
</script>

<?php
// Finaliza o buffer e inclui o layout
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?> 