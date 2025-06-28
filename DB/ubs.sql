-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: ubs
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `adminName` varchar(45) DEFAULT NULL,
  `adminPass` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','123');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `bookid` int NOT NULL AUTO_INCREMENT,
  `fkcatid` int NOT NULL,
  `fkstudid` int NOT NULL,
  `bookName` varchar(500) DEFAULT NULL,
  `author` varchar(500) DEFAULT NULL,
  `publishedyear` varchar(500) DEFAULT NULL,
  `publication` varchar(500) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `price` varchar(500) DEFAULT NULL,
  `bookdescription` varchar(500) DEFAULT NULL,
  `booksold` bit(1) DEFAULT NULL,
  PRIMARY KEY (`bookid`),
  KEY `fkcatid_idx` (`fkcatid`),
  KEY `fkstudid_idx` (`fkstudid`),
  CONSTRAINT `fkcatid` FOREIGN KEY (`fkcatid`) REFERENCES `category` (`catid`),
  CONSTRAINT `fkstudid` FOREIGN KEY (`fkstudid`) REFERENCES `student` (`studid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,4,1,'How to Prepare for QUANTITATIVE APTITUDE for CAT','Arun Sharma','2015','Mac Graw Hill','20240228023515.jpg','150','This is the must-have book for any higher-level competitive exams and interview preparation.',_binary '\0'),(2,1,1,'Introduction to Algorithms','Thomas','2020','PHI','20240228025131.jpg','100','Keeping in mind that Algorithm is an integral part of the interview rounds, the book “Introduction to Algorithms” is one in the market providing comprehensive discussions of all the algorithms in-depth, with implementation, design, and complete analysis with time and space complexities.',_binary '\0'),(4,2,2,'sdfsdfdsf','Arun Sharma','2020','PHI','20240228032425.jpg','25','sdf',_binary '\0'),(5,2,2,'gfhg','Thomas','1456','hfgh','20240228040142.jpg','30','vbn',_binary '\0'),(6,2,2,'hgjghj','ghjser','2020','PHI','20240228040234.jpg','50','qWSQW',_binary '\0');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `catid` int NOT NULL AUTO_INCREMENT,
  `catName` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Computer Science'),(2,'Electronics and Communication'),(3,'Reasoning'),(4,'Aptitude');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `deptid` int NOT NULL AUTO_INCREMENT,
  `deptname` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Computer Science'),(2,'Electronics and Communication'),(3,'Electronics and Electrical'),(4,'AI ML');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requesttable`
--

DROP TABLE IF EXISTS `requesttable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requesttable` (
  `requestid` int NOT NULL AUTO_INCREMENT,
  `fkfromuserid` int DEFAULT NULL,
  `fktouserid` int DEFAULT NULL,
  `fkbookid` int DEFAULT NULL,
  `rstatus` bit(1) DEFAULT NULL,
  PRIMARY KEY (`requestid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requesttable`
--

LOCK TABLES `requesttable` WRITE;
/*!40000 ALTER TABLE `requesttable` DISABLE KEYS */;
INSERT INTO `requesttable` VALUES (1,1,2,4,_binary ''),(2,1,2,5,_binary '\0'),(3,3,2,6,_binary '');
/*!40000 ALTER TABLE `requesttable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `studid` int NOT NULL AUTO_INCREMENT,
  `studname` varchar(500) DEFAULT NULL,
  `fkdeptid` int NOT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `isActive` bit(1) DEFAULT NULL,
  `studusn` varchar(45) DEFAULT NULL,
  `studpass` varchar(500) DEFAULT NULL,
  `studmail` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`studid`),
  KEY `fkdeptid_idx` (`fkdeptid`),
  CONSTRAINT `fkdeptid` FOREIGN KEY (`fkdeptid`) REFERENCES `department` (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'Smitha',4,'9632587412',_binary '\0','123456','202cb962ac59075b964b07152d234b70','s@mail.com'),(2,'yatharth',1,'8521478563',_binary '\0','456','202cb962ac59075b964b07152d234b70','ya@mail.com'),(3,'Chirag',2,'9632587412',_binary '\0','753','202cb962ac59075b964b07152d234b70','c@mail.com'),(4,'dfg',1,'7412589632',_binary '\0','dfg','38d7355701b6f3760ee49852904319c1','dfg@mail.com');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-28 21:20:18
