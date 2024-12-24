-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: hw5_restaurant_menu
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.20.04.1

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
-- Table structure for table `account_number`
--

DROP TABLE IF EXISTS `account_number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_number` (
  `restaurant` text NOT NULL,
  `password` text NOT NULL,
  `account` int NOT NULL,
  `Take_out` tinyint(1) NOT NULL DEFAULT '0',
  `tables` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_number`
--

LOCK TABLES `account_number` WRITE;
/*!40000 ALTER TABLE `account_number` DISABLE KEYS */;
INSERT INTO `account_number` VALUES ('7-11','711',711,1,0),('全家','123456',123456,1,10),('集品王','188618861',1111547,1,10),('仙桃','188618860',1111548,1,5);
/*!40000 ALTER TABLE `account_number` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `account` int NOT NULL,
  `class` text NOT NULL,
  `commodity` text NOT NULL,
  `NT` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `account` (`account`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`account`) REFERENCES `account_number` (`account`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1111548,'炒飯','蛋炒飯',60,1),(1111548,'炒飯','肉絲炒飯',60,2),(1111548,'便當','雞排便當',80,3),(711,'飯糰','鮪魚飯糰',30,4),(711,'飯糰','肉鬆飯糰',25,5),(711,'便當','起司雙拼筆管義大利麵',69,6),(711,'便當','日式蘋果咖哩',69,7),(711,'飯糰','韓式泡菜飯糰',35,9),(711,'飲料','麥香奶茶',10,10),(711,'飲料','大麥紅茶',10,11),(711,'飲料','可樂',39,12),(711,'飲料','雪碧',39,13);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_all`
--

DROP TABLE IF EXISTS `order_all`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_all` (
  `account` int NOT NULL,
  `finish_all` tinyint(1) NOT NULL DEFAULT '0',
  `order_only` int NOT NULL AUTO_INCREMENT,
  `tables_number` int NOT NULL,
  PRIMARY KEY (`order_only`),
  KEY `account` (`account`),
  CONSTRAINT `order_all_ibfk_1` FOREIGN KEY (`account`) REFERENCES `account_number` (`account`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_all`
--

LOCK TABLES `order_all` WRITE;
/*!40000 ALTER TABLE `order_all` DISABLE KEYS */;
INSERT INTO `order_all` VALUES (1111548,0,51,4),(1111548,1,52,4),(1111548,0,53,0),(711,0,54,0),(711,1,55,0),(711,0,56,0),(1111548,0,57,0),(711,1,58,0),(711,1,59,5);
/*!40000 ALTER TABLE `order_all` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_one`
--

DROP TABLE IF EXISTS `order_one`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_one` (
  `account` int NOT NULL,
  `id` int NOT NULL,
  `finish` tinyint(1) NOT NULL DEFAULT '0',
  `order_number` int NOT NULL,
  `id_in_order` int NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `id_in_order` (`id_in_order`),
  KEY `order_number` (`order_number`),
  KEY `account` (`account`),
  KEY `id` (`id`),
  CONSTRAINT `order_one_ibfk_1` FOREIGN KEY (`id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_one_ibfk_2` FOREIGN KEY (`order_number`) REFERENCES `order_all` (`order_only`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_one_ibfk_3` FOREIGN KEY (`account`) REFERENCES `account_number` (`account`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_one`
--

LOCK TABLES `order_one` WRITE;
/*!40000 ALTER TABLE `order_one` DISABLE KEYS */;
INSERT INTO `order_one` VALUES (1111548,3,1,51,1),(1111548,3,1,51,2),(1111548,3,1,51,3),(1111548,1,0,51,4),(1111548,2,0,51,5),(1111548,3,1,52,6),(1111548,1,1,52,7),(1111548,2,1,52,8),(1111548,2,1,52,9),(1111548,2,1,52,10),(1111548,3,1,53,11),(1111548,3,0,53,12),(1111548,3,0,53,13),(1111548,3,0,53,14),(1111548,3,0,53,15),(1111548,3,0,53,16),(1111548,3,0,53,17),(1111548,3,0,53,18),(1111548,3,0,53,19),(1111548,3,0,53,20),(711,10,1,54,21),(711,10,0,54,22),(711,11,1,54,23),(711,11,0,54,24),(711,6,1,55,25),(711,11,1,55,26),(711,5,1,55,27),(711,11,1,55,28),(711,5,1,55,29),(711,6,0,56,30),(711,6,0,56,31),(711,6,0,56,32),(711,5,0,56,33),(711,10,0,56,34),(711,5,0,56,35),(711,10,0,56,36),(711,10,0,56,37),(1111548,3,0,57,38),(1111548,2,0,57,39),(1111548,1,0,57,40),(711,4,1,58,41),(711,6,1,58,42),(711,5,1,58,43),(711,9,0,58,44),(711,4,1,58,45),(711,11,0,58,46),(711,6,1,58,47),(711,11,0,58,48),(711,10,1,59,73),(711,10,1,59,74),(711,10,1,59,75),(711,12,1,59,76),(711,12,1,59,77),(711,12,1,59,78);
/*!40000 ALTER TABLE `order_one` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-24  7:40:58
