// Admin JavaScript
let deleteUserId = null;

document.addEventListener('DOMContentLoaded', function() {
    carregarUsuarios();
});

function openTab(tabName) {
    const tabContents = document.getElementsByClassName('tab-content');
    for (let content of tabContents) {
        content.classList.remove('active');
    }

    const tabButtons = document.getElementsByClassName('tab-button');
    for (let button of tabButtons) {
        button.classList.remove('active');
    }
    document.getElementById(tabName).classList.add('active');
    
    event.target.classList.add('active');
}

function carregarUsuarios() {
    const loading = document.getElementById('users-loading');
    const table = document.getElementById('users-table');
    const alert = document.getElementById('users-alert');

    loading.style.display = 'block';
    table.style.display = 'none';
    alert.textContent = '';

    fetch('/SuaFacul/public/api/usuario/listar')
        .then(response => response.json())
        .then(data => {
            loading.style.display = 'none';
            
            if (data.success) {
                table.style.display = 'table';
                renderizarUsuarios(data.usuarios);
                document.getElementById('total-users').textContent = data.usuarios.length;
            } else {
                alert.innerHTML = `<div class="alert error">${data.message}</div>`;
            }
        })
        .catch(error => {
            loading.style.display = 'none';
            alert.innerHTML = '<div class="alert error">Erro ao carregar usuários.</div>';
        });
}

function renderizarUsuarios(usuarios) {
    const tbody = document.getElementById('users-list');
    tbody.innerHTML = '';

    usuarios.forEach(user => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.nome_usuario}</td>
            <td>${user.email}</td>
            <td class="user-actions">
                <button class="btn-admin btn-warning" onclick="editarUsuario(${user.id}, '${user.nome_usuario}', '${user.email}')">
                    <i class="fas fa-edit"></i> Editar
                </button>
                <button class="btn-admin btn-danger" onclick="excluirUsuario(${user.id})">
                    <i class="fas fa-trash"></i> Excluir
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function buscarUsuarios() {
    const searchTerm = document.getElementById('search-input').value;
    carregarUsuarios(searchTerm);
}

function abrirModalAdicionar() {
    document.getElementById('modal-title').textContent = 'Adicionar Usuário';
    document.getElementById('user-form').reset();
    document.getElementById('user-id').value = '';
    document.getElementById('user-modal').style.display = 'block';
}

function editarUsuario(id, username, email) {
    document.getElementById('modal-title').textContent = 'Editar Usuário';
    document.getElementById('user-id').value = id;
    document.getElementById('username').value = username;
    document.getElementById('email').value = email;
    document.getElementById('password').value = '';
    document.getElementById('user-modal').style.display = 'block';
}

function fecharModal() {
    document.getElementById('user-modal').style.display = 'none';
}

function fecharConfirmModal() {
    document.getElementById('confirm-modal').style.display = 'none';
    deleteUserId = null;
}

function confirmarExclusao() {
    if (!deleteUserId) return;

    const formData = new FormData();
    formData.append('id', deleteUserId);

    fetch('/SuaFacul/public/api/usuario/deletar', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        fecharConfirmModal();
        if (data.success) {
            document.getElementById('users-alert').innerHTML = `<div class="alert success">${data.message}</div>`;
            carregarUsuarios();
        } else {
            document.getElementById('users-alert').innerHTML = `<div class="alert error">${data.message}</div>`;
        }
    })
    .catch(error => {
        fecharConfirmModal();
        document.getElementById('users-alert').innerHTML = '<div class="alert error">Erro ao excluir usuário.</div>';
    });
}

function excluirUsuario(id) {
    if (confirm('Tem certeza que deseja excluir este usuário?')) {
        const formData = new FormData();
        formData.append('id', id);

        fetch('/SuaFacul/public/api/usuario/deletar', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('users-alert').innerHTML = `<div class="alert success">${data.message}</div>`;
                carregarUsuarios();
            } else {
                document.getElementById('users-alert').innerHTML = `<div class="alert error">${data.message}</div>`;
            }
        })
        .catch(error => {
            document.getElementById('users-alert').innerHTML = '<div class="alert error">Erro ao excluir usuário.</div>';
        });
    }
}

function handleLogout() {
    window.location.href = '/SuaFacul/public/logout';
}

function irParaDashboard() {
    window.location.href = '/SuaFacul/public/dashboard';
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('user-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const userId = document.getElementById('user-id').value;
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const formData = new FormData();
        formData.append('username', username);
        formData.append('email', email);
        if (password) {
            formData.append('password', password);
        }

        const url = userId ? '/SuaFacul/public/api/usuario/atualizar' : '/SuaFacul/public/api/usuario/registrar';
        if (userId) {
            formData.append('id', userId);
        }

        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('modal-alert').innerHTML = `<div class="alert success">${data.message}</div>`;
                fecharModal();
                carregarUsuarios();
            } else {
                document.getElementById('modal-alert').innerHTML = `<div class="alert error">${data.message}</div>`;
            }
        })
        .catch(error => {
            document.getElementById('modal-alert').innerHTML = '<div class="alert error">Erro ao salvar usuário.</div>';
        });
    });

    window.onclick = function(event) {
        const userModal = document.getElementById('user-modal');
        const confirmModal = document.getElementById('confirm-modal');
        if (event.target === userModal) {
            fecharModal();
        }
        if (event.target === confirmModal) {
            fecharConfirmModal();
        }
    }
}); 