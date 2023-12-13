-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2023 a las 23:06:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

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
-- Estructura de tabla para la tabla `capacitacion`
--

CREATE TABLE `capacitacion` (
  `idCapacitacion` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL,
  `tipoEvento` varchar(45) DEFAULT NULL,
  `institucion` varchar(145) DEFAULT NULL,
  `cantidadHoras` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `archivo` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `capacitacion`
--

INSERT INTO `capacitacion` (`idCapacitacion`, `nombre`, `descripcion`, `tipoEvento`, `institucion`, `cantidadHoras`, `fecha`, `archivo`, `created_at`, `updated_at`) VALUES
(195, 'Dolores dolorum est vitae sed.', 'Est ab voluptatem ut aut et iusto dolorem.', 'non', 'Rath Inc', 97, '1982-04-01', 'vel.pdf', '2023-12-14 03:05:30', '2023-12-14 03:05:30'),
(196, 'Fugit dolorum tempore optio ipsa.', 'Modi fugiat amet quidem quos.', 'rerum', 'Hahn, McLaughlin and Collins', 10, '1984-10-04', 'dolor.pdf', '2023-12-14 03:05:30', '2023-12-14 03:05:30'),
(197, 'Sed voluptatem eum qui consequatur.', 'Facere nihil quo dolorum dolores totam.', 'velit', 'Brekke LLC', 75, '1981-01-29', 'ut.pdf', '2023-12-14 03:05:30', '2023-12-14 03:05:30'),
(198, 'Quo eaque numquam ut ut aut asperiores.', 'Iure nobis at sed consectetur et sed.', 'voluptatem', 'Bogisich Inc', 88, '1994-05-27', 'perferendis.pdf', '2023-12-14 03:05:30', '2023-12-14 03:05:30'),
(199, 'Sed pariatur laudantium vel et ut id.', 'Consequatur doloribus sunt nam a porro veritatis perferendis.', 'itaque', 'Reynolds-Gerhold', 87, '2018-05-05', 'distinctio.pdf', '2023-12-14 03:05:30', '2023-12-14 03:05:30'),
(200, 'Sit nulla quia facere at.', 'Iure ab illo sit eum dolore.', 'qui', 'D\'Amore, Stamm and Gibson', 93, '1971-04-09', 'velit.pdf', '2023-12-14 03:05:30', '2023-12-14 03:05:30'),
(201, 'Officia eligendi numquam alias voluptas eum.', 'Velit quaerat quisquam rerum enim enim.', 'est', 'Rau Inc', 64, '2011-01-26', 'deleniti.pdf', '2023-12-14 03:05:30', '2023-12-14 03:05:30'),
(202, 'Est enim voluptatem id repudiandae quia.', 'Quis nisi est aut culpa.', 'necessitatibus', 'Kemmer-Beahan', 98, '1976-12-29', 'sed.pdf', '2023-12-14 03:05:30', '2023-12-14 03:05:30'),
(203, 'Dolorem consequuntur molestiae quos ipsam velit.', 'Iure repellendus dolorem velit fugiat.', 'illo', 'Rodriguez Ltd', 9, '1990-06-28', 'nulla.pdf', '2023-12-14 03:05:30', '2023-12-14 03:05:30'),
(204, 'Distinctio cumque repellendus in impedit.', 'Magni distinctio at quo voluptas sit.', 'qui', 'Mraz, Lockman and Herman', 53, '1972-07-16', 'ut.pdf', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(193, 'exercitationem', 'Itaque similique rem ipsa hic earum iste ad.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(194, 'saepe', 'Odio aperiam odit aut aut ratione aliquid.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(195, 'qui', 'Non libero non facere nobis consequatur in in ullam.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(196, 'repellat', 'Ratione eum neque in sed asperiores ea vel.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(197, 'eveniet', 'Aliquid itaque qui voluptatibus harum.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(198, 'rem', 'Porro cumque quia sed aut laborum magnam perspiciatis iste.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(199, 'voluptatum', 'Molestias qui alias autem magni omnis ducimus quia dignissimos.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(200, 'perspiciatis', 'Eaque omnis eius exercitationem perferendis iste.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(201, 'sint', 'Debitis totam vel alias atque qui voluptate ullam.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(202, 'qui', 'Voluptas eius delectus qui iste voluptate voluptatum.', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `idTipoContrato` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`idContrato`, `fechaInicio`, `fechaFin`, `idTipoContrato`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(103, '2023-07-31', '2024-09-05', 132, 107, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(104, '2023-11-05', '2024-11-09', 138, 102, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(105, '2023-06-17', '2024-09-10', 136, 101, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(106, '2023-10-03', '2024-01-20', 138, 102, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(107, '2023-10-13', '2024-06-17', 137, 107, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(108, '2023-09-08', '2024-03-05', 136, 107, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(109, '2023-09-14', '2024-05-08', 137, 102, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(110, '2023-10-01', '2024-04-29', 139, 109, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(111, '2023-10-05', '2024-07-22', 131, 104, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(112, '2023-04-10', '2024-08-27', 135, 101, '2023-12-14 03:05:32', '2023-12-14 03:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controldiario`
--

CREATE TABLE `controldiario` (
  `idControlDiario` int(11) NOT NULL,
  `fechaControl` date DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `horaEntradaReceso` time DEFAULT NULL,
  `horaSalidaReceso` time DEFAULT NULL,
  `totalHoras` float DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `controldiario`
--

INSERT INTO `controldiario` (`idControlDiario`, `fechaControl`, `horaEntrada`, `horaSalida`, `horaEntradaReceso`, `horaSalidaReceso`, `totalHoras`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(110, '1987-05-18', '22:17:47', '11:42:22', '17:14:31', '20:31:03', 1.08, 105, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(111, '1985-09-10', '12:53:44', '17:59:35', '21:12:49', '00:22:08', 2.43, 101, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(112, '2004-06-21', '01:23:59', '12:55:24', '17:01:40', '16:35:37', 1.62, 106, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(113, '1970-02-16', '00:18:19', '19:10:06', '19:24:43', '06:59:53', 2.66, 109, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(114, '2004-04-22', '11:20:30', '11:40:40', '01:56:02', '01:07:45', 3.84, 108, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(115, '2021-01-16', '22:16:57', '10:03:49', '21:51:47', '09:14:49', 4.05, 102, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(116, '2002-09-07', '21:42:07', '16:01:30', '21:33:32', '06:55:02', 3.94, 105, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(117, '2010-07-07', '05:42:45', '22:49:58', '03:13:16', '01:48:12', 2.36, 102, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(118, '1978-10-08', '02:29:16', '01:18:10', '17:01:18', '23:29:20', 1.52, 103, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(119, '1987-07-07', '00:24:44', '20:46:43', '11:44:19', '23:59:59', 7.99, 101, '2023-12-14 03:05:32', '2023-12-14 03:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datobancario`
--

CREATE TABLE `datobancario` (
  `idDatoBancario` int(11) NOT NULL,
  `nombreBanco` varchar(145) DEFAULT NULL,
  `numeroCuenta` varchar(45) DEFAULT NULL,
  `tipoCuenta` varchar(45) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `datobancario`
--

INSERT INTO `datobancario` (`idDatoBancario`, `nombreBanco`, `numeroCuenta`, `tipoCuenta`, `idEmpleado`, `updated_at`, `created_at`) VALUES
(101, 'Kunde-McKenzie', '7893459', 'Corriente', 105, '2023-12-13', '2023-12-13'),
(102, 'Gorczany-Feil', '8499715716', 'Ahorros', 106, '2023-12-13', '2023-12-13'),
(103, 'Jerde, Moen and Abshire', '2088193761635125', 'Corriente', 101, '2023-12-13', '2023-12-13'),
(104, 'Farrell Ltd', '357793843833317', 'Corriente', 105, '2023-12-13', '2023-12-13'),
(105, 'Barton Inc', '480663113194', 'Corriente', 109, '2023-12-13', '2023-12-13'),
(106, 'Kreiger, Brakus and Bernhard', '594810284', 'Ahorros', 104, '2023-12-13', '2023-12-13'),
(107, 'McGlynn, Vandervort and Bins', '210238854', 'Corriente', 106, '2023-12-13', '2023-12-13'),
(108, 'Leffler-Schmitt', '793594966', 'Corriente', 110, '2023-12-13', '2023-12-13'),
(109, 'Von LLC', '1691215042', 'Corriente', 101, '2023-12-13', '2023-12-13'),
(110, 'Nolan, Stoltenberg and Zulauf', '3486753738', 'Ahorros', 104, '2023-12-13', '2023-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `telefonos` varchar(20) DEFAULT NULL,
  `idUnidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`, `descripcion`, `telefonos`, `idUnidad`, `created_at`, `updated_at`) VALUES
(204, 'ut', 'Consequatur dicta enim eum.', '+1-223-733-1697', 133, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(205, 'tempora', 'Maiores inventore provident similique nihil sit.', '480-900-3592', 137, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(206, 'beatae', 'Dolore blanditiis vitae tempora omnis sit harum.', '463.917.6148', 132, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(207, 'aut', 'Qui labore aperiam ad accusantium quis consequatur in.', '1-352-667-7298', 131, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(208, 'dolore', 'Quod quibusdam necessitatibus est fugit repellendus quam.', '+1 (623) 976-2461', 131, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(209, 'aut', 'Ut et ad quisquam quia.', '+12677743432', 133, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(210, 'quas', 'Dolor deleniti dignissimos in distinctio distinctio.', '+1-573-763-2139', 140, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(211, 'mollitia', 'Dolorum accusantium labore officiis nihil.', '+13093763280', 132, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(212, 'est', 'Placeat voluptatum est et dolor.', '(971) 993-2605', 140, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(213, 'tempora', 'Ea in magnam est laboriosam.', '(743) 941-7086', 135, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(214, 'provident', 'Saepe autem veniam saepe tempora.', '1-346-209-6794', 137, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(215, 'sequi', 'Sed iusto voluptatem dolor quod eum et in esse.', '+1-201-617-0772', 132, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(216, 'perspiciatis', 'Tenetur accusantium rerum nobis.', '+1-662-550-0424', 133, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(217, 'eum', 'Quia tenetur impedit cupiditate molestiae cupiditate.', '(848) 556-3243', 133, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(218, 'sed', 'Molestiae iure quo omnis id eligendi fuga error.', '614.349.8907', 133, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(219, 'eligendi', 'Et autem quibusdam est ex quaerat id natus.', '1-734-300-9522', 140, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(220, 'voluptates', 'Qui nostrum at asperiores consequatur.', '+1-351-538-6896', 132, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(221, 'et', 'Omnis enim rerum nulla.', '+1 (720) 348-2633', 140, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(222, 'expedita', 'Qui consequatur aspernatur voluptas sed ut voluptatem.', '+1.341.931.7908', 131, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(223, 'ut', 'In impedit ut quas aperiam illo.', '978-215-1651', 137, '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapacidad`
--

CREATE TABLE `discapacidad` (
  `idDiscapacidad` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `tipo` varchar(145) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `discapacidad`
--

INSERT INTO `discapacidad` (`idDiscapacidad`, `nombre`, `tipo`, `porcentaje`, `created_at`, `updated_at`) VALUES
(192, 'itaque', 'itaque', 3, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(193, 'quidem', 'et', 49, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(194, 'quia', 'voluptatum', 30, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(195, 'in', 'voluptate', 51, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(196, 'maiores', 'enim', 26, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(197, 'nihil', 'totam', 18, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(198, 'porro', 'minima', 54, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(199, 'repudiandae', 'qui', 67, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(200, 'aut', 'odit', 74, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(201, 'accusantium', 'porro', 76, '2023-12-14 03:05:31', '2023-12-14 03:05:31');

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
  `telefonoPersonal` varchar(20) DEFAULT NULL,
  `telefonoTrabajo` varchar(20) DEFAULT NULL,
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
  `idEstado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `cedula`, `nombre`, `apellido`, `fechaNacimiento`, `Genero`, `telefonoPersonal`, `telefonoTrabajo`, `correo`, `etnia`, `estadoCivil`, `tipoSangre`, `nacionalidad`, `provinciaNacimiento`, `ciudadNacimiento`, `cantonNacimiento`, `idDepartamento`, `idCargo`, `idEstado`, `created_at`, `updated_at`) VALUES
(101, '33534480', 'Rahul', 'Bartoletti', '1986-03-15', 'Masculino', '838.813.2618', '804-803-6966', 'beer.glennie@example.com', 'Afroecuatoriano', 'Casado', 'O+', 'Estonia', 'Alabama', 'Carafort', 'burgh', 214, 194, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(102, '17619725', 'Sharon', 'Schaden', '2007-03-30', 'Femenino', '+1-973-621-0502', '283-735-2549', 'sarai87@example.net', 'Indígena', 'Casado', 'B+', 'Afghanistan', 'Wisconsin', 'South Sibylbury', 'fort', 215, 200, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(103, '20479006', 'Dominic', 'Windler', '1974-05-07', 'Masculino', '+1-862-565-5017', '1-630-376-5508', 'floyd55@example.org', 'Afroecuatoriano', 'Casado', 'B+', 'Seychelles', 'Kansas', 'Elishaburgh', 'shire', 216, 197, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(104, '35516176', 'Danial', 'Heidenreich', '2012-10-27', 'Masculino', '+14843814296', '321-913-7739', 'swift.alexandro@example.org', 'Mestizo', 'Viudo', 'B-', 'Martinique', 'Delaware', 'Mayerview', 'mouth', 217, 198, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(105, '97089016', 'Mariana', 'Ledner', '1994-07-06', 'Masculino', '808-908-1764', '+17343658165', 'noelia72@example.net', 'Montubio', 'Divorciado', 'O+', 'Tokelau', 'South Carolina', 'North Abbigail', 'chester', 218, 195, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(106, '46393712', 'Finn', 'Sporer', '2013-03-11', 'Femenino', '304-699-5730', '+1-708-913-9770', 'olen.hilpert@example.org', 'Mestizo', 'Soltero', 'AB+', 'Ireland', 'Hawaii', 'Beattystad', 'burgh', 219, 194, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(107, '48654061', 'Emmalee', 'Feeney', '2019-08-21', 'Masculino', '+1-445-431-9071', '(256) 672-0620', 'moore.graham@example.com', 'Montubio', 'Casado', 'AB+', 'United Arab Emirates', 'Pennsylvania', 'Effertzville', 'mouth', 220, 195, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(108, '73515268', 'Stephania', 'Hagenes', '2013-03-24', 'Femenino', '1-443-976-9327', '770.874.8083', 'delbert58@example.net', 'Blanco', 'Viudo', 'O+', 'Trinidad and Tobago', 'Utah', 'Lake Andres', 'burgh', 221, 199, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(109, '19967523', 'Sedrick', 'Hermann', '1990-11-19', 'Femenino', '443.310.7199', '1-484-615-2250', 'kolby04@example.com', 'Indígena', 'Viudo', 'B+', 'Sudan', 'Idaho', 'New Arch', 'furt', 222, 193, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(110, '494962', 'Damien', 'Ruecker', '2004-12-21', 'Masculino', '+1-701-851-6485', '386.859.5916', 'ewyman@example.com', 'Blanco', 'Divorciado', 'A+', 'Botswana', 'Kentucky', 'South Jeanie', 'mouth', 223, 200, 20, '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_capacitacion`
--

CREATE TABLE `empleado_has_capacitacion` (
  `idEmpleado` int(11) NOT NULL,
  `idCapacitacion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado_has_capacitacion`
--

INSERT INTO `empleado_has_capacitacion` (`idEmpleado`, `idCapacitacion`, `created_at`, `updated_at`) VALUES
(102, 196, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(102, 202, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(102, 203, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(103, 198, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(104, 196, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(104, 203, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(105, 197, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(106, 196, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(106, 204, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(108, 204, '2023-12-14 03:05:32', '2023-12-14 03:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_discapacidad`
--

CREATE TABLE `empleado_has_discapacidad` (
  `idEmpleado` int(11) NOT NULL,
  `idDiscapacidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado_has_discapacidad`
--

INSERT INTO `empleado_has_discapacidad` (`idEmpleado`, `idDiscapacidad`, `created_at`, `updated_at`) VALUES
(102, 199, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(110, 198, '2023-12-14 03:05:32', '2023-12-14 03:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_instruccionformal`
--

CREATE TABLE `empleado_has_instruccionformal` (
  `idEmpleado` int(11) NOT NULL,
  `idInstruccionFormal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `tipoEstado` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `tipoEstado`, `created_at`, `updated_at`) VALUES
(20, 'activo', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciondesempeno`
--

CREATE TABLE `evaluaciondesempeno` (
  `idEvaluacionDesempeno` int(11) NOT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  `idEvaluador` int(11) DEFAULT NULL,
  `fechaEvaluacion` date DEFAULT NULL,
  `ObjetivosMetas` text DEFAULT NULL,
  `cumplimientoObjetivos` decimal(5,2) DEFAULT NULL,
  `competencias` text DEFAULT NULL,
  `calificacionGeneral` decimal(5,2) DEFAULT NULL,
  `comentarios` text DEFAULT NULL,
  `areasMejora` text DEFAULT NULL,
  `reconocimientosLogros` text DEFAULT NULL,
  `desarrolloProfesional` text DEFAULT NULL,
  `feedbackEmpleado` text DEFAULT NULL,
  `estadoEvaluacion` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evaluaciondesempeno`
--

INSERT INTO `evaluaciondesempeno` (`idEvaluacionDesempeno`, `idEmpleado`, `idEvaluador`, `fechaEvaluacion`, `ObjetivosMetas`, `cumplimientoObjetivos`, `competencias`, `calificacionGeneral`, `comentarios`, `areasMejora`, `reconocimientosLogros`, `desarrolloProfesional`, `feedbackEmpleado`, `estadoEvaluacion`, `created_at`, `updated_at`) VALUES
(41, 101, 109, '1976-04-01', 'Doloremque modi amet qui voluptatibus fugiat. Voluptatem quae et alias. Repellendus adipisci unde nostrum vel velit qui.', 88.50, 'Et doloribus qui reprehenderit animi placeat expedita. Nam in quis error a distinctio velit tenetur delectus. Nisi aliquid reiciendis ea rem non. Ut excepturi earum laudantium sunt quia et est.', 16.14, 'Corporis facere voluptatem est et. Veniam molestias sit asperiores dolorem. Illum voluptatem autem cum doloribus qui rerum non. Deserunt magni rerum tempora consequatur voluptatem nesciunt.', 'Quos aut ipsam animi dicta et velit exercitationem. Laboriosam et rerum est consectetur ea. Sed id quasi officia sit tempore. Et ea enim et quae.', 'Id neque dolorem non impedit voluptas. Tenetur id aut est. Omnis velit facere qui in vel optio corporis.', 'Vero unde in iusto cum quidem assumenda natus. Qui in dolor similique aperiam. Ut velit omnis alias minima. Possimus labore id dolorum sint qui.', 'Eligendi in suscipit voluptate est. Ut dolorem odio ea ut dolorem. Quibusdam nulla alias odio et asperiores cum dolorem officia. Minima enim dolore iusto.', 'Pendiente', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(42, 103, 104, '1972-01-01', 'Sit consectetur distinctio et et distinctio et ut. Quas rerum id molestias quia est. Laborum voluptatem id sit sit id fugiat. Molestiae nostrum velit sint facere neque animi velit quaerat.', 0.53, 'Numquam voluptas iste et laborum numquam modi consequuntur. Quia dolorum cum fugit officia at nihil. Quam quibusdam porro atque consequatur qui sit. Quas est aut ducimus aut id sunt.', 0.64, 'Sit commodi aut quaerat ea. Dolorum corporis cupiditate cumque ipsum recusandae consequatur ipsa id. Sit accusantium consectetur a libero eius voluptatum totam.', 'Voluptate velit quaerat nostrum expedita quod et dolor. Rerum ea at doloribus sit amet dolorem. Laborum est sed eos et illo vero dolorem. Consequatur vero distinctio veritatis optio.', 'Incidunt commodi et rerum molestias perspiciatis sed. Ut aut sequi et quibusdam iure ratione aut est. Rerum ea facilis voluptas doloremque praesentium vitae.', 'Praesentium voluptas atque sequi velit. Qui maiores omnis tempora quia. Voluptatem provident at ipsa odit qui neque.', 'Ab maxime deserunt iste qui dolores ipsum autem. Eveniet nostrum ut rerum pariatur assumenda. Est sequi iusto expedita praesentium laudantium velit. Enim aut et voluptatem.', 'Rechazada', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(43, 108, 106, '1983-11-19', 'Iusto ad ut animi repellendus et ipsum. Magni non excepturi reiciendis nemo nisi aut harum sit. Voluptates minus ut incidunt molestiae consequatur.', 59.79, 'Praesentium voluptatum consequatur excepturi quia autem consequatur inventore veniam. Sint at cum incidunt voluptatem facilis. Laborum fugit vitae enim.', 39.72, 'Eligendi officiis eaque animi est et. A a ea aut velit. Eaque numquam vel qui omnis quis. Quasi asperiores laudantium sed recusandae.', 'Molestiae delectus veniam repudiandae optio unde. Aut dolorem est ad non enim nobis itaque. Necessitatibus doloribus sed dolorum doloribus.', 'Facilis doloribus perferendis repellat hic cupiditate ut. Qui distinctio qui voluptas et sint ea.', 'Qui non similique natus et. Voluptate officiis hic perferendis alias. Fugit aut autem reprehenderit animi exercitationem. Tempore vel corrupti nesciunt impedit totam.', 'Iure consequuntur explicabo modi sit ut provident facere praesentium. Laudantium facere fugiat vel ut accusamus. Nesciunt consequatur voluptates culpa totam ipsam. Iste rerum et odit ut sit.', 'Aprobada', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(44, 103, 106, '1977-10-03', 'Sed voluptas quis et rerum et odit odit. Ipsum autem possimus laudantium ipsa nihil harum consequatur. Deserunt consectetur cupiditate harum quia. Sunt iure modi quia dolores odio.', 79.51, 'Ea officia et et maxime. Laudantium repellat ipsam consectetur ad laborum occaecati. Molestiae quisquam aut amet laudantium et et. Rerum aspernatur repellendus aut voluptates et sed odio.', 14.31, 'Ipsa necessitatibus cumque nisi non. Impedit voluptas molestiae hic soluta quia tenetur excepturi. Voluptatem blanditiis corporis nulla commodi explicabo nisi.', 'Mollitia aut veritatis vero sit. Consequatur dolores sed iste et reprehenderit. In ut consequatur omnis quis fugit. Exercitationem laborum repellat eius voluptatum alias voluptatem.', 'Vel vero ea rerum minima voluptatem doloribus sed. Modi unde maxime enim alias voluptas in et harum. Esse sunt dolorum quo et est. Cupiditate expedita est voluptatem distinctio.', 'Dolorem dolores eum deserunt nemo. Modi deserunt enim aut at et voluptatum. Est et autem rem officiis quia.', 'Aut sequi et eum nihil repudiandae ut sapiente. Et aut voluptate in qui. Velit consectetur corporis enim perspiciatis consectetur unde deserunt. Ducimus et nobis vitae blanditiis molestias iure.', 'Rechazada', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(45, 105, 105, '2008-12-14', 'Ex esse voluptatem sit maiores occaecati ut. Ut suscipit voluptas voluptatem illo optio deserunt. Illo voluptatem itaque quos quam. At et deserunt iure consequatur minima.', 83.57, 'Quis quia id a veritatis doloremque. Aperiam et aut aspernatur consequatur iure sit quas quasi. Similique laborum minus ipsam quis cupiditate distinctio iure.', 81.34, 'Voluptatem blanditiis esse alias id est praesentium ducimus rerum. Esse inventore et consequatur non modi.', 'Iure laboriosam eligendi rerum numquam quos eligendi dolorem. Nulla recusandae consequatur vitae sunt. Qui eos eum id dolorem eum. Facere autem doloribus recusandae error aut aspernatur ea.', 'Sit eius enim et recusandae. Vel veniam sunt ratione ut iure iste consequatur. Odio placeat ducimus sed velit. Ea aut temporibus repudiandae.', 'Ipsa voluptatem sapiente quia exercitationem est illo quae. Dolores eum porro voluptatem expedita. Rerum sunt iusto laborum.', 'Et quis repellendus asperiores. Minus maiores eos commodi modi. Non odit et tempore et accusantium ipsam sed. Autem ducimus omnis reprehenderit deserunt.', 'Aprobada', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(46, 104, 110, '2023-06-22', 'Omnis aperiam fuga est. Eveniet culpa quia quisquam adipisci. Nesciunt voluptatem est dolores ut ipsa quis. Incidunt mollitia tempora est voluptatibus.', 27.84, 'Aspernatur aut reprehenderit sequi numquam porro. Voluptatem molestiae minima blanditiis fugiat quae. Qui tenetur est incidunt ipsum ut voluptatem optio.', 62.21, 'Repudiandae ipsum et aspernatur incidunt. Adipisci praesentium quis sunt error sunt voluptatem assumenda laboriosam. Et et repellat tempora aut.', 'Dolorum corrupti eum vel non fugiat unde. Unde laborum cupiditate sit exercitationem nisi totam. Consequatur perferendis non minus qui ipsa.', 'Aut atque est est sunt. Eum voluptatem sunt iure. Esse ipsam quod non neque sint molestias soluta. Sit iste qui id autem nulla voluptate.', 'Odio nulla voluptatem aperiam aspernatur. Et rerum laboriosam est consectetur. Illo aspernatur aperiam est iure exercitationem aut dolorem. Et quaerat officiis molestias culpa ea maxime odit.', 'Eos exercitationem enim non perspiciatis odit. Voluptatum ab dolores id vero vero.', 'Pendiente', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(47, 103, 109, '1984-02-12', 'Ab libero magnam qui. Omnis eum accusantium nisi. Cum molestias porro laborum quidem maiores.', 0.13, 'In enim voluptates magni quasi voluptas. Non reiciendis corrupti voluptas illum soluta. Quas neque quidem dolor aut nam vero sunt optio. Illum quis qui unde doloremque.', 83.11, 'Qui vitae qui aliquam eveniet vel inventore sit. Ad sit iusto sed corporis tempore. Cumque qui quas laborum et. Alias doloribus reiciendis ipsa et sit id non.', 'Itaque amet corporis temporibus laborum incidunt aut. Ullam corrupti nihil rerum sequi et est. Voluptas voluptatem maxime eos officia at sit deleniti. Adipisci temporibus nemo sed et.', 'Ea officiis voluptatem repudiandae. Tenetur eos tempore est ex dolorum. Dignissimos voluptatem et voluptas aspernatur.', 'A et non odio sapiente. Error voluptatibus quia quidem consectetur. Est ad quibusdam sed officia cum ad laboriosam aspernatur.', 'Ducimus eos consequuntur vitae commodi aut inventore sed. Nemo perspiciatis ullam consequuntur animi modi. Quis et quia ea aspernatur rerum.', 'Aprobada', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(48, 107, 102, '2004-10-26', 'Ea officia eaque ipsam vitae expedita. Est impedit voluptatem qui et. Similique necessitatibus quam aperiam laborum cupiditate blanditiis.', 7.66, 'Qui quo quisquam non sint. Laborum minus maxime aut corrupti.', 75.92, 'Aspernatur dolores in dolorum. Repellendus veritatis voluptatum laborum aut aut veniam iusto.', 'Aut accusamus inventore id impedit consectetur. Corrupti alias id laudantium recusandae eos id. Voluptatem consequatur consequatur et quisquam eligendi.', 'Ut voluptatem enim minus sapiente. Corporis officia illo cum pariatur id iusto autem quia. Voluptatem enim non accusantium quia cum. Sunt quis enim quia aut velit rerum nemo. Qui eaque quos harum.', 'Repellendus facilis commodi aut rem ut esse quae. Hic et repellat iusto et. Distinctio sed nostrum et. Est velit rerum ipsam fugiat nihil. Autem voluptas et minus id.', 'In a hic quis est. Dolore quasi consequuntur eligendi et velit rerum occaecati. Nulla exercitationem vitae eum facilis.', 'Pendiente', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(49, 107, 106, '2018-06-03', 'Magnam ipsum pariatur est delectus. Dolore sed occaecati et. Nostrum enim et consequuntur repellat quaerat nisi vel. Debitis ut dolor omnis dolore illo possimus ut.', 25.87, 'Et adipisci distinctio itaque optio autem nesciunt. Asperiores tempora enim perferendis delectus. Ea aut dolores veniam tempora.', 93.98, 'Est velit in provident expedita dolor culpa. Ut modi temporibus quasi libero a mollitia. Vel soluta esse ea et totam fuga sint. Dolores corrupti veritatis consectetur et.', 'Magnam blanditiis et quia impedit. Eum architecto ut a aut laudantium. Quidem exercitationem voluptatem qui ad.', 'Fugiat tenetur itaque voluptates quo totam. Exercitationem nam qui soluta ut recusandae. Nostrum qui officiis dolores in amet.', 'Veritatis quos doloremque quia eum qui labore accusamus. Architecto porro ut quis velit incidunt illum. Omnis est aut perspiciatis odit.', 'Quia aut quo eum eius molestiae. Quae quia repudiandae est dolorum distinctio eveniet. Non suscipit ut labore ipsa quod exercitationem.', 'Rechazada', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(50, 104, 102, '2000-06-11', 'Similique at ad beatae dicta ullam excepturi ab. Eaque doloremque architecto et est totam. Sit laudantium omnis architecto unde qui.', 21.78, 'Ex dolor animi magnam necessitatibus animi dolor. Enim fugiat est dolorem hic. Et voluptas expedita quas eaque. Et omnis officia rerum et commodi itaque in.', 82.84, 'Eveniet asperiores nulla laboriosam eveniet aut labore. Vel est odio quas qui tempora nostrum dolores aliquam.', 'Totam eos odio quo nihil. Quia ut porro voluptas dolor placeat praesentium. Laborum cupiditate blanditiis possimus corporis maxime. Veniam neque eos molestiae quae deserunt officia.', 'Quia aut a et blanditiis architecto. Ut delectus aliquid odit. Dolor adipisci a recusandae porro veritatis beatae vitae. Quaerat sapiente officiis sint harum ratione eos id distinctio.', 'Molestiae enim ut est natus. Quas veniam laborum laborum sed ut voluptas occaecati.', 'Saepe tempora consequuntur voluptate qui voluptates eius iure. Excepturi quisquam aliquid et beatae est ut. Saepe velit molestias sunt nostrum quia beatae minima.', 'Aprobada', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencialaboral`
--

CREATE TABLE `experiencialaboral` (
  `idExperienciaLaboral` int(11) NOT NULL,
  `institucion` varchar(145) DEFAULT NULL,
  `telefonoInstitucion` varchar(20) DEFAULT NULL,
  `areaTrabajo` varchar(45) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `fechaDesde` date DEFAULT NULL,
  `fechaHasta` date DEFAULT NULL,
  `actividades` text DEFAULT NULL,
  `archivo` varchar(145) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `experiencialaboral`
--

INSERT INTO `experiencialaboral` (`idExperienciaLaboral`, `institucion`, `telefonoInstitucion`, `areaTrabajo`, `puesto`, `fechaDesde`, `fechaHasta`, `actividades`, `archivo`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(87, 'Koch and Sons', '+1-628-546-3757', 'dolor', 'Preschool Teacher', '2018-04-14', '1974-04-17', 'Tempora non ut tempore ut quis fugit. Minima voluptas vel quisquam molestias labore ducimus temporibus. Ex eaque qui sit. Itaque deleniti voluptatem quaerat in nobis voluptate laudantium.', 'qui', 107, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(88, 'Grimes, Graham and Olson', '+19385424098', 'error', 'Welfare Eligibility Clerk', '2014-03-15', '1979-05-20', 'Debitis id tempora quas rerum. Minima qui quasi veritatis expedita id qui. Impedit aliquid quam quas nihil et dolorem voluptatem id.', 'aliquam', 108, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(89, 'Zemlak PLC', '+1 (657) 310-1253', 'voluptatum', 'Human Resource Manager', '2016-06-14', '1987-01-03', 'Fuga deleniti quam enim in non ad. Id modi deserunt saepe accusantium. Voluptas praesentium aut minima ut ea.', 'et', 110, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(90, 'O\'Keefe, Vandervort and Schamberger', '+1-703-537-4094', 'et', 'Commercial Pilot', '1978-09-20', '1978-12-24', 'Quo quidem excepturi ipsa velit asperiores consequuntur omnis dolor. Dolor fuga praesentium impedit et optio minus. Nihil eum molestias eius. Atque alias eos rerum.', 'tempora', 108, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(91, 'VonRueden, Rolfson and Bergstrom', '+1-507-296-4890', 'et', 'Foreign Language Teacher', '1978-01-20', '2002-07-18', 'Iusto et mollitia error laboriosam molestias. Quia modi vel incidunt. Reiciendis fuga adipisci laboriosam vitae et minima impedit.', 'amet', 105, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(92, 'Hahn Ltd', '+1 (562) 682-2138', 'illo', 'Operating Engineer', '2003-03-15', '2012-04-20', 'Corporis molestias sint dolor. Laborum autem nisi quisquam eum. Temporibus suscipit natus enim unde. Amet et autem illum possimus enim aut.', 'quo', 106, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(93, 'Sporer Inc', '(848) 638-6292', 'at', 'Industrial Safety Engineer', '1994-04-09', '1999-05-25', 'Et quia nulla sint inventore ad est sint deleniti. Autem quia cum et quisquam voluptas reiciendis quasi incidunt. Amet quo molestias non atque.', 'earum', 102, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(94, 'Halvorson, Turner and Jast', '+15027247572', 'nihil', 'Mail Clerk', '2018-02-27', '1978-06-15', 'Suscipit quis odit voluptate voluptates doloribus quo vel. Sint occaecati modi explicabo laborum commodi.', 'quaerat', 106, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(95, 'Schneider-Hammes', '785-384-7446', 'nesciunt', 'Correspondence Clerk', '1991-01-13', '2011-02-27', 'Laborum sed dolores et. Laborum repellendus optio molestias ex harum repellendus veniam ea. Ut sequi incidunt dolorem quo velit. Illo consequuntur quae maiores illo nihil distinctio.', 'dolorum', 110, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(96, 'Farrell, Hyatt and Littel', '808-808-2510', 'reprehenderit', 'Coaches and Scout', '1986-08-13', '1976-02-21', 'Nisi rerum vel qui repellat autem aut facilis. Eum dolores tempora quasi iusto ex. Quas illum laudantium perferendis quis itaque. Non placeat tempora laboriosam quos architecto nobis.', 'rem', 105, '2023-12-14 03:05:32', '2023-12-14 03:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instruccionformal`
--

CREATE TABLE `instruccionformal` (
  `idInstruccionFormal` int(11) NOT NULL,
  `titulo` varchar(145) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `nivelAcademico` varchar(45) DEFAULT NULL,
  `archivo` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `instruccionformal`
--

INSERT INTO `instruccionformal` (`idInstruccionFormal`, `titulo`, `fechaRegistro`, `nivelAcademico`, `archivo`, `created_at`, `updated_at`) VALUES
(131, 'Ut ipsam iusto reiciendis quidem.', '1997-07-30', 'Doctorado', 'minima', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(132, 'Et cumque ab est voluptatem quas sint facilis.', '1986-03-06', 'Licenciatura', 'vitae', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(133, 'Ducimus dolor commodi deserunt fuga esse eligendi.', '1978-01-04', 'Maestría', 'quos', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(134, 'Totam qui alias atque.', '1979-05-21', 'Licenciatura', 'perferendis', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(135, 'Voluptatibus et itaque neque odio ipsam quam.', '1997-10-15', 'Maestría', 'aperiam', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(136, 'Commodi corporis enim asperiores inventore et libero explicabo.', '2018-07-22', 'Bachillerato', 'quia', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(137, 'Neque consequuntur exercitationem iste.', '2004-08-02', 'Licenciatura', 'est', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(138, 'Iste laboriosam facilis vel.', '2013-09-05', 'Bachillerato', 'adipisci', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(139, 'Qui est voluptatibus deserunt itaque.', '2002-06-28', 'Bachillerato', 'at', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(140, 'Eos soluta similique dolorem ex officia ut.', '1984-09-16', 'Bachillerato', 'est', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idPermiso` int(11) NOT NULL,
  `fechaSolicitud` date DEFAULT NULL,
  `fechaInicio` varchar(45) DEFAULT NULL,
  `fechaFinaliza` date DEFAULT NULL,
  `tiempoPermiso` int(11) DEFAULT NULL,
  `aprobacionJefeInmediato` varchar(45) DEFAULT NULL,
  `aprobacionTalentoHumano` varchar(45) DEFAULT NULL,
  `idTipoPermiso` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idPermiso`, `fechaSolicitud`, `fechaInicio`, `fechaFinaliza`, `tiempoPermiso`, `aprobacionJefeInmediato`, `aprobacionTalentoHumano`, `idTipoPermiso`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(81, '2016-10-07', '1990-02-04', '1973-02-07', 6, '0', '0', 131, 103, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(82, '2015-08-15', '1993-09-03', '1974-05-18', 6, '0', '0', 134, 109, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(83, '1972-02-09', '1993-09-30', '1973-02-21', 3, '0', '0', 140, 101, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(84, '1980-05-13', '1971-07-16', '1999-01-30', 5, '0', '1', 133, 109, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(85, '1998-02-24', '1983-07-20', '2008-09-11', 5, '0', '0', 132, 109, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(86, '2019-07-15', '2023-08-09', '1977-08-31', 5, '1', '0', 132, 105, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(87, '1974-06-21', '2015-07-06', '2008-01-23', 9, '0', '0', 133, 103, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(88, '2002-06-18', '1989-08-03', '2021-04-07', 5, '1', '1', 134, 103, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(89, '2010-01-17', '1973-02-24', '1976-12-06', 0, '1', '0', 133, 105, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(90, '2005-07-13', '2009-04-06', '1976-01-29', 3, '1', '0', 135, 102, '2023-12-14 03:05:32', '2023-12-14 03:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencialaboral`
--

CREATE TABLE `referencialaboral` (
  `idReferenciaLaboral` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `apellido` varchar(145) DEFAULT NULL,
  `cedula` varchar(11) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `idExperienciaLaboral` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `referencialaboral`
--

INSERT INTO `referencialaboral` (`idReferenciaLaboral`, `nombre`, `apellido`, `cedula`, `telefono`, `email`, `idExperienciaLaboral`, `created_at`, `updated_at`) VALUES
(81, 'Cedrick', 'Howe', '6479968740', '+1.228.799.4087', 'pierce48@example.org', 95, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(82, 'Elinor', 'Anderson', '5659938512', '+1.309.562.7647', 'mcclure.monroe@example.com', 92, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(83, 'Kaleigh', 'Bashirian', '5009584329', '(725) 858-9896', 'kerluke.harry@example.org', 88, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(84, 'Marcelo', 'Kiehn', '3427535409', '870.325.4267', 'ecorwin@example.com', 89, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(85, 'Emiliano', 'Roob', '9610731799', '+1 (231) 341-3044', 'mrobel@example.com', 88, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(86, 'Alexis', 'Ebert', '9040243064', '+1 (470) 369-9055', 'ykilback@example.com', 88, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(87, 'Chelsea', 'Gorczany', '1407325763', '201.256.9713', 'justen51@example.net', 91, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(88, 'Lucas', 'Reichel', '7351991758', '979.605.1963', 'hturcotte@example.org', 88, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(89, 'Leland', 'Becker', '7244587506', '1-972-996-0238', 'langworth.rodolfo@example.org', 91, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(90, 'Axel', 'Douglas', '0903565927', '1-607-727-8220', 'kathryne.champlin@example.org', 92, '2023-12-14 03:05:32', '2023-12-14 03:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residencia`
--

CREATE TABLE `residencia` (
  `idResidencia` int(11) NOT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `canton` varchar(100) DEFAULT NULL,
  `parroquia` varchar(100) DEFAULT NULL,
  `sector` varchar(100) DEFAULT NULL,
  `calles` varchar(240) DEFAULT NULL,
  `referencia` varchar(240) DEFAULT NULL,
  `telefonoDomicilio` varchar(20) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `residencia`
--

INSERT INTO `residencia` (`idResidencia`, `pais`, `provincia`, `canton`, `parroquia`, `sector`, `calles`, `referencia`, `telefonoDomicilio`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(81, 'Bangladesh', 'Ohio', 'Keelingview', 'quos', 'esse', '3026 Barrows Tunnel Suite 462', 'Eligendi eius repellendus in incidunt.', '(580) 279-2179', 103, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(82, 'Lao People\'s Democratic Republic', 'Wyoming', 'Lake Dorian', 'minima', 'est', '2470 Lexie Squares', 'Quibusdam qui officiis sint et totam nisi.', '+1 (701) 466-0520', 109, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(83, 'Belgium', 'Delaware', 'Waelchiton', 'ipsum', 'natus', '7440 Beahan Stravenue', 'Ex aut id quas.', '317.779.0352', 110, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(84, 'Bosnia and Herzegovina', 'Ohio', 'Wehnerstad', 'sed', 'quo', '232 Beer Canyon Apt. 042', 'Fuga et dicta facilis ut.', '+1 (971) 924-9731', 104, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(85, 'Puerto Rico', 'Hawaii', 'Lake Romahaven', 'qui', 'eos', '2272 Cronin Walks', 'Qui maxime molestiae minus laboriosam dignissimos.', '478-943-1079', 101, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(86, 'Bahrain', 'Missouri', 'New Gordon', 'cum', 'velit', '502 Nader Circle', 'Corporis esse alias molestiae.', '+1 (347) 412-0516', 109, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(87, 'Namibia', 'New Mexico', 'Daremouth', 'enim', 'molestiae', '8916 Lonzo Bypass', 'Eos vel praesentium quasi recusandae ad voluptatem numquam.', '+19567796781', 108, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(88, 'Yemen', 'South Dakota', 'Bentonton', 'voluptas', 'vel', '212 Miles Court', 'Ut possimus veritatis maxime iusto voluptates voluptatem.', '+1.586.596.2204', 106, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(89, 'Georgia', 'Indiana', 'North Elissa', 'quae', 'dolores', '8417 Maudie Bridge', 'Est odit eveniet aut est suscipit id molestiae.', '231.798.1323', 106, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(90, 'Bangladesh', 'Idaho', 'New Jonathanburgh', 'est', 'nisi', '482 Raegan Vista', 'Unde odio est et est eum.', '+1 (989) 823-5617', 110, '2023-12-14 03:05:32', '2023-12-14 03:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`, `created_at`, `updated_at`) VALUES
(131, 'enim', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(132, 'officiis', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(133, 'fugit', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(134, 'doloremque', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(135, 'eius', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(136, 'ipsum', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(137, 'eaque', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(138, 'et', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(139, 'vel', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(140, 'aliquam', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidacampo`
--

CREATE TABLE `salidacampo` (
  `idSalidaCampo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `horaLlegada` time DEFAULT NULL,
  `aprobacionJefeInmediato` varchar(45) DEFAULT NULL,
  `aprobacionTalentoHumano` varchar(45) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idTipoSalida` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `salidacampo`
--

INSERT INTO `salidacampo` (`idSalidaCampo`, `fecha`, `horaSalida`, `horaLlegada`, `aprobacionJefeInmediato`, `aprobacionTalentoHumano`, `idEmpleado`, `idTipoSalida`, `created_at`, `updated_at`) VALUES
(81, '2019-10-01', '06:11:07', '21:32:37', '0', '1', 104, 132, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(82, '1995-10-11', '03:24:57', '05:05:20', '0', '0', 103, 135, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(83, '2002-01-31', '12:15:07', '03:24:22', '0', '1', 110, 131, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(84, '1991-03-07', '04:16:08', '02:33:46', '1', '0', 103, 134, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(85, '1988-03-04', '19:49:39', '13:53:17', '1', '0', 109, 133, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(86, '1976-07-11', '11:31:58', '08:07:28', '1', '0', 101, 138, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(87, '2008-10-12', '10:38:14', '13:36:24', '1', '1', 103, 138, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(88, '2007-12-07', '11:14:24', '08:30:41', '0', '0', 105, 140, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(89, '2015-05-18', '13:43:05', '00:29:44', '0', '1', 110, 133, '2023-12-14 03:05:32', '2023-12-14 03:05:32'),
(90, '2001-05-30', '18:32:03', '00:27:57', '0', '1', 107, 137, '2023-12-14 03:05:32', '2023-12-14 03:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontrato`
--

CREATE TABLE `tipocontrato` (
  `idTipoContrato` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL,
  `clausulas` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipocontrato`
--

INSERT INTO `tipocontrato` (`idTipoContrato`, `nombre`, `descripcion`, `clausulas`, `created_at`, `updated_at`) VALUES
(131, 'maxime', 'Dolor doloremque praesentium dolorem ut ea totam.', 'Ut optio libero voluptas ea molestias et dolorem. Provident assumenda consectetur consequuntur quibusdam et.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(132, 'saepe', 'Aut aut possimus omnis quibusdam ducimus delectus consectetur.', 'Labore blanditiis dolor quo quos. Voluptatibus ipsa et maxime minima. Voluptate earum quis veniam molestias ullam et ut.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(133, 'qui', 'Veritatis ut molestiae vel omnis eum.', 'At minus sed illum excepturi aperiam autem enim nostrum. Natus ullam voluptas dolores quia error consequuntur mollitia neque. Saepe id corrupti voluptas assumenda natus aut. Velit rem temporibus illo explicabo.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(134, 'dolorem', 'Incidunt ullam molestias necessitatibus sit.', 'Necessitatibus et rerum non ut. Et aliquid nihil ut numquam qui autem accusantium qui. Officiis dolores placeat corrupti rerum quo repudiandae.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(135, 'eligendi', 'Voluptatibus et ut sequi dignissimos quas odio pariatur.', 'Qui similique quia ut hic eveniet. Perspiciatis rerum placeat nihil sed. Atque qui ab expedita in voluptate reiciendis dolores hic. Ipsa quo sequi nostrum.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(136, 'quibusdam', 'Eveniet cupiditate quidem ex et voluptas et earum reprehenderit.', 'Facere aut sunt tenetur iste. Nobis qui alias repellat autem unde atque. Totam eligendi soluta sit iusto hic aliquid. Ea molestias soluta repellendus non et est repudiandae ullam.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(137, 'voluptatibus', 'Est quidem eum est dicta assumenda et magnam.', 'Architecto sint cupiditate ex asperiores. Labore impedit nesciunt expedita at repudiandae dolores voluptas. Ducimus eos facilis atque assumenda vero vitae dolore. Et hic itaque in repellat voluptatem ipsa cum ut.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(138, 'est', 'Est officia nulla non modi qui tempore.', 'Debitis odio officia natus sed. Facilis unde atque fugiat reprehenderit temporibus expedita. Tempore esse praesentium et neque. Nihil veritatis voluptatem accusantium est commodi quia.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(139, 'aliquam', 'Quia totam fugit soluta perferendis perferendis.', 'Sapiente fugiat numquam eum quasi laboriosam consequatur. Maiores dolor delectus impedit eum tempore. Ex aliquid est quos provident alias nesciunt molestias.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(140, 'perferendis', 'Error voluptas rerum et voluptate tempore mollitia.', 'Dolore eaque est porro odio est quaerat. Voluptate ut aliquam consequatur nisi sit dolores sint. Recusandae ut minus magnam eos et qui.', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopermiso`
--

CREATE TABLE `tipopermiso` (
  `idTipoPermiso` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipopermiso`
--

INSERT INTO `tipopermiso` (`idTipoPermiso`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(131, 'ut', 'Accusamus eveniet quas hic sunt officia quia pariatur.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(132, 'dolorem', 'Quos doloribus ex eveniet asperiores vel quia natus.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(133, 'unde', 'Est et distinctio aut doloribus et.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(134, 'aut', 'Optio ea itaque enim quam.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(135, 'sint', 'Ullam voluptatem qui et porro doloremque eligendi ratione.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(136, 'ipsa', 'Doloremque facilis necessitatibus est ea et.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(137, 'temporibus', 'Reiciendis voluptas rerum aliquid aliquam ut inventore.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(138, 'molestiae', 'Tempore voluptates voluptatum suscipit in sunt modi.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(139, 'eum', 'Repudiandae fugiat laborum autem ut explicabo rerum.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(140, 'dignissimos', 'Quis repellat qui et qui veniam error laborum nostrum.', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposalida`
--

CREATE TABLE `tiposalida` (
  `idTipoSalida` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tiposalida`
--

INSERT INTO `tiposalida` (`idTipoSalida`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(131, 'sunt', 'Nisi officia nesciunt asperiores magni numquam.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(132, 'expedita', 'Veritatis dolorem blanditiis tenetur itaque.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(133, 'et', 'Nihil totam doloremque facere modi at vero tenetur sit.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(134, 'repellendus', 'Totam et recusandae sed.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(135, 'repellendus', 'Sed maxime et numquam voluptas quidem sapiente.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(136, 'iusto', 'Eos ut temporibus iusto qui eum recusandae facere.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(137, 'suscipit', 'Exercitationem ut accusamus aut quia unde.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(138, 'et', 'Explicabo sit qui ea itaque voluptatem dicta.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(139, 'et', 'Doloribus eligendi aut aut assumenda voluptatum.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(140, 'voluptas', 'Quidem aut alias harum omnis culpa nesciunt deleniti.', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `idUnidad` int(11) NOT NULL,
  `nombre` varchar(145) NOT NULL,
  `descripcion` varchar(145) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idUnidad`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(131, 'molestiae', 'Eligendi soluta illum et optio odit quia.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(132, 'et', 'Enim corporis eum qui aut recusandae sed praesentium.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(133, 'et', 'Aliquid at voluptatem excepturi nostrum cupiditate porro est tempora.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(134, 'officiis', 'Voluptate enim tenetur rerum sit.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(135, 'in', 'Expedita aperiam odio magnam mollitia.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(136, 'id', 'Molestias beatae dolor quo ipsam laborum nostrum ut.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(137, 'soluta', 'In quia velit velit hic.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(138, 'repellendus', 'Debitis minus dolorum nobis dolore voluptate.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(139, 'qui', 'Repellendus hic non quos aliquid.', '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(140, 'est', 'Itaque sint omnis consequuntur ut minus id qui eum.', '2023-12-14 03:05:31', '2023-12-14 03:05:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `idRol` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `password`, `idRol`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(101, 'alberto28', 'BAexDaIwXA', 133, 107, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(102, 'kailee80', 'wH2BHB8nBa', 134, 102, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(103, 'cbode', 'mQsnGPMCiv', 133, 104, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(104, 'avandervort', 'Q17J0xv5V4', 131, 109, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(105, 'cledner', 'lWT5Iz4V1C', 134, 108, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(106, 'lsipes', 'xAMvtwlVse', 138, 110, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(107, 'kendra.lind', 'TvkuIrDUqh', 132, 105, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(108, 'geovanny.hansen', '8WjSeFqq3a', 137, 110, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(109, 'kassandra.abshire', 'ymTUcae11U', 135, 109, '2023-12-14 03:05:31', '2023-12-14 03:05:31'),
(110, 'watsica.michale', 'cO6kDDjYeE', 140, 110, '2023-12-14 03:05:31', '2023-12-14 03:05:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD PRIMARY KEY (`idCapacitacion`);

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
-- Indices de la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
  ADD PRIMARY KEY (`idDiscapacidad`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_Empleado_Cargo1` (`idCargo`),
  ADD KEY `fk_Empleado_Departamento1` (`idDepartamento`),
  ADD KEY `fk_Empleado_Estado1` (`idEstado`);

--
-- Indices de la tabla `empleado_has_capacitacion`
--
ALTER TABLE `empleado_has_capacitacion`
  ADD PRIMARY KEY (`idEmpleado`,`idCapacitacion`),
  ADD KEY `fk_Empleado_has_capacitacion_capacitacion1` (`idCapacitacion`);

--
-- Indices de la tabla `empleado_has_discapacidad`
--
ALTER TABLE `empleado_has_discapacidad`
  ADD PRIMARY KEY (`idEmpleado`,`idDiscapacidad`),
  ADD KEY `fk_Empleado_has_discapacidad_discapacidad1` (`idDiscapacidad`,`idEmpleado`) USING BTREE;

--
-- Indices de la tabla `empleado_has_instruccionformal`
--
ALTER TABLE `empleado_has_instruccionformal`
  ADD PRIMARY KEY (`idEmpleado`,`idInstruccionFormal`),
  ADD KEY `fk_Empleado_has_instruccionFormal_instruccionFormal1` (`idInstruccionFormal`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`),
  ADD UNIQUE KEY `tipoEstado` (`tipoEstado`);

--
-- Indices de la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  ADD PRIMARY KEY (`idEvaluacionDesempeno`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idEvaluador` (`idEvaluador`);

--
-- Indices de la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  ADD PRIMARY KEY (`idExperienciaLaboral`),
  ADD KEY `fk_ExperienciaLaboral_Empleado1` (`idEmpleado`);

--
-- Indices de la tabla `instruccionformal`
--
ALTER TABLE `instruccionformal`
  ADD PRIMARY KEY (`idInstruccionFormal`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idPermiso`),
  ADD KEY `fk_Permisos_TiposPermisos1` (`idTipoPermiso`),
  ADD KEY `fk_Permisos_Empleado1` (`idEmpleado`);

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
-- AUTO_INCREMENT de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `idCapacitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `controldiario`
--
ALTER TABLE `controldiario`
  MODIFY `idControlDiario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `datobancario`
--
ALTER TABLE `datobancario`
  MODIFY `idDatoBancario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
  MODIFY `idDiscapacidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  MODIFY `idEvaluacionDesempeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  MODIFY `idExperienciaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `instruccionformal`
--
ALTER TABLE `instruccionformal`
  MODIFY `idInstruccionFormal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  MODIFY `idReferenciaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `residencia`
--
ALTER TABLE `residencia`
  MODIFY `idResidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `salidacampo`
--
ALTER TABLE `salidacampo`
  MODIFY `idSalidaCampo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  MODIFY `idTipoContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `tipopermiso`
--
ALTER TABLE `tipopermiso`
  MODIFY `idTipoPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `tiposalida`
--
ALTER TABLE `tiposalida`
  MODIFY `idTipoSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_Contrato_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Contrato_TipoContrato1` FOREIGN KEY (`idTipoContrato`) REFERENCES `tipocontrato` (`idTipoContrato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `controldiario`
--
ALTER TABLE `controldiario`
  ADD CONSTRAINT `fk_ControlDiario_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datobancario`
--
ALTER TABLE `datobancario`
  ADD CONSTRAINT `fk_DatosBancarios_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `empleado_has_capacitacion`
--
ALTER TABLE `empleado_has_capacitacion`
  ADD CONSTRAINT `fk_Empleado_has_capacitacion_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Empleado_has_capacitacion_capacitacion1` FOREIGN KEY (`idCapacitacion`) REFERENCES `capacitacion` (`idCapacitacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_has_discapacidad`
--
ALTER TABLE `empleado_has_discapacidad`
  ADD CONSTRAINT `fk_Empleado_has_discapacidad_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Empleado_has_discapacidad_discapacidad1` FOREIGN KEY (`idDiscapacidad`) REFERENCES `discapacidad` (`idDiscapacidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_has_instruccionformal`
--
ALTER TABLE `empleado_has_instruccionformal`
  ADD CONSTRAINT `fk_Empleado_has_instruccionFormal_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Empleado_has_instruccionFormal_instruccionFormal1` FOREIGN KEY (`idInstruccionFormal`) REFERENCES `instruccionformal` (`idInstruccionFormal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  ADD CONSTRAINT `evaluaciondesempeno_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`),
  ADD CONSTRAINT `evaluaciondesempeno_ibfk_2` FOREIGN KEY (`idEvaluador`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  ADD CONSTRAINT `fk_ExperienciaLaboral_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `fk_Permisos_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Permisos_TiposPermisos1` FOREIGN KEY (`idTipoPermiso`) REFERENCES `tipopermiso` (`idTipoPermiso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  ADD CONSTRAINT `fk_ReferenciaLaboral_ExperienciaLaboral1` FOREIGN KEY (`idExperienciaLaboral`) REFERENCES `experiencialaboral` (`idExperienciaLaboral`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `residencia`
--
ALTER TABLE `residencia`
  ADD CONSTRAINT `fk_Residencia_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salidacampo`
--
ALTER TABLE `salidacampo`
  ADD CONSTRAINT `fk_SalidasCampo_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_SalidasCampo_TiposSalidas1` FOREIGN KEY (`idTipoSalida`) REFERENCES `tiposalida` (`idTipoSalida`) ON DELETE CASCADE ON UPDATE CASCADE;

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
