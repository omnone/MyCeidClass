-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: myceidclass
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aithousa_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `periodos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES (1,1,'εβδομαδιαίο πρόγραμμα Εαρινό','Δευτέρα','9:00',1,'2019-05-19 09:38:20','2019-05-19 09:38:20','Εαρινό',0),(2,2,'εβδομαδιαίο πρόγραμμα Εαρινό','Δευτέρα','10:00',2,'2019-05-19 10:00:43','2019-05-19 10:00:43','Εαρινό',0),(3,2,'εβδομαδιαίο πρόγραμμα Εαρινό','Τρίτη','13:00',3,'2019-05-19 10:01:48','2019-05-19 10:01:48','Εαρινό',0),(4,1,'εβδομαδιαίο πρόγραμμα Εαρινό','Δευτέρα','9:00',4,'2019-05-19 10:02:20','2019-05-19 10:02:20','Εαρινό',0),(5,2,'εβδομαδιαίο πρόγραμμα Εαρινό','Τετάρτη','14:00',2,'2019-05-19 10:07:42','2019-05-19 10:07:42','Εαρινό',0),(6,3,'εβδομαδιαίο πρόγραμμα Εαρινό','Πέμπτη','12:00',1,'2019-05-19 11:00:35','2019-05-19 11:00:35','Εαρινό',0),(7,3,'εβδομαδιαίο πρόγραμμα Εαρινό','Δευτέρα','10:00',3,'2019-05-20 10:39:46','2019-05-20 10:39:46','Εαρινό',0),(9,4,'εβδομαδιαίο πρόγραμμα Εαρινό','Τετάρτη','12:00',2,'2019-05-20 10:43:31','2019-05-20 10:43:31','Εαρινό',0),(10,2,'εβδομαδιαίο πρόγραμμα Εαρινό','Τετάρτη','11:00',2,'2019-05-20 10:46:54','2019-05-20 10:46:54','Εαρινό',0);
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-22 20:06:48
