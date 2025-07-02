// Dashboard JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Função para editar perfil
    // Função para alternar entre formulários (se necessário)
    window.toggleForm = function() {
        const container = document.getElementById('container');
        if (container) {
            container.classList.toggle('active');
        }
    };

    // Função para logout
    window.handleLogout = async function() {
        try {
            const response = await fetch('/SuaFacul/public/logout', {
                method: 'GET'
            });
            
            if (response.ok) {
                window.location.href = '/SuaFacul/public/login';
            } else {
                alert('Erro ao fazer logout. Tente novamente.');
            }
        } catch (error) {
            console.error('Erro ao fazer logout:', error);
            alert('Erro ao fazer logout. Tente novamente.');
        }
    };

    // Função para carregar estatísticas (se necessário)
    window.carregarEstatisticas = function() {
        // Implementar carregamento de estatísticas dinâmicas
        console.log('Carregando estatísticas...');
    };

    // Função para navegar para seções específicas
    window.navegarParaSecao = function(secao) {
        window.location.href = `/SuaFacul/public/${secao}`;
    };

    // Inicializar funcionalidades do dashboard
    console.log('Dashboard carregado com sucesso!');
}); 