# SuaFacul - Estrutura MVC

Este projeto foi refatorado para seguir o padrão MVC (Model-View-Controller) em PHP, proporcionando melhor organização, manutenibilidade e escalabilidade do código.

## 📁 Estrutura de Diretórios

```
mvc/
├── config/
│   └── Database.php          # Configuração de conexão com banco de dados
├── controllers/
│   ├── HomeController.php    # Controlador principal
│   ├── UsuarioController.php # Controlador de usuários
│   ├── FaculdadeController.php # Controlador de faculdades
│   ├── CursoController.php   # Controlador de cursos
│   └── VestibularController.php # Controlador de vestibulares
├── core/
│   └── Router.php           # Sistema de roteamento
├── models/
│   ├── Usuario.php          # Modelo de usuários
│   ├── Faculdade.php        # Modelo de faculdades
│   ├── Curso.php            # Modelo de cursos
│   └── Vestibular.php       # Modelo de vestibulares
├── views/
│   ├── layouts/
│   │   └── main.php         # Layout principal
│   ├── home/
│   │   └── index.php        # Página inicial
│   ├── errors/
│   │   ├── 404.php          # Página de erro 404
│   │   └── 500.php          # Página de erro 500
│   └── ...                  # Outras views
├── .htaccess               # Configurações do Apache
├── index.php               # Ponto de entrada da aplicação
└── README.md               # Esta documentação
```

## 🚀 Como Usar

### 1. Configuração Inicial

1. **Configure o banco de dados** em `mvc/config/Database.php`:
```php
private $host = "localhost";
private $db_name = "Suafacul_crud";
private $username = "root";
private $password = "";
```

2. **Configure o servidor web** para apontar para a pasta `mvc/`

3. **Certifique-se de que o mod_rewrite está habilitado** no Apache

### 2. Estrutura MVC

#### **Models (Modelos)**
- Responsáveis pela lógica de negócio e acesso aos dados
- Localizados em `mvc/models/`
- Cada modelo representa uma entidade do banco de dados

**Exemplo de uso:**
```php
$usuario = new Usuario();
$usuarios = $usuario->listarTodos();
```

#### **Views (Visualizações)**
- Responsáveis pela apresentação dos dados
- Localizadas em `mvc/views/`
- Utilizam o layout principal em `mvc/views/layouts/main.php`

**Exemplo de view:**
```php
<?php
$page_title = 'Título da Página';
$page_css = 'nome-do-css';
?>

<div class="conteudo">
    <h1><?php echo htmlspecialchars($dados['titulo']); ?></h1>
    <!-- Conteúdo da página -->
</div>
```

#### **Controllers (Controladores)**
- Responsáveis por processar requisições e coordenar models e views
- Localizados em `mvc/controllers/`
- Cada controlador gerencia uma área específica da aplicação

**Exemplo de controlador:**
```php
class MeuController {
    private $modelo;
    
    public function __construct() {
        $this->modelo = new MeuModelo();
    }
    
    public function listar() {
        $dados = $this->modelo->listarTodos();
        include 'mvc/views/minha-view.php';
    }
}
```

### 3. Sistema de Rotas

O sistema de rotas está configurado em `mvc/core/Router.php`:

```php
// Rotas GET
$this->get('/caminho', 'Controller', 'metodo');

// Rotas POST
$this->post('/caminho', 'Controller', 'metodo');
```

**Rotas disponíveis:**
- `/` - Página inicial
- `/usuario/login` - Login de usuário
- `/usuario/registrar` - Registro de usuário
- `/faculdades` - Lista de faculdades
- `/cursos` - Lista de cursos
- `/vestibulares` - Lista de vestibulares

### 4. Adicionando Novas Funcionalidades

#### **Criar um novo Model:**
1. Crie o arquivo em `mvc/models/NovoModelo.php`
2. Estenda a funcionalidade conforme necessário
3. Implemente os métodos CRUD básicos

#### **Criar um novo Controller:**
1. Crie o arquivo em `mvc/controllers/NovoController.php`
2. Implemente os métodos necessários
3. Adicione as rotas no Router.php

#### **Criar uma nova View:**
1. Crie o arquivo em `mvc/views/nova-view.php`
2. Use o layout principal incluindo as variáveis necessárias
3. Implemente a apresentação dos dados

### 5. Exemplos de Uso

#### **Fazer uma requisição AJAX:**
```javascript
fetch('/usuario/login', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: 'username=usuario&password=senha'
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        console.log('Login realizado com sucesso!');
    }
});
```

#### **Acessar dados do banco:**
```php
$faculdade = new Faculdade();
$faculdades_sp = $faculdade->buscarPorCidade('São Paulo');
```

#### **Renderizar uma view:**
```php
$dados = ['titulo' => 'Minha Página', 'conteudo' => 'Conteúdo aqui'];
include 'mvc/views/minha-view.php';
```

## 🔧 Configurações Adicionais

### **Variáveis de Ambiente**
Crie um arquivo `.env` na raiz do projeto para configurações sensíveis:
```
DB_HOST=localhost
DB_NAME=Suafacul_crud
DB_USER=root
DB_PASS=
```

### **Logs**
Os logs de erro são salvos automaticamente. Configure o nível de log conforme necessário.

### **Cache**
O sistema inclui configurações de cache para arquivos estáticos no `.htaccess`.

## 📝 Convenções de Código

- **Nomes de classes:** PascalCase (ex: `UsuarioController`)
- **Nomes de métodos:** camelCase (ex: `buscarPorId`)
- **Nomes de variáveis:** camelCase (ex: `nomeUsuario`)
- **Nomes de arquivos:** PascalCase para classes (ex: `Usuario.php`)
- **Comentários:** Use PHPDoc para documentar classes e métodos

## 🐛 Debugging

Para ativar o modo debug, configure em `mvc/index.php`:
```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

## 📚 Recursos Adicionais

- **Validação:** Implementada nos controladores
- **Segurança:** Proteção contra SQL Injection e XSS
- **Sessões:** Gerenciamento automático de sessões
- **Respostas JSON:** Para APIs e requisições AJAX

## 🤝 Contribuição

1. Siga as convenções de código estabelecidas
2. Documente novas funcionalidades
3. Teste suas alterações antes de commitar
4. Use commits descritivos

---

**Desenvolvido por:** Equipe SuaFacul  
**Versão:** 2.0 (MVC)  
**Data:** 2024 