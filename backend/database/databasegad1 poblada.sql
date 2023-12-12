-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2023 a las 17:30:49
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
(82, 'Libero magnam provident culpa magnam et excepturi.', 'Ut autem id ipsum voluptatibus saepe est.', 'culpa', 'Ritchie Ltd', 53, '2011-02-23', 'maxime.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'Veritatis culpa qui culpa quia ea.', 'A iure iste quo explicabo.', 'quia', 'Connelly, Bernhard and Botsford', 63, '1987-05-19', 'impedit.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'Nihil ullam vel quia dignissimos.', 'Non sed unde explicabo voluptate rem fugiat.', 'dolorem', 'Cummings Inc', 45, '1977-08-06', 'quibusdam.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'Repellat rerum molestias molestias et exercitationem officia.', 'Sed quod sunt qui itaque.', 'debitis', 'Schamberger PLC', 42, '2018-11-19', 'inventore.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'Laudantium similique quia minus nihil quia nihil ratione et.', 'Totam amet repellat ut nemo est laboriosam eligendi.', 'magnam', 'Mann, Dach and Dibbert', 62, '2015-11-21', 'non.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'Beatae et necessitatibus velit molestias.', 'Exercitationem consequatur quos placeat.', 'qui', 'Little, Okuneva and Steuber', 44, '1993-04-15', 'et.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'Sit velit facilis sunt.', 'Aut cupiditate similique occaecati.', 'maiores', 'Rice-Bradtke', 43, '2023-01-04', 'error.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'Adipisci porro distinctio vel maxime laboriosam.', 'Quos ipsum qui pariatur.', 'qui', 'Hilpert Group', 7, '2021-01-10', 'totam.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'Consectetur vero dolores temporibus qui.', 'Voluptatem iusto culpa quam distinctio.', 'voluptas', 'O\'Conner, Schroeder and Kilback', 69, '1979-10-13', 'error.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(91, 'Cupiditate voluptatem labore consectetur blanditiis ipsam tenetur quia sit.', 'Voluptatem quae dolorem quam distinctio recusandae repudiandae sint.', 'deserunt', 'Oberbrunner PLC', 67, '1996-01-15', 'odio.pdf', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(81, 'doloribus', 'Qui dolor eum sapiente deleniti maiores non soluta eaque.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, 'alias', 'Magnam ex dolorum dolores expedita voluptatem ipsam.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'asperiores', 'Officia quos officiis quisquam natus.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'non', 'Eius cupiditate sapiente maxime quaerat est.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'et', 'Sunt ex ea maiores quos tenetur voluptas.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'omnis', 'Consectetur nihil praesentium maiores aut dolore aspernatur.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'quo', 'Totam ipsum quo consequatur consequuntur voluptatem.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'nisi', 'Distinctio cupiditate fuga quae nemo deserunt.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'eos', 'Repellendus rem quo quis velit praesentium optio.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'blanditiis', 'Quos dicta sed esse nihil harum velit occaecati quasi.', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(81, '2023-04-19', '2024-05-04', 89, 90, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, '2023-10-21', '2023-12-20', 81, 86, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, '2023-08-02', '2024-04-16', 86, 82, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, '2023-11-15', '2024-05-19', 88, 82, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, '2023-03-07', '2023-12-16', 83, 87, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, '2023-01-27', '2024-02-09', 86, 83, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, '2022-12-18', '2024-11-10', 81, 81, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, '2023-05-26', '2024-04-07', 81, 88, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, '2023-01-29', '2024-03-19', 86, 88, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, '2023-11-30', '2024-07-10', 82, 81, '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(81, '2022-02-19', '07:16:09', '09:12:19', '08:09:40', '19:56:03', 2.46, 88, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, '1987-01-26', '02:26:39', '12:54:21', '17:30:51', '19:05:55', 6.22, 87, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, '1976-12-29', '04:59:59', '09:41:13', '16:23:26', '13:36:47', 3.59, 90, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, '2014-05-22', '11:02:25', '02:03:18', '22:00:37', '14:35:03', 5.18, 82, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, '1980-07-26', '03:33:58', '10:41:20', '00:12:31', '21:13:02', 1.72, 86, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, '2005-06-25', '09:25:09', '05:34:37', '13:03:04', '22:11:09', 6.79, 84, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, '1977-12-12', '02:14:27', '09:27:03', '17:41:15', '01:46:13', 2.97, 85, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, '1982-08-06', '15:33:37', '07:40:16', '21:37:09', '12:29:22', 2.52, 88, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, '1971-10-26', '13:29:30', '20:53:57', '16:51:33', '09:37:54', 5.57, 84, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, '1976-08-08', '20:27:04', '16:39:21', '09:03:56', '20:29:14', 4.62, 90, '2023-12-12 21:26:05', '2023-12-12 21:26:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `idCuestionario` int(11) NOT NULL,
  `descripcion` varchar(145) DEFAULT NULL,
  `idEvaluacionDesempeno` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`idCuestionario`, `descripcion`, `idEvaluacionDesempeno`, `updated_at`, `created_at`) VALUES
(81, 'Ut repellendus iusto aliquam sequi maiores.', 87, '2023-12-12', '2023-12-12'),
(82, 'Magni vitae quia cum ab error.', 87, '2023-12-12', '2023-12-12'),
(83, 'Ex sit ea adipisci ut dicta molestiae.', 82, '2023-12-12', '2023-12-12'),
(84, 'Et omnis aut mollitia cupiditate quam.', 90, '2023-12-12', '2023-12-12'),
(85, 'Molestiae et vel vitae dolore.', 87, '2023-12-12', '2023-12-12'),
(86, 'Veritatis et facilis dolorem nostrum est dolor.', 89, '2023-12-12', '2023-12-12'),
(87, 'Nulla rem qui harum aut aut sit maiores.', 85, '2023-12-12', '2023-12-12'),
(88, 'Rem quia tempore aut tempora.', 83, '2023-12-12', '2023-12-12'),
(89, 'Omnis voluptatum nesciunt sint iste voluptas.', 90, '2023-12-12', '2023-12-12'),
(90, 'Itaque ratione exercitationem voluptatem corporis dolores.', 86, '2023-12-12', '2023-12-12');

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
(81, 'Klein PLC', '631101487', 'Ahorros', 86, '2023-12-12', '2023-12-12'),
(82, 'Hermiston, Kovacek and Schmitt', '1955550529', 'Corriente', 85, '2023-12-12', '2023-12-12'),
(83, 'Wyman-Keeling', '85776756', 'Corriente', 86, '2023-12-12', '2023-12-12'),
(84, 'Denesik, Strosin and Fahey', '4098904', 'Ahorros', 86, '2023-12-12', '2023-12-12'),
(85, 'Goyette Group', '871395628308', 'Ahorros', 84, '2023-12-12', '2023-12-12'),
(86, 'Cruickshank-Hirthe', '98317927184378', 'Corriente', 84, '2023-12-12', '2023-12-12'),
(87, 'Jast LLC', '5287154383', 'Ahorros', 81, '2023-12-12', '2023-12-12'),
(88, 'Miller, Hill and Swaniawski', '308776803838', 'Corriente', 89, '2023-12-12', '2023-12-12'),
(89, 'Raynor and Sons', '882734265836', 'Corriente', 84, '2023-12-12', '2023-12-12'),
(90, 'Donnelly LLC', '45808108980', 'Ahorros', 81, '2023-12-12', '2023-12-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `telefonos` varchar(20) DEFAULT NULL,
  `idUnidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`, `telefonos`, `idUnidad`, `created_at`, `updated_at`) VALUES
(161, 'et', '+1-262-373-5954', 85, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(162, 'fuga', '+1.434.210.9376', 83, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(163, 'doloremque', '1-575-420-1879', 85, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(164, 'aperiam', '1-715-601-5690', 87, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(165, 'aspernatur', '+1-561-516-1158', 84, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(166, 'est', '1-207-696-8073', 88, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(167, 'soluta', '+1-573-986-5968', 82, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(168, 'animi', '1-479-981-0360', 85, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(169, 'fugit', '(571) 594-4586', 88, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(170, 'quasi', '301-374-7951', 86, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(171, 'et', '1-820-978-0295', 83, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(172, 'quaerat', '1-559-459-4942', 81, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(173, 'dolorum', '541-742-6668', 88, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(174, 'voluptatem', '1-351-239-0471', 85, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(175, 'est', '+1.409.906.6838', 87, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(176, 'rem', '+1-571-578-5115', 90, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(177, 'magni', '1-863-691-9225', 87, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(178, 'consequatur', '+1-680-983-2177', 81, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(179, 'doloremque', '661.276.9774', 86, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(180, 'fuga', '414-408-9466', 86, '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(82, 'et', 'nihil', 35, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'quia', 'sit', 66, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'dolores', 'impedit', 84, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'voluptatem', 'tenetur', 72, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'hic', 'est', 16, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'et', 'vel', 2, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'quisquam', 'mollitia', 67, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'aut', 'ut', 73, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'ullam', 'ut', 44, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(91, 'eos', 'accusantium', 35, '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(81, '26555385', 'Finn', 'Murphy', '1979-03-22', 'Masculino', '678.444.4702', '+12129068184', 'jast.cierra@example.com', 'Montubio', 'Casado', 'B+', 'Monaco', 'Massachusetts', 'Lake Corrinefort', 'stad', 171, 83, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, '21687546', 'Cindy', 'Waters', '2005-09-17', 'Masculino', '952.968.5189', '1-531-310-9495', 'otilia.pfannerstill@example.com', 'Mestizo', 'Casado', 'B-', 'Lithuania', 'Virginia', 'North Agneschester', 'borough', 172, 83, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, '84547142', 'Felipe', 'Spencer', '2003-12-21', 'Femenino', '+17176841102', '(248) 622-5417', 'clotilde68@example.net', 'Afroecuatoriano', 'Viudo', 'A+', 'Gabon', 'Connecticut', 'Braunfurt', 'haven', 173, 88, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, '77315773', 'Hailey', 'Hirthe', '2008-05-12', 'Masculino', '(925) 345-3903', '1-423-783-3103', 'sid48@example.com', 'Indígena', 'Viudo', 'AB+', 'Poland', 'Indiana', 'Langworthport', 'chester', 174, 85, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, '32061896', 'Rosamond', 'Balistreri', '1988-09-02', 'Masculino', '+1-623-630-3228', '228.391.2804', 'loma76@example.net', 'Indígena', 'Viudo', 'AB+', 'Denmark', 'Wyoming', 'Hayesfort', 'mouth', 175, 89, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, '68804677', 'Alvah', 'Jast', '1979-08-09', 'Femenino', '1-423-735-5359', '+1-678-751-1678', 'friesen.stewart@example.net', 'Mestizo', 'Viudo', 'O-', 'Philippines', 'Nebraska', 'Port Arne', 'view', 176, 87, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, '30626882', 'Marcella', 'Terry', '1993-08-19', 'Femenino', '+1 (309) 223-1019', '+1.724.639.6214', 'aiyana.rohan@example.org', 'Afroecuatoriano', 'Divorciado', 'A-', 'Haiti', 'North Carolina', 'Mitchellbury', 'port', 177, 82, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, '8737433', 'Murray', 'Weissnat', '1997-12-05', 'Masculino', '231-400-8124', '847-633-4565', 'udickens@example.net', 'Montubio', 'Soltero', 'O+', 'Norway', 'Michigan', 'South Dinafort', 'mouth', 178, 81, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, '33935877', 'Miller', 'Corwin', '2011-04-19', 'Masculino', '+13857442496', '1-734-563-1826', 'missouri.johnston@example.net', 'Mestizo', 'Divorciado', 'A-', 'Norway', 'North Dakota', 'North Nedra', 'berg', 179, 83, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, '9902690', 'Christy', 'Ritchie', '2018-07-25', 'Femenino', '234-735-3580', '+1-281-300-3911', 'jacobson.tiana@example.net', 'Afroecuatoriano', 'Divorciado', 'B-', 'Turkey', 'Pennsylvania', 'Christophefort', 'mouth', 180, 81, 9, '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(81, 82, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(83, 87, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(84, 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(84, 91, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(87, 88, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(87, 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(87, 91, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(88, 86, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(89, 85, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(89, 91, '2023-12-12 21:26:06', '2023-12-12 21:26:06');

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
(83, 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(90, 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_evaluaciondesempeno`
--

CREATE TABLE `empleado_has_evaluaciondesempeno` (
  `idEmpleado` int(11) NOT NULL,
  `idEvaluacionDesempeno` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado_has_evaluaciondesempeno`
--

INSERT INTO `empleado_has_evaluaciondesempeno` (`idEmpleado`, `idEvaluacionDesempeno`, `created_at`, `updated_at`) VALUES
(82, 81, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(82, 83, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(84, 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(85, 82, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(85, 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(85, 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(86, 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(88, 82, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(89, 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(90, 88, '2023-12-12 21:26:06', '2023-12-12 21:26:06');

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
(9, 'activo', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciondesempeno`
--

CREATE TABLE `evaluaciondesempeno` (
  `idEvaluacionDesempeno` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `evaluaciondesempeno`
--

INSERT INTO `evaluaciondesempeno` (`idEvaluacionDesempeno`, `fecha`, `resultado`, `observaciones`, `created_at`, `updated_at`) VALUES
(81, '2015-11-29 05:00:00', 'recusandae', 'Sunt quia sit iusto ad dolor. Labore blanditiis voluptas quia rerum voluptatem quod ut. Eligendi vel rerum et dolorem. Non atque natus laudantium sed sit provident provident.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, '2002-06-07 05:00:00', 'asperiores', 'Aliquam ducimus molestiae accusamus distinctio quia sed eaque. Necessitatibus aut accusantium harum odio deleniti repellat. Sapiente enim ipsa qui nobis ut nihil.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, '2014-10-15 05:00:00', 'itaque', 'Ut occaecati consequatur atque ratione rerum voluptatum blanditiis. Sed delectus et ut aut ad et.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, '1979-06-25 05:00:00', 'perspiciatis', 'Officiis et aperiam soluta ut at soluta. Aliquam rem cumque voluptatem commodi qui corporis. Adipisci autem reiciendis et magnam excepturi et. Cupiditate et modi laboriosam quia eum quo. Praesentium veniam qui nostrum itaque consequatur dolores dignissimos.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, '1990-07-02 05:00:00', 'est', 'Alias vel quas non aut quaerat. Et quibusdam unde omnis veniam similique. Sit cumque sequi dolore accusantium neque. Sunt vero incidunt possimus quo ab. Corporis vero et eum.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, '1971-08-19 05:00:00', 'quibusdam', 'Similique sequi dolor ab quos accusamus vel. Sapiente repellat quod iusto. Ea expedita illum libero et. Consequatur repudiandae quasi qui unde aut ut et.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, '1997-09-08 05:00:00', 'aut', 'Voluptas rem commodi quia et modi. Eveniet rerum sed nostrum dolores eos nesciunt perferendis. Et aut quos dolor veniam quo.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, '2007-04-26 05:00:00', 'molestiae', 'Veritatis dolorem error totam et dolores. Accusamus qui est sint praesentium rerum quis porro. Aliquam est excepturi qui blanditiis. Nesciunt aliquid voluptas quidem adipisci sequi quas.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, '1984-08-19 05:00:00', 'aliquid', 'Numquam optio similique dolorum. Inventore sed fugiat quaerat dolores. Atque rem accusantium voluptate natus.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, '2012-09-02 05:00:00', 'doloribus', 'Vitae nobis fugiat est neque consequatur maxime fugiat. Est ratione fugiat temporibus est accusamus quo repudiandae dignissimos. Labore ex corporis qui aut eum quasi. Esse reprehenderit rerum sit aspernatur voluptatem.', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(67, 'Veum, Bashirian and Runolfsson', '1-260-640-6897', 'nam', 'Industrial Engineering Technician', '1973-04-04', '2014-08-03', 'Et eum maiores dolor. Mollitia ut porro dolorem possimus aut culpa repellendus voluptatibus. Sit quas vel voluptatem nostrum nulla. Eos officiis aut delectus autem voluptatem.', 'qui', 85, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(68, 'Vandervort Inc', '858.235.6398', 'praesentium', 'Fish Hatchery Manager', '2016-07-26', '1999-01-02', 'Nesciunt ut nesciunt amet et. Cupiditate aliquam dolor similique delectus. Saepe adipisci autem vel soluta repellendus.', 'dolore', 85, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(69, 'Hudson, Crist and Klocko', '1-539-793-9111', 'sit', 'Plumber OR Pipefitter OR Steamfitter', '2022-12-08', '1981-06-08', 'Voluptate sit ut nulla harum. Facere labore quisquam praesentium enim enim ab possimus. Esse suscipit deleniti placeat consequatur. Commodi ea accusamus ducimus necessitatibus magnam iusto tempora amet. Ut ipsa praesentium ipsum et maiores aut officiis eos.', 'totam', 88, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(70, 'Gulgowski LLC', '917-240-5601', 'eos', 'Stock Broker', '1979-10-26', '2021-04-15', 'Nam sed et voluptas ea rerum quae blanditiis nostrum. Et architecto fugit sit iusto necessitatibus sint tenetur. Aspernatur atque impedit et et. Dolorem minima corporis quis voluptatem officia aliquam ducimus.', 'numquam', 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(71, 'Cronin, Ruecker and Torphy', '781-835-9674', 'quibusdam', 'Gaming Service Worker', '1993-01-06', '1999-07-05', 'Minus eligendi unde consectetur ea quidem molestiae asperiores vero. Dolor et nesciunt est voluptatem ipsa est. Dolorum fugit nihil pariatur tempore voluptas cupiditate accusamus. Recusandae quia voluptatem ducimus dolorem aut et et. Cum ut unde autem.', 'deserunt', 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(72, 'Frami-Gottlieb', '909.924.1657', 'vel', 'Set Designer', '2021-10-17', '1974-06-07', 'Corrupti omnis qui aut nisi voluptatum. Velit et ut aut et distinctio minima. In minima doloribus molestias aut inventore voluptas saepe libero. Odio debitis velit quas.', 'quibusdam', 87, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(73, 'Ondricka, Metz and Green', '+1.808.856.9381', 'dolore', 'Directory Assistance Operator', '1999-03-22', '1995-09-14', 'Quidem doloremque corporis excepturi aut rem. Rerum maiores praesentium maiores sit. Nisi at necessitatibus maxime illum. Molestiae repellendus officia atque dolor dolorum incidunt atque.', 'explicabo', 81, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(74, 'O\'Keefe-Rau', '1-602-975-2284', 'sed', 'Personal Care Worker', '2000-12-17', '1973-09-16', 'Ea facere beatae soluta. Quam voluptatem molestiae ea aut ipsam nemo. Sit quia ea eos aut dolorem quia quis. Sed nostrum enim quia non laudantium aut dolorum.', 'aperiam', 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(75, 'Von Ltd', '+1-781-969-1394', 'inventore', 'Highway Maintenance Worker', '1974-08-17', '2012-12-30', 'Sint eos sequi culpa tempore aut nihil impedit aspernatur. Cumque autem consequatur similique. A sunt dolores quasi aut voluptatum.', 'molestias', 88, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(76, 'Bogisich-Smitham', '+1-847-532-6009', 'consequatur', 'Secretary', '1995-09-12', '1992-12-01', 'Magnam quo accusamus repellat tempore ad ut quod. Qui rerum molestiae autem consequatur ut fugit in. Quidem sed commodi incidunt excepturi similique veniam.', 'et', 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06');

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
(81, 'Deserunt necessitatibus beatae distinctio est repellat omnis.', '2002-02-17', 'Maestría', 'delectus', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, 'Et repellat id quaerat alias dicta inventore qui.', '1979-10-15', 'Bachillerato', 'ea', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'Voluptas non aut esse amet commodi in blanditiis provident.', '2017-11-22', 'Bachillerato', 'corrupti', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'Est accusantium autem quibusdam dolorum et modi.', '2018-01-26', 'Maestría', 'ea', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'Enim repellat reiciendis nam.', '1971-01-31', 'Maestría', 'fugiat', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'Sunt perferendis est sit nisi.', '2015-07-06', 'Bachillerato', 'ut', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'Voluptas est dolore dolorem enim ad.', '1972-07-08', 'Maestría', 'sed', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'Inventore cumque incidunt quas provident fugit.', '2015-06-16', 'Bachillerato', 'recusandae', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'Reiciendis ut iste reiciendis tempora voluptatem.', '1996-02-02', 'Licenciatura', 'tempore', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'Distinctio aut cupiditate repudiandae nulla et.', '2000-09-04', 'Licenciatura', 'ut', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(61, '1980-02-24', '2015-02-27', '2006-07-31', 3, '0', '0', 81, 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(62, '1984-12-20', '1986-10-11', '1979-01-11', 7, '0', '1', 83, 85, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(63, '1979-01-27', '2012-04-11', '1989-10-12', 4, '1', '0', 87, 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(64, '2004-01-17', '2008-02-01', '2023-08-28', 3, '1', '1', 84, 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(65, '2008-01-01', '1993-08-17', '1982-02-06', 8, '0', '0', 90, 82, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(66, '1978-05-19', '1987-12-09', '2007-11-13', 5, '1', '0', 84, 86, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(67, '1989-02-07', '1997-11-07', '1990-12-27', 5, '0', '0', 90, 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(68, '1972-06-25', '1978-09-11', '2006-09-07', 2, '1', '1', 83, 85, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(69, '2014-06-07', '2007-07-07', '1987-02-21', 0, '1', '1', 90, 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(70, '2018-12-28', '1989-01-01', '1989-12-11', 3, '1', '0', 81, 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntarespuestacuestionario`
--

CREATE TABLE `preguntarespuestacuestionario` (
  `idPreguntaRespuestaCuestionario` int(11) NOT NULL,
  `pregunta` varchar(240) DEFAULT NULL,
  `respuesta` varchar(240) DEFAULT NULL,
  `idCuestionario` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `preguntarespuestacuestionario`
--

INSERT INTO `preguntarespuestacuestionario` (`idPreguntaRespuestaCuestionario`, `pregunta`, `respuesta`, `idCuestionario`, `created_at`, `updated_at`) VALUES
(61, 'Ipsa doloremque ut exercitationem est.', 'Quos earum nesciunt tenetur id incidunt quos. Non quam laborum omnis nam qui soluta. Facere rem nihil eligendi libero quod neque. Molestiae voluptas qui earum aspernatur.', 88, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(62, 'Eos consequatur dignissimos blanditiis ipsam et sit et animi.', 'Accusantium soluta id vel sed. Ab sit rem occaecati id aperiam. Id itaque reprehenderit quis similique quia excepturi quis. Laboriosam impedit est qui consequuntur adipisci.', 86, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(63, 'Consequatur dolorum accusantium at laudantium aperiam maxime.', 'Praesentium rem qui sequi perspiciatis dolorem. Ut vel libero voluptatem doloribus quaerat. Aut sunt voluptatem cupiditate. Ipsa ut deleniti veritatis eos quia possimus nisi.', 86, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(64, 'Dolor tempora vel tenetur quia amet rerum.', 'Occaecati pariatur nostrum minima ea nemo. Commodi voluptate recusandae consectetur ut hic doloremque adipisci.', 85, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(65, 'Voluptatum in natus sint provident vitae ab.', 'Incidunt cupiditate dolor enim porro itaque fuga nihil id. Voluptatum ut ab quibusdam qui ut autem minus. Et distinctio ut ducimus aut velit laboriosam explicabo.', 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(66, 'Impedit saepe iusto quo dolor.', 'Mollitia magni laborum nostrum. Delectus dolore consequatur aut est reiciendis quaerat dolorem. Voluptatem et quaerat et expedita architecto et.', 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(67, 'Nihil at doloribus itaque ut est quibusdam vitae.', 'Ab enim delectus laboriosam voluptatem. Asperiores aperiam dolor sunt rerum. Illum aut quia expedita sunt quis delectus.', 82, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(68, 'Ut voluptatem rerum doloremque aut ut natus ab.', 'Numquam ut voluptatem ea veniam. Nulla et perspiciatis laborum maxime. In et exercitationem error non deserunt quos.', 88, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(69, 'Rerum quibusdam at asperiores excepturi adipisci ut.', 'Ducimus ducimus est consectetur est quo voluptas. Provident et unde quisquam veniam consequatur excepturi suscipit. Recusandae molestiae illo neque dolores qui voluptatum.', 82, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(70, 'Provident officiis consequatur repellendus atque totam.', 'Sed a tempora corrupti dolorem sint qui. Similique natus et qui itaque vero nemo doloremque. Dolores placeat quas minima doloremque saepe atque voluptatibus.', 81, '2023-12-12 21:26:06', '2023-12-12 21:26:06');

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
(61, 'Vella', 'Vandervort', '3387861590', '+1.573.875.2821', 'electa84@example.com', 70, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(62, 'Jared', 'Beatty', '5812012311', '+1 (702) 484-9518', 'alfred50@example.net', 76, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(63, 'Orion', 'Carroll', '7576159492', '(682) 817-5503', 'rosetta04@example.com', 73, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(64, 'Shanon', 'Wolf', '2020343701', '1-949-322-9927', 'vernie.waters@example.com', 69, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(65, 'Elfrieda', 'Frami', '4408627625', '(346) 933-8238', 'sporer.benton@example.net', 76, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(66, 'Oran', 'Grady', '3147226157', '407.600.7525', 'gbradtke@example.net', 72, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(67, 'Jamir', 'Littel', '4187595879', '(573) 664-6898', 'ekuvalis@example.com', 73, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(68, 'Lilly', 'Purdy', '9127274540', '(248) 588-4299', 'norbert.fisher@example.org', 73, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(69, 'Consuelo', 'Fadel', '4757003999', '+1.747.931.5221', 'little.amber@example.com', 67, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(70, 'Maryjane', 'Kuhic', '2048531151', '+1.726.656.3989', 'luettgen.kevin@example.com', 67, '2023-12-12 21:26:06', '2023-12-12 21:26:06');

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
(61, 'Afghanistan', 'Nevada', 'North Justyn', 'non', 'dolore', '28418 Balistreri Drive Apt. 596', 'Perspiciatis ea autem eveniet et modi quo.', '+12533818453', 82, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(62, 'Brazil', 'South Dakota', 'Wittingshire', 'doloribus', 'perferendis', '74260 Beverly Vista', 'Non sit est delectus pariatur.', '575-981-2179', 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(63, 'France', 'New Mexico', 'Nadiaborough', 'ullam', 'ut', '334 Ova Mill', 'Dolores sed voluptate voluptatum rerum impedit fuga.', '(364) 932-4121', 81, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(64, 'Israel', 'California', 'Domenicton', 'quis', 'voluptatem', '6523 Gaylord Landing Apt. 813', 'Optio deserunt aut voluptas omnis earum molestias.', '925.781.4004', 88, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(65, 'Yemen', 'District of Columbia', 'North Cedrickland', 'corporis', 'enim', '154 Sanford Station Apt. 659', 'Qui adipisci quasi saepe porro maxime esse dolore.', '1-502-385-7857', 87, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(66, 'Turkey', 'California', 'Braunview', 'ut', 'harum', '59566 Caitlyn Pines', 'Praesentium fugit consequatur voluptatem reprehenderit fuga ut.', '+19404921965', 87, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(67, 'Puerto Rico', 'New Mexico', 'Lake Art', 'qui', 'esse', '37077 Cormier Garden Apt. 410', 'Omnis consequatur perspiciatis nesciunt alias.', '+1-831-748-9389', 85, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(68, 'Guinea', 'Kansas', 'O\'Connerfort', 'iure', 'esse', '276 Buster River Apt. 806', 'Accusantium iure natus velit vel asperiores provident eveniet.', '1-872-882-8798', 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(69, 'Azerbaijan', 'Alabama', 'North Deondreland', 'voluptatibus', 'quidem', '44713 Celestine Land', 'Dolores ut qui qui est modi reiciendis aut.', '1-330-758-0747', 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(70, 'Israel', 'Arizona', 'Beahanmouth', 'animi', 'molestiae', '895 Stark Park', 'Consequatur rerum iure molestiae repudiandae earum.', '+1 (743) 537-4164', 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06');

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
(81, 'nulla', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, 'quos', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'eveniet', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'amet', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'iure', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'ex', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'veniam', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'aut', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'nobis', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'exercitationem', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(61, '1985-11-03', '16:58:03', '22:05:58', '1', '1', 90, 85, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(62, '2012-10-09', '15:18:20', '02:16:35', '1', '1', 84, 82, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(63, '2023-05-22', '22:14:21', '05:41:28', '1', '1', 85, 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(64, '1983-12-12', '05:32:37', '21:02:16', '1', '0', 82, 89, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(65, '1978-01-26', '09:02:35', '19:14:25', '0', '0', 89, 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(66, '1997-04-25', '07:06:14', '05:46:39', '0', '0', 81, 87, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(67, '1999-01-23', '06:15:43', '09:08:04', '0', '1', 81, 81, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(68, '1999-07-04', '18:36:49', '05:54:55', '1', '1', 84, 84, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(69, '2009-06-21', '13:18:33', '20:19:15', '1', '0', 85, 86, '2023-12-12 21:26:06', '2023-12-12 21:26:06'),
(70, '2009-04-14', '20:25:38', '23:51:55', '1', '1', 87, 90, '2023-12-12 21:26:06', '2023-12-12 21:26:06');

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
(81, 'dolores', 'Voluptas harum excepturi animi.', 'Sint repellendus voluptates sunt suscipit aut adipisci nulla. Quos ipsam in ut autem.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, 'quo', 'Sed voluptatem quia at et.', 'Porro fuga illum voluptatem nobis doloribus molestiae neque. Distinctio quibusdam quaerat unde tempora dolor officia in. Aspernatur molestiae sapiente id quisquam sit expedita.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'ipsam', 'Accusantium soluta odit est et et.', 'Est ut ipsa suscipit quo ut. Et quia fugiat quas ut sit. Eum quo suscipit distinctio voluptatem. Saepe sint ullam neque dignissimos.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'voluptate', 'Eos sit repellendus officiis debitis nostrum quod facere.', 'Maxime adipisci modi dolorem repellendus consequatur quos ad. Aut est voluptatem qui aut sint. Ut autem temporibus necessitatibus et.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'quidem', 'Ratione soluta voluptatem aut harum quos sunt aspernatur.', 'Velit quo dolores ut ratione. Consectetur omnis provident maxime. Voluptas rerum sit magnam et ut reprehenderit.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'fugiat', 'Consequatur nisi iusto nulla numquam nesciunt dignissimos.', 'Temporibus sint quod officiis aut ut. Consectetur nostrum enim praesentium consequatur consectetur nobis. Quis doloremque voluptatem nihil.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'ullam', 'Et nam cum odio voluptatem dolore.', 'Inventore quidem aut laborum molestias laudantium veniam. Ut repellendus optio repellat quo voluptatem qui. Explicabo rerum quam aspernatur dicta earum accusamus minima cupiditate. Est sit autem quo alias molestiae sapiente magnam esse.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'aut', 'Totam excepturi molestias et quis ut delectus quo.', 'Sequi molestiae laborum quia. Quisquam culpa similique voluptatem molestiae iure ut totam. Rerum quaerat nemo maxime sed. Ut rerum enim qui adipisci culpa voluptatem doloribus.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'ut', 'Magnam quaerat tenetur dolor perspiciatis aliquid.', 'Dicta dolor minus consequatur. Quas debitis et natus explicabo vitae eum ducimus. Molestiae est ut voluptas hic.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'rerum', 'Quo et consequatur sit aspernatur fugiat.', 'Eius non dignissimos eligendi est et voluptas. Adipisci maiores libero voluptas ipsam. Aperiam rem ipsa occaecati sed et sed veniam. Tempora aliquid suscipit id sint.', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(81, 'qui', 'Nemo consectetur error consequatur ut.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, 'et', 'Enim deserunt dolor non omnis temporibus eaque est.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'dolores', 'Eos voluptates eaque veritatis nam a.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'facere', 'Quo maxime tenetur consectetur iusto sed eos in.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'quia', 'Nobis aut sapiente et ad natus eligendi id.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'et', 'Animi expedita suscipit qui vel quod quisquam.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'tempora', 'Ut delectus nisi doloremque est molestiae quod autem.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'eos', 'Non ex veritatis ut sunt aut blanditiis excepturi nesciunt.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'dolores', 'Et vero voluptas sint quia.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'totam', 'Sunt illum enim est et dolor cupiditate aut est.', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(81, 'et', 'Quos aperiam iure necessitatibus voluptas sit repellat.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, 'voluptatibus', 'Eum molestiae dolor natus quibusdam occaecati qui.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'fugit', 'Odio et reiciendis eveniet aperiam.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'officiis', 'Perspiciatis ullam sit qui nam voluptatibus quo.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'et', 'Assumenda a omnis modi distinctio ut.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'ratione', 'Et consequatur ipsa voluptatem fugiat aperiam.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'ratione', 'Quas et quia eaque cum assumenda veniam.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'quia', 'Adipisci dolorem nisi enim ipsum deleniti et.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'molestias', 'Hic nesciunt animi eos error suscipit expedita debitis.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'aperiam', 'Magni in aspernatur aut ipsum autem deserunt.', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(81, 'commodi', 'Qui numquam laboriosam voluptas odit nam qui porro.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, 'assumenda', 'Consequatur magnam ea et et corrupti quia.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'sed', 'Quo ad iste rerum nisi.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'voluptas', 'Vero est blanditiis minus est.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'reiciendis', 'Exercitationem consectetur est quia molestias nisi non.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'ratione', 'Est quia aut expedita occaecati et.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'voluptatem', 'Labore repellendus qui numquam voluptatem sint reiciendis.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'quam', 'Explicabo quasi culpa consequatur nisi et illo.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'saepe', 'Qui quis autem eveniet ex aperiam.', '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'et', 'Laborum et expedita alias vitae minima quibusdam.', '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
(81, 'yundt.jairo', 'mDCG6rI48F', 82, 83, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(82, 'gwitting', 'jGmNLSY0NJ', 83, 88, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(83, 'bode.magnus', 'ylIVAKcNXu', 85, 90, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(84, 'manderson', 'JvtV3ThGgW', 83, 90, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(85, 'jaeden40', 'Rebo0d4Tgv', 86, 88, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(86, 'rdooley', 'urWkwzhaSh', 85, 90, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(87, 'botsford.torrey', 'kDiqYd2Mya', 89, 89, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(88, 'storphy', 'vzGjwHsg9E', 84, 82, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(89, 'zcassin', 'QtUsloxp9F', 85, 87, '2023-12-12 21:26:05', '2023-12-12 21:26:05'),
(90, 'blehner', 'Efjuix3Oux', 88, 84, '2023-12-12 21:26:05', '2023-12-12 21:26:05');

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
-- Indices de la tabla `empleado_has_evaluaciondesempeno`
--
ALTER TABLE `empleado_has_evaluaciondesempeno`
  ADD PRIMARY KEY (`idEmpleado`,`idEvaluacionDesempeno`),
  ADD KEY `fk_Empleado_has_EvaluacionDesempeno_EvaluacionDesempeno1` (`idEvaluacionDesempeno`);

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
  ADD PRIMARY KEY (`idEvaluacionDesempeno`);

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
-- AUTO_INCREMENT de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `idCapacitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `controldiario`
--
ALTER TABLE `controldiario`
  MODIFY `idControlDiario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `idCuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `datobancario`
--
ALTER TABLE `datobancario`
  MODIFY `idDatoBancario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
  MODIFY `idDiscapacidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  MODIFY `idEvaluacionDesempeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  MODIFY `idExperienciaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `instruccionformal`
--
ALTER TABLE `instruccionformal`
  MODIFY `idInstruccionFormal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `preguntarespuestacuestionario`
--
ALTER TABLE `preguntarespuestacuestionario`
  MODIFY `idPreguntaRespuestaCuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  MODIFY `idReferenciaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `residencia`
--
ALTER TABLE `residencia`
  MODIFY `idResidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `salidacampo`
--
ALTER TABLE `salidacampo`
  MODIFY `idSalidaCampo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  MODIFY `idTipoContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `tipopermiso`
--
ALTER TABLE `tipopermiso`
  MODIFY `idTipoPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `tiposalida`
--
ALTER TABLE `tiposalida`
  MODIFY `idTipoSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

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
-- Filtros para la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD CONSTRAINT `fk_Cuestionario_EvaluacionDesempeno1` FOREIGN KEY (`idEvaluacionDesempeno`) REFERENCES `evaluaciondesempeno` (`idEvaluacionDesempeno`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `empleado_has_evaluaciondesempeno`
--
ALTER TABLE `empleado_has_evaluaciondesempeno`
  ADD CONSTRAINT `fk_Empleado_has_EvaluacionDesempeno_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Empleado_has_EvaluacionDesempeno_EvaluacionDesempeno1` FOREIGN KEY (`idEvaluacionDesempeno`) REFERENCES `evaluaciondesempeno` (`idEvaluacionDesempeno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_has_instruccionformal`
--
ALTER TABLE `empleado_has_instruccionformal`
  ADD CONSTRAINT `fk_Empleado_has_instruccionFormal_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Empleado_has_instruccionFormal_instruccionFormal1` FOREIGN KEY (`idInstruccionFormal`) REFERENCES `instruccionformal` (`idInstruccionFormal`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `preguntarespuestacuestionario`
--
ALTER TABLE `preguntarespuestacuestionario`
  ADD CONSTRAINT `fk_PreguntasRespuestasCuestionario_Cuestionario1` FOREIGN KEY (`idCuestionario`) REFERENCES `cuestionario` (`idCuestionario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
