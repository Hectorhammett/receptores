-- MySQL dump 10.13  Distrib 5.7.12, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: receptores
-- ------------------------------------------------------
-- Server version	5.7.13

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
-- Table structure for table `Empresa`
--

DROP TABLE IF EXISTS `Empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `domicilio` varchar(200) DEFAULT NULL,
  `cp` varchar(20) DEFAULT NULL,
  `municipio` varchar(200) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `numero_registro` varchar(100) DEFAULT NULL,
  `tipo` enum('GENERADOR','TRANSPORTADOR','RECEPTOR') DEFAULT NULL,
  `Manifiesto_id` int(11) NOT NULL,
  `Manifiesto_id1` int(11) NOT NULL,
  `Manifiesto_id2` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Manifiesto_id`,`Manifiesto_id1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Manifiesto`
--

DROP TABLE IF EXISTS `Manifiesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Manifiesto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idGenerador` int(11) DEFAULT NULL,
  `idTransportador` int(11) DEFAULT NULL,
  `idReceptor` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tipo` enum('MANIFIESTO_ENTRADA','MANIFIESTO_SALIDA') DEFAULT NULL,
  `incluidos` varchar(5000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Manifiesto_Empresa_idx` (`idGenerador`),
  KEY `fk_Manifiesto_Empresa1_idx` (`idTransportador`),
  KEY `fk_Manifiesto_Empresa2_idx` (`idReceptor`),
  KEY `fk_Manifiesto_user1_idx` (`created_by`),
  CONSTRAINT `fk_Manifiesto_Empresa` FOREIGN KEY (`idGenerador`) REFERENCES `Empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Manifiesto_Empresa1` FOREIGN KEY (`idTransportador`) REFERENCES `Empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Manifiesto_Empresa2` FOREIGN KEY (`idReceptor`) REFERENCES `Empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Manifiesto_user1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Residuos`
--

DROP TABLE IF EXISTS `Residuos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Residuos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Residuos_has_Manifiesto`
--

DROP TABLE IF EXISTS `Residuos_has_Manifiesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Residuos_has_Manifiesto` (
  `Residuos_id` int(11) NOT NULL,
  `Manifiesto_id` int(11) NOT NULL,
  `unidad` varchar(20) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`Residuos_id`,`Manifiesto_id`),
  KEY `fk_Residuos_has_Manifiesto_Manifiesto1_idx` (`Manifiesto_id`),
  KEY `fk_Residuos_has_Manifiesto_Residuos1_idx` (`Residuos_id`),
  CONSTRAINT `fk_Residuos_has_Manifiesto_Manifiesto1` FOREIGN KEY (`Manifiesto_id`) REFERENCES `Manifiesto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Residuos_has_Manifiesto_Residuos1` FOREIGN KEY (`Residuos_id`) REFERENCES `Residuos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'receptores'
--

--
-- Dumping routines for database 'receptores'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-25 19:32:21
