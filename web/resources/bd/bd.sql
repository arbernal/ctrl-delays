-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: bd
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `cata`
--

DROP TABLE IF EXISTS `cata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cata` (
  `idCata` int(11) NOT NULL AUTO_INCREMENT,
  `desc_cort` varchar(5) DEFAULT NULL,
  `desc_comp` varchar(30) DEFAULT NULL,
  `idEsta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cata`
--

LOCK TABLES `cata` WRITE;
/*!40000 ALTER TABLE `cata` DISABLE KEYS */;
/*!40000 ALTER TABLE `cata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `dia` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `idEsta` int(11) NOT NULL,
  PRIMARY KEY (`idhorario`),
  KEY `fk_horario_Cata1_idx` (`idEsta`),
  CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`idEsta`) REFERENCES `cata` (`idCata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multas`
--

DROP TABLE IF EXISTS `multas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multas` (
  `idMultas` int(11) NOT NULL AUTO_INCREMENT,
  `tiem_tran` time DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `idReca_desc` int(11) NOT NULL,
  `idEsta` int(11) NOT NULL,
  `idEstaPago` int(11) NOT NULL,
  PRIMARY KEY (`idMultas`),
  KEY `fk_multas_descuento1_idx` (`idReca_desc`),
  KEY `fk_multas_Cata1_idx` (`idEsta`),
  KEY `fk_multas_Cata2_idx` (`idEstaPago`),
  CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`idEsta`) REFERENCES `cata` (`idCata`),
  CONSTRAINT `multas_ibfk_2` FOREIGN KEY (`idReca_desc`) REFERENCES `reca_desc` (`idReca_desc`),
  CONSTRAINT `multas_ibfk_3` FOREIGN KEY (`idEstaPago`) REFERENCES `cata` (`idCata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multas`
--

LOCK TABLES `multas` WRITE;
/*!40000 ALTER TABLE `multas` DISABLE KEYS */;
/*!40000 ALTER TABLE `multas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reca_desc`
--

DROP TABLE IF EXISTS `reca_desc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reca_desc` (
  `idReca_desc` int(11) NOT NULL AUTO_INCREMENT,
  `idOper` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `porce` int(11) DEFAULT NULL,
  `idEsta` int(11) NOT NULL,
  PRIMARY KEY (`idReca_desc`),
  KEY `fk_descuento_Cata1_idx` (`idEsta`),
  KEY `fk_reca_desc_Cata1_idx` (`idOper`),
  KEY `fk_reca_desc_Cata2_idx` (`idTipo`),
  CONSTRAINT `reca_desc_ibfk_1` FOREIGN KEY (`idEsta`) REFERENCES `cata` (`idCata`),
  CONSTRAINT `reca_desc_ibfk_2` FOREIGN KEY (`idOper`) REFERENCES `cata` (`idCata`),
  CONSTRAINT `reca_desc_ibfk_3` FOREIGN KEY (`idTipo`) REFERENCES `cata` (`idCata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reca_desc`
--

LOCK TABLES `reca_desc` WRITE;
/*!40000 ALTER TABLE `reca_desc` DISABLE KEYS */;
/*!40000 ALTER TABLE `reca_desc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retardos`
--

DROP TABLE IF EXISTS `retardos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retardos` (
  `idretardos` int(11) NOT NULL AUTO_INCREMENT,
  `hora_llega` time DEFAULT NULL,
  `idusuario` int(11) NOT NULL,
  `idhorario` int(11) NOT NULL,
  `idmultas` int(11) NOT NULL,
  `idEsta` int(11) NOT NULL,
  `idTari` int(11) NOT NULL,
  `idReca_sema` int(11) DEFAULT NULL,
  PRIMARY KEY (`idretardos`),
  KEY `fk_retardos_usuario1_idx` (`idusuario`),
  KEY `fk_retardos_horario1_idx` (`idhorario`),
  KEY `fk_retardos_multas1_idx` (`idmultas`),
  KEY `fk_retardos_Cata1_idx` (`idEsta`),
  KEY `fk_retardos_tarifas1_idx` (`idTari`),
  KEY `fk_retardos_reca_desc1_idx` (`idReca_sema`),
  CONSTRAINT `retardos_ibfk_1` FOREIGN KEY (`idEsta`) REFERENCES `cata` (`idCata`),
  CONSTRAINT `retardos_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `retardos_ibfk_3` FOREIGN KEY (`idhorario`) REFERENCES `horario` (`idhorario`),
  CONSTRAINT `retardos_ibfk_4` FOREIGN KEY (`idmultas`) REFERENCES `multas` (`idMultas`),
  CONSTRAINT `retardos_ibfk_5` FOREIGN KEY (`idTari`) REFERENCES `tarifas` (`idTari`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retardos`
--

LOCK TABLES `retardos` WRITE;
/*!40000 ALTER TABLE `retardos` DISABLE KEYS */;
/*!40000 ALTER TABLE `retardos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) DEFAULT NULL,
  `idEsta` int(11) NOT NULL,
  PRIMARY KEY (`idroles`),
  KEY `fk_roles_Cata1_idx` (`idEsta`),
  CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`idEsta`) REFERENCES `cata` (`idCata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifas`
--

DROP TABLE IF EXISTS `tarifas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarifas` (
  `idTari` int(11) NOT NULL AUTO_INCREMENT,
  `tarifa` int(11) DEFAULT NULL,
  `idTipoTari` int(11) NOT NULL,
  `idEsta` int(11) NOT NULL,
  PRIMARY KEY (`idTari`),
  KEY `fk_configuracion_Cata1_idx` (`idEsta`),
  KEY `fk_tarifas_Cata1_idx` (`idTipoTari`),
  CONSTRAINT `tarifas_ibfk_1` FOREIGN KEY (`idEsta`) REFERENCES `cata` (`idCata`),
  CONSTRAINT `tarifas_ibfk_2` FOREIGN KEY (`idTipoTari`) REFERENCES `cata` (`idCata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifas`
--

LOCK TABLES `tarifas` WRITE;
/*!40000 ALTER TABLE `tarifas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarifas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(39) DEFAULT NULL,
  `contrasena` varchar(10) DEFAULT NULL,
  `idroles` int(11) NOT NULL,
  `idEsta` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_roles_idx` (`idroles`),
  KEY `fk_usuario_Cata1_idx` (`idEsta`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idEsta`) REFERENCES `cata` (`idCata`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idroles`) REFERENCES `roles` (`idroles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-10 15:12:59
