
USE `horarios`;

/*Table structure for table `asignaturas` */

CREATE TABLE `asignaturas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCarrera` int(11) NOT NULL,
  `Anio` int(11) NOT NULL,
  `IdAsignatura` int(11) NOT NULL,
  `Modulos` int(11) NOT NULL,
  `Asignados` int(11) NOT NULL,
  `IdDocente` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
