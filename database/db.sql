-- Tabela Usuários
CREATE TABLE usuarios (
    id INT(1) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL,
    token VARCHAR(100)
);

-- Tabela de Eventos
CREATE TABLE eventos (
    eve_id INT(1) AUTO_INCREMENT PRIMARY KEY,
    usu_id INT(1) NOT NULL,
    title VARCHAR(90),
    description TEXT,
    color VARCHAR(10) DEFAULT 'blue',
    start DATETIME,
    end DATETIME
);