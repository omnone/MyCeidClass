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
-- Table structure for table `ergasies`
--

DROP TABLE IF EXISTS `ergasies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ergasies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ergasies`
--

LOCK TABLES `ergasies` WRITE;
/*!40000 ALTER TABLE `ergasies` DISABLE KEYS */;
INSERT INTO `ergasies` VALUES (4,'2019-05-08 13:33:22','2019-05-08 13:33:22','Άσκηση 3','Δεν υπάρχει περιγραφή.','2019-05-02 17:23:00','-',1),(5,'2019-05-08 13:33:43','2019-05-08 13:33:43','Άσκηση 4','Αντίθετα με αυτό που θεωρεί η πλειοψηφία, το Lorem Ipsum δεν είναι απλά ένα τυχαίο κείμενο. Οι ρίζες του βρίσκονται σε ένα κείμενο Λατινικής λογοτεχνίας του 45 π.Χ., φτάνοντας την ηλικία του πάνω από 2000 έτη.','2019-04-08 17:23:00','-',1),(6,'2019-05-08 13:34:13','2019-05-08 13:34:13','Άσκηση 5','Δεν υπάρχει περιγραφή.','2019-05-23 11:59:00','-',1),(7,'2019-05-08 13:36:10','2019-05-08 13:36:10','Εργασία Εξαμήνου','Αντίθετα με αυτό που θεωρεί η πλειοψηφία, το Lorem Ipsum δεν είναι απλά ένα τυχαίο κείμενο. Οι ρίζες του βρίσκονται σε ένα κείμενο Λατινικής λογοτεχνίας του 45 π.Χ., φτάνοντας την ηλικία του πάνω από 2000 έτη.','2019-05-08 16:34:00','-',1),(8,'2019-05-08 14:23:51','2019-05-08 14:23:51','1ο Παραδοτέο','Δεν υπάρχει περιγραφή.','2019-05-08 11:59:00','distr_alg_hs_1557336231.ppt',1),(9,'2019-05-19 11:05:00','2019-05-19 11:05:00','Εργαστηριακή Άσκηση 1','Αντίθετα με αυτό που θεωρεί η πλειοψηφία, το Lorem Ipsum δεν είναι απλά ένα τυχαίο κείμενο. Οι ρίζες του βρίσκονται σε ένα κείμενο Λατινικής λογοτεχνίας του 45 π.Χ., φτάνοντας την ηλικία του πάνω από 2000 έτη.','2019-05-22 11:59:00','-',2),(10,'2019-05-19 11:05:34','2019-05-19 11:05:34','Εργαστηριακή Άσκηση 2','Αντίθετα με αυτό που θεωρεί η πλειοψηφία, το Lorem Ipsum δεν είναι απλά ένα τυχαίο κείμενο. Οι ρίζες του βρίσκονται σε ένα κείμενο Λατινικής λογοτεχνίας του 45 π.Χ., φτάνοντας την ηλικία του πάνω από 2000 έτη.','2019-05-22 11:59:00','-',2);
/*!40000 ALTER TABLE `ergasies` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-21 21:23:54
