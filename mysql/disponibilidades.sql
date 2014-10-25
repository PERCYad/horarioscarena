
USE `horarios`;

/*Table structure for table `horarios` */

CREATE TABLE `disponibilidades` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdDocente` int(11) NOT NULL,
  `IdModulo` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
