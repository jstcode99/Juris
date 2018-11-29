-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2018 a las 17:00:43
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sch_domino`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `id` int(10) UNSIGNED NOT NULL,
  `concepto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `forma_pago` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento_equivalente` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alegatos_conclusiones`
--

CREATE TABLE `alegatos_conclusiones` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexos`
--

CREATE TABLE `anexos` (
  `id` int(10) UNSIGNED NOT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobros`
--

CREATE TABLE `cobros` (
  `id` int(10) UNSIGNED NOT NULL,
  `n_smlmv` decimal(10,2) DEFAULT NULL,
  `rango1` decimal(10,2) DEFAULT NULL,
  `porcentaje1` int(11) DEFAULT NULL,
  `rango2` decimal(65,2) DEFAULT NULL,
  `porcentaje2` int(11) DEFAULT NULL,
  `rango3` decimal(65,2) DEFAULT NULL,
  `porcentaje3` int(11) DEFAULT NULL,
  `rango4` decimal(65,2) DEFAULT NULL,
  `porcentaje4` int(11) DEFAULT NULL,
  `rango5` decimal(65,2) DEFAULT NULL,
  `porcentaje5` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_tarifa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cobros`
--

INSERT INTO `cobros` (`id`, `n_smlmv`, `rango1`, `porcentaje1`, `rango2`, `porcentaje2`, `rango3`, `porcentaje3`, `rango4`, `porcentaje4`, `rango5`, `porcentaje5`, `created_at`, `updated_at`, `tipo_tarifa`) VALUES
(1, '1.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-20 03:12:09', '2018-11-20 03:12:09', 'CUOTA FIJA SALARIAL'),
(2, '0.50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-20 03:21:43', '2018-11-20 03:21:43', 'CUOTA FIJA SALARIAL'),
(3, '5.00', '70000000.00', 10, '140000000.00', 12, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-20 22:08:36', '2018-11-20 22:08:36', 'CUOTA MIXTA SALARIAL POR RANGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despachos`
--

CREATE TABLE `despachos` (
  `id` int(10) UNSIGNED NOT NULL,
  `departamento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clasificacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despachos_recorridos`
--

CREATE TABLE `despachos_recorridos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_despacho` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`, `fecha`, `created_at`, `updated_at`) VALUES
(1, 'Derecho Civil', '2018-11-16 00:00:00', '2018-11-16 19:30:49', '2018-11-16 19:32:38'),
(2, 'Derecho Penal', '2018-11-28 00:00:00', '2018-11-29 00:13:35', '2018-11-29 00:32:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excepciones`
--

CREATE TABLE `excepciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hechos`
--

CREATE TABLE `hechos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instancias`
--

CREATE TABLE `instancias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `instancias`
--

INSERT INTO `instancias` (`id`, `nombre`, `tipo`, `porcentaje`, `created_at`, `updated_at`) VALUES
(1, 'Primer instancia', 'Adicion', 5, '2018-11-16 19:32:54', '2018-11-16 19:33:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_11_21_171538_create_pretenciones_table', 1),
(2, '2018_11_21_171547_create_notificaciones_table', 1),
(3, '2018_11_21_171557_create_anexos_table', 1),
(4, '2018_11_21_171605_create_hechos_table', 1),
(5, '2018_11_21_171612_create_pruebas_table', 1),
(6, '2018_11_21_171623_create_excepciones_table', 1),
(7, '2018_11_21_212243_create_prueba_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_apellido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estrato` tinyint(4) DEFAULT NULL,
  `tarjeta_profesional` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_profesional` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `tipo_documento`, `documento`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `estado`, `estrato`, `tarjeta_profesional`, `nivel_profesional`, `direccion`, `telefono`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CC', '13215645', 'JOE', 'DOE', 'MOUSS', 'MKOIS', 'ACTIVO', 3, 'NULL', 'NULL', 'AV 40 965 - 565 SAOS PAUL', '57-31131564', 'CLIENTE', 'joe.doe@gmail.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'iTISPiOJyTxORHhZDZvgfuTi0TlGYQ6e7YGZnZzhRtv7QKb5LV9U8rnDOWTF', '2018-11-16 05:00:00', '2018-11-16 19:29:06', NULL),
(2, 'CC', '4958', 'DEANNA', 'BROCK', 'NOMLANGA', 'HADASSAH', 'ACTIVO', 4, NULL, NULL, '449-7886 ET STREET', '(275) 977-3156', 'CLIENTE', 'semper.rutrum.Fusce@venenatisamagna.co.uk', NULL, '$2y$10$dmiTNyakG4fBzyMaUCZR8eYOvCZHhzwCBpANl8eJMH5AGXTH3qFCS', NULL, '2018-11-16 19:28:07', '2018-11-16 19:29:17', NULL),
(3, 'CC', '495832', 'DEANNA', 'BROCK', 'AUDRA', 'YOKO', 'ACTIVO', 4, 'public/tarjetas_profesionales//i7kxZ6FYpAwzztTbBhujaRqlI3Gi4kGLA0Gxo5Zw.jpeg', NULL, '449-7886 ET STREET', '(298) 187-2211', 'ABOGADO', 'email@email.com', NULL, '$2y$10$5O6h7.QUlezRY/7VBnAkleXtyyD8WwtIyqvytMPSUMw4EAUkTdEsG', NULL, '2018-11-16 19:30:08', '2018-11-16 19:30:32', NULL),
(4, 'CC', '111213554', 'JOEL', 'MIGX', 'AXEL', 'WIZ', 'ACTIVO', NULL, NULL, NULL, 'AV 41 #12 545', '(+57) 312321231', 'CONTRAPARTE', 'joel.mig@gmail.com', NULL, NULL, NULL, '2018-11-22 00:28:25', '2018-11-22 00:44:37', NULL),
(5, 'CC', '49591', 'JOEL', 'MIG', 'AXEL', 'WIZ', 'ACTIVO', 1, NULL, NULL, 'AV 41 #12 545', '(+57) 312321231', 'CONTRAPARTE', 'azucarr@gmail.com', NULL, NULL, NULL, '2018-11-24 00:28:29', '2018-11-24 00:28:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personasprocesos`
--

CREATE TABLE `personasprocesos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personasprocesos`
--

INSERT INTO `personasprocesos` (`id`, `id_proceso`, `id_persona`, `tipo`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 'Demandado', '2018-11-26 21:10:51', '2018-11-26 21:10:51'),
(3, 1, 1, 'Demandante', '2018-11-26 21:10:51', '2018-11-26 21:10:51'),
(4, 2, 5, 'Demandado', '2018-11-26 21:55:26', '2018-11-26 21:55:26'),
(5, 2, 2, 'Demandante', '2018-11-26 21:55:26', '2018-11-26 21:55:26'),
(6, 3, 4, 'Demandante', '2018-11-28 03:01:32', '2018-11-28 03:01:32'),
(7, 3, 1, 'Demandado', '2018-11-28 03:01:32', '2018-11-28 03:01:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantillas`
--

CREATE TABLE `plantillas` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `autor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etiquetas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `plantillas`
--

INSERT INTO `plantillas` (`id`, `titulo`, `fecha`, `autor`, `etiquetas`, `version`, `documento`, `id_especialidad`, `created_at`, `updated_at`) VALUES
(1, 'Carta de renuncia', '2018-11-16 00:00:00', 'Secretaria de empleo v/cio', 'cartas', '100', 'public/platillas//Hn8AL2aX8a25NIL3RPv1aUHASAsyDCG8JI5dseTt.docx', 1, '2018-11-16 21:18:34', '2018-11-16 22:23:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pretenciones`
--

CREATE TABLE `pretenciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero_asignado` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `tiempo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_instancia` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `riesgo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clase` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dificultad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estrato` tinyint(2) NOT NULL,
  `fecha_presentacion` date NOT NULL DEFAULT '0000-00-00',
  `cuantia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id`, `numero_asignado`, `estado`, `fecha_inicio`, `fecha_fin`, `valor`, `tiempo`, `id_instancia`, `id_producto`, `riesgo`, `lugar`, `rol`, `clase`, `dificultad`, `created_at`, `updated_at`, `estrato`, `fecha_presentacion`, `cuantia`) VALUES
(1, '001', 'ACTIVO', '2018-11-26 14:19:12', NULL, NULL, 'Firma de poder', 1, 3, 'Medio', 'Departamental', 'Demandante', 'Ordinario', 'Medio', '2018-11-26 19:19:12', '2018-11-26 19:19:12', 3, '2018-11-02', 'menor'),
(2, '002', 'ACTIVO', '2018-11-26 16:55:18', NULL, NULL, 'Firma de poder', 1, 2, 'Alto', 'Internacional', 'Demandado', 'Ordinario', 'Alto', '2018-11-26 21:55:18', '2018-11-26 21:55:18', 5, '2018-11-15', 'mayor'),
(3, '1100103052018019600', 'ACTIVO', '2018-11-27 21:51:28', NULL, NULL, 'Tramites', 1, 2, 'Medio', 'Departamental', 'Demandado', 'Ordinario', 'Medio', '2018-11-28 02:51:28', '2018-11-28 02:51:28', 3, '2018-11-22', 'menor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_tarifa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_cobro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `tipo_tarifa`, `id_especialidad`, `id_cobro`, `created_at`, `updated_at`) VALUES
(1, 'Consulta verbal', 'El 50% de un salario mínimo legal vigente', 'CUOTA FIJA SALARIAL', 1, 0, '2018-11-20 03:12:13', '2018-11-20 19:07:43'),
(2, 'Extincion de dominio', '5 salarios minimos legales vidente, mas un 10 por ciento del valor comercial del mueble cuando este tenga un valor de 70 millones a 100 millones', 'CUOTA MIXTA SALARIAL POR RANGO', 1, 3, '2018-11-20 22:20:57', '2018-11-20 22:20:57'),
(3, 'Declaración extrajudicial', 'Es una declaración ante la notario, por fuera del proceso', 'CUOTA FIJA SALARIAL', 1, 1, '2018-11-21 01:05:02', '2018-11-21 01:05:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_prueba` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_hecho` int(11) NOT NULL,
  `tipo_creador` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salarios`
--

CREATE TABLE `salarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `decreto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salarios`
--

INSERT INTO `salarios` (`id`, `fecha`, `valor`, `decreto`, `created_at`, `updated_at`) VALUES
(1, '2015-12-30 00:00:00', '642890.00', 'Decreto 2556', '2018-11-16 19:33:48', '2018-11-16 19:49:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alegatos_conclusiones`
--
ALTER TABLE `alegatos_conclusiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cobros`
--
ALTER TABLE `cobros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `despachos`
--
ALTER TABLE `despachos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `despachos_recorridos`
--
ALTER TABLE `despachos_recorridos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `excepciones`
--
ALTER TABLE `excepciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hechos`
--
ALTER TABLE `hechos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instancias`
--
ALTER TABLE `instancias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personasprocesos`
--
ALTER TABLE `personasprocesos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pretenciones`
--
ALTER TABLE `pretenciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salarios`
--
ALTER TABLE `salarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alegatos_conclusiones`
--
ALTER TABLE `alegatos_conclusiones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cobros`
--
ALTER TABLE `cobros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `despachos`
--
ALTER TABLE `despachos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `despachos_recorridos`
--
ALTER TABLE `despachos_recorridos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `excepciones`
--
ALTER TABLE `excepciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hechos`
--
ALTER TABLE `hechos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instancias`
--
ALTER TABLE `instancias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personasprocesos`
--
ALTER TABLE `personasprocesos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pretenciones`
--
ALTER TABLE `pretenciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salarios`
--
ALTER TABLE `salarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
