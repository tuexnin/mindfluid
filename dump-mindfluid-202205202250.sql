-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: mindfluid
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.20-MariaDB

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `idtipo` int(11) NOT NULL,
  PRIMARY KEY (`idcategoria`),
  KEY `fk_categoria_tipo` (`idtipo`),
  CONSTRAINT `fk_categoria_tipo` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'engranajes',1),(2,'sentrifugados',2);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'cliente 1','1646709190.jpg','2022-03-07','1'),(2,'virgo','1647995084.png','2022-03-22','1');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion` (
  `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `wsp` varchar(250) DEFAULT NULL,
  `fb` varchar(250) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `linken` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `correorespuesta` varchar(250) DEFAULT NULL,
  `acerca` varchar(45) DEFAULT NULL,
  `catalogo` varchar(100) NOT NULL,
  `mapa` text NOT NULL,
  PRIMARY KEY (`idconfiguracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactenos`
--

DROP TABLE IF EXISTS `contactenos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactenos` (
  `idcontactenos` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(250) NOT NULL,
  `persona` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `asunto` varchar(250) NOT NULL,
  `mensaje` text NOT NULL,
  PRIMARY KEY (`idcontactenos`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactenos`
--

LOCK TABLES `contactenos` WRITE;
/*!40000 ALTER TABLE `contactenos` DISABLE KEYS */;
INSERT INTO `contactenos` VALUES (1,'','edwin carranza','carranza@gmail.com','123456789','','esto es una prueba'),(2,'','jose','jose@gamail.com','123456789','cotizacion','esto tambien es una prueba pero con nombre de producto'),(3,'','luis','carranza@gmail.com','123456789','no lo se','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia ullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus neque. Fusce egestas tellus sit amet nulla feugiat, nec vestibulum odio egestas. Nullam maximus diam sed lacus maximus tincidunt. Suspendisse pellentesque metus lobortis justo varius lacinia. Praesent sed porttitor ex. Nunc iaculis elit id turpis tempor, a vehicula purus egestas. Mauris sit amet dolor et massa hendrerit lobortis. Aliquam hendrerit feugiat nunc, non suscipit nibh commodo id. Proin elementum ex sit amet urna euismod, id volutpat nunc mattis. Mauris vel pulvinar nisi. Curabitur ac lorem velit. Donec luctus, urna non pretium euismod, nisi nisi molestie orci, vitae maximus nunc leo vitae nulla. Ut tincidunt massa ut lectus iaculis, eu porta nulla condimentum. Nulla in orci blandit, ultrices dui sed, tempor arcu. '),(4,'galletita','melasco','melasco@gmail.com','123456789','cotizacion','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia ullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus neque. Fusce egestas tellus sit amet nulla feugiat, nec vestibulum odio egestas. Nullam maximus diam sed lacus maximus tincidunt. Suspendisse pellentesque metus lobortis justo varius lacinia. Praesent sed porttitor ex. Nunc iaculis elit id turpis tempor, a vehicula purus egestas. Mauris sit amet dolor et massa hendrerit lobortis. Aliquam hendrerit feugiat nunc, non suscipit nibh commodo id. Proin elementum ex sit amet urna euismod, id volutpat nunc mattis. Mauris vel pulvinar nisi. Curabitur ac lorem velit. Donec luctus, urna non pretium euismod, nisi nisi molestie orci, vitae maximus nunc leo vitae nulla. Ut tincidunt massa ut lectus iaculis, eu porta nulla condimentum. Nulla in orci blandit, ultrices dui sed, tempor arcu. ');
/*!40000 ALTER TABLE `contactenos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenido`
--

DROP TABLE IF EXISTS `contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenido` (
  `idblog` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `portada` varchar(500) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `seo` varchar(200) DEFAULT NULL,
  `contenido` text NOT NULL,
  `fecpublicacion` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idblog`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenido`
--

LOCK TABLES `contenido` WRITE;
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
INSERT INTO `contenido` VALUES (1,'blog','1652990912.png','blog 2132','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eleifend cursus posuere. Donec at odio imperdiet, cursus eros non, consectetur tortor. Sed ultricies ullamcorper mauris sed viverra','<p id=\"lipsum\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src=\"http://localhost/mindfluid/admin/files/editor/90db5d66781a9579.png\" alt=\"\" style=\"width: 100%; max-width: 161px; height: auto; max-height: 181px;\"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eleifend \r\ncursus posuere. Donec at odio imperdiet, cursus eros non, consectetur \r\ntortor. Sed ultricies ullamcorper mauris sed viverra. Sed ultrices \r\niaculis lacus, venenatis ullamcorper velit. Pellentesque quis leo at \r\nnisi sodales vestibulum dignissim nec urna. Etiam ac sodales lacus, \r\nvitae egestas nisl. Quisque id pretium nunc. Curabitur gravida ligula at\r\n felis aliquam, non vestibulum nulla placerat. Phasellus felis dui, \r\nvulputate sed eros nec, laoreet dictum ipsum. Praesent ac magna erat. \r\nProin interdum maximus odio non ornare. Vivamus non rutrum tortor.\r\n</p>\r\n<p>\r\nCurabitur ac mauris lacinia, finibus tortor eget, viverra lacus. \r\nPellentesque lacinia non mi sed egestas. Phasellus suscipit sapien vitae\r\n faucibus cursus. Nullam at aliquet ipsum, eget imperdiet diam. Etiam \r\nnibh dolor, mattis at urna in, suscipit placerat lacus. Nullam at lorem \r\neu nibh tempus laoreet. Aenean egestas mi tempor quam ultrices laoreet. \r\nDonec est nunc, fringilla vel gravida non, pretium eget ex. Nullam in \r\nblandit felis. Pellentesque sit amet dapibus libero. Etiam placerat \r\nefficitur sapien non volutpat. Quisque id ligula massa. Praesent purus \r\nmauris, pretium non vehicula sed, porttitor in elit. Mauris luctus magna\r\n vitae quam interdum fermentum. Cras id diam sed purus semper molestie.\r\n</p>\r\n<p>\r\nMauris in arcu eget odio auctor cursus. Aliquam eu eleifend metus. \r\nAliquam erat volutpat. Donec laoreet porttitor risus blandit posuere. \r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \r\ninceptos himenaeos. Nam semper sem lectus, in vehicula metus vehicula \r\nut. Cras sed neque accumsan sapien bibendum molestie ac non eros. \r\nMaecenas sit amet tristique mi. Pellentesque pharetra metus metus, sed \r\nlaoreet purus vulputate a. Suspendisse vestibulum purus massa, id \r\nfermentum neque sodales ac. Donec eu iaculis quam. Donec non eleifend \r\nquam. Donec laoreet pellentesque dignissim. Quisque scelerisque tortor \r\nultricies, rutrum neque nec, auctor nunc. In porttitor lorem ut lorem \r\ndignissim, sit amet tincidunt est pulvinar. Duis vitae turpis eget massa\r\n vestibulum vehicula.\r\n</p>\r\n<p>\r\nDonec a leo lorem. Phasellus aliquet vitae arcu ac tristique. Vestibulum\r\n posuere id enim in mattis. Integer ac ullamcorper sem, vitae tempor \r\nlectus. Donec imperdiet tincidunt egestas. Maecenas semper diam vel quam\r\n rutrum condimentum. Quisque sed auctor lorem, et imperdiet nisl. Donec \r\ndictum eget nisl non euismod. Vivamus hendrerit lorem vitae metus \r\nelementum, eu semper elit dapibus.\r\n</p>\r\n<p>\r\nNunc in fringilla enim. Sed ut felis quis neque sollicitudin malesuada. \r\nUt viverra porttitor lacus, a pellentesque velit dignissim nec. Integer \r\nmalesuada cursus nunc, quis sagittis lorem rutrum sed. Duis lacinia et \r\narcu at feugiat. Phasellus ullamcorper, nisi non tincidunt dapibus, enim\r\n metus finibus sem, ut convallis ex est ut lacus. Mauris fermentum, \r\nvelit vitae egestas scelerisque, tortor libero fermentum elit, in \r\nrhoncus tortor odio vitae mi. In finibus velit eu tortor rutrum, nec \r\ncongue urna vehicula. Nullam vestibulum, risus at tristique euismod, \r\nurna dolor interdum mi, eget scelerisque neque lectus in nisl. \r\nPellentesque habitant morbi tristique senectus et netus et malesuada \r\nfames ac turpis egestas. Fusce laoreet magna in pretium vulputate.\r\n</p></p>','2022-05-19',0),(2,'blog','1652992117.jpg','blog 03','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eleifend cursus posuere. Donec at odio imperdiet, cursus eros non, consectetur tortor. Sed ultricies ullamcorper mauris sed viverra.','<p id=\"lipsum\">\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eleifend \r\ncursus posuere. Donec at odio imperdiet, cursus eros non, consectetur \r\ntortor. Sed ultricies ullamcorper mauris sed viverra. Sed ultrices \r\niaculis lacus, venenatis ullamcorper velit. Pellentesque quis leo at \r\nnisi sodales vestibulum dignissim nec urna. Etiam ac sodales lacus, \r\nvitae egestas nisl. Quisque id pretium nunc. Curabitur gravida ligula at\r\n felis aliquam, non vestibulum nulla placerat. Phasellus felis dui, \r\nvulputate sed eros nec, laoreet dictum ipsum. Praesent ac magna erat. \r\nProin interdum maximus odio non ornare. Vivamus non rutrum tortor.\r\n</p>\r\n<p>\r\nCurabitur ac mauris lacinia, finibus tortor eget, viverra lacus. \r\nPellentesque lacinia non mi sed egestas. Phasellus suscipit sapien vitae\r\n faucibus cursus. Nullam at aliquet ipsum, eget imperdiet diam. Etiam \r\nnibh dolor, mattis at urna in, suscipit placerat lacus. Nullam at lorem \r\neu nibh tempus laoreet. Aenean egestas mi tempor quam ultrices laoreet. \r\nDonec est nunc, fringilla vel gravida non, pretium eget ex. Nullam in \r\nblandit felis. Pellentesque sit amet dapibus libero. Etiam placerat \r\nefficitur sapien non volutpat. Quisque id ligula massa. Praesent purus \r\nmauris, pretium non vehicula sed, porttitor in elit. Mauris luctus magna\r\n vitae quam interdum fermentum. Cras id diam sed purus semper molestie.\r\n</p>\r\n<p>\r\nMauris in arcu eget odio auctor cursus. Aliquam eu eleifend metus. \r\nAliquam erat volutpat. Donec laoreet porttitor risus blandit posuere. \r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \r\ninceptos himenaeos. Nam semper sem lectus, in vehicula metus vehicula \r\nut. Cras sed neque accumsan sapien bibendum molestie ac non eros. \r\nMaecenas sit amet tristique mi. Pellentesque pharetra metus metus, sed \r\nlaoreet purus vulputate a. Suspendisse vestibulum purus massa, id \r\nfermentum neque sodales ac. Donec eu iaculis quam. Donec non eleifend \r\nquam. Donec laoreet pellentesque dignissim. Quisque scelerisque tortor \r\nultricies, rutrum neque nec, auctor nunc. In porttitor lorem ut lorem \r\ndignissim, sit amet tincidunt est pulvinar. Duis vitae turpis eget massa\r\n vestibulum vehicula.\r\n</p>\r\n<p>\r\nDonec a leo lorem. Phasellus aliquet vitae arcu ac tristique. Vestibulum\r\n posuere id enim in mattis. Integer ac ullamcorper sem, vitae tempor \r\nlectus. Donec imperdiet tincidunt egestas. Maecenas semper diam vel quam\r\n rutrum condimentum. Quisque sed auctor lorem, et imperdiet nisl. Donec \r\ndictum eget nisl non euismod. Vivamus hendrerit lorem vitae metus \r\nelementum, eu semper elit dapibus.\r\n</p>\r\n<p>\r\nNunc in fringilla enim. Sed ut felis quis neque sollicitudin malesuada. \r\nUt viverra porttitor lacus, a pellentesque velit dignissim nec. Integer \r\nmalesuada cursus nunc, quis sagittis lorem rutrum sed. Duis lacinia et \r\narcu at feugiat. Phasellus ullamcorper, nisi non tincidunt dapibus, enim\r\n metus finibus sem, ut convallis ex est ut lacus. Mauris fermentum, \r\nvelit vitae egestas scelerisque, tortor libero fermentum elit, in \r\nrhoncus tortor odio vitae mi. In finibus velit eu tortor rutrum, nec \r\ncongue urna vehicula. Nullam vestibulum, risus at tristique euismod, \r\nurna dolor interdum mi, eget scelerisque neque lectus in nisl. \r\nPellentesque habitant morbi tristique senectus et netus et malesuada \r\nfames ac turpis egestas. Fusce laoreet magna in pretium vulputate.\r\n</p></p>','2022-05-19',0),(3,'blog','1652993717.jpg','blog 04','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia ullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus neque. Fusce egestas tellus sit amet nulla feugiat.','<p id=\"lipsum\">\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia \r\nullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus \r\nneque. Fusce egestas tellus sit amet nulla feugiat, nec vestibulum odio \r\negestas. Nullam maximus diam sed lacus maximus tincidunt. Suspendisse \r\npellentesque metus lobortis justo varius lacinia. Praesent sed porttitor\r\n ex. Nunc iaculis elit id turpis tempor, a vehicula purus egestas. \r\nMauris sit amet dolor et massa hendrerit lobortis. Aliquam hendrerit \r\nfeugiat nunc, non suscipit nibh commodo id. Proin elementum ex sit amet \r\nurna euismod, id volutpat nunc mattis. Mauris vel pulvinar nisi. \r\nCurabitur ac lorem velit. Donec luctus, urna non pretium euismod, nisi \r\nnisi molestie orci, vitae maximus nunc leo vitae nulla. Ut tincidunt \r\nmassa ut lectus iaculis, eu porta nulla condimentum. Nulla in orci \r\nblandit, ultrices dui sed, tempor arcu.\r\n</p>\r\n<p>\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia curae; Nam in mattis tellus. Sed a nisi sagittis, laoreet velit\r\n non, convallis felis. Donec quis pretium purus. Pellentesque mollis \r\nturpis lectus, a tristique tellus hendrerit non. Orci varius natoque \r\npenatibus et magnis dis parturient montes, nascetur ridiculus mus. \r\nPraesent at ultricies eros. Etiam est tortor, malesuada in lacus vitae, \r\nsemper facilisis lacus. Mauris facilisis nisi erat, eu placerat nisl \r\nvarius nec. Praesent id egestas metus, sit amet blandit nulla. Integer \r\nvel nulla convallis sem lobortis convallis a vel erat. Nam mattis dolor \r\nid efficitur pulvinar. Nulla non congue ex.\r\n</p>\r\n<p>\r\nVivamus vel erat sed urna rhoncus euismod. Ut non tellus quis arcu \r\nauctor varius. Pellentesque habitant morbi tristique senectus et netus \r\net malesuada fames ac turpis egestas. Curabitur mollis sit amet eros \r\niaculis iaculis. Quisque in eros dolor. Phasellus lacinia, tortor eget \r\nhendrerit iaculis, sem sem elementum ex, vel vulputate enim orci nec \r\nlibero. Suspendisse eleifend, nulla eget consequat ultricies, diam nulla\r\n rutrum ligula, eu hendrerit magna mauris nec dui. Ut finibus, metus sit\r\n amet iaculis commodo, ipsum orci placerat augue, eu posuere felis \r\nmauris eget nibh.\r\n</p>\r\n<p>\r\nDonec mauris massa, congue at condimentum ac, semper eu purus. Aenean \r\nligula orci, accumsan et neque sodales, mattis aliquam mi. Fusce \r\nscelerisque dui felis. Duis imperdiet fermentum tincidunt. Vivamus vitae\r\n volutpat lectus. Suspendisse facilisis, libero at congue maximus, dolor\r\n elit ullamcorper ex, in pretium quam nisi vitae eros. Praesent sed nunc\r\n aliquet nibh ultricies fringilla. Cras et ultricies nulla. Class aptent\r\n taciti sociosqu ad litora torquent per conubia nostra, per inceptos \r\nhimenaeos. Phasellus est arcu, congue vitae laoreet ut, imperdiet nec \r\nlectus. Orci varius natoque penatibus et magnis dis parturient montes, \r\nnascetur ridiculus mus.\r\n</p>\r\n<p>\r\nMorbi auctor mi nulla, ullamcorper hendrerit nisl finibus nec. Etiam \r\neget pharetra metus, ut sagittis diam. Fusce ultrices malesuada iaculis.\r\n Duis vitae bibendum purus. Curabitur condimentum gravida diam, non \r\nporta est molestie a. Aenean feugiat convallis mi quis ultrices. Ut \r\nvestibulum in velit a vehicula. Vivamus at rhoncus erat. Integer nec \r\nnisi dictum tellus sagittis auctor nec at metus.\r\n</p></p>','2022-05-19',0),(4,'blog','1652993805.jpg','blog 05','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia ullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus neque. Fusce egestas tellus sit amet nulla feugiat, nec vestib','<p id=\"lipsum\">\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia \r\nullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus \r\nneque. Fusce egestas tellus sit amet nulla feugiat, nec vestibulum odio \r\negestas. Nullam maximus diam sed lacus maximus tincidunt. Suspendisse \r\npellentesque metus lobortis justo varius lacinia. Praesent sed porttitor\r\n ex. Nunc iaculis elit id turpis tempor, a vehicula purus egestas. \r\nMauris sit amet dolor et massa hendrerit lobortis. Aliquam hendrerit \r\nfeugiat nunc, non suscipit nibh commodo id. Proin elementum ex sit amet \r\nurna euismod, id volutpat nunc mattis. Mauris vel pulvinar nisi. \r\nCurabitur ac lorem velit. Donec luctus, urna non pretium euismod, nisi \r\nnisi molestie orci, vitae maximus nunc leo vitae nulla. Ut tincidunt \r\nmassa ut lectus iaculis, eu porta nulla condimentum. Nulla in orci \r\nblandit, ultrices dui sed, tempor arcu.\r\n</p>\r\n<p>\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia curae; Nam in mattis tellus. Sed a nisi sagittis, laoreet velit\r\n non, convallis felis. Donec quis pretium purus. Pellentesque mollis \r\nturpis lectus, a tristique tellus hendrerit non. Orci varius natoque \r\npenatibus et magnis dis parturient montes, nascetur ridiculus mus. \r\nPraesent at ultricies eros. Etiam est tortor, malesuada in lacus vitae, \r\nsemper facilisis lacus. Mauris facilisis nisi erat, eu placerat nisl \r\nvarius nec. Praesent id egestas metus, sit amet blandit nulla. Integer \r\nvel nulla convallis sem lobortis convallis a vel erat. Nam mattis dolor \r\nid efficitur pulvinar. Nulla non congue ex.\r\n</p>\r\n<p>\r\nVivamus vel erat sed urna rhoncus euismod. Ut non tellus quis arcu \r\nauctor varius. Pellentesque habitant morbi tristique senectus et netus \r\net malesuada fames ac turpis egestas. Curabitur mollis sit amet eros \r\niaculis iaculis. Quisque in eros dolor. Phasellus lacinia, tortor eget \r\nhendrerit iaculis, sem sem elementum ex, vel vulputate enim orci nec \r\nlibero. Suspendisse eleifend, nulla eget consequat ultricies, diam nulla\r\n rutrum ligula, eu hendrerit magna mauris nec dui. Ut finibus, metus sit\r\n amet iaculis commodo, ipsum orci placerat augue, eu posuere felis \r\nmauris eget nibh.\r\n</p>\r\n<p>\r\nDonec mauris massa, congue at condimentum ac, semper eu purus. Aenean \r\nligula orci, accumsan et neque sodales, mattis aliquam mi. Fusce \r\nscelerisque dui felis. Duis imperdiet fermentum tincidunt. Vivamus vitae\r\n volutpat lectus. Suspendisse facilisis, libero at congue maximus, dolor\r\n elit ullamcorper ex, in pretium quam nisi vitae eros. Praesent sed nunc\r\n aliquet nibh ultricies fringilla. Cras et ultricies nulla. Class aptent\r\n taciti sociosqu ad litora torquent per conubia nostra, per inceptos \r\nhimenaeos. Phasellus est arcu, congue vitae laoreet ut, imperdiet nec \r\nlectus. Orci varius natoque penatibus et magnis dis parturient montes, \r\nnascetur ridiculus mus.\r\n</p>\r\n<p>\r\nMorbi auctor mi nulla, ullamcorper hendrerit nisl finibus nec. Etiam \r\neget pharetra metus, ut sagittis diam. Fusce ultrices malesuada iaculis.\r\n Duis vitae bibendum purus. Curabitur condimentum gravida diam, non \r\nporta est molestie a. Aenean feugiat convallis mi quis ultrices. Ut \r\nvestibulum in velit a vehicula. Vivamus at rhoncus erat. Integer nec \r\nnisi dictum tellus sagittis auctor nec at metus.\r\n</p></p>','2022-05-19',0),(5,'blog','1652994062.png','blog 06','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia ullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus neque. Fusce egestas tellus sit amet nulla feugiat, nec vestib','<p id=\"lipsum\">\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia \r\nullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus \r\nneque. Fusce egestas tellus sit amet nulla feugiat, nec vestibulum odio \r\negestas. Nullam maximus diam sed lacus maximus tincidunt. Suspendisse \r\npellentesque metus lobortis justo varius lacinia. Praesent sed porttitor\r\n ex. Nunc iaculis elit id turpis tempor, a vehicula purus egestas. \r\nMauris sit amet dolor et massa hendrerit lobortis. Aliquam hendrerit \r\nfeugiat nunc, non suscipit nibh commodo id. Proin elementum ex sit amet \r\nurna euismod, id volutpat nunc mattis. Mauris vel pulvinar nisi. \r\nCurabitur ac lorem velit. Donec luctus, urna non pretium euismod, nisi \r\nnisi molestie orci, vitae maximus nunc leo vitae nulla. Ut tincidunt \r\nmassa ut lectus iaculis, eu porta nulla condimentum. Nulla in orci \r\nblandit, ultrices dui sed, tempor arcu.\r\n</p>\r\n<p>\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia curae; Nam in mattis tellus. Sed a nisi sagittis, laoreet velit\r\n non, convallis felis. Donec quis pretium purus. Pellentesque mollis \r\nturpis lectus, a tristique tellus hendrerit non. Orci varius natoque \r\npenatibus et magnis dis parturient montes, nascetur ridiculus mus. \r\nPraesent at ultricies eros. Etiam est tortor, malesuada in lacus vitae, \r\nsemper facilisis lacus. Mauris facilisis nisi erat, eu placerat nisl \r\nvarius nec. Praesent id egestas metus, sit amet blandit nulla. Integer \r\nvel nulla convallis sem lobortis convallis a vel erat. Nam mattis dolor \r\nid efficitur pulvinar. Nulla non congue ex.\r\n</p>\r\n<p>\r\nVivamus vel erat sed urna rhoncus euismod. Ut non tellus quis arcu \r\nauctor varius. Pellentesque habitant morbi tristique senectus et netus \r\net malesuada fames ac turpis egestas. Curabitur mollis sit amet eros \r\niaculis iaculis. Quisque in eros dolor. Phasellus lacinia, tortor eget \r\nhendrerit iaculis, sem sem elementum ex, vel vulputate enim orci nec \r\nlibero. Suspendisse eleifend, nulla eget consequat ultricies, diam nulla\r\n rutrum ligula, eu hendrerit magna mauris nec dui. Ut finibus, metus sit\r\n amet iaculis commodo, ipsum orci placerat augue, eu posuere felis \r\nmauris eget nibh.\r\n</p>\r\n<p>\r\nDonec mauris massa, congue at condimentum ac, semper eu purus. Aenean \r\nligula orci, accumsan et neque sodales, mattis aliquam mi. Fusce \r\nscelerisque dui felis. Duis imperdiet fermentum tincidunt. Vivamus vitae\r\n volutpat lectus. Suspendisse facilisis, libero at congue maximus, dolor\r\n elit ullamcorper ex, in pretium quam nisi vitae eros. Praesent sed nunc\r\n aliquet nibh ultricies fringilla. Cras et ultricies nulla. Class aptent\r\n taciti sociosqu ad litora torquent per conubia nostra, per inceptos \r\nhimenaeos. Phasellus est arcu, congue vitae laoreet ut, imperdiet nec \r\nlectus. Orci varius natoque penatibus et magnis dis parturient montes, \r\nnascetur ridiculus mus.\r\n</p>\r\n<p>\r\nMorbi auctor mi nulla, ullamcorper hendrerit nisl finibus nec. Etiam \r\neget pharetra metus, ut sagittis diam. Fusce ultrices malesuada iaculis.\r\n Duis vitae bibendum purus. Curabitur condimentum gravida diam, non \r\nporta est molestie a. Aenean feugiat convallis mi quis ultrices. Ut \r\nvestibulum in velit a vehicula. Vivamus at rhoncus erat. Integer nec \r\nnisi dictum tellus sagittis auctor nec at metus.\r\n</p></p>','2022-05-19',0),(6,'servicio','1652994886.jpeg','servicio 01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia ullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus neque. Fusce egestas tellus sit amet nulla feugiat, nec vestib','<p id=\"lipsum\">\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia \r\nullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus \r\nneque. Fusce egestas tellus sit amet nulla feugiat, nec vestibulum odio \r\negestas. Nullam maximus diam sed lacus maximus tincidunt. Suspendisse \r\npellentesque metus lobortis justo varius lacinia. Praesent sed porttitor\r\n ex. Nunc iaculis elit id turpis tempor, a vehicula purus egestas. \r\nMauris sit amet dolor et massa hendrerit lobortis. Aliquam hendrerit \r\nfeugiat nunc, non suscipit nibh commodo id. Proin elementum ex sit amet \r\nurna euismod, id volutpat nunc mattis. Mauris vel pulvinar nisi. \r\nCurabitur ac lorem velit. Donec luctus, urna non pretium euismod, nisi \r\nnisi molestie orci, vitae maximus nunc leo vitae nulla. Ut tincidunt \r\nmassa ut lectus iaculis, eu porta nulla condimentum. Nulla in orci \r\nblandit, ultrices dui sed, tempor arcu.\r\n</p>\r\n<p>\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia curae; Nam in mattis tellus. Sed a nisi sagittis, laoreet velit\r\n non, convallis felis. Donec quis pretium purus. Pellentesque mollis \r\nturpis lectus, a tristique tellus hendrerit non. Orci varius natoque \r\npenatibus et magnis dis parturient montes, nascetur ridiculus mus. \r\nPraesent at ultricies eros. Etiam est tortor, malesuada in lacus vitae, \r\nsemper facilisis lacus. Mauris facilisis nisi erat, eu placerat nisl \r\nvarius nec. Praesent id egestas metus, sit amet blandit nulla. Integer \r\nvel nulla convallis sem lobortis convallis a vel erat. Nam mattis dolor \r\nid efficitur pulvinar. Nulla non congue ex.\r\n</p>\r\n<p>\r\nVivamus vel erat sed urna rhoncus euismod. Ut non tellus quis arcu \r\nauctor varius. Pellentesque habitant morbi tristique senectus et netus \r\net malesuada fames ac turpis egestas. Curabitur mollis sit amet eros \r\niaculis iaculis. Quisque in eros dolor. Phasellus lacinia, tortor eget \r\nhendrerit iaculis, sem sem elementum ex, vel vulputate enim orci nec \r\nlibero. Suspendisse eleifend, nulla eget consequat ultricies, diam nulla\r\n rutrum ligula, eu hendrerit magna mauris nec dui. Ut finibus, metus sit\r\n amet iaculis commodo, ipsum orci placerat augue, eu posuere felis \r\nmauris eget nibh.\r\n</p>\r\n<p>\r\nDonec mauris massa, congue at condimentum ac, semper eu purus. Aenean \r\nligula orci, accumsan et neque sodales, mattis aliquam mi. Fusce \r\nscelerisque dui felis. Duis imperdiet fermentum tincidunt. Vivamus vitae\r\n volutpat lectus. Suspendisse facilisis, libero at congue maximus, dolor\r\n elit ullamcorper ex, in pretium quam nisi vitae eros. Praesent sed nunc\r\n aliquet nibh ultricies fringilla. Cras et ultricies nulla. Class aptent\r\n taciti sociosqu ad litora torquent per conubia nostra, per inceptos \r\nhimenaeos. Phasellus est arcu, congue vitae laoreet ut, imperdiet nec \r\nlectus. Orci varius natoque penatibus et magnis dis parturient montes, \r\nnascetur ridiculus mus.\r\n</p>\r\n<p>\r\nMorbi auctor mi nulla, ullamcorper hendrerit nisl finibus nec. Etiam \r\neget pharetra metus, ut sagittis diam. Fusce ultrices malesuada iaculis.\r\n Duis vitae bibendum purus. Curabitur condimentum gravida diam, non \r\nporta est molestie a. Aenean feugiat convallis mi quis ultrices. Ut \r\nvestibulum in velit a vehicula. Vivamus at rhoncus erat. Integer nec \r\nnisi dictum tellus sagittis auctor nec at metus.\r\n</p></p>','2022-05-19',0),(7,'servicio','1652994955.jpg','servicio 02','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia ullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus neque. Fusce egestas tellus sit amet nulla feugiat, nec vestib','<p id=\"lipsum\">\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia \r\nullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus \r\nneque. Fusce egestas tellus sit amet nulla feugiat, nec vestibulum odio \r\negestas. Nullam maximus diam sed lacus maximus tincidunt. Suspendisse \r\npellentesque metus lobortis justo varius lacinia. Praesent sed porttitor\r\n ex. Nunc iaculis elit id turpis tempor, a vehicula purus egestas. \r\nMauris sit amet dolor et massa hendrerit lobortis. Aliquam hendrerit \r\nfeugiat nunc, non suscipit nibh commodo id. Proin elementum ex sit amet \r\nurna euismod, id volutpat nunc mattis. Mauris vel pulvinar nisi. \r\nCurabitur ac lorem velit. Donec luctus, urna non pretium euismod, nisi \r\nnisi molestie orci, vitae maximus nunc leo vitae nulla. Ut tincidunt \r\nmassa ut lectus iaculis, eu porta nulla condimentum. Nulla in orci \r\nblandit, ultrices dui sed, tempor arcu.\r\n</p>\r\n<p>\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia curae; Nam in mattis tellus. Sed a nisi sagittis, laoreet velit\r\n non, convallis felis. Donec quis pretium purus. Pellentesque mollis \r\nturpis lectus, a tristique tellus hendrerit non. Orci varius natoque \r\npenatibus et magnis dis parturient montes, nascetur ridiculus mus. \r\nPraesent at ultricies eros. Etiam est tortor, malesuada in lacus vitae, \r\nsemper facilisis lacus. Mauris facilisis nisi erat, eu placerat nisl \r\nvarius nec. Praesent id egestas metus, sit amet blandit nulla. Integer \r\nvel nulla convallis sem lobortis convallis a vel erat. Nam mattis dolor \r\nid efficitur pulvinar. Nulla non congue ex.\r\n</p>\r\n<p>\r\nVivamus vel erat sed urna rhoncus euismod. Ut non tellus quis arcu \r\nauctor varius. Pellentesque habitant morbi tristique senectus et netus \r\net malesuada fames ac turpis egestas. Curabitur mollis sit amet eros \r\niaculis iaculis. Quisque in eros dolor. Phasellus lacinia, tortor eget \r\nhendrerit iaculis, sem sem elementum ex, vel vulputate enim orci nec \r\nlibero. Suspendisse eleifend, nulla eget consequat ultricies, diam nulla\r\n rutrum ligula, eu hendrerit magna mauris nec dui. Ut finibus, metus sit\r\n amet iaculis commodo, ipsum orci placerat augue, eu posuere felis \r\nmauris eget nibh.\r\n</p>\r\n<p>\r\nDonec mauris massa, congue at condimentum ac, semper eu purus. Aenean \r\nligula orci, accumsan et neque sodales, mattis aliquam mi. Fusce \r\nscelerisque dui felis. Duis imperdiet fermentum tincidunt. Vivamus vitae\r\n volutpat lectus. Suspendisse facilisis, libero at congue maximus, dolor\r\n elit ullamcorper ex, in pretium quam nisi vitae eros. Praesent sed nunc\r\n aliquet nibh ultricies fringilla. Cras et ultricies nulla. Class aptent\r\n taciti sociosqu ad litora torquent per conubia nostra, per inceptos \r\nhimenaeos. Phasellus est arcu, congue vitae laoreet ut, imperdiet nec \r\nlectus. Orci varius natoque penatibus et magnis dis parturient montes, \r\nnascetur ridiculus mus.\r\n</p>\r\n<p>\r\nMorbi auctor mi nulla, ullamcorper hendrerit nisl finibus nec. Etiam \r\neget pharetra metus, ut sagittis diam. Fusce ultrices malesuada iaculis.\r\n Duis vitae bibendum purus. Curabitur condimentum gravida diam, non \r\nporta est molestie a. Aenean feugiat convallis mi quis ultrices. Ut \r\nvestibulum in velit a vehicula. Vivamus at rhoncus erat. Integer nec \r\nnisi dictum tellus sagittis auctor nec at metus.\r\n</p></p>','2022-05-19',0),(8,'soluciones','1652995347.jpg','soluciones 01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia ullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus neque. Fusce egestas tellus sit amet nulla feugiat, nec vestib','<p id=\"lipsum\">\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia \r\nullamcorper augue, a accumsan urna molestie et. Aenean vel faucibus \r\nneque. Fusce egestas tellus sit amet nulla feugiat, nec vestibulum odio \r\negestas. Nullam maximus diam sed lacus maximus tincidunt. Suspendisse \r\npellentesque metus lobortis justo varius lacinia. Praesent sed porttitor\r\n ex. Nunc iaculis elit id turpis tempor, a vehicula purus egestas. \r\nMauris sit amet dolor et massa hendrerit lobortis. Aliquam hendrerit \r\nfeugiat nunc, non suscipit nibh commodo id. Proin elementum ex sit amet \r\nurna euismod, id volutpat nunc mattis. Mauris vel pulvinar nisi. \r\nCurabitur ac lorem velit. Donec luctus, urna non pretium euismod, nisi \r\nnisi molestie orci, vitae maximus nunc leo vitae nulla. Ut tincidunt \r\nmassa ut lectus iaculis, eu porta nulla condimentum. Nulla in orci \r\nblandit, ultrices dui sed, tempor arcu.\r\n</p>\r\n<p>\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia curae; Nam in mattis tellus. Sed a nisi sagittis, laoreet velit\r\n non, convallis felis. Donec quis pretium purus. Pellentesque mollis \r\nturpis lectus, a tristique tellus hendrerit non. Orci varius natoque \r\npenatibus et magnis dis parturient montes, nascetur ridiculus mus. \r\nPraesent at ultricies eros. Etiam est tortor, malesuada in lacus vitae, \r\nsemper facilisis lacus. Mauris facilisis nisi erat, eu placerat nisl \r\nvarius nec. Praesent id egestas metus, sit amet blandit nulla. Integer \r\nvel nulla convallis sem lobortis convallis a vel erat. Nam mattis dolor \r\nid efficitur pulvinar. Nulla non congue ex.\r\n</p>\r\n<p>\r\nVivamus vel erat sed urna rhoncus euismod. Ut non tellus quis arcu \r\nauctor varius. Pellentesque habitant morbi tristique senectus et netus \r\net malesuada fames ac turpis egestas. Curabitur mollis sit amet eros \r\niaculis iaculis. Quisque in eros dolor. Phasellus lacinia, tortor eget \r\nhendrerit iaculis, sem sem elementum ex, vel vulputate enim orci nec \r\nlibero. Suspendisse eleifend, nulla eget consequat ultricies, diam nulla\r\n rutrum ligula, eu hendrerit magna mauris nec dui. Ut finibus, metus sit\r\n amet iaculis commodo, ipsum orci placerat augue, eu posuere felis \r\nmauris eget nibh.\r\n</p>\r\n<p>\r\nDonec mauris massa, congue at condimentum ac, semper eu purus. Aenean \r\nligula orci, accumsan et neque sodales, mattis aliquam mi. Fusce \r\nscelerisque dui felis. Duis imperdiet fermentum tincidunt. Vivamus vitae\r\n volutpat lectus. Suspendisse facilisis, libero at congue maximus, dolor\r\n elit ullamcorper ex, in pretium quam nisi vitae eros. Praesent sed nunc\r\n aliquet nibh ultricies fringilla. Cras et ultricies nulla. Class aptent\r\n taciti sociosqu ad litora torquent per conubia nostra, per inceptos \r\nhimenaeos. Phasellus est arcu, congue vitae laoreet ut, imperdiet nec \r\nlectus. Orci varius natoque penatibus et magnis dis parturient montes, \r\nnascetur ridiculus mus.\r\n</p>\r\n<p>\r\nMorbi auctor mi nulla, ullamcorper hendrerit nisl finibus nec. Etiam \r\neget pharetra metus, ut sagittis diam. Fusce ultrices malesuada iaculis.\r\n Duis vitae bibendum purus. Curabitur condimentum gravida diam, non \r\nporta est molestie a. Aenean feugiat convallis mi quis ultrices. Ut \r\nvestibulum in velit a vehicula. Vivamus at rhoncus erat. Integer nec \r\nnisi dictum tellus sagittis auctor nec at metus.\r\n</p></p>','2022-05-19',0);
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas` (
  `idmarcas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idmarcas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'blacoh','1644877748.jpg','0000-00-00','1'),(2,'tne','1644879493.png','2022-02-14','1'),(3,'nomad','1647994884.png','2022-03-22','1');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idproducto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `resumen` text NOT NULL,
  `descripcion` text NOT NULL,
  `descripcionseo` varchar(200) NOT NULL,
  `preciolista` decimal(10,2) DEFAULT NULL,
  `precioventa` decimal(10,2) DEFAULT NULL,
  `fecpublicacion` date NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idmarcas` int(11) NOT NULL,
  `foto` varchar(500) NOT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_producto_categoria1` (`idcategoria`),
  KEY `fk_producto_marcas1` (`idmarcas`),
  CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_marcas1` FOREIGN KEY (`idmarcas`) REFERENCES `marcas` (`idmarcas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'canon 1','no lo se1','<p style=\"text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>AHI Dioj</strong></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula sem, sagittis non urna ut, tempor placerat urna. Nullam metus arcu, auctor et aliquet nec, gravida a erat. Vivamus ipsum est, laoreet et nibh non, molestie lobortis purus. Nulla porta feugiat tellus, eu faucibus nulla pharetra non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam non libero blandit, aliquet dui nec, porta nisl. In luctus urna eget rutrum imperdiet. Duis vitae ligula placerat, mollis ante a, ultricies dolor. In rutrum, ex sit amet elementum aliquet, dolor ligula facilisis est, ac vulputate purus dui et mi. Maecenas efficitur felis a enim fringilla scelerisque. In eget risus vulputate, sodales massa vitae, vestibulum ligula. Morbi at placerat justo. Quisque lobortis condimentum leo facilisis condimentum.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Ut convallis ullamcorper mauris, et consequat metus commodo et. Integer ultrices dictum magna, ut feugiat risus sodales id. Morbi placerat sapien sed enim pulvinar, a dapibus ligula bibendum. Sed tempor finibus felis, a vestibulum urna. Duis quis ligula id nisi imperdiet condimentum. Curabitur finibus, tortor quis sollicitudin pharetra, ante libero hendrerit turpis, sed malesuada enim augue eget eros. Maecenas feugiat urna vitae mi tempus, non sodales lectus lobortis. Ut a nisl a dolor porta elementum vel eu ante. Nam vulputate eget ex id interdum. Sed urna neque, mollis ut placerat et, fringilla vitae leo. Nulla scelerisque accumsan massa non accumsan. Aenean dapibus at elit quis pharetra. Donec non mattis arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>','tampoco lo se 1',0.00,0.00,'2022-03-06',1,1,'FIRMA1646609321.jpg'),(4,'blacoh','no lo se manito','<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sapien felis, maximus in lobortis a, vehicula sit amet metus. Donec nibh sapien, vestibulum nec ultrices maximus, rutrum in ex. Mauris bibendum, felis sed eleifend dapibus, ipsum elit ornare nunc, nec dignissim risus turpis nec elit. Vestibulum aliquam metus ut ornare tempor. Curabitur rutrum enim in mauris lacinia pretium. Donec sit amet dignissim eros. Fusce sit amet dignissim nisi. Etiam velit neque, venenatis ac velit vitae, venenatis fermentum leo. Pellentesque vitae consequat lacus, in bibendum magna. Nullam vel accumsan eros. Suspendisse potenti. Donec posuere magna arcu, ut vestibulum ipsum commodo vel. Sed posuere tempor iaculis.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Curabitur at vehicula justo. Aliquam elit quam, tincidunt eget pellentesque in, fermentum vitae risus. Proin quis gravida neque, et pellentesque felis. Nunc euismod magna nulla, et viverra arcu pretium eget. Nunc ut sagittis diam, quis vulputate quam. Pellentesque et ligula vestibulum turpis volutpat consequat sit amet eget nulla. Integer ut dignissim neque. Sed volutpat sodales felis nec consectetur. Duis lacinia malesuada metus pretium viverra. Sed eget magna vitae est lobortis tincidunt nec eget nulla.</p>','esta manito es mia',0.00,0.00,'2022-03-06',1,2,'FIRMA1646622496.jpg'),(5,'lol','asfdsafdsadf','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque \r\nlobortis mollis orci, a laoreet nibh eleifend sit amet. Quisque \r\nefficitur elit ut turpis convallis, at ultrices quam euismod. Maecenas \r\nultrices suscipit mi vel vehicula. Ut nec urna tristique orci viverra \r\nrutrum eu ac eros. Donec molestie iaculis elit, in gravida sem lobortis \r\neu. Nunc ut ultricies erat, eget tempus ante. Praesent vehicula id orci \r\nin faucibus. Vivamus nec leo non orci condimentum vehicula vitae ac \r\nturpis. Phasellus porta in arcu quis volutpat. Vestibulum quis fringilla\r\n est. Vivamus ut facilisis urna, eget consectetur ipsum. Sed egestas \r\nmattis odio, eget hendrerit ex iaculis in. Cras eleifend rhoncus augue \r\neu ornare. Phasellus lacinia vulputate pulvinar.\r\n</p>','asfdasdfasdf',0.00,0.00,'2022-03-22',1,3,'jp1647995157.png'),(6,'galletita','fsadfasfdasdf','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque \r\nlobortis mollis orci, a laoreet nibh eleifend sit amet. Quisque \r\nefficitur elit ut turpis convallis, at ultrices quam euismod. Maecenas \r\nultrices suscipit mi vel vehicula. Ut nec urna tristique orci viverra \r\nrutrum eu ac eros. Donec molestie iaculis elit, in gravida sem lobortis \r\neu. Nunc ut ultricies erat, eget tempus ante. Praesent vehicula id orci \r\nin faucibus. Vivamus nec leo non orci condimentum vehicula vitae ac \r\nturpis. Phasellus porta in arcu quis volutpat. Vestibulum quis fringilla\r\n est. Vivamus ut facilisis urna, eget consectetur ipsum. Sed egestas \r\nmattis odio, eget hendrerit ex iaculis in. Cras eleifend rhoncus augue \r\neu ornare. Phasellus lacinia vulputate pulvinar.\r\n</p>','asdfasfdasfdasfd',0.00,0.00,'2022-03-22',1,2,'img41647995461.jpg');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productoimagen`
--

DROP TABLE IF EXISTS `productoimagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productoimagen` (
  `idproductoimagen` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL,
  `idproducto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idproductoimagen`),
  KEY `fk_productoimagen_producto1` (`idproducto`),
  CONSTRAINT `fk_productoimagen_producto1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productoimagen`
--

LOCK TABLES `productoimagen` WRITE;
/*!40000 ALTER TABLE `productoimagen` DISABLE KEYS */;
INSERT INTO `productoimagen` VALUES (1,'FIRMA1646609321.jpg',1),(2,'15-tne1646609321.png',1),(3,'5-blacoh1646609321.jpg',1),(4,'FIRMA1646622496.jpg',4),(5,'15-tne1646622496.png',4),(6,'5-blacoh1646622496.jpg',4),(7,'jp1647995157.png',5),(8,'5-blacoh1647995157.jpg',5),(9,'FIRMA1647995157.jpg',5),(10,'img41647995461.jpg',6),(11,'FIRMA1647995461.jpg',6),(12,'jp1647995461.png',6);
/*!40000 ALTER TABLE `productoimagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) NOT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'bombas'),(2,'sopladores'),(3,'Repuestos'),(4,'kits');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'edwin carranza ramirez','xedwincrx','e10adc3949ba59abbe56e057f20f883e',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'mindfluid'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-20 22:50:21
