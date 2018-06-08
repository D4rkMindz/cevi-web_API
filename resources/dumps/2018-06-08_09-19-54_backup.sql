-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: cevi_web_test
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB

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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `article_title_id` int(11) NOT NULL,
  `article_description_id` int(11) NOT NULL,
  `article_quality_hash` varchar(255) NOT NULL,
  `storage_place_hash` varchar(255) NOT NULL,
  `department_hash` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `replace` datetime DEFAULT NULL,
  `barcode` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_article_description1_idx` (`article_description_id`),
  KEY `fk_article_article_quality1_idx` (`article_quality_hash`),
  KEY `fk_article_storage_place1_idx` (`storage_place_hash`),
  KEY `fk_article_article_title1_idx` (`article_title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'test_5b1a22e57b852',1,1,'test_5b1a22e57b85b','test_5b1a22e57b873','test_5b1a22f6952cf','2019-01-01 00:00:00',10,'2018-03-01 00:00:00','CEVIWEB-A1_L1_D1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a22f6cb2ea',2,2,'test_5b1a22f6cb2f8','test_5b1a22fb06902','test_5b1a2307d1392','2017-01-01 00:00:00',10,'2018-12-01 00:00:00','CEVIWEB-A2_L2_D2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a2308133df',3,3,'test_5b1a2308133f6','test_5b1a2310732f8','test_5b1a231919ae4','2017-01-01 00:00:00',10,'2018-12-01 00:00:00','CEVIWEB-A3_L3_D3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_description`
--

DROP TABLE IF EXISTS `article_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_de` longtext NOT NULL,
  `name_en` longtext NOT NULL,
  `name_fr` longtext NOT NULL,
  `name_it` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_description`
--

LOCK TABLES `article_description` WRITE;
/*!40000 ALTER TABLE `article_description` DISABLE KEYS */;
INSERT INTO `article_description` VALUES (1,'Beschreibung 1','Beschreibung 1','Beschreibung 1','Beschreibung 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'Beschreibung 2','Beschreibung 2','Beschreibung 2','Beschreibung 2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'Beschreibung 3','Beschreibung 3','Beschreibung 3','Beschreibung 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `article_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_image`
--

DROP TABLE IF EXISTS `article_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_has_image_image1_idx` (`image_id`),
  KEY `fk_article_has_image_article1_idx` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_image`
--

LOCK TABLES `article_image` WRITE;
/*!40000 ALTER TABLE `article_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_quality`
--

DROP TABLE IF EXISTS `article_quality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_quality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `name_de` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `name_fr` varchar(45) NOT NULL,
  `name_it` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_quality`
--

LOCK TABLES `article_quality` WRITE;
/*!40000 ALTER TABLE `article_quality` DISABLE KEYS */;
INSERT INTO `article_quality` VALUES (1,'test_5b1a2319f2004',1,'Sehr gut','Sehr gut','Sehr gut','Sehr gut'),(2,'test_5b1a2319f2009',2,'Gut','Gut','Gut','Gut'),(3,'test_5b1a2319f200b',3,'Mittel','Mittel','Mittel','Mittel'),(4,'test_5b1a2319f200e',4,'Bald ersetzen','Bald ersetzen','Bald ersetzen','Bald ersetzen'),(5,'test_5b1a2319f2010',5,'Ersetzen','Ersetzen','Ersetzen','Ersetzen'),(6,'test_5b1a2319f2013',6,'Kaputt','Kaputt','Kaputt','Kaputt');
/*!40000 ALTER TABLE `article_quality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_title`
--

DROP TABLE IF EXISTS `article_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_it` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_title`
--

LOCK TABLES `article_title` WRITE;
/*!40000 ALTER TABLE `article_title` DISABLE KEYS */;
INSERT INTO `article_title` VALUES (1,'Artikel 1','Artikel 1','Artikel 1','Artikel 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'Artikel 2','Artikel 2','Artikel 2','Artikel 2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'Artikel 3','Artikel 3','Artikel 3','Artikel 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `article_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Land',
  `state` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Kanton / Bundesland / Region',
  `number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number2` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_de` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_fr` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_it` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_country_number` (`country`,`number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'CH','DE','8000','01','Zürich','Zürich','Zürich','Zürich',NULL,NULL,NULL,NULL,0,NULL,NULL),(2,'CH','ZH','8909','01','Affoltern','Affoltern','Affoltern','Affoltern',NULL,NULL,NULL,NULL,0,NULL,NULL),(3,'CH','AG','4310','01','Rheinfelden','Rheinfelden','Rheinfelden','Rheinfelden',NULL,NULL,NULL,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `department_group_hash` varchar(155) NOT NULL,
  `department_region_hash` varchar(255) NOT NULL,
  `department_type_hash` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_department_city1_idx` (`city_id`),
  KEY `fk_department_department_type1_idx` (`department_type_hash`),
  KEY `fk_department_department_group_idx` (`department_region_hash`),
  KEY `fk_department_department_group1_idx` (`department_group_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'test_5b1a231a9fadd','test_5b1a231a9fae4','','test_5b1a231a9faee',1,'Department 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a231a9faf5','test_5b1a231a9fafc','','test_5b1a231a9fb05',2,'Department 2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a231a9fb09','test_5b1a231a9fb0f','','test_5b1a231a9fb14',3,'Department 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(4,'test_5b1a231a9fb1b','test_5b1a231a9fb21','','test_5b1a231a9fb27',3,'Department 4','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_event`
--

DROP TABLE IF EXISTS `department_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_hash` varchar(255) NOT NULL,
  `event_hash` varchar(255) NOT NULL,
  `department_group_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_department_has_event_event1_idx` (`event_hash`),
  KEY `fk_department_has_event_department1_idx` (`department_hash`),
  KEY `fk_department_event_department_group1_idx` (`department_group_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_event`
--

LOCK TABLES `department_event` WRITE;
/*!40000 ALTER TABLE `department_event` DISABLE KEYS */;
/*!40000 ALTER TABLE `department_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_group`
--

DROP TABLE IF EXISTS `department_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name_de` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `name_fr` varchar(45) NOT NULL,
  `name_it` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='epart';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_group`
--

LOCK TABLES `department_group` WRITE;
/*!40000 ALTER TABLE `department_group` DISABLE KEYS */;
INSERT INTO `department_group` VALUES (1,'test_5b1a231a9fb30','AG-SO-LU-ZG','AG-SO-LU-ZG','AG-SO-LU-ZG','AG-SO-LU-ZG'),(2,'test_5b1a231a9fb32','Basel','Basel','Basel','Basel');
/*!40000 ALTER TABLE `department_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_region`
--

DROP TABLE IF EXISTS `department_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name_de` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `name_fr` varchar(45) NOT NULL,
  `name_it` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_region`
--

LOCK TABLES `department_region` WRITE;
/*!40000 ALTER TABLE `department_region` DISABLE KEYS */;
INSERT INTO `department_region` VALUES (1,'test_5b1a231a9fb39','Nord','Nord','Nord','Nord'),(2,'test_5b1a231a9fb3b','Süd','Süd','Süd','Süd'),(3,'test_5b1a231a9fb3d','Ost','Ost','Ost','Ost'),(4,'test_5b1a231a9fb40','West','West','West','West');
/*!40000 ALTER TABLE `department_region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_type`
--

DROP TABLE IF EXISTS `department_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name_de` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `name_fr` varchar(45) NOT NULL,
  `name_it` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_type`
--

LOCK TABLES `department_type` WRITE;
/*!40000 ALTER TABLE `department_type` DISABLE KEYS */;
INSERT INTO `department_type` VALUES (1,'test_5b1a231a9fb45','Verband','Verband','Verband','Verband',NULL,NULL,NULL,NULL,NULL,NULL),(2,'test_5b1a231a9fb48','Tensing','Tensing','Tensing','Tensing',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `department_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educational_course`
--

DROP TABLE IF EXISTS `educational_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educational_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `educational_course_title_id` int(11) NOT NULL,
  `educational_course_description_id` int(11) NOT NULL,
  `educational_course_organiser_hash` varchar(255) NOT NULL,
  `department_hash` varchar(255) NOT NULL COMMENT 'The organizer',
  `city_id` int(11) NOT NULL COMMENT 'Where the edu_course is taking place',
  `position_hash` varchar(255) NOT NULL COMMENT 'The minimum required position to participate',
  `price` decimal(10,0) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `minimum_age` year(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_education_course_educational_course_title1_idx` (`educational_course_title_id`),
  KEY `fk_education_course_educational_course_description1_idx` (`educational_course_description_id`),
  KEY `fk_education_course_city1_idx` (`city_id`),
  KEY `fk_education_course_department1_idx` (`department_hash`),
  KEY `fk_education_course_position1_idx` (`position_hash`),
  KEY `fk_education_course_educational_course_organiser1_idx` (`educational_course_organiser_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educational_course`
--

LOCK TABLES `educational_course` WRITE;
/*!40000 ALTER TABLE `educational_course` DISABLE KEYS */;
INSERT INTO `educational_course` VALUES (1,'test_5b1a231a9fb4f',1,1,'test_5b1a231a9fb56','test_5b1a231b4dc59',1,'test_5b1a231b4dca7',100,'2018-04-07 10:00:00','2018-04-14 16:00:00',2016,'2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL),(2,'test_5b1a231b8395c',2,2,'test_5b1a231bb9ddc','test_5b1a231c3210c',2,'test_5b1a231c32148',120,'2018-04-07 10:00:00','2018-04-14 16:00:00',2016,'2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL),(3,'test_5b1a231c684d8',3,3,'test_5b1a231cd4c15','test_5b1a231d16f3a',3,'test_5b1a231d16f65',350,'2018-04-07 10:00:00','2018-04-14 16:00:00',2016,'2017-05-10 16:32:15',0,NULL,NULL,'2018-04-07 09:00:00',1);
/*!40000 ALTER TABLE `educational_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educational_course_description`
--

DROP TABLE IF EXISTS `educational_course_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educational_course_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_de` longtext NOT NULL,
  `name_en` longtext NOT NULL,
  `name_fr` longtext NOT NULL,
  `name_it` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educational_course_description`
--

LOCK TABLES `educational_course_description` WRITE;
/*!40000 ALTER TABLE `educational_course_description` DISABLE KEYS */;
INSERT INTO `educational_course_description` VALUES (1,'GLK','GLK','GLK','GLK','2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL),(2,'LLM','LLM','LLM','LLM','2017-05-10 16:32:15',0,NULL,NULL,'2018-04-07 09:00:00',1),(3,'HEKU','HEKU','HEKU','HEKU','2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `educational_course_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educational_course_image`
--

DROP TABLE IF EXISTS `educational_course_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educational_course_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `educational_course_hash` varchar(255) NOT NULL,
  `image_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_educational_course_has_image_image1_idx` (`image_hash`),
  KEY `fk_educational_course_has_image_educational_course1_idx` (`educational_course_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educational_course_image`
--

LOCK TABLES `educational_course_image` WRITE;
/*!40000 ALTER TABLE `educational_course_image` DISABLE KEYS */;
INSERT INTO `educational_course_image` VALUES (1,'test_5b1a231def070','test_5b1a231def079','test_5b1a23209e295'),(2,'test_5b1a23214d950','test_5b1a23223376c','test_5b1a2323effe8'),(3,'test_5b1a23249ed17','test_5b1a2326684cf','test_5b1a23274d335');
/*!40000 ALTER TABLE `educational_course_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educational_course_organiser`
--

DROP TABLE IF EXISTS `educational_course_organiser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educational_course_organiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `notes` varchar(1500) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_educational_course_organiser_user1_idx` (`user_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educational_course_organiser`
--

LOCK TABLES `educational_course_organiser` WRITE;
/*!40000 ALTER TABLE `educational_course_organiser` DISABLE KEYS */;
INSERT INTO `educational_course_organiser` VALUES (1,'test_5b1a2327f0fbd','test_5b1a2327f0fc5',NULL,'061 456 12 78','contact@llm.ch','Ist auf Milch allergisch','079 456 12 79'),(2,'test_5b1a23283305e','test_5b1a232844ea8',NULL,'061 457 12 78','contact@glk.ch','Ist auf Kühe allergisch','079 456 12 78'),(3,'test_5b1a232869357','test_5b1a23288d7d4',NULL,'061 357 12 78','contact@heku.ch','Ist auf Dummheit allergisch','079 456 12 99');
/*!40000 ALTER TABLE `educational_course_organiser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educational_course_participant`
--

DROP TABLE IF EXISTS `educational_course_participant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educational_course_participant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) DEFAULT NULL,
  `educational_course_hash` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_educational_course_has_user_user1_idx` (`user_hash`),
  KEY `fk_educational_course_has_user_educational_course1_idx` (`educational_course_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educational_course_participant`
--

LOCK TABLES `educational_course_participant` WRITE;
/*!40000 ALTER TABLE `educational_course_participant` DISABLE KEYS */;
INSERT INTO `educational_course_participant` VALUES (1,'test_5b1a23289f998','test_5b1a23289f9a0','test_5b1a232b45ce7'),(2,'test_5b1a232b7b647','test_5b1a232b7b653','test_5b1a232e334b9'),(3,'test_5b1a232e56fe1','test_5b1a232f38b20','test_5b1a2331205a6');
/*!40000 ALTER TABLE `educational_course_participant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educational_course_title`
--

DROP TABLE IF EXISTS `educational_course_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educational_course_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_de` varchar(45) NOT NULL COMMENT 'Force the user to have a title of maximum 45 chars length!',
  `name_en` varchar(45) NOT NULL,
  `name_fr` varchar(45) NOT NULL,
  `name_it` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educational_course_title`
--

LOCK TABLES `educational_course_title` WRITE;
/*!40000 ALTER TABLE `educational_course_title` DISABLE KEYS */;
INSERT INTO `educational_course_title` VALUES (1,'GLK','GLK','GLK','GLK','2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL),(2,'LLM','LLM','LLM','LLM','2017-05-10 16:32:15',0,NULL,NULL,'2018-04-07 09:00:00',1),(3,'HEKU','HEKU','HEKU','HEKU','2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `educational_course_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_token`
--

DROP TABLE IF EXISTS `email_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(255) NOT NULL,
  `token` varchar(80) NOT NULL,
  `issued_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_token`
--

LOCK TABLES `email_token` WRITE;
/*!40000 ALTER TABLE `email_token` DISABLE KEYS */;
INSERT INTO `email_token` VALUES (1,'test_5b1a2331d2ccf','e1bceb7823310d94a98fa958239c5c6d','2018-06-08 08:33:22'),(2,'test_5b1a233226134','2149b3f79ea48ba2cd32420c6a4bf9a1','2018-06-08 08:33:22'),(3,'test_5b1a23326d68f','8a8d47e91ed26832d466305cef4f3528','2018-06-08 08:17:22');
/*!40000 ALTER TABLE `email_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `event_title_id` int(11) NOT NULL,
  `event_description_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `start_leader` datetime NOT NULL,
  `end_leader` datetime NOT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `publicize_at` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_event_event_description1_idx` (`event_description_id`),
  KEY `fk_event_event_title1_idx` (`event_title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'test_5b1a23327f2b8',1,1,123,'2018-07-05 10:00:00','2018-07-12 16:00:00','2018-07-05 08:00:00','2018-07-12 18:00:00',1,'2018-02-01 10:00:00','2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL),(2,'test_5b1a2332b4d0b',2,2,150,'2018-07-05 10:00:00','2018-07-12 16:00:00','2018-07-05 08:00:00','2018-07-12 18:00:00',1,'2018-02-01 10:00:00','2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL),(3,'test_5b1a2332ea91e',3,3,300,'2018-07-05 10:00:00','2018-07-12 16:00:00','2018-07-05 08:00:00','2018-07-12 18:00:00',0,'2018-02-01 10:00:00','2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_article`
--

DROP TABLE IF EXISTS `event_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_hash` varchar(255) NOT NULL,
  `event_hash` varchar(255) NOT NULL,
  `accountable_user_hash` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archieved_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_has_event_event1_idx` (`event_hash`),
  KEY `fk_article_has_event_article1_idx` (`article_hash`),
  KEY `fk_event_article_app_user1_idx` (`accountable_user_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_article`
--

LOCK TABLES `event_article` WRITE;
/*!40000 ALTER TABLE `event_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_description`
--

DROP TABLE IF EXISTS `event_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_de` longtext NOT NULL,
  `name_en` longtext NOT NULL,
  `name_fr` longtext NOT NULL,
  `name_it` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_description`
--

LOCK TABLES `event_description` WRITE;
/*!40000 ALTER TABLE `event_description` DISABLE KEYS */;
INSERT INTO `event_description` VALUES (1,'Beschreibung des Events','Description of the event','Description de l\'event','Descriptione della evente',NULL,NULL,NULL,NULL,NULL,NULL),(2,'Beschreibung des Events 2','Description of the event 2','Description de l\'event 2','Descriptione della evente 2',NULL,NULL,NULL,NULL,NULL,NULL),(3,'Beschreibung des Events 3','Description of the event 3','Description de l\'event 3','Descriptione della evente 3',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `event_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_image`
--

DROP TABLE IF EXISTS `event_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_hash` varchar(255) NOT NULL,
  `event_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_image_has_event_event1_idx` (`event_hash`),
  KEY `fk_image_has_event_image1_idx` (`image_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_image`
--

LOCK TABLES `event_image` WRITE;
/*!40000 ALTER TABLE `event_image` DISABLE KEYS */;
INSERT INTO `event_image` VALUES (1,'test_5b1a233755339','test_5b1a233801780'),(2,'test_5b1a2338d79a4','test_5b1a233984aef'),(3,'test_5b1a233a67b4b','test_5b1a233b14d26');
/*!40000 ALTER TABLE `event_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_participant`
--

DROP TABLE IF EXISTS `event_participant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_participant` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\\\\\\''s participation is registered, bc the children is registered in a department.',
  `hash` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL COMMENT 'This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\\\\\\''s participation is registered, bc the children is registered in a department.',
  `event_hash` varchar(255) NOT NULL COMMENT 'This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\\\\\\''s participation is registered, bc the children is registered in a department.',
  `event_participation_status_hash` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_event_event1_idx` (`event_hash`),
  KEY `fk_user_has_event_user1_idx` (`user_hash`),
  KEY `fk_event_participant_event_participation_status1_idx` (`event_participation_status_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_participant`
--

LOCK TABLES `event_participant` WRITE;
/*!40000 ALTER TABLE `event_participant` DISABLE KEYS */;
INSERT INTO `event_participant` VALUES (1,'test_5b1a23340e2e5','test_5b1a23340e2ec','test_5b1a233443bdf','test_5b1a2334e478e',NULL,'2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL),(2,'test_5b1a233525cc1','test_5b1a233537e71','test_5b1a233591351','test_5b1a2336088b2',NULL,'2017-05-10 16:32:15',0,NULL,NULL,NULL,NULL),(3,'test_5b1a23363e1df','test_5b1a233661c75','test_5b1a2336de8c5','test_5b1a23371fc02',NULL,'2017-05-10 16:32:15',0,NULL,NULL,'2018-02-01 10:00:00',2);
/*!40000 ALTER TABLE `event_participant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_participation_status`
--

DROP TABLE IF EXISTS `event_participation_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_participation_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name_de` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `name_fr` varchar(45) NOT NULL,
  `name_it` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_participation_status`
--

LOCK TABLES `event_participation_status` WRITE;
/*!40000 ALTER TABLE `event_participation_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_participation_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_title`
--

DROP TABLE IF EXISTS `event_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_de` varchar(45) NOT NULL COMMENT 'Force the user to have a title of maximum 45 chars length!',
  `name_en` varchar(45) NOT NULL,
  `name_fr` varchar(45) NOT NULL,
  `name_it` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_title`
--

LOCK TABLES `event_title` WRITE;
/*!40000 ALTER TABLE `event_title` DISABLE KEYS */;
INSERT INTO `event_title` VALUES (1,'GLK','GLK','GLK','GLK','2017-01-01 00:00:10',0,NULL,NULL,NULL,NULL),(2,'LLM','LLM','LLM','LLM','2017-01-01 00:00:10',0,NULL,NULL,NULL,NULL),(3,'HEKU','HEKU','HEKU','HEKU','2017-01-01 00:00:10',0,'2017-12-01 00:00:00',2,NULL,NULL),(4,'HEKU','HEKU','HEKU','HEKU','2017-01-01 00:00:10',0,NULL,NULL,'2018-01-01 00:00:12',1);
/*!40000 ALTER TABLE `event_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name_de` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `name_fr` varchar(45) NOT NULL,
  `name_it` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'test_5b1a233b4a5be','Mann','Men','Homme','Uomo'),(2,'test_5b1a233b4a5c2','Frau','Miss','Madame','Signora');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'test_5b1a233b4a5c9','C:/xampp/htdocs/cevi-web_API/vendor/phpunit/img/events/image-url-1.jpg','jpg','2017-01-01 10:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a233b7fdf6','C:/xampp/htdocs/cevi-web_API/vendor/phpunit/img/events/image-url-2.jpg','jpg','2017-01-01 10:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a233bb62c5','C:/xampp/htdocs/cevi-web_API/vendor/phpunit/img/events/image-url-3.jpg','jpg','2017-01-01 10:00:00',0,NULL,NULL,'2017-01-01 11:00:00',1);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name` varchar(5) NOT NULL,
  `abbreviation` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (1,'test_5b1a233beb7ed','de_CH','de'),(2,'test_5b1a233beb7f3','en_GB','en'),(3,'test_5b1a233beb7f5','fr_CH','fr'),(4,'test_5b1a233beb7f8','it_CH','it');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,'test_5b1a233beb800',64,'archive'),(2,'test_5b1a233beb803',32,'modify'),(3,'test_5b1a233beb805',16,'insert'),(4,'test_5b1a233beb808',8,'read');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
INSERT INTO `phinxlog` VALUES (20180505165711,'Init','2018-06-06 17:46:08','2018-06-06 17:50:34',0),(20180531073221,'AllowEmptyReplacementDate','2018-06-06 17:50:34','2018-06-06 17:50:34',0),(20180603084800,'AddedMissingDepartmentIdInStoragePlacesTable','2018-06-06 17:50:35','2018-06-06 17:50:35',0),(20180606125819,'AddedHashesForArticles','2018-06-06 17:50:35','2018-06-06 17:50:37',0),(20180606174507,'AddedHashesToStorageLocations','2018-06-06 17:50:37','2018-06-06 17:51:10',0),(20180606192115,'AddedHashesToEveryTable','2018-06-06 19:21:29','2018-06-06 19:22:08',0),(20180606212207,'FixedTypoInArticleTable','2018-06-06 21:22:17','2018-06-06 21:22:18',0),(20180606213221,'AddedHashesToDepartment','2018-06-06 21:34:22','2018-06-06 21:34:24',0),(20180606214624,'AddedHashesToDepartment1','2018-06-06 21:46:42','2018-06-06 21:46:44',0),(20180606221841,'AddedMissingHashes','2018-06-06 22:20:04','2018-06-06 22:20:08',0),(20180606222327,'RenamedNumberToPrice','2018-06-06 22:23:33','2018-06-06 22:23:34',0),(20180606222945,'AddedMissingHashes1','2018-06-06 22:30:00','2018-06-06 22:30:01',0);
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name_de` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `name_fr` varchar(45) NOT NULL,
  `name_it` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'test_5b1a233beb80e','Abteilungsleiter','Head of department','Capo dipartimento','Chef de département',NULL,NULL,NULL,NULL,NULL,NULL),(2,'test_5b1a233beb811','Lagerleiter','Camp leader','Chef de camp','Capo  del campeggio',NULL,NULL,NULL,NULL,NULL,NULL),(3,'test_5b1a233beb813','Gruppenleiter','Team leader','Chef d\'équipe','Capogruppo',NULL,NULL,NULL,NULL,NULL,NULL),(4,'test_5b1a233beb816','Hilfsleiter','Auxiliary conductors','Conducteurs auxiliaires','Conduttori ausiliari',NULL,NULL,NULL,NULL,NULL,NULL),(5,'test_5b1a233beb818','Teilnehmer','Participants','Participants','Partecipanti',NULL,NULL,NULL,NULL,NULL,NULL),(6,'test_5b1a233beb81a','Eltern','Parent','Parent','Ragazzo',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sl_chest`
--

DROP TABLE IF EXISTS `sl_chest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sl_chest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sl_chest`
--

LOCK TABLES `sl_chest` WRITE;
/*!40000 ALTER TABLE `sl_chest` DISABLE KEYS */;
INSERT INTO `sl_chest` VALUES (1,'test_5b1a233beb820','Kiste 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a233c2cbdd','Kiste 2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a233c62ae5','Kiste 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sl_chest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sl_corridor`
--

DROP TABLE IF EXISTS `sl_corridor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sl_corridor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sl_corridor`
--

LOCK TABLES `sl_corridor` WRITE;
/*!40000 ALTER TABLE `sl_corridor` DISABLE KEYS */;
INSERT INTO `sl_corridor` VALUES (1,'test_5b1a233c9885d','Korridor 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a233cce18c','Korridor 2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a233d0f9d9','Korridor 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sl_corridor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sl_location`
--

DROP TABLE IF EXISTS `sl_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sl_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sl_location`
--

LOCK TABLES `sl_location` WRITE;
/*!40000 ALTER TABLE `sl_location` DISABLE KEYS */;
INSERT INTO `sl_location` VALUES (1,'test_5b1a233d45287','Ort 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a233d7a93e','Ort 2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a233db080f','Ort 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sl_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sl_room`
--

DROP TABLE IF EXISTS `sl_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sl_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sl_room`
--

LOCK TABLES `sl_room` WRITE;
/*!40000 ALTER TABLE `sl_room` DISABLE KEYS */;
INSERT INTO `sl_room` VALUES (1,'test_5b1a233de5ccb','Raum 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a233e28020','Raum 2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a233e5dda0','Raum 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sl_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sl_shelf`
--

DROP TABLE IF EXISTS `sl_shelf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sl_shelf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sl_shelf`
--

LOCK TABLES `sl_shelf` WRITE;
/*!40000 ALTER TABLE `sl_shelf` DISABLE KEYS */;
INSERT INTO `sl_shelf` VALUES (1,'test_5b1a233e9382c','Regal 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a233ec9a3e','Regal 2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a233f0b166','Regal 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sl_shelf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sl_tray`
--

DROP TABLE IF EXISTS `sl_tray`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sl_tray` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sl_tray`
--

LOCK TABLES `sl_tray` WRITE;
/*!40000 ALTER TABLE `sl_tray` DISABLE KEYS */;
INSERT INTO `sl_tray` VALUES (1,'test_5b1a233f40ff6','Tablar 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a233f76a98','Tablar 2','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a233fac40a','Tablar 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sl_tray` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage_place`
--

DROP TABLE IF EXISTS `storage_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `department_hash` varchar(255) NOT NULL,
  `sl_location_hash` varchar(255) NOT NULL,
  `sl_room_hash` varchar(255) DEFAULT NULL,
  `sl_corridor_hash` varchar(255) DEFAULT NULL,
  `sl_shelf_hash` varchar(255) DEFAULT NULL,
  `sl_tray_hash` varchar(255) DEFAULT NULL,
  `sl_chest_hash` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_storage_place_sl_location1_idx` (`sl_location_hash`),
  KEY `fk_storage_place_sl_room1_idx` (`sl_room_hash`),
  KEY `fk_storage_place_sl_corridor1_idx` (`sl_corridor_hash`),
  KEY `fk_storage_place_sl_shelf1_idx` (`sl_shelf_hash`),
  KEY `fk_storage_place_sl_tray1_idx` (`sl_tray_hash`),
  KEY `fk_storage_place_sl_chest1_idx` (`sl_chest_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage_place`
--

LOCK TABLES `storage_place` WRITE;
/*!40000 ALTER TABLE `storage_place` DISABLE KEYS */;
INSERT INTO `storage_place` VALUES (1,'test_5b1a233fe16e9','test_5b1a2343d5cce','test_5b1a233fe16f0','test_5b1a23408e36f','test_5b1a23413ab13','test_5b1a2341dc4c0','test_5b1a2342886ca','test_5b1a234334d63','Platz 1','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a234417657','test_5b1a23480b40e','test_5b1a23444d283','test_5b1a2344edc3f','test_5b1a23459a692','test_5b1a234646e4b','test_5b1a2346e7d53','test_5b1a23479433a','Platz 2','2027-02-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a234840743','test_5b1a234c3584e','test_5b1a234840750','test_5b1a2348e1aa1','test_5b1a23498e34e','test_5b1a234a3b639','test_5b1a234adc33e','test_5b1a234b887d0','Platz 3','2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(4,'test_5b1a234c6b28c','test_5b1a2350602fb','test_5b1a234c6b299','test_5b1a234d4d1c5','test_5b1a234dee255','test_5b1a234e9aa61','test_5b1a234f12585','test_5b1a234fb3bde','Platz 3','2017-01-01 00:00:00',0,NULL,NULL,'2017-12-30 00:00:00',0);
/*!40000 ALTER TABLE `storage_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `language_hash` varchar(255) NOT NULL,
  `permission_hash` varchar(255) NOT NULL DEFAULT '4' COMMENT 'See permission table',
  `department_hash` varchar(255) DEFAULT NULL,
  `position_hash` varchar(255) DEFAULT NULL,
  `gender_hash` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_completed` tinyint(4) NOT NULL DEFAULT '0',
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `js_certificate` tinyint(4) NOT NULL DEFAULT '0',
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cevi_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `js_certificate_until` year(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_city1_idx` (`city_id`),
  KEY `fk_user_department1_idx` (`department_hash`),
  KEY `fk_user_position1_idx` (`position_hash`),
  KEY `fk_user_language1_idx` (`language_hash`),
  KEY `fk_user_gender1_idx` (`gender_hash`),
  KEY `fk_app_user_permission1_idx` (`permission_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'test_5b1a2350cb586',1,'test_5b1a2350cb58d','test_5b1a2350cb59c','test_5b1a2350cb5c5','test_5b1a2350cb5a8','test_5b1a2350cb5bc','Max','max.mustermann@example.com','max','$2y$10$cMKQrlBQhtdA620OxapnQuaEcTaOLvNMumCmOWGLBprhqfURYK3Oy',1,0,1,'Mustermann','Examplehausenerstrasse 1','asöfd','1998-06-05','012 345 67 89','076 123 45 67',2019,'2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(2,'test_5b1a2350dd284',2,'test_5b1a2350dd28f','test_5b1a2350dd29e','test_5b1a2350dd2c0','test_5b1a2350dd2a7','test_5b1a2350dd2bb','Maxine','maxine.mustermann@example.com','maxine','$2y$10$s1s/yBKINz7OBaPpQADU6uH88QFIqTK0tsUSiWH7IYxsxSkOHdDE2',1,0,1,'Mustermann','Examplehausenerstrasse 2','Maus','1998-06-05','012 355 67 89','076 523 45 67',2019,'2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL),(3,'test_5b1a2350ef053',3,'test_5b1a2350ef060','test_5b1a2350ef075','test_5b1a2350ef097','test_5b1a2350ef081','test_5b1a2350ef091','Maxinea','maxine.mustermann@example.com','maxinea','$2y$10$rww2z3mjBCDFl2ajFrbEgO1vUauGoJ4S0fZRWsi2ZGu6syyNaLvAm',1,0,1,'Mustermann','Examplehausenerstrasse 3','Maus','1998-06-05','013 345 67 89','073 133 45 67',2017,'2017-01-01 00:00:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-08  9:17:26
