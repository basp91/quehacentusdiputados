-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2015 a las 04:21:23
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `diputados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE IF NOT EXISTS `distrito` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `municipio_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `distrito_municipio_idx` (`municipio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `nombre`, `municipio_id`) VALUES
(1, 'I Distrito Electoral Federal de Yucatán', 3),
(2, 'II Distrito Electoral Federal de Yucatán', 4),
(3, 'III Distrito Electoral Federal de Yucatán', 1),
(4, 'IV Distrito Electoral Federal de Yucatán', 1),
(5, 'V Distrito Electoral Federal de Yucatán', 5),
(6, 'I Distrito Electoral Federal de Quintana Roo', 6),
(7, 'II Distrito Electoral Federal de Quintana Roo', 7),
(8, 'III Distrito Electoral Federal de Quintana Ro', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `entidad_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `municipio_entidad_idx` (`entidad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`, `entidad_id`) VALUES
(1, 'Mérida', 1),
(2, 'Cancún', 24),
(3, 'Valladolid', 1),
(4, 'Progreso', 1),
(5, 'Ticul', 1),
(6, 'Playa del Carmen', 24),
(7, 'Chetumal', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE IF NOT EXISTS `partido` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siglas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id`, `siglas`, `nombre`) VALUES
(1, 'PAN', 'Partido Acción Nacional'),
(2, 'PRI', 'Partido Revolucionario Institucional'),
(3, 'PRD', 'Partido de la Revolución Democrática'),
(4, 'PVEM', 'Partido Verde Ecologista de México'),
(5, 'Movimiento', 'Movimiento Ciudadano'),
(6, 'PANAL', 'Nueva Alianza'),
(7, 'MORENA', 'MORENA'),
(8, 'Encuentro', 'Partido Encuentro Social');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `distrito_municipio` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_entidad` FOREIGN KEY (`entidad_id`) REFERENCES `entidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
