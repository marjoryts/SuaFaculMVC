<?php
// Página dashboard
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - SuaFacul</title>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/style.css">
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/dashboard.css">
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
                <a href="/SuaFacul/public/">Início</a>
                <a href="/SuaFacul/public/cursos">Cursos</a>
                <a href="/SuaFacul/public/faculdades">Faculdades</a>
                <a href="/SuaFacul/public/vestibulares">Vestibulares</a>
                <a href="/SuaFacul/public/admin">Admin</a>
                <a href="/SuaFacul/public/logout" class="btn-dashboard">Sair</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1><i class="fas fa-user-circle"></i> Dashboard do Usuário</h1>
                <div class="user-info">
                    <h2>Bem-vindo, <?php echo htmlspecialchars($usuario['nome_usuario']); ?>!</h2>
                    <p><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($usuario['email']); ?></p>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Cursos Favoritos</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Faculdades Salvas</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Vestibulares</div>
                    </div>
                </div>
            </div>

            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h3><i class="fas fa-graduation-cap"></i> Meus Cursos</h3>
                    <p>Gerencie seus cursos favoritos e acompanhe suas preferências de estudo.</p>
                    <a href="/SuaFacul/public/cursos" class="btn-dashboard">Ver Cursos</a>
                </div>

                <div class="dashboard-card">
                    <h3><i class="fas fa-university"></i> Minhas Faculdades</h3>
                    <p>Visualize as faculdades que você salvou e compare opções.</p>
                    <a href="/SuaFacul/public/faculdades" class="btn-dashboard">Ver Faculdades</a>
                </div>

                <div class="dashboard-card">
                    <h3><i class="fas fa-calendar-alt"></i> Vestibulares</h3>
                    <p>Acompanhe as datas dos vestibulares e prepare-se para as provas.</p>
                    <a href="/SuaFacul/public/vestibulares" class="btn-dashboard">Ver Vestibulares</a>
                </div>

                <div class="dashboard-card">
                    <h3><i class="fas fa-chart-line"></i> Teste Vocacional</h3>
                    <p>Faça o teste vocacional e descubra qual curso combina mais com você.</p>
                    <a href="/SuaFacul/public/testevocacional" class="btn-dashboard">Fazer Teste</a>
                </div>

                <div class="dashboard-card">
                    <h3><i class="fas fa-cog"></i> Configurações</h3>
                    <p>Atualize suas informações pessoais e preferências da conta.</p>
                    <button class="btn-dashboard" onclick="editarPerfil()">Editar Perfil</button>
                </div>

                <div class="dashboard-card">
                    <h3><i class="fas fa-shield-alt"></i> Área Administrativa</h3>
                    <p>Acesse ferramentas administrativas para gerenciar usuários e conteúdo.</p>
                    <a href="/SuaFacul/public/admin" class="btn-dashboard">Acessar Admin</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 SuaFacul. Todos os direitos reservados.</p>
        </div>
    </footer>
    
    <!-- Modal Editar Perfil -->
    <div id="perfil-modal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); justify-content:center; align-items:center; z-index:9999;">
        <div class="modal-content" style="background:#fff; padding:2rem; border-radius:10px; min-width:300px; max-width:90vw; margin:auto; position:relative;">
            <div class="modal-header" style="display:flex; justify-content:space-between; align-items:center;">
                <h2>Editar Perfil</h2>
                <span class="close" onclick="fecharPerfilModal()" style="cursor:pointer; font-size:2rem;">&times;</span>
            </div>
            <div id="perfil-alert"></div>
            <form id="perfil-form">
                <div class="form-group">
                    <label for="perfil-username">Nome de Usuário:</label>
                    <input type="text" id="perfil-username" required>
                </div>
                <div class="form-group">
                    <label for="perfil-email">Email:</label>
                    <input type="email" id="perfil-email" required>
                </div>
                <div class="form-group">
                    <label for="perfil-password">Nova Senha:</label>
                    <input type="password" id="perfil-password">
                    <small>Deixe em branco para manter a senha atual</small>
                </div>
                <div style="text-align: right;">
                    <button type="button" onclick="fecharPerfilModal()">Cancelar</button>
                    <button type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="/SuaFacul/public/js/dashboard.js"></script>
    <script>
    window.editarPerfil = function() {
        document.getElementById('perfil-username').value = "<?php echo htmlspecialchars($usuario['nome_usuario']); ?>";
        document.getElementById('perfil-email').value = "<?php echo htmlspecialchars($usuario['email']); ?>";
        document.getElementById('perfil-password').value = '';
        document.getElementById('perfil-alert').innerHTML = '';
        document.getElementById('perfil-modal').style.display = 'flex';
    };
    window.fecharPerfilModal = function() {
        document.getElementById('perfil-modal').style.display = 'none';
    };
    document.getElementById('perfil-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.getElementById('perfil-username').value;
        const email = document.getElementById('perfil-email').value;
        const password = document.getElementById('perfil-password').value;
        const alertDiv = document.getElementById('perfil-alert');
        const formData = new FormData();
        formData.append('id', "<?php echo htmlspecialchars($usuario['id']); ?>");
        formData.append('username', username);
        formData.append('email', email);
        if (password) formData.append('password', password);
        fetch('/SuaFacul/public/api/usuario/atualizar', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alertDiv.innerHTML = '<div class="alert success">Perfil atualizado com sucesso!</div>';
                setTimeout(() => { window.location.reload(); }, 1000);
            } else {
                alertDiv.innerHTML = `<div class=\"alert error\">${data.message}</div>`;
            }
        })
        .catch(() => {
            alertDiv.innerHTML = '<div class="alert error">Erro ao atualizar perfil.</div>';
        });
    });
    </script>
</body>
</html> 