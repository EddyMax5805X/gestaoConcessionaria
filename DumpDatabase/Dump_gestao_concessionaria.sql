-- MySQL dump 10.13  Distrib 9.2.0, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gestao_concessionaria
-- ------------------------------------------------------
DROP DATABASE IF EXISTS gestao_concessionaria;
CREATE DATABASE  IF NOT EXISTS gestao_concessionaria
DEFAULT CHARACTER SET = 'utf8'
DEFAULT COLLATE = 'utf8_general_ci';
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
use gestao_concessionaria;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contacto` varchar(9) NOT NULL,
  `endereco` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(90) NOT NULL,
  `snome` VARCHAR(90) DEFAULT NULL,
  `unome` VARCHAR(90) NOT NULL,
  `email` VARCHAR(90) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `perfil` ENUM('admin', 'cliente') NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `unome` (`unome`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO `user` (`nome`, `snome`, `unome`, `email`, `senha`, `perfil`)
VALUES ('Administrador', ' ', 'admin', 'admin@gmail.com',
'$2y$10$k8G.b756jUFaZJA61mj19.yw/mGAZnSrzyZoJbTGKSBf3IP/M3hlS', 'admin');

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Ednilson','Paulo','EddyMax5805X','eddy@example.com','$2y$10$V5o3s4tmC0Rz0VZNNwqlxOayuF1n.Hjslzy9/PSq7HxrA2/bLo4Vm'),
(2,'Administrador','ad','admin','admin@gmail.com','$2y$10$k8G.b756jUFaZJA61mj19.yw/mGAZnSrzyZoJbTGKSBf3IP/M3hlS'),
(3, 'Naran', 'Pressotamo', 'Nato', 'naranpressotamo@gmail.com', '$2y$10$BWmZ4TvhvF2R2NL30H.8KOrK5yV9XnMv0srUICZ2bCRCkNoX8MVrW');
/*!40000 ALTER TABLE `user` ENABLE KEYS */


ALTER TABLE `user`
ADD COLUMN `perfil` ENUM('admin', 'cliente') NOT NULL DEFAULT 'cliente';

-- 1. Alterar tamanho da coluna senha para varchar(255)
ALTER TABLE `user`
MODIFY COLUMN `senha` VARCHAR(255) NOT NULL;

-- 2. Corrigir o ENUM do campo perfil para incluir 'admin' ao invés de 'adimin'
ALTER TABLE `user`
MODIFY COLUMN `perfil` ENUM('admin', 'cliente') NOT NULL DEFAULT 'cliente';

-- 3. Adicionar índice único na coluna email para evitar duplicidade
ALTER TABLE `user`
ADD UNIQUE KEY `email` (`email`);


select * from `user`;
delete from `user` where id = '13';


--
-- Dumping data for table `user`
--
--
-- Table structure for table `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veiculo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `ano` int(11) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `status` enum('Disponivel','Vendido','Reservado') NOT NULL DEFAULT 'Disponivel',
  `descricao` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

select * from veiculo;
--
-- Dumping data for table `veiculo`
--

/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` VALUES (1,'Toyota','Supra MK5',2024,3458200.00,'Disponivel','asdashgjdhas hashsh hhgg g h hhggf jhgghfhghg ghfh hg hg hg  h fg  fg  f'),(2,'Toyota','Hilux',2020,2658540.00,'Disponivel','ahhhhh'),(3,'BMW','M5',2013,986580.00,'Reservado','Ahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh');
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor_pago` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_veiculo` (`id_veiculo`),
  CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;

--
-- Dumping routines for database 'gestao_concessionaria'
--
