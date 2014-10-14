

USE `horarios`;

/*Table structure for table `horarios` */

CREATE TABLE `Docentes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Apellidos` varchar(50) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Correo` Varchar (50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;