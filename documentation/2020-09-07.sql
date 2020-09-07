CREATE DATABASE  IF NOT EXISTS `mDOrDJT6Ef` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `mDOrDJT6Ef`;
-- MySQL dump 10.13  Distrib 8.0.19, for macos10.15 (x86_64)
--
-- Host: remotemysql.com    Database: mDOrDJT6Ef
-- ------------------------------------------------------
-- Server version	8.0.13-4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `colours`
--

DROP TABLE IF EXISTS `colours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colours` (
  `idimage` int(11) NOT NULL,
  `colourname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idimage`,`colourname`),
  CONSTRAINT `fk_colours_to_images` FOREIGN KEY (`idimage`) REFERENCES `images` (`idimage`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colours`
--

LOCK TABLES `colours` WRITE;
/*!40000 ALTER TABLE `colours` DISABLE KEYS */;
INSERT INTO `colours` VALUES (1,'blue'),(1,'pink'),(2,'blue'),(3,'blue'),(3,'green'),(4,'black'),(5,'blue'),(5,'pink'),(5,'white'),(6,'green'),(6,'orange'),(6,'pink'),(7,'brown'),(8,'green'),(9,'brown'),(10,'blue'),(11,'green'),(11,'orange'),(12,'orange'),(12,'yellow'),(13,'brown'),(14,'black'),(15,'blue'),(16,'orange'),(17,'green'),(18,'green'),(18,'pink'),(19,'black'),(19,'blue'),(20,'brown'),(21,'green'),(21,'pink'),(22,'blue'),(22,'grey'),(23,'orange'),(23,'yellow'),(24,'brown');
/*!40000 ALTER TABLE `colours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `idimage` int(11) NOT NULL AUTO_INCREMENT,
  `imageName` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagePath` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idimage`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'blue moon','images/altinay-dinc-LluELtL5mK4-unsplash.jpg'),(2,'Downtown View','images/andrew-welch-kwXby58kRSo-unsplash.jpg'),(3,'Valleys','images/arindam-saha-rSLIzC-dlB4-unsplash.jpg'),(4,'Black Moon','images/aron-visuals-4zxSWESyZio-unsplash.jpg'),(5,'Light Clouds','images/billy-huynh-v9bnfMCyKbg-unsplash.jpg'),(6,'Citrus','images/bruna-branco-7r1HxvVC7AY-unsplash.jpg'),(7,'Parliament','images/clem-sim-GhlqbM311bM-unsplash.jpg'),(8,'smoothie ingredients','images/dose-juice-sTPy-oeA3h0-unsplash.jpg'),(9,'small kitten','images/edgar-nKC772R_qog-unsplash.jpg'),(10,'milky way','images/guille-pozzi-SHcHVFhz7-M-unsplash.jpg'),(11,'hidden tigger','images/joshua-lee-7nKv6HMsNEc-unsplash.jpg'),(12,'lion','images/kazuky-akayashi-pF4iSe6NVkI-unsplash.jpg'),(13,'kitten yawn','images/loan-7AIDE8PrvA0-unsplash.jpg'),(14,'black lives matter','images/martin-reisch-0EyTi0Avs7s-unsplash.jpg'),(15,'biosphere','images/matthieu-joannon-SnTxeUW6jtY-unsplash.jpg'),(16,'ginger cat','images/michael-sum-LEpfefQf4rU-unsplash.jpg'),(17,'money','images/michelle-spollen-P22AFmgMuUc-unsplash.jpg'),(18,'elephant sunset','images/mylon-ollila-j4ocWYAP_cs-unsplash.jpg'),(19,'northern lights','images/priscilla-du-preez-HhCANDrFzZ0-unsplash.jpg'),(20,'cat','images/ramiz-dedakovic-9SWHIgu8A8k-unsplash.jpg'),(21,'avocado','images/thought-catalog-9aOswReDKPo-unsplash.jpg'),(22,'elephant','images/wolfgang-hasselmann-P7L5011nD5s-unsplash.jpg'),(23,'sunflower','images/1599439887.jpeg'),(24,'rafiki','images/1599440922.jpeg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moods`
--

DROP TABLE IF EXISTS `moods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moods` (
  `idimage` int(11) NOT NULL,
  `moodname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idimage`,`moodname`),
  CONSTRAINT `fk_moods_to_images` FOREIGN KEY (`idimage`) REFERENCES `images` (`idimage`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moods`
--

LOCK TABLES `moods` WRITE;
/*!40000 ALTER TABLE `moods` DISABLE KEYS */;
INSERT INTO `moods` VALUES (1,'gloomy'),(1,'lonely'),(2,'busy'),(2,'hopeful'),(3,'calm'),(3,'idyllic'),(4,'gloomy'),(4,'tense'),(5,'calm'),(5,'dreamy'),(5,'idyllic'),(6,'lively'),(6,'whimsical'),(7,'patriotic'),(8,'healthy'),(8,'lively'),(9,'lonely'),(9,'whimsical'),(10,'calm'),(10,'lonely'),(11,'ominous'),(12,'ominous'),(13,'cheerful'),(14,'angry'),(14,'hopeful'),(15,'lighthearted'),(16,'calm'),(16,'idyllic'),(17,'greedy'),(18,'calm'),(18,'idyllic'),(19,'calm'),(19,'reflective'),(20,'cheerful'),(20,'whimsical'),(21,'cheerful'),(22,'lighthearted'),(23,'cheerful'),(24,'calm'),(24,'cheerful');
/*!40000 ALTER TABLE `moods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `idimage` int(11) NOT NULL,
  `tag` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idimage`,`tag`),
  CONSTRAINT `fk_tag_to_image` FOREIGN KEY (`idimage`) REFERENCES `images` (`idimage`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'moon'),(1,'nature'),(1,'night'),(1,'sky'),(2,'city'),(2,'Montreal'),(2,'view'),(3,'landscape'),(3,'nature'),(3,'valley'),(4,'moon'),(4,'nature'),(4,'night'),(5,'clouds'),(5,'light'),(5,'sky'),(6,'food'),(6,'fruit'),(6,'grapefruit'),(6,'lime'),(6,'orange'),(7,'city'),(7,'Ottawa'),(7,'parliament'),(8,'food'),(8,'healthy'),(9,'animal'),(9,'cat'),(9,'kitten'),(9,'pet'),(10,'nature'),(10,'night'),(10,'stars'),(11,'animal'),(11,'cat'),(11,'tiger'),(11,'wild'),(12,'animal'),(12,'lion'),(12,'wild'),(13,'cat'),(13,'kitten'),(13,'pet'),(13,'yawn'),(14,'Black Lives Matter'),(14,'BLM'),(14,'Montreal'),(15,'Bioshpere'),(15,'City'),(15,'Montreal'),(16,'animal'),(16,'cat'),(16,'pet'),(17,'money'),(18,'elephant'),(18,'sunset'),(19,'landscape'),(19,'nature'),(19,'stars'),(20,'animal'),(20,'cat'),(20,'pet'),(21,'avocado'),(21,'food'),(22,'animal'),(22,'elephant'),(23,'flower'),(23,'nature'),(23,'plant'),(23,'sunflower'),(24,'animal'),(24,'cat'),(24,'pet');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-07 17:42:15
