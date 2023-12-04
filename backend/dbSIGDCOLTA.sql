-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 16:25:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `databasegad1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capasitacion`
--

CREATE TABLE `capasitacion` (
  `idCapasitacion` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL,
  `tipoEvento` varchar(45) DEFAULT NULL,
  `institucion` varchar(145) DEFAULT NULL,
  `cantidadHoras` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `archivo` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `idTipoContrato` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controldiario`
--

CREATE TABLE `controldiario` (
  `idControlDiario` int(11) NOT NULL,
  `fechaControl` date DEFAULT NULL,
  `horaEntrada` timestamp NULL DEFAULT NULL,
  `horaSalida` timestamp NULL DEFAULT NULL,
  `horaEntradaReceso` timestamp NULL DEFAULT NULL,
  `horaSalidaReceso` timestamp NULL DEFAULT NULL,
  `totalHoras` float DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `idCuestionario` int(11) NOT NULL,
  `descripcion` varchar(145) DEFAULT NULL,
  `idEvaluacionDesempeno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datobancario`
--

CREATE TABLE `datobancario` (
  `idDatoBancario` int(11) NOT NULL,
  `nombreBanco` varchar(145) DEFAULT NULL,
  `numeroCuenta` varchar(45) DEFAULT NULL,
  `tipoCuenta` varchar(45) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `telefonos` varchar(11) DEFAULT NULL,
  `idUnidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapasidad`
--

CREATE TABLE `discapasidad` (
  `idDiscapasidad` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `tipo` varchar(145) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `cedula` varchar(145) NOT NULL,
  `nombre` varchar(11) DEFAULT NULL,
  `apellido` varchar(145) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `Genero` varchar(45) DEFAULT NULL,
  `telefonoPersonal` varchar(11) DEFAULT NULL,
  `telefonoTrabajo` varchar(11) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `etnia` varchar(45) DEFAULT NULL,
  `estadoCivil` varchar(45) DEFAULT NULL,
  `tipoSangre` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `provinciaNacimiento` varchar(45) DEFAULT NULL,
  `ciudadNacimiento` varchar(45) DEFAULT NULL,
  `cantonNacimiento` varchar(45) DEFAULT NULL,
  `idDepartamento` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_capasitacion`
--

CREATE TABLE `empleado_has_capasitacion` (
  `idEmpleado` int(11) NOT NULL,
  `idCapasitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_discapasidad`
--

CREATE TABLE `empleado_has_discapasidad` (
  `idEmpleado` int(11) NOT NULL,
  `idDiscapasidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_evaluaciondesempeno`
--

CREATE TABLE `empleado_has_evaluaciondesempeno` (
  `idEmpleado` int(11) NOT NULL,
  `idEvaluacionDesempeno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_instrucionformal`
--

CREATE TABLE `empleado_has_instrucionformal` (
  `idEmpleado` int(11) NOT NULL,
  `idInstrucionFormal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `tipoEstado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `tipoEstado`) VALUES
(1, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciondesempeno`
--

CREATE TABLE `evaluaciondesempeno` (
  `idEvaluacionDesempeno` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL,
  `observaciones` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencialaboral`
--

CREATE TABLE `experiencialaboral` (
  `idExperienciaLaboral` int(11) NOT NULL,
  `institucion` varchar(145) DEFAULT NULL,
  `telefonoInstitucion` varchar(11) DEFAULT NULL,
  `areaTrabajo` varchar(45) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `fechaDesde` date DEFAULT NULL,
  `fechaHasta` date DEFAULT NULL,
  `actividades` varchar(145) DEFAULT NULL,
  `archivo` varchar(145) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrucionformal`
--

CREATE TABLE `instrucionformal` (
  `idInstrucionFormal` int(11) NOT NULL,
  `titulo` varchar(145) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `nivelAcademico` varchar(45) DEFAULT NULL,
  `archivo` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idPermisos` int(11) NOT NULL,
  `fechaSolicitud` date DEFAULT NULL,
  `fechaInicio` varchar(45) DEFAULT NULL,
  `fechaFinaliza` date DEFAULT NULL,
  `tiempoPermiso` int(11) DEFAULT NULL,
  `aprobacionJefeInmediato` varchar(45) DEFAULT NULL,
  `aprobacionTalentoHumano` varchar(45) DEFAULT NULL,
  `idTipoPermiso` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntarespuestacuestionario`
--

CREATE TABLE `preguntarespuestacuestionario` (
  `idPreguntaRespuestaCuestionario` int(11) NOT NULL,
  `pregunta` varchar(240) DEFAULT NULL,
  `respuesta` varchar(240) DEFAULT NULL,
  `idCuestionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencialaboral`
--

CREATE TABLE `referencialaboral` (
  `idReferenciaLaboral` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `apellido` varchar(145) DEFAULT NULL,
  `cedula` varchar(11) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `idExperienciaLaboral` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residencia`
--

CREATE TABLE `residencia` (
  `idResidencia` int(11) NOT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `canton` varchar(45) DEFAULT NULL,
  `parroquia` varchar(45) DEFAULT NULL,
  `sector` varchar(45) DEFAULT NULL,
  `calles` varchar(240) DEFAULT NULL,
  `referencia` varchar(240) DEFAULT NULL,
  `telefonoDomicilio` varchar(11) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidacampo`
--

CREATE TABLE `salidacampo` (
  `idSalidaCampo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `horaSalida` timestamp NULL DEFAULT NULL,
  `horaLlegada` timestamp NULL DEFAULT NULL,
  `aprobacionJefeInmediato` varchar(45) DEFAULT NULL,
  `aprobacionTalentoHumano` varchar(45) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idTipoSalida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontrato`
--

CREATE TABLE `tipocontrato` (
  `idTipoContrato` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `clausulas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopermiso`
--

CREATE TABLE `tipopermiso` (
  `idTipoPermiso` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposalida`
--

CREATE TABLE `tiposalida` (
  `idTipoSalida` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `idUnidad` int(11) NOT NULL,
  `nombre` varchar(145) NOT NULL,
  `descripcion` varchar(145) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `idRol` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capasitacion`
--
ALTER TABLE `capasitacion`
  ADD PRIMARY KEY (`idCapasitacion`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idContrato`),
  ADD KEY `fk_Contrato_TipoContrato1` (`idTipoContrato`),
  ADD KEY `fk_Contrato_Empleado1` (`idEmpleado`);

--
-- Indices de la tabla `controldiario`
--
ALTER TABLE `controldiario`
  ADD PRIMARY KEY (`idControlDiario`),
  ADD KEY `fk_ControlDiario_Empleado1` (`idEmpleado`);

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`idCuestionario`),
  ADD KEY `fk_Cuestionario_EvaluacionDesempeno1` (`idEvaluacionDesempeno`);

--
-- Indices de la tabla `datobancario`
--
ALTER TABLE `datobancario`
  ADD PRIMARY KEY (`idDatoBancario`),
  ADD KEY `fk_DatosBancarios_Empleado1` (`idEmpleado`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`),
  ADD KEY `fk_Departamento_Unidad1` (`idUnidad`);

--
-- Indices de la tabla `discapasidad`
--
ALTER TABLE `discapasidad`
  ADD PRIMARY KEY (`idDiscapasidad`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_Empleado_Cargo1` (`idCargo`),
  ADD KEY `fk_Empleado_Departamento1` (`idDepartamento`),
  ADD KEY `fk_Empleado_Estado1` (`idEstado`);

--
-- Indices de la tabla `empleado_has_capasitacion`
--
ALTER TABLE `empleado_has_capasitacion`
  ADD PRIMARY KEY (`idEmpleado`,`idCapasitacion`),
  ADD KEY `fk_Empleado_has_Capasitacion_Capasitacion1` (`idCapasitacion`);

--
-- Indices de la tabla `empleado_has_discapasidad`
--
ALTER TABLE `empleado_has_discapasidad`
  ADD PRIMARY KEY (`idEmpleado`,`idDiscapasidad`),
  ADD KEY `fk_Empleado_has_discapasidad_discapasidad1` (`idDiscapasidad`);

--
-- Indices de la tabla `empleado_has_evaluaciondesempeno`
--
ALTER TABLE `empleado_has_evaluaciondesempeno`
  ADD PRIMARY KEY (`idEmpleado`,`idEvaluacionDesempeno`),
  ADD KEY `fk_Empleado_has_EvaluacionDesempeno_EvaluacionDesempeno1` (`idEvaluacionDesempeno`);

--
-- Indices de la tabla `empleado_has_instrucionformal`
--
ALTER TABLE `empleado_has_instrucionformal`
  ADD PRIMARY KEY (`idEmpleado`,`idInstrucionFormal`),
  ADD KEY `fk_Empleado_has_InstrucionFormal_InstrucionFormal1` (`idInstrucionFormal`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  ADD PRIMARY KEY (`idEvaluacionDesempeno`);

--
-- Indices de la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  ADD PRIMARY KEY (`idExperienciaLaboral`),
  ADD KEY `fk_ExperienciaLaboral_Empleado1` (`idEmpleado`);

--
-- Indices de la tabla `instrucionformal`
--
ALTER TABLE `instrucionformal`
  ADD PRIMARY KEY (`idInstrucionFormal`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idPermisos`),
  ADD KEY `fk_Permisos_TiposPermisos1` (`idTipoPermiso`),
  ADD KEY `fk_Permisos_Empleado1` (`idEmpleado`);

--
-- Indices de la tabla `preguntarespuestacuestionario`
--
ALTER TABLE `preguntarespuestacuestionario`
  ADD PRIMARY KEY (`idPreguntaRespuestaCuestionario`),
  ADD KEY `fk_PreguntasRespuestasCuestionario_Cuestionario1` (`idCuestionario`);

--
-- Indices de la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  ADD PRIMARY KEY (`idReferenciaLaboral`),
  ADD KEY `fk_ReferenciaLaboral_ExperienciaLaboral1` (`idExperienciaLaboral`);

--
-- Indices de la tabla `residencia`
--
ALTER TABLE `residencia`
  ADD PRIMARY KEY (`idResidencia`),
  ADD KEY `fk_Residencia_Empleado1` (`idEmpleado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `salidacampo`
--
ALTER TABLE `salidacampo`
  ADD PRIMARY KEY (`idSalidaCampo`),
  ADD KEY `fk_SalidasCampo_Empleado1` (`idEmpleado`),
  ADD KEY `fk_SalidasCampo_TiposSalidas1` (`idTipoSalida`);

--
-- Indices de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  ADD PRIMARY KEY (`idTipoContrato`);

--
-- Indices de la tabla `tipopermiso`
--
ALTER TABLE `tipopermiso`
  ADD PRIMARY KEY (`idTipoPermiso`);

--
-- Indices de la tabla `tiposalida`
--
ALTER TABLE `tiposalida`
  ADD PRIMARY KEY (`idTipoSalida`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`idUnidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Empleado1` (`idEmpleado`),
  ADD KEY `fk_Usuario_Rol1` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capasitacion`
--
ALTER TABLE `capasitacion`
  MODIFY `idCapasitacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `controldiario`
--
ALTER TABLE `controldiario`
  MODIFY `idControlDiario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `idCuestionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datobancario`
--
ALTER TABLE `datobancario`
  MODIFY `idDatoBancario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `discapasidad`
--
ALTER TABLE `discapasidad`
  MODIFY `idDiscapasidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  MODIFY `idEvaluacionDesempeno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  MODIFY `idExperienciaLaboral` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instrucionformal`
--
ALTER TABLE `instrucionformal`
  MODIFY `idInstrucionFormal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermisos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntarespuestacuestionario`
--
ALTER TABLE `preguntarespuestacuestionario`
  MODIFY `idPreguntaRespuestaCuestionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  MODIFY `idReferenciaLaboral` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `residencia`
--
ALTER TABLE `residencia`
  MODIFY `idResidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `salidacampo`
--
ALTER TABLE `salidacampo`
  MODIFY `idSalidaCampo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  MODIFY `idTipoContrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipopermiso`
--
ALTER TABLE `tipopermiso`
  MODIFY `idTipoPermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposalida`
--
ALTER TABLE `tiposalida`
  MODIFY `idTipoSalida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_Contrato_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Contrato_TipoContrato1` FOREIGN KEY (`idTipoContrato`) REFERENCES `tipocontrato` (`idTipoContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `controldiario`
--
ALTER TABLE `controldiario`
  ADD CONSTRAINT `fk_ControlDiario_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD CONSTRAINT `fk_Cuestionario_EvaluacionDesempeno1` FOREIGN KEY (`idEvaluacionDesempeno`) REFERENCES `evaluaciondesempeno` (`idEvaluacionDesempeno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datobancario`
--
ALTER TABLE `datobancario`
  ADD CONSTRAINT `fk_DatosBancarios_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_Departamento_Unidad1` FOREIGN KEY (`idUnidad`) REFERENCES `unidad` (`idUnidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_Empleado_Cargo1` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Empleado_Departamento1` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Empleado_Estado1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_has_capasitacion`
--
ALTER TABLE `empleado_has_capasitacion`
  ADD CONSTRAINT `fk_Empleado_has_Capasitacion_Capasitacion1` FOREIGN KEY (`idCapasitacion`) REFERENCES `capasitacion` (`idCapasitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_has_Capasitacion_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_has_discapasidad`
--
ALTER TABLE `empleado_has_discapasidad`
  ADD CONSTRAINT `fk_Empleado_has_discapasidad_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_has_discapasidad_discapasidad1` FOREIGN KEY (`idDiscapasidad`) REFERENCES `discapasidad` (`idDiscapasidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_has_evaluaciondesempeno`
--
ALTER TABLE `empleado_has_evaluaciondesempeno`
  ADD CONSTRAINT `fk_Empleado_has_EvaluacionDesempeno_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_has_EvaluacionDesempeno_EvaluacionDesempeno1` FOREIGN KEY (`idEvaluacionDesempeno`) REFERENCES `evaluaciondesempeno` (`idEvaluacionDesempeno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_has_instrucionformal`
--
ALTER TABLE `empleado_has_instrucionformal`
  ADD CONSTRAINT `fk_Empleado_has_InstrucionFormal_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_has_InstrucionFormal_InstrucionFormal1` FOREIGN KEY (`idInstrucionFormal`) REFERENCES `instrucionformal` (`idInstrucionFormal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  ADD CONSTRAINT `fk_ExperienciaLaboral_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `fk_Permisos_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Permisos_TiposPermisos1` FOREIGN KEY (`idTipoPermiso`) REFERENCES `tipopermiso` (`idTipoPermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntarespuestacuestionario`
--
ALTER TABLE `preguntarespuestacuestionario`
  ADD CONSTRAINT `fk_PreguntasRespuestasCuestionario_Cuestionario1` FOREIGN KEY (`idCuestionario`) REFERENCES `cuestionario` (`idCuestionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  ADD CONSTRAINT `fk_ReferenciaLaboral_ExperienciaLaboral1` FOREIGN KEY (`idExperienciaLaboral`) REFERENCES `experiencialaboral` (`idExperienciaLaboral`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `residencia`
--
ALTER TABLE `residencia`
  ADD CONSTRAINT `fk_Residencia_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salidacampo`
--
ALTER TABLE `salidacampo`
  ADD CONSTRAINT `fk_SalidasCampo_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SalidasCampo_TiposSalidas1` FOREIGN KEY (`idTipoSalida`) REFERENCES `tiposalida` (`idTipoSalida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
