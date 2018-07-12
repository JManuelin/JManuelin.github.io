-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.24


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
  `estado` char(1),
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
  `id_usuario` int(11),
  `id_empleado` int(11),
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
-- Temporary table structure for view `v_marca_categoria`
--
DROP TABLE IF EXISTS `v_marca_categoria`;
DROP VIEW IF EXISTS `v_marca_categoria`;
CREATE TABLE `v_marca_categoria` (
  `id_detalle` int(11),
  `descripcion_marca` varchar(15),
  `id_marca_producto` int(11),
  `id_categoria_producto` int(11)
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
  `fecha_salida` varchar(10) DEFAULT NULL,
  `hora_salida` varchar(12) DEFAULT NULL,
  `ID_PERSONA` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alquiler`),
  KEY `fk_TB_ALQUILER_TB_PERSONA1` (`ID_PERSONA`),
  KEY `fk_TB_ALQUILER_TB_EMPLEADO1` (`id_empleado`),
  CONSTRAINT `fk_TB_ALQUILER_TB_EMPLEADO1` FOREIGN KEY (`id_empleado`) REFERENCES `tb_empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_ALQUILER_TB_PERSONA1` FOREIGN KEY (`ID_PERSONA`) REFERENCES `tb_persona` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_alquiler`
--

/*!40000 ALTER TABLE `tb_alquiler` DISABLE KEYS */;
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
 (2,'Recepcionista','1');
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
 (4,'cerveza'),
 (1,'Gaseosa'),
 (2,'Licores');
/*!40000 ALTER TABLE `tb_categoria_producto` ENABLE KEYS */;


--
-- Definition of table `tb_cm_producto`
--

DROP TABLE IF EXISTS `tb_cm_producto`;
CREATE TABLE `tb_cm_producto` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria_producto` int(11) DEFAULT NULL,
  `id_marca_producto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `fk_c_d` (`id_categoria_producto`),
  KEY `fk_m_d` (`id_marca_producto`),
  CONSTRAINT `fk_c_d` FOREIGN KEY (`id_categoria_producto`) REFERENCES `tb_categoria_producto` (`id_categoria_producto`),
  CONSTRAINT `fk_m_d` FOREIGN KEY (`id_marca_producto`) REFERENCES `tb_marca_producto` (`id_marca_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cm_producto`
--

/*!40000 ALTER TABLE `tb_cm_producto` DISABLE KEYS */;
INSERT INTO `tb_cm_producto` (`id_detalle`,`id_categoria_producto`,`id_marca_producto`) VALUES 
 (1,1,1),
 (15,1,2),
 (16,1,4);
/*!40000 ALTER TABLE `tb_cm_producto` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_comprobante`
--

/*!40000 ALTER TABLE `tb_comprobante` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_comprobante` ENABLE KEYS */;


--
-- Definition of table `tb_confi`
--

DROP TABLE IF EXISTS `tb_confi`;
CREATE TABLE `tb_confi` (
  `idconfig` int(11) NOT NULL AUTO_INCREMENT,
  `website` varchar(50) DEFAULT NULL,
  `igv` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idconfig`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_confi`
--

/*!40000 ALTER TABLE `tb_confi` DISABLE KEYS */;
INSERT INTO `tb_confi` (`idconfig`,`website`,`igv`) VALUES 
 (1,'http://127.0.0.19','0.18');
/*!40000 ALTER TABLE `tb_confi` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_detalle_alquiler`
--

/*!40000 ALTER TABLE `tb_detalle_alquiler` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_detalle_pedido`
--

/*!40000 ALTER TABLE `tb_detalle_pedido` DISABLE KEYS */;
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
 (1,'1',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_habitacion`
--

/*!40000 ALTER TABLE `tb_habitacion` DISABLE KEYS */;
INSERT INTO `tb_habitacion` (`id_habitacion`,`numero_hab`,`ubigeo_hab`,`disponibilidad_hab`,`estado_hab`,`id_tipo_habitacion`,`precio`,`img`,`descripcion`,`id_sede`) VALUES 
 (27,1,'primer piso','disponible','1',2,'15.00','img/dormitorio-habitacion-cuarto-pintado-de-rojo-y-blanco1.jpg','sin descripcion',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_marca_producto`
--

/*!40000 ALTER TABLE `tb_marca_producto` DISABLE KEYS */;
INSERT INTO `tb_marca_producto` (`id_marca_producto`,`descripcion_marca`) VALUES 
 (3,'7up'),
 (13,'Cielo'),
 (1,'Coca-cola'),
 (2,'Inka cola'),
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
 (8,'Tipo de Documento','Mantenimiento','../view/v_tipo_documento.php','1',1),
 (9,'Registrar persona','Mantenimiento','../view/v_persona.php','1',1),
 (10,'Habitaciones','Habitaciones','../view/v_habitacion.php','1',1),
 (11,'Liberar','Habitaciones','../view/v_liberar.php','1',2),
 (12,'Ver Disponibles','Habitaciones','../view/v_habitacionh.php?dis','1',2),
 (14,'Habitaciones','Habitaciones','../view/v_habitacionh.php','1',2),
 (18,'Mi Carrito','Mi Carrito','../view/v_micarrito.php','1',3),
 (19,'Permisos','Permisos','../view/v_man_permisos.php','1',1),
 (22,'Salir','Salir','../view/exit.php','1',1),
 (23,'Salir','Salir','../view/exit.php','1',3),
 (25,'Productos','Productos','../view/vs_producto.php','1',3),
 (27,'Comprobante alquiler','Comprobante','../view/v_comprobante.php','1',2),
 (28,'Salir','Salir','../view/exit.php','1',2),
 (31,'Registrar','Registrar','../view/v_persona.php','1',2),
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
 (1,1,'73483995','suarez','loli','edson j','puerto supe','956970181','947390162','edson061193@gmail.com','1');
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
  `img` varchar(65) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `stock_min` int(11) NOT NULL,
  `stock_max` int(11) NOT NULL,
  `cate_marc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `id_producto_UNIQUE` (`id_producto`),
  UNIQUE KEY `codigo_referencial_UNIQUE` (`codigo_referencial`),
  KEY `pk_categoria_marca` (`cate_marc`),
  CONSTRAINT `pk_categoria_marca` FOREIGN KEY (`cate_marc`) REFERENCES `tb_cm_producto` (`id_detalle`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_producto`
--

/*!40000 ALTER TABLE `tb_producto` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tipo_documento`
--

/*!40000 ALTER TABLE `tb_tipo_documento` DISABLE KEYS */;
INSERT INTO `tb_tipo_documento` (`Id_tipodocumento`,`nombre_documento`,`estado_documento`,`longMax`,`longMin`) VALUES 
 (1,'DNI','1',8,8),
 (2,'pasaporte','1',12,8),
 (3,'RUC','1',11,11),
 (4,'Militar','1',8,8);
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
 (1,'73483995','44b0a674c5fe395ddfa3dcd88fc0298ec0b488c6','1',1,1,'1');
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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_empleado_rol` AS select `e`.`ID_PERSONA` AS `ID_PERSONA`,`e`.`estado` AS `estado`,`p`.`numero_documento` AS `numero_documento`,concat(`p`.`apellidopater_persona`,' ',`p`.`apellidomater_persona`) AS `apellidos`,`p`.`nombres_persona` AS `nombres_persona`,`p`.`direccion_persona` AS `direccion_persona`,`p`.`email_persona` AS `email_persona`,`r`.`descripcion_rol` AS `descx` from (((`tb_persona` `p` join `tb_usuario` `u`) join `tb_empleado` `e`) join `tb_rol` `r`) where ((`p`.`ID_PERSONA` = `e`.`ID_PERSONA`) and (`u`.`id_persona` = `p`.`ID_PERSONA`) and (`u`.`id_rol` = `r`.`id_rol`) and (`u`.`estado_usuario` = 1) and (`e`.`estado` = 1));

--
-- Definition of view `v_empleados`
--

DROP TABLE IF EXISTS `v_empleados`;
DROP VIEW IF EXISTS `v_empleados`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_empleados` AS select `p`.`ID_PERSONA` AS `ID_PERSONA`,`u`.`id_usuario` AS `id_usuario`,`e`.`id_empleado` AS `id_empleado`,`p`.`numero_documento` AS `numero_documento`,concat(`p`.`apellidopater_persona`,' ',`p`.`apellidomater_persona`) AS `apellidos`,`p`.`nombres_persona` AS `nombres_persona`,`p`.`direccion_persona` AS `direccion_persona`,`c`.`cargo` AS `descx`,`p`.`email_persona` AS `email_persona` from (((`tb_persona` `p` join `tb_cargo` `c`) join `tb_usuario` `u`) join `tb_empleado` `e`) where ((`p`.`ID_PERSONA` = `e`.`ID_PERSONA`) and (`c`.`id_cargo` = `e`.`id_cargo`) and (`u`.`id_persona` = `p`.`ID_PERSONA`) and (`e`.`estado` = '1'));

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
-- Definition of view `v_marca_categoria`
--

DROP TABLE IF EXISTS `v_marca_categoria`;
DROP VIEW IF EXISTS `v_marca_categoria`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_marca_categoria` AS select `cm`.`id_detalle` AS `id_detalle`,`m`.`descripcion_marca` AS `descripcion_marca`,`m`.`id_marca_producto` AS `id_marca_producto`,`cm`.`id_categoria_producto` AS `id_categoria_producto` from ((`tb_cm_producto` `cm` join `tb_marca_producto` `m`) join `tb_categoria_producto` `c`) where ((`cm`.`id_marca_producto` = `m`.`id_marca_producto`) and (`c`.`id_categoria_producto` = `cm`.`id_categoria_producto`));

--
-- Definition of view `v_productos`
--

DROP TABLE IF EXISTS `v_productos`;
DROP VIEW IF EXISTS `v_productos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_productos` AS select `p`.`id_producto` AS `id_producto`,`p`.`codigo_referencial` AS `codigo_referencial`,`p`.`precio` AS `precio`,`p`.`stock` AS `stock`,`p`.`descripcion_producto` AS `descripcion_producto`,`c`.`descripcion_categoria` AS `descripcion_categoria`,`m`.`descripcion_marca` AS `descripcion_marca`,`p`.`img` AS `img`,`p`.`descripcion_producto` AS `estado` from (((`tb_producto` `p` join `tb_cm_producto` `cm`) join `tb_categoria_producto` `c`) join `tb_marca_producto` `m`) where ((`cm`.`id_categoria_producto` = `c`.`id_categoria_producto`) and (`cm`.`id_marca_producto` = `m`.`id_marca_producto`) and (`p`.`cate_marc` = `cm`.`id_detalle`) and (`p`.`estado` = 1));



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
