-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-03-2018 a las 22:33:14
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gcontratos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causal`
--

DROP TABLE IF EXISTS `causal`;
CREATE TABLE IF NOT EXISTS `causal` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `causal`
--

INSERT INTO `causal` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'C10', 'CAUSAL 32', 1),
(2, 'A100', 'CAUSAL 10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contracto`
--

DROP TABLE IF EXISTS `contracto`;
CREATE TABLE IF NOT EXISTS `contracto` (
  `id` varchar(50) NOT NULL,
  `depend_id` int(2) DEFAULT NULL,
  `seccion` varchar(60) DEFAULT NULL,
  `m_selecc_id` int(11) DEFAULT NULL,
  `causal_id` int(11) DEFAULT NULL,
  `t_contract_id` int(11) DEFAULT NULL,
  `t_gasto_id` int(11) DEFAULT NULL,
  `fec_suscripc` date DEFAULT NULL,
  `fec_ini` date DEFAULT NULL,
  `fec_termn` date DEFAULT NULL,
  `plazo_ejecuc` int(4) DEFAULT NULL,
  `objeto` varchar(256) DEFAULT NULL,
  `res_adjud` varchar(50) DEFAULT NULL,
  `fec_adjud` date DEFAULT NULL,
  `valor_ini` float DEFAULT NULL,
  `anticipo` int(1) DEFAULT NULL,
  `valor_anticp` float DEFAULT NULL,
  `public_secop` int(1) DEFAULT NULL,
  `fpublic_secop` date DEFAULT NULL,
  `actulz_secop` int(1) DEFAULT NULL,
  `factulz_secop` date DEFAULT NULL,
  `link_secop` varchar(256) DEFAULT NULL,
  `fiducia` int(1) DEFAULT NULL,
  `observ` varchar(256) DEFAULT NULL,
  `afect_presupt` int(1) DEFAULT NULL,
  `t_recurs_id` int(11) DEFAULT NULL,
  `t_liquid_id` int(11) DEFAULT NULL,
  `doc_liquid` varchar(50) DEFAULT NULL,
  `fec_liquid` date DEFAULT NULL,
  `funcion_id` int(11) DEFAULT NULL,
  `segmento` varchar(256) DEFAULT NULL,
  `eje` varchar(50) DEFAULT NULL,
  `est` varchar(50) DEFAULT NULL,
  `prog` varchar(50) DEFAULT NULL,
  `estado_id` int(2) NOT NULL,
  `fec_reg` datetime DEFAULT NULL,
  `fec_mod` datetime DEFAULT NULL,
  `user_id` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contracto`
--

INSERT INTO `contracto` (`id`, `depend_id`, `seccion`, `m_selecc_id`, `causal_id`, `t_contract_id`, `t_gasto_id`, `fec_suscripc`, `fec_ini`, `fec_termn`, `plazo_ejecuc`, `objeto`, `res_adjud`, `fec_adjud`, `valor_ini`, `anticipo`, `valor_anticp`, `public_secop`, `fpublic_secop`, `actulz_secop`, `factulz_secop`, `link_secop`, `fiducia`, `observ`, `afect_presupt`, `t_recurs_id`, `t_liquid_id`, `doc_liquid`, `fec_liquid`, `funcion_id`, `segmento`, `eje`, `est`, `prog`, `estado_id`, `fec_reg`, `fec_mod`, `user_id`) VALUES
('no100', 1, 'seccion222', 2, 2, 2, 2, '2018-03-01', '2018-03-02', '2018-03-03', 3, 'objeto', 'resolucion', '2018-03-04', 1000.23, 1, 2000, 1, '2018-03-05', 1, '2018-03-06', 'www.secop.gov.co', 1, 'observaciones', 0, 1, 1, 'doc liquid', '2018-03-07', 1, 'segmento del servicioffff', 'eje', 'est', 'prog', 1, '2018-03-15 18:22:09', '2018-03-16 10:32:50', 1144131603),
('no200', 1, 'seccion', 1, 1, 1, 1, '2018-03-01', '2018-03-02', '2018-03-03', 3, 'objeto', 'resolucion', '2018-03-04', 10.12, 1, 200, 1, '2018-03-05', 1, '2018-03-06', 'www.secop.gov.co', 1, 'observaciones', 0, 1, 1, 'doc liquid', '2018-03-07', 1, 'segmento del servicio', 'eje', 'est', 'prog', 1, '2018-03-15 18:25:39', '2018-03-15 18:25:39', 1144131603);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depend`
--

DROP TABLE IF EXISTS `depend`;
CREATE TABLE IF NOT EXISTS `depend` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `depend`
--

INSERT INTO `depend` (`id`, `nombre`, `estado_id`) VALUES
(1, 'Rectoria', 1),
(2, 'bbbbbbbbbbbbbbbb', 1),
(3, 'cccccccccccccccccc', 1),
(4, 'ddddddd', 0),
(5, 'hacienda', 1),
(6, 'REGISTRO ACADEMICO', 1),
(7, 'protocolo', 1),
(8, 'fiducia', 1),
(9, 'financiero', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(2) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

DROP TABLE IF EXISTS `funcion`;
CREATE TABLE IF NOT EXISTS `funcion` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'AA', 'FUNCION 1', 1),
(2, 'BB', 'FUNCION 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tabla` varchar(20) NOT NULL,
  `proceso` varchar(20) NOT NULL,
  `fecha_reg` date NOT NULL,
  `user_id` bigint(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `tabla`, `proceso`, `fecha_reg`, `user_id`) VALUES
(1, 'Usuario', 'UPDATE 1144131603', '0000-00-00', 1144131603),
(2, 'Usuario', 'UPDATE 1144131603', '0000-00-00', 1144131603),
(3, 'Usuario', 'UPDATE 1144131603', '0000-00-00', 1144131603),
(4, 'Usuario', 'UPDATE 1144131603', '0000-00-00', 1144131603),
(5, 'Usuario', 'UPDATE 1144131603', '2017-11-20', 1144131603),
(6, 'Usuario', 'UPDATE 200', '2017-11-20', 1144131603),
(7, 'Usuario', 'UPDATE 1144131603', '2017-11-21', 1144131603),
(8, 'producto', 'INSERT 10', '2017-11-25', 1144131603),
(9, 'producto', 'INSERT 20', '2017-11-25', 1144131603),
(10, 'Usuario', 'UPDATE 100', '2017-11-25', 1144131603),
(11, 'Usuario', 'UPDATE 100', '2017-11-25', 1144131603),
(12, 'Producto', 'UPDATE 10', '2017-11-29', 1144131603),
(13, 'Producto', 'UPDATE 10', '2017-11-29', 1144131603),
(14, 'Producto', 'UPDATE 10', '2017-11-29', 1144131603),
(15, 'Producto', 'UPDATE 10', '2017-11-29', 1144131603),
(16, 'Producto', 'UPDATE 10', '2017-11-29', 1144131603),
(17, 'Producto', 'UPDATE 10', '2017-11-29', 1144131603),
(18, 'combo', 'INSERT 1', '2017-11-29', 1144131603),
(19, 'combo', 'UPDATE 1', '2017-11-29', 1144131603),
(20, 'producto', 'INSERT 30', '2017-12-05', 1144131603),
(21, 'Producto', 'UPDATE 30', '2017-12-05', 1144131603),
(22, 'Producto', 'UPDATE 30', '2017-12-05', 1144131603),
(23, 'combo', 'UPDATE 1', '2017-12-26', 1144131603),
(24, 'combo', 'UPDATE 1', '2017-12-26', 1144131603),
(25, 'combo', 'INSERT 100', '2017-12-26', 1144131603),
(26, 'combo', 'UPDATE 1', '2017-12-26', 1144131603),
(27, 'combo', 'UPDATE 1', '2017-12-26', 1144131603),
(28, 'combo', 'UPDATE 100', '2017-12-26', 1144131603),
(29, 'combo', 'INSERT 300', '2017-12-26', 1144131603);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_selecc`
--

DROP TABLE IF EXISTS `m_selecc`;
CREATE TABLE IF NOT EXISTS `m_selecc` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `m_selecc`
--

INSERT INTO `m_selecc` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'MS10', 'MODALIDAD SELECCION 1', 1),
(2, 'MS-2', 'MODALIDAD SELECCION 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`, `estado_id`) VALUES
(1, 'Administrador', 1),
(2, 'Coordinador', 1),
(3, 'Digitador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_avance`
--

DROP TABLE IF EXISTS `t_avance`;
CREATE TABLE IF NOT EXISTS `t_avance` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_avance`
--

INSERT INTO `t_avance` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'cod1', 'AVANCE 1', 1),
(2, '122', 'AVANCE 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_clasific`
--

DROP TABLE IF EXISTS `t_clasific`;
CREATE TABLE IF NOT EXISTS `t_clasific` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_clasific`
--

INSERT INTO `t_clasific` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '100', 'CLASIFIC 1', 1),
(2, 'ASF12', 'CLASIFIC 2', 1),
(3, '50000', 'HOLAS', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_contract`
--

DROP TABLE IF EXISTS `t_contract`;
CREATE TABLE IF NOT EXISTS `t_contract` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_contract`
--

INSERT INTO `t_contract` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'CC10', 'CONTRACTO 1', 1),
(2, '100', 'CONTRACTO 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_contratist`
--

DROP TABLE IF EXISTS `t_contratist`;
CREATE TABLE IF NOT EXISTS `t_contratist` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_contratist`
--

INSERT INTO `t_contratist` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'CC99', 'CONTRATISTA 1', 1),
(2, '22AA', 'CONTRATISTA 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_document`
--

DROP TABLE IF EXISTS `t_document`;
CREATE TABLE IF NOT EXISTS `t_document` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_document`
--

INSERT INTO `t_document` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'NIT', 'Numero de Identificacion Tributaria', 1),
(2, 'CC', 'Cedula', 1),
(3, 'NP', 'Numero Pasaporte', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_gasto`
--

DROP TABLE IF EXISTS `t_gasto`;
CREATE TABLE IF NOT EXISTS `t_gasto` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_gasto`
--

INSERT INTO `t_gasto` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '10', 'Tipo Gastof 1', 1),
(2, 'BB20', 'TIPO GASTO 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_intervt`
--

DROP TABLE IF EXISTS `t_intervt`;
CREATE TABLE IF NOT EXISTS `t_intervt` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_intervt`
--

INSERT INTO `t_intervt` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'AA10', 'INTERVENTOR 1', 1),
(2, 'BB100', 'INTERVENTOR 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_liquid`
--

DROP TABLE IF EXISTS `t_liquid`;
CREATE TABLE IF NOT EXISTS `t_liquid` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_liquid`
--

INSERT INTO `t_liquid` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '100', 'EEEEEEEEEEEE', 1),
(2, '2512', 'hipotecario', 1),
(3, '100', 'financiero', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_noved`
--

DROP TABLE IF EXISTS `t_noved`;
CREATE TABLE IF NOT EXISTS `t_noved` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_noved`
--

INSERT INTO `t_noved` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'as12', 'NOVEDAD1', 1),
(2, 'AA200', 'NOVEADAD', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_poliza`
--

DROP TABLE IF EXISTS `t_poliza`;
CREATE TABLE IF NOT EXISTS `t_poliza` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_poliza`
--

INSERT INTO `t_poliza` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'BB11', 'POLIZA 1', 1),
(2, 'CC22', 'POLIZA 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_recurs`
--

DROP TABLE IF EXISTS `t_recurs`;
CREATE TABLE IF NOT EXISTS `t_recurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_recurs`
--

INSERT INTO `t_recurs` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '15020', 'prueba 1', 1),
(2, '1213', 'que tal', 0),
(3, '00', 'fff', 1),
(4, '100', 'aaaaaaa', 0),
(5, '2000', 'bbbbbb', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tercero`
--

DROP TABLE IF EXISTS `t_tercero`;
CREATE TABLE IF NOT EXISTS `t_tercero` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_termin`
--

DROP TABLE IF EXISTS `t_termin`;
CREATE TABLE IF NOT EXISTS `t_termin` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_termin`
--

INSERT INTO `t_termin` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'a121', 'TERMINACION 1', 1),
(2, 'AA22', 'TERMINACION 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(15) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido1` varchar(30) DEFAULT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `perfil_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `fecha_reg` datetime NOT NULL,
  `fecha_mod` datetime NOT NULL,
  `user_id` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido1`, `apellido2`, `telefono`, `celular`, `email`, `login`, `password`, `perfil_id`, `estado_id`, `fecha_reg`, `fecha_mod`, `user_id`) VALUES
(100, 'admin', 'admin', 'admin', '443', '301', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2018-02-05 00:00:00', '2018-03-03 09:41:43', 100),
(200, 'PEPITO', 'PEREZ', 'VALENCIA', '7654321', '0987654321', 'P@P.com', 'PPEREZ', 'd1b8b64ce4b334846368b7c811f8b914', 1, 1, '2017-08-14 00:00:00', '2017-11-20 00:00:00', 1144131603),
(1144, 'idaly', 'davila', 'vega', '131', '444', 'ida', 'iavaega', '1dbefc56c4365cd6b751e2c64fc074a2', 1, 0, '2018-02-24 16:24:33', '2018-03-01 20:27:26', 100),
(5000, 'SEBAS', 'Beltra', 'Ord', '1', '2', 'sabo@gmailcom', 'sbeltran', '1dbefc56c4365cd6b751e2c64fc074a2', 1, 1, '2018-02-28 23:10:43', '2018-03-01 15:37:39', 100),
(50000, 'ALBERT', 'BELTRAN', 'ORDOÑEZ', '444444', '3154445555', 'ABO@HOTMAIL.COM', 'ABELTRAN', '1dbefc56c4365cd6b751e2c64fc074a2', 1, 1, '2018-02-28 23:13:27', '2018-03-01 15:33:37', 100),
(1144131603, 'Roberth', 'Rojas', 'Mosquera', '4437989', '3016124474', 'r@r.com', 'rrojas', '6c7baf1586694f09d4e7ba20b630fb7c', 2, 1, '2017-08-14 00:00:00', '2017-11-21 00:00:00', 1144131603);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_contracto`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_contracto`;
CREATE TABLE IF NOT EXISTS `v_contracto` (
`id` varchar(50)
,`depend_id` int(2)
,`depend_nom` varchar(60)
,`seccion` varchar(60)
,`m_selecc_id` int(11)
,`selecc_nom` varchar(60)
,`causal_id` int(11)
,`causal_nom` varchar(60)
,`t_contract_id` int(11)
,`tcontract_nom` varchar(60)
,`t_gasto_id` int(11)
,`tgasto_nom` varchar(60)
,`fec_suscripc` date
,`fec_ini` date
,`fec_termn` date
,`plazo_ejecuc` int(4)
,`objeto` varchar(256)
,`res_adjud` varchar(50)
,`fec_adjud` date
,`valor_ini` float
,`anticipo` int(1)
,`valor_anticp` float
,`public_secop` int(1)
,`fpublic_secop` date
,`actulz_secop` int(1)
,`factulz_secop` date
,`link_secop` varchar(256)
,`fiducia` int(1)
,`observ` varchar(256)
,`afect_presupt` int(1)
,`t_recurs_id` int(11)
,`trecurs_nom` varchar(60)
,`t_liquid_id` int(11)
,`tliquid_nom` varchar(60)
,`doc_liquid` varchar(50)
,`fec_liquid` date
,`funcion_id` int(11)
,`funcion_nom` varchar(60)
,`segmento` varchar(256)
,`eje` varchar(50)
,`est` varchar(50)
,`prog` varchar(50)
,`estado_id` int(2)
,`estado_nom` varchar(15)
,`fec_reg` datetime
,`fec_mod` datetime
,`user_id` bigint(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_usuario`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_usuario`;
CREATE TABLE IF NOT EXISTS `v_usuario` (
`id` bigint(15)
,`nombre` varchar(30)
,`apellido1` varchar(30)
,`apellido2` varchar(30)
,`telefono` varchar(20)
,`celular` varchar(30)
,`email` varchar(200)
,`login` varchar(20)
,`password` varchar(100)
,`perfil_id` int(11)
,`perfil_nom` varchar(20)
,`estado_id` int(11)
,`estado_nom` varchar(15)
,`fecha_reg` datetime
,`fecha_mod` datetime
,`user_id` bigint(15)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_contracto`
--
DROP TABLE IF EXISTS `v_contracto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_contracto`  AS  select `c`.`id` AS `id`,`c`.`depend_id` AS `depend_id`,`d`.`nombre` AS `depend_nom`,`c`.`seccion` AS `seccion`,`c`.`m_selecc_id` AS `m_selecc_id`,`ms`.`nombre` AS `selecc_nom`,`c`.`causal_id` AS `causal_id`,`ca`.`nombre` AS `causal_nom`,`c`.`t_contract_id` AS `t_contract_id`,`tc`.`nombre` AS `tcontract_nom`,`c`.`t_gasto_id` AS `t_gasto_id`,`tg`.`nombre` AS `tgasto_nom`,`c`.`fec_suscripc` AS `fec_suscripc`,`c`.`fec_ini` AS `fec_ini`,`c`.`fec_termn` AS `fec_termn`,`c`.`plazo_ejecuc` AS `plazo_ejecuc`,`c`.`objeto` AS `objeto`,`c`.`res_adjud` AS `res_adjud`,`c`.`fec_adjud` AS `fec_adjud`,`c`.`valor_ini` AS `valor_ini`,`c`.`anticipo` AS `anticipo`,`c`.`valor_anticp` AS `valor_anticp`,`c`.`public_secop` AS `public_secop`,`c`.`fpublic_secop` AS `fpublic_secop`,`c`.`actulz_secop` AS `actulz_secop`,`c`.`factulz_secop` AS `factulz_secop`,`c`.`link_secop` AS `link_secop`,`c`.`fiducia` AS `fiducia`,`c`.`observ` AS `observ`,`c`.`afect_presupt` AS `afect_presupt`,`c`.`t_recurs_id` AS `t_recurs_id`,`tr`.`nombre` AS `trecurs_nom`,`c`.`t_liquid_id` AS `t_liquid_id`,`tl`.`nombre` AS `tliquid_nom`,`c`.`doc_liquid` AS `doc_liquid`,`c`.`fec_liquid` AS `fec_liquid`,`c`.`funcion_id` AS `funcion_id`,`f`.`nombre` AS `funcion_nom`,`c`.`segmento` AS `segmento`,`c`.`eje` AS `eje`,`c`.`est` AS `est`,`c`.`prog` AS `prog`,`c`.`estado_id` AS `estado_id`,`e`.`nombre` AS `estado_nom`,`c`.`fec_reg` AS `fec_reg`,`c`.`fec_mod` AS `fec_mod`,`c`.`user_id` AS `user_id` from (((((((((`contracto` `c` join `depend` `d` on((`c`.`depend_id` = `d`.`id`))) join `m_selecc` `ms` on((`c`.`m_selecc_id` = `ms`.`id`))) join `causal` `ca` on((`c`.`causal_id` = `ca`.`id`))) join `t_contract` `tc` on((`c`.`t_contract_id` = `tc`.`id`))) join `t_gasto` `tg` on((`c`.`t_gasto_id` = `tg`.`id`))) join `t_recurs` `tr` on((`c`.`t_recurs_id` = `tr`.`id`))) join `t_liquid` `tl` on((`c`.`t_liquid_id` = `tl`.`id`))) join `funcion` `f` on((`c`.`funcion_id` = `f`.`id`))) join `estado` `e` on((`c`.`estado_id` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_usuario`
--
DROP TABLE IF EXISTS `v_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usuario`  AS  select `u`.`id` AS `id`,`u`.`nombre` AS `nombre`,`u`.`apellido1` AS `apellido1`,`u`.`apellido2` AS `apellido2`,`u`.`telefono` AS `telefono`,`u`.`celular` AS `celular`,`u`.`email` AS `email`,`u`.`login` AS `login`,`u`.`password` AS `password`,`u`.`perfil_id` AS `perfil_id`,`p`.`nombre` AS `perfil_nom`,`u`.`estado_id` AS `estado_id`,`e`.`nombre` AS `estado_nom`,`u`.`fecha_reg` AS `fecha_reg`,`u`.`fecha_mod` AS `fecha_mod`,`u`.`user_id` AS `user_id` from ((`usuario` `u` join `perfil` `p` on((`u`.`perfil_id` = `p`.`id`))) join `estado` `e` on((`u`.`estado_id` = `e`.`id`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
