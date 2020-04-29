-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2020 a las 17:43:53
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

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
  `comiestudiantil_id` int(11) NOT NULL,
  `facultad_id` int(11) NOT NULL
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
  `persona_id` int(11) NOT NULL,
  `gradoacademico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autoridades`
--

INSERT INTO `autoridades` (`id`, `descripcion`, `fechainicio`, `fechafin`, `activo`, `borrado`, `created_at`, `updated_at`, `cargo_id`, `persona_id`, `gradoacademico_id`) VALUES
(1, NULL, NULL, NULL, 1, 0, '2020-02-17 16:19:03', '2020-02-17 16:19:03', 2, 3, 1);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bannerfacultades`
--

INSERT INTO `bannerfacultades` (`id`, `titulo`, `descripcion`, `imagen`, `fechapublica`, `activo`, `borrado`, `created_at`, `updated_at`, `facultad_id`) VALUES
(1, 'FCSEC', 'Facultad de Ciencias Sociales, Educación y de la Comunicacion', '17-02-2020-10-54-54.jpg', '2020-02-17', 1, 0, '2020-02-17 15:54:54', '2020-02-17 15:54:54', 1);

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

--
-- Volcado de datos para la tabla `bannersescuelas`
--

INSERT INTO `bannersescuelas` (`id`, `titulo`, `descripcion`, `imagen`, `fechapublica`, `activo`, `borrado`, `created_at`, `updated_at`, `escuela_id`) VALUES
(1, 'CIENCIAS DE LA COMUNICACION', 'CIENCIAS DE LA COMUNICACIÓN', '17-02-2020-11-23-56.jpg', '2020-02-17', 1, 0, '2020-02-17 16:23:56', '2020-02-17 16:23:56', 3);

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
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`, `descripcion`, `activo`, `borrado`, `created_at`, `updated_at`, `facultad_id`) VALUES
(1, 'CONSEJO DE FACULTAD', 'CONSEJO DE FACULTAD', 1, 0, '2020-02-17 16:08:48', '2020-02-17 16:08:48', 1),
(2, 'DECANO', 'El decanato es un Órgano de Dirección y la máxima autoridad de gobierno de la Facultad, representa a la Facultad de Ciencias Sociales, Educación y de la Comunicación, dirige la gestión académica y administrativa, representa a la Facultad ante el Consejo Universitario y la Asamblea Universitaria conforme lo dispone la Ley Universitaria N° 30220.', 1, 0, '2020-02-17 16:13:20', '2020-02-17 16:13:20', 1),
(3, 'JEFE DE DEPARTAMENTO ACADÉMICO DE EDUCACIÓN', 'JEFE DE DEPARTAMENTO ACADÉMICO DE EDUCACIÓN', 1, 0, '2020-02-17 16:15:58', '2020-02-17 16:15:58', 1),
(4, 'JEFE DE DEPARTAMENTO ACADÉMICO DE CIENCIAS SOCIALES Y  DE LA COMUNICACIÓN', 'JEFE DE DEPARTAMENTO ACADÉMICO DE CIENCIAS SOCIALES Y  DE LA COMUNICACIÓN', 1, 0, '2020-02-17 16:16:36', '2020-02-17 16:16:36', 1),
(5, 'DIRECTOR DE ESCUELA DE EDUCACIÓN', 'DIRECTOR DE ESCUELA DE EDUCACIÓN', 1, 0, '2020-02-17 16:17:04', '2020-02-17 16:17:04', 1),
(6, 'DIRECTOR DE LA ESCUELA CIENCIAS DE LA COMUNICACIÓN', 'DIRECTOR DE LA ESCUELA CIENCIAS DE LA COMUNICACIÓN', 1, 0, '2020-02-17 16:17:35', '2020-02-17 16:17:35', 1),
(7, 'DIRECTOR DE ESCUELA DE ARQUEOLOGÍA', 'DIRECTOR DE ESCUELA DE ARQUEOLOGÍA', 1, 0, '2020-02-17 16:17:55', '2020-02-17 16:17:55', 1);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentoacademicos`
--

INSERT INTO `departamentoacademicos` (`id`, `nombre`, `descripcion`, `activo`, `borrado`, `created_at`, `updated_at`, `facultad_id`) VALUES
(1, 'Departamento Académico de Ciencias Básicas', NULL, 1, 0, '2020-02-17 15:01:59', '2020-02-17 15:01:59', 2),
(2, 'Departamento Académico de Matemática', NULL, 1, 0, '2020-02-17 15:02:08', '2020-02-17 15:02:08', 2),
(3, 'Departamento Académico de Estadística', NULL, 1, 0, '2020-02-17 15:02:19', '2020-02-17 15:02:19', 2),
(4, 'Departamento Académico de Ingeniería de Sistemas y Telecomunicaciones', NULL, 1, 0, '2020-02-17 15:02:28', '2020-02-17 15:02:28', 2),
(5, 'Departamento Académico de Ciencia y Tecnología de Alimentos', NULL, 1, 0, '2020-02-17 15:02:42', '2020-02-17 15:02:42', 3),
(6, 'Departamento Académico de Ingeniería Industrial.', NULL, 1, 0, '2020-02-17 15:02:53', '2020-02-17 15:02:53', 3),
(7, 'Departamento Académico de Agronomía', NULL, 1, 0, '2020-02-17 15:03:11', '2020-02-17 15:03:11', 6),
(8, 'Departamento Académico de Ingeniería Agrícola', NULL, 1, 0, '2020-02-17 15:03:19', '2020-02-17 15:03:19', 6),
(9, 'Departamento Académico de Ingeniería Civil', NULL, 1, 0, '2020-02-17 15:03:28', '2020-02-17 15:03:28', 4),
(10, 'Departamento Académico de Arquitectura', NULL, 1, 0, '2020-02-17 15:03:39', '2020-02-17 15:03:39', 4),
(11, 'Departamento Académico de Ingeniería de Minas y Geología', NULL, 1, 0, '2020-02-17 15:21:48', '2020-02-17 15:21:48', 8),
(12, 'Departamento Académico de Ciencias del Ambiente', NULL, 1, 0, '2020-02-17 15:22:01', '2020-02-17 15:22:01', 11),
(13, 'Departamento Académico de Ingeniería Sanitaria', NULL, 1, 0, '2020-02-17 15:22:16', '2020-02-17 15:22:16', 11),
(14, 'Departamento Académico de Economía', NULL, 1, 0, '2020-02-17 15:32:55', '2020-02-17 15:32:55', 10),
(15, 'Departamento Académico de Contabilidad', NULL, 1, 0, '2020-02-17 15:33:06', '2020-02-17 15:33:06', 10),
(16, 'Departamento Académico de Administración', NULL, 1, 0, '2020-02-17 15:33:18', '2020-02-17 15:33:18', 5),
(17, 'Departamento Académico Turismo', NULL, 1, 0, '2020-02-17 15:33:27', '2020-02-17 15:33:53', 5),
(18, 'Departamento Académico de Propedéutica', NULL, 1, 0, '2020-02-17 15:33:47', '2020-02-17 15:33:47', 7),
(19, 'Departamento Académico de Obstetricia', NULL, 1, 0, '2020-02-17 15:34:03', '2020-02-17 15:34:03', 7),
(20, 'Departamento Académico de Enfermería', NULL, 1, 0, '2020-02-17 15:34:13', '2020-02-17 15:34:13', 7),
(21, 'Departamento Académico de Derecho y Ciencias Políticas', NULL, 1, 0, '2020-02-17 15:35:05', '2020-02-17 15:35:05', 9),
(22, 'Departamento Académico de Educación', NULL, 1, 0, '2020-02-17 15:35:19', '2020-02-17 15:35:19', 1),
(23, 'Departamento Académico de Ciencias Sociales', NULL, 1, 0, '2020-02-17 15:35:31', '2020-02-17 15:35:31', 1),
(24, 'Departamento Académico de Ciencias de la Comunicación', NULL, 1, 0, '2020-02-17 15:35:39', '2020-02-17 15:35:39', 1),
(25, 'Departamento Académico de Arqueología', NULL, 1, 0, '2020-02-17 15:35:46', '2020-02-17 15:35:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcionescuelas`
--

CREATE TABLE `descripcionescuelas` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `tituloprofesional` varchar(500) DEFAULT NULL,
  `gradoacade` varchar(100) DEFAULT NULL,
  `duracion` varchar(100) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `historia` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descripcionescuelas`
--

INSERT INTO `descripcionescuelas` (`id`, `descripcion`, `tituloprofesional`, `gradoacade`, `duracion`, `logo`, `mision`, `vision`, `historia`, `activo`, `borrado`, `created_at`, `updated_at`, `escuela_id`) VALUES
(1, 'Formación de profesionales capaces de desempeñarse eficientemente en áreas de: Comunicación audiovisual (radio, televisión y fotografías, Comunicación  para el Desarrollo, Comunicación Organizacional, Comunicación Estratégica, Publicidad/marketing y Periodismo en sus diversos géneros, con sentido crítico, ético y acorde con la realidad local, nacional e internacional.', 'Licenciado en Ciencias de la Comunicación', 'Bachiller en Ciencias de la Comunicación', '10 SEMESTRES', '17-02-2020-11-22-45.jpg', 'MISIÓN', 'VISIÓN', 'HISTORIA', 1, 0, '2020-02-17 16:22:45', '2020-02-17 16:22:45', 3);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descripcionfacultades`
--

INSERT INTO `descripcionfacultades` (`id`, `descripcion`, `reseñahistor`, `mision`, `vision`, `imagen`, `filosofia`, `activo`, `borrado`, `created_at`, `updated_at`, `facultad_id`) VALUES
(1, 'El 29 de mayo de 1993, en sesión ordinaria, la Asamblea Universitaria de la Universidad Nacional Santiago Antúnez de Mayolo aprueba la creación de la Facultad de Educación a partir del 29 de mayo de 1993 con la finalidad de mejorar la calidad de la educación en nuestro país, formando profesionales de la educación que se incorporen al sistema educativo.', 'El 08 de setiembre de 1993, mediante Resolución Rectoral Nº 470-93-UNASAM, se aprueba la creación de la Escuela de Formación Profesional en Periodismo a partir del 09 de agosto de 1993. El 11 de noviembre de 1993, mediante Resolución Rectoral Nº 591-93-UNASAM, se aprueba la creación de la Escuela Profesional de Educación de la Facultad de Educación a partir del 29 de mayo de 1993. El 26 de mayo de 1994, mediante Resolución Rectoral Nº 219-94-UNASAM, se aprueban los siguientes programas de la Escuela de Educación de la Facultad de Educación:\n-Programa de Educación Primaria\n- Programa de Educación Secundaria\n- Matemática\n- Física y Química\n- Lengua y Literatura\n- Programa de Turismo\n- Programa de Periodismo\nEl 24 de setiembre de 2002, con Resolución Nº 332-2002-UNASAM-FECC, se aprueba la creación de la especialidad Matemática e Informática como parte del Programa de Educación Secundaria. El 31 de diciembre de 2002, con Resolución de Asamblea Universitaria Nº 017-2002-UNASAM, se aprueba el cambio de la denominación de las siguientes especialidades:\n- Educación Primaria por la de Primaria y Educación Bilingue Intercultural.\n- Lengua y Literatura por la de Comunicación, Linguistica y Literatura Asimismo se aprueba el cambio de denominación de la siguiente Escuela:\n- Escuela Profesional de Periodismo por Escuela de Ciencias de la Comunicación.\nEl 06 de febrero de 2004, mediante Resolución de Asamblea Universitaria Nº 002-2004-UNASAM, se aprueba la creación de la Especialidad de Lengua Extranjera: inglés como parte de la Escuela de Formación Profesional de Educación. El 07 de junio de 2006, con Resolución Nº 737-2006-UNASAM/CR, de la Comisión de Reorganización, se aprueba la creacion de la Escuela de Formación Profesional de Arqueología. Con la reforma estatutaria, se cambia la denominación de la facultad quedando con la denominación actual: Facultad de Ciencias Sociales, Educación y de la Comunicación, contando con los Departamentos Académicos de Educación y Ciencias Sociales y Comunicación y las escuelas profesionales de Educación, Ciencias de la Comunicación y Arqueología. A la fecha, la Facultad de Ciencias Sociales, Educación y de la Comunicación (FCSEC) a la fecha viene impulsando dos procesos de gran trascendencia, por un lado la implementación de un currículo por competencias y la implementación del proceso de acreditación de las carreras de la FCSEC.', 'Formar Profesionales líderes y emprendedores con valores Éticos, comprometidos con el desarrollo sostenible de la región a través de la investigación con responsabilidad social.', 'Ser reconocidos nacional e internacionalmente por la calidad en la formación profesional científica, tecnológica y humanística.', '17-02-2020-10-43-26.jpg', 'filosofia', 1, 0, '2020-02-17 15:43:27', '2020-02-17 15:43:27', 1),
(2, 'DESCRIPCIÓN DE LA FACULTA DE CIENCIAS', 'RESEÑA HISTÓRICA DE LA FACULTA DE CIENCIAS', 'MISIÓN DE LA FACULTA DE CIENCIAS', 'VISIÓN DE LA FACULTA DE CIENCIAS', '17-02-2020-10-52-36.png', 'FILOSOFÍA DE LA FACULTA DE CIENCIAS', 1, 0, '2020-02-17 15:52:36', '2020-02-17 15:52:36', 2);

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
  `persona_id` int(11) NOT NULL,
  `departamentoacademico_id` int(11) NOT NULL
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE `escuelas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departamentoacademico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`id`, `nombre`, `telefono`, `direccion`, `email`, `activo`, `borrado`, `created_at`, `updated_at`, `departamentoacademico_id`) VALUES
(1, 'Educación', '00-0000', 'shancayan', NULL, 1, 0, '2020-02-17 15:37:07', '2020-02-17 15:37:07', 22),
(2, 'Arqueología', '00-0000', 'shancayan', NULL, 1, 0, '2020-02-17 15:37:24', '2020-02-17 15:37:24', 25),
(3, 'Ciencias de la Comunicación', '00-0000', 'shancayan', NULL, 1, 0, '2020-02-17 15:37:37', '2020-02-17 15:37:37', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilos`
--

CREATE TABLE `estilos` (
  `id` int(11) NOT NULL,
  `fondoheader` varchar(45) DEFAULT NULL,
  `textoheader` varchar(45) DEFAULT NULL,
  `fondofooter` varchar(45) DEFAULT NULL,
  `textofooter` varchar(45) DEFAULT NULL,
  `fondonavbar` varchar(45) DEFAULT NULL,
  `textonavbar` varchar(45) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estilos`
--

INSERT INTO `estilos` (`id`, `fondoheader`, `textoheader`, `fondofooter`, `textofooter`, `fondonavbar`, `textonavbar`, `activo`, `borrado`, `created_at`, `updated_at`, `facultad_id`) VALUES
(1, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, NULL, NULL, 1),
(2, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 14:55:43', '2020-02-17 14:55:43', 2),
(3, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 14:56:19', '2020-02-17 14:56:19', 3),
(4, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 14:56:33', '2020-02-17 14:56:33', 4),
(5, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 14:56:46', '2020-02-17 14:56:46', 5),
(6, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 14:57:11', '2020-02-17 14:57:11', 6),
(7, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 14:57:34', '2020-02-17 14:57:34', 7),
(8, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 14:58:29', '2020-02-17 14:58:29', 8),
(9, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 14:59:39', '2020-02-17 14:59:39', 9),
(10, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 15:00:05', '2020-02-17 15:00:05', 10),
(11, '#084B8A', '#ffffff', '#084B8A', '#ffffff', '#004884', '#ffffff', 1, 0, '2020-02-17 15:00:54', '2020-02-17 15:00:54', 11);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventofacultades`
--

INSERT INTO `eventofacultades` (`id`, `titulo`, `descripcion`, `imagen`, `fechainicio`, `fechafin`, `fechapublicac`, `activo`, `borrado`, `created_at`, `updated_at`, `facultad_id`) VALUES
(1, 'CONGRESO INTERNACIONAL DE LITERATURA PERUANA 2019', 'CONGRESO INTERNACIONAL DE LITERATURA PERUANA 2019', '17-02-2020-10-55-43.jpg', '2020-02-17', '2020-02-18', '2020-02-17', 1, 0, '2020-02-17 15:55:43', '2020-02-17 15:55:43', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `abreviatura` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`id`, `nombre`, `abreviatura`, `telefono`, `direccion`, `email`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'FACULTADES DE CIENCIAS SOCIALES, EDUCACIÓN Y DE LA COMUNICACIÓN', 'FCSEC', '043-640020 Anexo 1402', 'Avenida Universitaria S/N- Huaraz', 'unasam@edu.pe', 1, 0, NULL, '2020-02-17 16:00:38'),
(2, 'FACULTAD DE CIENCIAS', 'FC', '00-0000', 'shancayan', 'fc@gmail.com', 1, 0, '2020-02-17 14:55:43', '2020-02-17 14:55:43'),
(3, 'FACULTAD DE INGENIERÍA DE INDUSTRIAS ALIMENTARIAS', 'FIIA', '00-0000', 'shancayan', 'fiia@gmail.com', 1, 0, '2020-02-17 14:56:18', '2020-02-17 14:56:18'),
(4, 'FACULTAD DE INGENIERIA CIVIL', 'FIC', '00-0000', 'shancayan', 'fic@gmail.com', 1, 0, '2020-02-17 14:56:33', '2020-02-17 14:56:33'),
(5, 'FACULTAD DE ADMINISTRACION Y TURISMO', 'FAT', '00-0000', 'shancayan', 'fat@gmail.com', 1, 0, '2020-02-17 14:56:46', '2020-02-17 14:56:46'),
(6, 'FACULTAD DE CIENCIAS AGRARIAS', 'FCA', '00-0000', 'shancayan', 'fca@gmail.com', 1, 0, '2020-02-17 14:57:11', '2020-02-17 14:58:14'),
(7, 'FACULTAD CIENCIAS MEDICAS', 'FCM', '00-0000', 'shancayan', 'fcm@gmail.com', 1, 0, '2020-02-17 14:57:34', '2020-02-17 14:57:34'),
(8, 'FACULTAD DE INGENIERÍA DE MINAS, GEOLOGÍA Y METALURGIA.', 'FIMGM', '00-0000', 'shancayan', 'fimgm@gmail.com', 1, 0, '2020-02-17 14:58:29', '2020-02-17 14:58:29'),
(9, 'FACULTAD DE DERECHO Y CIENCIAS POLÍTICAS', 'FDCP', '00-0000', 'shancayan', 'fdcp@gmail.com', 1, 0, '2020-02-17 14:59:39', '2020-02-17 14:59:39'),
(10, 'FACULTAD DE ECONOMÍA Y CONTABILIDAD', 'FEC', '00-0000', 'shancayan', 'fec@gmail.com', 1, 0, '2020-02-17 15:00:05', '2020-02-17 15:00:05'),
(11, 'FACULTAD DE CIENCIAS DEL AMBIENTE', 'FCA', '00-0000', 'shancayan', 'fca@gmail.com', 1, 0, '2020-02-17 15:00:54', '2020-02-17 15:00:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `funcionescol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Volcado de datos para la tabla `galeriaescuelas`
--

INSERT INTO `galeriaescuelas` (`id`, `imagen`, `descripcion`, `activo`, `borrado`, `created_at`, `updated_at`, `escuela_id`) VALUES
(1, '17-02-2020-11-24-45.jpg', NULL, 1, 0, '2020-02-17 16:24:45', '2020-02-17 16:24:45', 3),
(2, '17-02-2020-11-25-04.jpg', NULL, 1, 0, '2020-02-17 16:25:04', '2020-02-17 16:25:04', 3),
(3, '17-02-2020-11-25-16.jpg', NULL, 1, 0, '2020-02-17 16:25:16', '2020-02-17 16:25:16', 2);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Volcado de datos para la tabla `gradoacademicos`
--

INSERT INTO `gradoacademicos` (`id`, `grado`, `abreviatura`, `activo`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'DOCTOR', 'Dr.', 1, 0, '2020-02-17 16:04:57', '2020-02-17 16:04:57'),
(2, 'MAGISTER', 'Mg.', 1, 0, '2020-02-17 16:05:07', '2020-02-17 16:05:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mallas`
--

CREATE TABLE `mallas` (
  `id` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_08_132551_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 2),
(2, 'App\\User', 1);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticiafacultades`
--

INSERT INTO `noticiafacultades` (`id`, `titulo`, `descripcion`, `imagen`, `fechapubli`, `activo`, `borrado`, `created_at`, `updated_at`, `facultad_id`) VALUES
(1, 'CONVENIO CON EMPRESA \"HUASCARAN\"', 'LA FACULTAD DE CIENCIAS SOCIALES, EDUCACIÓN Y DE LA COMUNICACIÓN- UNASAM FIRMÓ CONVENIO CON LA EMPRESA HUASCARÁN TELECOM SAC CABLE ANDINO', '17-02-2020-10-57-38.jpg', '2020-02-17', 1, 0, '2020-02-17 15:57:38', '2020-02-17 15:58:14', 1),
(2, 'CAMPEONES EN VÓLEY MASCULINO', 'Nuestra Facultad de Ciencias Sociales, Educación y de la Comunicación (FCSEC) participó con gran éxito dentro de las actividades que realizó la Universidad Nacional Santiago Antúnez de Mayolo (Unasam) dentro del IV Festival de Integración Universitaria: FestiUnasam 2019, llevándose así­ el premio del primer lugar dentro del FestiDeporte, categoría vóley masculino, destacando además El FestiUnasam tiene como objetivo contribuir con la formación integral de los estudiantes universitarios y promover el desarrollo de sus potencialidades científicas, inventivas, artísticas, culturales, deportivas y emprendedoras, las actividades se desarrollaron del 28 de septiembre al 04 de octubre. El festival incluye la Maratón 10K, FestiDeporte, Emprende Unasam, Innova e Investiga y FestiTalento,', '17-02-2020-10-59-27.jpg', '2020-02-17', 1, 0, '2020-02-17 15:59:27', '2020-02-17 15:59:27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organigramafacultades`
--

CREATE TABLE `organigramafacultades` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `perfil` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create facultad', 'web', '2020-02-17 14:51:51', '2020-02-17 14:51:51'),
(2, 'read facultad', 'web', '2020-02-17 14:51:51', '2020-02-17 14:51:51'),
(3, 'update facultad', 'web', '2020-02-17 14:51:51', '2020-02-17 14:51:51'),
(4, 'delete facultad', 'web', '2020-02-17 14:51:51', '2020-02-17 14:51:51'),
(5, 'create descripcion facultad', 'web', '2020-02-17 14:51:51', '2020-02-17 14:51:51'),
(6, 'read descripcion facultad', 'web', '2020-02-17 14:51:51', '2020-02-17 14:51:51'),
(7, 'update descripcion facultad', 'web', '2020-02-17 14:51:51', '2020-02-17 14:51:51'),
(8, 'delete descripcion facultad', 'web', '2020-02-17 14:51:51', '2020-02-17 14:51:51'),
(9, 'create redes sociales facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(10, 'read redes sociales facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(11, 'update redes sociales facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(12, 'delete redes sociales facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(13, 'create banners facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(14, 'read banners facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(15, 'update banners facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(16, 'delete banners facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(17, 'create eventos facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(18, 'read eventos facultad', 'web', '2020-02-17 14:51:52', '2020-02-17 14:51:52'),
(19, 'update eventos facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(20, 'delete eventos facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(21, 'create noticias facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(22, 'read noticias facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(23, 'update noticias facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(24, 'delete noticias facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(25, 'create galerias facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(26, 'read galerias facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(27, 'update galerias facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(28, 'delete galerias facultad', 'web', '2020-02-17 14:51:53', '2020-02-17 14:51:53'),
(29, 'create videos facultad', 'web', '2020-02-17 14:51:54', '2020-02-17 14:51:54'),
(30, 'read videos facultad', 'web', '2020-02-17 14:51:54', '2020-02-17 14:51:54'),
(31, 'update videos facultad', 'web', '2020-02-17 14:51:54', '2020-02-17 14:51:54'),
(32, 'delete videos facultad', 'web', '2020-02-17 14:51:54', '2020-02-17 14:51:54'),
(33, 'create documentos', 'web', '2020-02-17 14:51:54', '2020-02-17 14:51:54'),
(34, 'read documentos', 'web', '2020-02-17 14:51:55', '2020-02-17 14:51:55'),
(35, 'update documentos', 'web', '2020-02-17 14:51:55', '2020-02-17 14:51:55'),
(36, 'delete documentos', 'web', '2020-02-17 14:51:55', '2020-02-17 14:51:55'),
(37, 'create organigramas', 'web', '2020-02-17 14:51:55', '2020-02-17 14:51:55'),
(38, 'read organigramas', 'web', '2020-02-17 14:51:55', '2020-02-17 14:51:55'),
(39, 'update organigramas', 'web', '2020-02-17 14:51:55', '2020-02-17 14:51:55'),
(40, 'delete organigramas', 'web', '2020-02-17 14:51:55', '2020-02-17 14:51:55'),
(41, 'create escuelas', 'web', '2020-02-17 14:51:55', '2020-02-17 14:51:55'),
(42, 'read escuelas', 'web', '2020-02-17 14:51:55', '2020-02-17 14:51:55'),
(43, 'update escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(44, 'delete escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(45, 'create descripcion escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(46, 'read descripcion escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(47, 'update descripcion escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(48, 'delete descripcion escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(49, 'create campolaboral escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(50, 'read campolaboral escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(51, 'update campolaboral escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(52, 'delete campolaboral escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(53, 'create perfilprofesional escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(54, 'read perfilprofesional escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(55, 'update perfilprofesional escuelas', 'web', '2020-02-17 14:51:56', '2020-02-17 14:51:56'),
(56, 'delete perfilprofesional escuelas', 'web', '2020-02-17 14:51:57', '2020-02-17 14:51:57'),
(57, 'create redes sociales escuelas', 'web', '2020-02-17 14:51:57', '2020-02-17 14:51:57'),
(58, 'read redes sociales escuelas', 'web', '2020-02-17 14:51:57', '2020-02-17 14:51:57'),
(59, 'update redes sociales escuelas', 'web', '2020-02-17 14:51:57', '2020-02-17 14:51:57'),
(60, 'delete redes sociales escuelas', 'web', '2020-02-17 14:51:57', '2020-02-17 14:51:57'),
(61, 'create banners escuelas', 'web', '2020-02-17 14:51:57', '2020-02-17 14:51:57'),
(62, 'read banners escuelas', 'web', '2020-02-17 14:51:57', '2020-02-17 14:51:57'),
(63, 'update banners escuelas', 'web', '2020-02-17 14:51:57', '2020-02-17 14:51:57'),
(64, 'delete banners escuelas', 'web', '2020-02-17 14:51:57', '2020-02-17 14:51:57'),
(65, 'create videos escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(66, 'read videos escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(67, 'update videos escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(68, 'delete videos escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(69, 'create galerias escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(70, 'read galerias escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(71, 'update galerias escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(72, 'delete galerias escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(73, 'create mallas escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(74, 'read mallas escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(75, 'update mallas escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(76, 'delete mallas escuelas', 'web', '2020-02-17 14:51:58', '2020-02-17 14:51:58'),
(77, 'create grados academicos', 'web', '2020-02-17 14:51:59', '2020-02-17 14:51:59'),
(78, 'read grados academicos', 'web', '2020-02-17 14:51:59', '2020-02-17 14:51:59'),
(79, 'update grados academicos', 'web', '2020-02-17 14:51:59', '2020-02-17 14:51:59'),
(80, 'delete grados academicos', 'web', '2020-02-17 14:51:59', '2020-02-17 14:51:59'),
(81, 'create cargos', 'web', '2020-02-17 14:51:59', '2020-02-17 14:51:59'),
(82, 'read cargos', 'web', '2020-02-17 14:51:59', '2020-02-17 14:51:59'),
(83, 'update cargos', 'web', '2020-02-17 14:51:59', '2020-02-17 14:51:59'),
(84, 'delete cargos', 'web', '2020-02-17 14:51:59', '2020-02-17 14:51:59'),
(85, 'create autoridades', 'web', '2020-02-17 14:51:59', '2020-02-17 14:51:59'),
(86, 'read autoridades', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(87, 'update autoridades', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(88, 'delete autoridades', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(89, 'create departamentoacademico', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(90, 'read departamentoacademico', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(91, 'update departamentoacademico', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(92, 'delete departamentoacademico', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(93, 'create categoriadocente', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(94, 'read categoriadocente', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(95, 'update categoriadocente', 'web', '2020-02-17 14:52:00', '2020-02-17 14:52:00'),
(96, 'delete categoriadocente', 'web', '2020-02-17 14:52:01', '2020-02-17 14:52:01'),
(97, 'create docentes', 'web', '2020-02-17 14:52:01', '2020-02-17 14:52:01'),
(98, 'read docentes', 'web', '2020-02-17 14:52:01', '2020-02-17 14:52:01'),
(99, 'update docentes', 'web', '2020-02-17 14:52:01', '2020-02-17 14:52:01'),
(100, 'delete docentes', 'web', '2020-02-17 14:52:02', '2020-02-17 14:52:02'),
(101, 'create comitestudiantil', 'web', '2020-02-17 14:52:02', '2020-02-17 14:52:02'),
(102, 'read comitestudiantil', 'web', '2020-02-17 14:52:02', '2020-02-17 14:52:02'),
(103, 'update comitestudiantil', 'web', '2020-02-17 14:52:02', '2020-02-17 14:52:02'),
(104, 'delete comitestudiantil', 'web', '2020-02-17 14:52:02', '2020-02-17 14:52:02'),
(105, 'create alumnos', 'web', '2020-02-17 14:52:03', '2020-02-17 14:52:03'),
(106, 'read alumnos', 'web', '2020-02-17 14:52:03', '2020-02-17 14:52:03'),
(107, 'update alumnos', 'web', '2020-02-17 14:52:03', '2020-02-17 14:52:03'),
(108, 'delete alumnos', 'web', '2020-02-17 14:52:03', '2020-02-17 14:52:03'),
(109, 'create temainvestigacion', 'web', '2020-02-17 14:52:03', '2020-02-17 14:52:03'),
(110, 'read temainvestigacion', 'web', '2020-02-17 14:52:03', '2020-02-17 14:52:03'),
(111, 'update temainvestigacion', 'web', '2020-02-17 14:52:03', '2020-02-17 14:52:03'),
(112, 'delete temainvestigacion', 'web', '2020-02-17 14:52:04', '2020-02-17 14:52:04'),
(113, 'create publicaciones', 'web', '2020-02-17 14:52:04', '2020-02-17 14:52:04'),
(114, 'read publicaciones', 'web', '2020-02-17 14:52:04', '2020-02-17 14:52:04'),
(115, 'update publicaciones', 'web', '2020-02-17 14:52:04', '2020-02-17 14:52:04'),
(116, 'delete publicaciones', 'web', '2020-02-17 14:52:04', '2020-02-17 14:52:04'),
(117, 'create tipo publicacion', 'web', '2020-02-17 14:52:04', '2020-02-17 14:52:04'),
(118, 'read tipo publicacion', 'web', '2020-02-17 14:52:05', '2020-02-17 14:52:05'),
(119, 'update tipo publicacion', 'web', '2020-02-17 14:52:05', '2020-02-17 14:52:05'),
(120, 'delete tipo publicacion', 'web', '2020-02-17 14:52:05', '2020-02-17 14:52:05'),
(121, 'create permisos', 'web', '2020-02-17 14:52:05', '2020-02-17 14:52:05'),
(122, 'read permisos', 'web', '2020-02-17 14:52:05', '2020-02-17 14:52:05'),
(123, 'update permisos', 'web', '2020-02-17 14:52:05', '2020-02-17 14:52:05'),
(124, 'delete permisos', 'web', '2020-02-17 14:52:05', '2020-02-17 14:52:05'),
(125, 'create roles', 'web', '2020-02-17 14:52:06', '2020-02-17 14:52:06'),
(126, 'read roles', 'web', '2020-02-17 14:52:06', '2020-02-17 14:52:06'),
(127, 'update roles', 'web', '2020-02-17 14:52:06', '2020-02-17 14:52:06'),
(128, 'delete roles', 'web', '2020-02-17 14:52:06', '2020-02-17 14:52:06'),
(129, 'create usuario', 'web', '2020-02-17 14:52:06', '2020-02-17 14:52:06'),
(130, 'read usuario', 'web', '2020-02-17 14:52:07', '2020-02-17 14:52:07'),
(131, 'update usuario', 'web', '2020-02-17 14:52:07', '2020-02-17 14:52:07'),
(132, 'delete usuario', 'web', '2020-02-17 14:52:07', '2020-02-17 14:52:07'),
(133, 'update estilos', 'web', '2020-02-17 14:52:07', '2020-02-17 14:52:07');

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
(1, '00000000', 'super-admin', '', 'masculino.png', 'm', NULL, NULL),
(2, '11111111', 'admin', '', 'masculino.png', 'm', NULL, NULL),
(3, '88888888', 'Simeón Moisés', 'Huerta Rosales', '17-02-2020-11-19-03.jpg', '1', '2020-02-17 16:19:03', '2020-02-17 16:19:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(500) DEFAULT NULL,
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
  `tema_id` int(11) NOT NULL,
  `tipopublicacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redesescuelas`
--

CREATE TABLE `redesescuelas` (
  `id` int(11) NOT NULL,
  `facebook` text DEFAULT NULL,
  `google` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `linkedln` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `escuela_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redesfacultades`
--

CREATE TABLE `redesfacultades` (
  `id` int(11) NOT NULL,
  `facebook` text DEFAULT NULL,
  `google` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `linkedln` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-02-17 14:52:07', '2020-02-17 14:52:07'),
(2, 'super-admin', 'web', '2020-02-17 14:52:34', '2020-02-17 14:52:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(86, 1),
(86, 2),
(87, 1),
(87, 2),
(88, 1),
(88, 2),
(89, 1),
(89, 2),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(92, 2),
(93, 1),
(93, 2),
(94, 1),
(94, 2),
(95, 1),
(95, 2),
(96, 1),
(96, 2),
(97, 1),
(97, 2),
(98, 1),
(98, 2),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(105, 1),
(105, 2),
(106, 1),
(106, 2),
(107, 1),
(107, 2),
(108, 1),
(108, 2),
(109, 1),
(109, 2),
(110, 1),
(110, 2),
(111, 1),
(111, 2),
(112, 1),
(112, 2),
(113, 1),
(113, 2),
(114, 1),
(114, 2),
(115, 1),
(115, 2),
(116, 1),
(116, 2),
(117, 1),
(117, 2),
(118, 1),
(118, 2),
(119, 1),
(119, 2),
(120, 1),
(120, 2),
(121, 2),
(122, 2),
(123, 2),
(124, 2),
(125, 2),
(126, 2),
(127, 2),
(128, 2),
(129, 2),
(130, 2),
(131, 2),
(132, 2),
(133, 1),
(133, 2);

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
-- Estructura de tabla para la tabla `tipopublicaciones`
--

CREATE TABLE `tipopublicaciones` (
  `id` int(11) NOT NULL,
  `tipo` varchar(500) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadesfacultades`
--

CREATE TABLE `unidadesfacultades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `abreviatura` varchar(45) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `facultad_id` int(11) NOT NULL,
  `funcion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `borrado` tinyint(4) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `facultad_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `activo`, `borrado`, `persona_id`, `facultad_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'super-admin@gmail.com', NULL, '$2y$10$GH0/zVMNAJj2EYCqTHErEedw8bN6xfQbgQq6ombsRmB3bqNE0A8DS', 1, 0, 1, 1, 'PBKqhtkUjM0uFJG6L8E6ttRdckV719DnUyFGygVKxSKxrnWu90ouIBudSSDi', '2020-02-17 14:52:49', '2020-02-17 14:52:49'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$NXXXDpNorxwjVnOBtUZrTu1OdsaVLNcPgE5epzexzIRdPRPaxvK7.', 1, 0, 2, 1, 'e8YgfuQl2XO4X8r4nsEFauFV02up09jG420nnThBccxJ21oJmaXQfEDRqbR8', '2020-02-17 14:52:49', '2020-02-17 14:52:49');

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

--
-- Volcado de datos para la tabla `videoescuelas`
--

INSERT INTO `videoescuelas` (`id`, `titulo`, `descripcion`, `link`, `fecha`, `activo`, `borrado`, `created_at`, `updated_at`, `escuela_id`) VALUES
(1, 'REPORTAJE POR EL XXXIX ANIVERSARIO DE LA UNASAM - Rector - Dr. Ing. Julio Poterico Huamayalli', 'Con motivo de conmemorarse el XXXIX aniversario dela Universidad Nacional Santiago Antúnez de Mayolo (Unasam), les presentamos el siguiente reportaje que resume las perspectivas y los logros de la gestión rectoral 2015 – 2020, a cargo del Dr. Ing. Julio Poterico Huamayalli, a favor de nuestra alma máter.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Tilh0GCk50E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2020-02-17', 1, 0, '2020-02-17 16:26:46', '2020-02-17 16:26:46', 3);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `videofacultades`
--

INSERT INTO `videofacultades` (`id`, `titulo`, `descripcion`, `link`, `fecha`, `activo`, `borrado`, `created_at`, `updated_at`, `facultad_id`) VALUES
(1, 'REPORTAJE POR EL XXXIX ANIVERSARIO DE LA UNASAM - Rector - Dr. Ing. Julio Poterico Huamayalli', 'Con motivo de conmemorarse el XXXIX aniversario dela Universidad Nacional Santiago Antúnez de Mayolo (Unasam), les presentamos el siguiente reportaje que resume las perspectivas y los logros de la gestión rectoral 2015 – 2020, a cargo del Dr. Ing. Julio Poterico Huamayalli, a favor de nuestra alma máter.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Tilh0GCk50E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2020-02-17', 1, 0, '2020-02-17 16:27:16', '2020-02-17 16:27:16', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personas2_idx` (`persona_id`),
  ADD KEY `comiestudiantil1_idx` (`comiestudiantil_id`),
  ADD KEY `facultades12_idx` (`facultad_id`);

--
-- Indices de la tabla `autoridades`
--
ALTER TABLE `autoridades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargos1_idx` (`cargo_id`),
  ADD KEY `personas1_idx` (`persona_id`),
  ADD KEY `gradoacademicos1_idx` (`gradoacademico_id`);

--
-- Indices de la tabla `bannerfacultades`
--
ALTER TABLE `bannerfacultades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades1_idx` (`facultad_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades14_idx` (`facultad_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades10_idx` (`facultad_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades8_idx` (`facultad_id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gradoacademico1_idx` (`gradoacademico_id`),
  ADD KEY `categoriadocen1_idx` (`categoriadocente_id`),
  ADD KEY `persona1_idx` (`persona_id`),
  ADD KEY `departamentoacademicos2_idx` (`departamentoacademico_id`);

--
-- Indices de la tabla `documentofacultades`
--
ALTER TABLE `documentofacultades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades2_idx` (`facultad_id`);

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamentoacademicos1_idx` (`departamentoacademico_id`);

--
-- Indices de la tabla `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades6_idx` (`facultad_id`);

--
-- Indices de la tabla `eventofacultades`
--
ALTER TABLE `eventofacultades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades7_idx` (`facultad_id`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades9_idx` (`facultad_id`);

--
-- Indices de la tabla `gradoacademicos`
--
ALTER TABLE `gradoacademicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mallas`
--
ALTER TABLE `mallas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuela1_idx` (`escuela_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `noticiafacultades`
--
ALTER TABLE `noticiafacultades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades5_idx` (`facultad_id`);

--
-- Indices de la tabla `organigramafacultades`
--
ALTER TABLE `organigramafacultades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades4_idx` (`facultad_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuela7_idx` (`escuela_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuelas2_idx` (`escuela_id`),
  ADD KEY `temas2_idx` (`tema_id`),
  ADD KEY `tipopublicaciones1_idx` (`tipopublicacion_id`);

--
-- Indices de la tabla `redesescuelas`
--
ALTER TABLE `redesescuelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuelas4_idx` (`escuela_id`);

--
-- Indices de la tabla `redesfacultades`
--
ALTER TABLE `redesfacultades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades3_idx` (`facultad_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipopublicaciones`
--
ALTER TABLE `tipopublicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidadesfacultades`
--
ALTER TABLE `unidadesfacultades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades13_idx` (`facultad_id`),
  ADD KEY `funciones1_idx` (`funcion_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_persona_id_foreign` (`persona_id`),
  ADD KEY `users_facultad_id_foreign` (`facultad_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultades11_idx` (`facultad_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bannerfacultades`
--
ALTER TABLE `bannerfacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bannersescuelas`
--
ALTER TABLE `bannersescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `campolaborales`
--
ALTER TABLE `campolaborales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `descripcionescuelas`
--
ALTER TABLE `descripcionescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `descripcionfacultades`
--
ALTER TABLE `descripcionfacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `estilos`
--
ALTER TABLE `estilos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `eventofacultades`
--
ALTER TABLE `eventofacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeriaescuelas`
--
ALTER TABLE `galeriaescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `galeriafacultades`
--
ALTER TABLE `galeriafacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gradoacademicos`
--
ALTER TABLE `gradoacademicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mallas`
--
ALTER TABLE `mallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticiafacultades`
--
ALTER TABLE `noticiafacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `redesescuelas`
--
ALTER TABLE `redesescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `redesfacultades`
--
ALTER TABLE `redesfacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipopublicaciones`
--
ALTER TABLE `tipopublicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidadesfacultades`
--
ALTER TABLE `unidadesfacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `videoescuelas`
--
ALTER TABLE `videoescuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videofacultades`
--
ALTER TABLE `videofacultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `comiestudiantil1` FOREIGN KEY (`comiestudiantil_id`) REFERENCES `comiestudiantiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `facultades12` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `personas2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `autoridades`
--
ALTER TABLE `autoridades`
  ADD CONSTRAINT `cargos1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gradoacademicos1` FOREIGN KEY (`gradoacademico_id`) REFERENCES `gradoacademicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `personas1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bannerfacultades`
--
ALTER TABLE `bannerfacultades`
  ADD CONSTRAINT `facultades1` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `facultades14` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamentoacademicos`
--
ALTER TABLE `departamentoacademicos`
  ADD CONSTRAINT `facultades10` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `descripcionescuelas`
--
ALTER TABLE `descripcionescuelas`
  ADD CONSTRAINT `escuela2` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `descripcionfacultades`
--
ALTER TABLE `descripcionfacultades`
  ADD CONSTRAINT `facultades8` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `categoriadocen1` FOREIGN KEY (`categoriadocente_id`) REFERENCES `categoriadocentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `departamentoacademicos2` FOREIGN KEY (`departamentoacademico_id`) REFERENCES `departamentoacademicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gradoacademico1` FOREIGN KEY (`gradoacademico_id`) REFERENCES `gradoacademicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `persona1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documentofacultades`
--
ALTER TABLE `documentofacultades`
  ADD CONSTRAINT `facultades2` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD CONSTRAINT `departamentoacademicos1` FOREIGN KEY (`departamentoacademico_id`) REFERENCES `departamentoacademicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estilos`
--
ALTER TABLE `estilos`
  ADD CONSTRAINT `facultades6` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eventofacultades`
--
ALTER TABLE `eventofacultades`
  ADD CONSTRAINT `facultades7` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeriaescuelas`
--
ALTER TABLE `galeriaescuelas`
  ADD CONSTRAINT `escuelas1` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeriafacultades`
--
ALTER TABLE `galeriafacultades`
  ADD CONSTRAINT `facultades9` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mallas`
--
ALTER TABLE `mallas`
  ADD CONSTRAINT `escuela1` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticiafacultades`
--
ALTER TABLE `noticiafacultades`
  ADD CONSTRAINT `facultades5` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `organigramafacultades`
--
ALTER TABLE `organigramafacultades`
  ADD CONSTRAINT `facultades4` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD CONSTRAINT `escuela7` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `escuelas2` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `temas2` FOREIGN KEY (`tema_id`) REFERENCES `temas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipopublicaciones1` FOREIGN KEY (`tipopublicacion_id`) REFERENCES `tipopublicaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `redesescuelas`
--
ALTER TABLE `redesescuelas`
  ADD CONSTRAINT `escuelas4` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `redesfacultades`
--
ALTER TABLE `redesfacultades`
  ADD CONSTRAINT `facultades3` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `unidadesfacultades`
--
ALTER TABLE `unidadesfacultades`
  ADD CONSTRAINT `facultades13` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `funciones1` FOREIGN KEY (`funcion_id`) REFERENCES `funciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_facultad_id_foreign` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`),
  ADD CONSTRAINT `users_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);

--
-- Filtros para la tabla `videoescuelas`
--
ALTER TABLE `videoescuelas`
  ADD CONSTRAINT `escuelas3` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `videofacultades`
--
ALTER TABLE `videofacultades`
  ADD CONSTRAINT `facultades11` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
