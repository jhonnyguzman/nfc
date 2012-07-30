-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.63-0ubuntu0.11.10.1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema nfc
--

CREATE DATABASE IF NOT EXISTS nfc;
USE nfc;

--
-- Definition of table `nfc`.`categorias`
--

DROP TABLE IF EXISTS `nfc`.`categorias`;
CREATE TABLE  `nfc`.`categorias` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`categorias`
--

/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
LOCK TABLES `categorias` WRITE;
INSERT INTO `nfc`.`categorias` VALUES  (1,'Pastas','2012-06-01 02:00:42','2012-06-01 02:00:42'),
 (2,'Regionales','2012-06-01 02:10:05','2012-06-01 02:10:05'),
 (3,'Ensaladas','2012-06-01 02:16:30','2012-06-01 02:16:30'),
 (4,'Carnes','2012-06-01 02:16:45','2012-06-01 02:16:45'),
 (5,'Dulces','2012-06-01 02:16:55','2012-06-01 02:16:55'),
 (6,'Arroces','2012-06-01 02:17:14','2012-06-01 02:17:14'),
 (7,'Guarniciones','2012-06-01 02:17:22','2012-06-01 02:17:22'),
 (8,'Legumbres y cereales','2012-06-01 02:17:43','2012-06-01 02:17:43'),
 (9,'Pescados','2012-06-01 02:17:59','2012-06-01 02:17:59'),
 (10,'Salsas','2012-06-01 02:18:08','2012-06-01 02:18:08'),
 (11,'Sopas y cremas','2012-06-01 02:18:29','2012-06-01 02:18:29'),
 (12,'Verduras','2012-06-01 02:18:36','2012-06-01 02:18:36'),
 (13,'Panes, pizzas y otras masas','2012-06-01 02:18:42','2012-06-01 02:25:17'),
 (14,'Postres','2012-06-01 02:19:00','2012-06-01 02:19:00'),
 (15,'Bebidas y cócteles','2012-06-01 02:19:21','2012-06-01 02:19:21'),
 (16,'Vegetarianas','2012-06-01 02:20:06','2012-06-01 02:20:06'),
 (17,'Setas y hongos','2012-06-01 02:26:28','2012-06-01 02:26:28');
UNLOCK TABLES;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


--
-- Definition of table `nfc`.`grupos_tabgral`
--

DROP TABLE IF EXISTS `nfc`.`grupos_tabgral`;
CREATE TABLE  `nfc`.`grupos_tabgral` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`grupos_tabgral`
--

/*!40000 ALTER TABLE `grupos_tabgral` DISABLE KEYS */;
LOCK TABLES `grupos_tabgral` WRITE;
INSERT INTO `nfc`.`grupos_tabgral` VALUES  (1,'Estados generales','2012-05-31 05:25:36','0000-00-00 00:00:00'),
 (2,'Estados de mesas','2012-06-01 04:28:18','0000-00-00 00:00:00'),
 (3,'Estados de ordenes','2012-06-13 21:57:11','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `grupos_tabgral` ENABLE KEYS */;


--
-- Definition of table `nfc`.`menues`
--

DROP TABLE IF EXISTS `nfc`.`menues`;
CREATE TABLE  `nfc`.`menues` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`menues`
--

/*!40000 ALTER TABLE `menues` DISABLE KEYS */;
LOCK TABLES `menues` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `menues` ENABLE KEYS */;


--
-- Definition of table `nfc`.`mesas`
--

DROP TABLE IF EXISTS `nfc`.`mesas`;
CREATE TABLE  `nfc`.`mesas` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `mesas_tabgral_id` (`estado`),
  CONSTRAINT `mesas_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `tabgral` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`mesas`
--

/*!40000 ALTER TABLE `mesas` DISABLE KEYS */;
LOCK TABLES `mesas` WRITE;
INSERT INTO `nfc`.`mesas` VALUES  (1,3,'Mesa 1','2012-06-01 04:37:24','2012-06-01 04:37:24'),
 (2,3,'Mesa 2','2012-06-01 04:37:35','2012-06-01 04:37:35'),
 (3,3,'Mesa 3','2012-06-01 04:37:42','2012-06-01 04:37:42'),
 (4,3,'Mesa 4','2012-06-01 04:37:48','2012-06-01 04:37:48'),
 (5,3,'Mesa 5','2012-06-01 04:37:54','2012-06-01 04:37:54'),
 (6,3,'Mesa 6','2012-06-01 04:38:01','2012-06-01 04:38:01'),
 (7,3,'Mesa 7','2012-06-01 04:38:12','2012-06-01 04:38:12'),
 (8,3,'Mesa 8','2012-06-01 04:38:43','2012-06-01 04:38:43'),
 (9,3,'Mesa 9','2012-06-01 04:38:51','2012-06-01 04:38:51'),
 (10,3,'Mesa 10','2012-06-01 04:39:23','2012-06-01 05:00:52');
UNLOCK TABLES;
/*!40000 ALTER TABLE `mesas` ENABLE KEYS */;


--
-- Definition of table `nfc`.`opmenu`
--

DROP TABLE IF EXISTS `nfc`.`opmenu`;
CREATE TABLE  `nfc`.`opmenu` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `descripcion` text,
  `precio` float DEFAULT NULL,
  `categorias_id` int(11) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `opmenu_categoria_id` (`categorias_id`),
  CONSTRAINT `opmenu_categoria_id` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`opmenu`
--

/*!40000 ALTER TABLE `opmenu` DISABLE KEYS */;
LOCK TABLES `opmenu` WRITE;
INSERT INTO `nfc`.`opmenu` VALUES  (1,'Sopa de verduras','Contiene zanahorias, choclo, perejil, acelga, esparragos y hongos',49.99,11,'thumb_2q3X0dVIpOiWn1rWe5ypmnOCJ.jpg','2012-06-01 05:01:52','2012-06-22 10:23:28'),
 (2,'Salmon marinado','Contiene salmon, gengibre, salsa de soya, sal y pimienta',55.99,4,'thumb_TlIo4eKgo9G7VxPTssGi6dfRz.jpg','2012-06-01 05:02:51','2012-06-22 09:55:02'),
 (4,'Espagueti a la boloñesa','Contiene tallarines caseros, salsa de tomates, sal pimienta, y carne molida',35.99,4,'thumb_kTXCZD0usbvd4Ih4a8ai3AWg9.jpg','2012-06-02 04:03:40','2012-06-22 09:56:42'),
 (5,'Roast Beef con esparragos','Contiene bife de carne vacuna, cebolla, cebolla de verdeo, esparragos, vinagre, sal, pimienta, y aceite',40,4,'thumb_dcNJquIeqbecgIeeJ2SIULejU.jpg','2012-06-02 04:59:30','2012-06-22 10:01:02'),
 (6,'Pastas con cherrys','Contiene tallarines caseros, tomates cherrys, albaca, y hongos',35,4,'thumb_fo0KUVzaU7cSvOfsIYdChZf8p.jpg','2012-06-02 05:01:12','2012-06-22 10:02:32'),
 (7,'Berenjenas y camarones al wok','Contiene berenjenas, camarones, cebolla, sal, pimienta blanca, oregano',45,4,'thumb_UqLeqLR75EpcXZBua4A8QvUSY.jpg','2012-06-02 05:03:34','2012-06-22 10:04:05'),
 (8,'Familia Feliz','Pollo, ternera, gambas, calabacín, cebolla, champiñón, bambú, setas chinas',12,4,'thumb_urn6GQ29sZ0MaCzBiisjhveA0.jpg','2012-06-14 12:26:43','2012-06-21 11:13:11'),
 (9,'Arrollado de cerdo con guarnicion','Contiene filet de cerdo, huevo, queso parmesano, sal y pimienta\nOpciones de guarnicion arroz amarillo o lentejas',35,4,'thumb_MtjAwT1xGJA876iFk8WZ7U7ot.jpg','2012-06-14 12:27:28','2012-06-22 10:15:12'),
 (10,'Sandwich de pollo y verduras','Contiene bife de pollo, tomates, lechuga, peregil, pan',25,4,'thumb_7UvMoLhmsN86rfknXm0cpo9zZ.jpg','2012-06-14 12:30:47','2012-06-22 10:10:10');
UNLOCK TABLES;
/*!40000 ALTER TABLE `opmenu` ENABLE KEYS */;


--
-- Definition of table `nfc`.`ordenes`
--

DROP TABLE IF EXISTS `nfc`.`ordenes`;
CREATE TABLE  `nfc`.`ordenes` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `opmenu_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `montotal` float DEFAULT NULL,
  `observacion` text,
  `estado` int(11) DEFAULT NULL,
  `mesas_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `ordenes_estados_tabgral_id` (`estado`),
  KEY `ordenes_mesas_id` (`mesas_id`),
  KEY `ordenes_opmenu_id` (`opmenu_id`),
  CONSTRAINT `ordenes_estados_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `tabgral` (`_id`),
  CONSTRAINT `ordenes_mesas_id` FOREIGN KEY (`mesas_id`) REFERENCES `mesas` (`_id`),
  CONSTRAINT `ordenes_opmenu_id` FOREIGN KEY (`opmenu_id`) REFERENCES `opmenu` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`ordenes`
--

/*!40000 ALTER TABLE `ordenes` DISABLE KEYS */;
LOCK TABLES `ordenes` WRITE;
INSERT INTO `nfc`.`ordenes` VALUES  (4,1,4,182,'sin arroz, con tomate y mucho pan. Llevar 2 platos y 30 tenedores.',7,4,'2012-06-13 23:21:40','2012-06-14 15:43:50'),
 (5,1,2,91,'dsd',9,4,'2012-06-13 23:26:50','2012-06-14 15:39:52'),
 (6,1,2,91,'dsd',6,4,'2012-06-13 23:27:14','2012-06-13 23:27:14'),
 (7,1,2,91,'dsd',8,4,'2012-06-13 23:29:43','2012-06-14 15:26:59'),
 (8,1,4,182,'dsd',6,4,'2012-06-13 23:31:31','2012-06-13 23:31:31'),
 (9,1,4,182,'Algo aqui',6,4,'2012-06-13 23:33:40','2012-06-13 23:33:40'),
 (10,1,2,91,'algo aqui',10,4,'2012-06-13 23:45:19','2012-06-14 15:42:05'),
 (11,1,3,136.5,'algo aqui',6,4,'2012-06-13 23:46:32','2012-06-13 23:46:32'),
 (12,1,3,136.5,'algo aqui',6,4,'2012-06-13 23:47:23','2012-06-13 23:47:23'),
 (13,1,5,227.5,'algo aqui',6,4,'2012-06-13 23:47:48','2012-06-13 23:47:48'),
 (14,1,5,227.5,'algo aqui',6,4,'2012-06-13 23:48:20','2012-06-13 23:48:20'),
 (15,1,5,227.5,'algo aqui',6,4,'2012-06-13 23:48:43','2012-06-13 23:48:43'),
 (16,1,5,227.5,'algo aqui',6,4,'2012-06-13 23:49:03','2012-06-13 23:49:03'),
 (17,1,5,227.5,'Algo aqui',6,4,'2012-06-13 23:49:46','2012-06-13 23:49:46'),
 (18,1,3,136.5,'',6,4,'2012-06-13 23:59:50','2012-06-13 23:59:50'),
 (19,2,3,150,'sin cebolla',6,4,'2012-06-14 01:55:20','2012-06-14 01:55:20'),
 (20,5,3,102,'aasas',6,2,'2012-06-14 01:56:54','2012-06-14 01:56:54'),
 (21,1,2,99.98,'Algo',8,4,'2012-06-14 02:11:00','2012-06-28 21:33:47'),
 (22,2,4,223.96,'sdsd',8,4,'2012-06-14 11:49:27','2012-06-28 21:33:42'),
 (23,5,3,120,'dsds',8,4,'2012-06-14 11:50:06','2012-06-28 21:33:36'),
 (24,7,3,135,'wsdsd',8,4,'2012-06-14 12:43:57','2012-06-28 21:33:28'),
 (25,1,3,149.97,'Algo',8,4,'2012-06-14 13:05:42','2012-06-28 21:33:23'),
 (26,9,3,105,'ok',8,4,'2012-06-14 14:48:50','2012-06-28 21:33:17'),
 (27,8,4,48,'algo',8,4,'2012-06-14 14:51:08','2012-06-28 21:33:11'),
 (28,1,3,149.97,'Desde el movil',8,4,'2012-06-14 16:16:32','2012-06-28 21:33:05'),
 (29,2,4,223.96,'Otra prueba desde el movil',8,4,'2012-06-14 16:18:07','2012-06-28 21:32:59'),
 (30,1,2,99.98,'algo',8,4,'2012-06-19 10:53:33','2012-06-28 21:32:54'),
 (31,1,3,149.97,'Desde el movil',8,4,'2012-06-19 11:00:12','2012-06-28 21:32:48'),
 (32,1,2,99.98,'Dedded',8,4,'2012-06-19 13:54:19','2012-06-28 21:32:43'),
 (33,5,1,40,'',8,4,'2012-06-19 19:57:31','2012-06-28 21:32:37'),
 (34,5,4,160,'Sin papas fritas',8,4,'2012-06-20 18:35:59','2012-06-28 21:32:29'),
 (35,9,3,105,'Desde el movil',8,5,'2012-06-20 18:37:05','2012-06-28 21:32:23'),
 (36,9,2,70,'',8,5,'2012-06-20 18:41:51','2012-06-28 21:32:17'),
 (37,2,5,279.95,'',9,4,'2012-06-22 11:41:31','2012-06-28 21:38:39'),
 (38,4,3,107.97,'Sin pimienta',7,8,'2012-06-28 21:29:35','2012-06-28 21:38:17'),
 (39,6,4,140,'Sin albaca',7,7,'2012-06-28 21:30:26','2012-06-28 21:38:23'),
 (40,7,2,90,'Por favor sin oregano',10,6,'2012-06-28 21:31:54','2012-06-28 21:38:31'),
 (41,8,5,60,'Por favor con poca cebolla',6,6,'2012-06-28 21:34:59','2012-06-28 21:34:59'),
 (42,9,1,35,'Con arroz amarillo',6,5,'2012-06-28 21:36:13','2012-06-28 21:36:13'),
 (43,10,2,50,'Sin peregil',6,1,'2012-06-28 21:38:06','2012-06-28 21:38:06'),
 (44,2,2,111.98,'',6,1,'2012-06-28 23:06:25','2012-06-28 23:06:25');
UNLOCK TABLES;
/*!40000 ALTER TABLE `ordenes` ENABLE KEYS */;


--
-- Definition of table `nfc`.`perfiles`
--

DROP TABLE IF EXISTS `nfc`.`perfiles`;
CREATE TABLE  `nfc`.`perfiles` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `perfiles_tabgral_id` (`estado`),
  CONSTRAINT `perfiles_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `tabgral` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`perfiles`
--

/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
LOCK TABLES `perfiles` WRITE;
INSERT INTO `nfc`.`perfiles` VALUES  (1,'Super Administrador',1,'2012-05-31 05:26:40','2012-06-28 21:50:46'),
 (2,'Public',1,'2012-05-31 05:26:56','0000-00-00 00:00:00'),
 (3,'Administrador',1,'2012-06-01 01:16:32','2012-06-28 21:50:53');
UNLOCK TABLES;
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;


--
-- Definition of table `nfc`.`sismenu`
--

DROP TABLE IF EXISTS `nfc`.`sismenu`;
CREATE TABLE  `nfc`.`sismenu` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `parent` int(11) DEFAULT NULL,
  `iconpath` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `sismenu_tabgral_id` (`estado`),
  CONSTRAINT `sismenu_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `tabgral` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`sismenu`
--

/*!40000 ALTER TABLE `sismenu` DISABLE KEYS */;
LOCK TABLES `sismenu` WRITE;
INSERT INTO `nfc`.`sismenu` VALUES  (1,'Administración',1,0,'icon-administracion.png','2012-05-31 05:30:10',NULL),
 (2,'Usuarios',1,1,'icon-user.png','2012-05-31 05:30:10',NULL),
 (3,'Perfiles',1,1,'icon-perfiles.png','2012-05-31 05:30:10',NULL),
 (4,'Permisos',1,1,'icon-permisos.png','2012-05-31 05:30:10',NULL),
 (5,'Restaurante',1,0,'icon-restaurante.png','2012-06-01 01:26:11',NULL),
 (6,'Menúes',1,5,'icon-opmenus.png','2012-06-01 01:26:11',NULL),
 (7,'Categorías',1,5,'icon-categorias.png','2012-06-01 01:26:11',NULL),
 (8,'Ordenes',1,5,'icon-ordenes.png','2012-06-01 01:26:10',NULL),
 (9,'Mesas',1,5,'icon-mesas.png','2012-06-01 04:24:47',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `sismenu` ENABLE KEYS */;


--
-- Definition of table `nfc`.`sisperfil`
--

DROP TABLE IF EXISTS `nfc`.`sisperfil`;
CREATE TABLE  `nfc`.`sisperfil` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_id` int(11) NOT NULL,
  `perfiles_id` int(11) NOT NULL,
  `estado` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `perfiles_id` (`perfiles_id`),
  KEY `sisperfil_sismenu_id` (`sismenu_id`),
  KEY `sisperfil_tabgral_id` (`estado`),
  KEY `tabgral_id` (`estado`),
  CONSTRAINT `perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`_id`),
  CONSTRAINT `sisperfil_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sismenu` (`_id`),
  CONSTRAINT `sisperfil_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `tabgral` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`sisperfil`
--

/*!40000 ALTER TABLE `sisperfil` DISABLE KEYS */;
LOCK TABLES `sisperfil` WRITE;
INSERT INTO `nfc`.`sisperfil` VALUES  (1,1,1,1,'2012-05-31 05:31:38','0000-00-00 00:00:00'),
 (2,2,1,1,'2012-05-31 05:31:38','0000-00-00 00:00:00'),
 (3,3,1,1,'2012-05-31 05:31:38','0000-00-00 00:00:00'),
 (4,4,1,1,'2012-05-31 05:31:38','0000-00-00 00:00:00'),
 (5,5,1,1,'2012-06-01 01:27:10','0000-00-00 00:00:00'),
 (6,6,1,1,'2012-06-01 01:27:10','0000-00-00 00:00:00'),
 (7,7,1,1,'2012-06-01 01:27:10','0000-00-00 00:00:00'),
 (8,8,1,1,'2012-06-01 01:27:10','0000-00-00 00:00:00'),
 (9,9,1,1,'2012-06-01 04:25:34','0000-00-00 00:00:00'),
 (10,5,3,1,'2012-06-28 21:01:50','0000-00-00 00:00:00'),
 (11,6,3,1,'2012-06-28 21:01:50','0000-00-00 00:00:00'),
 (12,7,3,1,'2012-06-28 21:01:50','0000-00-00 00:00:00'),
 (13,8,3,1,'2012-06-28 21:01:50','0000-00-00 00:00:00'),
 (14,9,3,1,'2012-06-28 21:01:50','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sisperfil` ENABLE KEYS */;


--
-- Definition of table `nfc`.`sispermisos`
--

DROP TABLE IF EXISTS `nfc`.`sispermisos`;
CREATE TABLE  `nfc`.`sispermisos` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `tabla` varchar(150) NOT NULL,
  `flag_read` int(11) DEFAULT '1',
  `flag_insert` int(11) DEFAULT '0',
  `flag_update` int(11) DEFAULT '0',
  `flag_delete` int(11) DEFAULT '0',
  `perfiles_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `perfiles_id` (`perfiles_id`),
  KEY `sispermisos_perfiles_id` (`perfiles_id`),
  CONSTRAINT `sispermisos_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`sispermisos`
--

/*!40000 ALTER TABLE `sispermisos` DISABLE KEYS */;
LOCK TABLES `sispermisos` WRITE;
INSERT INTO `nfc`.`sispermisos` VALUES  (1,'usuarios',1,1,1,1,1,'2012-05-31 05:54:26','0000-00-00 00:00:00'),
 (2,'perfiles',1,1,1,1,1,'2012-06-01 01:01:03','0000-00-00 00:00:00'),
 (3,'categorias',1,1,1,1,1,'2012-06-01 01:57:25','0000-00-00 00:00:00'),
 (4,'opmenu',1,1,1,1,1,'2012-06-01 02:36:45','0000-00-00 00:00:00'),
 (5,'mesas',1,1,1,1,1,'2012-06-01 04:25:21','0000-00-00 00:00:00'),
 (6,'ordenes',1,1,1,1,1,'2012-06-14 01:57:56','0000-00-00 00:00:00'),
 (7,'categorias',1,1,1,1,3,'2012-06-28 21:02:47','0000-00-00 00:00:00'),
 (8,'opmenu',1,1,1,1,3,'2012-06-28 21:02:47','0000-00-00 00:00:00'),
 (9,'mesas',1,1,1,1,3,'2012-06-28 21:02:47','0000-00-00 00:00:00'),
 (10,'ordenes',1,1,1,1,3,'2012-06-28 21:02:47','0000-00-00 00:00:00'),
 (11,'usuarios',1,1,1,1,3,'2012-06-28 21:06:30','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sispermisos` ENABLE KEYS */;


--
-- Definition of table `nfc`.`sisvinculos`
--

DROP TABLE IF EXISTS `nfc`.`sisvinculos`;
CREATE TABLE  `nfc`.`sisvinculos` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_id` int(11) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `sismenu_id` (`sismenu_id`),
  KEY `sisvinculos_sismenu_id` (`sismenu_id`),
  CONSTRAINT `sisvinculos_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sismenu` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`sisvinculos`
--

/*!40000 ALTER TABLE `sisvinculos` DISABLE KEYS */;
LOCK TABLES `sisvinculos` WRITE;
INSERT INTO `nfc`.`sisvinculos` VALUES  (1,1,'#','2012-05-31 05:31:04','0000-00-00 00:00:00'),
 (2,2,'usuarios_controller/index','2012-05-31 05:31:04','0000-00-00 00:00:00'),
 (3,3,'perfiles_controller/index','2012-05-31 05:31:04','0000-00-00 00:00:00'),
 (4,4,'#','2012-05-31 05:31:04','0000-00-00 00:00:00'),
 (5,5,'#','2012-06-01 01:26:44','0000-00-00 00:00:00'),
 (6,6,'opmenu_controller/index','2012-06-01 01:26:44','0000-00-00 00:00:00'),
 (7,7,'categorias_controller/index','2012-06-01 01:26:44','0000-00-00 00:00:00'),
 (8,8,'ordenes_controller/index','2012-06-01 01:26:44','0000-00-00 00:00:00'),
 (9,9,'mesas_controller/index','2012-06-01 04:25:04','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sisvinculos` ENABLE KEYS */;


--
-- Definition of table `nfc`.`tabgral`
--

DROP TABLE IF EXISTS `nfc`.`tabgral`;
CREATE TABLE  `nfc`.`tabgral` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `grupos_tabgral_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `grupos_tabgral_id` (`grupos_tabgral_id`),
  CONSTRAINT `grupos_tabgral_id` FOREIGN KEY (`grupos_tabgral_id`) REFERENCES `grupos_tabgral` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`tabgral`
--

/*!40000 ALTER TABLE `tabgral` DISABLE KEYS */;
LOCK TABLES `tabgral` WRITE;
INSERT INTO `nfc`.`tabgral` VALUES  (1,'Activo',1,'2012-05-31 05:26:27','0000-00-00 00:00:00'),
 (2,'No Activo',1,'2012-05-31 05:26:27','0000-00-00 00:00:00'),
 (3,'Libre',2,'2012-06-01 04:29:17','0000-00-00 00:00:00'),
 (4,'Ocupada',2,'2012-06-01 04:29:18','0000-00-00 00:00:00'),
 (5,'Fuera de servicio',2,'2012-06-01 04:29:17','0000-00-00 00:00:00'),
 (6,'Pendiente',3,'2012-06-13 21:58:19','0000-00-00 00:00:00'),
 (7,'Procesando...',3,'2012-06-13 21:58:19','0000-00-00 00:00:00'),
 (8,'Entregada',3,'2012-06-13 21:58:19','0000-00-00 00:00:00'),
 (9,'Cancelada',3,'2012-06-13 21:58:19','0000-00-00 00:00:00'),
 (10,'Demorada',3,'2012-06-14 15:41:23','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tabgral` ENABLE KEYS */;


--
-- Definition of table `nfc`.`usuarios`
--

DROP TABLE IF EXISTS `nfc`.`usuarios`;
CREATE TABLE  `nfc`.`usuarios` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `legajo` int(11) DEFAULT NULL,
  `perfiles_id` int(11) NOT NULL,
  `activationcode` varchar(150) DEFAULT NULL,
  `tokenforgotpasswd` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `perfiles_id` (`telefono`),
  KEY `perfiles_id_usuarios` (`perfiles_id`),
  KEY `tabgral_id` (`direccion`),
  KEY `usuarios_estado` (`estado`),
  KEY `usuarios_perfiles_id` (`perfiles_id`),
  CONSTRAINT `usuarios_estado` FOREIGN KEY (`estado`) REFERENCES `tabgral` (`_id`),
  CONSTRAINT `usuarios_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfc`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
LOCK TABLES `usuarios` WRITE;
INSERT INTO `nfc`.`usuarios` VALUES  (6,'super','21232f297a57a5a743894a0e4a801fc3','admiin','admin','admin@gmail.com',NULL,NULL,1,NULL,1,NULL,NULL,'2012-05-31 23:53:41','2012-05-31 23:53:41'),
 (9,'celeste','e138262cdff78ec6b6db6a3183fc28f4','Celeste','Ponce','celemochi@gmail.com',NULL,NULL,1,NULL,3,NULL,NULL,'2012-06-01 00:19:31','2012-06-28 21:04:57'),
 (10,'john','527bd5b5d689e2c32ae974c6229ff785','Johnny','Guzman','guzmanjhonny@gmail.com',NULL,NULL,1,NULL,3,NULL,NULL,'2012-06-28 21:04:46','2012-06-28 21:05:53');
UNLOCK TABLES;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
