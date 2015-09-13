CREATE DATABASE  IF NOT EXISTS `diputados` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `diputados`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: diputados
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `diputado`
--

DROP TABLE IF EXISTS `diputado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diputado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partido_id` int(10) unsigned NOT NULL,
  `tipo_eleccion` int(10) unsigned NOT NULL,
  `cunul` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `periodo_inicio` date NOT NULL,
  `periodo_fin` date NOT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `distrito_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `diputado_partido_idx` (`partido_id`),
  KEY `diputado_distrito_idx` (`distrito_id`),
  CONSTRAINT `diputado_distrito` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `diputado_partido` FOREIGN KEY (`partido_id`) REFERENCES `partido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diputado`
--

LOCK TABLES `diputado` WRITE;
/*!40000 ALTER TABLE `diputado` DISABLE KEYS */;
INSERT INTO `diputado` VALUES (1,'Fulanito','De Tal',1,0,'NI-IDEA','fulanito.de.tal@diputados.mx','2015-06-10','2015-09-18','0',100,4);
/*!40000 ALTER TABLE `diputado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distrito`
--

DROP TABLE IF EXISTS `distrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distrito` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `municipio_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `distrito_municipio_idx` (`municipio_id`),
  CONSTRAINT `distrito_municipio` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito`
--

LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
INSERT INTO `distrito` VALUES (1,'I Distrito Electoral Federal de Yucatán',3),(2,'II Distrito Electoral Federal de Yucatán',4),(3,'III Distrito Electoral Federal de Yucatán',1),(4,'IV Distrito Electoral Federal de Yucatán',1),(5,'V Distrito Electoral Federal de Yucatán',5),(6,'I Distrito Electoral Federal de Quintana Roo',6),(7,'II Distrito Electoral Federal de Quintana Roo',7),(8,'III Distrito Electoral Federal de Quintana Ro',2);
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidad`
--

DROP TABLE IF EXISTS `entidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidad`
--

LOCK TABLES `entidad` WRITE;
/*!40000 ALTER TABLE `entidad` DISABLE KEYS */;
INSERT INTO `entidad` VALUES (1,'Yucatan'),(2,'Aguascalientes'),(3,'Baja California'),(4,'Baja California Sur'),(5,'Campeche'),(6,'Chiapas'),(7,'Chihuahua'),(8,'Coahuila'),(9,'Colima'),(10,'Distrito Federal'),(11,'Durango'),(12,'Estado de México'),(13,'Guanajuato'),(14,'Guerrero'),(15,'Hidalgo'),(16,'Jalisco'),(17,'Michoacán'),(18,'Morelos'),(19,'Nayarit'),(20,'Nuevo León'),(21,'Oaxaca'),(22,'Puebla'),(23,'Querétaro'),(24,'Quintana Roo'),(25,'San Luis Potosí'),(26,'Sinaloa'),(27,'Sonora'),(28,'Tabasco'),(29,'Tamaulipas'),(30,'Tlaxcala'),(31,'Veracruz'),(32,'Zacatecas');
/*!40000 ALTER TABLE `entidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iniciativa`
--

DROP TABLE IF EXISTS `iniciativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iniciativa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asunto` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iniciativa`
--

LOCK TABLES `iniciativa` WRITE;
/*!40000 ALTER TABLE `iniciativa` DISABLE KEYS */;
INSERT INTO `iniciativa` VALUES (3,'Iniciativa 1','2015-09-24','Iniciativa con proyecto de decreto que reforma el artículo 39 de la Ley Orgánica del Congreso General de los Estados Unidos Mexicanos, para aumentar el número de comisiones ordinarias (en lo general y en lo particular).'),(4,'Iniciativa pasada','2015-09-10','adsfadf'),(5,'sdfaf','2015-08-13','asdfasdfaf'),(6,'De la Comisión de Trabajo y Previsión Social- Ley Federal del Trabajo','2015-09-23','De la Comisión de Trabajo y Previsión Social, con proyecto de decreto que reforma, adiciona y deroga diversas disposiciones de la Ley Federal del Trabajo (en lo particular los artículos reservados del Título Tercero, en sus términos).'),(7,' Trabajo y Previsión Social - Ley Federal de Trabajo','2015-09-26','De la Comisión de Trabajo y Previsión Social, con proyecto de decreto que reforma, adiciona y deroga diversas disposiciones de la Ley Federal del Trabajo (en lo particular los artículos reservados de los Títulos Séptimo, Octavo, Noveno, Décimo y Décimo Primero).\r\n'),(8,'Reforma el artículo 39 de la Ley del Congreso General de los Estados Unidos Mexicanos','2015-10-15','Iniciativa con proyecto de decreto que reforma el artículo 39 de la Ley Orgánica del Congreso General de los Estados Unidos Mexicanos (en lo general y en lo particular).');
/*!40000 ALTER TABLE `iniciativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `entidad_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `municipio_entidad_idx` (`entidad_id`),
  CONSTRAINT `municipio_entidad` FOREIGN KEY (`entidad_id`) REFERENCES `entidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Mérida',1),(2,'Cancún',24),(3,'Valladolid',1),(4,'Progreso',1),(5,'Ticul',1),(6,'Playa del Carmen',24),(7,'Chetumal',24);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partido`
--

DROP TABLE IF EXISTS `partido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partido` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siglas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partido`
--

LOCK TABLES `partido` WRITE;
/*!40000 ALTER TABLE `partido` DISABLE KEYS */;
INSERT INTO `partido` VALUES (1,'PAN','Partido Acción Nacional'),(2,'PRI','Partido Revolucionario Institucional'),(3,'PRD','Partido de la Revolución Democrática'),(4,'PVEM','Partido Verde Ecologista de México'),(5,'Movimiento','Movimiento Ciudadano'),(6,'PANAL','Nueva Alianza'),(7,'MORENA','MORENA'),(8,'Encuentro','Partido Encuentro Social');
/*!40000 ALTER TABLE `partido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `distrito_id` int(10) unsigned NOT NULL,
  `ife` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_municipio_idx` (`distrito_id`),
  CONSTRAINT `user_municipio` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'basp91','$2y$13$nlXpZp77zKc/NIlEVn58j.IGi5OYCupY1c2LSDbKWt5rHkEOoW5G2','hiBB3F93N59L47nlJFOD6o7a812AUil2','bkiPl3-UHst83NEuwHev9jR5YzuSKRNW',1,'ASDFA3E23ASDFASD'),(2,'bea','$2y$13$W7bCQXyNsFfwDrhtTU/BN.bb8ngoUSWHEXEILYeRVtPEq/jQe.VlW','R5J2hpahV7hE8aqWiyf3_wsZEwQo80Ed','Za1DW8XJQYuHhNbNPgKI2BbQgpcEQ8Zm',3,'adsfadf'),(3,'lulu','$2y$13$E8vgyckwMO7egc96mZXwEuKnZcBTRa.NI8iLqAbLc5l3/oSXNZjM.','8LuHnle1bQlqiKg6wZsu9T0X9L4Q9Lnp','p9z6qOkeb6Tiky34jqz0r1sqOre0kxxY',1,'asidfjo'),(4,'beta','$2y$13$uvWCDYEKBOgmOcnzZJLzTubKKOx7ty2SIewg0MT6w7AqnGiJe2Wq6','943cCxetyXBqkoCxaMIHMxOEPzHCyzct','zHinMscDAqA8eFoMY8fVZO6lrIFTgVpG',1,'asdf'),(5,'alfa','$2y$13$7gdxxsc1wNLBAuInWZyzPOEU6ewiIQbFy7b3X7ZT8kbiQ4JCG6O0C','hq8gc6X6MRQiREJddJX_cIbN_PNlJo5q','ZLj7fed4r6NFskZ0QHi2xeRYBFTFNuSj',7,'asñdfas');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votacion_ciudadana`
--

DROP TABLE IF EXISTS `votacion_ciudadana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votacion_ciudadana` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `iniciativa_id` int(11) unsigned NOT NULL,
  `voto` int(1) unsigned NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `vot_ciud_iniciativa_idx` (`iniciativa_id`),
  KEY `vot_ciud_user_idx` (`user_id`),
  CONSTRAINT `vot_ciud_iniciativa` FOREIGN KEY (`iniciativa_id`) REFERENCES `iniciativa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vot_ciud_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votacion_ciudadana`
--

LOCK TABLES `votacion_ciudadana` WRITE;
/*!40000 ALTER TABLE `votacion_ciudadana` DISABLE KEYS */;
INSERT INTO `votacion_ciudadana` VALUES (3,2,4,0,'dfdsrs'),(4,2,3,0,NULL),(5,2,5,1,NULL),(6,3,5,0,NULL),(7,3,4,1,NULL),(8,3,3,0,NULL),(9,4,4,0,NULL),(10,4,3,0,'hola'),(11,4,5,0,'probando'),(12,5,3,0,'jeje');
/*!40000 ALTER TABLE `votacion_ciudadana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votacion_diputado`
--

DROP TABLE IF EXISTS `votacion_diputado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votacion_diputado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iniciativa_id` int(10) unsigned NOT NULL,
  `voto` int(1) unsigned NOT NULL,
  `diputado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vot_diputado_iniciativa_idx` (`iniciativa_id`),
  KEY `vot_diputado_diputado_idx` (`diputado_id`),
  CONSTRAINT `vot_diputado_diputado` FOREIGN KEY (`diputado_id`) REFERENCES `diputado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vot_diputado_iniciativa` FOREIGN KEY (`iniciativa_id`) REFERENCES `iniciativa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votacion_diputado`
--

LOCK TABLES `votacion_diputado` WRITE;
/*!40000 ALTER TABLE `votacion_diputado` DISABLE KEYS */;
INSERT INTO `votacion_diputado` VALUES (1,3,1,1);
/*!40000 ALTER TABLE `votacion_diputado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'diputados'
--

--
-- Dumping routines for database 'diputados'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-13 13:56:33
