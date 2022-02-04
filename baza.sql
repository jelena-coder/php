/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 8.0.26 : Database - kolaci
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kolaci` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `kolaci`;

/*Table structure for table `boja` */

DROP TABLE IF EXISTS `boja`;

CREATE TABLE `boje` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

/*Data for the table `boja` */

INSERT  INTO `boje`(`id`,`naziv`) VALUES 
(1,'zuta'),
(2,'bela'),
(3,'roze'),
(4,'narandzasta'),
(5,'plava');

/*Table structure for table `kategorija` */

DROP TABLE IF EXISTS `kategorija`;

CREATE TABLE `kategorija` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

/*Data for the table `kategorija` */

INSERT  INTO `kategorija`(`id`,`naziv`) VALUES 
(1,'torta'),
(4,'kolac'),
(6,'mafin'),
(8,'keks');

/*Table structure for table `proizvod` */

DROP TABLE IF EXISTS `proizvod`;

CREATE TABLE `proizvod` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(40) NOT NULL,
  `cena` DECIMAL(9,2) NOT NULL,
  `opis` VARCHAR(90) NOT NULL,
  `kategorija` BIGINT DEFAULT NULL,
  `boje` BIGINT DEFAULT NULL,
  `slika` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategorija` (`kategorija`),
  KEY `boje` (`boje`),
  CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`kategorija`) REFERENCES `kategorija` (`id`),
  CONSTRAINT `proizvod_ibfk_2` FOREIGN KEY (`boje`) REFERENCES `boje` (`id`)
);

/*Data for the table `proizvod` */

INSERT  INTO `proizvod`(`id`,`naziv`,`cena`,`opis`,`kategorija`,`boje`,`slika`) VALUES 
(5,'Dobos torta',2000,'ukusno',1,1,'./img/kolac.jpg'),
(6,'Cokoladna torta',3000,'slatko',1,1,'./img/torta.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;