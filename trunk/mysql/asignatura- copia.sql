
/*CREATE DATABASE /*!32312 IF NOT EXISTS*/`asignaturas` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `asignaturas`;

/*Table structure for table `asignaturas` */

CREATE TABLE `asignaturas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `peso` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
