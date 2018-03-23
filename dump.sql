-- MySQL dump 10.16  Distrib 10.2.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: php_app
-- ------------------------------------------------------
-- Server version	10.2.13-MariaDB

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
-- Table structure for table `calls`
--

DROP TABLE IF EXISTS `calls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calls` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `operator_id` bigint(15) NOT NULL,
  `inbound_number` varchar(50) NOT NULL,
  `outbound_number` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `call_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calls`
--

LOCK TABLES `calls` WRITE;
/*!40000 ALTER TABLE `calls` DISABLE KEYS */;
/*!40000 ALTER TABLE `calls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `operator_id` bigint(15) NOT NULL,
  `msg_template` text NOT NULL DEFAULT '',
  `msg_parsed` text NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `operator_id` (`operator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,4,'[name] is the same as [#name] or even [$name]. The same goes for the {phone} or {$phone} or even {#phone}.','xok was here again is the same as xok was here again or even xok was here again. The same goes for the (305) 7677781 or (305) 7677781 or even (305) 7677781.','2018-03-23 19:13:06','2018-03-23 19:13:06'),(6,3,'[phone] is the same as [#name] or even [$name]. The same goes for the {phone} or {$phone} or even {#phone}.','(203) 433-7410 is the same as the operator 3 or even the operator 3. The same goes for the (203) 433-7410 or (203) 433-7410 or even (203) 433-7410.','2018-03-23 19:19:15','2018-03-23 19:19:15'),(8,10,'[phone] is the same as [#name] or even [$name]. The same goes for the {phone} or {$phone} or even {#phone}.','(203) 433-7410 is the same as the operator 3 or even the operator 3. The same goes for the (203) 433-7410 or (203) 433-7410 or even (203) 433-7410.','2018-03-23 19:22:05','2018-03-23 19:22:05');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operators`
--

DROP TABLE IF EXISTS `operators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operators` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `last6hrs` int(11) NOT NULL,
  `last24hrs` int(11) NOT NULL,
  `last48hrs` int(11) NOT NULL,
  `lastdate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operators`
--

LOCK TABLES `operators` WRITE;
/*!40000 ALTER TABLE `operators` DISABLE KEYS */;
INSERT INTO `operators` VALUES (1,'the first operator','203350-8605',30,60,90,'2018-02-22 06:17:38'),(3,'the operator 3','(203) 433-7410',30,60,90,'2018-02-22 06:19:31'),(4,'xok was here again','(305) 7677781',30,60,90,'2018-02-22 06:19:31'),(5,'OMG it worked fine','(203) 34-303-73',30,60,90,'2018-02-22 06:19:31'),(7,'the operator','2032639331',30,60,90,'2018-02-22 06:19:31'),(10,'the operator 3','(203) 433-7410',30,60,90,'2018-02-22 07:25:05'),(11,'the operator 4','(305) 7677781',30,60,90,'2018-02-22 07:25:05'),(12,'the operator 5','(203) 34-303-73',30,60,90,'2018-02-22 07:25:05'),(13,'the operator 6','(78636)1-0419',30,60,90,'2018-02-22 07:25:05'),(14,'the operator 7','2032639331',30,60,90,'2018-02-22 07:25:05'),(15,'the operator 8','(305)(615)-1482',30,60,90,'2018-02-22 07:25:05'),(16,'the operator 2','203350-8605',30,60,90,'2018-02-22 07:25:06'),(17,'the operator 3','(203) 433-7410',30,60,90,'2018-02-22 07:25:06'),(18,'the operator 4','(305) 7677781',30,60,90,'2018-02-22 07:25:06'),(19,'the operator 5','(203) 34-303-73',30,60,90,'2018-02-22 07:25:06'),(20,'the operator 6','(78636)1-0419',30,60,90,'2018-02-22 07:25:06'),(21,'the operator 7','2032639331',30,60,90,'2018-02-22 07:25:06'),(22,'the operator 8','(305)(615)-1482',30,60,90,'2018-02-22 07:25:06'),(23,'the operator 2','203350-8605',30,60,90,'2018-02-22 07:25:07'),(24,'the operator 3','(203) 433-7410',30,60,90,'2018-02-22 07:25:07'),(25,'the operator 4','(305) 7677781',30,60,90,'2018-02-22 07:25:07'),(26,'the operator 5','(203) 34-303-73',30,60,90,'2018-02-22 07:25:07'),(27,'the operator 6','(78636)1-0419',30,60,90,'2018-02-22 07:25:07'),(28,'the operator 7','2032639331',30,60,90,'2018-02-22 07:25:07'),(29,'the operator 8','(305)(615)-1482',30,60,90,'2018-02-22 07:25:07'),(30,'the operator 2','203350-8605',30,60,90,'2018-02-22 07:25:08'),(31,'the operator 3','(203) 433-7410',30,60,90,'2018-02-22 07:25:08'),(32,'the operator 4','(305) 7677781',30,60,90,'2018-02-22 07:25:08'),(33,'the operator 5','(203) 34-303-73',30,60,90,'2018-02-22 07:25:08'),(34,'the operator 6','(78636)1-0419',30,60,90,'2018-02-22 07:25:08'),(35,'the operator 7','2032639331',30,60,90,'2018-02-22 07:25:08'),(36,'the operator 8','(305)(615)-1482',30,60,90,'2018-02-22 07:25:08'),(37,'gama','3029300705',40,120,890,'2018-02-22 10:19:27'),(38,'add record worked here','3029300705',40,120,890,'2018-02-22 10:20:58'),(39,'some name to add a record','3029300705',58,120,480,'2018-02-22 10:21:50');
/*!40000 ALTER TABLE `operators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `hash` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'xokaido','$2y$10$9kVeOYZK0JJKpkax7c7V5e/ysxmr6mtW/VodwVCVeQBRNL7bYixVe','seIjmLme/QV16');
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

-- Dump completed on 2018-03-23 23:29:17
