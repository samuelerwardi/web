/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.25-MariaDB : Database - p_hrcn
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `ip_address` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET latin1 NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values ('2e56ec0fa802016500eb8f3c695f67c7','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1509443591,'a:11:{s:9:\"user_data\";s:0:\"\";s:9:\"user_name\";s:5:\"admin\";s:4:\"name\";s:13:\"administrator\";s:11:\"employee_id\";s:1:\"1\";s:17:\"employee_login_id\";s:1:\"1\";s:8:\"loggedin\";b:1;s:9:\"user_type\";s:1:\"1\";s:8:\"user_pic\";s:0:\"\";s:3:\"url\";s:15:\"admin/dashboard\";s:14:\"menu_active_id\";a:3:{i:0;s:2:\"14\";i:1;s:1:\"7\";i:2;s:1:\"0\";}s:13:\"business_info\";O:8:\"stdClass\":8:{s:19:\"business_profile_id\";s:1:\"1\";s:12:\"company_name\";s:6:\"CV FTX\";s:4:\"logo\";N;s:9:\"full_path\";N;s:5:\"email\";s:14:\"info@ftx.co.id\";s:7:\"address\";s:9:\"Cibaduyut\";s:5:\"phone\";s:0:\"\";s:8:\"currency\";s:2:\"Rp\";}}'),('3e04c960ef57390ab0a351fd63a4f8d5','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1509504753,'a:11:{s:9:\"user_data\";s:0:\"\";s:9:\"user_name\";s:5:\"admin\";s:4:\"name\";s:13:\"administrator\";s:11:\"employee_id\";s:1:\"1\";s:17:\"employee_login_id\";s:1:\"1\";s:8:\"loggedin\";b:1;s:9:\"user_type\";s:1:\"1\";s:8:\"user_pic\";s:0:\"\";s:3:\"url\";s:15:\"admin/dashboard\";s:14:\"menu_active_id\";a:3:{i:0;s:2:\"14\";i:1;s:1:\"7\";i:2;s:1:\"0\";}s:13:\"business_info\";O:8:\"stdClass\":8:{s:19:\"business_profile_id\";s:1:\"1\";s:12:\"company_name\";s:6:\"CV FTX\";s:4:\"logo\";N;s:9:\"full_path\";N;s:5:\"email\";s:14:\"info@ftx.co.id\";s:7:\"address\";s:9:\"Cibaduyut\";s:5:\"phone\";s:0:\"\";s:8:\"currency\";s:2:\"Rp\";}}');

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `idCountry` int(5) NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idCountry`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

/*Data for the table `countries` */

insert  into `countries`(`idCountry`,`countryCode`,`countryName`) values (1,'AD','Andorra'),(2,'AE','United Arab Emirates'),(3,'AF','Afghanistan'),(4,'AG','Antigua and Barbuda'),(5,'AI','Anguilla'),(6,'AL','Albania'),(7,'AM','Armenia'),(8,'AO','Angola'),(9,'AQ','Antarctica'),(10,'AR','Argentina'),(11,'AS','American Samoa'),(12,'AT','Austria'),(13,'AU','Australia'),(14,'AW','Aruba'),(15,'AX','Ã…land'),(16,'AZ','Azerbaijan'),(17,'BA','Bosnia and Herzegovina'),(18,'BB','Barbados'),(19,'BD','Bangladesh'),(20,'BE','Belgium'),(21,'BF','Burkina Faso'),(22,'BG','Bulgaria'),(23,'BH','Bahrain'),(24,'BI','Burundi'),(25,'BJ','Benin'),(26,'BL','Saint BarthÃ©lemy'),(27,'BM','Bermuda'),(28,'BN','Brunei'),(29,'BO','Bolivia'),(30,'BQ','Bonaire'),(31,'BR','Brazil'),(32,'BS','Bahamas'),(33,'BT','Bhutan'),(34,'BV','Bouvet Island'),(35,'BW','Botswana'),(36,'BY','Belarus'),(37,'BZ','Belize'),(38,'CA','Canada'),(39,'CC','Cocos [Keeling] Islands'),(40,'CD','Democratic Republic of the Congo'),(41,'CF','Central African Republic'),(42,'CG','Republic of the Congo'),(43,'CH','Switzerland'),(44,'CI','Ivory Coast'),(45,'CK','Cook Islands'),(46,'CL','Chile'),(47,'CM','Cameroon'),(48,'CN','China'),(49,'CO','Colombia'),(50,'CR','Costa Rica'),(51,'CU','Cuba'),(52,'CV','Cape Verde'),(53,'CW','Curacao'),(54,'CX','Christmas Island'),(55,'CY','Cyprus'),(56,'CZ','Czech Republic'),(57,'DE','Germany'),(58,'DJ','Djibouti'),(59,'DK','Denmark'),(60,'DM','Dominica'),(61,'DO','Dominican Republic'),(62,'DZ','Algeria'),(63,'EC','Ecuador'),(64,'EE','Estonia'),(65,'EG','Egypt'),(66,'EH','Western Sahara'),(67,'ER','Eritrea'),(68,'ES','Spain'),(69,'ET','Ethiopia'),(70,'FI','Finland'),(71,'FJ','Fiji'),(72,'FK','Falkland Islands'),(73,'FM','Micronesia'),(74,'FO','Faroe Islands'),(75,'FR','France'),(76,'GA','Gabon'),(77,'GB','United Kingdom'),(78,'GD','Grenada'),(79,'GE','Georgia'),(80,'GF','French Guiana'),(81,'GG','Guernsey'),(82,'GH','Ghana'),(83,'GI','Gibraltar'),(84,'GL','Greenland'),(85,'GM','Gambia'),(86,'GN','Guinea'),(87,'GP','Guadeloupe'),(88,'GQ','Equatorial Guinea'),(89,'GR','Greece'),(90,'GS','South Georgia and the South Sandwich Islands'),(91,'GT','Guatemala'),(92,'GU','Guam'),(93,'GW','Guinea-Bissau'),(94,'GY','Guyana'),(95,'HK','Hong Kong'),(96,'HM','Heard Island and McDonald Islands'),(97,'HN','Honduras'),(98,'HR','Croatia'),(99,'HT','Haiti'),(100,'HU','Hungary'),(101,'ID','Indonesia'),(102,'IE','Ireland'),(103,'IL','Israel'),(104,'IM','Isle of Man'),(105,'IN','India'),(106,'IO','British Indian Ocean Territory'),(107,'IQ','Iraq'),(108,'IR','Iran'),(109,'IS','Iceland'),(110,'IT','Italy'),(111,'JE','Jersey'),(112,'JM','Jamaica'),(113,'JO','Jordan'),(114,'JP','Japan'),(115,'KE','Kenya'),(116,'KG','Kyrgyzstan'),(117,'KH','Cambodia'),(118,'KI','Kiribati'),(119,'KM','Comoros'),(120,'KN','Saint Kitts and Nevis'),(121,'KP','North Korea'),(122,'KR','South Korea'),(123,'KW','Kuwait'),(124,'KY','Cayman Islands'),(125,'KZ','Kazakhstan'),(126,'LA','Laos'),(127,'LB','Lebanon'),(128,'LC','Saint Lucia'),(129,'LI','Liechtenstein'),(130,'LK','Sri Lanka'),(131,'LR','Liberia'),(132,'LS','Lesotho'),(133,'LT','Lithuania'),(134,'LU','Luxembourg'),(135,'LV','Latvia'),(136,'LY','Libya'),(137,'MA','Morocco'),(138,'MC','Monaco'),(139,'MD','Moldova'),(140,'ME','Montenegro'),(141,'MF','Saint Martin'),(142,'MG','Madagascar'),(143,'MH','Marshall Islands'),(144,'MK','Macedonia'),(145,'ML','Mali'),(146,'MM','Myanmar [Burma]'),(147,'MN','Mongolia'),(148,'MO','Macao'),(149,'MP','Northern Mariana Islands'),(150,'MQ','Martinique'),(151,'MR','Mauritania'),(152,'MS','Montserrat'),(153,'MT','Malta'),(154,'MU','Mauritius'),(155,'MV','Maldives'),(156,'MW','Malawi'),(157,'MX','Mexico'),(158,'MY','Malaysia'),(159,'MZ','Mozambique'),(160,'NA','Namibia'),(161,'NC','New Caledonia'),(162,'NE','Niger'),(163,'NF','Norfolk Island'),(164,'NG','Nigeria'),(165,'NI','Nicaragua'),(166,'NL','Netherlands'),(167,'NO','Norway'),(168,'NP','Nepal'),(169,'NR','Nauru'),(170,'NU','Niue'),(171,'NZ','New Zealand'),(172,'OM','Oman'),(173,'PA','Panama'),(174,'PE','Peru'),(175,'PF','French Polynesia'),(176,'PG','Papua New Guinea'),(177,'PH','Philippines'),(178,'PK','Pakistan'),(179,'PL','Poland'),(180,'PM','Saint Pierre and Miquelon'),(181,'PN','Pitcairn Islands'),(182,'PR','Puerto Rico'),(183,'PS','Palestine'),(184,'PT','Portugal'),(185,'PW','Palau'),(186,'PY','Paraguay'),(187,'QA','Qatar'),(188,'RE','RÃ©union'),(189,'RO','Romania'),(190,'RS','Serbia'),(191,'RU','Russia'),(192,'RW','Rwanda'),(193,'SA','Saudi Arabia'),(194,'SB','Solomon Islands'),(195,'SC','Seychelles'),(196,'SD','Sudan'),(197,'SE','Sweden'),(198,'SG','Singapore'),(199,'SH','Saint Helena'),(200,'SI','Slovenia'),(201,'SJ','Svalbard and Jan Mayen'),(202,'SK','Slovakia'),(203,'SL','Sierra Leone'),(204,'SM','San Marino'),(205,'SN','Senegal'),(206,'SO','Somalia'),(207,'SR','Suriname'),(208,'SS','South Sudan'),(209,'ST','SÃ£o TomÃ© and PrÃ­ncipe'),(210,'SV','El Salvador'),(211,'SX','Sint Maarten'),(212,'SY','Syria'),(213,'SZ','Swaziland'),(214,'TC','Turks and Caicos Islands'),(215,'TD','Chad'),(216,'TF','French Southern Territories'),(217,'TG','Togo'),(218,'TH','Thailand'),(219,'TJ','Tajikistan'),(220,'TK','Tokelau'),(221,'TL','East Timor'),(222,'TM','Turkmenistan'),(223,'TN','Tunisia'),(224,'TO','Tonga'),(225,'TR','Turkey'),(226,'TT','Trinidad and Tobago'),(227,'TV','Tuvalu'),(228,'TW','Taiwan'),(229,'TZ','Tanzania'),(230,'UA','Ukraine'),(231,'UG','Uganda'),(232,'UM','U.S. Minor Outlying Islands'),(233,'US','United States'),(234,'UY','Uruguay'),(235,'UZ','Uzbekistan'),(236,'VA','Vatican City'),(237,'VC','Saint Vincent and the Grenadines'),(238,'VE','Venezuela'),(239,'VG','British Virgin Islands'),(240,'VI','U.S. Virgin Islands'),(241,'VN','Vietnam'),(242,'VU','Vanuatu'),(243,'WF','Wallis and Futuna'),(244,'WS','Samoa'),(245,'XK','Kosovo'),(246,'YE','Yemen'),(247,'YT','Mayotte'),(248,'ZA','South Africa'),(249,'ZM','Zambia'),(250,'ZW','Zimbabwe');

/*Table structure for table `installer` */

DROP TABLE IF EXISTS `installer`;

CREATE TABLE `installer` (
  `id` int(1) NOT NULL,
  `installer_flag` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `installer` */

insert  into `installer`(`id`,`installer_flag`) values (1,1);

/*Table structure for table `keu_saldo` */

DROP TABLE IF EXISTS `keu_saldo`;

CREATE TABLE `keu_saldo` (
  `idsaldo` int(11) NOT NULL AUTO_INCREMENT,
  `idvarout` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `saldo` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `tp` int(1) NOT NULL DEFAULT '0' COMMENT '0 = in, 1 = out',
  PRIMARY KEY (`idsaldo`),
  KEY `idsaldo` (`idsaldo`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `keu_saldo` */

insert  into `keu_saldo`(`idsaldo`,`idvarout`,`waktu`,`saldo`,`title`,`desc`,`tp`) values (1,0,'2017-10-03 15:38:35','2000000','sim','Pencatatan SIM',0),(2,2,'2017-10-06 08:48:13','200000','1-KNI002B','Pembelanjaan KNI002B, dengan no tagihan 1',1),(3,2,'2017-10-06 09:10:51','10000','2-KNI002B','Pembelanjaan KNI002B, dengan no tagihan 2',1),(4,2,'2017-10-06 09:10:51','200','2-p001','Pembelanjaan p001, dengan no tagihan 2',1),(5,2,'2017-10-06 09:12:07','2000','3-p001','Pembelanjaan p001, dengan no tagihan 3',1),(6,2,'2017-10-06 09:12:07','10000','3-KNI002B','Pembelanjaan KNI002B, dengan no tagihan 3',1),(7,1,'2017-10-06 09:13:10','300','1001-p001','Penjualan p001, dengan no faktur 1001',0),(8,1,'2017-10-06 09:13:10','20000','1001-KNI002B','Penjualan KNI002B, dengan no faktur 1001',0),(9,1,'2017-10-06 09:13:23','300','1002-p001','Penjualan p001, dengan no faktur 1002',0),(10,1,'2017-10-06 09:13:23','20000','1002-KNI002B','Penjualan KNI002B, dengan no faktur 1002',0),(11,1,'2017-10-06 16:10:23','300','1004-p001','Penjualan p001, dengan no faktur 1004',0),(12,1,'2017-10-06 16:10:23','60000','1004-KNI002B','Penjualan KNI002B, dengan no faktur 1004',0),(13,1,'2017-10-06 16:10:23','20000','1004-KNI002B','Penjualan KNI002B, dengan no faktur 1004',0),(14,1,'2017-10-06 16:10:23','20000','1004-KNI002B','Penjualan KNI002B, dengan no faktur 1004',0),(15,1,'2017-10-06 16:10:23','20000','1004-KNI002B','Penjualan KNI002B, dengan no faktur 1004',0);

/*Table structure for table `keu_varout` */

DROP TABLE IF EXISTS `keu_varout`;

CREATE TABLE `keu_varout` (
  `idvarout` int(11) NOT NULL AUTO_INCREMENT,
  `titlevar` varchar(200) NOT NULL,
  `tpcat` int(1) NOT NULL DEFAULT '0' COMMENT '0 = in, 1 = out',
  PRIMARY KEY (`idvarout`),
  KEY `idvarout` (`idvarout`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `keu_varout` */

insert  into `keu_varout`(`idvarout`,`titlevar`,`tpcat`) values (1,'Penjualan Kasir',0),(2,'Pembelanjaan Stok',1),(3,'Pengeluaran Lain',1),(4,'Penjualan Sampah',0);

/*Table structure for table `tbl_attribute` */

DROP TABLE IF EXISTS `tbl_attribute`;

CREATE TABLE `tbl_attribute` (
  `attribute_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `attribute_name` varchar(100) NOT NULL,
  `attribute_value` text NOT NULL,
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_attribute` */

insert  into `tbl_attribute`(`attribute_id`,`product_id`,`attribute_name`,`attribute_value`) values (1,1,'Biru','54'),(2,1,'Merah','51'),(3,1,'Hitam','51'),(4,1,'Putih','51');

/*Table structure for table `tbl_attribute_set` */

DROP TABLE IF EXISTS `tbl_attribute_set`;

CREATE TABLE `tbl_attribute_set` (
  `attribute_set_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(100) NOT NULL,
  PRIMARY KEY (`attribute_set_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_attribute_set` */

insert  into `tbl_attribute_set`(`attribute_set_id`,`attribute_name`) values (1,'Hitam'),(2,'Merah'),(3,'Putih'),(4,'Biru');

/*Table structure for table `tbl_business_profile` */

DROP TABLE IF EXISTS `tbl_business_profile`;

CREATE TABLE `tbl_business_profile` (
  `business_profile_id` int(2) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `full_path` varchar(150) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  PRIMARY KEY (`business_profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_business_profile` */

insert  into `tbl_business_profile`(`business_profile_id`,`company_name`,`logo`,`full_path`,`email`,`address`,`phone`,`currency`) values (1,'CV FTX',NULL,NULL,'info@ftx.co.id','Cibaduyut','','Rp');

/*Table structure for table `tbl_campaign` */

DROP TABLE IF EXISTS `tbl_campaign`;

CREATE TABLE `tbl_campaign` (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_name` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `email_body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(128) NOT NULL,
  PRIMARY KEY (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_campaign` */

/*Table structure for table `tbl_campaign_result` */

DROP TABLE IF EXISTS `tbl_campaign_result`;

CREATE TABLE `tbl_campaign_result` (
  `campaign_result_id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) NOT NULL,
  `campaign_name` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `send_by` varchar(128) NOT NULL,
  PRIMARY KEY (`campaign_result_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_campaign_result` */

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `category_id` int(5) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`category_id`,`category_name`,`created_datetime`) values (1,'TSHIRT','2017-10-03 15:38:51');

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_code` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `discount` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`customer_id`,`customer_code`,`customer_name`,`email`,`phone`,`address`,`discount`) values (1,0,'Cust1','cust@gmail.com','','','');

/*Table structure for table `tbl_damage_product` */

DROP TABLE IF EXISTS `tbl_damage_product`;

CREATE TABLE `tbl_damage_product` (
  `damage_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_code` int(11) NOT NULL,
  `product_name` varchar(127) NOT NULL,
  `category` varchar(128) NOT NULL,
  `qty` int(5) NOT NULL,
  `note` text NOT NULL,
  `decrease` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0= no; 1= yes',
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`damage_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_damage_product` */

/*Table structure for table `tbl_inventory` */

DROP TABLE IF EXISTS `tbl_inventory`;

CREATE TABLE `tbl_inventory` (
  `inventory_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `notify_quantity` int(5) DEFAULT NULL,
  PRIMARY KEY (`inventory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_inventory` */

insert  into `tbl_inventory`(`inventory_id`,`product_id`,`product_quantity`,`notify_quantity`) values (1,1,100,10),(2,2,10,0);

/*Table structure for table `tbl_inventory_log` */

DROP TABLE IF EXISTS `tbl_inventory_log`;

CREATE TABLE `tbl_inventory_log` (
  `opname_id` text,
  `product_id` int(5) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_quantity_opname` int(5) DEFAULT NULL,
  `keterangan_opname` text,
  `created_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_inventory_log` */

insert  into `tbl_inventory_log`(`opname_id`,`product_id`,`product_quantity`,`product_quantity_opname`,`keterangan_opname`,`created_timestamp`) values ('2017-10-31',2,8,10,'retur customer','2017-10-31 11:01:27'),('2017-10-31',1,114,100,'hilang barang','2017-10-31 11:01:27'),('2017-10-30',1,114,100,'hilang barang','2017-10-31 11:01:27'),('2017-10-30',1,114,100,'hilang barang','2017-10-31 11:01:27');

/*Table structure for table `tbl_invoice` */

DROP TABLE IF EXISTS `tbl_invoice`;

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(5) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_invoice` */

insert  into `tbl_invoice`(`invoice_id`,`invoice_no`,`order_id`,`invoice_date`) values (1,1001,1,'2017-10-06 14:13:10'),(2,1002,2,'2017-10-06 14:13:23'),(3,1003,4,'2017-10-06 21:10:23');

/*Table structure for table `tbl_localization` */

DROP TABLE IF EXISTS `tbl_localization`;

CREATE TABLE `tbl_localization` (
  `localization_id` int(11) NOT NULL AUTO_INCREMENT,
  `timezone` varchar(100) CHARACTER SET latin1 NOT NULL,
  `country` int(11) NOT NULL,
  `date_format` varchar(50) CHARACTER SET latin1 NOT NULL,
  `currency_format` varchar(50) CHARACTER SET latin1 NOT NULL,
  `language` varchar(100) NOT NULL,
  `currency` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`localization_id`),
  UNIQUE KEY `localization_id` (`localization_id`),
  UNIQUE KEY `localization_id_2` (`localization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_localization` */

insert  into `tbl_localization`(`localization_id`,`timezone`,`country`,`date_format`,`currency_format`,`language`,`currency`) values (1,'Asia/Jakarta',101,'d M yyyy','4','0','Rp');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `parent` int(5) NOT NULL,
  `sort` int(5) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`label`,`link`,`icon`,`parent`,`sort`) values (1,'Dashboard','admin/dashboard','fa fa-dashboard',0,1),(2,'Seting','#','fa fa-cogs',0,15),(3,'Profil Bisnis','admin/settings/business_profile','glyphicon glyphicon-briefcase',2,1),(4,'Kelola Akses','#','entypo-users',0,20),(5,'Daftar Akses','admin/employee/employee_list','fa fa-users',4,1),(6,'Tambah Akses','admin/employee/add_employee','entypo-user-add',4,2),(7,'Produk','#','glyphicon glyphicon-th-large',0,5),(8,'Kategori','#','glyphicon glyphicon-indent-left',7,4),(9,'Kategori Produk','admin/product/category','glyphicon glyphicon-tag',8,1),(10,'Sub Kategori','admin/product/subcategory','glyphicon glyphicon-tags',8,2),(13,'Tambah Produk','admin/product/add_product','glyphicon glyphicon-plus',7,1),(14,'Kelola Produk','admin/product/manage_product','glyphicon glyphicon-th-list',7,2),(17,'Seting Pajak','admin/settings/tax','glyphicon glyphicon-credit-card',2,2),(18,'Kelola Pembelanjaan','#','fa fa-truck',0,3),(19,'Suplayer','#','glyphicon glyphicon-gift',18,1),(20,'Tambah Suplayer','admin/purchase/add_supplier','glyphicon glyphicon-plus',19,1),(21,'Kelola Suplayer','admin/purchase/manage_supplier','glyphicon glyphicon-briefcase',19,2),(22,'Pembelian','#','glyphicon glyphicon-credit-card',18,2),(23,'Form Pembelian','admin/purchase/new_purchase','glyphicon glyphicon-shopping-cart',22,1),(24,'Catatan Pembelian','admin/purchase/purchase_list','glyphicon glyphicon-th-list',22,2),(25,'Pelanggan','#','glyphicon glyphicon-user',0,7),(26,'Tambah Data','admin/customer/add_customer','glyphicon glyphicon-plus',25,1),(27,'Kelola Pelanggan','admin/customer/manage_customer','glyphicon glyphicon-th-list',25,2),(28,'Produk Rusak','admin/product/damage_product','glyphicon glyphicon-trash',7,3),(29,'Barcode Print','admin/product/print_barcode','glyphicon glyphicon-barcode',7,3),(30,'Proses Pesanan','#','glyphicon glyphicon-shopping-cart',0,6),(31,'Form Pesanan','admin/order/new_order','fa fa-cart-plus',30,1),(32,'Mengelola Pesanan','admin/order/manage_order','glyphicon glyphicon-th-list',30,2),(33,'Mengelola Faktur','admin/order/manage_invoice','glyphicon glyphicon-list-alt',30,3),(34,'Laporan','admin/report','glyphicon glyphicon-signal',0,8),(35,'Laporan Penjualan','admin/report/sales_report','fa fa-bar-chart',34,1),(36,'Laporan Pembelanjaan','admin/report/purchase_report','fa fa-line-chart',34,2),(37,'Email Promosi','#','glyphicon glyphicon-send',0,8),(38,'Buat Promosi','admin/campaign/new_campaign','glyphicon glyphicon-envelope',37,1),(39,'Kelola Promosi','admin/campaign/manage_campaign','glyphicon glyphicon-th-list',37,2),(40,'Hasil Promosi','admin/campaign/campaign_result','glyphicon glyphicon-bullhorn',37,3),(41,'Seting Lokasi','admin/settings/localisation','fa fa-globe',2,2),(42,'Laporan Penjualan Keseluruhan','admin/report/sales_summery_report','fa fa-circle-o',34,2),(43,'Laporan Penjualan Per Pelanggan','admin/report/report_by_costumer','fa fa-file-o',34,3),(44,'Keuangan','#','fa fa-pie-chart',0,4),(45,'Kas Awal','admin/report/initial_cash','fa fa-file-o',44,1),(46,'Penjualan Per Kategori','admin/report/omset_cat','fa fa-file-o',34,4),(47,'Catat Pemasukan / Pengeluaran','admin/report/record_expenses','fa fa-file-o',44,2),(48,'Laporan Keuangan','admin/report/finance','fa fa-file-o',34,5);

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `shipping_address` text NOT NULL,
  `sub_total` double NOT NULL,
  `discount` double NOT NULL,
  `discount_amount` double NOT NULL,
  `total_tax` double NOT NULL,
  `grand_total` double NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_ref` varchar(120) NOT NULL,
  `order_status` int(2) NOT NULL DEFAULT '0' COMMENT '0= pending; 1= cancel; 2=confirm',
  `note` text NOT NULL,
  `sales_person` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_order` */

insert  into `tbl_order`(`order_id`,`order_no`,`order_date`,`customer_id`,`customer_name`,`customer_email`,`customer_phone`,`customer_address`,`shipping_address`,`sub_total`,`discount`,`discount_amount`,`total_tax`,`grand_total`,`payment_method`,`payment_ref`,`order_status`,`note`,`sales_person`) values (1,1001,'2017-10-06 14:13:10',0,'walking Client','','','','',20300,0,0,0,20300,'cash','',2,'','administrator'),(2,1002,'2017-10-06 14:13:23',0,'walking Client','','','','',20300,0,0,0,20300,'cash','',2,'','administrator'),(3,1003,'2017-10-06 21:07:09',0,'walking Client','','','','',120300,0,0,0,120300,'cash','',2,'','administrator'),(4,1004,'2017-10-06 21:10:23',0,'walking Client','','','','',120300,0,0,0,120300,'cash','',2,'','administrator');

/*Table structure for table `tbl_order_details` */

DROP TABLE IF EXISTS `tbl_order_details`;

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `idsubcat` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `buying_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `product_tax` double NOT NULL,
  `sub_total` double NOT NULL,
  `price_option` varchar(100) NOT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_order_details` */

insert  into `tbl_order_details`(`order_details_id`,`order_id`,`idsubcat`,`tgl`,`product_code`,`product_name`,`product_quantity`,`buying_price`,`selling_price`,`product_tax`,`sub_total`,`price_option`) values (1,1,1,'2017-10-06 09:13:10','p001','produk a',1,200,300,0,300,'general'),(2,1,1,'2017-10-06 09:13:10','KNI002B','Kaos Basket',1,10000,20000,0,20000,'general'),(3,2,1,'2017-10-06 09:13:23','p001','produk a',1,200,300,0,300,'general'),(4,2,1,'2017-10-06 09:13:23','KNI002B','Kaos Basket',1,10000,20000,0,20000,'general'),(5,4,1,'2017-10-06 16:10:23','p001','produk a',1,200,300,0,300,'general'),(6,4,1,'2017-10-06 16:10:23','KNI002B','Kaos Basket',3,10000,20000,0,60000,'general'),(7,4,1,'2017-10-06 16:10:23','KNI002B','Kaos Basket',1,10000,20000,0,20000,'general'),(8,4,1,'2017-10-06 16:10:23','KNI002B','Kaos Basket',1,10000,20000,0,20000,'general'),(9,4,1,'2017-10-06 16:10:23','KNI002B','Kaos Basket',1,10000,20000,0,20000,'general');

/*Table structure for table `tbl_product` */

DROP TABLE IF EXISTS `tbl_product`;

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_note` text NOT NULL,
  `status` tinyint(2) DEFAULT '1' COMMENT '0=Inactive,1=Active',
  `subcategory_id` int(5) NOT NULL,
  `barcode_path` varchar(300) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `tax_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product` */

insert  into `tbl_product`(`product_id`,`product_code`,`product_name`,`product_note`,`status`,`subcategory_id`,`barcode_path`,`barcode`,`tax_id`) values (1,'KNI002B','Kaos Basket','',1,1,'/var/www/html/p/hrcn/inv/img/barcode/KNI002B.jpg','img/barcode/KNI002B.jpg',1),(2,'p001','produk a','produk a',1,1,'C:\\xampp\\htdocs\\data\\web/img/barcode/p001.jpg','img/barcode/p001.jpg',1);

/*Table structure for table `tbl_product_image` */

DROP TABLE IF EXISTS `tbl_product_image`;

CREATE TABLE `tbl_product_image` (
  `product_image_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`product_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_image` */

/*Table structure for table `tbl_product_price` */

DROP TABLE IF EXISTS `tbl_product_price`;

CREATE TABLE `tbl_product_price` (
  `product_price_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `buying_price` double NOT NULL,
  `selling_price` double NOT NULL,
  PRIMARY KEY (`product_price_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_price` */

insert  into `tbl_product_price`(`product_price_id`,`product_id`,`buying_price`,`selling_price`) values (1,1,10000,20000),(2,2,200,300);

/*Table structure for table `tbl_product_tag` */

DROP TABLE IF EXISTS `tbl_product_tag`;

CREATE TABLE `tbl_product_tag` (
  `product_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  PRIMARY KEY (`product_tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_product_tag` */

insert  into `tbl_product_tag`(`product_tag_id`,`product_id`,`tag`) values (1,2,'');

/*Table structure for table `tbl_purchase` */

DROP TABLE IF EXISTS `tbl_purchase`;

CREATE TABLE `tbl_purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_number` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(128) NOT NULL,
  `grand_total` int(5) NOT NULL,
  `purchase_ref` varchar(128) NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `payment_ref` varchar(128) NOT NULL,
  `purchase_by` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_purchase` */

insert  into `tbl_purchase`(`purchase_id`,`purchase_order_number`,`supplier_id`,`supplier_name`,`grand_total`,`purchase_ref`,`payment_method`,`payment_ref`,`purchase_by`,`datetime`) values (1,101,1,'SISA JAIT',200000,'','cash','','administrator','2017-10-06 13:48:13'),(2,102,1,'SISA JAIT',10200,'','cash','','administrator','2017-10-06 14:10:51'),(3,103,1,'SISA JAIT',12000,'','cash','','administrator','2017-10-06 14:12:07');

/*Table structure for table `tbl_purchase_product` */

DROP TABLE IF EXISTS `tbl_purchase_product`;

CREATE TABLE `tbl_purchase_product` (
  `purchase_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `qty` int(5) NOT NULL,
  `unit_price` int(5) NOT NULL,
  `sub_total` int(5) NOT NULL,
  PRIMARY KEY (`purchase_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_purchase_product` */

insert  into `tbl_purchase_product`(`purchase_product_id`,`purchase_id`,`product_code`,`product_name`,`qty`,`unit_price`,`sub_total`) values (1,1,'KNI002B','Kaos Basket',20,10000,200000),(2,2,'KNI002B','Kaos Basket',1,10000,10000),(3,2,'p001','produk a',1,200,200),(4,3,'p001','produk a',10,200,2000),(5,3,'KNI002B','Kaos Basket',1,10000,10000);

/*Table structure for table `tbl_special_offer` */

DROP TABLE IF EXISTS `tbl_special_offer`;

CREATE TABLE `tbl_special_offer` (
  `special_offer_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `offer_price` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`special_offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_special_offer` */

/*Table structure for table `tbl_subcategory` */

DROP TABLE IF EXISTS `tbl_subcategory`;

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(5) NOT NULL AUTO_INCREMENT,
  `category_id` int(5) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_subcategory` */

insert  into `tbl_subcategory`(`subcategory_id`,`category_id`,`subcategory_name`,`created_datetime`) values (1,1,'Olah Raga','2017-10-03 15:38:57');

/*Table structure for table `tbl_supplier` */

DROP TABLE IF EXISTS `tbl_supplier`;

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_supplier` */

insert  into `tbl_supplier`(`supplier_id`,`company_name`,`supplier_name`,`email`,`phone`,`address`) values (1,'SISA JAIT','Dadang','dadang@dododo.com','088888888888','<p>alamat ajah</p>\n');

/*Table structure for table `tbl_tag` */

DROP TABLE IF EXISTS `tbl_tag`;

CREATE TABLE `tbl_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tag` */

insert  into `tbl_tag`(`tag_id`,`tag`) values (1,'');

/*Table structure for table `tbl_tax` */

DROP TABLE IF EXISTS `tbl_tax`;

CREATE TABLE `tbl_tax` (
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_title` varchar(100) NOT NULL,
  `tax_rate` double NOT NULL,
  `tax_type` int(2) NOT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tax` */

insert  into `tbl_tax`(`tax_id`,`tax_title`,`tax_rate`,`tax_type`) values (1,'Tanpa Pajak',0,1);

/*Table structure for table `tbl_tier_price` */

DROP TABLE IF EXISTS `tbl_tier_price`;

CREATE TABLE `tbl_tier_price` (
  `tier_price_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `tier_price` double NOT NULL,
  `quantity_above` int(5) NOT NULL,
  PRIMARY KEY (`tier_price_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_tier_price` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `filename` varchar(128) NOT NULL,
  `image_path` varchar(128) NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`user_id`,`user_name`,`name`,`email`,`password`,`filename`,`image_path`,`flag`) values (1,'admin','administrator','admin@admin.com','55677fc54be3b674770b697114ce0730300da0f6783202e2d17d7191ba68ec97cab4b61d3470f298d0ca2435111c29b8d5ad63058b725916336fdab9584829f4','','',1);

/*Table structure for table `tbl_user_role` */

DROP TABLE IF EXISTS `tbl_user_role`;

CREATE TABLE `tbl_user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_login_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_user_role` */

insert  into `tbl_user_role`(`user_role_id`,`employee_login_id`,`menu_id`) values (2,1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
