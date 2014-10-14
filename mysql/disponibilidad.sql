


USE `horarios`;

/*Table structure for table `horarios` */

CREATE TABLE `Disponibilidad` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `IdDocente` int(10) NOT NULL,
  `IdDia` int(50) NOT NULL,
  `Inicio` time NOT NULL,
  `Fin` time NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
