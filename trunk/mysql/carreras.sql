USE `horarios`;

/*Table structure for table `carreras` */

CREATE TABLE `carreras` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Carrera` varchar(50) NOT NULL,
  `Curso` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
