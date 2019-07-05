-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2019 a las 01:40:47
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `encuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE IF NOT EXISTS `cuestionario` (
`idCuestionario` int(11) NOT NULL,
  `nombreCuestionario` varchar(600) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`idCuestionario`, `nombreCuestionario`) VALUES
(1, 'Cuál es ese pokémon'),
(2, 'Demográfico de Estudiantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_levantado`
--

CREATE TABLE IF NOT EXISTS `cuestionario_levantado` (
  `idEncuesta` int(11) NOT NULL,
  `idEncuestador` int(11) NOT NULL,
`idCuestionarioLevantado` int(11) NOT NULL,
  `fechaCuestionarioLevantado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE IF NOT EXISTS `encuesta` (
`idEncuesta` int(11) NOT NULL,
  `nombreEncuesta` varchar(600) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `idCuestionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestador_encuesta`
--

CREATE TABLE IF NOT EXISTS `encuestador_encuesta` (
  `idEncuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
`idPregunta` int(11) NOT NULL,
  `nombreCortoPregunta` varchar(200) NOT NULL,
  `descripcionPregunta` varchar(4000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idPregunta`, `nombreCortoPregunta`, `descripcionPregunta`) VALUES
(1, 'Or?', '...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_cuestionario`
--

CREATE TABLE IF NOT EXISTS `pregunta_cuestionario` (
  `idPregunta` int(11) NOT NULL,
  `idCuestionario` int(11) NOT NULL,
  `secuencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta_cuestionario`
--

INSERT INTO `pregunta_cuestionario` (`idPregunta`, `idCuestionario`, `secuencia`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
`idRespuesta` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `nombreRespuesta` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idRespuesta`, `idPregunta`, `nombreRespuesta`) VALUES
(1, 1, 'Respuesta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_encuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta_encuesta` (
  `idRespuesta` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `idEncuesta` int(11) NOT NULL,
  `idCuestionarioLevantado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`idRol` int(11) NOT NULL,
  `nombreRol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
 ADD PRIMARY KEY (`idCuestionario`);

--
-- Indices de la tabla `cuestionario_levantado`
--
ALTER TABLE `cuestionario_levantado`
 ADD PRIMARY KEY (`idCuestionarioLevantado`), ADD KEY `idEncuesta` (`idEncuesta`), ADD KEY `idEncuestador` (`idEncuestador`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
 ADD PRIMARY KEY (`idEncuesta`), ADD KEY `idCuestionario` (`idCuestionario`);

--
-- Indices de la tabla `encuestador_encuesta`
--
ALTER TABLE `encuestador_encuesta`
 ADD PRIMARY KEY (`idEncuesta`,`idUsuario`), ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
 ADD PRIMARY KEY (`idPregunta`);

--
-- Indices de la tabla `pregunta_cuestionario`
--
ALTER TABLE `pregunta_cuestionario`
 ADD PRIMARY KEY (`idPregunta`,`idCuestionario`), ADD KEY `idCuestionario` (`idCuestionario`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
 ADD PRIMARY KEY (`idRespuesta`,`idPregunta`), ADD KEY `idPregunta` (`idPregunta`);

--
-- Indices de la tabla `respuesta_encuesta`
--
ALTER TABLE `respuesta_encuesta`
 ADD PRIMARY KEY (`idEncuesta`,`idRespuesta`,`idPregunta`,`idCuestionarioLevantado`), ADD KEY `idPregunta` (`idPregunta`), ADD KEY `idRespuesta` (`idRespuesta`), ADD KEY `idCuestionarioLevantado` (`idCuestionarioLevantado`), ADD KEY `idEncuesta` (`idEncuesta`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`), ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
MODIFY `idCuestionario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cuestionario_levantado`
--
ALTER TABLE `cuestionario_levantado`
MODIFY `idCuestionarioLevantado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
MODIFY `idEncuesta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuestionario_levantado`
--
ALTER TABLE `cuestionario_levantado`
ADD CONSTRAINT `cuestionario_levantado_ibfk_1` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`),
ADD CONSTRAINT `cuestionario_levantado_ibfk_2` FOREIGN KEY (`idEncuestador`) REFERENCES `usuario` (`idUsuario`);

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
ADD CONSTRAINT `respuesta_encuesta_ibfk_3` FOREIGN KEY (`idRespuesta`) REFERENCES `respuesta` (`idRespuesta`),
ADD CONSTRAINT `respuesta_encuesta_ibfk_4` FOREIGN KEY (`idCuestionarioLevantado`) REFERENCES `cuestionario_levantado` (`idCuestionarioLevantado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
