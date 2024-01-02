-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-12-2023 a las 03:32:20
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
-- Base de datos: `prueba`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `capacitacion`
--

INSERT INTO `capacitacion` (`idCapacitacion`, `nombre`, `descripcion`, `tipoEvento`, `institucion`, `cantidadHoras`, `fecha`, `created_at`, `updated_at`) VALUES
(101, 'Voluptas modi error ipsa minus omnis vitae.', 'Consectetur voluptas eos soluta officiis tempore.', 'illum', 'Lehner Ltd', 68, '2001-09-08', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(102, 'Reprehenderit sequi nobis fuga sit explicabo perferendis expedita.', 'Qui porro doloribus ab debitis minima omnis iure iste.', 'porro', 'Tromp, Klocko and Metz', 26, '2013-05-17', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(103, 'Laborum nihil rerum vero est ullam est.', 'Quisquam fugit cupiditate incidunt ullam in assumenda recusandae.', 'ut', 'Spinka, Treutel and O\'Connell', 7, '2022-03-02', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(104, 'Quia recusandae natus ea sit.', 'Dolore omnis debitis eos harum qui vel harum.', 'aut', 'Ritchie-Gerhold', 61, '2001-09-15', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(105, 'Totam et magnam saepe ea.', 'Repellat voluptas explicabo dolorem occaecati quos voluptatem.', 'occaecati', 'Murray, Lynch and Tremblay', 68, '2023-03-20', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(106, 'Sed officia libero quisquam quasi.', 'Numquam laudantium nostrum facere magnam vel delectus.', 'est', 'Moore Ltd', 56, '2018-10-03', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(107, 'Exercitationem quae a velit numquam similique autem velit.', 'Autem commodi et quod facere qui voluptate non.', 'ea', 'Bogan, Bruen and Weissnat', 12, '2018-11-05', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(108, 'Sit fuga nobis id accusantium provident.', 'Aut dolor exercitationem iste expedita nesciunt.', 'minima', 'Simonis-Skiles', 64, '1982-12-10', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(109, 'Asperiores quaerat rerum maiores minus porro quasi.', 'Voluptates architecto quia ut.', 'eaque', 'Swift LLC', 43, '2020-11-18', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(110, 'Aperiam aliquam consequatur aliquid non dolorem inventore in.', 'Magni corrupti quaerat consequuntur.', 'soluta', 'Howe-Leannon', 70, '2020-05-12', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(112, 'Voluptas modi error ipsa minus omnis vitae.', 'Consectetur voluptas eos soluta officiis tempore.', 'illum', 'Lehner Ltd', 68, '2001-09-08', '2023-12-27 11:21:45', '2023-12-27 11:21:45'),
(113, 'Voluptas modi error ipsa minus omnis vitae.', 'Consectetur voluptas eos soluta officiis tempore.', 'illum', 'Lehner Ltd', 68, '2001-09-08', '2023-12-27 11:22:02', '2023-12-27 11:22:02');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(101, 'voluptas', 'Sunt impedit quaerat saepe est voluptatum ut sit est.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(102, 'quo', 'Vitae culpa quasi ut et doloremque exercitationem.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(103, 'eum', 'Laboriosam enim est dolorum libero officiis ratione eum.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(104, 'unde', 'Iure et vel et natus voluptatem deleniti delectus dolor.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(105, 'et', 'Ut maiores distinctio numquam vel asperiores.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(106, 'quo', 'Quis accusantium voluptas itaque repellendus error dolores.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(107, 'et', 'Magnam veritatis quaerat dignissimos suscipit.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(108, 'vel', 'Fugit aut deleniti repudiandae et.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(109, 'vero', 'Nihil consequuntur id non veritatis reiciendis suscipit fugit.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(110, 'vel', 'Ea sed in minus assumenda beatae debitis excepturi.', '2023-12-17 05:54:45', '2023-12-17 05:54:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `idConfiguracion` bigint(20) UNSIGNED NOT NULL,
  `clave` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`idConfiguracion`, `clave`, `valor`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'max_intentos', '3', NULL, NULL, '2023-12-27 10:31:19'),
(2, 'tiempo_bloqueo', '2', 'Tiempo de bloqueo en minutos', NULL, NULL),
(3, 'tiempo_cierre_sesion', '3', 'Tiempo de cierre de sesión en minutos', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`idContrato`, `fechaInicio`, `fechaFin`, `idTipoContrato`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(91, '2022-12-25', '2024-10-26', 107, 96, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(92, '2023-11-17', '2024-01-02', 110, 91, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(93, '2023-12-02', '2024-03-15', 101, 93, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(94, '2023-09-22', '2024-08-28', 109, 99, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(95, '2023-08-22', '2024-02-18', 104, 92, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(96, '2023-10-23', '2024-01-31', 105, 100, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(97, '2023-12-03', '2024-01-13', 109, 100, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(98, '2023-07-12', '2024-07-15', 102, 98, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(99, '2023-11-03', '2024-03-02', 103, 93, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(100, '2023-10-22', '2024-09-27', 108, 96, '2023-12-17 05:54:46', '2023-12-17 05:54:46');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datobancario`
--

INSERT INTO `datobancario` (`idDatoBancario`, `nombreBanco`, `numeroCuenta`, `tipoCuenta`, `idEmpleado`, `updated_at`, `created_at`) VALUES
(91, 'Gislason, Purdy and Hartmann', '8301469', 'Corriente', 99, '2023-12-17', '2023-12-17'),
(92, 'Conn-West', '78896033', 'Ahorros', 100, '2023-12-17', '2023-12-17'),
(93, 'Raynor, Marks and Zieme', '392363364705', 'Corriente', 91, '2023-12-17', '2023-12-17'),
(94, 'Rice, Marks and Pfannerstill', '1745700281', 'Corriente', 100, '2023-12-17', '2023-12-17'),
(95, 'Quigley, Sipes and Raynor', '2433447947', 'Corriente', 98, '2023-12-17', '2023-12-17'),
(96, 'Kilback-Ritchie', '908003123', 'Corriente', 100, '2023-12-17', '2023-12-17'),
(97, 'Trantow Inc', '9475155701723', 'Corriente', 91, '2023-12-17', '2023-12-17'),
(98, 'Schulist-Rogahn', '07830228178', 'Ahorros', 100, '2023-12-17', '2023-12-17'),
(99, 'Pouros-McCullough', '423167516061', 'Ahorros', 95, '2023-12-17', '2023-12-17'),
(100, 'Marks-Friesen', '69121223', 'Ahorros', 98, '2023-12-17', '2023-12-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `idUnidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`, `descripcion`, `telefono`, `idUnidad`, `created_at`, `updated_at`) VALUES
(201, 'aliquam', 'Fugit unde voluptatem laboriosam quo cum.', '938-553-0794', 102, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(202, 'dicta', 'Debitis aliquam provident soluta expedita ducimus qui.', '+1.816.210.7254', 106, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(203, 'alias', 'Aut et ut minus dolorem sit voluptatem.', '515.818.7460', 104, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(204, 'blanditiis', 'Sed non omnis et quam molestiae nisi corrupti.', '(224) 842-1505', 108, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(205, 'architecto', 'Porro molestiae rerum consequatur veniam cupiditate.', '1-443-564-5759', 110, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(206, 'consequatur', 'Modi quis dolorum et possimus sunt et perspiciatis illum.', '(930) 357-4825', 104, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(207, 'quis', 'Recusandae quis sint quas quia quia.', '+12674521918', 102, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(208, 'repudiandae', 'Doloremque aut facilis voluptatem ut dolor perferendis.', '+1 (848) 437-1840', 101, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(209, 'hic', 'Qui voluptatem ipsum placeat nemo minus iste maiores.', '+17757789189', 109, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(210, 'nihil', 'Aut inventore dignissimos doloremque deserunt.', '(321) 732-2447', 109, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(211, 'laboriosam', 'Soluta dicta exercitationem qui minus qui dolorum.', '1-364-983-4670', 106, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(212, 'ut', 'Temporibus nulla magnam maxime repellat et vel quisquam.', '+1-540-554-5023', 110, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(213, 'nesciunt', 'Animi et sit eum qui nemo rerum.', '1-678-772-4511', 106, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(214, 'dignissimos', 'Doloribus et et atque et pariatur alias.', '1-862-608-2028', 108, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(215, 'quo', 'Aut quia molestias numquam ullam vel est.', '+1-501-223-5115', 110, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(216, 'quia', 'Iste unde ullam accusamus in minus architecto.', '424-875-1332', 109, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(217, 'magnam', 'Reprehenderit eius libero sed praesentium eius quam nihil.', '(636) 871-7083', 101, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(218, 'iste', 'Sit ipsam qui aut voluptatem sunt voluptates aut laboriosam.', '1-618-227-9179', 106, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(219, 'sint', 'Facere voluptas laboriosam harum ducimus aut minima.', '+17176145277', 104, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(220, 'est', 'Voluptates iure voluptatibus aut et autem ea.', '848-225-6055', 109, '2023-12-17 05:54:45', '2023-12-17 05:54:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapacidad`
--

CREATE TABLE `discapacidad` (
  `idDiscapacidad` int(11) NOT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `tipo` varchar(145) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `discapacidad`
--

INSERT INTO `discapacidad` (`idDiscapacidad`, `nombre`, `tipo`, `descripcion`, `created_at`, `updated_at`) VALUES
(101, 'minus', 'et', 'Adipisci dicta et magnam fugit adipisci nostrum fugit.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(102, 'suscipit', 'aut', 'Autem ullam repellendus commodi quia repellat sunt at.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(103, 'magni', 'voluptatum', 'Ut fuga a fugiat non adipisci quia quia.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(104, 'itaque', 'consectetur', 'Enim autem a qui ullam ipsum quis quam.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(105, 'voluptas', 'sint', 'Est aspernatur ad maiores rerum.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(106, 'incidunt', 'voluptatum', 'Itaque dolor voluptates eligendi rem eaque corrupti quas minima.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(107, 'omnis', 'dicta', 'Et ut totam et dolores nesciunt aut placeat aliquid.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(108, 'dolor', 'labore', 'Quibusdam autem ad qui aut.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(109, 'molestiae', 'blanditiis', 'Quasi ad natus quidem voluptatibus consequatur culpa qui sit.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(110, 'numquam', 'iste', 'Consequatur ex fugiat corporis officiis voluptatum occaecati et.', '2023-12-17 05:54:45', '2023-12-17 05:54:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `cedula` varchar(145) NOT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `cedula`, `nombres`, `apellidos`, `fechaNacimiento`, `genero`, `telefonoPersonal`, `telefonoTrabajo`, `correo`, `etnia`, `estadoCivil`, `tipoSangre`, `nacionalidad`, `provinciaNacimiento`, `ciudadNacimiento`, `cantonNacimiento`, `idDepartamento`, `idCargo`, `idEstado`, `created_at`, `updated_at`) VALUES
(91, '1234567', 'Zella', 'Koch', '2005-01-15', 'Masculino', '(337) 841-7374', '(223) 365-8813', 'amber51@example.com', 'Mestizo', 'Soltero', 'O-', 'Argentina', 'Georgia', 'Nitzschetown', 'land', 211, 101, 12, '2023-12-17 05:54:45', '2023-12-28 20:34:35'),
(92, '14957010', 'Angela', 'Satterfield', '2007-09-28', 'Femenino', '305.635.4521', '+1-903-844-1191', 'wilmer.funk@example.com', 'Indígena', 'Casado', 'A-', 'Kuwait', 'Tennessee', 'Velmaport', 'bury', 212, 101, 11, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(93, '32778640', 'Augusta', 'Torphy', '1981-11-20', 'Femenino', '(952) 307-6444', '+1-620-279-2499', 'rowe.alverta@example.net', 'Mestizo', 'Casado', 'A-', 'Greece', 'Tennessee', 'South Damionburgh', 'stad', 213, 107, 11, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(94, '4050707', 'Kiana', 'Kemmer', '1972-08-19', 'Masculino', '1-970-350-5484', '+1-917-648-9000', 'jerad62@example.net', 'Indígena', 'Casado', 'A+', 'Gibraltar', 'New York', 'Marvinton', 'town', 214, 106, 11, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(95, '57188152', 'Elisa', 'Cruickshank', '1978-10-20', 'Masculino', '+1.848.698.4807', '1-201-723-9673', 'kasandra48@example.net', 'Afroecuatoriano', 'Viudo', 'A+', 'Saint Pierre and Miquelon', 'Texas', 'Sanfordmouth', 'mouth', 215, 106, 11, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(96, '21690456', 'Alvina', 'Spencer', '2023-12-02', 'Masculino', '(678) 504-2077', '703.379.3956', 'isadore.cormier@example.com', 'Montubio', 'Casado', 'A+', 'Tuvalu', 'Massachusetts', 'Kubside', 'view', 216, 105, 11, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(97, '45542623', 'Lucio', 'Mosciski', '1977-09-06', 'Masculino', '(915) 317-0985', '325.206.1160', 'krista.kessler@example.com', 'Blanco', 'Soltero', 'AB+', 'Nigeria', 'Connecticut', 'Juliannemouth', 'burgh', 217, 104, 11, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(98, '36130575', 'Sydney', 'Jerde', '2019-10-24', 'Femenino', '754-521-3777', '+1-806-667-4830', 'khartmann@example.org', 'Indígena', 'Casado', 'O+', 'Ghana', 'Illinois', 'Lake Gretchen', 'shire', 218, 101, 11, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(99, '90261130', 'Chaya', 'Heathcote', '1998-05-13', 'Femenino', '601.647.9312', '657-698-1187', 'eugenia88@example.org', 'Indígena', 'Viudo', 'B-', 'Pakistan', 'Florida', 'Lake Delmer', 'side', 219, 109, 11, '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(100, '20238203', 'Valentine', 'Christiansen', '1986-02-22', 'Masculino', '724-614-1746', '+1 (475) 574-7150', 'miles70@example.org', 'Afroecuatoriano', 'Divorciado', 'O-', 'Seychelles', 'New Mexico', 'Ebertland', 'land', 220, 102, 11, '2023-12-17 05:54:45', '2023-12-17 05:54:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_capacitacion`
--

CREATE TABLE `empleado_has_capacitacion` (
  `idEmpleado` int(11) NOT NULL,
  `idCapacitacion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleado_has_capacitacion`
--

INSERT INTO `empleado_has_capacitacion` (`idEmpleado`, `idCapacitacion`, `created_at`, `updated_at`) VALUES
(91, 107, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(92, 106, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(92, 110, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(93, 104, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(96, 109, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(98, 108, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(99, 101, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(99, 105, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(100, 106, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(100, 109, '2023-12-17 05:54:46', '2023-12-17 05:54:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_discapacidad`
--

CREATE TABLE `empleado_has_discapacidad` (
  `idEmpleado` int(11) NOT NULL,
  `idDiscapacidad` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `nivel` varchar(100) NOT NULL,
  `adaptaciones` text NOT NULL,
  `notas` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleado_has_discapacidad`
--

INSERT INTO `empleado_has_discapacidad` (`idEmpleado`, `idDiscapacidad`, `porcentaje`, `nivel`, `adaptaciones`, `notas`, `created_at`, `updated_at`) VALUES
(94, 103, 38, 'Medio', 'Cupiditate consequatur quidem sed accusamus quo. Numquam adipisci ea dolorum. In debitis voluptatem tenetur eos eaque magnam consectetur. Voluptatibus tempora aliquid et ut qui earum.', 'Alias sapiente earum iure esse est voluptas totam. Qui possimus fugiat qui ea est magni et. Veritatis soluta quod nostrum sit rerum dolor.', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(96, 102, 50, 'Alto', 'Enim vel porro voluptas beatae non. Iusto architecto nihil et temporibus adipisci. Et earum quo in nemo ut quis enim.', 'Et quam consectetur eum quisquam. Quidem quia officiis est sit quos dolor. Reiciendis est dolorum ipsum. Ducimus ducimus alias expedita voluptatem sed est.', '2023-12-17 05:54:46', '2023-12-17 05:54:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_instruccionformal`
--

CREATE TABLE `empleado_has_instruccionformal` (
  `idEmpleado` int(11) NOT NULL,
  `idInstruccionFormal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `tipoEstado` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `tipoEstado`, `created_at`, `updated_at`) VALUES
(11, 'activo', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(12, 'inactivo', '2023-12-19 04:36:08', '2023-12-19 04:36:08'),
(13, 'pendiente', '2023-12-19 04:37:33', '2023-12-19 04:38:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoasistencia`
--

CREATE TABLE `estadoasistencia` (
  `estadoAsistencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadoasistencia`
--

INSERT INTO `estadoasistencia` (`estadoAsistencia`) VALUES
('atrasado'),
('presente');

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
  `archivo` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluaciondesempeno`
--

INSERT INTO `evaluaciondesempeno` (`idEvaluacionDesempeno`, `idEmpleado`, `idEvaluador`, `fechaEvaluacion`, `ObjetivosMetas`, `cumplimientoObjetivos`, `competencias`, `calificacionGeneral`, `comentarios`, `areasMejora`, `reconocimientosLogros`, `desarrolloProfesional`, `feedbackEmpleado`, `estadoEvaluacion`, `archivo`, `created_at`, `updated_at`) VALUES
(91, 97, 92, '2008-09-23', 'Ullam sit labore sint possimus voluptates. Molestiae quasi aut cupiditate culpa porro non. Hic eum est blanditiis.', 46.84, 'Voluptatem ex ut voluptatem cupiditate id. Ut modi at eligendi aperiam voluptatem mollitia molestiae et. Culpa aliquam culpa nam itaque aut voluptates. Est sequi odio voluptas voluptate odio rerum.', 23.58, 'Nesciunt laudantium pariatur est in repudiandae. Molestias libero corrupti est. Hic voluptas reiciendis odit.', 'Amet minima nobis omnis est sed non ab. Rerum et dicta voluptates aut omnis ut labore. Magni excepturi aut rerum iste.', 'Id quia commodi vel. Ut rerum enim porro. Et id sequi itaque corrupti ut repellat expedita. Omnis iure nesciunt ad quo est.', 'Possimus et cupiditate eius suscipit quo dolore. Et animi dolorum provident quo. Praesentium in minima qui impedit veritatis nulla. Quam aut quaerat magnam quis.', 'Et dicta est explicabo quia quia. Quisquam blanditiis occaecati atque voluptatem et. Qui quia tempora corporis error aspernatur facere corporis.', 'Aprobada', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(92, 94, 98, '2015-09-18', 'Facere quibusdam aut in quia. Illum nihil itaque cumque quia laudantium. Voluptates quia omnis saepe earum ut. Dolores est dignissimos doloribus facere dolores et.', 23.72, 'Sunt quasi accusamus voluptatem qui sunt repellat. Quidem magni nihil ut cum odio repellat. Sunt tempore aliquid voluptatem omnis.', 26.73, 'Voluptatum numquam nesciunt excepturi ut consequatur architecto. Et sit dolor cum ut error. Earum veritatis ipsa voluptatem suscipit. In quibusdam sint tempora non.', 'Officiis assumenda quaerat eum esse voluptas qui molestiae. Voluptatem nam placeat quas. Quia doloribus aut voluptas non. Quam nisi eaque dolor libero qui.', 'Aut voluptatum magni omnis molestias repudiandae. Sit qui ut optio qui laudantium quas. Accusamus velit aliquid dolores quod.', 'Quos sunt sequi error perspiciatis architecto. Quis provident rerum laborum tenetur necessitatibus omnis odio. Nemo et hic quae eaque sed.', 'Et ut molestiae eligendi laboriosam atque consequatur. Dolor vel et distinctio cupiditate et eius at. Harum quam est facere commodi laborum. Velit velit et laboriosam eum et quia.', 'Aprobada', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(93, 93, 96, '2017-12-26', 'Unde dolores accusantium odit soluta. Officia iusto adipisci corporis amet aut. Aut est qui quo doloribus nisi sed accusantium ut.', 89.34, 'Doloribus explicabo qui non sit consequatur architecto. Ducimus quia consequuntur quis aut commodi deleniti. Esse magni id ea quo explicabo.', 15.75, 'Accusantium et non et aut neque consequatur inventore. Eum laborum non quidem ipsum. Nostrum omnis fugiat atque consequatur fugiat ut officiis. Dignissimos sint rerum odit itaque voluptas.', 'Ut ea quasi vel totam quia quo et. Odit architecto corporis tempore eveniet corporis.', 'Cupiditate aut ex quam et cum sint. Autem et quaerat repudiandae modi repellat et. Est et voluptatem nostrum aut.', 'Dolorum necessitatibus deleniti tenetur provident occaecati. Deleniti similique voluptatem ut explicabo. Ea harum quis et rem qui. Ut error saepe similique exercitationem quidem.', 'Eius quidem corrupti et fuga optio repellat. Qui quam quidem maxime et asperiores qui doloribus illum.', 'Pendiente', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(94, 95, 99, '2013-12-04', 'Minus ullam ut consequatur eligendi et magni. Iste dolore sit laborum aut nisi culpa. Velit et ea culpa sed voluptas ea.', 72.42, 'Consequatur voluptas quia quas. Provident eligendi nihil ducimus repellat quam. Placeat sit itaque accusantium ut velit. Quos molestiae quibusdam quis ut non.', 22.43, 'Aut qui sit consequatur officia voluptatibus doloribus voluptas. Quas est omnis quia rerum quos. In nihil nam non facilis explicabo aut id dolor. Et suscipit nisi similique et et.', 'Magni voluptas provident illo hic. Cum sequi animi expedita vel alias in et. Voluptatem exercitationem illo amet deleniti eaque fugiat minus.', 'Dolore nobis sint doloremque ullam in velit non illo. Reprehenderit aut quo soluta ut molestiae dolorem ea. At assumenda beatae vel dolores et ut occaecati quis.', 'Facilis quas id minus et. Dolorem cum vitae repellendus voluptatibus rem et.', 'Fugit culpa laudantium consequuntur aut ut. Dolores eaque dolorem ut iste dolor error ut. Repudiandae maxime ipsam fuga autem rerum aperiam.', 'Aprobada', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(95, 95, 100, '1971-05-24', 'Debitis doloribus qui id quibusdam dolor. Ut et odit autem. Et quia ut aut magnam consequatur eius sit.', 34.33, 'Facere eligendi et cupiditate nemo animi. Quidem vel qui exercitationem necessitatibus consectetur dolore. Nihil veniam ut ut esse. Eaque modi in non sed.', 16.40, 'Modi eos at minus ratione iure ut. Quam voluptatibus explicabo est voluptatum earum excepturi. Excepturi expedita quia voluptatem minima.', 'Ut velit aspernatur laborum explicabo sapiente. Officiis impedit ut similique vel eos debitis voluptate. Ab est unde et molestiae.', 'Consequatur omnis quidem maxime dignissimos et. Rerum recusandae et facere illo in. Aliquam earum et veniam dolore aliquid harum. Qui at eos sunt sed itaque saepe velit.', 'Quos pariatur eos molestias ducimus culpa tenetur. Quo cum molestiae aut quia recusandae at omnis. Necessitatibus hic voluptatibus aliquid minima voluptatum. Aperiam totam amet minima sint.', 'Nihil hic quasi qui ex. Distinctio rerum cum sed. Aperiam sed illum distinctio nobis veniam. Deserunt fuga asperiores sit omnis provident quis. Sunt accusamus porro aut non consectetur.', 'Rechazada', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(96, 97, 93, '1981-07-18', 'Necessitatibus sint sit non autem consequatur. Aut voluptas inventore nesciunt rerum facere. Eius aut rem omnis autem minus ducimus. Ullam accusantium fuga ut.', 89.82, 'Debitis et doloribus sit. Provident veniam eum quae placeat explicabo. Fugiat veritatis dolores porro sunt dicta. Error aut impedit quia minus est eaque. Aut et omnis quis consequuntur.', 12.88, 'Repellendus voluptas maxime distinctio officiis. Vel optio libero aut ipsum corporis cum. Et nam saepe quas. Qui et itaque ut omnis et. Et qui distinctio distinctio. Dignissimos eum vero laborum aut.', 'Eos perspiciatis animi qui nobis ut. Odio saepe ipsum tempore enim ullam neque dignissimos. Totam qui necessitatibus dolores consequatur culpa deserunt ut velit.', 'Officiis vero minus ut sit aperiam eius. Alias voluptas totam quaerat facere quaerat. Expedita consequatur explicabo et molestiae vitae. Aut voluptatem dicta dicta enim dolores illum.', 'Distinctio aperiam placeat nihil rerum sapiente illum blanditiis. Saepe dignissimos sint et totam quia. Dolores quisquam suscipit omnis nihil fugiat.', 'Esse hic ut ipsum architecto ducimus hic. Dolorum dolor aspernatur voluptate corporis voluptates aliquid sed. Hic vitae accusamus aliquid deserunt sint facere exercitationem consequatur.', 'Pendiente', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(97, 99, 96, '2004-06-07', 'Aut nesciunt voluptatem eligendi tenetur. Autem cumque molestias reprehenderit repellendus quis modi sunt. Natus accusamus odit sit. Accusamus magnam placeat ut illum veritatis.', 65.20, 'Veniam quia qui unde autem sunt eos est sunt. Sed quis consequatur est ipsum pariatur eum saepe est. Pariatur qui ab omnis modi autem quas id. Vel quia eligendi blanditiis qui impedit.', 72.67, 'Rerum et laudantium et et facere mollitia. Corporis recusandae eos consequatur pariatur vel.', 'Doloribus ea repudiandae ut id hic corrupti. Delectus dolores qui explicabo doloribus est quo et. Aut veritatis id tenetur iusto atque.', 'Maiores eum sunt quod maiores voluptates facere rerum quo. Sunt rerum quo est velit. Eligendi dolore eos enim laudantium et. Culpa aut earum voluptatem nulla soluta eos.', 'Ut dolorum ad sequi ut ut. Qui doloremque doloremque eveniet ex omnis ut dolor. Ut eum at qui sint dolor.', 'Est unde rerum et eligendi. Fugit ut blanditiis at nam quis. Blanditiis dolorum laboriosam sed perferendis nesciunt.', 'Aprobada', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(98, 95, 98, '2005-09-12', 'Qui fuga est ab est. In impedit tempore ducimus. Est sequi sed explicabo quas ut architecto libero consequatur.', 12.86, 'Sit velit vel voluptatibus voluptatem repudiandae nihil. Ullam quia qui optio sequi a quia. Deserunt odio beatae quia.', 23.34, 'Tempore facilis est ea placeat. Sint est quo rerum repellat. Sed commodi optio dolores reprehenderit ullam aliquam et. Inventore et similique nobis ut.', 'Voluptas eius ut voluptatem voluptas dolore alias non. Dolor ut accusantium molestiae sapiente deserunt voluptatibus. Adipisci voluptas tenetur accusamus voluptas vitae omnis est.', 'Et omnis quia expedita dolores voluptatum soluta. Laborum vitae consequatur tempora magni. Natus praesentium qui consequatur non hic explicabo. Quaerat deserunt ut modi accusamus magnam sed fugit.', 'Possimus veritatis consequatur ipsa qui quis quas nesciunt. Voluptates quia temporibus magnam reprehenderit. Atque sequi qui facilis pariatur suscipit architecto.', 'Eos vitae id doloribus molestias maiores nisi repellendus. Necessitatibus alias ab eum cum. Recusandae et est eveniet. Fugiat dolor praesentium et ullam.', 'Pendiente', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(99, 93, 100, '1991-05-12', 'Molestiae voluptatibus quis praesentium eius doloribus ipsum. Ex minima nisi voluptatem et ex labore. Facilis nam rerum ducimus voluptatem qui.', 13.20, 'Doloribus corrupti enim id necessitatibus. Accusantium dolores eos vel omnis est quisquam quidem. Labore dolores alias et consectetur perspiciatis hic neque. Ea quas quibusdam ea necessitatibus.', 63.83, 'Quibusdam debitis voluptatem ipsum fuga corporis dolores explicabo. Ut architecto unde laborum aspernatur. Est quia qui itaque vel. Debitis amet veritatis ipsa unde necessitatibus quia sed.', 'Non ducimus provident ut excepturi praesentium nesciunt provident. Ut quibusdam in nesciunt commodi reiciendis in sapiente. Enim pariatur eos officia id quia.', 'Culpa perferendis accusantium placeat repellendus dolorum dolorem. Sit vitae qui est asperiores sit quos facilis sequi. Ut maiores nihil delectus similique.', 'Et minus et totam. Voluptas ut voluptatem quae.', 'Occaecati labore et fugiat aut velit in. Minus deserunt delectus et dolorem. Maiores vitae vel consequatur nobis consequatur laboriosam autem.', 'Rechazada', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(100, 93, 99, '2009-06-10', 'Nam quam qui architecto. Quia voluptates perspiciatis sunt. Saepe rerum quis voluptas et ipsam.', 52.62, 'Odio qui et culpa possimus quam aut. Architecto eius cumque vero error.', 54.21, 'Illo neque ducimus provident natus. Sequi eum ipsa vitae nihil enim quis. Ut amet fugit a officia qui aut temporibus laudantium. Recusandae magnam corporis saepe quod labore pariatur molestias.', 'Sapiente temporibus explicabo numquam inventore. Incidunt aut non amet. Assumenda nostrum ea doloremque sequi in maxime alias. Corrupti maiores molestiae soluta corrupti velit beatae.', 'Aut quos nobis vel consectetur. Minus ea impedit provident commodi molestias. Aut eos quo at non reiciendis qui. Ipsa rem ipsa debitis in corrupti deleniti.', 'Culpa veniam sunt fuga non iste adipisci. Optio consequatur consequatur quia modi itaque ad ad sunt. Aperiam ad culpa dolor eveniet.', 'Harum quas officia provident est sapiente non eos. Dolor modi molestias minima sit animi quia. Laborum maxime adipisci repellat et qui maxime eligendi. Ad eum magnam velit nihil minus aliquam ut.', 'Pendiente', NULL, '2023-12-17 05:54:46', '2023-12-17 05:54:46');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `experiencialaboral`
--

INSERT INTO `experiencialaboral` (`idExperienciaLaboral`, `institucion`, `telefonoInstitucion`, `areaTrabajo`, `puesto`, `fechaDesde`, `fechaHasta`, `actividades`, `archivo`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(81, 'Shanahan, Kuhn and Thossssmpson', '(908) 331-5317', 'dignissimos', 'Electrical Parts Reconditioner', '1992-09-29', '2000-05-23', 'Voluptatem atque ullam est et cum dolor. Dolor voluptatibus laudantium ea laudantium praesentium impedit asperiores.', 'quo', 99, '2023-12-17 05:54:46', '2023-12-17 07:52:29'),
(82, 'Shanahan Group', '+1 (508) 268-8620', 'quisquam', 'Transportation Worker', '2011-12-14', '2019-02-04', 'Deleniti voluptatem consequatur qui itaque atque. Facere ut mollitia et dolore amet exercitationem sequi. Temporibus velit at itaque ullam. Dolorem numquam consectetur vel fugiat ut.', 'voluptates', 92, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(83, 'Fadel-Herman', '+1.231.495.2928', 'rerum', 'Fire Inspector', '2012-09-19', '1997-09-17', 'Aspernatur et debitis consectetur voluptates fuga. Aut libero rerum est architecto maiores. Non est fugit a nemo amet. Quos provident nam natus.', 'soluta', 100, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(84, 'Grady, Monahan and Champlin', '+1-360-556-0406', 'aut', 'Computer Repairer', '1996-06-07', '2005-01-11', 'Accusantium et repellat nihil. Unde dolores nulla rerum sed vel. Rem aliquam omnis sit dolores. Asperiores natus et tempore ipsam.', 'molestiae', 93, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(85, 'Dibbert-Torp', '+16178535633', 'eius', 'Mechanical Drafter', '1980-04-18', '1999-11-26', 'Sunt ipsa sint unde aut repellat aliquam aliquid. Cupiditate necessitatibus culpa quo doloribus aut sed quo. Commodi ullam enim hic. Voluptatem laborum voluptas iure beatae ea reprehenderit.', 'assumenda', 91, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(86, 'Ferry Group', '+1-941-227-1040', 'aut', 'Corporate Trainer', '1986-02-19', '1977-10-07', 'Tempora et ullam incidunt velit ratione quis aut hic. A ullam ut consequatur aut totam aut. Aspernatur et quas corporis odit soluta. Voluptatibus molestiae et non non sit.', 'qui', 92, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(87, 'Toy, Keebler and Bode', '+1 (951) 769-5423', 'sint', 'Forest and Conservation Technician', '1990-12-20', '1985-05-06', 'Eaque quia et ducimus consectetur accusamus harum. Et voluptatem debitis harum quo molestias.', 'sint', 92, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(88, 'Spinka, McLaughlin and Dach', '+1.847.868.0521', 'accusamus', 'Watch Repairer', '1973-04-27', '2000-06-21', 'Ullam quidem repellendus quos sunt. Expedita qui libero fuga praesentium natus deserunt voluptatibus. Tempora labore autem beatae nihil sint consequatur.', 'eos', 96, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(89, 'Robel-Rohan', '856-398-0897', 'magnam', 'Excavating Machine Operator', '1990-11-01', '2013-05-27', 'Itaque nihil assumenda accusantium aut quia. Corrupti ut debitis officia ea quam laborum dolorum. Deserunt sit optio cumque qui.', 'omnis', 92, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(90, 'Kozey-Schaden', '702-788-3922', 'illo', 'Armored Assault Vehicle Officer', '2022-06-09', '2016-12-19', 'Qui minus corrupti laudantium est aut. Atque placeat nihil dolor debitis molestias unde ex. Exercitationem et eius dolorem est officia quia qui qui.', 'tempore', 97, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(91, 'Shanahan, Kuhn and Thompson', '(908) 331-5317', 'dignissimos', 'Electrical Parts Reconditioner', '1992-09-29', '2000-05-23', 'Voluptatem atque ullam est et cum dolor. Dolor voluptatibus laudantium ea laudantium praesentium impedit asperiores.', NULL, 99, '2023-12-17 07:50:11', '2023-12-17 07:50:11');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `instruccionformal`
--

INSERT INTO `instruccionformal` (`idInstruccionFormal`, `titulo`, `fechaRegistro`, `nivelAcademico`, `archivo`, `created_at`, `updated_at`) VALUES
(101, 'Debitis aut maxime quam officia sunt recusandae est.', '2016-11-25', 'Doctorado', 'aut', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(102, 'Earum delectus vel maiores veniam adipisci et.', '2013-04-04', 'Bachillerato', 'repudiandae', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(103, 'Occaecati deleniti quis esse aut maiores.', '2003-05-28', 'Maestría', 'quo', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(104, 'Vitae omnis voluptatibus explicabo ea aut.', '2001-11-20', 'Bachillerato', 'eveniet', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(105, 'Illo molestias aliquid consequuntur.', '1970-05-29', 'Licenciatura', 'perferendis', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(106, 'Dignissimos quo placeat quod officiis.', '2001-08-21', 'Maestría', 'voluptas', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(107, 'Soluta occaecati at dolorem mollitia.', '1992-04-18', 'Licenciatura', 'voluptas', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(108, 'Impedit rerum quibusdam veritatis sit.', '2002-11-20', 'Doctorado', 'sunt', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(109, 'Voluptates velit explicabo consequuntur dignissimos quia.', '2012-02-25', 'Maestría', 'magni', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(110, 'Rerum sit ab iste alias temporibus quo.', '1997-10-18', 'Licenciatura', 'libero', '2023-12-17 05:54:45', '2023-12-17 05:54:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_12_16_200306_create_capacitacion_table', 1),
(3, '2023_12_16_200306_create_cargo_table', 1),
(4, '2023_12_16_200306_create_contrato_table', 1),
(5, '2023_12_16_200306_create_controldiario_table', 1),
(6, '2023_12_16_200306_create_datobancario_table', 1),
(7, '2023_12_16_200306_create_departamento_table', 1),
(8, '2023_12_16_200306_create_discapacidad_table', 1),
(9, '2023_12_16_200306_create_empleado_has_capacitacion_table', 1),
(10, '2023_12_16_200306_create_empleado_has_discapacidad_table', 1),
(11, '2023_12_16_200306_create_empleado_has_instruccionformal_table', 1),
(12, '2023_12_16_200306_create_empleado_table', 1),
(13, '2023_12_16_200306_create_estado_table', 1),
(14, '2023_12_16_200306_create_evaluaciondesempeno_table', 1),
(15, '2023_12_16_200306_create_experiencialaboral_table', 1),
(16, '2023_12_16_200306_create_instruccionformal_table', 1),
(17, '2023_12_16_200306_create_model_has_permissions_table', 1),
(18, '2023_12_16_200306_create_model_has_roles_table', 1),
(19, '2023_12_16_200306_create_permiso_table', 1),
(20, '2023_12_16_200306_create_permissions_table', 1),
(21, '2023_12_16_200306_create_referencialaboral_table', 1),
(22, '2023_12_16_200306_create_residencia_table', 1),
(23, '2023_12_16_200306_create_rol_table', 1),
(24, '2023_12_16_200306_create_role_has_permissions_table', 1),
(25, '2023_12_16_200306_create_roles_table', 1),
(26, '2023_12_16_200306_create_salidacampo_table', 1),
(27, '2023_12_16_200306_create_tipocontrato_table', 1),
(28, '2023_12_16_200306_create_tipopermiso_table', 1),
(29, '2023_12_16_200306_create_tiposalida_table', 1),
(30, '2023_12_16_200306_create_unidad_table', 1),
(31, '2023_12_16_200306_create_usuario_table', 1),
(32, '2023_12_16_200309_add_foreign_keys_to_contrato_table', 1),
(33, '2023_12_16_200309_add_foreign_keys_to_controldiario_table', 1),
(34, '2023_12_16_200309_add_foreign_keys_to_datobancario_table', 1),
(35, '2023_12_16_200309_add_foreign_keys_to_departamento_table', 1),
(36, '2023_12_16_200309_add_foreign_keys_to_empleado_has_capacitacion_table', 1),
(37, '2023_12_16_200309_add_foreign_keys_to_empleado_has_discapacidad_table', 1),
(38, '2023_12_16_200309_add_foreign_keys_to_empleado_has_instruccionformal_table', 1),
(39, '2023_12_16_200309_add_foreign_keys_to_empleado_table', 1),
(40, '2023_12_16_200309_add_foreign_keys_to_evaluaciondesempeno_table', 1),
(41, '2023_12_16_200309_add_foreign_keys_to_experiencialaboral_table', 1),
(42, '2023_12_16_200309_add_foreign_keys_to_model_has_permissions_table', 1),
(43, '2023_12_16_200309_add_foreign_keys_to_model_has_roles_table', 1),
(44, '2023_12_16_200309_add_foreign_keys_to_permiso_table', 1),
(45, '2023_12_16_200309_add_foreign_keys_to_referencialaboral_table', 1),
(46, '2023_12_16_200309_add_foreign_keys_to_residencia_table', 1),
(47, '2023_12_16_200309_add_foreign_keys_to_role_has_permissions_table', 1),
(48, '2023_12_16_200309_add_foreign_keys_to_salidacampo_table', 1),
(49, '2023_12_16_200309_add_foreign_keys_to_usuario_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 101),
(2, 'App\\Models\\User', 102),
(2, 'App\\Models\\User', 104),
(2, 'App\\Models\\User', 105),
(2, 'App\\Models\\User', 106),
(2, 'App\\Models\\User', 107),
(2, 'App\\Models\\User', 108),
(2, 'App\\Models\\User', 109),
(3, 'App\\Models\\User', 113);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idPermiso`, `fechaSolicitud`, `fechaInicio`, `fechaFinaliza`, `tiempoPermiso`, `aprobacionJefeInmediato`, `aprobacionTalentoHumano`, `idTipoPermiso`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(81, '1999-11-22', '2018-01-12', '2007-04-29', 8, '0', '1', 109, 97, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(82, '2017-09-22', '2020-03-12', '2001-01-15', 9, '1', '0', 102, 96, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(83, '2004-08-30', '2022-07-25', '2016-10-30', 0, '1', '0', 105, 98, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(84, '1976-05-14', '1990-07-31', '2018-09-19', 1, '0', '0', 104, 99, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(85, '1981-01-26', '1984-06-15', '1980-12-28', 5, '1', '1', 108, 95, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(86, '1972-02-03', '2014-05-10', '2004-02-29', 1, '0', '1', 104, 98, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(87, '1985-01-31', '2000-07-19', '2000-12-03', 7, '1', '0', 110, 91, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(88, '1996-02-03', '2004-08-11', '2005-06-03', 9, '0', '1', 110, 96, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(89, '1993-04-04', '1980-12-19', '1979-05-25', 0, '1', '1', 101, 98, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(90, '1984-09-19', '2021-04-02', '1973-02-07', 9, '0', '1', 101, 92, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(91, '2017-09-22', '2020-03-12', '2001-01-15', 9, '1', '0', 102, 96, '2023-12-19 04:43:42', '2023-12-19 04:43:42'),
(92, '2017-09-22', '2020-03-12', '2001-01-15', 9, '1', '0', 102, 96, '2023-12-19 04:44:25', '2023-12-19 04:44:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 101, 'auth_token', '8cd7dea4d447e901551d10fbf78b781a3b872cee8d9b34473b07a0f728eb986f', '[\"*\"]', NULL, NULL, '2023-12-17 06:00:22', '2023-12-17 06:00:22'),
(2, 'App\\Models\\User', 102, 'auth_token', '005a194d1170201b931eee48000ba7583cd81795c4ff04259e859858ff366cd3', '[\"*\"]', '2023-12-18 21:53:33', NULL, '2023-12-17 06:08:59', '2023-12-18 21:53:33'),
(3, 'App\\Models\\User', 104, 'auth_token', '057da12f4d59665596141cbf4d19281ecb2131fd96e35b23edf307ac77661175', '[\"*\"]', NULL, NULL, '2023-12-18 21:35:01', '2023-12-18 21:35:01'),
(4, 'App\\Models\\User', 105, 'auth_token', '14605e0d6c8f424bde237a83855462a2355263ed93da27e981aefe670e3508d9', '[\"*\"]', NULL, NULL, '2023-12-18 21:36:28', '2023-12-18 21:36:28'),
(5, 'App\\Models\\User', 106, 'auth_token', 'd9fca3148401e895a35847cb0c824a81f13a62f9f27a3c9f65647ce68dbf854a', '[\"*\"]', NULL, NULL, '2023-12-18 21:46:14', '2023-12-18 21:46:14'),
(6, 'App\\Models\\User', 107, 'auth_token', '2e79206f7a588bfb43ef435df4e70741c8b3789f71b00f809d6269cc91233b54', '[\"*\"]', '2023-12-29 03:37:02', NULL, '2023-12-18 21:55:39', '2023-12-29 03:37:02'),
(18, 'App\\Models\\User', 108, 'auth_token', 'd7a1cf957c843e1629bbe060cde12d61776f02115a5609e9cbc63dba8748a542', '[\"*\"]', NULL, NULL, '2023-12-18 22:24:09', '2023-12-18 22:24:09'),
(19, 'App\\Models\\User', 109, 'auth_token', '33935b8bad9f4d02dbb24515fde568f98a6d5e5827a266c1214e7a8f9af5fa7c', '[\"*\"]', NULL, NULL, '2023-12-19 05:33:07', '2023-12-19 05:33:07'),
(20, 'App\\Models\\User', 112, 'auth_token', '6b79d043e7f030229f915ef27cad24391b0335987b6eb1ff087f537a9f0ca73f', '[\"*\"]', NULL, NULL, '2023-12-19 05:48:19', '2023-12-19 05:48:19'),
(23, 'App\\Models\\User', 113, 'auth_token', '2b1616eb1536980560f198f588926627e3b29b1c2033ecf874615934788a4562', '[\"*\"]', NULL, NULL, '2023-12-31 07:31:41', '2023-12-31 07:31:41');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `referencialaboral`
--

INSERT INTO `referencialaboral` (`idReferenciaLaboral`, `nombre`, `apellido`, `cedula`, `telefono`, `email`, `idExperienciaLaboral`, `created_at`, `updated_at`) VALUES
(82, 'Dariana', 'Adams', '5928580092', '+1-606-481-4670', 'tre49@example.com', 82, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(83, 'Tanner', 'Kreiger', '7496582009', '(862) 739-9700', 'daren.pagac@example.com', 84, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(84, 'Aniya', 'Ratke', '2124028740', '+1-405-853-8540', 'lullrich@example.com', 87, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(85, 'Murphy', 'Yost', '9149856792', '(479) 869-8769', 'liam.kozey@example.com', 82, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(86, 'Margarete', 'Barrows', '2744367600', '+13528389659', 'nbauch@example.org', 82, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(87, 'Filiberto', 'Zieme', '4239516841', '+1.417.696.0060', 'wisoky.ahmad@example.com', 83, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(88, 'Lavern', 'Stark', '4382079996', '+1.248.321.9187', 'ischneider@example.com', 83, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(89, 'Myra', 'Schmidt', '3571109913', '+17137994447', 'avery49@example.com', 83, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(90, 'Stephen', 'Wolff', '4486401478', '+15087139459', 'danny.weissnat@example.com', 84, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(91, 'Murphy', 'Yost', '9149856792', '(479) 869-8769', 'liam.kozey@example.com', 82, '2023-12-19 04:52:45', '2023-12-19 04:52:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroasistencia`
--

CREATE TABLE `registroasistencia` (
  `idRegistroAsistencia` int(11) NOT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estadoAsistencia` varchar(100) DEFAULT NULL,
  `tipoAsistencia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registroasistencia`
--

INSERT INTO `registroasistencia` (`idRegistroAsistencia`, `idEmpleado`, `fecha`, `hora`, `descripcion`, `estadoAsistencia`, `tipoAsistencia`) VALUES
(7, 100, '2023-12-07', '21:39:02', NULL, 'atrasado', 'entrada'),
(8, 100, '2023-12-07', '21:39:02', NULL, 'atrasado', 'salida'),
(9, 100, '2023-12-09', '21:39:02', NULL, 'atrasado', 'entrada');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `residencia`
--

INSERT INTO `residencia` (`idResidencia`, `pais`, `provincia`, `canton`, `parroquia`, `sector`, `calles`, `referencia`, `telefonoDomicilio`, `idEmpleado`, `created_at`, `updated_at`) VALUES
(81, 'Monaco', 'Idaho', 'North Marionberg', 'rerum', 'quasi', '436 Aiyana Walks', 'Earum in fuga quia quae eos.', '+15056671627', 96, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(82, 'Antarctica (the territory South of 60 deg S)', 'Tennessee', 'Lukasview', 'dolorum', 'est', '181 Cameron Keys', 'Aspernatur voluptatem aut delectus nihil animi aut ad atque.', '972-472-9670', 98, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(83, 'Malta', 'West Virginia', 'North Lenny', 'sint', 'placeat', '80377 Candace Cove', 'Autem aperiam est numquam illum sint.', '380.728.6384', 97, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(84, 'Algeria', 'Rhode Island', 'Brockshire', 'rem', 'nobis', '42327 Hilpert Street Suite 875', 'Officia ipsa omnis odio eos maxime ad dolor.', '479.551.2069', 100, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(85, 'Vanuatu', 'Florida', 'West Cheyenne', 'similique', 'fuga', '14431 Paucek Camp Suite 165', 'Ut possimus minus quisquam.', '+16785133402', 99, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(86, 'Cote d\'Ivoire', 'Wisconsin', 'Port Randyport', 'et', 'et', '435 Hillard Skyway Suite 497', 'Molestiae quibusdam illum dolorum ut ducimus.', '248-709-3359', 97, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(87, 'Paraguay', 'Florida', 'Rileyfurt', 'veniam', 'in', '2938 Madisyn Drives Apt. 634', 'Ullam nam sint explicabo laboriosam expedita officiis.', '754-548-5657', 91, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(88, 'Nauru', 'Kansas', 'Eugeniaberg', 'iste', 'distinctio', '83851 Melany Stream', 'Et quis numquam ipsum.', '1-757-707-7916', 100, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(89, 'Yemen', 'Hawaii', 'West Dahlia', 'nostrum', 'nemo', '21836 Bridie Shoals', 'Aut reprehenderit quia illum aspernatur magni.', '(283) 775-6395', 99, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(90, 'United States Virgin Islands', 'West Virginia', 'Lake Tevinside', 'dolore', 'dolore', '46521 Weber Ways', 'Placeat quo minima debitis id dolorum neque eius quis.', '1-667-210-9177', 99, '2023-12-17 05:54:46', '2023-12-17 05:54:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restablecercontraseña`
--

CREATE TABLE `restablecercontraseña` (
  `correo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `restablecercontraseña`
--

INSERT INTO `restablecercontraseña` (`correo`, `token`, `created_at`) VALUES
('angelgualle1@gmail.com', 'KkytGhTxgBZKXBaMfAGHkgqiHDXrhffqIO6Wsz1n', '2023-12-31 11:30:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2023-12-17 05:48:26', '2023-12-17 05:48:26'),
(2, 'Empleado', 'web', '2023-12-17 05:48:26', '2023-12-17 05:48:26'),
(3, 'Super Administrador', 'web', '2023-12-17 05:48:26', '2023-12-17 05:48:26');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salidacampo`
--

INSERT INTO `salidacampo` (`idSalidaCampo`, `fecha`, `horaSalida`, `horaLlegada`, `aprobacionJefeInmediato`, `aprobacionTalentoHumano`, `idEmpleado`, `idTipoSalida`, `created_at`, `updated_at`) VALUES
(81, '1995-04-08', '12:55:15', '06:51:32', '0', '1', 97, 106, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(82, '2005-12-25', '09:45:26', '20:47:37', '0', '0', 100, 104, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(83, '1988-02-01', '09:52:07', '04:30:23', '0', '0', 91, 110, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(84, '2001-08-05', '10:59:38', '20:44:12', '0', '1', 100, 108, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(85, '1972-06-19', '12:41:45', '13:09:54', '0', '0', 93, 105, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(86, '2000-08-12', '19:49:25', '19:26:28', '0', '0', 94, 108, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(87, '1988-03-01', '03:39:59', '14:28:09', '1', '0', 100, 105, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(88, '2012-09-27', '05:41:42', '01:49:43', '1', '0', 97, 109, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(89, '1994-07-20', '11:44:57', '09:50:55', '0', '1', 96, 107, '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(90, '1991-11-30', '12:28:08', '22:57:07', '1', '0', 98, 110, '2023-12-17 05:54:46', '2023-12-17 05:54:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoasistencia`
--

CREATE TABLE `tipoasistencia` (
  `tipoAsistencia` varchar(100) NOT NULL,
  `desde` time NOT NULL,
  `hasta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoasistencia`
--

INSERT INTO `tipoasistencia` (`tipoAsistencia`, `desde`, `hasta`) VALUES
('entrada', '07:00:00', '09:00:00'),
('salida', '14:00:00', '20:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipocontrato`
--

INSERT INTO `tipocontrato` (`idTipoContrato`, `nombre`, `descripcion`, `clausulas`, `created_at`, `updated_at`) VALUES
(101, 'neque', 'Et quod quia et sed sint consequatur molestiae.', 'Expedita tempora adipisci doloremque voluptates. Nulla aliquid repellat optio sit ea et.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(102, 'voluptatum', 'Excepturi aliquid aut sint est.', 'Eos voluptas laboriosam ab consequatur asperiores adipisci numquam. Nisi odit ea dolorem exercitationem nisi sit. Enim praesentium est odio vel.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(103, 'et', 'Quia dolores cum magnam rerum.', 'Ea perferendis quo maxime voluptatem sunt magnam. Aut quam velit officia voluptatem quas. Occaecati et dicta rerum nesciunt quas quibusdam quia. Quo iure deleniti et ut consectetur nihil.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(104, 'doloremque', 'Odio optio ipsum adipisci nobis id velit quisquam.', 'Adipisci aut deserunt nisi quas vitae sunt aperiam asperiores. Fuga ex assumenda sed quae quos quidem.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(105, 'quia', 'Neque possimus nisi repellat est id earum.', 'Ut aspernatur doloremque qui nesciunt facilis. Sit quia error necessitatibus sed beatae. Voluptas porro voluptatem distinctio quos asperiores laboriosam doloremque.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(106, 'quo', 'A dignissimos dolores architecto.', 'Est placeat incidunt velit corporis ea veniam. Est dolor aut non corrupti saepe. Quia placeat dolores odio.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(107, 'architecto', 'Ad autem placeat repellendus inventore rerum.', 'Magnam qui officiis non eaque voluptatem. Impedit molestiae commodi ut quia et omnis. Aut ad adipisci officia provident id facere ducimus. Similique porro consequatur quia rem.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(108, 'voluptatibus', 'Autem laboriosam enim debitis dolorem aliquid.', 'Velit maiores qui illum dignissimos. Eveniet quae quis at quos optio. Qui est veniam voluptas ea.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(109, 'et', 'Corporis deleniti est aut sint velit nam.', 'Harum totam laudantium quas nulla mollitia reprehenderit rerum. Iure sed eaque distinctio officia molestiae velit voluptas. Qui possimus in nihil sunt nisi quia laborum. Dolor assumenda eaque laudantium.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(110, 'eveniet', 'Et qui aspernatur ut mollitia.', 'Aliquam amet vel nihil amet a itaque. Non sint aut voluptatum consequuntur ullam quibusdam. Repellendus odio est eveniet repellendus et nam voluptatem maiores.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(111, 'permiso paternidad', 'sada', NULL, '2023-12-19 06:42:52', '2023-12-19 06:42:52'),
(112, 'permiso paternidad', 'sada', NULL, '2023-12-19 06:43:04', '2023-12-19 06:43:04'),
(113, 'permiso paternidsad', 'sada', NULL, '2023-12-19 07:34:56', '2023-12-19 07:34:56');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipopermiso`
--

INSERT INTO `tipopermiso` (`idTipoPermiso`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(101, 'qui', 'Itaque pariatur corporis qui tempore quam voluptas repellat.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(102, 'in', 'Quia illum optio eos nesciunt et et voluptatem.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(103, 'architecto', 'Tempore vel ad culpa voluptas nostrum est.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(104, 'id', 'Deleniti enim id sapiente itaque esse quis mollitia.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(105, 'commodi', 'Recusandae quam sunt sit incidunt at.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(106, 'rerum', 'Neque et officia dolor error odio distinctio earum.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(107, 'ut', 'Quia quo non sequi at.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(108, 'eum', 'Sed consequuntur necessitatibus dolor neque minima qui pariatur corrupti.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(109, 'qui', 'Doloremque aperiam laudantium voluptatem.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(110, 'quis', 'Itaque pariatur corporis qui tempore quam voluptas repellat.', '2023-12-17 05:54:45', '2023-12-19 07:43:07'),
(111, 'permiso paternidsad', 'sada', '2023-12-19 07:41:53', '2023-12-19 07:41:53');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tiposalida`
--

INSERT INTO `tiposalida` (`idTipoSalida`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(101, 'quisd', 'Itaque pariatur corporis qui tempore quam voluptas repellat.', '2023-12-17 05:54:45', '2023-12-19 07:46:20'),
(102, 'sit', 'Eum sint quia et pariatur recusandae.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(103, 'et', 'Debitis labore molestiae et repudiandae porro voluptate totam delectus.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(104, 'cumque', 'Veniam iste totam rerum optio et.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(105, 'eligendi', 'Tempore et nihil provident ipsum eum et optio.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(106, 'eius', 'Neque et quam dolorem qui iusto unde maiores.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(107, 'amet', 'Blanditiis repellat inventore modi magni quia.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(108, 'quam', 'Voluptatem itaque ea voluptas quia voluptatem.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(109, 'fuga', 'Voluptate maxime iusto tempora.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(110, 'libero', 'Harum dignissimos quaerat voluptatum.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(111, 'quis', 'Itaque pariatur corporis qui tempore quam voluptas repellat.', '2023-12-19 07:46:05', '2023-12-19 07:46:05');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idUnidad`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(101, 'ut', 'Et laboriosam error itaque deleniti.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(102, 'ducimus', 'Voluptatum error perspiciatis facere adipisci.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(103, 'voluptatibus', 'Nihil porro quibusdam quibusdam sint iste.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(104, 'quia', 'Reprehenderit excepturi ratione adipisci accusantium non accusamus sit dignissimos.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(105, 'necessitatibus', 'Modi harum praesentium modi rerum.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(106, 'omnis', 'Cumque eligendi accusamus molestiae accusamus ex qui.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(107, 'perspiciatis', 'Ut occaecati facilis sunt doloribus sed ea fugiat.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(108, 'adipisci', 'Aut qui est sequi dignissimos.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(109, 'cum', 'Assumenda corrupti et ullam sed nostrum voluptatibus asperiores.', '2023-12-17 05:54:45', '2023-12-17 05:54:45'),
(110, 'quiswd', 'Itaque pariatur corporis qui tempore quam voluptas repellat.', '2023-12-17 05:54:45', '2023-12-19 07:50:45'),
(111, 'quisd', 'Itaque pariatur corporis qui tempore quam voluptas repellat.', '2023-12-19 07:49:50', '2023-12-19 07:49:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `correo` varchar(100) NOT NULL DEFAULT '0',
  `password` varchar(145) DEFAULT NULL,
  `idTipoEstado` int(11) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL,
  `intentos_fallidos` int(11) DEFAULT 0,
  `bloqueado_hasta` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `correo`, `password`, `idTipoEstado`, `idEmpleado`, `intentos_fallidos`, `bloqueado_hasta`, `created_at`, `updated_at`) VALUES
(91, 'elsa34', '0', 'LFnuxmkjot', NULL, 98, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(92, 'cydney.veum', '0', 'TIZEbrMugZ', NULL, 95, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(93, 'alison32', '0', 'OL1ob9ehRI', NULL, 100, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(94, 'moses10', '0', '3QxfcBxoiX', NULL, 100, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(95, 'egerhold', '0', 'mGIdafgDXX', NULL, 98, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(96, 'tina.wuckert', '0', 'LGr0DqORvB', NULL, 97, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(97, 'vbrakus', '0', '0XMCdd5Fln', NULL, 96, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(98, 'hellen.price', '0', 'F7gxmC7Xs4', NULL, 100, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(99, 'gianni.mante', '0', 'mLGn6hbDBQ', NULL, 96, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(100, 'joanie.kub', '0', 'J2ydRKsuNH', NULL, 100, 0, '2023-12-31 01:36:44', '2023-12-17 05:54:46', '2023-12-17 05:54:46'),
(101, 'AngelMe', '0', '$2y$10$5zQpFywUq6esLQzE3MNEMuMj5Xa3k/vmxPXW75NYnzx4ozwId6i6O', NULL, 91, 0, '2023-12-31 01:36:44', '2023-12-17 06:00:22', '2023-12-17 06:00:22'),
(102, 'AngelMe2', '0', '$2y$10$7N2Ga5nHFrtNCIXi9lnQRezppBhl5IdIfA1GxSYw3IFb0tszBT7iy', NULL, 92, 0, NULL, '2023-12-17 06:08:59', '2023-12-31 02:19:54'),
(103, 'angelasatterfield', '0', 'asasd', NULL, 92, 0, NULL, '2023-12-18 21:28:01', '2023-12-31 02:19:51'),
(104, 'angelasatterfield', '0', '$2y$10$e7ylroivgYKcdFEu/QwuGevK9XFZ/jCAGXcER4jE5YAxnWjyf3n7S', NULL, 92, 0, NULL, '2023-12-18 21:35:01', '2023-12-31 02:19:48'),
(105, 'angelasatterfield', '0', '$2y$10$8zKkRbsMIRHcDi3GTGiA3esQbfRK.lK.GVsYGcarxJMquYLafH2g.', NULL, 92, 0, NULL, '2023-12-18 21:36:28', '2023-12-31 02:19:45'),
(106, 'angelasatterfield', '0', '$2y$10$AkHaqulFGvHuOEL/Q9WANedsQxrHDNF5TiT.0NatyqNY9aDYLFrbK', NULL, 92, 0, NULL, '2023-12-18 21:46:14', '2023-12-31 02:19:42'),
(107, 'angelasatterfield', '0', '$2y$10$p.NFvOh.Ax8hlXFDcm3WTOPaRGNVckxQN6.SZncPAi2c2Fg1dHtSO', NULL, 92, 0, NULL, '2023-12-18 21:55:39', '2023-12-31 02:19:38'),
(108, 'augustatorphy', '0', '$2y$10$ybLP3qHSAqtdf8C16w4e5OD905OU.gaULZulRlmuciE.DShqyWVga', NULL, 93, 0, NULL, '2023-12-18 22:16:55', '2023-12-31 02:19:36'),
(109, 'elisacruickshank', '0', '$2y$10$htSRY.X5hGRY9tmdAoZsxOS/603K3s/7G0KkpAmQ7oWoSB195CPw2', NULL, 95, 0, NULL, '2023-12-19 05:33:07', '2023-12-31 02:19:33'),
(111, 'aasd', '0', 'asdasd', 11, 98, 0, NULL, '2023-12-19 00:45:23', '2023-12-31 02:19:30'),
(112, 'edisongualle', 'ed.gualle@gmail.com', '$2y$10$kfq62m86MZRVYRS7WVflv.0LkS7c2t4KCyohKjDZyYWB7.j3qgCAO', 11, 95, 0, NULL, '2023-12-19 05:48:19', '2023-12-31 02:26:54'),
(113, 'niurkasilva', 'niurkalisseth2004@gmail.com', '$2y$10$DGeV47T0M0NHaW3YN02D.eQDXtpWb.OXHamuJTrChzoYOO8VCIPyK', 11, 100, 0, NULL, '2023-12-31 07:23:07', '2023-12-31 07:31:41');

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
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`idConfiguracion`),
  ADD UNIQUE KEY `configuraciones_clave_unique` (`clave`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idContrato`),
  ADD KEY `fk_Contrato_TipoContrato1` (`idTipoContrato`),
  ADD KEY `fk_Contrato_Empleado1` (`idEmpleado`);

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
  ADD KEY `fk_Empleado_Departamento1` (`idDepartamento`),
  ADD KEY `fk_Empleado_Cargo1` (`idCargo`),
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
  ADD KEY `fk_Empleado_has_discapacidad_discapacidad1` (`idDiscapacidad`,`idEmpleado`);

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
-- Indices de la tabla `estadoasistencia`
--
ALTER TABLE `estadoasistencia`
  ADD PRIMARY KEY (`estadoAsistencia`),
  ADD UNIQUE KEY `estadoAsistencia` (`estadoAsistencia`);

--
-- Indices de la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  ADD PRIMARY KEY (`idEvaluacionDesempeno`),
  ADD KEY `evaluaciondesempeno_ibfk_1` (`idEmpleado`),
  ADD KEY `evaluaciondesempeno_ibfk_2` (`idEvaluador`);

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
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idPermiso`),
  ADD KEY `fk_Permisos_TiposPermisos1` (`idTipoPermiso`),
  ADD KEY `fk_Permisos_Empleado1` (`idEmpleado`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  ADD PRIMARY KEY (`idReferenciaLaboral`),
  ADD KEY `fk_ReferenciaLaboral_ExperienciaLaboral1` (`idExperienciaLaboral`);

--
-- Indices de la tabla `registroasistencia`
--
ALTER TABLE `registroasistencia`
  ADD PRIMARY KEY (`idRegistroAsistencia`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `fk_estadoAsistencia` (`estadoAsistencia`),
  ADD KEY `fk_tipoAsistencia` (`tipoAsistencia`);

--
-- Indices de la tabla `residencia`
--
ALTER TABLE `residencia`
  ADD PRIMARY KEY (`idResidencia`),
  ADD KEY `fk_Residencia_Empleado1` (`idEmpleado`);

--
-- Indices de la tabla `restablecercontraseña`
--
ALTER TABLE `restablecercontraseña`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `salidacampo`
--
ALTER TABLE `salidacampo`
  ADD PRIMARY KEY (`idSalidaCampo`),
  ADD KEY `fk_SalidasCampo_Empleado1` (`idEmpleado`),
  ADD KEY `fk_SalidasCampo_TiposSalidas1` (`idTipoSalida`);

--
-- Indices de la tabla `tipoasistencia`
--
ALTER TABLE `tipoasistencia`
  ADD PRIMARY KEY (`tipoAsistencia`);

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
  ADD KEY `fk_usuario_estado` (`idTipoEstado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `idCapacitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `idConfiguracion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `datobancario`
--
ALTER TABLE `datobancario`
  MODIFY `idDatoBancario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT de la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
  MODIFY `idDiscapacidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  MODIFY `idEvaluacionDesempeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  MODIFY `idExperienciaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `instruccionformal`
--
ALTER TABLE `instruccionformal`
  MODIFY `idInstruccionFormal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `referencialaboral`
--
ALTER TABLE `referencialaboral`
  MODIFY `idReferenciaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `registroasistencia`
--
ALTER TABLE `registroasistencia`
  MODIFY `idRegistroAsistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `residencia`
--
ALTER TABLE `residencia`
  MODIFY `idResidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salidacampo`
--
ALTER TABLE `salidacampo`
  MODIFY `idSalidaCampo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  MODIFY `idTipoContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `tipopermiso`
--
ALTER TABLE `tipopermiso`
  MODIFY `idTipoPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `tiposalida`
--
ALTER TABLE `tiposalida`
  MODIFY `idTipoSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

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
  ADD CONSTRAINT `evaluaciondesempeno_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluaciondesempeno_ibfk_2` FOREIGN KEY (`idEvaluador`) REFERENCES `empleado` (`idEmpleado`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencialaboral`
--
ALTER TABLE `experiencialaboral`
  ADD CONSTRAINT `fk_ExperienciaLaboral_Empleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `registroasistencia`
--
ALTER TABLE `registroasistencia`
  ADD CONSTRAINT `fk_estadoAsistencia` FOREIGN KEY (`estadoAsistencia`) REFERENCES `estadoasistencia` (`estadoAsistencia`),
  ADD CONSTRAINT `fk_tipoAsistencia` FOREIGN KEY (`tipoAsistencia`) REFERENCES `tipoasistencia` (`tipoAsistencia`),
  ADD CONSTRAINT `registroasistencia_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

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
  ADD CONSTRAINT `fk_usuario_estado` FOREIGN KEY (`idTipoEstado`) REFERENCES `estado` (`idEstado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
