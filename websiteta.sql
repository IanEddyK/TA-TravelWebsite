-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: websiteta
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id_admin` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_form`
--

DROP TABLE IF EXISTS `book_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_form` (
  `id_book` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `package_id` int NOT NULL,
  `guests` int NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_form`
--

LOCK TABLES `book_form` WRITE;
/*!40000 ALTER TABLE `book_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_recap`
--

DROP TABLE IF EXISTS `book_recap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_recap` (
  `id_book` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `package_id` int NOT NULL,
  `guests` int NOT NULL,
  `month` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_recap`
--

LOCK TABLES `book_recap` WRITE;
/*!40000 ALTER TABLE `book_recap` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_recap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (10,'2022-09-26-032731','App\\Database\\Migrations\\Users','default','App',1665976891,1),(11,'2022-10-17-031905','App\\Database\\Migrations\\login_auth','default','App',1665976893,1),(12,'2022-10-18-022017','App\\Database\\Migrations\\Packages','default','App',1666060090,2),(13,'2022-10-18-022058','App\\Database\\Migrations\\BookForm','default','App',1666060093,2),(16,'2022-10-25-034958','App\\Database\\Migrations\\Admin','default','App',1667186204,3),(17,'2022-10-31-031548','App\\Database\\Migrations\\Users','default','App',1667186205,3),(18,'2022-11-01-033643','App\\Database\\Migrations\\Packages','default','App',1667273817,4),(19,'2022-11-01-034217','App\\Database\\Migrations\\BookForm','default','App',1667274155,5),(33,'2022-11-01-034331','App\\Database\\Migrations\\BookForm','default','App',1667275837,6),(34,'2022-11-01-034717','App\\Database\\Migrations\\BookRecap','default','App',1667275838,6),(35,'2022-11-11-173054','App\\Database\\Migrations\\Users','default','App',1668187883,7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `package_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,'Taj Mahal','Taj Mahal, Agra, Uttar Pradesh, India','img-1.jpg','15000000'),(2,'Lake Toba','Lake Toba, North Sumatra, Indonesia','img-2.jpg','4500000'),(3,'Lake Pukaki','Lake Pukaki, New Zealand','img-3.jpg','106000000'),(4,'Nijo Castle','Nijo Castle, Kyoto, Japan','img-4.jpg','4500000'),(5,'Central Park','Central Park, New York City, USA','img-5.jpg','29000000'),(6,'Hawaii','Hawaii, US','img-6.jpg','28000000'),(7,'Church of the Holy Sepulchre','Jerusalem, Israel','img-7.jpg','35000000'),(8,'Gokarna Beach','Gokarna, India','img-8.jpg','23000000'),(9,'Panak Island','Panak Island, Krasom, Thailand','img-9.jpg','8450000'),(10,'Sahara Desert','Sahara Desert, Nile Valley, Egypt','img-10.jpg','37000000'),(11,'Bintan Island','Bintan Island, Riau, Indonesia','img-11.jpg','23000000'),(12,'Coconuttree Farm House','Tamil Nadu, India','img-12.jpg','23000000');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_user` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Eku','ianeddyk@gmail.com','082192749859','$2y$10$eTMRAKLbUkbslDVY/CvW6eHX5HS6zU2S6AsjlaniJqXVwVo3frPfW','1','2022-11-11');
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

-- Dump completed on 2022-11-12 10:34:20
