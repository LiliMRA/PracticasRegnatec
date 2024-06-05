-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: bytestore
-- ------------------------------------------------------
-- Server version	5.6.26-log

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
-- Table structure for table `cesta`
--

DROP TABLE IF EXISTS `cesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `Codigo` double DEFAULT '1' COMMENT 'Id de producto',
  `Descripcion` varchar(255) DEFAULT NULL COMMENT 'Nombre y descripcción del producto comprado',
  `Precio` double DEFAULT NULL COMMENT 'Precio final de compra',
  `unidades` double DEFAULT NULL COMMENT 'Unidades compradas',
  `email` varchar(255) DEFAULT NULL COMMENT 'Dirección de correo electrónico',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cesta`
--

LOCK TABLES `cesta` WRITE;
/*!40000 ALTER TABLE `cesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `cesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(255) DEFAULT NULL,
  `Cif` varchar(50) DEFAULT NULL,
  `Direccion_Envio` varchar(50) DEFAULT NULL COMMENT 'Domicilio Envío',
  `Poblacion` varchar(50) DEFAULT NULL COMMENT 'Población',
  `Provincia` varchar(50) DEFAULT NULL COMMENT 'Provincia',
  `cp` varchar(50) DEFAULT NULL COMMENT 'Codigo Postal',
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de Clientes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escaner`
--

DROP TABLE IF EXISTS `escaner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escaner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `lectura` varchar(10) DEFAULT NULL,
  `uso` varchar(10) DEFAULT NULL,
  `escaneado` varchar(10) DEFAULT NULL,
  `interface` varchar(10) DEFAULT NULL,
  `tecnologia` varchar(10) DEFAULT NULL,
  `soporte` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escaner`
--

LOCK TABLES `escaner` WRITE;
/*!40000 ALTER TABLE `escaner` DISABLE KEYS */;
/*!40000 ALTER TABLE `escaner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familias`
--

DROP TABLE IF EXISTS `familias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `familias` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(255) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL COMMENT 'Imagen',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de familias';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familias`
--

LOCK TABLES `familias` WRITE;
/*!40000 ALTER TABLE `familias` DISABLE KEYS */;
INSERT INTO `familias` VALUES (15,'Hardware',''),(16,'Software',''),(23,'Periféricos',''),(24,'piezas','');
/*!40000 ALTER TABLE `familias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impresora_termica`
--

DROP TABLE IF EXISTS `impresora_termica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impresora_termica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `peso` varchar(20) DEFAULT NULL,
  `dimensiones` varchar(50) DEFAULT NULL,
  `alimentacion` varchar(20) DEFAULT NULL,
  `resolucion` varchar(20) DEFAULT NULL,
  `velocidad` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impresora_termica`
--

LOCK TABLES `impresora_termica` WRITE;
/*!40000 ALTER TABLE `impresora_termica` DISABLE KEYS */;
/*!40000 ALTER TABLE `impresora_termica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitores`
--

DROP TABLE IF EXISTS `monitores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monitores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `procesador` varchar(100) DEFAULT NULL,
  `memoria` varchar(100) DEFAULT NULL,
  `disco` varchar(100) DEFAULT NULL,
  `pantalla` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitores`
--

LOCK TABLES `monitores` WRITE;
/*!40000 ALTER TABLE `monitores` DISABLE KEYS */;
INSERT INTO `monitores` VALUES (6,'Posiflex366 PS-3316E TPV ','1716833405_a29.jpg','Intel3 J190066 Quad Core (Cache 2Mb)',' DDR3 de 4 GB','SSD366 de GB',''),(7,'Posiflex36688 PS-3316E TPV ','1716833825_a29.jpg','Intel J190000 Quad Core (Cache 2Mb)',' DDR300 de 4 GB','SSD36600 de GB','');
/*!40000 ALTER TABLE `monitores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portamonedas`
--

DROP TABLE IF EXISTS `portamonedas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portamonedas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `medidas` varchar(20) DEFAULT NULL,
  `conexiones` varchar(20) DEFAULT NULL,
  `billetera` int(10) DEFAULT NULL,
  `monedero` int(10) DEFAULT NULL,
  `profundidad` varchar(10) DEFAULT NULL,
  `anchura` varchar(10) DEFAULT NULL,
  `altura` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portamonedas`
--

LOCK TABLES `portamonedas` WRITE;
/*!40000 ALTER TABLE `portamonedas` DISABLE KEYS */;
/*!40000 ALTER TABLE `portamonedas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `idId` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) DEFAULT NULL,
  `Descripccion` varchar(255) DEFAULT NULL,
  `Precio` double DEFAULT NULL,
  `Imagen1` varchar(255) DEFAULT NULL,
  `Imagen2` varchar(255) DEFAULT NULL,
  `Imagen3` varchar(255) DEFAULT NULL,
  `familias_id` int(11) NOT NULL,
  PRIMARY KEY (`idId`),
  KEY `fk_productos_familias_idx` (`familias_id`),
  CONSTRAINT `fk_productos_familias` FOREIGN KEY (`familias_id`) REFERENCES `familias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de Productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'monitor','',60,'','','',15),(12,'Monitor 5','',50,'','','',23),(15,'teclado','',30,'',NULL,NULL,23),(16,'teclado inalámbrico','',30,'','','',15);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipo` varchar(30) DEFAULT 'usuario',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'admin@bytestore.com','$2y$10$.5AH5z7/sYq/qyhM7DiJZ.0S.Px8QvA8jH8rcqMYhXUhfhW16ryma','usuario'),(2,'Admin2','admin2@bytestore.com','$2y$10$7aY3FCOQggScbM9IKKfOye6Vc1s/AlQ5R6WC0TBRkMMHf9TP/uKsG','usuario'),(5,'usuario6','usuario6@bytestore.com','$2y$10$hhGV2CtZXaeoTfw2aJiyiOyyvbdg8bBD4dNNXN/204ITKRZxLv/mC','usuario');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-05 13:29:12
