-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: catalunapizz
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Current Database: `catalunapizz`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `catalunapizz` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `catalunapizz`;

--
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about-us` text NOT NULL,
  `news` text,
  `mail` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_us`
--

LOCK TABLES `about_us` WRITE;
/*!40000 ALTER TABLE `about_us` DISABLE KEYS */;
INSERT INTO `about_us` VALUES (1,'',NULL,'catalunapizz@gmail.com','06-51-75-79-20');
/*!40000 ALTER TABLE `about_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `picture` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'BASE TOMATE',NULL),(2,'BASE CREME',NULL),(3,'DESSERT',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drink`
--

DROP TABLE IF EXISTS `drink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `price_1` decimal(6,2) DEFAULT NULL,
  `price_2` varchar(45) DEFAULT NULL,
  `picture` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drink`
--

LOCK TABLES `drink` WRITE;
/*!40000 ALTER TABLE `drink` DISABLE KEYS */;
/*!40000 ALTER TABLE `drink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` text,
  `date` date DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenement`
--

LOCK TABLES `evenement` WRITE;
/*!40000 ALTER TABLE `evenement` DISABLE KEYS */;
/*!40000 ALTER TABLE `evenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `ingredients` text,
  `price_1` decimal(6,2) DEFAULT NULL,
  `price_2` decimal(6,2) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pizza_category1_idx` (`category_id`),
  CONSTRAINT `fk_pizza_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pizza`
--

LOCK TABLES `pizza` WRITE;
/*!40000 ALTER TABLE `pizza` DISABLE KEYS */;
INSERT INTO `pizza` VALUES (1,'La Margherita','Sauce tomate, fromage, olives',5.20,7.00,1),(2,'La Jamòn','Sauce tomate, jambon blanc, fromage, olives',6.50,8.20,1),(3,'La Regina','Sauce tomate, jambon blanc, champignons, fromage',7.00,9.00,1),(4,'La Catalane','Sauce tomate, chorizo, oignons rouges, poivrons, fromage',7.50,10.00,1),(5,'L\'orientale','Sauce tomate, merguez, oignons rouges, poivrons, fromage',7.50,10.00,1),(6,'La Cabra','Sauce tomate, chèvre, fromage, (accompagnement au choix : miel, persillade, ciboulette)',7.80,10.50,1),(7,'La Calzone','Sauce tomate, jambon blanc, oeuf, fromage',7.80,10.50,1),(8,'La 4 Fromages','Sauce tomate, bleu, parmesan, emmental, mozzarella ',9.00,11.50,1),(9,'L\'Hawaïenne','Sauce tomate, jambon blanc, ananas, crème fraîche',7.60,10.20,1),(10,'La Temporadas','Sauce tomate, jambon blanc, champignons, artichauts, poivrons, oeuf, fromage',9.00,11.50,1),(11,'La Vegetariana','Sauce tomate, tomate fraîche, champignons, poivrons, oignons rouges, artichauts, fromage, olives',8.00,10.50,1),(12,'La Barcelona','Sauce tomate, boeuf haché, chèvre, champignons, oeuf, oignons rouges, fromage',9.00,12.00,1),(13,'La Malaga','Sauce tomate, boeuf haché, chèvre, oeuf, oignons rouges, persillade, fromage',10.10,13.50,1),(14,'La Mexicaine','Sauce tomate, boeuf haché, chorizo, oignons rouges, persillade, oeuf, fromage',10.10,13.50,1),(15,'La Burger','Sauce tomate, boeuf haché, oignons rouges, cheddar, tomate fraîche, sauce burger, fromage',10.10,13.50,1),(16,'L\'Andalouse','Sauce tomate, chorizo, merguez, lardons, boeuf haché, jambon blanc, oeuf, piment d\'Espelette, fromage',11.00,14.00,1),(17,'La Flamenco','Sauce tomate, pomme de terre, Jambon Serrano, oeuf, piment d\'Espelette, fromage',8.50,11.00,1),(18,'La Caliente','Sauce tomate, jambon Serrano, chorizo, oeuf, piment d\'Espelette, fromage',8.00,12.00,1),(19,'La Campesina','Crème, lardons, oignons rouges, persillade, fromage',7.50,10.00,2),(20,'La Coklina','Crème, poulet, chèvre, miel, fromage',9.30,12.50,2),(21,'La Rambla','Crème, poulet, champignons, oeuf, oignons rouges, ciboulette, fromage',9.00,12.00,2),(22,'La Madrilène','Crème, jambon blanc, pomme de terre, oignons rouges, oeuf, ciboulette, fromage',9.00,12.00,2),(23,'La Del Mar','Crème, saumon fumé, ciboulette, fromage',10.10,13.50,2),(24,'La Carbonara','Crème, lardons, parmesan, oeuf, ciboulette, fromage',8.20,11.00,2),(25,'La savoyarde','Crème, lardons, pomme de terre, reblochon, fromage',9.70,13.00,2),(26,'La Boursin','Crème, boeuf haché, pomme de terre, Boursin, persillade, fromage',10.10,13.50,2),(27,'La Tonno','Crème, thon, oignons rouges, fromage, olives',9.00,12.00,2),(28,'La Sweety Poire','Crème, poire, amandes, coulis de chocolat',6.70,9.00,3),(29,'La Sweety Ananas','Crème, ananas, amandes, coulis de chocolat',6.70,9.00,3),(30,'La Smarties','Crème, Smarties, coulis de chocolat',7.50,10.00,3),(31,'La Tagada','Crème, bonbons Fraises Tagada, coulis de chocolat',7.50,10.00,3);
/*!40000 ALTER TABLE `pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planning`
--

DROP TABLE IF EXISTS `planning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(20) DEFAULT NULL,
  `location_am` text,
  `hour_am` varchar(20) DEFAULT NULL,
  `gps_am` varchar(20) DEFAULT NULL,
  `location_pm` text,
  `hour_pm` varchar(20) DEFAULT NULL,
  `gps_pm` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planning`
--

LOCK TABLES `planning` WRITE;
/*!40000 ALTER TABLE `planning` DISABLE KEYS */;
/*!40000 ALTER TABLE `planning` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-16 14:21:21
