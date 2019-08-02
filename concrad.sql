-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-08-2019 a las 12:58:44
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concrad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_banco`
--

DROP TABLE IF EXISTS `c_banco`;
CREATE TABLE IF NOT EXISTS `c_banco` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `clave` varchar(50) DEFAULT NULL,
  `nombre_corto` varchar(50) DEFAULT NULL,
  `banco` text,
  `id_status` tinyint(4) DEFAULT NULL,
  `order` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `c_banco`
--

INSERT INTO `c_banco` (`id`, `clave`, `nombre_corto`, `banco`, `id_status`, `order`) VALUES
(2, '12696', 'BBVA', 'Grupo Financiero BBVA Bancomer', NULL, NULL),
(3, '13013', 'Santander ', 'Grupo Financiero Santander México', NULL, NULL),
(4, '10255', 'Banamex', ' Banco Nacional de México', NULL, NULL),
(5, '52521', 'Inbursa', 'Grupo Financiero Inbursa', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_cuentas_bancarias`
--

DROP TABLE IF EXISTS `c_cuentas_bancarias`;
CREATE TABLE IF NOT EXISTS `c_cuentas_bancarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) DEFAULT NULL,
  `id_banco` smallint(6) NOT NULL,
  `ultimos_digitos` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_c_cuentas_bancarias_banco_idx` (`id_banco`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `c_cuentas_bancarias`
--
ALTER TABLE `c_cuentas_bancarias`
  ADD CONSTRAINT `fk_c_cuentas_bancarias_banco` FOREIGN KEY (`id_banco`) REFERENCES `c_banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
