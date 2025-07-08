-- MySQL dump 10.13  Distrib 9.2.0, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gestao_concessionaria
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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

--
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_do_usuario` varchar(50) DEFAULT NULL,
  `perfil_do_usuario` varchar(50) DEFAULT NULL,
  `acao` varchar(20) NOT NULL,
  `tabela_afetada` varchar(50) DEFAULT NULL,
  `ID_do_registro` varchar(50) DEFAULT NULL,
  `valores_anteriores` text DEFAULT NULL,
  `valores_novos` text DEFAULT NULL,
  `data_hora` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,'Administrador  ','admin','Login','Usuario','----','----','Senha: ----,Username: admin','2025-07-08 16:39:03'),(2,'Administrador  ','admin','Cadastro','cliente','10','---','nome: Joao Antonio, email: joaoantonio@gmail.com, contacto: 874673677, endereco: xcvcsdfsdf','2025-07-08 16:41:01'),(3,'Administrador  ','admin','Atualizar','cliente','9','Email: Telefone: 845678123Endereco: Nampula, Namicopo','Email: emaI@EXAMPLE.COMTelefone: 845678222Endereco: Nampula, Namicopo, Moz','2025-07-08 16:41:47'),(4,'Administrador  ','admin','Atualizar','veiculo','10','Ano: 0, Preço: 34.00, Status: , Chassi: 2018, Transmissão: , Combustível:','Ano: 2020, Preço: 34444040, Status: Disponivel, Chassi: Monobloco, Transmissão: Manual, Combustível: Gasolina','2025-07-08 16:53:10'),(5,' ','','Remover','veiculo','9','marca: BMW, modelo: M5, ano: 0, preco: 34.00, status: , descricao: Gasóleo, chassi: 2019, cor: sdfghjkl;kjhv m,kjhgvb mjkyhgfvbhjytrdcv bghtrfdcv, cilindrada: 9.9, transmissao: , numeroChassi: Disponivel, quilometragem: 2.50, combustivel: ','---','2025-07-08 16:53:29'),(6,'Administrador  ','admin','Remover','cliente','1','---','nome: Administrador  , email: joaoantonio@gmail.com, contacto: 874673677, endereco: xcvcsdfsdf','2025-07-08 16:54:38'),(7,'Administrador  ','admin','Cadastro','Vendas','6','---','id_cliente: 7, id_veiculo: 12, data: 2025-06-05, valor pago: 234567','2025-07-08 16:55:00'),(8,'Administrador  ','admin','Atualizar','venda','3','Valor Pago: 2359998.00','Valor Pago: 233338.00','2025-07-08 16:55:19'),(9,'Administrador  ','admin','Login','Usuario','----','----','Senha: ----,Username: admin','2025-07-08 17:14:19'),(10,'Administrador  ','admin','Login','Usuario','----','----','Senha: ----,Username: admin','2025-07-08 17:14:37');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (4,'Naran Nato','naradas@gmail.com','876545699','Albazine'),(6,'Antonio Petro','antonio@example.com','853454999','Bairro de Mulotana'),(7,'Carlos Mucavele','carlos@example.com','842345678','Maputo, Bairro Central'),(8,'Ana Macamo','ana.macamo@example.com','843210987','Beira, Chaimite'),(9,'José Chissano','emaI@EXAMPLE.COM','845678222','Nampula, Namicopo, Moz'),(10,'Joao Antonio','joaoantonio@gmail.com','874673677','xcvcsdfsdf');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) NOT NULL,
  `snome` varchar(90) DEFAULT NULL,
  `unome` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` enum('admin','usuario') NOT NULL DEFAULT 'usuario',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `unome` (`unome`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Administrador',' ','admin','admin@gmail.com','$2y$10$k8G.b756jUFaZJA61mj19.yw/mGAZnSrzyZoJbTGKSBf3IP/M3hlS','admin'),(2,'Ednilson','Paulo','EddyMax','ednilsonpaulosambo@gmail.com','$2y$10$Zextiys9Ts231mw8bKwmZuCZIzLJugKvg9Yz2u5caicAVsRqHLf6.','admin'),(4,'Ednilson','Sambo','ednilson','ednilsonpaulo@gmail.com','$2y$10$uL4iIdvcMZKrTOAMwuAnUum4SIGuXRoPHb8mwtpvXv115cbFM54yu','usuario'),(5,'naran','pressotamo','naran','naranpressotamo@gmail.com','$2y$10$3CsYFB8K/MwuVcjkH.oxF.Ytt9VLeAobcdjvjhHhaVboEPQyF48FC','usuario'),(6,'Helena','Silva','h.silva','helena@example.com','$2y$10$fakehashsenha001',''),(7,'Manuel','Matos','manuelmatos','manuel@example.com','$2y$10$fakehashsenha002','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

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
  `chassi` varchar(90) NOT NULL,
  `cilindrada` decimal(2,1) DEFAULT 1.0,
  `numeroChassi` varchar(50) NOT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `combustivel` enum('Gasolina','Gasóleo','Elétrico','Híbrido') NOT NULL DEFAULT 'Gasolina',
  `transmissao` enum('Manual','Automático') NOT NULL DEFAULT 'Automático',
  `quilometragem` decimal(8,2) DEFAULT 0.00,
  `ano` int(11) DEFAULT NULL,
  `preco` decimal(12,2) NOT NULL,
  `status` enum('Disponivel','Vendido','Reservado') NOT NULL DEFAULT 'Disponivel',
  `descricao` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `numeroChassi` (`numeroChassi`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veiculo`
--

/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` VALUES (7,'Audi','M5','',1.0,'',NULL,'Gasolina','Manual',0.00,1950,1.00,'Disponivel','dc'),(10,'Ford','Raptor','Monobloco',9.9,'Reservado','hgfdsfgjhg','Gasolina','Manual',3.20,2020,34444040.00,'Disponivel','Gasóleo'),(11,'Nissan','Skyline','AShjkjhg',2.5,'5678IUJHG','Roxa','Gasolina','Manual',0.00,2015,1231000.00,'Disponivel','hgfddrtyuikjhgiujn vfyhjnm bcfgtyuhjkm nbvgftgyhjn bvghn bvghhjmn hjujmn ujkmn '),(12,'Toyota','Corolla','Monobloco',9.9,'JH4KA4650MC012345','Branco','Gasolina','Manual',50000.00,2022,1200000.00,'Disponivel','Económico e confiável'),(13,'BMW','320i','Space-frame',9.9,'WBA3A5C58EF600123','Preto','Gasolina','Automático',30000.00,2019,2300000.00,'Disponivel','Desempenho e conforto'),(14,'Honda','Civic','Monobloco',9.9,'1HGCM82633A004352','Cinza','','Manual',40000.00,2020,1750000.00,'Reservado','Compacto e ágil');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
INSERT INTO `venda` VALUES (3,4,7,'2025-07-04',233338.00),(6,7,12,'2025-06-05',234567.00);
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;

--
-- Dumping routines for database 'gestao_concessionaria'
--
