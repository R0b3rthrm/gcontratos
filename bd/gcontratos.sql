-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-02-2018 a las 16:44:33
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
-- Estructura de tabla para la tabla `combo`
--

DROP TABLE IF EXISTS `combo`;
CREATE TABLE IF NOT EXISTS `combo` (
  `cod` bigint(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `total_pro` int(11) DEFAULT NULL,
  `ing1` int(11) DEFAULT NULL,
  `c1` float DEFAULT NULL,
  `ing2` int(11) DEFAULT NULL,
  `c2` float DEFAULT NULL,
  `ing3` int(11) DEFAULT NULL,
  `c3` float DEFAULT NULL,
  `ing4` int(11) DEFAULT NULL,
  `c4` float DEFAULT NULL,
  `ing5` int(11) DEFAULT NULL,
  `c5` float DEFAULT NULL,
  `ing6` int(11) DEFAULT NULL,
  `c6` float DEFAULT NULL,
  `ing7` int(11) DEFAULT NULL,
  `c7` float DEFAULT NULL,
  `ing8` int(11) DEFAULT NULL,
  `c8` float DEFAULT NULL,
  `ing9` int(11) DEFAULT NULL,
  `c9` float DEFAULT NULL,
  `ing10` int(11) DEFAULT NULL,
  `c10` float DEFAULT NULL,
  `precio` bigint(10) DEFAULT NULL,
  `impuesto` float DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `fecha_reg` date NOT NULL,
  `fecha_mod` date NOT NULL,
  `user_id` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `combo`
--

INSERT INTO `combo` (`cod`, `nombre`, `total_pro`, `ing1`, `c1`, `ing2`, `c2`, `ing3`, `c3`, `ing4`, `c4`, `ing5`, `c5`, `ing6`, `c6`, `ing7`, `c7`, `ing8`, `c8`, `ing9`, `c9`, `ing10`, `c10`, `precio`, `impuesto`, `estado_id`, `fecha_reg`, `fecha_mod`, `user_id`) VALUES
(1, 'Combo 1', 2, 20, 2, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 22000, 1, 1, '2017-11-29', '2017-12-26', 1144131603),
(100, 'Combo 2', 3, 20, 2, 30, 1, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30000, 0, 1, '2017-12-26', '2017-12-26', 1144131603),
(300, 'Combo 3', 2, 20, 2, 30, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 19000, 0, 1, '2017-12-26', '0000-00-00', 1144131603);

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
  `empresa_id` bigint(15) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `perfil_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `fecha_reg` date NOT NULL,
  `fecha_mod` date NOT NULL,
  `user_id` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido1`, `apellido2`, `telefono`, `celular`, `email`, `empresa_id`, `login`, `password`, `perfil_id`, `estado_id`, `fecha_reg`, `fecha_mod`, `user_id`) VALUES
(7, '7', '7', '7', '7', '7', '7', 1, '7', '8f14e45fceea167a5a36dedd4bea2543', 1, 0, '2017-11-20', '0000-00-00', 1144131603),
(9, '9', '9', '9', '9', '9', '9', 1, '9', '45c48cce2e2d7fbdea1afc51c7c6ad26', 1, 0, '2017-11-20', '0000-00-00', 1144131603),
(55, '5', '5', '5', '5', '5', '5', 3, '5', 'e4da3b7fbbce2345d7772b0674a318d5', 2, 1, '2017-11-20', '0000-00-00', 1144131603),
(100, 'admin', 'admin', 'admin', '0000000', '0000000000', 't@t.com', 2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '0000-00-00', '2017-11-25', 1144131603),
(200, 'PEPITO', 'PEREZ', 'VALENCIA', '7654321', '0987654321', 'P@P.com', 3, 'PPEREZ', 'd1b8b64ce4b334846368b7c811f8b914', 1, 1, '2017-08-14', '2017-11-20', 1144131603),
(333, 'd', 'd', 'd', '1', '1', 'd', 2, 'f', '8fa14cdd754f91cc6554c9e71929cce7', 2, 1, '2017-11-20', '0000-00-00', 1144131603),
(2222222, 'w', 'w', 'w', '2', '1', 'w', 1, 'w', 'f1290186a5d0b1ceab27f4e77c0c5d68', 1, 1, '2017-11-20', '0000-00-00', 1144131603),
(1144131603, 'Roberth', 'Rojas', 'Mosquera', '4437989', '3016124474', 'r@r.com', 3, 'rrojas', '99f3430198639cae23a8548b7a7e4bfd', 2, 1, '2017-08-14', '2017-11-21', 1144131603),
(111111111111111, 'q', 'q', 'q', '1234567', '22222', 'q', 2, 'q', '7694f4a66316e53c8cdd9d9954bd611d', 1, 1, '2017-11-20', '0000-00-00', 1144131603);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_usuario`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_usuario`;
CREATE TABLE IF NOT EXISTS `v_usuario` (
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_usuario`
--
DROP TABLE IF EXISTS `v_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usuario`  AS  select `u`.`id` AS `id`,`u`.`nombre` AS `nombre`,`u`.`apellido1` AS `apellido1`,`u`.`apellido2` AS `apellido2`,`u`.`telefono` AS `telefono`,`u`.`celular` AS `celular`,`u`.`email` AS `email`,`u`.`empresa_id` AS `empresa_id`,`em`.`nombre` AS `empresa_nom`,`u`.`login` AS `login`,`u`.`password` AS `password`,`u`.`perfil_id` AS `perfil_id`,`p`.`nombre` AS `perfil_nom`,`u`.`estado_id` AS `estado_id`,`e`.`nombre` AS `estado_nom`,`u`.`fecha_reg` AS `fecha_reg`,`u`.`fecha_mod` AS `fecha_mod`,`u`.`user_id` AS `user_id` from (((`usuario` `u` join `perfil` `p`) join `estado` `e`) join `empresa` `em`) where ((`u`.`perfil_id` = `p`.`id`) and (`u`.`estado_id` = `e`.`id`) and (`u`.`empresa_id` = `em`.`id`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
