
CREATE DATABASE /*!32312 IF NOT EXISTS*/`horarios` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `horarios`;

/*Table structure for table `horarios` */

CREATE TABLE `horarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCarrera` int(11) NOT NULL,
  `IdAsignatura` int(11) NOT NULL,
  `IdModulo` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
