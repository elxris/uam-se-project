-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2019 a las 20:55:11
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuestas`
--
CREATE DATABASE IF NOT EXISTS `encuestas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `encuestas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contestacion`
--

DROP TABLE IF EXISTS `contestacion`;
CREATE TABLE IF NOT EXISTS `contestacion` (
  `idEncuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idContestacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idContestacion`) USING BTREE,
  KEY `idEncuesta` (`idEncuesta`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `contestacion`
--

TRUNCATE TABLE `contestacion`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contestacion_usuarios`
--

DROP TABLE IF EXISTS `contestacion_usuarios`;
CREATE TABLE IF NOT EXISTS `contestacion_usuarios` (
  `idEncuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idContestacion` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `idRespuesta` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEncuesta`,`idUsuario`,`idContestacion`,`idPregunta`,`idRespuesta`),
  KEY `idPregunta` (`idPregunta`,`idRespuesta`),
  KEY `idContestacion` (`idContestacion`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `contestacion_usuarios`
--

TRUNCATE TABLE `contestacion_usuarios`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

DROP TABLE IF EXISTS `cuestionario`;
CREATE TABLE IF NOT EXISTS `cuestionario` (
  `idCuestionario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCuestionario` varchar(600) NOT NULL,
  PRIMARY KEY (`idCuestionario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `cuestionario`
--

TRUNCATE TABLE `cuestionario`;
--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`idCuestionario`, `nombreCuestionario`) VALUES
(1, 'Cuestionario EdoMex'),
(3, ''),
(4, 'Preferencias politicas'),
(5, 'Cuestionario EdoMex2'),
(6, 'Cuestionario EdoMex3'),
(7, 'animales'),
(8, 'Deportes'),
(9, 'Automoviles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
CREATE TABLE IF NOT EXISTS `encuesta` (
  `idEncuesta` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEncuesta` varchar(600) NOT NULL,
  `descripcionEncuesta` varchar(1500) NOT NULL,
  `numeroAplicacion` int(250) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `idCuestionario` int(11) NOT NULL,
  PRIMARY KEY (`idEncuesta`),
  KEY `idCuestionario` (`idCuestionario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `encuesta`
--

TRUNCATE TABLE `encuesta`;
--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`idEncuesta`, `nombreEncuesta`, `descripcionEncuesta`, `numeroAplicacion`, `fechaInicio`, `fechaFin`, `idCuestionario`) VALUES
(10, 'Equipos preferidos 2 ', 'Liga MX vs Liga MLS', 0, '2019-07-19', '2019-07-31', 8),
(12, 'tipos de carros', 'automatico vs standard', 0, '2019-07-26', '2019-08-13', 4),
(14, 'Musica preferida', 'generos musicales', 0, '2019-07-19', '2019-07-31', 5),
(17, 'Preferencias Políticas 2020- El ataque del PRI', 'Partidos políticos\r\nEl regreso del PRI', 0, '2019-07-22', '2019-07-30', 1),
(18, 'Violencia de genero', 'kvjbkdjfjksfvn', 0, '2019-07-23', '2019-07-31', 6),
(20, 'Escuelas', 'saber algo', 20000000, '2019-07-19', '2019-07-31', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestador_encuesta`
--

DROP TABLE IF EXISTS `encuestador_encuesta`;
CREATE TABLE IF NOT EXISTS `encuestador_encuesta` (
  `idEncuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idEncuesta`,`idUsuario`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `encuestador_encuesta`
--

TRUNCATE TABLE `encuestador_encuesta`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE IF NOT EXISTS `pregunta` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCortoPregunta` varchar(200) NOT NULL,
  `descripcionPregunta` varchar(4000) NOT NULL,
  PRIMARY KEY (`idPregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `pregunta`
--

TRUNCATE TABLE `pregunta`;
--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idPregunta`, `nombreCortoPregunta`, `descripcionPregunta`) VALUES
(1, '', ''),
(2, '¿Por que partido votaría?', 'preferencia politica'),
(3, 'Has sentido acoso ', 'sensacion de acoso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_cuestionario`
--

DROP TABLE IF EXISTS `pregunta_cuestionario`;
CREATE TABLE IF NOT EXISTS `pregunta_cuestionario` (
  `idPregunta` int(11) NOT NULL,
  `idCuestionario` int(11) NOT NULL,
  `secuencia` int(11) NOT NULL,
  PRIMARY KEY (`idPregunta`,`idCuestionario`),
  KEY `idCuestionario` (`idCuestionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `pregunta_cuestionario`
--

TRUNCATE TABLE `pregunta_cuestionario`;
--
-- Volcado de datos para la tabla `pregunta_cuestionario`
--

INSERT INTO `pregunta_cuestionario` (`idPregunta`, `idCuestionario`, `secuencia`) VALUES
(1, 5, 2),
(2, 5, 3),
(3, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
CREATE TABLE IF NOT EXISTS `respuesta` (
  `idRespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `idPregunta` int(11) NOT NULL,
  `nombreRespuesta` varchar(200) NOT NULL,
  PRIMARY KEY (`idRespuesta`,`idPregunta`),
  KEY `idPregunta` (`idPregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `respuesta`
--

TRUNCATE TABLE `respuesta`;
--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idRespuesta`, `idPregunta`, `nombreRespuesta`) VALUES
(1, 1, ''),
(2, 1, ''),
(3, 1, 'Morena'),
(4, 2, 'morena'),
(5, 2, 'pri'),
(6, 2, 'PAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_encuesta`
--

DROP TABLE IF EXISTS `respuesta_encuesta`;
CREATE TABLE IF NOT EXISTS `respuesta_encuesta` (
  `idRespuesta` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `idEncuesta` int(11) NOT NULL,
  PRIMARY KEY (`idEncuesta`,`idRespuesta`,`idPregunta`),
  KEY `idPregunta` (`idPregunta`),
  KEY `idRespuesta` (`idRespuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `respuesta_encuesta`
--

TRUNCATE TABLE `respuesta_encuesta`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(200) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `roles`
--

TRUNCATE TABLE `roles`;
--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombreRol`) VALUES
(1, 'Administrativo'),
(2, 'Análista'),
(3, 'Encuestador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idRol` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `usuario`
--

TRUNCATE TABLE `usuario`;
--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `password`, `idRol`) VALUES
(1, 'Armando', 'holaMundo', 3),
(2, 'Roberto', '1234', 3),
(3, 'Rodolfo', '4321', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`idCuestionario`) REFERENCES `cuestionario` (`idCuestionario`);

--
-- Filtros para la tabla `encuestador_encuesta`
--
ALTER TABLE `encuestador_encuesta`
  ADD CONSTRAINT `encuestador_encuesta_ibfk_1` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`),
  ADD CONSTRAINT `encuestador_encuesta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `pregunta_cuestionario`
--
ALTER TABLE `pregunta_cuestionario`
  ADD CONSTRAINT `pregunta_cuestionario_ibfk_1` FOREIGN KEY (`idCuestionario`) REFERENCES `cuestionario` (`idCuestionario`),
  ADD CONSTRAINT `pregunta_cuestionario_ibfk_2` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`);

--
-- Filtros para la tabla `respuesta_encuesta`
--
ALTER TABLE `respuesta_encuesta`
  ADD CONSTRAINT `respuesta_encuesta_ibfk_1` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`),
  ADD CONSTRAINT `respuesta_encuesta_ibfk_2` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`),
  ADD CONSTRAINT `respuesta_encuesta_ibfk_3` FOREIGN KEY (`idRespuesta`) REFERENCES `respuesta` (`idRespuesta`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
