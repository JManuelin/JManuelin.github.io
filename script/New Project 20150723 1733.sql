-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.21


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema db_hostaldc
--

CREATE DATABASE IF NOT EXISTS db_hostaldc;
USE db_hostaldc;

--
-- Temporary table structure for view `v_desc_hab`
--
DROP TABLE IF EXISTS `v_desc_hab`;
DROP VIEW IF EXISTS `v_desc_hab`;
CREATE TABLE `v_desc_hab` (
  `id_habitacion` int(11),
  `numero_hab` int(11),
  `ubigeo_hab` varchar(30),
  `disponibilidad_hab` varchar(45),
  `estado_hab` varchar(45),
  `tipohab` varchar(45),
  `precio` decimal(10,2),
  `img` varchar(100),
  `descripcion` text
);

--
-- Temporary table structure for view `v_empleado_rol`
--
DROP TABLE IF EXISTS `v_empleado_rol`;
DROP VIEW IF EXISTS `v_empleado_rol`;
CREATE TABLE `v_empleado_rol` (
  `ID_PERSONA` int(11),
  `numero_documento` varchar(30),
  `apellidos` varchar(51),
  `nombres_persona` varchar(30),
  `direccion_persona` varchar(45),
  `email_persona` varchar(45),
  `descx` varchar(45)
);

--
-- Temporary table structure for view `v_empleados`
--
DROP TABLE IF EXISTS `v_empleados`;
DROP VIEW IF EXISTS `v_empleados`;
CREATE TABLE `v_empleados` (
  `ID_PERSONA` int(11),
  `numero_documento` varchar(30),
  `apellidos` varchar(51),
  `nombres_persona` varchar(30),
  `direccion_persona` varchar(45),
  `descx` varchar(20),
  `email_persona` varchar(45)
);

--
-- Temporary table structure for view `v_habitacion`
--
DROP TABLE IF EXISTS `v_habitacion`;
DROP VIEW IF EXISTS `v_habitacion`;
CREATE TABLE `v_habitacion` (
  `id_habitacion` int(11),
  `numero_hab` int(11),
  `ubigeo_hab` varchar(30),
  `disponibilidad_hab` varchar(45),
  `precio` decimal(10,2),
  `descripcion` varchar(45),
  `img` varchar(100)
);

--
-- Temporary table structure for view `v_login`
--
DROP TABLE IF EXISTS `v_login`;
DROP VIEW IF EXISTS `v_login`;
CREATE TABLE `v_login` (
  `id` int(11),
  `numero_documento` varchar(30),
  `apellidopater_persona` varchar(25),
  `apellidomater_persona` varchar(25),
  `nombres_persona` varchar(30),
  `usuario` varchar(45),
  `id_rol` int(11),
  `clave_usuario` varchar(45)
);

--
-- Temporary table structure for view `v_productos`
--
DROP TABLE IF EXISTS `v_productos`;
DROP VIEW IF EXISTS `v_productos`;
CREATE TABLE `v_productos` (
  `id_producto` int(11),
  `codigo_referencial` varchar(20),
  `precio` decimal(10,2),
  `stock` int(11),
  `descripcion_producto` varchar(45),
  `descripcion_categoria` varchar(15),
  `descripcion_marca` varchar(15),
  `img` varchar(65),
  `estado` varchar(45)
);

--
-- Definition of table `tb_alquiler`
--

DROP TABLE IF EXISTS `tb_alquiler`;
CREATE TABLE `tb_alquiler` (
  `id_alquiler` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrada` date DEFAULT NULL,
  `hora_entrada` varchar(12) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` varchar(12) DEFAULT NULL,
  `ID_PERSONA` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alquiler`),
  KEY `fk_TB_ALQUILER_TB_PERSONA1` (`ID_PERSONA`),
  KEY `fk_TB_ALQUILER_TB_EMPLEADO1` (`id_empleado`),
  CONSTRAINT `fk_TB_ALQUILER_TB_EMPLEADO1` FOREIGN KEY (`id_empleado`) REFERENCES `tb_empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_ALQUILER_TB_PERSONA1` FOREIGN KEY (`ID_PERSONA`) REFERENCES `tb_persona` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_alquiler`
--

/*!40000 ALTER TABLE `tb_alquiler` DISABLE KEYS */;
INSERT INTO `tb_alquiler` (`id_alquiler`,`fecha_entrada`,`hora_entrada`,`fecha_salida`,`hora_salida`,`ID_PERSONA`,`id_empleado`) VALUES 
 (65,'2015-06-10','00:33:39',NULL,NULL,12,NULL),
 (66,'2015-06-10','00:37:37',NULL,NULL,12,NULL),
 (67,'2015-06-11','03:31:26',NULL,NULL,6,NULL),
 (68,'2015-06-11','05:27:49',NULL,NULL,12,NULL),
 (69,'2015-06-14','20:47:29',NULL,NULL,12,NULL),
 (70,'2015-06-25','08:02:25',NULL,NULL,12,1),
 (71,'2015-07-12','20:53:49',NULL,NULL,1,1),
 (72,'2015-07-21','04:35:44',NULL,NULL,541,1),
 (73,'2015-07-21','04:40:04',NULL,NULL,541,1);
/*!40000 ALTER TABLE `tb_alquiler` ENABLE KEYS */;


--
-- Definition of table `tb_cargo`
--

DROP TABLE IF EXISTS `tb_cargo`;
CREATE TABLE `tb_cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(20) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `cargo_UNIQUE` (`cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_cargo`
--

/*!40000 ALTER TABLE `tb_cargo` DISABLE KEYS */;
INSERT INTO `tb_cargo` (`id_cargo`,`cargo`,`estado`) VALUES 
 (1,'Administrador','1'),
 (2,'Recepcionista','1'),
 (3,'Gerente','1'),
 (4,'Publico','0'),
 (6,'Recepcionista beta  ','1'),
 (7,'del','0'),
 (8,'zzz','1'),
 (9,'ytttyyytyty','1'),
 (10,'jjjhghgh','1'),
 (11,'edsxhhhh','1');
/*!40000 ALTER TABLE `tb_cargo` ENABLE KEYS */;


--
-- Definition of table `tb_categoria_producto`
--

DROP TABLE IF EXISTS `tb_categoria_producto`;
CREATE TABLE `tb_categoria_producto` (
  `id_categoria_producto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_categoria` varchar(15) NOT NULL,
  PRIMARY KEY (`id_categoria_producto`),
  UNIQUE KEY `id_categoria_producto_UNIQUE` (`id_categoria_producto`),
  UNIQUE KEY `descripcion_categoria_UNIQUE` (`descripcion_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_categoria_producto`
--

/*!40000 ALTER TABLE `tb_categoria_producto` DISABLE KEYS */;
INSERT INTO `tb_categoria_producto` (`id_categoria_producto`,`descripcion_categoria`) VALUES 
 (3,'Agua'),
 (10,'agua beta'),
 (8,'beta cat'),
 (11,'beta d'),
 (13,'cate'),
 (5,'Categoria prueb'),
 (14,'categoriaqqqqqq'),
 (6,'Cateria  u1'),
 (12,'ccc'),
 (4,'cerveza'),
 (17,'Comida'),
 (16,'energizantes'),
 (15,'examplecat'),
 (1,'Gaseosa'),
 (2,'Licores'),
 (7,'sss');
/*!40000 ALTER TABLE `tb_categoria_producto` ENABLE KEYS */;


--
-- Definition of table `tb_comprobante`
--

DROP TABLE IF EXISTS `tb_comprobante`;
CREATE TABLE `tb_comprobante` (
  `id_comprobante` int(11) NOT NULL AUTO_INCREMENT,
  `numero_comprobante` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `IGV_IVA` decimal(10,2) DEFAULT NULL,
  `id_tipo_comprobante` int(11) NOT NULL,
  `tipo_registro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_comprobante`),
  UNIQUE KEY `id_boleta_UNIQUE` (`id_comprobante`),
  KEY `fk_TB_COMPROBANTE_TB_TIPO_COMPROBANTE1` (`id_tipo_comprobante`),
  CONSTRAINT `fk_TB_COMPROBANTE_TB_TIPO_COMPROBANTE1` FOREIGN KEY (`id_tipo_comprobante`) REFERENCES `tb_tipo_comprobante` (`id_tipo_comprobante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_comprobante`
--

/*!40000 ALTER TABLE `tb_comprobante` DISABLE KEYS */;
INSERT INTO `tb_comprobante` (`id_comprobante`,`numero_comprobante`,`fecha`,`precio_total`,`subtotal`,`IGV_IVA`,`id_tipo_comprobante`,`tipo_registro`) VALUES 
 (1,1,'2015-06-09','40.00','40.00','0.00',1,'por alquiler'),
 (2,1,'2015-06-09','30.00','24.60','5.40',2,'por alquiler'),
 (3,2,'2015-06-10','40.00','40.00','0.00',1,'por alquiler'),
 (4,2,'2015-06-10','30.00','24.60','5.40',2,'por alquiler'),
 (5,3,'2015-06-10','19.50','15.99','3.51',2,'venta producto'),
 (6,3,'2015-06-10','19.50','15.99','3.51',2,'venta producto'),
 (7,4,'2015-06-11','19.50','15.99','3.51',2,'venta producto'),
 (8,4,'2015-06-11','19.50','15.99','3.51',2,'venta producto'),
 (9,4,'2015-06-11','19.50','15.99','3.51',2,'venta producto'),
 (10,5,'2015-06-11','19.50','15.99','3.51',2,'venta producto'),
 (11,5,'2015-06-11','9.00','7.38','1.62',2,'venta producto'),
 (12,3,'2015-06-11','20.50','20.50','0.00',1,'venta producto'),
 (13,3,'2015-06-12','15.00','15.00','0.00',1,'venta producto'),
 (14,3,'2015-06-12','26.50','26.50','0.00',1,'venta producto'),
 (15,4,'2015-06-12','4.50','4.50','0.00',1,'venta producto'),
 (16,6,'2015-06-12','8.00','6.56','1.44',2,'venta producto'),
 (18,7,'2015-06-12','14.50','11.89','2.61',2,'venta producto'),
 (19,8,'2015-06-12','3.50','2.87','0.63',2,'venta producto'),
 (20,9,'2015-06-12','3.50','2.87','0.63',2,'venta producto'),
 (21,10,'2015-06-13','5.50','4.51','0.99',2,'venta producto'),
 (22,5,'2015-06-14','70.00','70.00','0.00',1,'por alquiler'),
 (23,6,'2015-06-25','30.00','30.00','0.00',1,'por alquiler'),
 (24,11,'2015-06-25','12.50','10.25','2.25',2,'venta producto'),
 (25,12,'2015-07-11','40.00','32.80','7.20',2,'por alquiler'),
 (26,13,'2015-07-20','40.00','32.80','7.20',2,'por alquiler'),
 (27,14,'2015-07-20','40.00','32.80','7.20',2,'por alquiler');
/*!40000 ALTER TABLE `tb_comprobante` ENABLE KEYS */;


--
-- Definition of table `tb_configuracion`
--

DROP TABLE IF EXISTS `tb_configuracion`;
CREATE TABLE `tb_configuracion` (
  `IGV_IVA` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_configuracion`
--

/*!40000 ALTER TABLE `tb_configuracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_configuracion` ENABLE KEYS */;


--
-- Definition of table `tb_detalle_alquiler`
--

DROP TABLE IF EXISTS `tb_detalle_alquiler`;
CREATE TABLE `tb_detalle_alquiler` (
  `id_detalle_alq` int(11) NOT NULL AUTO_INCREMENT,
  `id_comprobante` int(11) NOT NULL,
  `id_habitacion` int(11) DEFAULT NULL,
  `tb_alquiler_id_alquiler` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_alq`,`id_comprobante`),
  KEY `fk_det_hab` (`id_habitacion`),
  KEY `fk_hab_com` (`id_comprobante`),
  KEY `fk_tb_detalle_alquiler_tb_alquiler1_idx` (`tb_alquiler_id_alquiler`),
  CONSTRAINT `fk_det_hab` FOREIGN KEY (`id_habitacion`) REFERENCES `tb_habitacion` (`id_habitacion`),
  CONSTRAINT `fk_hab_com` FOREIGN KEY (`id_comprobante`) REFERENCES `tb_comprobante` (`id_comprobante`),
  CONSTRAINT `fk_tb_detalle_alquiler_tb_alquiler1` FOREIGN KEY (`tb_alquiler_id_alquiler`) REFERENCES `tb_alquiler` (`id_alquiler`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_detalle_alquiler`
--

/*!40000 ALTER TABLE `tb_detalle_alquiler` DISABLE KEYS */;
INSERT INTO `tb_detalle_alquiler` (`id_detalle_alq`,`id_comprobante`,`id_habitacion`,`tb_alquiler_id_alquiler`) VALUES 
 (2,1,8,65),
 (4,2,7,66),
 (5,3,8,67),
 (6,4,7,68),
 (7,22,8,69),
 (8,22,7,69),
 (9,23,7,70),
 (10,25,9,71),
 (13,26,6,72),
 (17,27,6,73);
/*!40000 ALTER TABLE `tb_detalle_alquiler` ENABLE KEYS */;


--
-- Definition of table `tb_detalle_pedido`
--

DROP TABLE IF EXISTS `tb_detalle_pedido`;
CREATE TABLE `tb_detalle_pedido` (
  `n_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_comprobante` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`n_registro`),
  KEY `fk_tb_detalle_pedido_tb_pedido1_idx` (`id_pedido`),
  KEY `fk_tb_detalle_pedido_tb_comprobante1` (`id_comprobante`),
  CONSTRAINT `fk_tb_detalle_pedido_tb_comprobante1` FOREIGN KEY (`id_comprobante`) REFERENCES `tb_comprobante` (`id_comprobante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_detalle_pedido_tb_pedido1` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_detalle_pedido`
--

/*!40000 ALTER TABLE `tb_detalle_pedido` DISABLE KEYS */;
INSERT INTO `tb_detalle_pedido` (`n_registro`,`id_comprobante`,`id_pedido`,`estado`) VALUES 
 (1,12,22,'registrado'),
 (2,12,23,'registrado'),
 (3,13,18,'registrado'),
 (4,14,24,'registrado'),
 (5,14,25,'registrado'),
 (6,14,26,'registrado'),
 (7,15,27,'registrado'),
 (8,16,28,'registrado'),
 (9,18,29,'registrado'),
 (10,19,30,'registrado'),
 (11,20,31,'registrado'),
 (12,21,32,'registrado'),
 (13,24,35,'registrado');
/*!40000 ALTER TABLE `tb_detalle_pedido` ENABLE KEYS */;


--
-- Definition of table `tb_detalle_producto`
--

DROP TABLE IF EXISTS `tb_detalle_producto`;
CREATE TABLE `tb_detalle_producto` (
  `n_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  PRIMARY KEY (`n_registro`),
  KEY `fk_tb_detalle_producto_tb_producto1_idx` (`id_producto`),
  KEY `fk_tb_detalle_producto_tb_pedido1_idx` (`id_pedido`),
  CONSTRAINT `fk_tb_detalle_producto_tb_pedido1` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_detalle_producto_tb_producto1` FOREIGN KEY (`id_producto`) REFERENCES `tb_producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_detalle_producto`
--

/*!40000 ALTER TABLE `tb_detalle_producto` DISABLE KEYS */;
INSERT INTO `tb_detalle_producto` (`n_registro`,`id_producto`,`id_pedido`,`cantidad`,`precio`,`importe`) VALUES 
 (13,17,17,1,'1.50','1.50'),
 (14,17,17,1,'1.50','1.50'),
 (15,16,17,1,'3.00','3.00'),
 (16,17,17,1,'1.50','1.50'),
 (17,16,17,1,'3.00','3.00'),
 (18,17,17,2,'1.50','1.50'),
 (19,16,17,1,'3.00','3.00'),
 (20,17,18,1,'1.50','1.50'),
 (21,17,18,1,'1.50','1.50'),
 (22,16,18,1,'3.00','3.00'),
 (23,17,18,1,'1.50','1.50'),
 (24,16,18,1,'3.00','3.00'),
 (25,17,18,1,'1.50','1.50'),
 (26,16,18,1,'3.00','3.00'),
 (27,17,19,2,'1.50','1.50'),
 (28,16,19,1,'3.00','3.00'),
 (29,17,20,1,'1.50','1.50'),
 (30,16,20,1,'3.00','3.00'),
 (31,17,21,1,'1.50','1.50'),
 (32,16,21,1,'3.00','3.00'),
 (33,16,22,1,'3.00','3.00'),
 (34,17,22,1,'1.50','1.50'),
 (35,18,23,3,'2.00','6.00'),
 (36,17,23,2,'1.50','3.00'),
 (37,16,23,2,'3.50','7.00'),
 (38,16,24,3,'3.50','10.50'),
 (39,17,24,1,'1.50','1.50'),
 (40,18,24,2,'2.00','4.00'),
 (41,16,25,1,'3.50','3.50'),
 (42,17,25,1,'1.50','1.50'),
 (43,18,25,1,'2.00','2.00'),
 (44,16,26,1,'3.50','3.50'),
 (45,17,27,3,'1.50','4.50'),
 (46,18,28,4,'2.00','8.00'),
 (47,17,29,1,'1.50','1.50'),
 (48,18,29,3,'2.00','6.00'),
 (49,16,29,2,'3.50','7.00'),
 (50,16,30,1,'3.50','3.50'),
 (51,17,31,1,'1.50','1.50'),
 (52,18,31,1,'2.00','2.00'),
 (53,16,32,1,'3.50','3.50'),
 (54,18,32,1,'2.00','2.00'),
 (55,16,33,1,'3.50','3.50'),
 (56,17,33,1,'1.50','1.50'),
 (57,18,34,1,'2.00','2.00'),
 (58,18,35,2,'2.00','4.00'),
 (59,17,35,1,'1.50','1.50'),
 (60,16,35,2,'3.50','7.00'),
 (61,16,36,1,'6.00','6.00'),
 (62,17,36,1,'1.50','1.50'),
 (63,17,37,1,'1.50','1.50'),
 (64,16,37,1,'6.00','6.00'),
 (65,18,37,1,'2.00','2.00'),
 (66,16,38,1,'6.00','6.00'),
 (67,17,38,3,'1.50','4.50');
/*!40000 ALTER TABLE `tb_detalle_producto` ENABLE KEYS */;


--
-- Definition of table `tb_distrito`
--

DROP TABLE IF EXISTS `tb_distrito`;
CREATE TABLE `tb_distrito` (
  `id_distrito` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_distrito` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL,
  PRIMARY KEY (`id_distrito`),
  KEY `fk_tb_distrito_tb_provincia1_idx` (`id_provincia`),
  CONSTRAINT `fk_tb_distrito_tb_provincia1` FOREIGN KEY (`id_provincia`) REFERENCES `tb_provincia` (`id_provincia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_distrito`
--

/*!40000 ALTER TABLE `tb_distrito` DISABLE KEYS */;
INSERT INTO `tb_distrito` (`id_distrito`,`nombre_distrito`,`estado`,`id_provincia`) VALUES 
 (1,'Huaura','1',1);
/*!40000 ALTER TABLE `tb_distrito` ENABLE KEYS */;


--
-- Definition of table `tb_empleado`
--

DROP TABLE IF EXISTS `tb_empleado`;
CREATE TABLE `tb_empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` char(1) NOT NULL,
  `ID_PERSONA` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  UNIQUE KEY `ID_PERSONA_UNIQUE` (`ID_PERSONA`),
  KEY `fk_TB_EMPLEADO_TB_PERSONA1` (`ID_PERSONA`),
  KEY `fk_TB_EMPLEADO_TB_CARGO1` (`id_cargo`),
  CONSTRAINT `fk_TB_EMPLEADO_TB_CARGO1` FOREIGN KEY (`id_cargo`) REFERENCES `tb_cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_EMPLEADO_TB_PERSONA1` FOREIGN KEY (`ID_PERSONA`) REFERENCES `tb_persona` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_empleado`
--

/*!40000 ALTER TABLE `tb_empleado` DISABLE KEYS */;
INSERT INTO `tb_empleado` (`id_empleado`,`estado`,`ID_PERSONA`,`id_cargo`) VALUES 
 (1,'1',1,2),
 (2,'1',14,1),
 (12,'1',538,1),
 (13,'1',531,3),
 (14,'1',13,1),
 (15,'0',12,2),
 (18,'0',225,2),
 (19,'0',533,2),
 (20,'0',532,2),
 (23,'0',506,2),
 (24,'0',508,2),
 (25,'0',509,2),
 (26,'1',541,2);
/*!40000 ALTER TABLE `tb_empleado` ENABLE KEYS */;


--
-- Definition of table `tb_habitacion`
--

DROP TABLE IF EXISTS `tb_habitacion`;
CREATE TABLE `tb_habitacion` (
  `id_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `numero_hab` int(11) NOT NULL,
  `ubigeo_hab` varchar(30) DEFAULT NULL,
  `disponibilidad_hab` varchar(45) DEFAULT NULL,
  `estado_hab` varchar(45) DEFAULT NULL,
  `id_tipo_habitacion` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `id_sede` int(11) NOT NULL,
  PRIMARY KEY (`id_habitacion`),
  UNIQUE KEY `id_habitacion_UNIQUE` (`id_habitacion`),
  UNIQUE KEY `numero_hab_UNIQUE` (`numero_hab`),
  KEY `fk_TB_HABITACION_TB_TIPO_HABITACION1` (`id_tipo_habitacion`),
  KEY `fk_tb_habitacion_tb_sede1_idx` (`id_sede`),
  CONSTRAINT `fk_TB_HABITACION_TB_TIPO_HABITACION1` FOREIGN KEY (`id_tipo_habitacion`) REFERENCES `tb_tipo_habitacion` (`id_tipo_habitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_habitacion_tb_sede1` FOREIGN KEY (`id_sede`) REFERENCES `tb_sede` (`id_sede`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_habitacion`
--

/*!40000 ALTER TABLE `tb_habitacion` DISABLE KEYS */;
INSERT INTO `tb_habitacion` (`id_habitacion`,`numero_hab`,`ubigeo_hab`,`disponibilidad_hab`,`estado_hab`,`id_tipo_habitacion`,`precio`,`img`,`descripcion`,`id_sede`) VALUES 
 (6,1,'segundo piso','disponible','1',1,'40.00','img/004-habitacion-standard-madrid.jpg','sin descripcion',1),
 (7,2,'segundo piso','disponible','1',2,'30.00','img/05-hotel-madrid-sercotel-conde-duque-habitacion-superior.jpg','sin descripcion',1),
 (8,3,'segundo piso','disponible','1',1,'40.00','img/habitacion-room-06_tcm49-78025.jpg','sin descripcion',1),
 (9,4,'segundo piso','ocupado','0',1,'40.00','img/hotel-4-barcelona-habitacion-doble-001.jpg','sin descripcion',1),
 (10,5,'tercer piso','disponible','1',2,'30.00','img/dormitorio-habitacion-cuarto-pintado-de-rojo-y-blanco1.jpg','sin descripcion',1),
 (11,6,'tercer piso','disponible','1',1,'40.00','img/habitaciones.jpg','sin descripcion',1),
 (12,7,'tercer piso','disponible','1',2,'30.00','img/Hotel-universal-santiago-2-habitacion.jpg','sin descripcion',1),
 (14,12,'segundo piso','disponible','0',1,'23.00','img/','sin descripcion',1),
 (15,30,'hh','disponible','1',1,'77.00','img/1088732.jpg','sin descripcion',1),
 (17,8,'jsjsjjsjss','disponible','1',2,'7575.00','img/1509805_374174176105410_6150917282822996166_n.jpg','sin descripcion',1),
 (18,70,'hewfhfbhej','disponible','1',1,'87.00','img/20427_368280046694823_380804363360041382_n.jpg','sin descripcion',1),
 (19,55,'sin','Disponible','1',1,'60.00','img/Mesa de trabajo 1.png','sin descripcion',1),
 (21,56,'sisn','disponible','1',1,'5.00','img/Mesa de trabajo 1.png','sin descripcion',1),
 (23,90,'sin','disponible','1',1,'7.00','img/Mesa de trabajo 1.png','sin descripcion',1),
 (24,88,'er','Disponible','1',1,'57.00','img/j.PNG','sin descripcion',1),
 (25,34,'tercer piso','disponible','1',1,'20.00','img/11221300_743741109070362_3692571936393724969_n.jpg','sin descripcion',1),
 (26,36,'tercer piso','disponible','1',1,'30.00','img/no_hace_falta_que_un_hotel_tenga_habitaciones_puede_tener_una_sola_habitacion_1189_630x.jpg','sin descripcion',1);
/*!40000 ALTER TABLE `tb_habitacion` ENABLE KEYS */;


--
-- Definition of table `tb_marca_producto`
--

DROP TABLE IF EXISTS `tb_marca_producto`;
CREATE TABLE `tb_marca_producto` (
  `id_marca_producto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_marca` varchar(15) NOT NULL,
  PRIMARY KEY (`id_marca_producto`),
  UNIQUE KEY `id_marca_producto_UNIQUE` (`id_marca_producto`),
  UNIQUE KEY `descripcion_marca_UNIQUE` (`descripcion_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_marca_producto`
--

/*!40000 ALTER TABLE `tb_marca_producto` DISABLE KEYS */;
INSERT INTO `tb_marca_producto` (`id_marca_producto`,`descripcion_marca`) VALUES 
 (9,'10up'),
 (3,'7up'),
 (1,'Coca-cola'),
 (7,'d'),
 (11,'examMarca'),
 (2,'Inka cola'),
 (6,'marca xd'),
 (10,'nueva marca'),
 (4,'pepsi'),
 (5,'Pilsen'),
 (12,'Red bull');
/*!40000 ALTER TABLE `tb_marca_producto` ENABLE KEYS */;


--
-- Definition of table `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
CREATE TABLE `tb_pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pedido`
--

/*!40000 ALTER TABLE `tb_pedido` DISABLE KEYS */;
INSERT INTO `tb_pedido` (`id_pedido`,`fecha`,`usuario`,`estado`) VALUES 
 (17,'2015-06-09 21:00:30',12,'vendido'),
 (18,'2015-06-09 21:04:50',12,'vendido'),
 (19,'2015-06-10 01:21:56',11,'vendido'),
 (20,'2015-06-10 16:09:47',11,'vendido'),
 (21,'2015-06-10 16:10:11',12,'vendido'),
 (22,'2015-06-10 16:13:55',13,'vendido'),
 (23,'2015-06-11 16:28:57',13,'vendido'),
 (24,'2015-06-11 23:51:09',13,'vendido'),
 (25,'2015-06-11 23:53:16',13,'vendido'),
 (26,'2015-06-11 23:56:33',13,'vendido'),
 (27,'2015-06-12 00:07:02',13,'vendido'),
 (28,'2015-06-12 00:09:34',13,'vendido'),
 (29,'2015-06-12 01:02:30',13,'vendido'),
 (30,'2015-06-12 20:29:13',11,'vendido'),
 (31,'2015-06-12 20:31:16',11,'vendido'),
 (32,'2015-06-13 11:00:18',11,'vendido'),
 (33,'2015-06-13 11:35:00',11,'entregado'),
 (34,'2015-06-20 20:12:35',11,'cancelado'),
 (35,'2015-06-25 01:12:57',529,'vendido'),
 (36,'2015-07-09 19:21:14',11,'0'),
 (37,'2015-07-09 20:10:03',1,'cancelado'),
 (38,'2015-07-20 19:27:31',11,'entregado');
/*!40000 ALTER TABLE `tb_pedido` ENABLE KEYS */;


--
-- Definition of table `tb_permiso`
--

DROP TABLE IF EXISTS `tb_permiso`;
CREATE TABLE `tb_permiso` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `vista_permiso` varchar(45) NOT NULL,
  `categoria_permiso` varchar(45) DEFAULT NULL,
  `url_pagina` varchar(45) DEFAULT NULL,
  `estado_permiso` char(1) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`),
  UNIQUE KEY `id_permiso_UNIQUE` (`id_permiso`),
  KEY `fk_TB_PERMISO_TB_ROL1` (`id_rol`),
  CONSTRAINT `fk_TB_PERMISO_TB_ROL1` FOREIGN KEY (`id_rol`) REFERENCES `tb_rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_permiso`
--

/*!40000 ALTER TABLE `tb_permiso` DISABLE KEYS */;
INSERT INTO `tb_permiso` (`id_permiso`,`vista_permiso`,`categoria_permiso`,`url_pagina`,`estado_permiso`,`id_rol`) VALUES 
 (1,'categoria producto','Mantenimiento','../view/v_producto.php?p=c','1',1),
 (2,'marca producto','Mantenimiento','../view/v_producto.php?p=m','1',1),
 (3,'producto','Producto','../view/v_productom.php','1',1),
 (4,'cargo','Mantenimiento','../view/v_cargo.php','1',1),
 (5,'Reporte Mesuales','Reportes',NULL,'x',1),
 (6,'Reporte Semanal','Reportes',NULL,'x',1),
 (7,'Reporte Diario','Reportes',NULL,'x',1),
 (8,'Tipo de Documento','Mantenimiento','../view/v_tipo_documento.php','1',1),
 (9,'Registrar persona','Mantenimiento','../view/v_persona.php','1',1),
 (10,'Habitaciones','Habitaciones','../view/v_habitacion.php','1',1),
 (11,'Liberar','Habitaciones','../view/v_liberar.php','1',2),
 (12,'Ver Disponibles','Habitaciones','../view/v_habitacionh.php?dis','1',2),
 (13,'Reservaciones','Habitaciones',NULL,'x',2),
 (14,'Habitaciones','Habitaciones','../view/v_habitacionh.php','1',2),
 (16,'Alquiler Habitacion','Procesos',NULL,'x',1),
 (18,'Mi Carrito','Mi Carrito','../view/v_micarrito.php','1',3),
 (19,'Permisos','Permisos','../view/v_man_permisos.php','1',1),
 (20,'Reserva','Reserva','../view/v_reserva.php','0',2),
 (21,'Comprobante','Comprobante','../view/v_comprobante.php','0',3),
 (22,'Salir','Salir','../view/exit.php','1',1),
 (23,'Salir','Salir','../view/exit.php','1',3),
 (24,'Reserva','Reserva','../view/v_reserva.php','0',3),
 (25,'Productos','Productos','../view/vs_producto.php','1',3),
 (26,'Generar Reservacion','Habitaciones',NULL,'x',3),
 (27,'Comprobante','Comprobante','../view/v_comprobante.php','1',2),
 (28,'Salir','Salir','../view/exit.php','1',2),
 (29,'Habitaciones','Habitaciones','../view/v_habitacionh.php','0',3),
 (30,'Reservaciones','Habitaciones',NULL,'x',3),
 (31,'Registrar','Registrar','../view/v_persona.php','1',2),
 (32,'Registrar','Registrar','../view/r_persona.php','0',3),
 (33,'Registrar','Registrar','../view/r_persona.php','0',4),
 (35,'Pedidos','Pedidos','../view/v_pedido.php','1',2);
/*!40000 ALTER TABLE `tb_permiso` ENABLE KEYS */;


--
-- Definition of table `tb_persona`
--

DROP TABLE IF EXISTS `tb_persona`;
CREATE TABLE `tb_persona` (
  `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT,
  `Id_tipodocumento` int(11) NOT NULL,
  `numero_documento` varchar(30) NOT NULL,
  `apellidopater_persona` varchar(25) DEFAULT NULL,
  `apellidomater_persona` varchar(25) DEFAULT NULL,
  `nombres_persona` varchar(30) NOT NULL,
  `direccion_persona` varchar(45) NOT NULL,
  `celular_persona` varchar(12) DEFAULT NULL,
  `telefono_persona` varchar(12) DEFAULT NULL,
  `email_persona` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_PERSONA`),
  UNIQUE KEY `numero_documento_UNIQUE` (`numero_documento`),
  UNIQUE KEY `email_persona_UNIQUE` (`email_persona`),
  KEY `fk_TB_PERSONA_TB_TIPO_DOCUMENTO` (`Id_tipodocumento`),
  CONSTRAINT `fk_TB_PERSONA_TB_TIPO_DOCUMENTO` FOREIGN KEY (`Id_tipodocumento`) REFERENCES `tb_tipo_documento` (`Id_tipodocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=542 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_persona`
--

/*!40000 ALTER TABLE `tb_persona` DISABLE KEYS */;
INSERT INTO `tb_persona` (`ID_PERSONA`,`Id_tipodocumento`,`numero_documento`,`apellidopater_persona`,`apellidomater_persona`,`nombres_persona`,`direccion_persona`,`celular_persona`,`telefono_persona`,`email_persona`,`estado`) VALUES 
 (1,1,'734839957','SUAREZ','LOLI','EDSON','PUERTO SUPE','956970181','947390162','edson061193',NULL),
 (6,3,'2147483647','','','SISTEDS7','LIMA-BARRANCA','956970181','956970184','xya3@gmail.com',NULL),
 (11,1,'73483995','SUAREZ','LOLI','EDSON','PUERTO SUPE BARRANCA','956970181','956970181','edson061193ddd@gmail.com','activo'),
 (12,1,'123456','Gutierrez','Espinoza','IDA','LIMA-BARRANCA','956970181','956970184','ida9009@gmail.com','activo'),
 (13,3,'123','','','SISTEDS7','LIMA-BARRANCA','956970181','956970184','edsonx061193@gmail.com','activo'),
 (14,1,'78965412','trujillo','domingo','claudia','PUERTO SUPE','963693692','7412589','rock061193@gmail.com','activo'),
 (15,2,'5466','GOMEZ','chavez','jessica','nicolas pierola','987456852','7777444','angel_15@hotmal.com','activo'),
 (17,1,'77777778','GOMEZ','Lino','jessica','AA. VV. LAS VIÃ‘AS MZ C LT 1','987458741','7412589','edson061193xd@gmail.com','activo'),
 (18,2,'768030869','suarez','domingo','luis','nicolas pierola','','7856932','mogo-08@gmai.com','activo'),
 (225,3,'1101111011','','','','Puqui Cano S/N','987699268','7856932','angel_15ytyt@hotmal.com','activo'),
 (427,2,'777452122221','gremios','domingo','claudia','LIMA-BARRANCA','987699268','7412589','iuiuiuiuiuiuiuiui9ui@hotmail.com','activo'),
 (429,3,'78555555555','','','jessicaSACSAC','PUERTO SUPE','963600000','963600000','0963600000@gmail.com','activo'),
 (430,3,'78555555554','','','jessicaSACSAC','PUERTO SUPE','963599999','963599999','1963600000@gmail.com','activo'),
 (431,3,'78555555553','','','jessicaSACSAC','PUERTO SUPE','963599998','963599998','2963600000@gmail.com','activo'),
 (432,3,'78555555552','','','jessicaSACSAC','PUERTO SUPE','963599997','963599997','3963600000@gmail.com','activo'),
 (433,3,'78555555551','','','jessicaSACSAC','PUERTO SUPE','963599996','963599996','4963600000@gmail.com','activo'),
 (434,3,'78555555550','','','jessicaSACSAC','PUERTO SUPE','963599995','963599995','5963600000@gmail.com','activo'),
 (435,3,'78555555549','','','jessicaSACSAC','PUERTO SUPE','963599994','963599994','6963600000@gmail.com','activo'),
 (436,3,'78555555548','','','jessicaSACSAC','PUERTO SUPE','963599993','963599993','7963600000@gmail.com','activo'),
 (437,3,'78555555547','','','jessicaSACSAC','PUERTO SUPE','963599992','963599992','8963600000@gmail.com','activo'),
 (438,3,'78555555546','','','jessicaSACSAC','PUERTO SUPE','963599991','963599991','9963600000@gmail.com','activo'),
 (439,3,'78555555545','','','jessicaSACSAC','PUERTO SUPE','963599990','963599990','10963600000@gmail.com','activo'),
 (440,3,'78555555544','','','jessicaSACSAC','PUERTO SUPE','963599989','963599989','11963600000@gmail.com','activo'),
 (441,3,'78555555543','','','jessicaSACSAC','PUERTO SUPE','963599988','963599988','12963600000@gmail.com','activo'),
 (442,3,'78555555542','','','jessicaSACSAC','PUERTO SUPE','963599987','963599987','13963600000@gmail.com','activo'),
 (443,3,'78555555541','','','jessicaSACSAC','PUERTO SUPE','963599986','963599986','14963600000@gmail.com','activo'),
 (444,3,'78555555540','','','jessicaSACSAC','PUERTO SUPE','963599985','963599985','15963600000@gmail.com','activo'),
 (445,3,'78555555539','','','jessicaSACSAC','PUERTO SUPE','963599984','963599984','16963600000@gmail.com','activo'),
 (446,3,'78555555538','','','jessicaSACSAC','PUERTO SUPE','963599983','963599983','17963600000@gmail.com','activo'),
 (447,3,'78555555537','','','jessicaSACSAC','PUERTO SUPE','963599982','963599982','18963600000@gmail.com','activo'),
 (448,3,'78555555536','','','jessicaSACSAC','PUERTO SUPE','963599981','963599981','19963600000@gmail.com','activo'),
 (449,3,'78555555535','','','jessicaSACSAC','PUERTO SUPE','963599980','963599980','20963600000@gmail.com','activo'),
 (450,3,'78555555534','','','jessicaSACSAC','PUERTO SUPE','963599979','963599979','21963600000@gmail.com','activo'),
 (451,3,'78555555533','','','jessicaSACSAC','PUERTO SUPE','963599978','963599978','22963600000@gmail.com','activo'),
 (452,3,'78555555532','','','jessicaSACSAC','PUERTO SUPE','963599977','963599977','23963600000@gmail.com','activo'),
 (453,3,'78555555531','','','jessicaSACSAC','PUERTO SUPE','963599976','963599976','24963600000@gmail.com','activo'),
 (454,3,'78555555530','','','jessicaSACSAC','PUERTO SUPE','963599975','963599975','25963600000@gmail.com','activo'),
 (455,3,'78555555529','','','jessicaSACSAC','PUERTO SUPE','963599974','963599974','26963600000@gmail.com','activo'),
 (456,3,'78555555528','','','jessicaSACSAC','PUERTO SUPE','963599973','963599973','27963600000@gmail.com','activo'),
 (457,3,'78555555527','','','jessicaSACSAC','PUERTO SUPE','963599972','963599972','28963600000@gmail.com','activo'),
 (458,3,'78555555526','','','jessicaSACSAC','PUERTO SUPE','963599971','963599971','29963600000@gmail.com','activo'),
 (459,3,'78555555525','','','jessicaSACSAC','PUERTO SUPE','963599970','963599970','30963600000@gmail.com','activo'),
 (460,3,'78555555524','','','jessicaSACSAC','PUERTO SUPE','963599969','963599969','31963600000@gmail.com','activo'),
 (461,3,'78555555523','','','jessicaSACSAC','PUERTO SUPE','963599968','963599968','32963600000@gmail.com','activo'),
 (462,3,'78555555522','','','jessicaSACSAC','PUERTO SUPE','963599967','963599967','33963600000@gmail.com','activo'),
 (463,3,'78555555521','','','jessicaSACSAC','PUERTO SUPE','963599966','963599966','34963600000@gmail.com','activo'),
 (464,3,'78555555520','','','jessicaSACSAC','PUERTO SUPE','963599965','963599965','35963600000@gmail.com','activo'),
 (465,3,'78555555519','','','jessicaSACSAC','PUERTO SUPE','963599964','963599964','36963600000@gmail.com','activo'),
 (466,3,'78555555518','','','jessicaSACSAC','PUERTO SUPE','963599963','963599963','37963600000@gmail.com','activo'),
 (467,3,'78555555517','','','jessicaSACSAC','PUERTO SUPE','963599962','963599962','38963600000@gmail.com','activo'),
 (468,3,'78555555516','','','jessicaSACSAC','PUERTO SUPE','963599961','963599961','39963600000@gmail.com','activo'),
 (469,3,'78555555515','','','jessicaSACSAC','PUERTO SUPE','963599960','963599960','40963600000@gmail.com','activo'),
 (470,3,'78555555514','','','jessicaSACSAC','PUERTO SUPE','963599959','963599959','41963600000@gmail.com','activo'),
 (471,3,'78555555513','','','jessicaSACSAC','PUERTO SUPE','963599958','963599958','42963600000@gmail.com','activo'),
 (472,3,'78555555512','','','jessicaSACSAC','PUERTO SUPE','963599957','963599957','43963600000@gmail.com','activo'),
 (473,3,'78555555511','','','jessicaSACSAC','PUERTO SUPE','963599956','963599956','44963600000@gmail.com','activo'),
 (474,3,'78555555510','','','jessicaSACSAC','PUERTO SUPE','963599955','963599955','45963600000@gmail.com','activo'),
 (475,3,'78555555509','','','jessicaSACSAC','PUERTO SUPE','963599954','963599954','46963600000@gmail.com','activo'),
 (476,3,'78555555508','','','jessicaSACSAC','PUERTO SUPE','963599953','963599953','47963600000@gmail.com','activo'),
 (477,3,'78555555507','','','jessicaSACSAC','PUERTO SUPE','963599952','963599952','48963600000@gmail.com','activo'),
 (478,3,'78555555506','','','jessicaSACSAC','PUERTO SUPE','963599951','963599951','49963600000@gmail.com','activo'),
 (479,3,'78555555505','','','jessicaSACSAC','PUERTO SUPE','963599950','963599950','50963600000@gmail.com','activo'),
 (480,3,'78555555504','','','jessicaSACSAC','PUERTO SUPE','963599949','963599949','51963600000@gmail.com','activo'),
 (481,3,'78555555503','','','jessicaSACSAC','PUERTO SUPE','963599948','963599948','52963600000@gmail.com','activo'),
 (482,3,'78555555502','','','jessicaSACSAC','PUERTO SUPE','963599947','963599947','53963600000@gmail.com','activo'),
 (483,3,'78555555501','','','jessicaSACSAC','PUERTO SUPE','963599946','963599946','54963600000@gmail.com','activo'),
 (484,3,'78555555500','','','jessicaSACSAC','PUERTO SUPE','963599945','963599945','55963600000@gmail.com','activo'),
 (485,3,'78555555499','','','jessicaSACSAC','PUERTO SUPE','963599944','963599944','56963600000@gmail.com','activo'),
 (486,3,'78555555498','','','jessicaSACSAC','PUERTO SUPE','963599943','963599943','57963600000@gmail.com','activo'),
 (487,3,'78555555497','','','jessicaSACSAC','PUERTO SUPE','963599942','963599942','58963600000@gmail.com','activo'),
 (488,3,'78555555496','','','jessicaSACSAC','PUERTO SUPE','963599941','963599941','59963600000@gmail.com','activo'),
 (489,3,'78555555495','','','jessicaSACSAC','PUERTO SUPE','963599940','963599940','60963600000@gmail.com','activo'),
 (490,3,'78555555494','','','jessicaSACSAC','PUERTO SUPE','963599939','963599939','61963600000@gmail.com','activo'),
 (491,3,'78555555493','','','jessicaSACSAC','PUERTO SUPE','963599938','963599938','62963600000@gmail.com','activo'),
 (492,3,'78555555492','','','jessicaSACSAC','PUERTO SUPE','963599937','963599937','63963600000@gmail.com','activo'),
 (493,3,'78555555491','','','jessicaSACSAC','PUERTO SUPE','963599936','963599936','64963600000@gmail.com','activo'),
 (494,3,'78555555490','','','jessicaSACSAC','PUERTO SUPE','963599935','963599935','65963600000@gmail.com','activo'),
 (495,3,'78555555489','','','jessicaSACSAC','PUERTO SUPE','963599934','963599934','66963600000@gmail.com','activo'),
 (496,3,'78555555488','','','jessicaSACSAC','PUERTO SUPE','963599933','963599933','67963600000@gmail.com','activo'),
 (497,3,'78555555487','','','jessicaSACSAC','PUERTO SUPE','963599932','963599932','68963600000@gmail.com','activo'),
 (498,3,'78555555486','','','jessicaSACSAC','PUERTO SUPE','963599931','963599931','69963600000@gmail.com','activo'),
 (499,3,'78555555485','','','jessicaSACSAC','PUERTO SUPE','963599930','963599930','70963600000@gmail.com','activo'),
 (500,3,'78555555484','','','jessicaSACSAC','PUERTO SUPE','963599929','963599929','71963600000@gmail.com','activo'),
 (501,3,'78555555483','','','jessicaSACSAC','PUERTO SUPE','963599928','963599928','72963600000@gmail.com','activo'),
 (502,3,'78555555482','','','jessicaSACSAC','PUERTO SUPE','963599927','963599927','73963600000@gmail.com','activo'),
 (503,3,'78555555481','','','jessicaSACSAC','PUERTO SUPE','963599926','963599926','74963600000@gmail.com','activo'),
 (504,3,'78555555480','','','jessicaSACSAC','PUERTO SUPE','963599925','963599925','75963600000@gmail.com','activo'),
 (505,3,'78555555479','','','jessicaSACSAC','PUERTO SUPE','963599924','963599924','76963600000@gmail.com','activo'),
 (506,3,'78555555478','','','jessicaSACSAC','PUERTO SUPE','963599923','963599923','77963600000@gmail.com','activo'),
 (507,3,'78555555477','','','jessicaSACSAC','PUERTO SUPE','963599922','963599922','78963600000@gmail.com','activo'),
 (508,3,'78555555476','','','jessicaSACSAC','PUERTO SUPE','963599921','963599921','79963600000@gmail.com','activo'),
 (509,3,'78555555475','','','jessicaSACSAC','PUERTO SUPE','963599920','963599920','80963600000@gmail.com','activo'),
 (510,3,'78555555474','','','jessicaSACSAC','PUERTO SUPE','963599919','963599919','81963600000@gmail.com','activo'),
 (511,3,'78555555473','','','jessicaSACSAC','PUERTO SUPE','963599918','963599918','82963600000@gmail.com','activo'),
 (512,3,'78555555472','','','jessicaSACSAC','PUERTO SUPE','963599917','963599917','83963600000@gmail.com','activo'),
 (513,3,'78555555471','','','jessicaSACSAC','PUERTO SUPE','963599916','963599916','84963600000@gmail.com','activo'),
 (514,3,'78555555470','','','jessicaSACSAC','PUERTO SUPE','963599915','963599915','85963600000@gmail.com','activo'),
 (515,3,'78555555469','','','jessicaSACSAC','PUERTO SUPE','963599914','963599914','86963600000@gmail.com','activo'),
 (516,3,'78555555468','','','jessicaSACSAC','PUERTO SUPE','963599913','963599913','87963600000@gmail.com','activo'),
 (517,3,'78555555467','','','jessicaSACSAC','PUERTO SUPE','963599912','963599912','88963600000@gmail.com','activo'),
 (518,3,'78555555466','','','jessicaSACSAC','PUERTO SUPE','963599911','963599911','89963600000@gmail.com','activo'),
 (519,3,'78555555465','','','jessicaSACSAC','PUERTO SUPE','963599910','963599910','90963600000@gmail.com','activo'),
 (520,3,'78555555464','','','jessicaSACSAC','PUERTO SUPE','963599909','963599909','91963600000@gmail.com','activo'),
 (521,3,'78555555463','','','jessicaSACSAC','PUERTO SUPE','963599908','963599908','92963600000@gmail.com','activo'),
 (522,3,'78555555462','','','jessicaSACSAC','PUERTO SUPE','963599907','963599907','93963600000@gmail.com','activo'),
 (523,3,'78555555461','','','jessicaSACSAC','PUERTO SUPE','963599906','963599906','94963600000@gmail.com','activo'),
 (524,3,'78555555460','','','jessicaSACSAC','PUERTO SUPE','963599905','963599905','95963600000@gmail.com','activo'),
 (525,3,'78555555459','','','jessicaSACSAC','PUERTO SUPE','963599904','963599904','96963600000@gmail.com','activo'),
 (526,3,'78555555458','','','jessicaSACSAC','PUERTO SUPE','963599903','963599903','97963600000@gmail.com','activo'),
 (527,3,'78555555457','','','jessicaSACSAC','PUERTO SUPE','963599902','963599902','98963600000@gmail.com','activo'),
 (528,3,'78555555456','','','jessicaSACSAC','PUERTO SUPE','963599901','963599901','99963600000@gmail.com','activo'),
 (529,3,'78544454511','','','Miguel Angel3787','AA. VV. LAS VIÃ‘AS MZ C LT 1','987456852','7856984','edson061193@gmail.com','activo'),
 (531,2,'100000000000','Carpio','eeeeeeeeeeeeeeeeeeeeeeeee','joselin','eeee','','','trujillo@gmail.com','activo'),
 (532,3,'99999000000','','','','nicolas pierola','987456852','','eth@hotmail.com','activo'),
 (533,3,'88888888800','','','yyyyyyyyyyyyyyyyyyyyyyyyyyyyyy','PUERTO SUPE','','','rock0hhhhhhhhhhhhhhhhhhhhhhhh61193x@gmail.com','activo'),
 (538,1,'76834637','ssss','sssssssssss','mari','s','755555555555','688888888888','88@g.com','activo'),
 (540,1,'87777777','hhh','hhhh','prueba','hhh','','','hh@g.com','activo'),
 (541,1,'15151515','Suarez','Loli','Edson','lima','456142122337','785454545454','dsd@asa','activo');
/*!40000 ALTER TABLE `tb_persona` ENABLE KEYS */;


--
-- Definition of table `tb_producto`
--

DROP TABLE IF EXISTS `tb_producto`;
CREATE TABLE `tb_producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_referencial` varchar(20) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion_producto` varchar(45) DEFAULT NULL,
  `id_categoria_producto` int(11) NOT NULL,
  `id_marca_producto` int(11) NOT NULL,
  `img` varchar(65) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `stock_min` int(11) NOT NULL,
  `stock_max` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `id_producto_UNIQUE` (`id_producto`),
  UNIQUE KEY `codigo_referencial_UNIQUE` (`codigo_referencial`),
  KEY `fk_TB_PRODUCTO_TB_CATEGORIA_PRODUCTO1` (`id_categoria_producto`),
  KEY `fk_TB_PRODUCTO_TB_MARCA_PRODUCTO1` (`id_marca_producto`),
  CONSTRAINT `fk_TB_PRODUCTO_TB_CATEGORIA_PRODUCTO1` FOREIGN KEY (`id_categoria_producto`) REFERENCES `tb_categoria_producto` (`id_categoria_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_PRODUCTO_TB_MARCA_PRODUCTO1` FOREIGN KEY (`id_marca_producto`) REFERENCES `tb_marca_producto` (`id_marca_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_producto`
--

/*!40000 ALTER TABLE `tb_producto` DISABLE KEYS */;
INSERT INTO `tb_producto` (`id_producto`,`codigo_referencial`,`precio`,`stock`,`descripcion_producto`,`id_categoria_producto`,`id_marca_producto`,`img`,`estado`,`stock_min`,`stock_max`) VALUES 
 (16,'7876768','6.00',94,'Medio Litro',1,3,'img/7up.jpg','1',0,0),
 (17,'78767688','1.50',42,'Medio Litro',1,2,'img/incakola.jpg','1',0,0),
 (18,'8582241','2.00',6,'pepsi  355ml en lata',1,4,'img/pepsi.jpg','1',0,0),
 (19,'','4.50',4,'7',3,2,'img/','0',0,0),
 (20,'77777777777777777777','4.50',100,'sin ',2,5,'img/Capturay.PNG','0',0,0),
 (21,'44444444444444444444','20.00',103,'cevicheddddd',1,6,'img/ceviche-peruano.jpg','0',0,0),
 (22,'9erihehuhudejhejhjhe','6.00',100,'jshhs',1,6,'img/1088732.jpg','1',10,999),
 (23,'744474747444477','4.00',40,'sin',8,6,'img/1088732.jpg','1',4,14);
/*!40000 ALTER TABLE `tb_producto` ENABLE KEYS */;


--
-- Definition of table `tb_provincia`
--

DROP TABLE IF EXISTS `tb_provincia`;
CREATE TABLE `tb_provincia` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(55) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `id_region` int(11) NOT NULL,
  PRIMARY KEY (`id_provincia`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`),
  KEY `fk_tb_provincia_tb_region1_idx` (`id_region`),
  CONSTRAINT `fk_tb_provincia_tb_region1` FOREIGN KEY (`id_region`) REFERENCES `tb_region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_provincia`
--

/*!40000 ALTER TABLE `tb_provincia` DISABLE KEYS */;
INSERT INTO `tb_provincia` (`id_provincia`,`descripcion`,`estado`,`id_region`) VALUES 
 (1,'Huaura','1',1);
/*!40000 ALTER TABLE `tb_provincia` ENABLE KEYS */;


--
-- Definition of table `tb_region`
--

DROP TABLE IF EXISTS `tb_region`;
CREATE TABLE `tb_region` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(55) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_region`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_region`
--

/*!40000 ALTER TABLE `tb_region` DISABLE KEYS */;
INSERT INTO `tb_region` (`id_region`,`descripcion`,`estado`) VALUES 
 (1,'Lima','1');
/*!40000 ALTER TABLE `tb_region` ENABLE KEYS */;


--
-- Definition of table `tb_reservacion`
--

DROP TABLE IF EXISTS `tb_reservacion`;
CREATE TABLE `tb_reservacion` (
  `id_reservacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_entrada` varchar(45) NOT NULL,
  `fecha_salida` varchar(45) NOT NULL,
  PRIMARY KEY (`id_reservacion`,`id_usuario`,`id_habitacion`),
  UNIQUE KEY `id_pedido_UNIQUE` (`id_reservacion`),
  KEY `fk_TB_PEDIDO_TB_USUARIO1` (`id_usuario`),
  KEY `fk_TB_PEDIDO_TB_HABITACION1` (`id_habitacion`),
  CONSTRAINT `fk_TB_PEDIDO_TB_HABITACION1` FOREIGN KEY (`id_habitacion`) REFERENCES `tb_habitacion` (`id_habitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_PEDIDO_TB_USUARIO1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_reservacion`
--

/*!40000 ALTER TABLE `tb_reservacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_reservacion` ENABLE KEYS */;


--
-- Definition of table `tb_rol`
--

DROP TABLE IF EXISTS `tb_rol`;
CREATE TABLE `tb_rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_rol` varchar(45) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `descripcion_rol_UNIQUE` (`descripcion_rol`),
  UNIQUE KEY `id_rol_UNIQUE` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rol`
--

/*!40000 ALTER TABLE `tb_rol` DISABLE KEYS */;
INSERT INTO `tb_rol` (`id_rol`,`descripcion_rol`,`estado`) VALUES 
 (1,'Administrador','1'),
 (2,'Recepcionista','1'),
 (3,'Cliente','1'),
 (4,'Publico','1');
/*!40000 ALTER TABLE `tb_rol` ENABLE KEYS */;


--
-- Definition of table `tb_sede`
--

DROP TABLE IF EXISTS `tb_sede`;
CREATE TABLE `tb_sede` (
  `id_sede` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sede` varchar(55) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_distrito` int(11) NOT NULL,
  `direccion` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id_sede`),
  KEY `fk_tb_sede_tb_distrito1_idx` (`id_distrito`),
  CONSTRAINT `fk_tb_sede_tb_distrito1` FOREIGN KEY (`id_distrito`) REFERENCES `tb_distrito` (`id_distrito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sede`
--

/*!40000 ALTER TABLE `tb_sede` DISABLE KEYS */;
INSERT INTO `tb_sede` (`id_sede`,`nombre_sede`,`estado`,`id_distrito`,`direccion`) VALUES 
 (1,'Hostal DC 1',1,1,'Calle Abc Mz R lt 56');
/*!40000 ALTER TABLE `tb_sede` ENABLE KEYS */;


--
-- Definition of table `tb_tipo_comprobante`
--

DROP TABLE IF EXISTS `tb_tipo_comprobante`;
CREATE TABLE `tb_tipo_comprobante` (
  `id_tipo_comprobante` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id_tipo_comprobante`),
  UNIQUE KEY `id_tipo_comprobante_UNIQUE` (`id_tipo_comprobante`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tipo_comprobante`
--

/*!40000 ALTER TABLE `tb_tipo_comprobante` DISABLE KEYS */;
INSERT INTO `tb_tipo_comprobante` (`id_tipo_comprobante`,`descripcion`,`estado`) VALUES 
 (1,'Boleta','1'),
 (2,'Factura','1');
/*!40000 ALTER TABLE `tb_tipo_comprobante` ENABLE KEYS */;


--
-- Definition of table `tb_tipo_documento`
--

DROP TABLE IF EXISTS `tb_tipo_documento`;
CREATE TABLE `tb_tipo_documento` (
  `Id_tipodocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_documento` varchar(30) NOT NULL,
  `estado_documento` char(1) NOT NULL,
  `longMax` int(11) DEFAULT NULL,
  `longMin` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_tipodocumento`),
  UNIQUE KEY `nombre_documento_UNIQUE` (`nombre_documento`),
  UNIQUE KEY `Id_tipodocumento_UNIQUE` (`Id_tipodocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tipo_documento`
--

/*!40000 ALTER TABLE `tb_tipo_documento` DISABLE KEYS */;
INSERT INTO `tb_tipo_documento` (`Id_tipodocumento`,`nombre_documento`,`estado_documento`,`longMax`,`longMin`) VALUES 
 (1,'DNI','1',8,8),
 (2,'pasaporte','1',12,8),
 (3,'RUC','1',11,11),
 (4,'Militar','1',8,8),
 (5,'d','0',4,4),
 (6,'ddddddcfcccccccccccccccccccccc','0',17,8),
 (7,'e','0',3,2),
 (8,'eee','0',2,1),
 (10,'eeedsssss','0',3,0),
 (11,'edsr','0',5,0),
 (12,'ERDER','0',4,3),
 (13,'ereeeeeeee','0',11,11),
 (14,'yyy','0',8,6),
 (18,'dnu','0',8,8),
 (19,'dnix','1',8,8),
 (22,'DNI 2','1',7,7);
/*!40000 ALTER TABLE `tb_tipo_documento` ENABLE KEYS */;


--
-- Definition of table `tb_tipo_habitacion`
--

DROP TABLE IF EXISTS `tb_tipo_habitacion`;
CREATE TABLE `tb_tipo_habitacion` (
  `id_tipo_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_habitacion`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tipo_habitacion`
--

/*!40000 ALTER TABLE `tb_tipo_habitacion` DISABLE KEYS */;
INSERT INTO `tb_tipo_habitacion` (`id_tipo_habitacion`,`descripcion`,`estado`) VALUES 
 (1,'Doble','1'),
 (2,'Simple','1');
/*!40000 ALTER TABLE `tb_tipo_habitacion` ENABLE KEYS */;


--
-- Definition of table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `clave_usuario` varchar(45) NOT NULL,
  `estado_usuario` char(1) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  KEY `fk_TB_USUARIO_TB_PERSONA1` (`id_persona`),
  KEY `fk_TB_USUARIO_TB_ROL1` (`id_rol`),
  CONSTRAINT `fk_TB_USUARIO_TB_PERSONA1` FOREIGN KEY (`id_persona`) REFERENCES `tb_persona` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_USUARIO_TB_ROL1` FOREIGN KEY (`id_rol`) REFERENCES `tb_rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=540 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_usuario`
--

/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` (`id_usuario`,`usuario`,`clave_usuario`,`estado_usuario`,`id_persona`,`id_rol`,`estado`) VALUES 
 (1,'061193','7c4a8d09ca3762af61e59520943dc26494f8941b','1',1,2,'verificada'),
 (4,'7348399566','46137adc38ab7cccb75f5cf19b5f7f9f47debee6','1',6,1,'verificada'),
 (9,'73483995','7c4a8d09ca3762af61e59520943dc26494f8941b','1',11,3,'verificada'),
 (10,'123456','7c4a8d09ca3762af61e59520943dc26494f8941b','1',12,1,'por_verificar'),
 (11,'0123','c4b5c86bd577da3d93fea7c89cba61c78b48e589','1',13,1,'por_verificar'),
 (12,'78965412','3b52f070bd4f5595f5059cd93b2a426c2deeeab1','1',14,3,'por_verificar'),
 (13,'5466','52dc2eec697d9b81d8238a6f78a629e480b6a688','1',15,3,'por_verificar'),
 (15,'77777778','41ed02367e911ebc998f5b5a2c435abcbac043d2','1',17,3,'por_verificar'),
 (16,'768030869','0ca1c480727d3d6372208c26dc2aeb14d6b51a15','1',18,3,'por_verificar'),
 (223,'01101111011','cc2c4d77ff1f281702e5f9bc205a7c0097079852','1',225,3,'por_verificar'),
 (425,'777452122221','5b2146786f92d1e7688c394a55102e48971a32c0','1',427,3,'por_verificar'),
 (427,'78555555555','b221de787e268388da88207fcc4ad6241036dc32','1',429,3,'por_verificar'),
 (428,'78555555554','3064f027b3378931748ce3fc266fdeb710645741','1',430,3,'por_verificar'),
 (429,'78555555553','65d3e6c29216780bfceda0c9d2e5c8bda741ae0f','1',431,3,'por_verificar'),
 (430,'78555555552','d8ee6fdc502501d2cc2d6b887f4579259a3ec061','1',432,3,'por_verificar'),
 (431,'78555555551','b1453063bc481db8ffab08d32ed4a2db426114a2','1',433,3,'por_verificar'),
 (432,'78555555550','9832d39d04f9b5ff6828637a6ce4a07c34dea74b','1',434,3,'por_verificar'),
 (433,'78555555549','65d44edf0fcf62e1f5a68f240fc72596959049e3','1',435,3,'por_verificar'),
 (434,'78555555548','3d7f4458530dc3f1159dec4512ff2a02b54dd5cd','1',436,3,'por_verificar'),
 (435,'78555555547','a16d751344a189dc7e684aed342751cef807771a','1',437,3,'por_verificar'),
 (436,'78555555546','dcd5dc652f0591322f4451600c89fa5e57cb0281','1',438,3,'por_verificar'),
 (437,'78555555545','0c323eb722de42fc2840b1d9e36aa9e6ede9b4e0','1',439,3,'por_verificar'),
 (438,'78555555544','b0429c8c71d19b72d5c5f17cddfeffbeecbbe2ad','1',440,3,'por_verificar'),
 (439,'78555555543','c9a613f343902ad95e5ac77fbfef1d8789d2ebd6','1',441,3,'por_verificar'),
 (440,'78555555542','4ea24b572bd6b6100dca65cd0e86d95d1bd515d9','1',442,3,'por_verificar'),
 (441,'78555555541','0b051cd4fd4cb03702c9e4fffacc150a2c08bfe4','1',443,3,'por_verificar'),
 (442,'78555555540','70d90d8ecf0b005e6cdb4d7f97f174e4a342ce01','1',444,3,'por_verificar'),
 (443,'78555555539','f8fee95989a6ba88e722218d6e05fe9c6af1b96f','1',445,3,'por_verificar'),
 (444,'78555555538','9840a6a6b43ae3a2e4c559b289599f7887cf7dad','1',446,3,'por_verificar'),
 (445,'78555555537','c149993efb923c5ae427710aa803b4032bff878a','1',447,3,'por_verificar'),
 (446,'78555555536','c7be3a051ff6f776377b4496330fba14c293b753','1',448,3,'por_verificar'),
 (447,'78555555535','408512bff5108fee709bb90e2f83f44f260e5474','1',449,3,'por_verificar'),
 (448,'78555555534','02326c50d7cf195573b9b87ca946d7f7247a2d36','1',450,3,'por_verificar'),
 (449,'78555555533','b8744da878d43605134c8f2cd3f3e9e859166a4f','1',451,3,'por_verificar'),
 (450,'78555555532','dfe43dabd0e3ce8398b7f4ea09251f303e1f41a8','1',452,3,'por_verificar'),
 (451,'78555555531','be6f8cc6853711572bd428fbb35070d56adbe681','1',453,3,'por_verificar'),
 (452,'78555555530','5320b008d5ecce10325512c4228ae0282e5d7e89','1',454,3,'por_verificar'),
 (453,'78555555529','ed17972ee09f0fc256350f91ff70e51adcdd4fa6','1',455,3,'por_verificar'),
 (454,'78555555528','28088818ca212f569b4256f56fd410080af5cf8e','1',456,3,'por_verificar'),
 (455,'78555555527','e11a717a8d74c6c77d7ec1847fc4781b1dc3d583','1',457,3,'por_verificar'),
 (456,'78555555526','4f6aa63c116410a71e3c279d16ec6bdbbb35f647','1',458,3,'por_verificar'),
 (457,'78555555525','8262054c1099e37558180fb44e13f0aa98cc3f85','1',459,3,'por_verificar'),
 (458,'78555555524','e89573f49375428c810f6ff439bce4f8fc12faff','1',460,3,'por_verificar'),
 (459,'78555555523','df269fa6b12291be30cf6d245e2c5ca4a6618549','1',461,3,'por_verificar'),
 (460,'78555555522','f6d88e0651c4ff9408dfebdf4e4ce63952379469','1',462,3,'por_verificar'),
 (461,'78555555521','51a77884d0157c16e85bcfe781ea08a07be8370b','1',463,3,'por_verificar'),
 (462,'78555555520','9896167dddd8ac686789d34e19726b86d5f55959','1',464,3,'por_verificar'),
 (463,'78555555519','4822577af68618d86f607875cd60c1f428297032','1',465,3,'por_verificar'),
 (464,'78555555518','dcf5d241364e1b150c13217f73e111841f2df84a','1',466,3,'por_verificar'),
 (465,'78555555517','7eb88ceff57fdd3c3881dfe7c563354cde7c8349','1',467,3,'por_verificar'),
 (466,'78555555516','12cf05b7e92dc4a334e23ec145e158f6420ece18','1',468,3,'por_verificar'),
 (467,'78555555515','8e77247a8a08806729e75ed760911ae7c5a6fa50','1',469,3,'por_verificar'),
 (468,'78555555514','ea96ad2877a886a4f16a9a2fb0777cf8279f34f6','1',470,3,'por_verificar'),
 (469,'78555555513','211a526258e4c00a095d3dce79bbad819b44f692','1',471,3,'por_verificar'),
 (470,'78555555512','1b66aa2d6dff3b61c8c9a4ca90ae50af120f035d','1',472,3,'por_verificar'),
 (471,'78555555511','0d5ccd760942711e48f1d811d2b41ecf40fd9532','1',473,3,'por_verificar'),
 (472,'78555555510','bd3b7ac71869232fdaf7f34b0fc95d7dcb780228','1',474,3,'por_verificar'),
 (473,'78555555509','fdc756b6b8cb2eb72cea7774269c42c06714b476','1',475,3,'por_verificar'),
 (474,'78555555508','1a7e9ebd9cc2c7c6811ef88229927c8ce60b5f03','1',476,3,'por_verificar'),
 (475,'78555555507','86e811efb3e59cbae1d793f3880244477bb17f70','1',477,3,'por_verificar'),
 (476,'78555555506','58b98a961b9e92bd7245836a424f31ee22785c65','1',478,3,'por_verificar'),
 (477,'78555555505','1532175a9c3333b639f7175d3411dca33faf3c84','1',479,3,'por_verificar'),
 (478,'78555555504','28208d0ac6bd6617ab6b27e34636f45a1d3e7a92','1',480,3,'por_verificar'),
 (479,'78555555503','688a6bdb09e4cdc006feede5c115b52218704575','1',481,3,'por_verificar'),
 (480,'78555555502','4ce03d6bedf59aa3038fd947cf18a688ad12f2db','1',482,3,'por_verificar'),
 (481,'78555555501','ece3a83844a1669466eea70baa8e9e6c881038de','1',483,3,'por_verificar'),
 (482,'78555555500','17c5589b086d7b7089544162acd965821aed590f','1',484,3,'por_verificar'),
 (483,'78555555499','e79054feca4da80bf79156f84d517d576b16b30d','1',485,3,'por_verificar'),
 (484,'78555555498','dd6b6a12599e6b071d8c808e0998d1e63acd05d4','1',486,3,'por_verificar'),
 (485,'78555555497','3af6f065812a173895a8396c1593a8c96687dd3d','1',487,3,'por_verificar'),
 (486,'78555555496','dbe8ccccca3a2c3bf44402a20145f92bf9da963b','1',488,3,'por_verificar'),
 (487,'78555555495','45d3c3dbd276dbb37c6a9b69640d6b2a2103114d','1',489,3,'por_verificar'),
 (488,'78555555494','2b80dae25da7e1053a197d7eb288efb577189c21','1',490,3,'por_verificar'),
 (489,'78555555493','8e73f288f956eda41e917d02483817404959e22b','1',491,3,'por_verificar'),
 (490,'78555555492','82d382d466a69f4053d0b66a4782bac194d6cb35','1',492,3,'por_verificar'),
 (491,'78555555491','c058467e376103db00ab1f117d518a73e714c552','1',493,3,'por_verificar'),
 (492,'78555555490','54d7063fa90d7ff0237177094cb1d5fcaf29f195','1',494,3,'por_verificar'),
 (493,'78555555489','994f350980dd8ad1b9bcbc2f2b4e1260c2b704ff','1',495,3,'por_verificar'),
 (494,'78555555488','2794c08b4af4d179d1b8bd5a8e78b85b6b89d491','1',496,3,'por_verificar'),
 (495,'78555555487','12a4876ed55106b4acde97ffd2ba3b06d68e2756','1',497,3,'por_verificar'),
 (496,'78555555486','b137c852ae5399b542ff6716ea42e3d906d286c3','1',498,3,'por_verificar'),
 (497,'78555555485','30fbf1a21009b218befc2ca8b152c7e57d60eeb6','1',499,3,'por_verificar'),
 (498,'78555555484','230bb7097bb2d4093934b5ff1733b4b206636bd1','1',500,3,'por_verificar'),
 (499,'78555555483','0169e6fa8c643180745daeebf423b4233308e7c9','1',501,3,'por_verificar'),
 (500,'78555555482','440a2ae873b99b1c65febcb34428b2c815c5deb2','1',502,3,'por_verificar'),
 (501,'78555555481','417b3a27d7132c173b8b78ccd7a87fb9ea451694','1',503,3,'por_verificar'),
 (502,'78555555480','f94f6ac2811c9e736f1622f7f358cb50b8fc9b0c','1',504,3,'por_verificar'),
 (503,'78555555479','0ddc2d00288f2786c3bb65c4ab6bad6ecb041017','1',505,3,'por_verificar'),
 (504,'78555555478','288e9dc64a40595d60c01be7719059823e672713','1',506,3,'por_verificar'),
 (505,'78555555477','baff1a7143f2203f2c3896d58716891ecab2c48c','1',507,3,'por_verificar'),
 (506,'78555555476','444cdbc2ed6abce2d8c9c86155ad0f849cb3c637','1',508,3,'por_verificar'),
 (507,'78555555475','8c1351edefeba655aff5efbde2b6d74829216f9c','1',509,3,'por_verificar'),
 (508,'78555555474','0309714c65ea5d8395ab3dd6d5ae75142316cbf4','1',510,3,'por_verificar'),
 (509,'78555555473','993241d7a54afdecbe92a2bad25e0e4a3e5eeb57','1',511,3,'por_verificar'),
 (510,'78555555472','0d6d1aec264e6c02be74f09196cc8a2dd3e5667a','1',512,3,'por_verificar'),
 (511,'78555555471','daddbcf17ef262895700500bded91f7fea1f9d52','1',513,3,'por_verificar'),
 (512,'78555555470','7f794e633dcb407917b51196642161a10214e6e6','1',514,3,'por_verificar'),
 (513,'78555555469','737e6a9848abbe67331c01158ca2d78996bc6080','1',515,3,'por_verificar'),
 (514,'78555555468','5927a76c3cd1246eee0ff4adfaa46484995b060e','1',516,3,'por_verificar'),
 (515,'78555555467','4b47d278d9b0bfae3007732259a12e897dad5050','1',517,3,'por_verificar'),
 (516,'78555555466','19fc66815ff9b0e13346a33cff2c9f870d4e50f4','1',518,3,'por_verificar'),
 (517,'78555555465','4bf355e92e0bf5655f0ca00c28344ec50e1f4759','1',519,3,'por_verificar'),
 (518,'78555555464','0cab50fd31bb4d78afcd2a31d19b3c79aa86162c','1',520,3,'por_verificar'),
 (519,'78555555463','14bd2c992f0bc7ae728decd5a42fdb7912895c52','1',521,3,'por_verificar'),
 (520,'78555555462','7aaceca66df30c1bb6e07a27f6774e96de3f264e','1',522,3,'por_verificar'),
 (521,'78555555461','8406dbd2a03568faf646121e344cfbdb0d206f6d','1',523,3,'por_verificar'),
 (522,'78555555460','439d33bfabbb2d6e6c5d17815777c7a32e306d26','1',524,3,'por_verificar'),
 (523,'78555555459','22d6f371e9977bc694d27983b547f408a9b0a860','1',525,3,'por_verificar'),
 (524,'78555555458','c3fd5ab4a0a07aa0894863c700dad90f63fc2410','1',526,3,'por_verificar'),
 (525,'78555555457','313e02c90bb32361091052482611b7ff924bf8e7','1',527,3,'por_verificar'),
 (526,'78555555456','2d26eef62382992ea98e5091d024c343e6e594d8','1',528,3,'por_verificar'),
 (527,'78544454511','0c91a2c2f86774246685a385b2ead3bda060bcd7','1',529,3,'por_verificar'),
 (529,'100000000000','973a133df0baf976fcb822ffd4991d92cc793db7','1',531,3,'por_verificar'),
 (530,'99999000000','15481b4b4a2bc14f181d186b631c668e02c9c12c','1',532,3,'por_verificar'),
 (531,'88888888800','b5697f383f8d0a6415c2d717f4901c30175a6856','1',533,3,'por_verificar'),
 (536,'76834637','5adbe7eea24bdc54e40e29d94029118176070f0e','1',538,3,'por_verificar'),
 (538,'87777777','914a2584bb6cd5b994b4e2e69ea743839a7c5646','1',540,3,'por_verificar'),
 (539,'15151515','4f5ccd2460cd32f8bd8dfce6f5783db4382f7910','1',541,2,'por_verificar');
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;


--
-- Definition of view `v_desc_hab`
--

DROP TABLE IF EXISTS `v_desc_hab`;
DROP VIEW IF EXISTS `v_desc_hab`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_desc_hab` AS select `h`.`id_habitacion` AS `id_habitacion`,`h`.`numero_hab` AS `numero_hab`,`h`.`ubigeo_hab` AS `ubigeo_hab`,`h`.`disponibilidad_hab` AS `disponibilidad_hab`,`h`.`estado_hab` AS `estado_hab`,`th`.`descripcion` AS `tipohab`,`h`.`precio` AS `precio`,`h`.`img` AS `img`,`h`.`descripcion` AS `descripcion` from (`tb_habitacion` `h` join `tb_tipo_habitacion` `th`) where ((`h`.`id_tipo_habitacion` = `th`.`id_tipo_habitacion`) and (`h`.`estado_hab` = 1)) order by 4 desc;

--
-- Definition of view `v_empleado_rol`
--

DROP TABLE IF EXISTS `v_empleado_rol`;
DROP VIEW IF EXISTS `v_empleado_rol`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_empleado_rol` AS select `e`.`ID_PERSONA` AS `ID_PERSONA`,`p`.`numero_documento` AS `numero_documento`,concat(`p`.`apellidopater_persona`,' ',`p`.`apellidomater_persona`) AS `apellidos`,`p`.`nombres_persona` AS `nombres_persona`,`p`.`direccion_persona` AS `direccion_persona`,`p`.`email_persona` AS `email_persona`,`r`.`descripcion_rol` AS `descx` from (((`tb_persona` `p` join `tb_usuario` `u`) join `tb_empleado` `e`) join `tb_rol` `r`) where ((`p`.`ID_PERSONA` = `e`.`ID_PERSONA`) and (`u`.`id_persona` = `p`.`ID_PERSONA`) and (`u`.`id_rol` = `r`.`id_rol`) and (`u`.`estado_usuario` = 1));

--
-- Definition of view `v_empleados`
--

DROP TABLE IF EXISTS `v_empleados`;
DROP VIEW IF EXISTS `v_empleados`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_empleados` AS select `p`.`ID_PERSONA` AS `ID_PERSONA`,`p`.`numero_documento` AS `numero_documento`,concat(`p`.`apellidopater_persona`,' ',`p`.`apellidomater_persona`) AS `apellidos`,`p`.`nombres_persona` AS `nombres_persona`,`p`.`direccion_persona` AS `direccion_persona`,`c`.`cargo` AS `descx`,`p`.`email_persona` AS `email_persona` from ((`tb_persona` `p` join `tb_cargo` `c`) join `tb_empleado` `e`) where ((`p`.`ID_PERSONA` = `e`.`ID_PERSONA`) and (`c`.`id_cargo` = `e`.`id_cargo`) and (`e`.`estado` = 1));

--
-- Definition of view `v_habitacion`
--

DROP TABLE IF EXISTS `v_habitacion`;
DROP VIEW IF EXISTS `v_habitacion`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_habitacion` AS select `h`.`id_habitacion` AS `id_habitacion`,`h`.`numero_hab` AS `numero_hab`,`h`.`ubigeo_hab` AS `ubigeo_hab`,`h`.`disponibilidad_hab` AS `disponibilidad_hab`,`h`.`precio` AS `precio`,`t`.`descripcion` AS `descripcion`,`h`.`img` AS `img` from (`tb_tipo_habitacion` `t` join `tb_habitacion` `h`) where ((`h`.`id_tipo_habitacion` = `t`.`id_tipo_habitacion`) and (`h`.`estado_hab` = 1));

--
-- Definition of view `v_login`
--

DROP TABLE IF EXISTS `v_login`;
DROP VIEW IF EXISTS `v_login`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_login` AS select `p`.`ID_PERSONA` AS `id`,`p`.`numero_documento` AS `numero_documento`,`p`.`apellidopater_persona` AS `apellidopater_persona`,`p`.`apellidomater_persona` AS `apellidomater_persona`,`p`.`nombres_persona` AS `nombres_persona`,`u`.`usuario` AS `usuario`,`u`.`id_rol` AS `id_rol`,`u`.`clave_usuario` AS `clave_usuario` from (`tb_usuario` `u` join `tb_persona` `p`) where ((`p`.`ID_PERSONA` = `u`.`id_persona`) and (`u`.`estado_usuario` = 1));

--
-- Definition of view `v_productos`
--

DROP TABLE IF EXISTS `v_productos`;
DROP VIEW IF EXISTS `v_productos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_productos` AS select `p`.`id_producto` AS `id_producto`,`p`.`codigo_referencial` AS `codigo_referencial`,`p`.`precio` AS `precio`,`p`.`stock` AS `stock`,`p`.`descripcion_producto` AS `descripcion_producto`,`c`.`descripcion_categoria` AS `descripcion_categoria`,`m`.`descripcion_marca` AS `descripcion_marca`,`p`.`img` AS `img`,`p`.`descripcion_producto` AS `estado` from ((`tb_producto` `p` join `tb_categoria_producto` `c`) join `tb_marca_producto` `m`) where ((`p`.`id_categoria_producto` = `c`.`id_categoria_producto`) and (`p`.`id_marca_producto` = `m`.`id_marca_producto`) and (`p`.`estado` = 1));



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
