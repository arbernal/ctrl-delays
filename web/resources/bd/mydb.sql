-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
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
  `idcata` int(11) NOT NULL AUTO_INCREMENT,
  `desc_cort` varchar(15) DEFAULT NULL,
  `des_comp` varchar(45) DEFAULT NULL,
  `Idesta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcata`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cata`
--

LOCK TABLES `cata` WRITE;
/*!40000 ALTER TABLE `cata` DISABLE KEYS */;
INSERT INTO `cata` VALUES (1,'ACT','ACTIVO',1),(2,'INACT','INACTIVO',2),(3,'qasd','asd',56);
/*!40000 ALTER TABLE `cata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion` (
  `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `tarifa` int(11) DEFAULT NULL,
  `idesta` int(11) NOT NULL,
  PRIMARY KEY (`idconfiguracion`),
  KEY `fk_configuracion_cata1_idx` (`idesta`),
  CONSTRAINT `configuracion_ibfk_1` FOREIGN KEY (`idconfiguracion`) REFERENCES `cata` (`idcata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `descuento`
--

DROP TABLE IF EXISTS `descuento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `descuento` (
  `iddescuento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) DEFAULT NULL,
  `idesta` int(11) NOT NULL,
  PRIMARY KEY (`iddescuento`),
  KEY `fk_descuento_cata1_idx` (`idesta`),
  CONSTRAINT `descuento_ibfk_1` FOREIGN KEY (`idesta`) REFERENCES `cata` (`idcata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `descuento`
--

LOCK TABLES `descuento` WRITE;
/*!40000 ALTER TABLE `descuento` DISABLE KEYS */;
/*!40000 ALTER TABLE `descuento` ENABLE KEYS */;
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
  `idesta` int(11) NOT NULL,
  PRIMARY KEY (`idhorario`),
  KEY `fk_horario_cata1_idx` (`idesta`),
  CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`idesta`) REFERENCES `cata` (`idcata`)
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
  `idmultas` int(11) NOT NULL AUTO_INCREMENT,
  `tiem_tran` time DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `Idestapago` int(11) NOT NULL,
  `iddescuento` int(11) NOT NULL,
  `idconfiguracion` int(11) NOT NULL,
  `idesta` int(11) NOT NULL,
  PRIMARY KEY (`idmultas`),
  KEY `fk_multas_estatus1_idx` (`Idestapago`),
  KEY `fk_multas_descuento1_idx` (`iddescuento`),
  KEY `fk_multas_configuracion1_idx` (`idconfiguracion`),
  KEY `fk_multas_cata1_idx` (`idesta`),
  CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`idesta`) REFERENCES `cata` (`idcata`),
  CONSTRAINT `multas_ibfk_2` FOREIGN KEY (`iddescuento`) REFERENCES `descuento` (`iddescuento`),
  CONSTRAINT `multas_ibfk_3` FOREIGN KEY (`idconfiguracion`) REFERENCES `configuracion` (`idconfiguracion`),
  CONSTRAINT `multas_ibfk_4` FOREIGN KEY (`Idestapago`) REFERENCES `cata` (`idcata`)
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
  `idesta` int(11) NOT NULL,
  PRIMARY KEY (`idretardos`),
  KEY `fk_retardos_usuario1_idx` (`idusuario`),
  KEY `fk_retardos_horario1_idx` (`idhorario`),
  KEY `fk_retardos_multas1_idx` (`idmultas`),
  KEY `fk_retardos_cata1_idx` (`idesta`),
  CONSTRAINT `retardos_ibfk_1` FOREIGN KEY (`idesta`) REFERENCES `cata` (`idcata`),
  CONSTRAINT `retardos_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `retardos_ibfk_3` FOREIGN KEY (`idhorario`) REFERENCES `horario` (`idhorario`),
  CONSTRAINT `retardos_ibfk_4` FOREIGN KEY (`idmultas`) REFERENCES `multas` (`idmultas`)
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
  `idesta` int(11) NOT NULL,
  PRIMARY KEY (`idroles`),
  KEY `fk_roles_cata1_idx` (`idesta`),
  CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`idesta`) REFERENCES `cata` (`idcata`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(39) DEFAULT NULL,
  `contrasena` varchar(33) DEFAULT NULL,
  `idroles` int(11) NOT NULL,
  `idesta` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_roles_idx` (`idroles`),
  KEY `fk_usuario_cata1_idx` (`idesta`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idroles`) REFERENCES `roles` (`idroles`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idesta`) REFERENCES `cata` (`idcata`)
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

-- Dump completed on 2016-05-09 20:49:41
