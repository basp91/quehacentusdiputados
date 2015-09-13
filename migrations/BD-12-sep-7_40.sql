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
  `periodo_inicio` int(4) unsigned NOT NULL,
  `periodo_fin` int(4) unsigned NOT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `distrito_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `diputado_partido_idx` (`partido_id`),
  KEY `diputado_distrito_idx` (`distrito_id`),
  CONSTRAINT `diputado_distrito` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `diputado_partido` FOREIGN KEY (`partido_id`) REFERENCES `partido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diputado`
--

LOCK TABLES `diputado` WRITE;
/*!40000 ALTER TABLE `diputado` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito`
--

LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidad`
--

LOCK TABLES `entidad` WRITE;
/*!40000 ALTER TABLE `entidad` DISABLE KEYS */;
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
  `asunto` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iniciativa`
--

LOCK TABLES `iniciativa` WRITE;
/*!40000 ALTER TABLE `iniciativa` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partido`
--

LOCK TABLES `partido` WRITE;
/*!40000 ALTER TABLE `partido` DISABLE KEYS */;
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
  `entidad_id` int(10) unsigned NOT NULL,
  `ife` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votacion_ciudadana`
--

LOCK TABLES `votacion_ciudadana` WRITE;
/*!40000 ALTER TABLE `votacion_ciudadana` DISABLE KEYS */;
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
  `user_id` int(10) unsigned NOT NULL,
  `iniciativa_id` int(10) unsigned NOT NULL,
  `voto` int(1) unsigned NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `vot_diputado_user_idx` (`user_id`),
  KEY `vot_diputado_iniciativa_idx` (`iniciativa_id`),
  CONSTRAINT `vot_diputado_iniciativa` FOREIGN KEY (`iniciativa_id`) REFERENCES `iniciativa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vot_diputado_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votacion_diputado`
--

LOCK TABLES `votacion_diputado` WRITE;
/*!40000 ALTER TABLE `votacion_diputado` DISABLE KEYS */;
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

-- Dump completed on 2015-09-12 19:39:18
