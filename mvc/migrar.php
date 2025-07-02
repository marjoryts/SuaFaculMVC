<?php

$config = [
    'new_db' => [
        'host' => 'localhost',
        'db_name' => 'Suafacul_crud',
        'username' => 'root',
        'password' => ''
    ]
];

echo "=== Script de Migração SuaFacul MVC ===\n\n";

function verificarTabelas($pdo) {
    $tabelas_necessarias = [
        'usuarios',
        'faculdades', 
        'cursos',
        'vestibulares'
    ];
    
    $tabelas_existentes = [];
    $stmt = $pdo->query("SHOW TABLES");
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $tabelas_existentes[] = $row[0];
    }
    
    echo "Tabelas existentes: " . implode(', ', $tabelas_existentes) . "\n";
    
    $faltantes = array_diff($tabelas_necessarias, $tabelas_existentes);
    if (!empty($faltantes)) {
        echo "Tabelas faltantes: " . implode(', ', $faltantes) . "\n";
        return false;
    }
    
    return true;
}

function criarTabelas($pdo) {
    echo "Criando tabelas...\n";
    
    // Tabela usuarios
    $sql_usuarios = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_usuario VARCHAR(50) UNIQUE NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        senha VARCHAR(255) NOT NULL,
        data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    // Tabela faculdades
    $sql_faculdades = "CREATE TABLE IF NOT EXISTS faculdades (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(200) NOT NULL,
        cidade VARCHAR(100) NOT NULL,
        estado VARCHAR(50) NOT NULL,
        tipo ENUM('pública', 'particular') NOT NULL,
        imagem VARCHAR(255),
        descricao TEXT,
        endereco TEXT,
        telefone VARCHAR(20),
        website VARCHAR(255),
        destaque BOOLEAN DEFAULT FALSE,
        data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    // Tabela cursos
    $sql_cursos = "CREATE TABLE IF NOT EXISTS cursos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(200) NOT NULL,
        area VARCHAR(100) NOT NULL,
        duracao VARCHAR(50) NOT NULL,
        tipo ENUM('presencial', 'híbrido', 'EaD') NOT NULL,
        descricao TEXT,
        grade_curricular TEXT,
        mercado_trabalho TEXT,
        data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    // Tabela vestibulares
    $sql_vestibulares = "CREATE TABLE IF NOT EXISTS vestibulares (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(200) NOT NULL,
        instituicao VARCHAR(200) NOT NULL,
        data_prova DATE NOT NULL,
        data_inscricao_inicio DATE,
        data_inscricao_fim DATE,
        descricao TEXT,
        link_inscricao VARCHAR(255),
        status ENUM('aberto', 'fechado', 'em espera') DEFAULT 'em espera',
        data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    try {
        $pdo->exec($sql_usuarios);
        $pdo->exec($sql_faculdades);
        $pdo->exec($sql_cursos);
        $pdo->exec($sql_vestibulares);
        echo "Tabelas criadas com sucesso!\n";
        return true;
    } catch (PDOException $e) {
        echo "Erro ao criar tabelas: " . $e->getMessage() . "\n";
        return false;
    }
}

// Insere dados de exemplo
function inserirDadosExemplo($pdo) {
    echo "Inserindo dados de exemplo...\n";
    
    // Faculdades de exemplo
    $faculdades = [
        ['USP (Universidade de São Paulo)', 'São Paulo', 'SP', 'pública', 'imagens/usp.jpg', 'Uma das principais universidades do Brasil', 'Butantã, São Paulo - SP', '(11) 3091-4000', 'https://www.usp.br', 1],
        ['FATEC (Faculdade de Tecnologia)', 'Ferraz de Vasconcelos', 'SP', 'pública', 'imagens/fatecfv.jpeg', 'Faculdade de Tecnologia do Estado de São Paulo', 'Ferraz de Vasconcelos - SP', '(11) 4678-0000', 'https://www.fatec.sp.gov.br', 1],
        ['UNICAMP (Universidade de Campinas)', 'Campinas', 'SP', 'pública', 'imagens/unicamp.jpg', 'Universidade Estadual de Campinas', 'Campinas - SP', '(19) 3521-0000', 'https://www.unicamp.br', 1],
        ['UNIFESP (Universidade Federal de São Paulo)', 'São Paulo', 'SP', 'pública', 'imagens/unifesp.jpg', 'Universidade Federal de São Paulo', 'São Paulo - SP', '(11) 3385-0000', 'https://www.unifesp.br', 1]
    ];
    
    $stmt = $pdo->prepare("INSERT INTO faculdades (nome, cidade, estado, tipo, imagem, descricao, endereco, telefone, website, destaque) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    foreach ($faculdades as $faculdade) {
        try {
            $stmt->execute($faculdade);
        } catch (PDOException $e) {
            // Ignora se já existir
        }
    }
    
    // Cursos de exemplo
    $cursos = [
        ['Análise e Desenvolvimento de Sistemas', 'Tecnologia', '3 anos', 'presencial', 'Curso focado em desenvolvimento de software', 'Programação, Banco de Dados, Engenharia de Software', 'Desenvolvedor, Analista de Sistemas'],
        ['Medicina', 'Saúde', '6 anos', 'presencial', 'Formação de médicos', 'Anatomia, Fisiologia, Clínica Médica', 'Médico, Especialista'],
        ['Engenharia de Software', 'Tecnologia', '4 anos', 'presencial', 'Engenharia focada em software', 'Programação, Arquitetura de Software, Gestão de Projetos', 'Engenheiro de Software, Arquiteto'],
        ['Administração', 'Negócios', '4 anos', 'presencial', 'Gestão empresarial', 'Marketing, Finanças, Recursos Humanos', 'Administrador, Gerente'],
        ['Direito', 'Ciências Sociais', '5 anos', 'presencial', 'Formação em Direito', 'Direito Civil, Penal, Constitucional', 'Advogado, Juiz, Promotor'],
        ['Letras', 'Humanidades', '4 anos', 'presencial', 'Estudos literários e linguísticos', 'Literatura, Gramática, Linguística', 'Professor, Escritor, Tradutor'],
        ['Ciência da Computação', 'Tecnologia', '4 anos', 'presencial', 'Ciência da computação', 'Algoritmos, Estruturas de Dados, Inteligência Artificial', 'Cientista da Computação, Pesquisador'],
        ['Sistema de Informações', 'Tecnologia', '4 anos', 'presencial', 'Sistemas de informação', 'Banco de Dados, Redes, Gestão de TI', 'Analista de Sistemas, Administrador de TI']
    ];
    
    $stmt = $pdo->prepare("INSERT INTO cursos (nome, area, duracao, tipo, descricao, grade_curricular, mercado_trabalho) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    foreach ($cursos as $curso) {
        try {
            $stmt->execute($curso);
        } catch (PDOException $e) {
            // Ignora se já existir
        }
    }
    
    // Vestibulares de exemplo
    $vestibulares = [
        ['Fuvest', 'Universidade de São Paulo', '2024-11-23', '2024-08-01', '2024-09-15', 'Vestibular da USP', 'https://www.fuvest.br', 'em espera'],
        ['Comvest', 'Universidade Estadual de Campinas', '2024-12-15', '2024-09-01', '2024-10-15', 'Vestibular da UNICAMP', 'https://www.comvest.unicamp.br', 'em espera'],
        ['FATEC', 'Faculdade de Tecnologia do Estado de São Paulo', '2024-06-29', '2024-05-01', '2024-05-31', 'Vestibular FATEC', 'https://www.vestibularfatec.com.br', 'em espera'],
        ['UNESP', 'Universidade Estadual Paulista', '2024-11-02', '2024-08-01', '2024-09-15', 'Vestibular UNESP', 'https://www.vunesp.com.br', 'em espera']
    ];
    
    $stmt = $pdo->prepare("INSERT INTO vestibulares (nome, instituicao, data_prova, data_inscricao_inicio, data_inscricao_fim, descricao, link_inscricao, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    foreach ($vestibulares as $vestibular) {
        try {
            $stmt->execute($vestibular);
        } catch (PDOException $e) {
            // Ignora se já existir
        }
    }
    
    echo "Dados de exemplo inseridos com sucesso!\n";
}

// Função principal
function main() {
    global $config;
    
    try {
        // Conecta ao banco
        $dsn = "mysql:host={$config['new_db']['host']};dbname={$config['new_db']['db_name']};charset=utf8";
        $pdo = new PDO($dsn, $config['new_db']['username'], $config['new_db']['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "Conectado ao banco de dados com sucesso!\n\n";
        
        // Verifica se as tabelas existem
        if (!verificarTabelas($pdo)) {
            echo "Criando tabelas necessárias...\n";
            if (!criarTabelas($pdo)) {
                echo "Erro ao criar tabelas. Abortando migração.\n";
                return;
            }
        }
        
        // Insere dados de exemplo
        inserirDadosExemplo($pdo);
        
        echo "\n=== Migração concluída com sucesso! ===\n";
        echo "Agora você pode acessar o projeto MVC em: http://localhost/SuaFacul/mvc/\n";
        
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage() . "\n";
        echo "Verifique as configurações do banco de dados.\n";
    }
}

main();
?> 