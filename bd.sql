CREATE DATABASE  IF NOT EXISTS `desarrolloWeb2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `desarrolloWeb2`;
-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: desarrolloWeb2
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Archivo`
--

DROP TABLE IF EXISTS `Archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDirectorio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `hash` varchar(45) DEFAULT NULL,
  `mimeType` varchar(45) DEFAULT NULL,
  `tamano` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Archivo_Directorio1_idx` (`idDirectorio`),
  CONSTRAINT `fk_Archivo_Directorio1` FOREIGN KEY (`idDirectorio`) REFERENCES `Directorio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Archivo`
--

LOCK TABLES `Archivo` WRITE;
/*!40000 ALTER TABLE `Archivo` DISABLE KEYS */;
INSERT INTO `Archivo` VALUES (24,2,'texto.txt','txt','1e04bb3f9f396d3b71d93d326ebfc42d','text/plain',11),(25,2,'texto.txt','txt','96a2e630935c391c8bed9a870c78fbcc','text/plain',24),(26,18,'texto.txt','txt','1e04bb3f9f396d3b71d93d326ebfc42d','text/plain',11);
/*!40000 ALTER TABLE `Archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Directorio`
--

DROP TABLE IF EXISTS `Directorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Directorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `path` varchar(45) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  `EspacioAlmacenamiento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Directorio_Directorio1_idx` (`parentId`),
  KEY `fk_Directorio_EspacioAlmacenamiento1_idx` (`EspacioAlmacenamiento_id`),
  CONSTRAINT `fk_Directorio_Directorio1` FOREIGN KEY (`parentId`) REFERENCES `Directorio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Directorio_EspacioAlmacenamiento1` FOREIGN KEY (`EspacioAlmacenamiento_id`) REFERENCES `EspacioAlmacenamiento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Directorio`
--

LOCK TABLES `Directorio` WRITE;
/*!40000 ALTER TABLE `Directorio` DISABLE KEYS */;
INSERT INTO `Directorio` VALUES (2,'test2','/',NULL,2),(16,'jjj','/',NULL,4),(17,'carpeta1','/',NULL,1),(18,'carpeta3',NULL,18,1),(19,'Directorio2','/',NULL,1),(20,'Directorio3','/',NULL,1);
/*!40000 ALTER TABLE `Directorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EspacioAlmacenamiento`
--

DROP TABLE IF EXISTS `EspacioAlmacenamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EspacioAlmacenamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idLogin` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `raiz` varchar(45) DEFAULT NULL,
  `cuota` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_EspacioAlmacenamiento_Login_idx` (`idLogin`),
  CONSTRAINT `fk_EspacioAlmacenamiento_Login` FOREIGN KEY (`idLogin`) REFERENCES `Usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EspacioAlmacenamiento`
--

LOCK TABLES `EspacioAlmacenamiento` WRITE;
/*!40000 ALTER TABLE `EspacioAlmacenamiento` DISABLE KEYS */;
INSERT INTO `EspacioAlmacenamiento` VALUES (1,1,NULL,NULL,NULL),(2,15,NULL,NULL,NULL),(4,20,NULL,NULL,NULL),(5,21,NULL,NULL,NULL);
/*!40000 ALTER TABLE `EspacioAlmacenamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (1,'123','alberto','rasillo','a'),(15,'123','david','sss','a@.com'),(20,'123','marcos','a','a@.com'),(21,'123','paco','rasi','a@.com');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `valor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `mensaje` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-24  3:29:37
