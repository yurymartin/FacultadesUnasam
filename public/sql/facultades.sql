-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2019 a las 18:53:26
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facultades`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `persona_id` int(11) NOT NULL,
  `comiestudiantil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoridades`
--

CREATE TABLE `autoridades` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cargo_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autoridades`
--

INSERT INTO `autoridades` (`id`, `descripcion`, `fechainicio`, `fechafin`, `activo`, `borrado`, `created_at`, `updated_at`, `cargo_id`, `persona_id`) VALUES
(1, 'null', '0000-00-00', '0000-00-00', 1, 0, '2019-11-28 17:19:53', '2019-11-28 17:21:39', 1, 2),
(2, 'null', '2019-11-11', '2019-11-14', 1, 0, '2019-11-28 17:20:38', '2019-11-28 17:21:26', 2, 3),
(3, NULL, NULL, NULL, 1, 0, '2019-11-28 17:21:01', '2019-11-28 17:21:01', 3, 4),
(4, NULL, NULL, NULL, 1, 0, '2019-11-28 17:22:23', '2019-11-28 17:22:23', 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bannerfacultades`
--

CREATE TABLE `bannerfacultades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `fechapublica` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bannerfacultades`
--

INSERT INTO `bannerfacultades` (`id`, `titulo`, `descripcion`, `imagen`, `fechapublica`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'Facultad de Ciencias', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...', '28-11-2019-10-30-17.png', '2019-11-28', 1, 0, '2019-11-28 15:30:17', '2019-11-28 15:30:17'),
(2, 'Facultad de Ciencias 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...', '28-11-2019-10-30-52.jpg', '2019-11-28', 1, 0, '2019-11-28 15:30:52', '2019-11-28 15:30:52'),
(3, 'Facultad de Ciencias 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...', '28-11-2019-10-31-11.jpg', '2019-11-28', 1, 0, '2019-11-28 15:31:11', '2019-11-28 15:31:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bannersescuelas`
--

CREATE TABLE `bannersescuelas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `fechapublica` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campolaborales`
--

CREATE TABLE `campolaborales` (
  `id` int(11) NOT NULL,
  `titulo` text DEFAULT NULL,
  `campolab` text DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(200) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'DECANO', 1, 0, '2019-11-28 17:17:12', '2019-11-28 17:17:12'),
(2, 'DIRECTOR DE LA ESCUELA DE INGENIERIA DE SISTEMAS E INFORMATICA', 1, 0, '2019-11-28 17:17:33', '2019-11-28 17:17:33'),
(3, 'DIRECTOR DE LA ESCUELA DE MATEMATICA', 1, 0, '2019-11-28 17:17:42', '2019-11-28 17:17:42'),
(4, 'DIRECTOR DE LA ESCUELA DE ESTADISTICA E INFORMATICA', 1, 0, '2019-11-28 17:17:50', '2019-11-28 17:18:07'),
(5, 'JEFE DE DEPARTAMENTO', 1, 0, '2019-11-28 17:18:21', '2019-11-28 17:18:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriadocentes`
--

CREATE TABLE `categoriadocentes` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comiestudiantiles`
--

CREATE TABLE `comiestudiantiles` (
  `id` int(11) NOT NULL,
  `titulo` varchar(400) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(400) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentoacademicos`
--

CREATE TABLE `departamentoacademicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcionescuelas`
--

CREATE TABLE `descripcionescuelas` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `gradoacade` varchar(100) DEFAULT NULL,
  `duracion` varchar(100) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descripcionescuelas`
--

INSERT INTO `descripcionescuelas` (`id`, `descripcion`, `titulo`, `gradoacade`, `duracion`, `logo`, `activo`, `borrado`, `created_at`, `updated_at`, `escuela_id`) VALUES
(1, NULL, 'INGENIERO EN SISTEMAS E INFORMATICA', 'BACHILLER', '10 CICLOS', '28-11-2019-11-54-03.jpg', 1, 0, '2019-11-28 16:54:03', '2019-11-28 16:54:03', 1),
(2, NULL, 'MATEMATICO', 'BACHILLER', '10 CICLOS', '28-11-2019-11-54-20.jpg', 1, 0, '2019-11-28 16:54:20', '2019-11-28 16:54:20', 2),
(3, NULL, 'ESTADISTICO E INFORMATICO', 'BACHILLER', '10 CICLOS', '28-11-2019-11-54-45.jpg', 1, 0, '2019-11-28 16:54:45', '2019-11-28 16:54:45', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcionfacultades`
--

CREATE TABLE `descripcionfacultades` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `reseñahistor` text DEFAULT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `filosofia` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descripcionfacultades`
--

INSERT INTO `descripcionfacultades` (`id`, `descripcion`, `reseñahistor`, `mision`, `vision`, `imagen`, `filosofia`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - RESEÑA HISTORICA- FACULTAD', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - MISION- FACULTAD', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - VISION- FACULTAD', '28-11-2019-11-42-42.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - FILOSOFIA- FACULTAD', 1, 0, '2019-11-28 16:42:42', '2019-11-28 16:42:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `curricula` varchar(45) DEFAULT NULL,
  `tituloprofe` varchar(300) DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gradoacademico_id` int(11) NOT NULL,
  `categoriadocente_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentofacultades`
--

CREATE TABLE `documentofacultades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(400) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(400) DEFAULT NULL,
  `ruta` varchar(400) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE `escuelas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`id`, `nombre`, `descripcion`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'INGENIERIA DE SISTEMAS E INFORMATICA', NULL, 1, 0, '2019-11-28 16:36:41', '2019-11-28 16:36:41'),
(2, 'MATEMATICA', NULL, 1, 0, '2019-11-28 16:36:47', '2019-11-28 16:36:47'),
(3, 'ESTADISTICA E INFORMATICA', NULL, 1, 0, '2019-11-28 16:36:54', '2019-11-28 16:36:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventofacultades`
--

CREATE TABLE `eventofacultades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `fechapublicac` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventofacultades`
--

INSERT INTO `eventofacultades` (`id`, `titulo`, `descripcion`, `imagen`, `fechainicio`, `fechafin`, `fechapublicac`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'EVENTO', 'En el local de Telematica', '28-11-2019-11-08-13.jpg', '2019-11-05', '2019-11-07', '2019-11-28', 1, 0, '2019-11-28 16:08:13', '2019-11-28 16:08:13'),
(2, 'EVENTO 1', 'Telematica', '28-11-2019-11-08-38.jpg', '2019-11-04', '2019-11-22', '2019-11-28', 1, 0, '2019-11-28 16:08:38', '2019-11-28 16:08:38'),
(3, 'EVENTO 2', 'local central de la unasam', '28-11-2019-11-09-17.jpg', '2019-12-01', '2019-11-15', '2019-11-28', 1, 0, '2019-11-28 16:09:17', '2019-11-28 16:09:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `abreviatura` varchar(45) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`id`, `nombre`, `abreviatura`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'FACULTAD DE CIENCIAS', 'FC', 1, 0, '2019-11-28 15:28:21', '2019-11-28 15:28:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeriaescuelas`
--

CREATE TABLE `galeriaescuelas` (
  `id` int(11) NOT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeriafacultades`
--

CREATE TABLE `galeriafacultades` (
  `id` int(11) NOT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `galeriafacultades`
--

INSERT INTO `galeriafacultades` (`id`, `imagen`, `descripcion`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, '28-11-2019-11-48-46.jpg', NULL, 1, 0, '2019-11-28 16:48:46', '2019-11-28 16:48:46'),
(2, '28-11-2019-11-48-53.jpg', NULL, 1, 0, '2019-11-28 16:48:53', '2019-11-28 16:48:53'),
(3, '28-11-2019-11-48-58.JPG', NULL, 1, 0, '2019-11-28 16:48:58', '2019-11-28 16:48:58'),
(4, '28-11-2019-11-49-03.jpg', NULL, 1, 0, '2019-11-28 16:49:03', '2019-11-28 16:49:03'),
(5, '28-11-2019-11-49-09.jpg', NULL, 1, 0, '2019-11-28 16:49:09', '2019-11-28 16:49:09'),
(6, '28-11-2019-11-49-15.jpg', NULL, 1, 0, '2019-11-28 16:49:15', '2019-11-28 16:49:15'),
(7, '28-11-2019-11-49-24.jpg', NULL, 1, 0, '2019-11-28 16:49:24', '2019-11-28 16:49:24'),
(8, '28-11-2019-11-49-34.jpg', NULL, 1, 0, '2019-11-28 16:49:34', '2019-11-28 16:49:34'),
(9, '28-11-2019-11-49-43.jpg', NULL, 1, 0, '2019-11-28 16:49:43', '2019-11-28 16:49:43'),
(10, '28-11-2019-11-49-48.jpg', NULL, 1, 0, '2019-11-28 16:49:49', '2019-11-28 16:49:49'),
(11, '28-11-2019-11-49-57.jpg', NULL, 1, 0, '2019-11-28 16:49:57', '2019-11-28 16:49:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gradoacademicos`
--

CREATE TABLE `gradoacademicos` (
  `id` int(11) NOT NULL,
  `grado` varchar(100) DEFAULT NULL,
  `abreviatura` char(5) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigacion`
--

CREATE TABLE `investigacion` (
  `id` int(11) NOT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fechapublicacion` date DEFAULT NULL,
  `imagen` varchar(450) DEFAULT NULL,
  `ruta` varchar(450) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `docente_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fechapublicacion` date DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `ruta` varchar(450) DEFAULT NULL,
  `autor` varchar(400) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mallas`
--

CREATE TABLE `mallas` (
  `idmalla` int(11) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `numcurricula` varchar(5) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotrosescuelas`
--

CREATE TABLE `nosotrosescuelas` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `historia` text DEFAULT NULL,
  `filosofia` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nosotrosescuelas`
--

INSERT INTO `nosotrosescuelas` (`id`, `descripcion`, `mision`, `vision`, `historia`, `filosofia`, `activo`, `borrado`, `created_at`, `updated_at`, `escuela_id`) VALUES
(1, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - MISION - SISTEMAS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - VISION - SISTEMAS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - HISTORIA - SISTEMAS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - FILOSOFIA - SISTEMAS', 1, 0, '2019-11-28 16:38:03', '2019-11-28 16:38:03', 1),
(2, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - MISION - MATEMATICA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - VISION - MATEMATICA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - HISTORIA- MATEMATICA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - FILOSFIA- MATEMATICA', 1, 0, '2019-11-28 16:39:05', '2019-11-28 16:39:05', 2),
(3, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - MISION - ESTADISTICA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - VISION- ESTADISTICA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - HISTORIA- ESTADISTICA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum Shannon D. Edwards - FILOSOFIA- ESTADISTICA', 1, 0, '2019-11-28 16:39:33', '2019-11-28 16:39:33', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticiafacultades`
--

CREATE TABLE `noticiafacultades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `fechapubli` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticiafacultades`
--

INSERT INTO `noticiafacultades` (`id`, `titulo`, `descripcion`, `imagen`, `fechapubli`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'Noticia', '28 noviembre 2019', '28-11-2019-11-02-04.jpg', '2019-11-28', 1, 0, '2019-11-28 16:02:04', '2019-11-28 16:02:04'),
(2, 'Noticia 1', '28 noviembre 2019', '28-11-2019-11-02-33.png', '2019-11-28', 1, 0, '2019-11-28 16:02:33', '2019-11-28 16:02:33'),
(3, 'Noticia 2', '29 noviembre 2019', '28-11-2019-11-02-53.jpg', '2019-11-28', 1, 0, '2019-11-28 16:02:53', '2019-11-28 16:02:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organigramafacultades`
--

CREATE TABLE `organigramafacultades` (
  `id` int(11) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `perfil` varchar(500) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `dni` char(8) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `dni`, `nombres`, `apellidos`, `foto`, `genero`, `created_at`, `updated_at`) VALUES
(1, '00000000', 'admin', '', '', 'm', NULL, NULL),
(2, '0', 'Pedro', 'Garrido', '28-11-2019-12-19-53.png', '1', '2019-11-28 17:19:53', '2019-11-28 17:19:53'),
(3, '0', 'Alberto Martin', 'Medina Villacorta', '28-11-2019-12-20-38.png', '1', '2019-11-28 17:20:38', '2019-11-28 17:20:38'),
(4, '0', 'Pepito', 'Torres', '28-11-2019-12-21-01.png', '1', '2019-11-28 17:21:01', '2019-11-28 17:21:01'),
(5, '0', 'maria', 'quizpe campos', '28-11-2019-12-22-23.jpg', '0', '2019-11-28 17:22:23', '2019-11-28 17:22:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` int(11) NOT NULL,
  `tema` varchar(500) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousers`
--

CREATE TABLE `tipousers` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousers`
--

INSERT INTO `tipousers` (`id`, `tipo`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipouser_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `activo`, `borrado`, `imagen`, `remember_token`, `created_at`, `updated_at`, `tipouser_id`, `persona_id`) VALUES
(0, 'admin', 'admin@gmail.com', NULL, '$2y$10$j/IDVydTKen4EgaBvRZxF.BL7R365fug.Y/aM3DZ9xS48ZysLymoi', 1, 0, '', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videoescuelas`
--

CREATE TABLE `videoescuelas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videofacultades`
--

CREATE TABLE `videofacultades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `videofacultades`
--

INSERT INTO `videofacultades` (`id`, `titulo`, `descripcion`, `link`, `fecha`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'Fisi', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/fQjRKtXJfp4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-11-28', 1, 0, '2019-11-28 17:06:26', '2019-11-28 17:06:26'),
(2, 'unasam', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/IUl5XMfVnxo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-11-28', 1, 0, '2019-11-28 17:08:57', '2019-11-28 17:08:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personas2_idx` (`persona_id`),
  ADD KEY `comiestudiantil1_idx` (`comiestudiantil_id`);

--
-- Indices de la tabla `autoridades`
--
ALTER TABLE `autoridades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargos1_idx` (`cargo_id`),
  ADD KEY `personas1_idx` (`persona_id`);

--
-- Indices de la tabla `bannerfacultades`
--
ALTER TABLE `bannerfacultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bannersescuelas`
--
ALTER TABLE `bannersescuelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuela5_idx` (`escuela_id`);

--
-- Indices de la tabla `campolaborales`
--
ALTER TABLE `campolaborales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuela3_idx` (`escuela_id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoriadocentes`
--
ALTER TABLE `categoriadocentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comiestudiantiles`
--
ALTER TABLE `comiestudiantiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentoacademicos`
--
ALTER TABLE `departamentoacademicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descripcionescuelas`
--
ALTER TABLE `descripcionescuelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuela2_idx` (`escuela_id`);

--
-- Indices de la tabla `descripcionfacultades`
--
ALTER TABLE `descripcionfacultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gradoacademico1_idx` (`gradoacademico_id`),
  ADD KEY `categoriadocen1_idx` (`categoriadocente_id`),
  ADD KEY `persona1_idx` (`persona_id`);

--
-- Indices de la tabla `documentofacultades`
--
ALTER TABLE `documentofacultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventofacultades`
--
ALTER TABLE `eventofacultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeriaescuelas`
--
ALTER TABLE `galeriaescuelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuelas1_idx` (`escuela_id`);

--
-- Indices de la tabla `galeriafacultades`
--
ALTER TABLE `galeriafacultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gradoacademicos`
--
ALTER TABLE `gradoacademicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `investigacion`
--
ALTER TABLE `investigacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docentes1_idx` (`docente_id`),
  ADD KEY `temas1_idx` (`tema_id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuelas2_idx` (`escuela_id`),
  ADD KEY `temas2_idx` (`tema_id`);

--
-- Indices de la tabla `mallas`
--
ALTER TABLE `mallas`
  ADD PRIMARY KEY (`idmalla`),
  ADD KEY `escuela1_idx` (`escuela_id`);

--
-- Indices de la tabla `nosotrosescuelas`
--
ALTER TABLE `nosotrosescuelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuela4_idx` (`escuela_id`);

--
-- Indices de la tabla `noticiafacultades`
--
ALTER TABLE `noticiafacultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `organigramafacultades`
--
ALTER TABLE `organigramafacultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuela7_idx` (`escuela_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousers`
--
ALTER TABLE `tipousers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipousuario1_idx` (`tipouser_id`),
  ADD KEY `persona2_idx` (`persona_id`);

--
-- Indices de la tabla `videoescuelas`
--
ALTER TABLE `videoescuelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuelas3_idx` (`escuela_id`);

--
-- Indices de la tabla `videofacultades`
--
ALTER TABLE `videofacultades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autoridades`
--
ALTER TABLE `autoridades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bannerfacultades`
--
ALTER TABLE `bannerfacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bannersescuelas`
--
ALTER TABLE `bannersescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `campolaborales`
--
ALTER TABLE `campolaborales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoriadocentes`
--
ALTER TABLE `categoriadocentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comiestudiantiles`
--
ALTER TABLE `comiestudiantiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentoacademicos`
--
ALTER TABLE `departamentoacademicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descripcionescuelas`
--
ALTER TABLE `descripcionescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `descripcionfacultades`
--
ALTER TABLE `descripcionfacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentofacultades`
--
ALTER TABLE `documentofacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventofacultades`
--
ALTER TABLE `eventofacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `galeriaescuelas`
--
ALTER TABLE `galeriaescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeriafacultades`
--
ALTER TABLE `galeriafacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `gradoacademicos`
--
ALTER TABLE `gradoacademicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `investigacion`
--
ALTER TABLE `investigacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mallas`
--
ALTER TABLE `mallas`
  MODIFY `idmalla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nosotrosescuelas`
--
ALTER TABLE `nosotrosescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticiafacultades`
--
ALTER TABLE `noticiafacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `organigramafacultades`
--
ALTER TABLE `organigramafacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousers`
--
ALTER TABLE `tipousers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videoescuelas`
--
ALTER TABLE `videoescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `videofacultades`
--
ALTER TABLE `videofacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `comiestudiantil1` FOREIGN KEY (`comiestudiantil_id`) REFERENCES `comiestudiantiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `personas2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `autoridades`
--
ALTER TABLE `autoridades`
  ADD CONSTRAINT `cargos1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `personas1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bannersescuelas`
--
ALTER TABLE `bannersescuelas`
  ADD CONSTRAINT `escuela5` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `campolaborales`
--
ALTER TABLE `campolaborales`
  ADD CONSTRAINT `escuela3` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `descripcionescuelas`
--
ALTER TABLE `descripcionescuelas`
  ADD CONSTRAINT `escuela2` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `categoriadocen1` FOREIGN KEY (`categoriadocente_id`) REFERENCES `categoriadocentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gradoacademico1` FOREIGN KEY (`gradoacademico_id`) REFERENCES `gradoacademicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `persona1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeriaescuelas`
--
ALTER TABLE `galeriaescuelas`
  ADD CONSTRAINT `escuelas1` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `investigacion`
--
ALTER TABLE `investigacion`
  ADD CONSTRAINT `docentes1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `temas1` FOREIGN KEY (`tema_id`) REFERENCES `temas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `escuelas2` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `temas2` FOREIGN KEY (`tema_id`) REFERENCES `temas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mallas`
--
ALTER TABLE `mallas`
  ADD CONSTRAINT `escuela1` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nosotrosescuelas`
--
ALTER TABLE `nosotrosescuelas`
  ADD CONSTRAINT `escuela4` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD CONSTRAINT `escuela7` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `persona2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipousuario1` FOREIGN KEY (`tipouser_id`) REFERENCES `tipousers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `videoescuelas`
--
ALTER TABLE `videoescuelas`
  ADD CONSTRAINT `escuelas3` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
