/*
MySQL Backup
Source Server Version: 5.6.17
Source Database: agenda
Date: 07/10/2015 17:35:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `detalle_fechas`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_fechas`;
CREATE TABLE `detalle_fechas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(400) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
