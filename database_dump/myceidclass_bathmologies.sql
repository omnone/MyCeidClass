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
-- Table structure for table `bathmologies`
--

DROP TABLE IF EXISTS `bathmologies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bathmologies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eksamino` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` double DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bathmologies`
--

LOCK TABLES `bathmologies` WRITE;
/*!40000 ALTER TABLE `bathmologies` DISABLE KEYS */;
INSERT INTO `bathmologies` VALUES (1,'ΤΕΧΝΟΛΟΓΙΕΣ ΥΛΟΠΟΙΗΣΗΣ ΑΛΓΟΡΙΘΜΩΝ','Εαρινό Εξάμηνο','8ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά Κατ\' Επι',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(2,'ΕΞΟΡΥΞΗ ΔΕΔΟΜΕΝΩΝ ΚΑΙ ΑΛΓΟΡΙΘΜΟΙ ΜΑΘΗΣΗΣ','Εαρινό Εξάμηνο','8ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά Κατ\' Επι',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(3,'ΤΕΧΝΟΛΟΓΙΑ ΛΟΓΙΣΜΙΚΟΥ','Εαρινό Εξάμηνο','8ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(4,'ΠΡΟΗΓΜΕΝΟΙ ΜΙΚΡΟΕΠΕΞΕΡΓΑΣΤΕΣ','Εαρινό Εξάμηνο','8ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(5,'ΨΗΦΙΑΚΗ ΕΠΕΞΕΡΓΑΣΙΑ ΣΗΜΑΤΩΝ','Εαρινό Εξάμηνο','6ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(6,'ΔΙΚΤΥΑ ΥΠΟΛΟΓΙΣΤΩΝ','Εαρινό Εξάμηνο','6ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(7,'ΑΡΙΘΜΗΤΙΚΗ ΑΝΑΛΥΣΗ & ΠΕΡΙΒΑΛΛΟΝΤΑ ΥΛΟΠΟΙ','Εαρινό Εξάμηνο','4o Eξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(8,'ΣΥΓΧΡΟΝΑ ΘΕΜΑΤΑ ΑΡΧΙΤΕΚΤΟΝΙΚΗΣ ΥΠΟΛΟΓΙΣΤ','Εαρινό Εξάμηνο','4o Eξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(9,'ΘΕΩΡΙΑ ΣΗΜΑΤΩΝ ΚΑΙ ΣΥΣΤΗΜΑΤΩΝ','Εαρινό Εξάμηνο','4o Eξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(10,'ΜΙΚΡΟΫΠΟΛΟΓΙΣΤΕΣ','Χειμερινό Εξάμηνο','7ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(11,'ΘΕΩΡΙΑ ΓΡΑΦΗΜΑΤΩΝ ΚΑΙ ΕΦΑΡΜΟΓΕΣ','Χειμερινό Εξάμηνο','3ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(12,'ΜΑΘΗΜΑΤΙΚΑ Ι','Χειμερινό Εξάμηνο','1ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(13,'ΑΡΧΕΣ ΓΛΩΣΣΩΝ ΠΡΟΓΡ/ΤΙΣΜΟΥ & ΜΕΤΑΦΡΑΣΤΩΝ','Εαρινό Εξάμηνο','6ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(14,'ΕΝΣΩΜΑΤΩΜΕΝΑ ΣΥΣΤΗΜΑΤΑ','Χειμερινό Εξάμηνο','9ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά Κατ\' Επι',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(15,'ΛΟΓΙΣΜΙΚΟ & ΠΡΟΓΡ/ΣΜΟΣ ΣΥΣΤΗΜ ΥΨΗΛ ΕΠΙΔ','Χειμερινό Εξάμηνο','7ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά Κατ\' Επι',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(16,'ΕΠΙΣΤΗΜΟΝΙΚΟΣ ΥΠΟΛΟΓΙΣΜΟΣ','Χειμερινό Εξάμηνο','7ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(17,'ΨΗΦΙΑΚΕΣ ΤΗΛΕΠΙΚΟΙΝΩΝΙΕΣ','Χειμερινό Εξάμηνο','7ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',0,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(18,'ΒΑΣΙΚΑ ΘΕΜΑΤΑ ΑΡΧΙΤΕΚΤΟΝΙΚΗΣ ΥΠΟΛΟΓΙΣΤΩΝ','Χειμερινό Εξάμηνο','3ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(19,'ΠΙΘΑΝΟΤΗΤΕΣ ΚΑΙ ΑΡΧΕΣ ΣΤΑΤΙΣΤΙΚΗΣ','Χειμερινό Εξάμηνο','3ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(20,'ΔΟΜΕΣ ΔΕΔΟΜΕΝΩΝ','Εαρινό Εξάμηνο','4o Eξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(21,'ΕΙΣΑΓΩΓΗ ΣΤΟΥΣ ΑΛΓΟΡΙΘΜΟΥΣ','Χειμερινό Εξάμηνο','3ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(22,'ΜΑΘΗΜΑΤΙΚΑ ΙΙ','Εαρινό Εξάμηνο','2ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(23,'ΟΡΓΑΝΑ ΚΑΙ ΜΕΤΡΗΣΕΙΣ','Εαρινό Εξάμηνο','2ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(24,'ΘΕΩΡΙΑ ΚΥΚΛΩΜΑΤΩΝ','Εαρινό Εξάμηνο','2ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(25,'ΦΥΣΙΚΗ','Χειμερινό Εξάμηνο','1ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(26,'ΓΡΑΜΜΙΚΗ ΑΛΓΕΒΡΑ','Εαρινό Εξάμηνο','2ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5.5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(27,'ΟΝΤΟΚΕΝΤΡΙΚΟΣ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ','Εαρινό Εξάμηνο','2ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',5.5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(28,'ΨΗΦΙΑΚΑ ΗΛΕΚΤΡΟΝΙΚΑ','Εαρινό Εξάμηνο','4o Eξάμηνο ΜΗΥ&Π - Υποχρεωτικά',6,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(29,'ΔΙΑΚΡΙΤΑ ΜΑΘΗΜΑΤΙΚΑ','Χειμερινό Εξάμηνο','1ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',6,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(30,'ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ','Χειμερινό Εξάμηνο','5ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',6.5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(31,'ΑΝΑΚΤΗΣΗ ΠΛΗΡΟΦΟΡΙΑΣ','Χειμερινό Εξάμηνο','5ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά Κατ\' Επι',7,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(32,'ΛΟΓΙΚΗ ΣΧΕΔΙΑΣΗ ΙΙ','Εαρινό Εξάμηνο','2ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',6.5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(33,'ΛΟΓΙΚΗ ΣΧΕΔΙΑΣΗ Ι','Χειμερινό Εξάμηνο','1ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',6.5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(34,'ΚΑΤΑΝΕΜΗΜΕΝΑ ΣΥΣΤΗΜΑΤΑ Ι','Χειμερινό Εξάμηνο','9ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά Κατ\' Επι',7,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(35,'ΘΕΩΡΙΑ ΥΠΟΛΟΓΙΣΜΟΥ','Χειμερινό Εξάμηνο','5ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',7,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(36,'ΒΑΣΕΙΣ ΔΕΔΟΜΕΝΩΝ','Χειμερινό Εξάμηνο','5ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',7,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(37,'ΒΑΣΙΚΑ ΗΛΕΚΤΡΟΝΙΚΑ','Χειμερινό Εξάμηνο','3ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',7,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(38,'ΠΑΡΑΛΛΗΛΗ ΕΠΕΞΕΡΓΑΣΙΑ','Εαρινό Εξάμηνο','6ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',7.5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(39,'ΛΕΙΤΟΥΡΓΙΚΑ ΣΥΣΤΗΜΑΤΑ','Χειμερινό Εξάμηνο','5ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',7.5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(40,'ΤΕΧΝΟΛΟΓΙΑ & ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ ΥΠΟΛΟΓΙΣΤΩΝ','Χειμερινό Εξάμηνο','1ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',7.5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(41,'ΠΡΟΓΡ/ΣΜΟΣ & ΣΥΣΤ/ΤΑ ΣΤΟΝ ΠΑΓΚΟΣΜΙΟ ΙΣΤΟ','Χειμερινό Εξάμηνο','7ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',8,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(42,'ΑΓΓΛΙΚΗ ΓΛΩΣΣΑ','Χειμερινό Εξάμηνο','1ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',8,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(43,'ΣΥΓΓΡΑΦΗ & ΠΑΡΟΥΣΙΑΣΗ ΤΕΧΝΙΚΩΝ ΚΕΙΜΕΝΩΝ','Εαρινό Εξάμηνο','6ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',8,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(44,'ΔΙΟΙΚΗΣΗ ΕΠΙΧΕΙΡΗΣΕΩΝ','Χειμερινό Εξάμηνο','3ο Εξάμηνο ΜΗΥ&Π - Γενικής Παιδείας',8,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(45,'ΕΞΑΣΦΑΛΙΣΗ ΠΟΙΟΤΗΤΑΣ ΚΑΙ ΠΡΟΤΥΠΑ','Χειμερινό Εξάμηνο','7ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά Κατ\' Επι',8.5,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(46,'e-ΕΠΙΧΕΙΡΕΙΝ','Εαρινό Εξάμηνο','8ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά Κατ\' Επι',9,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(47,'ΚΟΙΝΩΝΙΚΕΣ ΚΑΙ ΝΟΜΙΚΕΣ ΠΛΕΥΡΕΣ ΤΗΣ ΤΕΧΝΟ','Εαρινό Εξάμηνο','4ο Εξάμηνο ΜΗΥ&Π - Γενικής Παιδείας',9,2,'2019-05-11 15:12:32','2019-05-11 15:12:32'),(48,'ΥΠΟΛΟΓΙΣΤΙΚΗ ΠΟΛΥΠΛΟΚΟΤΗΤΑ','Εαρινό Εξάμηνο','6ο Εξάμηνο ΜΗΥ&Π - Υποχρεωτικά',8,2,'2019-05-11 15:12:32','2019-05-11 15:12:32');
/*!40000 ALTER TABLE `bathmologies` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-21 21:23:56
