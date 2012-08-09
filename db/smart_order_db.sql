/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : smart_order_db

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2012-08-09 09:07:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbm_announce`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_announce`;
CREATE TABLE `tbm_announce` (
  `announce_id` int(10) NOT NULL AUTO_INCREMENT,
  `announce_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `announce_head` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbm_announce
-- ----------------------------
INSERT INTO `tbm_announce` VALUES ('1', '55/7-1', 'ประกาศเปลี่ยนราคา 4803', 'ราคาเมล็ดพันธุ์ดาวเรือง 4803 ปรับจาก...', '2012-08-08', '2012-08-09', null, '0', null, null, null, null);

-- ----------------------------
-- Table structure for `tbm_bankaccount`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_bankaccount`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbm_bankaccount
-- ----------------------------
INSERT INTO `tbm_bankaccount` VALUES ('1', 'KTC', 'ธ.กรุงไทย', 'save up', 'ออมทรัพย์', '191-0-22357-3', 'SOMYOT', '2012-08-08', '0', null, null, null, null);

-- ----------------------------
-- Table structure for `tbm_currency`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_currency`;
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

-- ----------------------------
-- Records of tbm_currency
-- ----------------------------
INSERT INTO `tbm_currency` VALUES ('1', '1', 'Thai', 'ไทย', 'Thailand', 'ไทยแลนด์', '0', null, null, null, null);
INSERT INTO `tbm_currency` VALUES ('2', '2', 'United State', 'สหรัฐ', 'United State of America', 'สหรัฐอเมริกา', '0', null, null, null, null);

-- ----------------------------
-- Table structure for `tbm_custaddress`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_custaddress`;
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

-- ----------------------------
-- Records of tbm_custaddress
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_customer`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_customer`;
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

-- ----------------------------
-- Records of tbm_customer
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_customerbonus`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_customerbonus`;
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

-- ----------------------------
-- Records of tbm_customerbonus
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_customerreward`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_customerreward`;
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

-- ----------------------------
-- Records of tbm_customerreward
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_customertype`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_customertype`;
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

-- ----------------------------
-- Records of tbm_customertype
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_employeetype`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_employeetype`;
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

-- ----------------------------
-- Records of tbm_employeetype
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_exchange`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_exchange`;
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

-- ----------------------------
-- Records of tbm_exchange
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_goods`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_goods`;
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

-- ----------------------------
-- Records of tbm_goods
-- ----------------------------
INSERT INTO `tbm_goods` VALUES ('1', '1', '001', 'Marigold Seed # 4809', 'เมล็ดพันธุ์ดาวเรือง # 4809', 'เมล็ดพันธุ์ดาวเรือง', null, '0', null, null, null, null);

-- ----------------------------
-- Table structure for `tbm_goodsbranch`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_goodsbranch`;
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

-- ----------------------------
-- Records of tbm_goodsbranch
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_goodsprice`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_goodsprice`;
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

-- ----------------------------
-- Records of tbm_goodsprice
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_goodsprize`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_goodsprize`;
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

-- ----------------------------
-- Records of tbm_goodsprize
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_goodspromotion`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_goodspromotion`;
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

-- ----------------------------
-- Records of tbm_goodspromotion
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_goodstype`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_goodstype`;
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

-- ----------------------------
-- Records of tbm_goodstype
-- ----------------------------
INSERT INTO `tbm_goodstype` VALUES ('1', 'Marigold Seed', 'เมล็ดพันธุ์ดาวเรือง', 'เมล็ด', '0', null, null, null, null);

-- ----------------------------
-- Table structure for `tbm_goodsunit`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_goodsunit`;
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

-- ----------------------------
-- Records of tbm_goodsunit
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_paymentstatus`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_paymentstatus`;
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

-- ----------------------------
-- Records of tbm_paymentstatus
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_paymentterm`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_paymentterm`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbm_paymentterm
-- ----------------------------
INSERT INTO `tbm_paymentterm` VALUES ('1', 'D01', '10', '10 Days Term', '10 วัน', '0', null, null, null, null);

-- ----------------------------
-- Table structure for `tbm_paymenttype`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_paymenttype`;
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

-- ----------------------------
-- Records of tbm_paymenttype
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_permission`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_permission`;
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

-- ----------------------------
-- Records of tbm_permission
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_province`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_province`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbm_province
-- ----------------------------
INSERT INTO `tbm_province` VALUES ('1', '1', '01', 'Chiang Rai', 'เชียงราย', '0', null, null, null, null);

-- ----------------------------
-- Table structure for `tbm_screen`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_screen`;
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

-- ----------------------------
-- Records of tbm_screen
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_sendingtype`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_sendingtype`;
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

-- ----------------------------
-- Records of tbm_sendingtype
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_sendstatus`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_sendstatus`;
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

-- ----------------------------
-- Records of tbm_sendstatus
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_unit`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_unit`;
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

-- ----------------------------
-- Records of tbm_unit
-- ----------------------------
INSERT INTO `tbm_unit` VALUES ('1', 'Sd.', 'Seed', 'เมล็ด', 'Seed เมล็ด', '-1', null, null, '1', '2012-08-08');
INSERT INTO `tbm_unit` VALUES ('2', 'E.', 'Envelop', 'ซอง', 'Envelop ซอง', '0', null, null, null, null);
INSERT INTO `tbm_unit` VALUES ('3', 'C.', 'Can', 'กระป๋อง', 'Can กระป๋อง', '-1', null, null, '1', '2012-08-08');
INSERT INTO `tbm_unit` VALUES ('4', 'P.', 'Plate', 'แผ่น', 'Plate แผ่น', '1', null, null, null, null);
INSERT INTO `tbm_unit` VALUES ('5', 'B.', 'Bag', 'ถุง', 'Bag ถุง', '1', null, null, null, null);
INSERT INTO `tbm_unit` VALUES ('6', 'Pck', 'Pack', 'แพ็ค', 'Pack แพ็ค', '0', null, null, null, null);

-- ----------------------------
-- Table structure for `tbm_usergroup`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_usergroup`;
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

-- ----------------------------
-- Records of tbm_usergroup
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_userprofile`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_userprofile`;
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

-- ----------------------------
-- Records of tbm_userprofile
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_zipcode`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_zipcode`;
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

-- ----------------------------
-- Records of tbm_zipcode
-- ----------------------------

-- ----------------------------
-- Table structure for `tbm_zone`
-- ----------------------------
DROP TABLE IF EXISTS `tbm_zone`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbm_zone
-- ----------------------------
INSERT INTO `tbm_zone` VALUES ('1', 'N', 'North', 'ภาคเหนือ', 'ภาคเหนือนะ', '0', null, null, null, null);
