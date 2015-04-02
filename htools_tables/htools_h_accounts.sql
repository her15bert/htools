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
-- Table structure for table `h_accounts`
--

DROP TABLE IF EXISTS `h_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `h_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `placeHolder` varchar(45) DEFAULT NULL,
  `parentAccount` varchar(255) DEFAULT NULL,
  `dateCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `h_accounts`
--

LOCK TABLES `h_accounts` WRITE;
/*!40000 ALTER TABLE `h_accounts` DISABLE KEYS */;
INSERT INTO `h_accounts` VALUES (9,1,'Salary Herbert','',NULL,NULL,'','Income',NULL,'Salary:Wistron Corporation','2015-01-03 05:47:25',NULL),(8,10,'Wistron Corporation','',NULL,NULL,'','Source',NULL,'Salary','2015-01-03 05:46:01',NULL),(10,9,'AXA Jhunelen','',NULL,NULL,'','Asset',NULL,'Savings:AXA','2015-01-03 05:48:36',NULL),(12,9,'Sun Life Jhunelen','',NULL,NULL,'','Asset',NULL,'Insurance:Sun Life','2015-01-03 05:49:16',NULL),(13,1,'AXA Herbert',NULL,NULL,NULL,NULL,'Asset',NULL,'Savings:AXA','2015-01-03 06:06:42',NULL),(14,1,'Sun Life Herbert',NULL,NULL,NULL,NULL,'Asset',NULL,'Insurance:Sun Life','2015-01-03 06:06:42',NULL);
/*!40000 ALTER TABLE `h_accounts` ENABLE KEYS */;
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
