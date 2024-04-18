-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: wpproject
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boarding_house`
--

DROP TABLE IF EXISTS `boarding_house`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boarding_house` (
  `boarding_house_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`boarding_house_id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `boarding_house_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boarding_house`
--

LOCK TABLES `boarding_house` WRITE;
/*!40000 ALTER TABLE `boarding_house` DISABLE KEYS */;
INSERT INTO `boarding_house` VALUES (1,'Kost Ipong','Updated Address',4);
/*!40000 ALTER TABLE `boarding_house` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_room`
--

DROP TABLE IF EXISTS `books_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_room` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `status` enum('confirmed','pending') NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `user_id` (`user_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `books_room_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `books_room_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_room`
--

LOCK TABLES `books_room` WRITE;
/*!40000 ALTER TABLE `books_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `books_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` varchar(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `boarding_house_id` int(11) NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `room_ibfk_1` (`boarding_house_id`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`boarding_house_id`) REFERENCES `boarding_house` (`boarding_house_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `user_type` enum('regular','owner') NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `registration_date` datetime DEFAULT current_timestamp(),
  `last_login_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user1','password1','user1@example.com','Nanang Rumput','123456789','regular','Jl. Merdeka','1998-02-12','male','Belajar Web Prog','2024-03-30 20:32:37',NULL,'active'),(2,'user2','password2','user2@example.com','Bagas Dribble','123456789','regular','Jl. Merdeka','1998-02-12','male','Belajar Web Prog','2024-03-30 20:32:37',NULL,'active'),(4,'dicky','$2y$10$eOHXiKzH8.DQ7LzSLbcg9uDsr4haW9OFAHPCZJVttbbKGNBBAhJEa','daditrianza@gmail.com','Dicky Aditrianza','081368140190','regular','Jl. Pancoran Barat','2003-07-16','male','Computer Science student','2024-03-30 22:10:41',NULL,'active'),(5,'samsepiol','$2y$10$ZwNZz7b1s0w0HLwzWawfjexHqAxKG688eMwBJQcl1bmLdx0KDwmcS','test@example.com','Sam Sepiol','08543216789','regular','','2024-04-01','male','Testing Register page','2024-04-18 06:58:57',NULL,'active'),(6,'','$2y$10$KCqXllCDuaBsznJcEq7YPePoli5I4SnLfsBRCsmgnGJUzL36VIevK','','','','','','0000-00-00','','','2024-04-18 07:02:06',NULL,'active'),(7,'User3','$2y$10$w88nfB02L8yM9Ggu30pnquktWEntlkywUJRU7UwDxPvptjKAmVIXK','test@example.com','User tiga','08543216789','regular','','2024-04-01','male','Testing Register page','2024-04-18 07:06:37',NULL,'active'),(8,'User4','$2y$10$NiBC9.xfEqJLvzAWTCwCiOAW7QQAqiwI0VJ98Q5oA4r/N1QtdLRQi','test@example.com','User empat','08543216789','regular','','2024-04-01','male','Testing Register page','2024-04-18 07:09:36',NULL,'active'),(9,'User5','$2y$10$ImgjvwPjYoKmyB.CTpU3XuhJhfjxs/a4Tg6RjUhMa/JOytDrGJ2MG','test@example.com','User lima','08543216789','regular','','2024-04-01','male','Testing Register page','2024-04-18 07:10:21',NULL,'active'),(10,'user6','$2y$10$XBliIXsZEA3skM/4S5Xel.QUQ7ohSOO30naLN2azEShcgZS5ViWZu','test@examples.com','user enam','08543216789','regular','','2024-04-08','male','Testing Register page','2024-04-18 07:49:23',NULL,'active'),(11,'user7','$2y$10$8POYz7vFyC02D03bBEtKVuKk6et1fSHqlW2HTDz5ucT.ZXuSkuxkW','test@gmail.com','user tujuh','08543216789','regular','','2024-04-09','male','124','2024-04-18 08:04:23',NULL,'active');
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

-- Dump completed on 2024-04-18  8:06:24
