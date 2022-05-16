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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (1,'2022-05-10 12:57:11',8,'Salut toi',25),(2,'2022-05-10 12:57:19',9,'Salut toii',18),(3,'2022-05-10 15:03:31',8,'hhhhh',25),(4,'2022-05-10 15:09:28',8,'ssss',25),(5,'2022-05-10 15:09:29',8,'fsdfsdf',25),(6,'2022-05-10 15:09:31',8,'d',25),(7,'2022-05-10 15:09:32',8,'aaaaa',25),(8,'2022-05-10 15:09:34',8,'aaaaaaa',25),(9,'2022-05-10 15:09:35',8,'aaaaaa',25),(10,'2022-05-10 16:26:12',8,'fffffff',25),(11,'2022-05-10 16:26:16',8,'aaaa',25),(12,'2022-05-11 08:22:47',8,'aaaa',25),(13,'2022-05-11 10:34:51',8,'sss',17),(14,'2022-05-16 08:26:33',18,'nan mais oh',28),(15,'2022-05-16 08:26:39',18,'????',27),(16,'2022-05-16 09:06:40',18,'Merci !',30);
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
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Likes`
--

LOCK TABLES `Likes` WRITE;
/*!40000 ALTER TABLE `Likes` DISABLE KEYS */;
INSERT INTO `Likes` VALUES (134,15,'2022-05-11 10:34:57',8),(143,17,'2022-05-16 09:05:48',8),(154,30,'2022-05-16 09:19:27',18),(159,30,'2022-05-16 14:10:25',8),(161,36,'2022-05-16 14:47:36',8);
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Messages`
--

LOCK TABLES `Messages` WRITE;
/*!40000 ALTER TABLE `Messages` DISABLE KEYS */;
INSERT INTO `Messages` VALUES (15,'2022-05-05 09:25:13',8,9,'Test',0,1),(16,'2022-05-05 09:26:05',8,10,'cgfgfgfgj',0,1),(17,'2022-05-05 09:26:29',9,8,'sdddddddd',0,2),(18,'2022-05-05 09:26:31',8,9,'ghfjghmjghjgujhghjtghj',0,2),(19,'2022-05-05 11:07:13',8,10,'rttrtrrrrtrt',1,1),(20,'2022-05-05 11:07:24',8,10,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,1),(21,'2022-05-05 11:29:16',8,10,'ddrgfdfgdfgdfgdfgdgfdgfdfggdfdfgdfgdfg',0,1),(22,'2022-05-05 11:29:41',8,9,'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',1,1),(23,'2022-05-05 15:27:42',9,10,'Salut comment tu vas',0,2),(24,'2022-05-05 16:29:54',8,10,'test 123',1,1),(25,'2022-05-09 08:38:25',8,10,'Il y a pas le feu au lacIl y a pas le feu au lacIl y a pas le feu au lacIl y a pas le feu au lac',0,1),(26,'2022-05-11 08:24:49',8,9,'fdgsfdsdffsd',0,1),(27,'2022-05-11 08:25:56',8,10,'sadsaasdasdsda',0,1),(28,'2022-05-16 08:26:09',18,9,'Celui qui voit mon message est beau',0,1),(29,'2022-05-16 08:27:10',18,10,'Salut inconnu',1,1),(30,'2022-05-16 09:05:09',8,10,'Celui qui voit mon message est beau',0,1),(35,'2022-05-16 14:47:03',8,18,'Salut privé',1,1),(36,'2022-05-16 14:47:10',8,18,'Salut public',0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (8,'2022-05-04 08:30:06','Mathias','mathiasamato8@gmail.com','2021-05-16','7b5e89a286826309b24b0d88ad94d16a725ce446',1,'loveless.jpg','0','Amato'),(9,'2022-05-05 08:04:13','Mathiasssss','mathias.amt@eduge.ch','2021-05-17','7b5e89a286826309b24b0d88ad94d16a725ce446',1,'image.jpg','0','Amato'),(10,'2022-05-05 08:14:43','Mathiasssss','adibou@gmail.com','2021-05-16','7b5e89a286826309b24b0d88ad94d16a725ce446',1,'image.jpg','0','Amato'),(11,'2022-05-05 08:14:52','Mathiasssss','qwertz@gmail.com','2021-05-16','7b5e89a286826309b24b0d88ad94d16a725ce446',1,'image.jpg','0','Amato'),(18,'2022-05-16 08:23:52','Valery','nalote2193@dufeed.com','2021-05-16','fd998794b7f85a1a997e5e526d97df9c491d105a',1,'6281ee6e3ba17-6etapes.png','0','Dias'),(19,'2022-05-16 14:50:33','Bava','bava@gmail.com','2021-05-17','fd998794b7f85a1a997e5e526d97df9c491d105a',1,'image.jpg','0','Dimitrei');
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

-- Dump completed on 2022-05-16 16:35:07
