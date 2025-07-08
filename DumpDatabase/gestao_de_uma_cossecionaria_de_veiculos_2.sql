-- Criação da base de dados
CREATE DATABASE IF NOT EXISTS gestao_concessionaria
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE gestao_concessionaria;

-- Tabela: cliente
DROP TABLE IF EXISTS cliente;
CREATE TABLE cliente (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(90) NOT NULL,
  email VARCHAR(50),
  contacto VARCHAR(9) NOT NULL,
  endereco TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabela: user
DROP TABLE IF EXISTS user;
CREATE TABLE user (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(90) NOT NULL,
  snome VARCHAR(90),
  unome VARCHAR(90) NOT NULL UNIQUE,
  email VARCHAR(90) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  perfil ENUM('admin', 'cliente') NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabela: veiculo
DROP TABLE IF EXISTS veiculo;
CREATE TABLE veiculo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  numeroChassi VARCHAR(17),
  marca VARCHAR(30) NOT NULL,
  modelo VARCHAR(50) NOT NULL,
  ano INT NOT NULL,
  preco DECIMAL(12,2) NOT NULL,
  status ENUM('Disponivel','Vendido','Reservado') NOT NULL DEFAULT 'Disponivel',
  descricao TEXT NOT NULL,
  chassi ENUM('Monobloco','Sobre-chassi','Space-frame','Escada') NOT NULL,
  cor VARCHAR(30) NOT NULL,
  cilindrada INT NOT NULL COMMENT 'em cc',
  transmissao ENUM('Manual','Automatico','Semi-automatico') NOT NULL,
  quilometragem INT NOT NULL DEFAULT 0 COMMENT 'em km',
  combustivel ENUM('Gasolina','Diesel','Eletrico','Hibrido','Flex') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabela: venda
DROP TABLE IF EXISTS venda;
CREATE TABLE venda (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_cliente INT NOT NULL,
  id_veiculo INT NOT NULL,
  data DATE NOT NULL,
  valor_pago DECIMAL(10,2),
  FOREIGN KEY (id_cliente) REFERENCES cliente(id),
  FOREIGN KEY (id_veiculo) REFERENCES veiculo(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabela: auditoria
DROP TABLE IF EXISTS auditoria;
CREATE TABLE auditoria (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome_do_usuario VARCHAR(50),
  perfil_do_usuario VARCHAR(50),
  acao VARCHAR(20) NOT NULL,
  tabela_afetada VARCHAR(50),
  ID_do_registro VARCHAR(50),
  valores_anteriores TEXT,
  valores_novos TEXT,
  data_hora DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserção de dados na tabela cliente
INSERT INTO cliente (nome, email, contacto, endereco) VALUES
('Carlos Mucavele', 'carlos@example.com', '842345678', 'Maputo, Bairro Central'),
('Ana Macamo', 'ana.macamo@example.com', '843210987', 'Beira, Chaimite'),
('José Chissano', NULL, '845678123', 'Nampula, Namicopo');

-- Inserção de dados na tabela user
INSERT INTO user (nome, snome, unome, email, senha, perfil) VALUES
('Administrador', ' ', 'admin', 'admin@gmail.com', '$2y$10$k8G.b756jUFaZJA61mj19.yw/mGAZnSrzyZoJbTGKSBf3IP/M3hlS', 'admin'),
('Helena', 'Silva', 'h.silva', 'helena@example.com', '$2y$10$fakehashsenha001', 'cliente'),
('Manuel', 'Matos', 'manuelmatos', 'manuel@example.com', '$2y$10$fakehashsenha002', 'cliente');

-- Inserção de dados na tabela veiculo
INSERT INTO veiculo (
  numeroChassi, marca, modelo, ano, preco, status, descricao,
  chassi, cor, cilindrada, transmissao, quilometragem, combustivel
) VALUES
('JH4KA4650MC012345', 'Toyota', 'Corolla', 2022, 1200000.00, 'Disponivel', 'Económico e confiável',
 'Monobloco', 'Branco', 1800, 'Manual', 50000, 'Gasolina'),
('WBA3A5C58EF600123', 'BMW', '320i', 2019, 2300000.00, 'Disponivel', 'Desempenho e conforto',
 'Space-frame', 'Preto', 2000, 'Automatico', 30000, 'Gasolina'),
('1HGCM82633A004352', 'Honda', 'Civic', 2020, 1750000.00, 'Reservado', 'Compacto e ágil',
 'Monobloco', 'Cinza', 1600, 'Manual', 40000, 'Diesel');

-- Inserção de dados na tabela venda
-- (assumindo que os IDs de cliente e veiculo inseridos anteriormente são 1, 2 e 3)
INSERT INTO venda (id_cliente, id_veiculo, data, valor_pago) VALUES
(1, 1, '2025-07-08', 1180000.00),
(2, 2, '2025-07-01', 2250000.00);