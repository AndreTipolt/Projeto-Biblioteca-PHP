-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdbiblioteca
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cadlivros`
--

DROP TABLE IF EXISTS `cadlivros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadlivros` (
  `codlivro` int NOT NULL AUTO_INCREMENT,
  `livro` varchar(30) DEFAULT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `autor` varchar(30) DEFAULT NULL,
  `editora` varchar(30) DEFAULT NULL,
  `paginas` int DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`codlivro`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadlivros`
--

LOCK TABLES `cadlivros` WRITE;
/*!40000 ALTER TABLE `cadlivros` DISABLE KEYS */;
INSERT INTO `cadlivros` VALUES (1,'turma da monica','drama','mauricio de souza','panini',120,'2003-05-20'),(3,'aasdasdas','bola ','na ','trabe',123,'1111-11-11');
/*!40000 ALTER TABLE `cadlivros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimolivro`
--

DROP TABLE IF EXISTS `emprestimolivro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimolivro` (
  `codcliente` int NOT NULL,
  `codlivro` int DEFAULT NULL,
  `datasaida` date DEFAULT NULL,
  `dataentrada` date DEFAULT NULL,
  PRIMARY KEY (`codcliente`),
  CONSTRAINT `emprestimolivro_ibfk_1` FOREIGN KEY (`codcliente`) REFERENCES `usercliente` (`codcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimolivro`
--

LOCK TABLES `emprestimolivro` WRITE;
/*!40000 ALTER TABLE `emprestimolivro` DISABLE KEYS */;
INSERT INTO `emprestimolivro` VALUES (1,1,'2000-01-10','1111-12-01'),(6,2,'1111-11-11','2222-12-22');
/*!40000 ALTER TABLE `emprestimolivro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estoquelivro`
--

DROP TABLE IF EXISTS `estoquelivro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estoquelivro` (
  `codestoque` int NOT NULL AUTO_INCREMENT,
  `qtde_atual` int DEFAULT NULL,
  `codlivro_fk` int DEFAULT NULL,
  PRIMARY KEY (`codestoque`),
  KEY `codlivro_fk` (`codlivro_fk`),
  CONSTRAINT `estoquelivro_ibfk_1` FOREIGN KEY (`codlivro_fk`) REFERENCES `cadlivros` (`codlivro`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoquelivro`
--

LOCK TABLES `estoquelivro` WRITE;
/*!40000 ALTER TABLE `estoquelivro` DISABLE KEYS */;
INSERT INTO `estoquelivro` VALUES (3,200,1);
/*!40000 ALTER TABLE `estoquelivro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrocliente`
--

DROP TABLE IF EXISTS `registrocliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrocliente` (
  `codcliente_fk` int NOT NULL,
  `multa` tinyint(1) DEFAULT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codcliente_fk`),
  CONSTRAINT `registrocliente_ibfk_1` FOREIGN KEY (`codcliente_fk`) REFERENCES `usercliente` (`codcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrocliente`
--

LOCK TABLES `registrocliente` WRITE;
/*!40000 ALTER TABLE `registrocliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `registrocliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usercliente`
--

DROP TABLE IF EXISTS `usercliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usercliente` (
  `codcliente` int NOT NULL AUTO_INCREMENT,
  `cliente` varchar(30) DEFAULT NULL,
  `endereco` varchar(40) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefone` int DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `perfil` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usercliente`
--

LOCK TABLES `usercliente` WRITE;
/*!40000 ALTER TABLE `usercliente` DISABLE KEYS */;
INSERT INTO `usercliente` VALUES (1,'Henrique','slamano','henrique@gmail.com',190,'dada','henrique1'),(2,'João','rua qualquer','joao@gmail.com',123123,'1234','Joaozinho'),(6,'Pedro','Rua das pedras 456','pedro@gmail.com',123456,'pedro1234','Pedro'),(7,'Anré','Rua das caras','andre@gmail.com',12341,'202020','Dede');
/*!40000 ALTER TABLE `usercliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersistema`
--

DROP TABLE IF EXISTS `usersistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usersistema` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `perfil` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersistema`
--

LOCK TABLES `usersistema` WRITE;
/*!40000 ALTER TABLE `usersistema` DISABLE KEYS */;
INSERT INTO `usersistema` VALUES (1,'André','11991820977','andretipoltlopes@gmail.com','Dede','Andre1234','Dedezinho');
/*!40000 ALTER TABLE `usersistema` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-12 18:02:49
