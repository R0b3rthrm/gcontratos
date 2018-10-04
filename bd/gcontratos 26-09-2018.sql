-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-09-2018 a las 22:59:31
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
-- Estructura de tabla para la tabla `acta`
--

DROP TABLE IF EXISTS `acta`;
CREATE TABLE IF NOT EXISTS `acta` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contrato_id` varchar(50) DEFAULT NULL,
  `t_avance_id` bigint(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `porcentaje` int(3) DEFAULT NULL,
  `estado_id` int(2) NOT NULL,
  `fec_reg` timestamp NULL DEFAULT NULL,
  `fec_mod` timestamp NULL DEFAULT NULL,
  `user_id` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acta`
--

INSERT INTO `acta` (`id`, `contrato_id`, `t_avance_id`, `fecha`, `porcentaje`, `estado_id`, `fec_reg`, `fec_mod`, `user_id`) VALUES
(31, '150000', 2, '2018-06-15', 12, 1, '2018-06-14 21:08:06', '2018-06-14 21:08:06', 1144131603),
(34, 'CONTRATO', 2, '2018-06-22', 88, 1, '2018-06-14 21:39:25', '2018-06-14 21:39:25', 1144131603),
(47, 'no100', 2, '2018-07-16', 100, 1, '2018-07-06 16:11:17', '2018-07-06 16:11:17', 1144131603),
(38, 'CONTRATO', 2, '2018-06-08', 77, 1, '2018-06-14 21:56:21', '2018-06-14 21:56:21', 1144131603),
(33, 'CONTRATO', 1, '2018-06-22', 12, 1, '2018-06-14 21:39:17', '2018-06-14 21:39:31', 1144131603),
(13, '150000', 2, '2018-06-07', 100, 1, '2018-06-07 21:59:56', '2018-06-07 21:59:56', 1144131603),
(14, '150000', 2, '2018-06-14', 70, 1, '2018-06-07 22:00:05', '2018-06-14 21:07:44', 1144131603),
(15, '150000', 2, '2018-06-08', 98, 1, '2018-06-07 22:00:15', '2018-06-08 15:24:50', 1144131603),
(32, 'no100', 1, '2018-06-16', 80, 1, '2018-06-14 21:09:10', '2018-06-16 15:47:49', 1144131603),
(19, 'no200', 1, '2018-06-14', 80, 1, '2018-06-08 15:16:56', '2018-06-14 21:43:08', 1144131603),
(46, 'no100', 4, '2018-07-11', 22, 1, '2018-07-06 16:07:31', '2018-07-06 16:10:53', 1144131603);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `causal`
--

INSERT INTO `causal` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '16_1183', 'Estatuto de Contratacion', 1),
(2, '17_1184', 'Estatuto de Contratacion', 1),
(3, '18_1185', 'Estatuto de Contratacion', 1),
(0, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

DROP TABLE IF EXISTS `contrato`;
CREATE TABLE IF NOT EXISTS `contrato` (
  `id` varchar(50) NOT NULL,
  `depend_id` int(2) DEFAULT NULL,
  `seccion` varchar(60) DEFAULT NULL,
  `m_selecc_id` int(11) DEFAULT NULL,
  `causal_id` int(11) DEFAULT NULL,
  `t_contrat_id` int(11) DEFAULT NULL,
  `t_gasto_id` int(11) DEFAULT NULL,
  `fec_suscripc` date DEFAULT NULL,
  `fec_ini` date DEFAULT NULL,
  `fec_termn` date DEFAULT NULL,
  `plazo_ejecuc` int(4) DEFAULT NULL,
  `tercero_id` varchar(20) NOT NULL,
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
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id`, `depend_id`, `seccion`, `m_selecc_id`, `causal_id`, `t_contrat_id`, `t_gasto_id`, `fec_suscripc`, `fec_ini`, `fec_termn`, `plazo_ejecuc`, `tercero_id`, `objeto`, `res_adjud`, `fec_adjud`, `valor_ini`, `anticipo`, `valor_anticp`, `public_secop`, `fpublic_secop`, `actulz_secop`, `factulz_secop`, `link_secop`, `fiducia`, `observ`, `afect_presupt`, `t_recurs_id`, `t_liquid_id`, `doc_liquid`, `fec_liquid`, `funcion_id`, `segmento`, `eje`, `est`, `prog`, `estado_id`, `fec_reg`, `fec_mod`, `user_id`) VALUES
('no100', 1, 'GGGGGG', 2, 2, 2, 2, '2018-03-01', '2018-03-02', '2018-03-03', 3, '3', 'objeto', 'resolucion', '2018-03-04', 1000.23, 1, 2000, 1, '2018-03-05', 1, '2018-03-06', 'www.secop.gov.co', 1, 'observaciones', 1, 1, 1, 'doc liquid', '2018-03-07', 1, 'segmento del servicioOOOOOO', 'eje', 'est', 'prog', 1, '2018-03-15 18:22:09', '2018-07-05 21:22:01', 1144131603),
('no200', 1, 'seccion', 1, 1, 1, 1, '2018-03-01', '2018-03-02', '2018-03-03', 3, '1', 'objeto', 'resolucion', '2018-03-04', 10.12, 1, 200, 1, '2018-03-05', 1, '2018-03-06', 'www.secop.gov.co', 1, 'observaciones', 0, 1, 1, 'doc liquid', '2018-03-07', 1, 'segmento del servicio', 'eje', 'est', 'prog', 1, '2018-03-15 18:25:39', '2018-03-15 18:25:39', 1144131603),
('s80000', 10, 'seccion', 3, 1, 10, 2, '2018-07-03', '2018-07-05', '2018-07-07', 2, '1', 'ejemplo', '', '1000-10-10', 800000000, 0, 0, 0, '1000-10-10', 0, '1000-10-10', '', 0, '', 0, 0, 0, '', '1000-10-10', 0, '', '', '', '', 1, '2018-07-05 18:42:17', '2018-07-05 18:42:17', 1144131603),
('sp10000', 10, 'hola', 3, 1, 10, 2, '2018-06-26', '2018-06-29', '2018-07-07', 8, '3', 'EJEMPLO', '', '1000-10-10', 700000000, 0, 0, 0, '1000-10-10', 0, '1000-10-10', '', 0, '', 0, 0, 0, '', '1000-10-10', 0, '', '', '', '', 1, '2018-07-05 18:53:11', '2018-07-05 18:53:11', 1144131603),
('1800000', 10, 'aaaaa', 3, 1, 10, 2, '2018-07-02', '2018-07-05', '2018-07-06', 1, '4', 'prueba de contrato contrato contrato contrato', 'asfa5505', '1000-10-10', 5000000000, 0, 0, 0, '1000-10-10', 0, '1000-10-10', '', 0, '', 0, 0, 0, '', '1000-10-10', 0, '', '', '', '', 1, '2018-07-05 19:51:15', '2018-07-05 21:28:43', 1144131603);

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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `depend`
--

INSERT INTO `depend` (`id`, `nombre`, `estado_id`) VALUES
(1, 'Vicerrectoria Academica - Plan Talentos', 1),
(2, 'Vicerrectoria de Bienestar', 1),
(3, 'Facultad de Ciencias Sociales y Economicas', 1),
(4, 'Seccion de Seguridad y Vigilancia', 1),
(5, 'Instituto de Educacion y Pedagogia', 1),
(6, 'Facultad de Artes Integradas', 1),
(7, 'Sede Buga', 1),
(8, 'Division Financiera', 1),
(9, 'Regalias', 1),
(10, 'Despacho Vicerrector Administrativo', 1),
(11, 'Instituto CISALVA', 1),
(12, 'Facultad de Ciencias de la Administracion', 1),
(13, 'Vicerrectoria de Investigaciones', 1),
(14, 'Facultad de Salud', 1),
(15, 'Facultad de Humanidades', 1),
(16, 'Seccion Mantenimiento', 1),
(17, 'Direccion de Infraestructura Universitaria', 1),
(18, 'Instituto de Prospectiva', 1),
(19, 'Rectoria', 1),
(20, 'Division de Biblioteca', 1),
(21, 'Facultad de Ingenieria', 1),
(22, 'Servicios Varios', 1),
(23, 'Vicerrectoria Academica', 1),
(24, 'DINTEV', 1),
(25, 'Direccion de Extension', 1),
(26, 'Seccion de Compras', 1),
(27, 'Oficina de Planeacion', 1),
(28, 'Sede Yumbo', 1),
(29, 'Direccion de Regionalizacion ', 1),
(30, 'Instituto CINARA', 1),
(31, 'Instituto de Psicologia', 1),
(32, 'Facultad de Ciencias Naturales', 1),
(33, 'Sede Tulua', 1),
(34, 'Sede Norte del Cauca', 1),
(35, 'Sede Caicedonia', 1),
(36, 'Instituto de Inv. Psicologia', 1),
(37, 'Sede Pac', 1),
(38, 'Recursos Humanos', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '1', 'Misional', 1),
(2, '2', 'De Apoyo', 1),
(0, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interventor`
--

DROP TABLE IF EXISTS `interventor`;
CREATE TABLE IF NOT EXISTS `interventor` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contrato_id` varchar(50) DEFAULT NULL,
  `t_intervt_id` bigint(20) DEFAULT NULL,
  `planta` int(1) DEFAULT NULL,
  `tercero_id` bigint(20) DEFAULT NULL,
  `num_contrat` varchar(50) DEFAULT NULL,
  `porcentaje` int(3) DEFAULT NULL,
  `estado_id` int(2) NOT NULL,
  `fec_reg` timestamp NULL DEFAULT NULL,
  `fec_mod` timestamp NULL DEFAULT NULL,
  `user_id` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `interventor`
--

INSERT INTO `interventor` (`id`, `contrato_id`, `t_intervt_id`, `planta`, `tercero_id`, `num_contrat`, `porcentaje`, `estado_id`, `fec_reg`, `fec_mod`, `user_id`) VALUES
(2, 'no100', 3, 1, 9, 'ps5089', 77, 1, '2018-07-06 17:07:02', '2018-07-06 17:24:20', 1144131603),
(4, 'no100', 1, 1, 9, '50', 59, 1, '2018-07-06 20:36:42', '2018-07-06 20:36:42', 1144131603);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `m_selecc`
--

INSERT INTO `m_selecc` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '2_16', 'Invitacion Directa', 1),
(2, '2_17', 'Invitacion Publica', 1),
(3, '2_18', 'Invitacion Cerrada', 1),
(0, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

DROP TABLE IF EXISTS `novedad`;
CREATE TABLE IF NOT EXISTS `novedad` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contrato_id` varchar(50) DEFAULT NULL,
  `t_noved_id` bigint(20) DEFAULT NULL,
  `valor` bigint(20) DEFAULT NULL,
  `plazo` int(5) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado_id` int(2) NOT NULL,
  `fec_reg` timestamp NULL DEFAULT NULL,
  `fec_mod` timestamp NULL DEFAULT NULL,
  `user_id` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`id`, `contrato_id`, `t_noved_id`, `valor`, `plazo`, `fecha`, `estado_id`, `fec_reg`, `fec_mod`, `user_id`) VALUES
(6, '4no200', 1, 555, 50, '2018-06-16', 1, '2018-06-16 14:49:04', '2018-07-05 16:35:40', 1144131603),
(2, '4no200', 1, 555, 20, '2018-06-13', 1, '2018-06-16 14:28:38', '2018-07-05 16:34:13', 1144131603),
(11, '4no100', 1, 5000, 15, '2018-07-17', 1, '2018-07-05 14:01:47', '2018-07-05 14:01:47', 1144131603),
(7, '4no200', 1, 555, 30, '2018-06-16', 1, '2018-06-16 14:49:15', '2018-07-05 16:27:08', 1144131603),
(12, '4no100', 1, 5000, 15, '2018-07-17', 1, '2018-07-05 14:01:49', '2018-07-05 14:01:49', 1144131603),
(9, '4no100', 2, 5000, 1, '2018-07-05', 1, '2018-06-16 15:50:16', '2018-07-05 14:01:35', 1144131603),
(13, '4no100', 1, 5000, 13, '2018-06-05', 1, '2018-07-05 14:10:14', '2018-07-05 14:10:14', 1144131603),
(14, '4no100', 3, 5000, 12, '2018-07-18', 1, '2018-07-05 16:04:54', '2018-07-05 16:04:54', 1144131603),
(15, '4no100', 2, 151, 123, '2018-07-09', 1, '2018-07-05 16:26:31', '2018-07-05 16:26:31', 1144131603),
(16, '4no200', 1, 500, 12, '2018-07-11', 1, '2018-07-05 16:35:59', '2018-07-05 16:35:59', 1144131603),
(17, '4no200', 1, 500, 12, '2018-07-11', 1, '2018-07-05 16:36:18', '2018-07-05 16:36:18', 1144131603),
(18, '4no200', 4, 15000, 5, '2018-07-05', 1, '2018-07-05 16:36:34', '2018-07-05 16:36:34', 1144131603),
(19, '4no200', 1, 50, 10, '2018-07-04', 1, '2018-07-05 16:37:56', '2018-07-05 16:37:56', 1144131603),
(20, '4no200', 1, 50, 10, '2018-07-04', 1, '2018-07-05 16:38:00', '2018-07-05 16:38:00', 1144131603),
(23, 'no200', 5, 80000, 98, '2018-07-17', 1, '2018-07-06 16:08:09', '2018-07-06 16:08:09', 1144131603),
(22, 'no200', 5, 500000, 22, '2018-06-07', 1, '2018-07-05 16:41:05', '2018-07-06 16:07:54', 1144131603),
(24, 'no100', 2, 55800, 8000, '2018-07-03', 1, '2018-07-06 16:08:46', '2018-07-06 16:09:56', 1144131603),
(25, 'no100', 3, 800000, 20, '2018-07-17', 1, '2018-07-06 16:10:33', '2018-07-06 16:10:33', 1144131603);

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
-- Estructura de tabla para la tabla `poliza`
--

DROP TABLE IF EXISTS `poliza`;
CREATE TABLE IF NOT EXISTS `poliza` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contrato_id` varchar(50) DEFAULT NULL,
  `tercero_id` bigint(20) DEFAULT NULL,
  `num_poliza` varchar(50) DEFAULT NULL,
  `fec_exp` date DEFAULT NULL,
  `resolucion` varchar(50) DEFAULT NULL,
  `fec_apro` date DEFAULT NULL,
  `t_poliza_id` bigint(20) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `fec_ini` date DEFAULT NULL,
  `fec_fin` date DEFAULT NULL,
  `estado_id` int(2) NOT NULL,
  `fec_reg` timestamp NULL DEFAULT NULL,
  `fec_mod` timestamp NULL DEFAULT NULL,
  `user_id` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `poliza`
--

INSERT INTO `poliza` (`id`, `contrato_id`, `tercero_id`, `num_poliza`, `fec_exp`, `resolucion`, `fec_apro`, `t_poliza_id`, `valor`, `fec_ini`, `fec_fin`, `estado_id`, `fec_reg`, `fec_mod`, `user_id`) VALUES
(3, 'no100', 21, '600', '2018-07-11', '50', '2018-07-04', 6, 800000, '2018-07-03', '2018-07-14', 1, '2018-07-06 22:32:25', '2018-07-06 22:32:25', 1144131603);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyect`
--

DROP TABLE IF EXISTS `proyect`;
CREATE TABLE IF NOT EXISTS `proyect` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyect`
--

INSERT INTO `proyect` (`id`, `codigo`, `estado_id`) VALUES
(1, 'PS8088', 1),
(2, 'PS10000', 1),
(3, 'PS100', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE IF NOT EXISTS `proyecto` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contrato_id` varchar(50) DEFAULT NULL,
  `proyect_id` varchar(15) DEFAULT NULL,
  `cod_act` varchar(15) DEFAULT NULL,
  `fec_ini` date DEFAULT NULL,
  `fec_fin` date DEFAULT NULL,
  `porcentaje` int(3) DEFAULT NULL,
  `estado_id` int(2) NOT NULL,
  `fec_reg` timestamp NULL DEFAULT NULL,
  `fec_mod` timestamp NULL DEFAULT NULL,
  `user_id` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `contrato_id`, `proyect_id`, `cod_act`, `fec_ini`, `fec_fin`, `porcentaje`, `estado_id`, `fec_reg`, `fec_mod`, `user_id`) VALUES
(3, '1800000', '2', 'codact-8000', '2018-07-08', '2018-07-08', 78, 1, '2018-07-07 15:06:59', '2018-09-26 21:21:31', 1144131603),
(2, 'no100', '1', 'ACT-580', '2018-07-05', '2018-07-21', 77, 1, '2018-07-06 23:16:13', '2018-07-06 23:18:34', 1144131603),
(6, '1800000', '1', 'CCOACT', '2018-08-27', '2018-09-26', 15, 1, '2018-09-26 21:21:56', '2018-09-26 22:05:31', 1144131603);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tercero`
--

DROP TABLE IF EXISTS `tercero`;
CREATE TABLE IF NOT EXISTS `tercero` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `t_tercero` int(1) NOT NULL,
  `t_document_id` int(11) NOT NULL,
  `id_ter` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido1` varchar(20) DEFAULT NULL,
  `apellido2` varchar(20) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `cel` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `t_contratist_id` bigint(20) DEFAULT NULL,
  `t_clasific_id` bigint(20) DEFAULT NULL,
  `cant_terc` int(2) DEFAULT NULL,
  `tercero1_id` varchar(20) DEFAULT NULL,
  `tercero2_id` varchar(20) DEFAULT NULL,
  `tercero3_id` varchar(20) DEFAULT NULL,
  `tercero4_id` varchar(20) DEFAULT NULL,
  `tercero5_id` varchar(20) DEFAULT NULL,
  `tercero6_id` varchar(20) DEFAULT NULL,
  `tercero7_id` varchar(20) DEFAULT NULL,
  `tercero8_id` varchar(20) DEFAULT NULL,
  `tercero9_id` varchar(20) DEFAULT NULL,
  `tercero10_id` varchar(20) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  `fec_reg` datetime DEFAULT NULL,
  `fec_mod` datetime DEFAULT NULL,
  `user_id` bigint(15) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tercero`
--

INSERT INTO `tercero` (`id`, `t_tercero`, `t_document_id`, `id_ter`, `nombre`, `apellido1`, `apellido2`, `tel`, `cel`, `email`, `t_contratist_id`, `t_clasific_id`, `cant_terc`, `tercero1_id`, `tercero2_id`, `tercero3_id`, `tercero4_id`, `tercero5_id`, `tercero6_id`, `tercero7_id`, `tercero8_id`, `tercero9_id`, `tercero10_id`, `estado_id`, `fec_reg`, `fec_mod`, `user_id`) VALUES
(1, 1, 2, '1', 'PEPITO', 'PEREZ', 'DE LA VEGA', '5', '6', '7', 1, 1, 0, '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '2018-06-27 18:29:34', '2018-06-27 18:29:34', 1144131603),
(3, 1, 2, '100', 'ROBERTH', 'ROJAS', 'MOSQUERA', '40', '301', 'R0B3R@HOTMAIL.COM', 1, 1, 0, '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '2018-06-27 18:30:49', '2018-06-27 18:30:49', 1144131603),
(4, 1, 1, '5002-5', 'TELEPACIFICO', 'LTDA', 'GESTION', '018000', '301', 'TELEPACIFICO', 1, 1, 1, '3', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '2018-06-27 18:40:57', '2018-07-04 18:16:50', 1144131603),
(11, 2, 1, '150-1', 'EQUIDAD', 'LTDA', 'SA', '44477', '301301', 'contacto', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-07-04 15:22:08', '2018-07-04 15:33:31', 1144131603),
(9, 3, 2, '15150', 'Idaly', 'Davila', 'Vega', '333333', '4444444444', 'ROBERTH@G.COM', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-07-04 10:02:40', '2018-07-04 15:31:37', 1144131603),
(20, 2, 2, '144444', 'ALBERT', 'BELTRAN', 'ORDONEZ', '7777', '8888', 'ABO@HOT', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-07-04 15:38:58', '2018-07-04 15:38:58', 1144131603),
(21, 2, 1, '8888-1', 'POSITIVA', 'LTDA', 'S.A.', '30166', '111', 'POS@POS..COM', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-07-04 15:39:40', '2018-07-04 15:39:40', 1144131603);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_avance`
--

INSERT INTO `t_avance` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '1', 'Acta Parcial y/o de Avance', 1),
(2, '2', 'Acta de Modificacion de Obra', 1),
(3, '3', 'Acta de Terminacion del Contracto', 1),
(4, '5', 'Acta de Cumplimiento', 1),
(0, '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_clasific`
--

INSERT INTO `t_clasific` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '1', 'Uniones Temporales', 1),
(2, '2', 'Consorcios', 1),
(3, '3', 'Privadas', 1),
(4, '4', 'Persona Natural', 1),
(5, '5', 'EPS', 1),
(6, '6', 'ESP', 1),
(7, '7', 'Departamentos y Municipios', 1),
(8, '8', 'ESE Hospitales', 1),
(9, '9', 'Publicos', 1),
(10, '10', 'Bomberos', 1),
(11, '11', 'Contralorias', 1),
(12, '12', 'Cajas de Compensacion', 1),
(13, '13', 'Fundaciones', 1),
(14, '14', 'Universidades', 1),
(15, '15', 'Religiosas', 1),
(16, '16', 'Institutos', 1),
(17, '17', 'Sindicatos', 1),
(18, '18', 'Corporaciones', 1),
(19, '19', 'Clubes', 1),
(20, '20', 'Cooperativas', 1),
(21, '21', 'Asociaciones', 1),
(22, '22', 'Federaciones', 1),
(23, '23', 'Juntas de Accion', 1),
(24, '24', 'Colegios/Instituciones Educativas', 1),
(25, '25', 'Cabildos', 1),
(0, '0', 'No Aplica', 0),
(27, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_contrat`
--

DROP TABLE IF EXISTS `t_contrat`;
CREATE TABLE IF NOT EXISTS `t_contrat` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod` varchar(8) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_contrat`
--

INSERT INTO `t_contrat` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '1', 'Contrato de Obra', 1),
(2, '2', 'Contrato de Consultoria', 1),
(3, '3', 'Contrato de Prestacion de Servicios', 1),
(4, '4', 'Contrato de Concesion', 1),
(5, '5', 'Encargos Fiduciarios', 1),
(6, '6', 'Fiducia Publica', 1),
(7, '7', 'Suministros', 1),
(8, '8', 'Compraventa', 1),
(10, '10', 'Atipicos', 1),
(11, '11', 'Tipicos', 1),
(13, '13', 'Convenios', 1),
(0, '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_contratist`
--

INSERT INTO `t_contratist` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '1', 'Contratista', 1),
(2, '2', 'Consorcio', 1),
(3, '3', 'Union Temporal', 1),
(4, '4', 'Promesa de Sociedad Futura', 1),
(5, '5', 'Sociedad con Objeto Unico', 1),
(0, '0', 'No Aplica', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_document`
--

INSERT INTO `t_document` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, 'NIT', 'Numero de Identificacion Tributaria', 1),
(2, 'CC', 'Cedula', 1),
(3, 'NP', 'Numero Pasaporte', 1),
(0, '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_gasto`
--

INSERT INTO `t_gasto` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '1', 'Inversion', 1),
(2, '2', 'Funcionamiento', 1),
(3, '3', 'Servicios de la Deuda', 1),
(4, '5', 'Operacion', 1),
(0, '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_intervt`
--

INSERT INTO `t_intervt` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '0', 'Supervisor', 1),
(2, '1', 'Interventor', 1),
(3, '2', 'Interventor Externo', 1),
(0, '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_liquid`
--

INSERT INTO `t_liquid` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '0', 'Continua en Ejecucion', 1),
(2, '1', 'Unilateralmente', 1),
(3, '2', 'Por Mutuo Acuerdo', 1),
(4, '3', 'En Controversia', 1),
(0, '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_noved`
--

INSERT INTO `t_noved` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '0', 'Adicion', 1),
(2, '1', 'Prorroga', 1),
(3, '2', 'Adicion y Prorroga', 1),
(4, '3', 'Suspension', 1),
(5, '4', 'Reinicio', 1),
(0, '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_poliza`
--

INSERT INTO `t_poliza` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '0', 'Unica', 1),
(2, '1', 'Buen Manejo Anticipo', 1),
(3, '2', 'Cumplimiento de Contrato', 1),
(4, '3', 'Salarios y Prestaciones', 1),
(5, '4', 'Responsabilidad Civil y Extracontractual', 1),
(6, '5', 'Estabilidad y Calidad', 1),
(7, '6', 'Otra', 1),
(0, '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_recurs`
--

INSERT INTO `t_recurs` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '0', 'No Definido', 1),
(2, '1', 'Regalias', 1),
(3, '2', 'Otros Recursos', 1),
(0, '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_termin`
--

INSERT INTO `t_termin` (`id`, `cod`, `nombre`, `estado_id`) VALUES
(1, '0', 'Continua en Ejecucion', 1),
(2, '1', 'Unilateralmente', 1),
(3, '2', 'Por Mutuo Acuerdo', 1),
(4, '3', 'En Controversia', 1),
(0, '', '', 0);

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
(100, 'admin', 'admin', 'admin', '443', '301', 'admin@admin.com', 'admin', '1dbefc56c4365cd6b751e2c64fc074a2', 1, 1, '2018-02-05 00:00:00', '2018-03-03 09:41:43', 100),
(200, 'PEPITO', 'PEREZ', 'VALENCIA', '7654321', '0987654321', 'P@P.com', 'PPEREZ', 'd1b8b64ce4b334846368b7c811f8b914', 1, 1, '2017-08-14 00:00:00', '2017-11-20 00:00:00', 1144131603),
(1144, 'idaly', 'davila', 'vega', '131', '444', 'ida', 'iavaega', '1dbefc56c4365cd6b751e2c64fc074a2', 1, 0, '2018-02-24 16:24:33', '2018-03-01 20:27:26', 100),
(5000, 'SEBAS', 'Beltra', 'Ord', '1', '2', 'sabo@gmailcom', 'sbeltran', '1dbefc56c4365cd6b751e2c64fc074a2', 1, 1, '2018-02-28 23:10:43', '2018-03-01 15:37:39', 100),
(50000, 'ALBERT', 'BELTRAN', 'ORDOÑEZ', '444444', '3154445555', 'ABO@HOTMAIL.COM', 'ABELTRAN', '1dbefc56c4365cd6b751e2c64fc074a2', 1, 1, '2018-02-28 23:13:27', '2018-03-01 15:33:37', 100),
(1144131603, 'Roberth', 'Rojas', 'Mosquera', '4437989', '3016124474', 'r@r.com', 'rrojas', '6c7baf1586694f09d4e7ba20b630fb7c', 2, 1, '2017-08-14 00:00:00', '2017-11-21 00:00:00', 1144131603);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_contrato`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_contrato`;
CREATE TABLE IF NOT EXISTS `v_contrato` (
`id` varchar(50)
,`depend_id` int(2)
,`depend_nom` varchar(60)
,`seccion` varchar(60)
,`m_selecc_id` int(11)
,`selecc_nom` varchar(60)
,`causal_id` int(11)
,`causal_nom` varchar(60)
,`t_contrat_id` int(11)
,`tcontrat_nom` varchar(60)
,`t_gasto_id` int(11)
,`tgasto_nom` varchar(60)
,`fec_suscripc` date
,`fec_ini` date
,`fec_termn` date
,`plazo_ejecuc` int(4)
,`tercero_id` bigint(20) unsigned
,`ter_ide` varchar(20)
,`ter_nom` varchar(20)
,`ter_ape1` varchar(20)
,`ter_ape2` varchar(20)
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
-- Estructura para la vista `v_contrato`
--
DROP TABLE IF EXISTS `v_contrato`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_contrato`  AS  select `c`.`id` AS `id`,`c`.`depend_id` AS `depend_id`,`d`.`nombre` AS `depend_nom`,`c`.`seccion` AS `seccion`,`c`.`m_selecc_id` AS `m_selecc_id`,`ms`.`nombre` AS `selecc_nom`,`c`.`causal_id` AS `causal_id`,`ca`.`nombre` AS `causal_nom`,`c`.`t_contrat_id` AS `t_contrat_id`,`tc`.`nombre` AS `tcontrat_nom`,`c`.`t_gasto_id` AS `t_gasto_id`,`tg`.`nombre` AS `tgasto_nom`,`c`.`fec_suscripc` AS `fec_suscripc`,`c`.`fec_ini` AS `fec_ini`,`c`.`fec_termn` AS `fec_termn`,`c`.`plazo_ejecuc` AS `plazo_ejecuc`,`te`.`id` AS `tercero_id`,`te`.`id_ter` AS `ter_ide`,`te`.`nombre` AS `ter_nom`,`te`.`apellido1` AS `ter_ape1`,`te`.`apellido2` AS `ter_ape2`,`c`.`objeto` AS `objeto`,`c`.`res_adjud` AS `res_adjud`,`c`.`fec_adjud` AS `fec_adjud`,`c`.`valor_ini` AS `valor_ini`,`c`.`anticipo` AS `anticipo`,`c`.`valor_anticp` AS `valor_anticp`,`c`.`public_secop` AS `public_secop`,`c`.`fpublic_secop` AS `fpublic_secop`,`c`.`actulz_secop` AS `actulz_secop`,`c`.`factulz_secop` AS `factulz_secop`,`c`.`link_secop` AS `link_secop`,`c`.`fiducia` AS `fiducia`,`c`.`observ` AS `observ`,`c`.`afect_presupt` AS `afect_presupt`,`c`.`t_recurs_id` AS `t_recurs_id`,`tr`.`nombre` AS `trecurs_nom`,`c`.`t_liquid_id` AS `t_liquid_id`,`tl`.`nombre` AS `tliquid_nom`,`c`.`doc_liquid` AS `doc_liquid`,`c`.`fec_liquid` AS `fec_liquid`,`c`.`funcion_id` AS `funcion_id`,`f`.`nombre` AS `funcion_nom`,`c`.`segmento` AS `segmento`,`c`.`eje` AS `eje`,`c`.`est` AS `est`,`c`.`prog` AS `prog`,`c`.`estado_id` AS `estado_id`,`e`.`nombre` AS `estado_nom`,`c`.`fec_reg` AS `fec_reg`,`c`.`fec_mod` AS `fec_mod`,`c`.`user_id` AS `user_id` from ((((((((((`contrato` `c` join `depend` `d` on((`c`.`depend_id` = `d`.`id`))) join `m_selecc` `ms` on((`c`.`m_selecc_id` = `ms`.`id`))) join `causal` `ca` on((`c`.`causal_id` = `ca`.`id`))) join `t_contrat` `tc` on((`c`.`t_contrat_id` = `tc`.`id`))) join `t_gasto` `tg` on((`c`.`t_gasto_id` = `tg`.`id`))) join `t_recurs` `tr` on((`c`.`t_recurs_id` = `tr`.`id`))) join `t_liquid` `tl` on((`c`.`t_liquid_id` = `tl`.`id`))) join `funcion` `f` on((`c`.`funcion_id` = `f`.`id`))) join `estado` `e` on((`c`.`estado_id` = `e`.`id`))) join `tercero` `te` on((`c`.`tercero_id` = `te`.`id`))) ;

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
