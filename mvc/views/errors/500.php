<?php
$page_title = 'Erro interno do servidor';
$page_css = 'errors';
?>

<div class="error-container">
    <div class="error-content">
        <div class="error-icon">
            <i class="fas fa-server"></i>
        </div>
        <h1>500</h1>
        <h2>Erro interno do servidor</h2>
        <p>Ocorreu um erro inesperado. Nossa equipe foi notificada e está trabalhando para resolver o problema.</p>
        <div class="error-actions">
            <a href="/" class="btn-primary">Voltar ao início</a>
            <a href="/contato" class="btn-secondary">Reportar problema</a>
        </div>
    </div>
</div>

<style>
.error-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 60vh;
    padding: 2rem;
}

.error-content {
    text-align: center;
    max-width: 500px;
}

.error-icon {
    font-size: 4rem;
    color: #dc3545;
    margin-bottom: 1rem;
}

.error-content h1 {
    font-size: 6rem;
    color: #dc3545;
    margin: 0;
    font-weight: bold;
}

.error-content h2 {
    font-size: 2rem;
    color: #333;
    margin: 1rem 0;
}

.error-content p {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-primary, .btn-secondary {
    padding: 12px 24px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #545b62;
}
</style> 