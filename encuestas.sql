-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2019 at 05:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encuestas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuestionario`
--

CREATE TABLE `cuestionario` (
  `idCuestionario` int(11) NOT NULL,
  `nombreCuestionario` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `encuesta`
--

CREATE TABLE `encuesta` (
  `idEncuesta` int(11) NOT NULL,
  `nombreEncuesta` varchar(600) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `idCuestionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `encuestador_encuesta`
--

CREATE TABLE `encuestador_encuesta` (
  `idEncuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregunta`
--

CREATE TABLE `pregunta` (
  `idPregunta` int(11) NOT NULL,
  `nombreCortoPregunta` varchar(200) NOT NULL,
  `descripcionPregunta` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregunta_cuestionario`
--

CREATE TABLE `pregunta_cuestionario` (
  `idPregunta` int(11) NOT NULL,
  `idCuestionario` int(11) NOT NULL,
  `secuencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respuesta`
--

CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `nombreRespuesta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respuesta_encuesta`
--

CREATE TABLE `respuesta_encuesta` (
  `idRespuesta` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `idEncuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`idCuestionario`);

--
-- Indexes for table `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`idEncuesta`),
  ADD KEY `idCuestionario` (`idCuestionario`);

--
-- Indexes for table `encuestador_encuesta`
--
ALTER TABLE `encuestador_encuesta`
  ADD PRIMARY KEY (`idEncuesta`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idPregunta`);

--
-- Indexes for table `pregunta_cuestionario`
--
ALTER TABLE `pregunta_cuestionario`
  ADD PRIMARY KEY (`idPregunta`,`idCuestionario`),
  ADD KEY `idCuestionario` (`idCuestionario`);

--
-- Indexes for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idRespuesta`,`idPregunta`),
  ADD KEY `idPregunta` (`idPregunta`);

--
-- Indexes for table `respuesta_encuesta`
--
ALTER TABLE `respuesta_encuesta`
  ADD PRIMARY KEY (`idEncuesta`,`idRespuesta`,`idPregunta`),
  ADD KEY `idPregunta` (`idPregunta`),
  ADD KEY `idRespuesta` (`idRespuesta`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `idCuestionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `idEncuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`idCuestionario`) REFERENCES `cuestionario` (`idCuestionario`);

--
-- Constraints for table `encuestador_encuesta`
--
ALTER TABLE `encuestador_encuesta`
  ADD CONSTRAINT `encuestador_encuesta_ibfk_1` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`),
  ADD CONSTRAINT `encuestador_encuesta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Constraints for table `pregunta_cuestionario`
--
ALTER TABLE `pregunta_cuestionario`
  ADD CONSTRAINT `pregunta_cuestionario_ibfk_1` FOREIGN KEY (`idCuestionario`) REFERENCES `cuestionario` (`idCuestionario`),
  ADD CONSTRAINT `pregunta_cuestionario_ibfk_2` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`);

--
-- Constraints for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`);

--
-- Constraints for table `respuesta_encuesta`
--
ALTER TABLE `respuesta_encuesta`
  ADD CONSTRAINT `respuesta_encuesta_ibfk_1` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`),
  ADD CONSTRAINT `respuesta_encuesta_ibfk_2` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`),
  ADD CONSTRAINT `respuesta_encuesta_ibfk_3` FOREIGN KEY (`idRespuesta`) REFERENCES `respuesta` (`idRespuesta`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
