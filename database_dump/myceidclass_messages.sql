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
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `file_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (3,'Προθεσμία δήλωσης μαθήματος εξεταστικής','Πρέπει να δηλώσετε το μάθημα της εξεταστικής.',4,3,'2019-05-17 10:59:08','2019-05-17 12:53:01',1,NULL),(11,'Δήλωση Συμμετοχής σε εξεταστική','Καλησπέρα , η δήλωση συμμετοχής στην εξεταστική έχει ξεκινήσει. Παρακαλώ οι ενδιαφερόμενοι να εγγραφούν εγκαίρως.',4,1,'2019-05-19 05:12:37','2019-05-20 10:32:17',1,NULL),(12,'Δήλωση Συμμετοχής σε εξεταστική','Καλησπέρα , η δήλωση συμμετοχής στην εξεταστική έχει ξεκινήσει. Παρακαλώ οι ενδιαφερόμενοι να εγγραφούν εγκαίρως.',4,2,'2019-05-19 05:12:37','2019-05-19 11:51:04',1,NULL),(13,'Έναρξη Δηλώσεων για: Εξεταστική Εαρινό 2019','Αγαπητοί συνάδερφοι , η περίοδος δήλωσης μαθημάτων προς εξέταση για την Εξεταστική Εαρινό 2019 έχει ανοίξει. Παρακαλώ όποιος επιθυμεί να δήλωσει κάποιο μάθημα για εξέταση να προβεί σε δήλωση μέχρι 2019-05-24 09:06. Ευχαριστώ εκ των προτέρων.',4,3,'2019-05-19 06:06:55','2019-05-19 06:08:13',1,NULL),(14,'Έναρξη Δηλώσεων για: Εξεταστική Εαρινό 2019','Αγαπητοί συνάδερφοι , η περίοδος δήλωσης μαθημάτων προς εξέταση για την Εξεταστική Εαρινό 2019 έχει ανοίξει. Παρακαλώ όποιος επιθυμεί να δήλωσει κάποιο μάθημα για εξέταση να προβεί σε δήλωση μέχρι 2019-05-24 09:06. Ευχαριστώ εκ των προτέρων.',4,3,'2019-05-19 06:07:17','2019-05-19 06:07:46',1,NULL),(15,'Παράδοση Εργασίας','Αντίθετα με αυτό που θεωρεί η πλειοψηφία, το Lorem Ipsum δεν είναι απλά ένα τυχαίο κείμενο. Οι ρίζες του βρίσκονται σε ένα κείμενο Λατινικής λογοτεχνίας του 45 π.Χ., φτάνοντας την ηλικία του πάνω από 2000 έτη.',2,2,'2019-05-20 12:38:26','2019-05-20 12:39:24',1,NULL),(16,'Εξέταση Εργαστηρίου','Αντίθετα με αυτό που θεωρεί η πλειοψηφία, το Lorem Ipsum δεν είναι απλά ένα τυχαίο κείμενο. Οι ρίζες του βρίσκονται σε ένα κείμενο Λατινικής λογοτεχνίας του 45 π.Χ., φτάνοντας την ηλικία του πάνω από 2000 έτη.',2,1,'2019-05-20 12:40:21','2019-05-20 12:40:21',0,NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
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
