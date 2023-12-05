-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 02:56:58
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `TipoContrato_idTipoContrato` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `idCuestionario` int(11) NOT NULL,
  `descripcion` varchar(145) DEFAULT NULL,
  `EvaluacionDesempeno_idEvaluacionDesempeno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosbancarios`
--

CREATE TABLE `datosbancarios` (
  `idDatosBancarios` int(11) NOT NULL,
  `nombreBanco` varchar(145) DEFAULT NULL,
  `numeroCuenta` varchar(45) DEFAULT NULL,
  `tipoCuenta` varchar(45) DEFAULT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `telefonos` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapasidad`
--

CREATE TABLE `discapasidad` (
  `iddiscapasidad` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `tipo` varchar(145) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `genero` varchar(45) DEFAULT NULL,
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
  `Departamento_idDepartamento` int(11) NOT NULL,
  `Cargo_idCargo` int(11) NOT NULL,
  `Estado_idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_capasitacion`
--

CREATE TABLE `empleado_has_capasitacion` (
  `Empleado_idEmpleado` int(11) NOT NULL,
  `Capasitacion_idCapasitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_discapasidad`
--

CREATE TABLE `empleado_has_discapasidad` (
  `Empleado_idEmpleado` int(11) NOT NULL,
  `discapasidad_iddiscapasidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_evaluaciondesempeno`
--

CREATE TABLE `empleado_has_evaluaciondesempeno` (
  `Empleado_idEmpleado` int(11) NOT NULL,
  `EvaluacionDesempeno_idEvaluacionDesempeno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_instrucionformal`
--

CREATE TABLE `empleado_has_instrucionformal` (
  `Empleado_idEmpleado` int(11) NOT NULL,
  `InstrucionFormal_idInstrucionFormal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `tipoEstado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciondesempeno`
--

CREATE TABLE `evaluaciondesempeno` (
  `idEvaluacionDesempeno` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL,
  `observaciones` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idPermisos` int(11) NOT NULL,
  `fechaSolicitud` date DEFAULT NULL,
  `fechaInicio` varchar(45) DEFAULT NULL,
  `fechaFinaliza` date DEFAULT NULL,
  `tiempoPermiso` int(11) DEFAULT NULL,
  `aprobacionJefeInmediato` varchar(45) DEFAULT NULL,
  `aprobacionTalentoHumano` varchar(45) DEFAULT NULL,
  `TiposPermisos_idTiposPermisos` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasrespuestascuestionario`
--

CREATE TABLE `preguntasrespuestascuestionario` (
  `idPreguntasRespuestasCuestionario` int(11) NOT NULL,
  `pregunta` varchar(240) DEFAULT NULL,
  `respuesta` varchar(240) DEFAULT NULL,
  `Cuestionario_idCuestionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ExperienciaLaboral_idExperienciaLaboral` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidascampo`
--

CREATE TABLE `salidascampo` (
  `idSalidasCampo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `horaSalida` timestamp NULL DEFAULT NULL,
  `horaLlegada` timestamp NULL DEFAULT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `TiposSalidas_idTiposSalida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontrato`
--

CREATE TABLE `tipocontrato` (
  `idTipoContrato` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `clausulas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipospermisos`
--

CREATE TABLE `tipospermisos` (
  `idTiposPermisos` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipossalidas`
--

CREATE TABLE `tipossalidas` (
  `idTiposSalida` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `Rol_idRol` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD KEY `fk_Contrato_TipoContrato1` (`TipoContrato_idTipoContrato`),
  ADD KEY `fk_Contrato_Empleado1` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `controldiario`
--
ALTER TABLE `controldiario`
  ADD PRIMARY KEY (`idControlDiario`),
  ADD KEY `fk_ControlDiario_Empleado1` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`idCuestionario`),
  ADD KEY `fk_Cuestionario_EvaluacionDesempeno1` (`EvaluacionDesempeno_idEvaluacionDesempeno`);

--
-- Indices de la tabla `datosbancarios`
--
ALTER TABLE `datosbancarios`
  ADD PRIMARY KEY (`idDatosBancarios`),
  ADD KEY `fk_DatosBancarios_Empleado1` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `discapasidad`
--
ALTER TABLE `discapasidad`
  ADD PRIMARY KEY (`iddiscapasidad`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_Empleado_Departamento1` (`Departamento_idDepartamento`),
  ADD KEY `fk_Empleado_Cargo1` (`Cargo_idCargo`),
  ADD KEY `fk_Empleado_Estado1` (`Estado_idEstado`);

--
-- Indices de la tabla `empleado_has_capasitacion`
--
ALTER TABLE `empleado_has_capasitacion`
  ADD PRIMARY KEY (`Empleado_idEmpleado`,`Capasitacion_idCapasitacion`),
  ADD KEY `fk_Empleado_has_Capasitacion_Capasitacion1` (`Capasitacion_idCapasitacion`);

--
-- Indices de la tabla `empleado_has_discapasidad`
--
ALTER TABLE `empleado_has_discapasidad`
  ADD PRIMARY KEY (`Empleado_idEmpleado`,`discapasidad_iddiscapasidad`),
  ADD KEY `fk_Empleado_has_discapasidad_discapasidad1` (`discapasidad_iddiscapasidad`);

--
-- Indices de la tabla `empleado_has_evaluaciondesempeno`
--
ALTER TABLE `empleado_has_evaluaciondesempeno`
  ADD PRIMARY KEY (`Empleado_idEmpleado`,`EvaluacionDesempeno_idEvaluacionDesempeno`),
  ADD KEY `fk_Empleado_has_EvaluacionDesempeno_EvaluacionDesempeno1` (`EvaluacionDesempeno_idEvaluacionDesempeno`);

--
-- Indices de la tabla `empleado_has_instrucionformal`
--
ALTER TABLE `empleado_has_instrucionformal`
  ADD PRIMARY KEY (`Empleado_idEmpleado`,`InstrucionFormal_idInstrucionFormal`),
  ADD KEY `fk_Empleado_has_InstrucionFormal_InstrucionFormal1` (`InstrucionFormal_idInstrucionFormal`);

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
  ADD KEY `fk_ExperienciaLaboral_Empleado1` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `instrucionformal`
--
ALTER TABLE `instrucionformal`
  ADD PRIMARY KEY (`idInstrucionFormal`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermisos`),
  ADD KEY `fk_Permisos_TiposPermisos1` (`TiposPermisos_idTiposPermisos`),
  ADD KEY `fk_Permisos_Empleado1` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `preguntasrespuestascuestionario`
--
ALTER TABLE `preguntasrespuestascuestionario`
  ADD PRIMARY KEY (`idPreguntasRespuestasCuestionario`),
  ADD KEY `fk_PreguntasRespuestasCuestionario_Cuestionario1` (`Cuestionario_idCuestionario`);

--
-- Indices de la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  ADD PRIMARY KEY (`idReferenciaLaboral`),
  ADD KEY `fk_ReferenciaLaboral_ExperienciaLaboral1` (`ExperienciaLaboral_idExperienciaLaboral`);

--
-- Indices de la tabla `residencia`
--
ALTER TABLE `residencia`
  ADD PRIMARY KEY (`idResidencia`),
  ADD KEY `fk_Residencia_Empleado1` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `salidascampo`
--
ALTER TABLE `salidascampo`
  ADD PRIMARY KEY (`idSalidasCampo`),
  ADD KEY `fk_SalidasCampo_Empleado1` (`Empleado_idEmpleado`),
  ADD KEY `fk_SalidasCampo_TiposSalidas1` (`TiposSalidas_idTiposSalida`);

--
-- Indices de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  ADD PRIMARY KEY (`idTipoContrato`);

--
-- Indices de la tabla `tipospermisos`
--
ALTER TABLE `tipospermisos`
  ADD PRIMARY KEY (`idTiposPermisos`);

--
-- Indices de la tabla `tipossalidas`
--
ALTER TABLE `tipossalidas`
  ADD PRIMARY KEY (`idTiposSalida`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_Rol1` (`Rol_idRol`),
  ADD KEY `fk_usuario_Empleado1` (`Empleado_idEmpleado`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_Contrato_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Contrato_TipoContrato1` FOREIGN KEY (`TipoContrato_idTipoContrato`) REFERENCES `tipocontrato` (`idTipoContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `controldiario`
--
ALTER TABLE `controldiario`
  ADD CONSTRAINT `fk_ControlDiario_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD CONSTRAINT `fk_Cuestionario_EvaluacionDesempeno1` FOREIGN KEY (`EvaluacionDesempeno_idEvaluacionDesempeno`) REFERENCES `evaluaciondesempeno` (`idEvaluacionDesempeno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datosbancarios`
--
ALTER TABLE `datosbancarios`
  ADD CONSTRAINT `fk_DatosBancarios_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_Empleado_Cargo1` FOREIGN KEY (`Cargo_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_Departamento1` FOREIGN KEY (`Departamento_idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_has_capasitacion`
--
ALTER TABLE `empleado_has_capasitacion`
  ADD CONSTRAINT `fk_Empleado_has_Capasitacion_Capasitacion1` FOREIGN KEY (`Capasitacion_idCapasitacion`) REFERENCES `capasitacion` (`idCapasitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_has_Capasitacion_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_has_discapasidad`
--
ALTER TABLE `empleado_has_discapasidad`
  ADD CONSTRAINT `fk_Empleado_has_discapasidad_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_has_discapasidad_discapasidad1` FOREIGN KEY (`discapasidad_iddiscapasidad`) REFERENCES `discapasidad` (`iddiscapasidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_has_evaluaciondesempeno`
--
ALTER TABLE `empleado_has_evaluaciondesempeno`
  ADD CONSTRAINT `fk_Empleado_has_EvaluacionDesempeno_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_has_EvaluacionDesempeno_EvaluacionDesempeno1` FOREIGN KEY (`EvaluacionDesempeno_idEvaluacionDesempeno`) REFERENCES `evaluaciondesempeno` (`idEvaluacionDesempeno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_has_instrucionformal`
--
ALTER TABLE `empleado_has_instrucionformal`
  ADD CONSTRAINT `fk_Empleado_has_InstrucionFormal_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_has_InstrucionFormal_InstrucionFormal1` FOREIGN KEY (`InstrucionFormal_idInstrucionFormal`) REFERENCES `instrucionformal` (`idInstrucionFormal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  ADD CONSTRAINT `fk_ExperienciaLaboral_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_Permisos_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Permisos_TiposPermisos1` FOREIGN KEY (`TiposPermisos_idTiposPermisos`) REFERENCES `tipospermisos` (`idTiposPermisos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntasrespuestascuestionario`
--
ALTER TABLE `preguntasrespuestascuestionario`
  ADD CONSTRAINT `fk_PreguntasRespuestasCuestionario_Cuestionario1` FOREIGN KEY (`Cuestionario_idCuestionario`) REFERENCES `cuestionario` (`idCuestionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  ADD CONSTRAINT `fk_ReferenciaLaboral_ExperienciaLaboral1` FOREIGN KEY (`ExperienciaLaboral_idExperienciaLaboral`) REFERENCES `experiencialaboral` (`idExperienciaLaboral`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `residencia`
--
ALTER TABLE `residencia`
  ADD CONSTRAINT `fk_Residencia_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salidascampo`
--
ALTER TABLE `salidascampo`
  ADD CONSTRAINT `fk_SalidasCampo_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SalidasCampo_TiposSalidas1` FOREIGN KEY (`TiposSalidas_idTiposSalida`) REFERENCES `tipossalidas` (`idTiposSalida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_Rol1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
