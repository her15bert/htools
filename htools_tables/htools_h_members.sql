CREATE DATABASE  IF NOT EXISTS `htools` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `htools`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: htools
-- ------------------------------------------------------
-- Server version	5.1.49-community

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
-- Table structure for table `h_members`
--

DROP TABLE IF EXISTS `h_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `h_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `h_members`
--

LOCK TABLES `h_members` WRITE;
/*!40000 ALTER TABLE `h_members` DISABLE KEYS */;
INSERT INTO `h_members` VALUES (1,'dad','$2y$12$XBUh93MXVbxUBu2GzNo/iOTgoRaoptR.ahnVT96AcRh4n.uL9.azm','herbertagosto@gmail.com',NULL,'2014-12-29 03:34:21'),(9,'mom','$2y$12$IlLTQCIxLcb8eUUagx.zbeOclVoJXTYezF.nWud.kWDGGzLQcwsS2','jhunelen@gmail.com',NULL,'2015-01-02 17:04:56'),(4,'family','$2y$12$JpSjEoFG6/Ns/2EDyKnsUO5wGdk1wwsUoVBJ6P2lbmZCEt.LmkJKC','herbertagosto@gmail.com',NULL,'2014-12-29 11:15:27'),(10,'Wistron Corporation','$2y$12$aIwlpszpizMs3IJO4tEyluBRqUHqbRbDzXPXII2JMB0n6E.XTyTKm','wistron@wistron.corp',NULL,'2015-01-03 06:04:20');
/*!40000 ALTER TABLE `h_members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-03 17:58:03
