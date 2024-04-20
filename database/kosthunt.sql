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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
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
  `price` decimal(10,2) NOT NULL,
  `owner_phone_number` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`boarding_house_id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `boarding_house_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boarding_house`
--

LOCK TABLES `boarding_house` WRITE;
/*!40000 ALTER TABLE `boarding_house` DISABLE KEYS */;
INSERT INTO `boarding_house` VALUES (1,'Kost Bambang','Jl. Pancoran',4,5000000.00,'+1234567895','Sample description for Kost Ipong','../uploads/kost1.jpg'),(2,'Kost Mutiara','Jl. Mutiara No. 12',4,4500000.00,'+1234567896','Sample description for Kost Mutiara','../uploads/kost2.jpg'),(3,'Kost Ceria','Jl. Ceria No. 34',4,4000000.00,'+1234567897','Sample description for Kost Ceria','../uploads/kost4.jpg'),(4,'Kost Damai','Jl. Damai No. 56',4,4800000.00,'+1234567898','Sample description for Kost Damai','../uploads/kost5.jpg'),(5,'Kost Harmoni','Jl. Harmoni No. 78',4,5200000.00,'+1234567899','Sample description for Kost Harmoni','../uploads/kost6.jpg'),(6,'Kost Sejahtera','Jl. Sejahtera No. 90',4,4600000.00,'+1234567891','A cozy place for students','../uploads/kost9.jpg'),(7,'Kost Bahagia','Jl. Bahagia No. 123',4,4300000.00,'+1234567892','Affordable rooms with good facilities','../uploads/kost11.jpg'),(8,'Kost Sentosa','Jl. Sentosa No. 45',4,4900000.00,'+1234567893','Nearby to campus and market','../uploads/kost5.jpg');
/*!40000 ALTER TABLE `boarding_house` ENABLE KEYS */;
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
  `user_type` enum('regular','owner','admin') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `registration_date` datetime DEFAULT current_timestamp(),
  `last_login_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user1','password1','user1@example.com','Budi Doremi','987-654-3210','','Updated Address','1990-01-01','female','Updated Bio','2024-03-30 20:32:37',NULL,'active'),(2,'user2','password2','user2@example.com','Bagas Dribble','123456789','regular','Jl. Merdeka','1998-02-12','male','Belajar Web Prog','2024-03-30 20:32:37',NULL,'active'),(4,'dicky','$2y$10$eOHXiKzH8.DQ7LzSLbcg9uDsr4haW9OFAHPCZJVttbbKGNBBAhJEa','daditrianza@gmail.com','Dicky Aditrianza','081368140190','admin','Jl. Pancoran Barat','2003-07-16','male','Computer Science student','2024-03-30 22:10:41',NULL,'active'),(5,'samsepiol','$2y$10$ZwNZz7b1s0w0HLwzWawfjexHqAxKG688eMwBJQcl1bmLdx0KDwmcS','test@example.com','Sam Sepiol','08543216789','regular','','2024-04-01','male','Testing Register page','2024-04-18 06:58:57',NULL,'active'),(6,'','$2y$10$KCqXllCDuaBsznJcEq7YPePoli5I4SnLfsBRCsmgnGJUzL36VIevK','','','','','','0000-00-00','','','2024-04-18 07:02:06',NULL,'active'),(7,'User3','$2y$10$w88nfB02L8yM9Ggu30pnquktWEntlkywUJRU7UwDxPvptjKAmVIXK','test@example.com','User tiga','08543216789','regular','','2024-04-01','male','Testing Register page','2024-04-18 07:06:37',NULL,'active'),(8,'User4','$2y$10$NiBC9.xfEqJLvzAWTCwCiOAW7QQAqiwI0VJ98Q5oA4r/N1QtdLRQi','test@example.com','User empat','08543216789','regular','','2024-04-01','male','Testing Register page','2024-04-18 07:09:36',NULL,'active'),(9,'User5','$2y$10$ImgjvwPjYoKmyB.CTpU3XuhJhfjxs/a4Tg6RjUhMa/JOytDrGJ2MG','test@example.com','User lima','08543216789','regular','','2024-04-01','male','Testing Register page','2024-04-18 07:10:21',NULL,'active'),(10,'user6','$2y$10$XBliIXsZEA3skM/4S5Xel.QUQ7ohSOO30naLN2azEShcgZS5ViWZu','test@examples.com','user enam','08543216789','regular','','2024-04-08','male','Testing Register page','2024-04-18 07:49:23',NULL,'active'),(11,'user7','$2y$10$8POYz7vFyC02D03bBEtKVuKk6et1fSHqlW2HTDz5ucT.ZXuSkuxkW','test@gmail.com','user tujuh','08543216789','regular','','2024-04-09','male','124','2024-04-18 08:04:23',NULL,'active'),(12,'user8','$2y$10$Fo2E.frvZaBWi3EmoWbFpucIuIWV/qaUZzF1hTJlxnTsvzCnZPbhu','test123@example.com','user delapan','0812777777','regular','','0000-00-00','male','','2024-04-19 05:53:52',NULL,'active'),(13,'johndoe','$2y$10$XP.5fg89cc9C3EE8K1HHkOsHM9BoaMrMwOs36aJW07t0IYnm2vmJC','johndoe@gmail.com','John Doe','08543216789','','Jl. Pancoran Barat IV D No.81, RT.10/RW.1','0000-00-00','male','','2024-04-19 06:25:12',NULL,'active');
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

-- Dump completed on 2024-04-20 16:19:38
