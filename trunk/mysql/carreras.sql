
/*CREATE DATABASE /*!32312 IF NOT EXISTS*/`carreras` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `horarios`;

/*Table structure for table `carreras` */

CREATE TABLE `carreras` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Anio`` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
