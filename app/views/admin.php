<?php
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - SuaFacul</title>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/style.css">
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/admin.css">
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
                <a href="/SuaFacul/public/dashboard">Perfil</a>
                <a href="/SuaFacul/public/cursos">Cursos</a>
                <a href="/SuaFacul/public/faculdades">Faculdades</a>
                <a href="/SuaFacul/public/vestibulares">Vestibulares</a>
                <a href="/SuaFacul/public/admin" class="active">Admin</a>
                <a href="/SuaFacul/public/logout" class="btn-admin">Sair</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="admin-container">
            <div class="admin-header">
                <h1><i class="fas fa-shield-alt"></i> Painel Administrativo</h1>
                <p>Gerencie usuários, conteúdo e configurações do sistema</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number" id="total-users">0</div>
                    <div class="stat-label">Total de Usuários</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">128</div>
                    <div class="stat-label">Cursos Cadastrados</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">45</div>
                    <div class="stat-label">Faculdades</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Vestibulares</div>
                </div>
            </div>

            <div class="admin-tabs">
                <button class="tab-button active" onclick="openTab('users')">
                    <i class="fas fa-users"></i> Gerenciar Usuários
                </button>
                <button class="tab-button" onclick="openTab('content')">
                    <i class="fas fa-file-alt"></i> Gerenciar Conteúdo
                </button>
                <button class="tab-button" onclick="openTab('settings')">
                    <i class="fas fa-cog"></i> Configurações
                </button>
            </div>

            <!-- Tab Usuários -->
            <div id="users" class="tab-content active">
                <div class="search-bar">
                    <input type="text" id="search-input" class="search-input" placeholder="Buscar usuários...">
                    <button class="btn-admin" onclick="buscarUsuarios()">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                    <button class="btn-admin btn-success" onclick="abrirModalAdicionar()">
                        <i class="fas fa-plus"></i> Adicionar Usuário
                    </button>
                </div>

                <div id="users-alert"></div>
                <div id="users-loading" class="loading" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i> Carregando usuários...
                </div>

                <table class="users-table" id="users-table" style="display: none;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome de Usuário</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="users-list">
                    </tbody>
                </table>
            </div>

            <!-- Tab Conteúdo -->
            <div id="content" class="tab-content">
                <h2>Gerenciamento de Conteúdo</h2>
                <p>Funcionalidade em desenvolvimento...</p>
            </div>

            <!-- Tab Configurações -->
            <div id="settings" class="tab-content">
                <h2>Configurações do Sistema</h2>
                <p>Funcionalidade em desenvolvimento...</p>
            </div>
        </div>
    </main>

    <!-- Modal Adicionar/Editar Usuário -->
    <div id="user-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modal-title">Adicionar Usuário</h2>
                <span class="close" onclick="fecharModal()">&times;</span>
            </div>
            <div id="modal-alert"></div>
            <form id="user-form">
                <input type="hidden" id="user-id">
                <div class="form-group">
                    <label for="username">Nome de Usuário:</label>
                    <input type="text" id="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" id="password">
                    <small>Deixe em branco para manter a senha atual (ao editar)</small>
                </div>
                <div style="text-align: right;">
                    <button type="button" class="btn-admin btn-secondary" onclick="fecharModal()">Cancelar</button>
                    <button type="submit" class="btn-admin">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de Confirmação -->
    <div id="confirm-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Confirmar Exclusão</h2>
                <span class="close" onclick="fecharConfirmModal()">&times;</span>
            </div>
            <p id="confirm-message">Tem certeza que deseja excluir este usuário?</p>
            <div style="text-align: right;">
                <button class="btn-admin btn-secondary" onclick="fecharConfirmModal()">Cancelar</button>
                <button class="btn-admin btn-danger" onclick="confirmarExclusao()">Excluir</button>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 SuaFacul. Todos os direitos reservados.</p>
        </div>
    </footer>
    
    <script src="/SuaFacul/public/js/admin.js"></script>
</body>
</html> 