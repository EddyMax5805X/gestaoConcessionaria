-- Criação da base de dados
DROP DATABASE IF EXISTS gestao_concessionaria;
CREATE DATABASE gestao_concessionaria DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE gestao_concessionaria;

-- Tabela: cliente
CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(90) NOT NULL,
    email VARCHAR(50),
    contacto VARCHAR(9) NOT NULL,
    endereco TEXT NOT NULL
);

-- Tabela: user
CREATE TABLE user (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(90) NOT NULL,
    snome VARCHAR(90),
    unome VARCHAR(90) NOT NULL UNIQUE,
    email VARCHAR(90) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('admin', 'usuario') NOT NULL DEFAULT 'usuario'
);

-- Inserção de usuários
INSERT INTO user (nome, snome, unome, email, senha, perfil) VALUES
('Administrador', '', 'admin', 'admin@gmail.com', '$2y$10$k8G.b756jUFaZJA61mj19.yw/mGAZnSrzyZoJbTGKSBf3IP/M3hlS', 'admin'),
('Ednilson', 'Paulo', 'EddyMax5805X', 'eddy@example.com', '$2y$10$V5o3s4tmC0Rz0VZNNwqlxOayuF1n.Hjslzy9/PSq7HxrA2/bLo4Vm', 'usuario'),
('Naran', 'Pressotamo', 'Nato', 'naranpressotamo@gmail.com', '$2y$10$BWmZ4TvhvF2R2NL30H.8KOrK5yV9XnMv0srUICZ2bCRCkNoX8MVrW', 'usuario');

-- Tabela: veiculo
CREATE TABLE veiculo (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(30) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    ano INT,
    preco DECIMAL(10,2) NOT NULL,
    status ENUM('Disponivel', 'Vendido', 'Reservado') NOT NULL DEFAULT 'Disponivel',
    descricao TEXT NOT NULL
);

-- Inserção de veículos
INSERT INTO veiculo (marca, modelo, ano, preco, status, descricao) VALUES
('Toyota', 'Supra MK5', 2024, 3458200.00, 'Disponivel', 'Esportivo de alta performance.'),
('Toyota', 'Hilux', 2020, 2658540.00, 'Disponivel', 'Caminhonete robusta.'),
('BMW', 'M5', 2013, 986580.00, 'Reservado', 'Sedan de luxo com alta performance.');

-- Tabela: venda
CREATE TABLE venda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_veiculo INT NOT NULL,
    data DATE NOT NULL,
    valor_pago DECIMAL(10,2),
    FOREIGN KEY (id_cliente) REFERENCES cliente(id),
    FOREIGN KEY (id_veiculo) REFERENCES veiculo(ID)
);

-- Tabela: auditoria
CREATE TABLE auditoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_do_usuario VARCHAR(50),
    perfil_do_usuario VARCHAR(50),
    acao VARCHAR(20),
    tabela_afetada VARCHAR(50),
    ID_do_registro VARCHAR(50),
    valores_anteriores TEXT,
    valores_novos TEXT,
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP
);
