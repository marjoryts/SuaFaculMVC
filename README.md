Deploy SuaFacul


# O que é o projeto SuaFacul?
Este é um projeto incetivado pela Fatec de Ferraz de Vasconcelos que consiste na criação de uma plataforma 
gratuita e acessível, projetada para facilitar o acesso ao ensino superior, tanto público quanto privado. 
A plataforma será equipada com uma série de ferramentas e funcionalidades que permitem aos usuários realizar 
pesquisas detalhadas e aplicar filtros personalizados para identificar as melhores opções disponíveis. 
Entre as características da plataforma, destacam-se a capacidade de comparar preços de cursos, localizar 
instituições de ensino mais próximas de suas residências e consultar a métrica utilizada para calcular a 
nota de corte das universidades.

## Ferramentas
Estaremos trabalhando com as ferramentas PHP, JAVA, JavaScript, HTML, CSS e Figma.

## Equipe
Oprojeto está sendo desenvolvido por Erick Dantas, Gabriella Sampaio Gomes de Castro, Marjory Teixeira de Sousa e Vinicius Henrique Amorim Codo.

## Estrutura do Projeto

```
SuaFacul/
├── app/
│   ├── controllers/
│   │   └── UsuarioController.php
│   ├── models/
│   │   └── Usuario.php
│   └── views/
│       ├── home.php
│       ├── login.php
│       ├── cursos.php
│       ├── faculdades.php
│       ├── vestibulares.php
│       ├── testevocacional.php
│       ├── sobrenos.php
│       ├── ajuda.php
│       └── 404.php
├── config/
│   └── database.php
├── public/
│   ├── css/
│   ├── imagens/
│   ├── script.js
│   ├── cursos.js
│   ├── .htaccess
│   └── index.php
├── vendor/
├── composer.json
└── README_MVC.md
```

## Como Funciona

### 1. Ponto de Entrada
- Todas as requisições passam pelo `public/index.php`
- O arquivo `.htaccess` redireciona todas as URLs para o `index.php`

### 2. Router
- O `public/index.php` contém um router simples que direciona as URLs para as views corretas
- URLs da API são direcionadas para os controllers

### 3. Controllers
- `UsuarioController.php` gerencia todas as operações de usuário (CRUD)
- Métodos: registrar, login, logout, listar, buscar, atualizar, deletar

### 4. Models
- `Usuario.php` contém toda a lógica de negócio e acesso ao banco de dados
- Usa PDO para conexão segura com MySQL

### 5. Views
- Arquivos PHP que incluem o conteúdo HTML original
- Apenas os caminhos dos arquivos foram ajustados para funcionar com a estrutura MVC

## URLs da Aplicação

### Páginas
- `/SuaFacul/public/` - Página inicial
- `/SuaFacul/public/login` - Login/Registro
- `/SuaFacul/public/cursos` - Página de cursos
- `/SuaFacul/public/faculdades` - Página de faculdades
- `/SuaFacul/public/vestibulares` - Página de vestibulares
- `/SuaFacul/public/testevocacional` - Teste vocacional
- `/SuaFacul/public/sobrenos` - Sobre nós
- `/SuaFacul/public/ajuda` - Ajuda

### API Endpoints
- `POST /SuaFacul/public/api/usuario/registrar` - Registrar usuário
- `POST /SuaFacul/public/api/usuario/login` - Fazer login
- `GET /SuaFacul/public/api/usuario/logout` - Fazer logout
- `GET /SuaFacul/public/api/usuario/listar` - Listar usuários
- `GET /SuaFacul/public/api/usuario/buscar?id=X` - Buscar usuário por ID
- `POST /SuaFacul/public/api/usuario/atualizar` - Atualizar usuário
- `POST /SuaFacul/public/api/usuario/deletar` - Deletar usuário

## Configuração do Banco de Dados

O arquivo `config/database.php` contém as configurações de conexão:
- Host: localhost
- Database: Suafacul_crud
- Username: root
- Password: (vazio)

## Como Testar

1. Certifique-se de que o XAMPP está rodando (Apache e MySQL)
2. Acesse: `http://localhost/SuaFacul/public/`
3. Teste o login/registro em: `http://localhost/SuaFacul/public/login`

## Vantagens da Estrutura MVC

1. **Separação de Responsabilidades**: Cada parte tem sua função específica
2. **Manutenibilidade**: Código organizado e fácil de manter
3. **Reutilização**: Models e Controllers podem ser reutilizados
4. **Segurança**: Validações centralizadas nos controllers
5. **Escalabilidade**: Fácil adicionar novas funcionalidades

## Próximos Passos

1. Adicionar mais controllers para outras entidades (cursos, faculdades, etc.)
2. Implementar sistema de autenticação mais robusto
3. Adicionar validações mais avançadas
4. Implementar sistema de templates
5. Adicionar logs e tratamento de erros 