<?php
$page_title = 'Página não encontrada';
$page_css = 'errors';
?>

<div class="error-container">
    <div class="error-content">
        <div class="error-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h1>404</h1>
        <h2>Página não encontrada</h2>
        <p>A página que você está procurando não existe ou foi movida.</p>
        <div class="error-actions">
            <a href="/" class="btn-primary">Voltar ao início</a>
            <a href="/ajuda" class="btn-secondary">Precisa de ajuda?</a>
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
    color: #ff6b6b;
    margin-bottom: 1rem;
}

.error-content h1 {
    font-size: 6rem;
    color: #ff6b6b;
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