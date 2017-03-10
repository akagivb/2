-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: wapi
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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `isbn` bigint(20) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `author` varchar(100) CHARACTER SET utf8 NOT NULL,
  `publishdate` date NOT NULL,
  `pages` int(11) NOT NULL,
  `formats` varchar(10) CHARACTER SET utf8 NOT NULL,
  `resume` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `cover` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `createdon` datetime NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (4567891234,'Book1','Author1','1980-02-02',150,'A3','resume1','cover1.jpg','1996-01-02 00:00:00'),(4567891235,'Book2','Author2','1980-03-03',160,'A4','resume2','cover2.jpg','1997-02-02 00:00:00'),(4567891236,'Book3','Author3','1980-04-04',170,'A5','resume3','cover3.jpg','1998-03-02 00:00:00'),(4567891237,'Book4','Author4','1980-05-06',180,'A6','resume4','cover4.jpg','1999-04-02 00:00:00'),(4567891238,'Book5','Author5','1980-06-07',190,'B4','resume5','cover5.jpg','2000-05-02 00:00:00'),(4567891239,'Book6','Author6','1980-07-09',150,'B5','resume6','cover6.jpg','2001-06-02 00:00:00'),(4567891240,'Book7','Author7','1980-08-10',160,'B6','resume7','cover7.jpg','2002-07-02 00:00:00'),(4567891241,'Book8','Author8','1980-09-11',170,'C4','resume8','cover8.jpg','2003-08-02 00:00:00'),(4567891242,'Book9','Author9','1980-10-13',180,'C5','resume9','cover9.jpg','2004-09-02 00:00:00'),(4567891243,'Book10','Author10','1980-11-14',190,'A3','resume10','cover10.jpg','2005-10-02 00:00:00'),(4567891244,'Book11','Author11','1980-12-16',184,'A4','resume11','cover11.jpg','2006-11-02 00:00:00'),(4567891245,'Book12','Author12','1981-01-17',186,'A5','resume12','cover12.jpg','2007-12-02 00:00:00'),(4567891246,'Book13','Author13','1981-02-18',189,'A6','resume13','cover13.jpg','2009-01-02 00:00:00'),(4567891247,'Book14','Author14','1981-03-22',191,'B4','resume14','cover14.jpg','2010-02-02 00:00:00'),(4567891248,'Book15','Author15','1981-04-23',194,'B5','resume15','cover15.jpg','2011-03-02 00:00:00'),(4567891249,'Book16','Author16','1981-05-25',196,'B6','resume16','cover16.jpg','2012-04-02 00:00:00'),(4567891250,'Book17','Author17','1981-06-26',198,'C4','resume17','cover17.jpg','2013-05-02 00:00:00'),(4567891251,'Book18','Author18','1981-07-28',201,'C5','resume18','cover18.jpg','2014-06-02 00:00:00'),(4567891252,'Book19','Author19','1981-08-29',203,'A3','resume19','cover19.jpg','2015-07-02 00:00:00'),(9781840220568,'The Wordsworth Book Of Horror Stories','Various','2005-01-05',1149,'A4','\'...it is an universal phenomenon of our nature that the mournful, the fearful, even the horrible, allures with irresistible enchantment.\' Chaucer Burr, Memoir, 1850','wwbhs.jpg','2017-03-02 02:27:52');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `covers`
--

DROP TABLE IF EXISTS `covers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `covers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `ufile` mediumblob NOT NULL,
  `bookid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `covers`
--

LOCK TABLES `covers` WRITE;
/*!40000 ALTER TABLE `covers` DISABLE KEYS */;
/*!40000 ALTER TABLE `covers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Not Encypted',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `UserID_UNIQUE` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','qwerty123'),(2,'user1','pass123'),(3,'user2','asdf123');
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

-- Dump completed on 2017-03-02  1:40:51
