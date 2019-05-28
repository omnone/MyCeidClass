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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Νίκος','Νικολάου','nikolaou@ceid.upatras.gr','prof',NULL,'$2y$10$tap1goPVgiAzC0Yl2xe8PuwXLtNFUwfVvnX88nYLcWlN57F/uDRWe','CussZllTF1dE7LSW2gGE753oYrcfYslgJbXgVNHMrlb4ko6B9nfHrsmpT1Ap','2019-05-13 14:41:14',NULL,'2019-05-13 17:41:14','127.0.0.1'),(2,'Kostas','Konstantinou','konst@ceid.upatras.gr','student',NULL,'$2y$10$xr79aUwgknLwOBQHsk7MueojfLUjx8nNOMfGBwEDfXsTJZ4tAzv5O','O88clFJXkXHiFPH9nmsHjIb4elkEltvSi8vQeGfFM502zIlsmnCCjLfhVt6s','2019-05-13 14:41:14',NULL,'2019-05-13 17:41:14','127.0.0.1'),(3,'Γιώργος','Δημητρίου','dim@ceid.upatras.gr','prof',NULL,'$2y$10$oRMht8bAUgbIYe8pMDSD.OjuwHDIBlcNqVemtqlFq/Q2OHo7Ll5xO','UNCuxi3RDJByl3SrDP9BiYkudAydyDL8lDNJfM5DitLCh0IOqIQAsuHShLbL','2019-05-13 14:41:14','2019-05-17 12:03:33','2019-05-13 17:41:14','127.0.0.1'),(4,'Admin','Admin','admin@ceid.upatras.gr','admin',NULL,'$2y$10$.EeVCTnB3lgeR/E6Mx.CgOPGtkg.taI9f8tw5wpTdL.3pk5wzybiW','Z6hnMRBMiJu5HB4iEPASZ4fWejH0ddy7lVnlGhDA8yiFMyPnzvKeSNtqEaEO','2019-05-13 14:41:14','2019-05-28 09:13:45','2019-05-28 12:13:45','127.0.0.1'),(5,'Μαρία','Παπαδοπούλου','papad@ceid.upatras.gr','student',NULL,'$2y$10$oRMht8bAUgbIYe8pMDSD.OjuwHDIBlcNqVemtqlFq/Q2OHo7Ll5xO','k5MrjC2xz6lgTMulMRKbmHcQhRNIxAZ5I5g1Q5A8DnNutUwnBpVyASR5u0Bc','2019-05-13 14:41:14','2019-05-28 09:11:35','2019-05-28 12:11:35','127.0.0.1'),(6,'Αλέξανδρος','Αλεξανδρόπουλος','alexandr@ceid.upatras.gr','student',NULL,'$2y$10$oRMht8bAUgbIYe8pMDSD.OjuwHDIBlcNqVemtqlFq/Q2OHo7Ll5xO','oGWg0PS62Y710PxEVBZsbMuS2Ucly2YNgV7jADH9MqMt2Gzx8NRShfG91agr','2019-05-13 14:41:14','2019-05-28 09:10:11','2019-05-28 12:10:11','127.0.0.1');
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

-- Dump completed on 2019-05-28 12:20:47
