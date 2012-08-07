-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: smart_order_db
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `tbm_announce`
--

DROP TABLE IF EXISTS `tbm_announce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_announce` (
  `announce_id` int(10) NOT NULL AUTO_INCREMENT,
  `announce_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `announce_detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `announce_by` int(10) DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`announce_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_announce`
--

LOCK TABLES `tbm_announce` WRITE;
/*!40000 ALTER TABLE `tbm_announce` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_announce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_bankaccount`
--

DROP TABLE IF EXISTS `tbm_bankaccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_bankaccount` (
  `bankaccount_id` int(10) NOT NULL AUTO_INCREMENT,
  `bankname_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankname_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accounttype_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accounttype_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_date` date DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`bankaccount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_bankaccount`
--

LOCK TABLES `tbm_bankaccount` WRITE;
/*!40000 ALTER TABLE `tbm_bankaccount` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_bankaccount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_currency`
--

DROP TABLE IF EXISTS `tbm_currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_currency` (
  `currency_id` int(10) NOT NULL AUTO_INCREMENT,
  `currcode` int(10) DEFAULT NULL,
  `currdesceng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currdescth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currabbveng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currabbvth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_currency`
--

LOCK TABLES `tbm_currency` WRITE;
/*!40000 ALTER TABLE `tbm_currency` DISABLE KEYS */;
INSERT INTO `tbm_currency` VALUES (1,1,'Thai','ไทย','Thailand','ไทยแลนด์','0',NULL,NULL,NULL,NULL),(2,2,'United State','สหรัฐ','United State of America','สหรัฐอเมริกา','0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbm_currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_custaddress`
--

DROP TABLE IF EXISTS `tbm_custaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_custaddress` (
  `custaddress_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `no` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cillage_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `road` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supdistrict` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_id` int(10) DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`custaddress_id`),
  KEY `FKtbm_custad743570` (`customer_id`),
  CONSTRAINT `FKtbm_custad743570` FOREIGN KEY (`customer_id`) REFERENCES `tbm_customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_custaddress`
--

LOCK TABLES `tbm_custaddress` WRITE;
/*!40000 ALTER TABLE `tbm_custaddress` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_custaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_customer`
--

DROP TABLE IF EXISTS `tbm_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customertype_id` int(10) NOT NULL,
  `cust_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_nameeng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_nameth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isperson` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_dob` date DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `FKtbm_custom369654` (`customertype_id`),
  CONSTRAINT `FKtbm_custom369654` FOREIGN KEY (`customertype_id`) REFERENCES `tbm_customertype` (`customertype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_customer`
--

LOCK TABLES `tbm_customer` WRITE;
/*!40000 ALTER TABLE `tbm_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_customerbonus`
--

DROP TABLE IF EXISTS `tbm_customerbonus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_customerbonus` (
  `customerbonus_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `order_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `got_point` int(10) DEFAULT NULL,
  `use_poin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`customerbonus_id`),
  KEY `FKtbm_custom871645` (`customer_id`),
  CONSTRAINT `FKtbm_custom871645` FOREIGN KEY (`customer_id`) REFERENCES `tbm_customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_customerbonus`
--

LOCK TABLES `tbm_customerbonus` WRITE;
/*!40000 ALTER TABLE `tbm_customerbonus` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_customerbonus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_customerreward`
--

DROP TABLE IF EXISTS `tbm_customerreward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_customerreward` (
  `customerreward_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `get_date` date DEFAULT NULL,
  `get_goodsid` int(10) DEFAULT NULL,
  `get_goodsqty` int(10) DEFAULT NULL,
  `get_unitid` int(10) DEFAULT NULL,
  `get_byuserid` int(10) DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`customerreward_id`),
  KEY `FKtbm_custom74896` (`customer_id`),
  CONSTRAINT `FKtbm_custom74896` FOREIGN KEY (`customer_id`) REFERENCES `tbm_customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_customerreward`
--

LOCK TABLES `tbm_customerreward` WRITE;
/*!40000 ALTER TABLE `tbm_customerreward` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_customerreward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_customertype`
--

DROP TABLE IF EXISTS `tbm_customertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_customertype` (
  `customertype_id` int(10) NOT NULL AUTO_INCREMENT,
  `custtype_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custtype_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custtype_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custtype_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`customertype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_customertype`
--

LOCK TABLES `tbm_customertype` WRITE;
/*!40000 ALTER TABLE `tbm_customertype` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_customertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_employeetype`
--

DROP TABLE IF EXISTS `tbm_employeetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_employeetype` (
  `employeetype_id` int(10) NOT NULL AUTO_INCREMENT,
  `emptype_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emptype_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emptype_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`employeetype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_employeetype`
--

LOCK TABLES `tbm_employeetype` WRITE;
/*!40000 ALTER TABLE `tbm_employeetype` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_employeetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_exchange`
--

DROP TABLE IF EXISTS `tbm_exchange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_exchange` (
  `exchange_id` int(10) NOT NULL AUTO_INCREMENT,
  `exyear` int(10) NOT NULL,
  `currency_id` int(10) NOT NULL,
  `exm01` decimal(10,4) DEFAULT NULL,
  `exm02` decimal(10,4) DEFAULT NULL,
  `exm03` decimal(10,2) DEFAULT NULL,
  `exm04` decimal(10,2) DEFAULT NULL,
  `exm05` decimal(10,2) DEFAULT NULL,
  `exm06` decimal(10,2) DEFAULT NULL,
  `exm07` decimal(10,2) DEFAULT NULL,
  `exm08` decimal(10,2) DEFAULT NULL,
  `exm09` decimal(10,2) DEFAULT NULL,
  `exm10` decimal(10,2) DEFAULT NULL,
  `exm11` decimal(10,2) DEFAULT NULL,
  `exm12` decimal(10,2) DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`exchange_id`),
  KEY `FKtbm_exchan498376` (`currency_id`),
  CONSTRAINT `FKtbm_exchan498376` FOREIGN KEY (`currency_id`) REFERENCES `tbm_currency` (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_exchange`
--

LOCK TABLES `tbm_exchange` WRITE;
/*!40000 ALTER TABLE `tbm_exchange` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_exchange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_goods`
--

DROP TABLE IF EXISTS `tbm_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_goods` (
  `goods_id` int(10) NOT NULL AUTO_INCREMENT,
  `goodstype_id` int(10) NOT NULL,
  `goodscode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goodsname_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goodsname_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goodsdesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goodspicture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`goods_id`),
  KEY `FKtbm_goods268265` (`goodstype_id`),
  CONSTRAINT `FKtbm_goods268265` FOREIGN KEY (`goodstype_id`) REFERENCES `tbm_goodstype` (`goodstype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_goods`
--

LOCK TABLES `tbm_goods` WRITE;
/*!40000 ALTER TABLE `tbm_goods` DISABLE KEYS */;
INSERT INTO `tbm_goods` VALUES (1,1,'001','Marigold Seed # 4809','เมล็ดพันธุ์ดาวเรือง # 4809','เมล็ดพันธุ์ดาวเรือง',NULL,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbm_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_goodsbranch`
--

DROP TABLE IF EXISTS `tbm_goodsbranch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_goodsbranch` (
  `goodsbranch_id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `stoppurchase` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stoppurchase_date` date DEFAULT NULL,
  `stopsale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stopsale_date` date DEFAULT NULL,
  `stopproduce` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stopproduce_date` date DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`goodsbranch_id`),
  KEY `FKtbm_goodsb100942` (`goods_id`),
  CONSTRAINT `tbm_goodsbranch_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `tbm_goods` (`goods_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_goodsbranch`
--

LOCK TABLES `tbm_goodsbranch` WRITE;
/*!40000 ALTER TABLE `tbm_goodsbranch` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_goodsbranch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_goodsprice`
--

DROP TABLE IF EXISTS `tbm_goodsprice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_goodsprice` (
  `goodsprice_id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `currency_id` int(10) NOT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`goodsprice_id`),
  KEY `FKtbm_goodsp46217` (`goods_id`),
  KEY `FKtbm_goodsp675208` (`unit_id`),
  KEY `FKtbm_goodsp427793` (`currency_id`),
  CONSTRAINT `FKtbm_goodsp427793` FOREIGN KEY (`currency_id`) REFERENCES `tbm_currency` (`currency_id`),
  CONSTRAINT `FKtbm_goodsp46217` FOREIGN KEY (`goods_id`) REFERENCES `tbm_goods` (`goods_id`),
  CONSTRAINT `FKtbm_goodsp675208` FOREIGN KEY (`unit_id`) REFERENCES `tbm_unit` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_goodsprice`
--

LOCK TABLES `tbm_goodsprice` WRITE;
/*!40000 ALTER TABLE `tbm_goodsprice` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_goodsprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_goodsprize`
--

DROP TABLE IF EXISTS `tbm_goodsprize`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_goodsprize` (
  `goodsprize_id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `prize_id` int(10) NOT NULL,
  `need_point` int(10) DEFAULT NULL,
  `prize_qty` int(10) DEFAULT NULL,
  `expire_flag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `deleteflage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`goodsprize_id`),
  KEY `FKtbm_goodsp46930` (`goods_id`),
  CONSTRAINT `FKtbm_goodsp46930` FOREIGN KEY (`goods_id`) REFERENCES `tbm_goods` (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_goodsprize`
--

LOCK TABLES `tbm_goodsprize` WRITE;
/*!40000 ALTER TABLE `tbm_goodsprize` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_goodsprize` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_goodspromotion`
--

DROP TABLE IF EXISTS `tbm_goodspromotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_goodspromotion` (
  `goodspromotion_id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `iscustomer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'true / false',
  `customer_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `currency_id` int(10) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `promotioncode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`goodspromotion_id`),
  KEY `FKtbm_goodsp803824` (`goods_id`),
  KEY `FKtbm_goodsp174833` (`unit_id`),
  KEY `FKtbm_goodsp61181` (`customer_id`),
  CONSTRAINT `FKtbm_goodsp174833` FOREIGN KEY (`unit_id`) REFERENCES `tbm_unit` (`unit_id`),
  CONSTRAINT `FKtbm_goodsp61181` FOREIGN KEY (`customer_id`) REFERENCES `tbm_customer` (`customer_id`),
  CONSTRAINT `FKtbm_goodsp803824` FOREIGN KEY (`goods_id`) REFERENCES `tbm_goods` (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_goodspromotion`
--

LOCK TABLES `tbm_goodspromotion` WRITE;
/*!40000 ALTER TABLE `tbm_goodspromotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_goodspromotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_goodstype`
--

DROP TABLE IF EXISTS `tbm_goodstype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_goodstype` (
  `goodstype_id` int(10) NOT NULL AUTO_INCREMENT,
  `goodstype_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goodstype_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goodstype_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`goodstype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_goodstype`
--

LOCK TABLES `tbm_goodstype` WRITE;
/*!40000 ALTER TABLE `tbm_goodstype` DISABLE KEYS */;
INSERT INTO `tbm_goodstype` VALUES (1,'Marigold Seed','เมล็ดพันธุ์ดาวเรือง','เมล็ด','0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbm_goodstype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_goodsunit`
--

DROP TABLE IF EXISTS `tbm_goodsunit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_goodsunit` (
  `goodsunit_id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `unitside` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_instock` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_inorder` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`goodsunit_id`),
  KEY `FKtbm_goodsu502960` (`goods_id`),
  KEY `FKtbm_goodsu502961` (`goods_id`),
  KEY `FKtbm_goodsu97622` (`unit_id`),
  KEY `FKtbm_goodsu502962` (`goods_id`),
  CONSTRAINT `FKtbm_goodsu502960` FOREIGN KEY (`goods_id`) REFERENCES `tbm_goods` (`goods_id`),
  CONSTRAINT `FKtbm_goodsu502961` FOREIGN KEY (`goods_id`) REFERENCES `tbm_goods` (`goods_id`),
  CONSTRAINT `FKtbm_goodsu502962` FOREIGN KEY (`goods_id`) REFERENCES `tbm_goods` (`goods_id`),
  CONSTRAINT `FKtbm_goodsu97622` FOREIGN KEY (`unit_id`) REFERENCES `tbm_unit` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_goodsunit`
--

LOCK TABLES `tbm_goodsunit` WRITE;
/*!40000 ALTER TABLE `tbm_goodsunit` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_goodsunit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_paymentstatus`
--

DROP TABLE IF EXISTS `tbm_paymentstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_paymentstatus` (
  `paymentstatus_id` int(10) NOT NULL AUTO_INCREMENT,
  `paymenttype_id` int(10) NOT NULL,
  `pmstatus_seq` int(10) DEFAULT NULL,
  `pmstatus_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pmstatus_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`paymentstatus_id`),
  KEY `FKtbm_paymen880753` (`paymenttype_id`),
  CONSTRAINT `FKtbm_paymen880753` FOREIGN KEY (`paymenttype_id`) REFERENCES `tbm_paymenttype` (`paymenttype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_paymentstatus`
--

LOCK TABLES `tbm_paymentstatus` WRITE;
/*!40000 ALTER TABLE `tbm_paymentstatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_paymentstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_paymentterm`
--

DROP TABLE IF EXISTS `tbm_paymentterm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_paymentterm` (
  `paymentterm_id` int(10) NOT NULL AUTO_INCREMENT,
  `pmterm_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pmterm_day` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pmterm_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pmterm_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`paymentterm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_paymentterm`
--

LOCK TABLES `tbm_paymentterm` WRITE;
/*!40000 ALTER TABLE `tbm_paymentterm` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_paymentterm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_paymenttype`
--

DROP TABLE IF EXISTS `tbm_paymenttype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_paymenttype` (
  `paymenttype_id` int(10) NOT NULL AUTO_INCREMENT,
  `pmtype_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pmtype_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pmtype_th` int(10) DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`paymenttype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_paymenttype`
--

LOCK TABLES `tbm_paymenttype` WRITE;
/*!40000 ALTER TABLE `tbm_paymenttype` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_paymenttype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_permission`
--

DROP TABLE IF EXISTS `tbm_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_id` int(10) NOT NULL,
  `usergroup_id` int(10) NOT NULL,
  `isview` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idadd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isdelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isrecovery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isspecial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`permission_id`),
  KEY `FKtbm_permis987712` (`screen_id`),
  KEY `FKtbm_permis376428` (`usergroup_id`),
  CONSTRAINT `FKtbm_permis376428` FOREIGN KEY (`usergroup_id`) REFERENCES `tbm_usergroup` (`usergroup_id`),
  CONSTRAINT `FKtbm_permis987712` FOREIGN KEY (`screen_id`) REFERENCES `tbm_screen` (`screen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_permission`
--

LOCK TABLES `tbm_permission` WRITE;
/*!40000 ALTER TABLE `tbm_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_province`
--

DROP TABLE IF EXISTS `tbm_province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_province` (
  `province_id` int(10) NOT NULL AUTO_INCREMENT,
  `zone_id` int(10) NOT NULL,
  `province_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`province_id`),
  KEY `FKtbm_provin309784` (`zone_id`),
  CONSTRAINT `FKtbm_provin309784` FOREIGN KEY (`zone_id`) REFERENCES `tbm_zone` (`zone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_province`
--

LOCK TABLES `tbm_province` WRITE;
/*!40000 ALTER TABLE `tbm_province` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_screen`
--

DROP TABLE IF EXISTS `tbm_screen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_screen` (
  `screen_id` int(10) NOT NULL AUTO_INCREMENT,
  `scr_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scrname_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scrname_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scr_type` int(10) DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`screen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_screen`
--

LOCK TABLES `tbm_screen` WRITE;
/*!40000 ALTER TABLE `tbm_screen` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_screen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_sendingtype`
--

DROP TABLE IF EXISTS `tbm_sendingtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_sendingtype` (
  `sendingtype_id` int(10) NOT NULL AUTO_INCREMENT,
  `sendtype_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sendtype_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sendtype_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sendtype_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`sendingtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_sendingtype`
--

LOCK TABLES `tbm_sendingtype` WRITE;
/*!40000 ALTER TABLE `tbm_sendingtype` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_sendingtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_sendstatus`
--

DROP TABLE IF EXISTS `tbm_sendstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_sendstatus` (
  `sendstatus_id` int(10) NOT NULL AUTO_INCREMENT,
  `sendingtype_id` int(10) NOT NULL,
  `sendstatus_seq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sendstatus_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sendstatus_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`sendstatus_id`),
  KEY `FKtbm_sendst988639` (`sendingtype_id`),
  CONSTRAINT `FKtbm_sendst988639` FOREIGN KEY (`sendingtype_id`) REFERENCES `tbm_sendingtype` (`sendingtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_sendstatus`
--

LOCK TABLES `tbm_sendstatus` WRITE;
/*!40000 ALTER TABLE `tbm_sendstatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_sendstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_unit`
--

DROP TABLE IF EXISTS `tbm_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_unit` (
  `unit_id` int(10) NOT NULL AUTO_INCREMENT,
  `unitcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unitnameeng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unitnameth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unitdesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_unit`
--

LOCK TABLES `tbm_unit` WRITE;
/*!40000 ALTER TABLE `tbm_unit` DISABLE KEYS */;
INSERT INTO `tbm_unit` VALUES (1,'Sd.','Seed','เมล็ด','Seed เมล็ด','0',NULL,NULL,NULL,NULL),(2,'E.','Envelop','ซอง','Envelop ซอง','0',NULL,NULL,NULL,NULL),(3,'C.','Can','กระป๋อง','Can กระป๋อง','1',NULL,NULL,NULL,NULL),(4,'P.','Plate','แผ่น','Plate แผ่น','1',NULL,NULL,NULL,NULL),(5,'B.','Bag','ถุง','Bag ถุง','1',NULL,NULL,NULL,NULL),(6,'Pck','Pack','แพ็ค','Pack แพ็ค','0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbm_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_usergroup`
--

DROP TABLE IF EXISTS `tbm_usergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_usergroup` (
  `usergroup_id` int(10) NOT NULL AUTO_INCREMENT,
  `usergroup_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usergroup_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usergroup_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`usergroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_usergroup`
--

LOCK TABLES `tbm_usergroup` WRITE;
/*!40000 ALTER TABLE `tbm_usergroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_usergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_userprofile`
--

DROP TABLE IF EXISTS `tbm_userprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_userprofile` (
  `userprofile_id` int(10) NOT NULL AUTO_INCREMENT,
  `usergroup_id` int(10) NOT NULL,
  `employeetype_id` int(10) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empname_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empname_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workstatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`userprofile_id`),
  KEY `FKtbm_userpr551132` (`usergroup_id`),
  KEY `FKtbm_userpr172779` (`employeetype_id`),
  CONSTRAINT `FKtbm_userpr172779` FOREIGN KEY (`employeetype_id`) REFERENCES `tbm_employeetype` (`employeetype_id`),
  CONSTRAINT `FKtbm_userpr551132` FOREIGN KEY (`usergroup_id`) REFERENCES `tbm_usergroup` (`usergroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_userprofile`
--

LOCK TABLES `tbm_userprofile` WRITE;
/*!40000 ALTER TABLE `tbm_userprofile` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_userprofile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_zipcode`
--

DROP TABLE IF EXISTS `tbm_zipcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_zipcode` (
  `zipcode_id` int(255) NOT NULL AUTO_INCREMENT,
  `province_id` int(10) NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subdistrict` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `village_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ems_time` int(10) DEFAULT NULL,
  `ems_fee` decimal(10,2) DEFAULT NULL,
  `ems_currencyid` int(10) DEFAULT NULL,
  `norm_time` int(10) DEFAULT NULL,
  `norm_fee` decimal(10,2) DEFAULT NULL,
  `norm_currencyid` int(10) DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`zipcode_id`),
  KEY `FKtbm_zipcod776905` (`province_id`),
  CONSTRAINT `FKtbm_zipcod776905` FOREIGN KEY (`province_id`) REFERENCES `tbm_province` (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_zipcode`
--

LOCK TABLES `tbm_zipcode` WRITE;
/*!40000 ALTER TABLE `tbm_zipcode` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_zipcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_zone`
--

DROP TABLE IF EXISTS `tbm_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_zone` (
  `zone_id` int(10) NOT NULL AUTO_INCREMENT,
  `zone_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zonename_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zonename_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleteflag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `lastupdate_by` int(10) DEFAULT NULL,
  `lastupdate_date` date DEFAULT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_zone`
--

LOCK TABLES `tbm_zone` WRITE;
/*!40000 ALTER TABLE `tbm_zone` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_zone` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-08-07  8:40:50
