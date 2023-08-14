-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: shop_gcc200034
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cuserid` int(11) NOT NULL,
  `cproid` int(11) NOT NULL,
  `cquantity` int(11) NOT NULL,
  `cdate` date NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `fk_user_cart` (`cuserid`),
  CONSTRAINT `fk_user_cart` FOREIGN KEY (`cuserid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,1,1,30,'2023-08-09'),(3,1,5,4,'2023-08-09'),(4,1,13,1,'2023-08-13');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `catid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `catname` varchar(30) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('C001','Rolex'),('C002','Cartier');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `pprice` decimal(8,0) NOT NULL,
  `pinfo` varchar(255) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `pquan` int(11) NOT NULL,
  `pcatid` varchar(5) NOT NULL,
  `pdate` date NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `fk_cat_pro` (`pcatid`),
  CONSTRAINT `fk_cat_pro` FOREIGN KEY (`pcatid`) REFERENCES `category` (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Rolex SKY-DWELLER',799,'The Rolex Oyster Perpetual Sky-Dweller is a luxury watch from Rolex, which is distinguished by a watch that shows its second time zone on an eccentric disc on the dial.','pro2.png',3,'C001','2022-12-20'),(2,'Rolex EXPLORER',344,'Chromalight display superior clarity with long lasting blue luminescence','pro7.png',34,'C002','2022-12-12'),(3,'Rolex 1908',100,'The Rolex Perpetual 1908 m52509-0002 watch is a watch with a classic sound but combined with the latest technological innovations produced by Rolex. This model inherits the elegant touches of the classic Cellini collection.','pro6.png',4,'C001','2023-04-03'),(4,'Rolex GMT-MASTER 2',100,'Rolex watches have long been pursued by fashionistas for their flawless beauty and sophistication in each design. Now, Rolex is launching the GMT-Master II with a design that is not only beautiful, but also functional, allowing users to quickly track the ','pro4.png',4,'C001','2023-01-01'),(5,'Rolex DAY-DATE',100,'Size 40mm. President case and bracelet in 18K Au750 gold. Rose gold bezel with natural diamonds. Diamond watch face. Staple with 10 bauguette diamonds','pro3.png',4,'C001','2023-01-04'),(6,'Rolex AIR-KING',100,'WATCH CASE: Oyster, 40 mm, Oystersteel\r\nOYSTER STRUCTURE: Monolithic main case, caseback crown and winding crown','pro5.png',4,'C001','2023-01-04'),(9,'Cartier Santos-Dumont Quartz Silver Dial Unisex Wa',500,'Featuring a Black Band, Silver-tone Case, Scratch Resistant Sapphire Crystal','51vm6nnxZkL._AC_UX679_.jpg',50,'C002','2023-08-11'),(10,'CARTIER Santos-Dumont Small Model Quartz Silver Di',499,'Featuring a Blue Band, Silver-tone Case, Scratch Resistant Sapphire Crystal','51GYdw0NuQL._AC_UX679_.jpg',34,'C002','2023-08-12'),(11,'Cartier Panthere de Cartier Silver Dial Ladies Sta',700,'Featuring a Silver-tone Band, Silver-tone Case, Scratch Resistant Sapphire Crystal','71qbu6Xn1WL._AC_UX679_.jpg',56,'C002','2023-08-12'),(12,'CARTIER Cle Automatic Silver Dial Ladies Watch WSC',655,'Featuring a Silver-tone Band, Silver-tone Case, Scratch Resistant Sapphire Crystal','61mkfDBBaWL._AC_UX679_.jpg',32,'C002','2023-08-13'),(13,'Cartier Ballon Bleu Silver Diamond Dial 18kt Pink ',800,'Featuring a Purple Band, Pink Gold Case, Scratch Resistant Sapphire Crystal','61Lb9v+p9RL._AC_UX679_.jpg',12,'C002','2023-08-13'),(14,'Bulova Men\'s Marine Star \'Series A\' Chronograph Qu',700,'Luminous Markers, Rotating Dial, 100M Water Resistant, 44mm','81m6M32N3FL._AC_UY741_.jpg',20,'C002','2023-08-13'),(15,'GUESS Stainless Steel Crystal Embellished Bracelet',900,'POLISHED STAINLESS STEEL GOLD-TONE BRACELET WITH CRSTYAL ACCENTS AND DEPLOYMENT BUCKLE CLOSURE','A1HTssBOo8L._AC_UY741_.jpg',12,'C002','2023-08-13'),(16,'Citizen Quartz Womens Watch, Stainless Steel, Clas',200,'The stainless steel ladies’ Quartz from Citizen is a three-hand watch with a black dial and silver-tone accents. The silver-tone bracelet has a fold-over clasp with push buttons. It is water resistant up to 30 meters','81nNe99c7QL._AC_UY741_.jpg',40,'C002','2023-08-13'),(17,'Bulova Men\'s Crystal Octava Chronograph Quartz Wat',499,'From the Bulova Men\'s Crystal Collection, make a brilliant statement with a watch detailed with authentic crystals.','71Yb3ng2PBL._AC_UY741_.jpg',21,'C001','2023-08-13'),(18,'Rolex: 3,621 Wristwatches',299,'In this virtual catalog of Rolex wristwatches, collectors and buyers will find 3,621 wristwatches in over 14 different model lines: Oyster, Bubbleback, including Chronograph, Submariner, Explorer, and more. ','41rcS32yqOL._SX392_BO1,204,203,200_.jpg',15,'C001','2023-08-14'),(19,'Rolex Oyster Perpetual 34 Automatic Chronometer Bl',278,'Featuring a Silver-tone Band, Silver-tone Case, Scratch Resistant Sapphire Crystal','51JHwp+kmiL._AC_UX569_.jpg',19,'C001','2023-08-12'),(20,'Rolex COSMOGRAPH DAYTONA',499,'THE TACHYMETRIC SCALE A key part of the model’s identity is the bezel moulded with a tachymetric scale for measuring average speeds of up to 400 miles or kilometres per hour.','m126500ln-0001_modelpage_front_facing_landscape (1).png',23,'C001','2023-08-12');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'hien67891','123456','hcm'),(3,'hienhuynh','1','ct');
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

-- Dump completed on 2023-08-13 23:46:45
