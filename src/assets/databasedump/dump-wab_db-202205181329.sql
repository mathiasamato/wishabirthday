-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: wab_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.34-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comments` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CreatedOn` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedBy` int(20) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `MessageId` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (17,'2022-05-18 08:04:38',29,'dsadasd',39),(18,'2022-05-18 13:22:21',31,'Tu as une jolie image de profil !',39);
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Languages`
--

DROP TABLE IF EXISTS `Languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Languages` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Languages`
--

LOCK TABLES `Languages` WRITE;
/*!40000 ALTER TABLE `Languages` DISABLE KEYS */;
INSERT INTO `Languages` VALUES (1,'Français'),(2,'Anglais');
/*!40000 ALTER TABLE `Languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Likes`
--

DROP TABLE IF EXISTS `Likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Likes` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `MessageId` bigint(20) NOT NULL,
  `LikedOn` datetime NOT NULL DEFAULT current_timestamp(),
  `LikedBy` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Likes`
--

LOCK TABLES `Likes` WRITE;
/*!40000 ALTER TABLE `Likes` DISABLE KEYS */;
INSERT INTO `Likes` VALUES (178,39,'2022-05-18 13:22:22',31),(180,39,'2022-05-18 13:28:15',28),(181,40,'2022-05-18 13:28:27',28);
/*!40000 ALTER TABLE `Likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Messages`
--

DROP TABLE IF EXISTS `Messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Messages` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CreatedOn` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedBy` bigint(20) NOT NULL,
  `CreatedFor` bigint(20) NOT NULL,
  `Text` text NOT NULL,
  `IsPrivate` tinyint(1) NOT NULL DEFAULT 0,
  `LanguageId` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Messages`
--

LOCK TABLES `Messages` WRITE;
/*!40000 ALTER TABLE `Messages` DISABLE KEYS */;
INSERT INTO `Messages` VALUES (39,'2022-05-18 08:04:30',29,28,'Salut',0,1),(40,'2022-05-18 13:22:09',31,29,'Bon anniversaire Valery !',0,1),(41,'2022-05-18 13:26:27',28,31,'Qui veut venir observer les avions avec moi demain ?',0,1),(42,'2022-05-18 13:28:02',28,29,'Qui recevra ce message ?',1,1);
/*!40000 ALTER TABLE `Messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CreatedOn` datetime NOT NULL DEFAULT current_timestamp(),
  `Firstname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `DoB` date NOT NULL,
  `Password` varchar(255) NOT NULL,
  `LanguageId` bigint(20) NOT NULL,
  `Picture` varchar(255) NOT NULL DEFAULT 'image.jpg',
  `ActivationCode` varchar(25) NOT NULL DEFAULT '0',
  `Lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (28,'2022-05-18 08:00:24','Mathias','mathiasamato9@gmail.com','2000-01-11','7b5e89a286826309b24b0d88ad94d16a725ce446',1,'6284d73f277b1-hb-jhg-swiss-airbus-a330-343_PlanespottersNet_245579_59e8668ab5_o.jpg','0','Amato'),(29,'2022-05-18 08:03:44','Valery','nalote2193@dufeed.com','2002-05-18','0c0a69a62013d473410352dcb764d94c68567471',1,'62849db58da6e-472537.jpg','0','Dias'),(31,'2022-05-18 13:18:59','Alex','mathias.amt@eduge.ch','1999-06-02','aae219af1ca7f99412f5b4c4aaea908c1e534c0b',1,'6284d623d4940-jack_london.png','0','Clifford');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'wab_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-18 13:29:29
