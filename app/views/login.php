<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuaFacul - Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/SuaFacul/public/css/pages/loginstyle.css">
</head>
<body>
    <button type="button" onclick="window.location.href='/SuaFacul/public/home';" class="voltar-btn" aria-label="Voltar para a home">
        <i class='bx bx-arrow-back'></i> Voltar
    </button>
    <div class="container" id="container">
        <!-- Formulário de Login -->
        <div class="form-box login">
            <form id="login-form" action="">
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
        // Função para alternar entre formulários
        function toggleForm() {
            const container = document.getElementById('container');
            container.classList.toggle('active');
        }

        // Login
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('login-username').value;
            const password = document.getElementById('login-password').value;
            const alertDiv = document.getElementById('login-alert');
            
            const formData = new FormData();
            formData.append('username', username);
            formData.append('password', password);
            
            fetch('/SuaFacul/public/api/usuario/login', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alertDiv.innerHTML = '<div class="alert success">Login realizado com sucesso! ...</div>';
                    setTimeout(() => {
                        window.location.href = '/SuaFacul/public/dashboard';
                    }, 1000);
                } else {
                    alertDiv.innerHTML = `<div class="alert error">${data.message}</div>`;
                }
            })
            .catch(error => {
                alertDiv.innerHTML = '<div class="alert error">Erro ao fazer login. Tente novamente.</div>';
            });
        });

        // Registro
        document.getElementById('register-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('register-username').value;
            const email = document.getElementById('register-email').value;
            const password = document.getElementById('register-password').value;
            const alertDiv = document.getElementById('register-alert');
            
            const formData = new FormData();
            formData.append('username', username);
            formData.append('email', email);
            formData.append('password', password);
            
            fetch('/SuaFacul/public/api/usuario/registrar', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alertDiv.innerHTML = '<div class="alert success">Usuário registrado com sucesso!</div>';
                    setTimeout(() => {
                        toggleForm();
                    }, 1000);
                } else {
                    alertDiv.innerHTML = `<div class="alert error">${data.message}</div>`;
                }
            })
            .catch(error => {
                alertDiv.innerHTML = '<div class="alert error">Erro ao registrar. Tente novamente.</div>';
            });
        });
    </script>
</body>
</html> 