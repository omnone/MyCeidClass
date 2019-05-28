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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_01_23_124823_create_posts_table',1),(4,'2019_02_02_213144_add_user_id_to_posts',1),(5,'2019_03_24_143154_create_lessons_table',2),(6,'2019_03_24_143657_add_user_id_to_lessons',3),(7,'2019_03_24_144426_create_user_lesson_table',4),(8,'2019_03_24_145638_create_lesson_user_table',5),(12,'2019_05_08_153408_create_ergasias_table',6),(13,'2019_05_08_161224_add_lessonid_ergasies',7),(14,'2019_05_09_201007_create_ypovoles_table',8),(15,'2019_05_09_202123_add_filepath_ypovoles',9),(16,'2019_05_09_211419_add_ypovoles_grade',10),(17,'2019_05_10_080627_create_bathmologies_table',11),(18,'2019_05_11_144958_create_arxeio_table',12),(19,'2019_05_11_150137_create_arxeio_table',13),(20,'2019_05_11_180759_test',14),(21,'2019_05_12_094943_create_table_photos',15),(22,'2019_05_12_110807_create_sizitiseis',16),(23,'2019_05_12_114343_create_anartiseis',17),(24,'2019_05_12_114838_add_to_anartiseis',18),(25,'2019_05_12_120503_add_to_anartiseis',19),(26,'2019_05_12_121342_add_to_anartiseis',20),(27,'2019_05_13_104216_create_teams',21),(28,'2019_05_13_104627_create_team_user',22),(29,'2019_05_13_110610_add_to_teams',23),(30,'2019_05_13_114434_create_omada_user',24),(31,'2019_05_13_165053_create_eksetaseis',25),(32,'2019_05_13_170943_create_aithouses',26),(33,'2019_05_13_172437_create_eksetastikes_periodoi',27),(34,'2019_05_14_160337_add_to_eksetastikes_periodoi',28),(35,'2019_05_14_160915_add_to_eksetastikes_periodoi',29),(36,'2019_05_14_165937_add_to_eksetaseis',30),(37,'2019_05_14_171530_rename_eksetaseis_column',31),(38,'2019_05_14_171818_rename_eksetaseis_column',32),(39,'2019_05_14_174818_create_diloseis',33),(40,'2019_05_15_094114_add_to_eksetaseis',34),(41,'2019_05_15_100034_add_to_aithouses',35),(42,'2019_05_15_102653_create_aithouses_eksetasis',36),(43,'2019_05_16_195048_create_messages',37),(44,'2019_05_17_133625_add_to_messages',38),(45,'2019_05_17_151643_add_to_messages',39),(46,'2019_05_17_151858_rename_column_messages',40),(47,'2019_05_19_091502_create_programs',41),(48,'2019_05_19_092832_add_to_programs',42),(49,'2019_05_28_114825_add_login_fields_to_users_table',43);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
