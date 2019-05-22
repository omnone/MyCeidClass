-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: myceidclass
-- ------------------------------------------------------
-- Server version	8.0.16

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
-- Table structure for table `anartiseis`
--

DROP TABLE IF EXISTS `anartiseis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anartiseis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sizitisi_id` int(11) NOT NULL,
  `answer_to` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anartiseis`
--

LOCK TABLES `anartiseis` WRITE;
/*!40000 ALTER TABLE `anartiseis` DISABLE KEYS */;
INSERT INTO `anartiseis` VALUES (1,'2019-05-12 09:06:52','2019-05-12 09:06:52',1,2,'Anartisi test','this is a test',1,0),(2,'2019-05-12 09:11:45','2019-05-12 09:11:45',1,2,'anartisi test 2','test test test test',1,0),(3,'2019-05-12 09:18:47','2019-05-12 09:18:47',1,2,'anartisi test 2','test test test test',1,0),(4,'2019-05-12 09:46:50','2019-05-12 09:46:50',1,2,'Εξέταση Μαθήματος','this is a anwser',1,1),(5,'2019-05-12 09:52:23','2019-05-12 09:52:23',1,2,'is an answer','Αλλη μια απάντηση',1,1),(6,'2019-05-12 09:54:53','2019-05-12 09:54:53',1,2,'Παραδοση ασκησης','Καλησπέρα που πρέπει να παραδώσουμε την άσκηση?',1,0),(7,'2019-05-12 09:57:28','2019-05-12 09:57:28',1,2,'Παραδοση ασκησης','Καλησπέρα που πρέπει να παραδώσουμε την άσκηση?',1,0),(8,'2019-05-12 10:05:24','2019-05-12 10:05:24',1,2,'is an answer','?????',1,7),(9,'2019-05-12 10:07:04','2019-05-12 10:07:04',1,2,'is an answer','Αλλη μια απάντηση',1,1),(10,'2019-05-12 12:48:07','2019-05-12 12:48:07',1,3,'is an answer','Αλλη μια απάντηση',1,1),(11,'2019-05-12 12:48:40','2019-05-12 12:48:40',1,3,'is an answer','Αλλη μια απάντηση',1,1),(12,'2019-05-12 12:49:12','2019-05-12 12:49:12',1,3,'is an answer','Αλλη μια απάντηση',1,1),(13,'2019-05-12 14:09:10','2019-05-12 14:09:10',1,3,'is an answer','Αλλη μια απάντηση',1,2),(14,'2019-05-12 17:40:31','2019-05-12 17:40:31',1,2,'is an answer','Αλλη μια απάντηση',1,1),(15,'2019-05-12 17:40:59','2019-05-12 17:40:59',1,2,'is an answer','Αλλη μια απάντηση',1,1),(16,'2019-05-12 17:41:13','2019-05-12 17:41:13',1,2,'is an answer','Αλλη μια απάντηση',1,1),(17,'2019-05-14 08:04:06','2019-05-14 08:04:06',1,2,'is an answer','Αλλη μια απάντηση',1,1),(18,'2019-05-17 15:51:10','2019-05-17 15:51:10',1,2,'is an answer','Αλλη μια απάντηση',1,2),(19,'2019-05-18 11:13:16','2019-05-18 11:13:16',1,3,'is an answer','Αλλη μια απάντηση',1,7),(20,'2019-05-20 09:40:57','2019-05-20 09:40:57',1,2,'is an answer','Αλλη μια απάντηση',1,1);
/*!40000 ALTER TABLE `anartiseis` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-21 21:23:55