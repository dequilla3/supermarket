/*
SQLyog Trial v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - bfi_assessment
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bfi_assessment` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bfi_assessment`;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customer_id` bigint(30) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `goods_received` */

DROP TABLE IF EXISTS `goods_received`;

CREATE TABLE `goods_received` (
  `goods_received_id` bigint(30) NOT NULL AUTO_INCREMENT,
  `supplier_id` bigint(30) DEFAULT NULL,
  `product_id` bigint(30) DEFAULT NULL,
  `qty_received` decimal(12,2) DEFAULT NULL,
  `date_received` datetime DEFAULT NULL,
  PRIMARY KEY (`goods_received_id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `goods_received_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  CONSTRAINT `goods_received_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` bigint(30) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `cost` decimal(12,2) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `purchase` */

DROP TABLE IF EXISTS `purchase`;

CREATE TABLE `purchase` (
  `purchase_id` bigint(30) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(30) DEFAULT NULL,
  `cost` decimal(12,2) DEFAULT NULL,
  `qty_purch` decimal(12,2) DEFAULT NULL,
  `total_amt` decimal(12,2) DEFAULT NULL,
  `customer_id` bigint(30) DEFAULT NULL,
  `date_purch` datetime DEFAULT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `stockard` */

DROP TABLE IF EXISTS `stockard`;

CREATE TABLE `stockard` (
  `stockard_id` bigint(30) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(30) DEFAULT NULL,
  `qty` decimal(12,2) DEFAULT NULL,
  `cumulative_qty` decimal(12,2) DEFAULT NULL,
  `transaction` enum('COGS','GAIN') DEFAULT NULL,
  `goods_received_id` bigint(30) DEFAULT NULL,
  `purchase_id` bigint(30) DEFAULT NULL,
  PRIMARY KEY (`stockard_id`),
  KEY `product_id` (`product_id`),
  KEY `goods_received_id` (`goods_received_id`),
  KEY `purchase_id` (`purchase_id`),
  CONSTRAINT `stockard_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `stockard_ibfk_2` FOREIGN KEY (`goods_received_id`) REFERENCES `goods_received` (`goods_received_id`),
  CONSTRAINT `stockard_ibfk_3` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supplier_id` bigint(30) NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(30) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
