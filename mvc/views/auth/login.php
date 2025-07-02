<?php
$page_title = 'Login';
$page_css = 'loginstyle';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> | SuaFacul</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo getAssetPath('css/pages/loginstyle.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container" id="container">
        <!-- Formulário de Login -->
        <div class="form-box login">
            <form id="login-form">
                <h1>Entrar</h1>
                <div id="login-alert"></div>
                <div class="input-box">
                    <input type="text" id="login-username" placeholder="Usuário ou Email" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" id="login-password" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <button type="submit" class="btn" id="login-btn">Entrar</button>
                <p>Entrar com uma plataforma</p>
                <div class="social-icons">
                    <a href="https://accounts.google.com/"><i class='bx bxl-google'></i></a>
                </div>
            </form>
        </div>

        <!-- Formulário de Registro -->
        <div class="form-box register">
            <form id="register-form">
                <h1>Registro</h1>
                <div id="register-alert"></div>
                <div class="input-box">
                    <input type="text" id="register-username" placeholder="Nome de Usuário" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" id="register-email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" id="register-password" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn" id="register-btn">Registrar</button>
                <p>Registrar com uma plataforma</p>
                <div class="social-icons">
                    <a href="https://accounts.google.com/"><i class='bx bxl-google'></i></a>
                </div>
            </form>
        </div>

        <!-- Painel de Transição -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Olá, bem-vindo!</h1>
                <p>Não tem uma conta?</p>
                <button class="btn register-btn" onclick="toggleForm()">Registrar</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Bem-vindo de volta!</h1>
                <p>Tem uma conta?</p>
                <button class="btn login-btn" onclick="toggleForm()">Entrar</button>
            </div>
        </div>
    </div>

<script>
// Alternar entre formulários
function toggleForm() {
    const container = document.getElementById('container');
    container.classList.toggle('active');
}

// Processar login
document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const username = document.getElementById('login-username').value;
    const password = document.getElementById('login-password').value;
    const alertDiv = document.getElementById('login-alert');
    
    // Limpar alertas anteriores
    alertDiv.innerHTML = '';
    
    if (!username || !password) {
        showAlert(alertDiv, 'Por favor, preencha todos os campos.', 'error');
        return;
    }
    
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    
    fetch('/SuaFacul/usuario/login', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showAlert(alertDiv, data.message, 'success');
            setTimeout(() => {
                window.location.href = '/SuaFacul/';
            }, 1500);
        } else {
            showAlert(alertDiv, data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        showAlert(alertDiv, 'Erro ao fazer login. Tente novamente.', 'error');
    });
});

// Processar registro
document.getElementById('register-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const username = document.getElementById('register-username').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;
    const alertDiv = document.getElementById('register-alert');
    
    // Limpar alertas anteriores
    alertDiv.innerHTML = '';
    
    if (!username || !email || !password) {
        showAlert(alertDiv, 'Por favor, preencha todos os campos.', 'error');
        return;
    }
    
    if (password.length < 6) {
        showAlert(alertDiv, 'A senha deve ter pelo menos 6 caracteres.', 'error');
        return;
    }
    
    const formData = new FormData();
    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('confirm_password', password);
    
    fetch('/SuaFacul/usuario/registrar', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showAlert(alertDiv, data.message, 'success');
            setTimeout(() => {
                // Alterna para o formulário de login após registro bem-sucedido
                toggleForm();
                document.getElementById('login-form').reset();
                alertDiv.innerHTML = '';
            }, 1500);
        } else {
            showAlert(alertDiv, data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        showAlert(alertDiv, 'Erro ao registrar. Tente novamente.', 'error');
    });
});

// Função para mostrar alertas
function showAlert(container, message, type) {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-error';
    container.innerHTML = `<div class="${alertClass}">${message}</div>`;
}

// Verificar se há mensagem de erro na URL
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    if (error) {
        const alertDiv = document.getElementById('login-alert');
        showAlert(alertDiv, decodeURIComponent(error), 'error');
    }
});
</script>
</body>
</html> 