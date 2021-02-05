-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2021 a las 16:35:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `freelance`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camionero`
--

CREATE TABLE `camionero` (
  `idCamionero` int(11) NOT NULL,
  `DNI` int(11) DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Estado` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camionero`
--

INSERT INTO `camionero` (`idCamionero`, `DNI`, `Nombre`, `Telefono`, `Estado`) VALUES
(1, 35053399, 'Franco', '381-6701012', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineasremito`
--

CREATE TABLE `lineasremito` (
  `idLineasRemitos` int(11) NOT NULL,
  `idRemito` int(11) NOT NULL,
  `Bultos` int(11) DEFAULT NULL,
  `Detalle` varchar(200) NOT NULL,
  `Peso` float NOT NULL,
  `Aforo` varchar(100) NOT NULL,
  `Importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lineasremito`
--

INSERT INTO `lineasremito` (`idLineasRemitos`, `idRemito`, `Bultos`, `Detalle`, `Peso`, `Aforo`, `Importe`) VALUES
(1, 1, 1, 'lol', 3, '4', '500.00'),
(2, 2, 1, 'lol', 3, '4', '500.00'),
(3, 3, 1, 'lol', 3, '4', '500.00'),
(4, 4, 1, 'lol', 3, '4', '500.00'),
(5, 5, 1, 'lol', 3, '4', '500.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1546785942),
('m010101_100001_init_notifications', 1566956044),
('m130524_201442_init', 1546785946);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagosremito`
--

CREATE TABLE `pagosremito` (
  `idPagosRemito` int(11) NOT NULL,
  `idRemito` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Pago` decimal(10,2) NOT NULL,
  `Observacion` varchar(100) NOT NULL,
  `Estado` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagosremito`
--

INSERT INTO `pagosremito` (`idPagosRemito`, `idRemito`, `Fecha`, `Pago`, `Observacion`, `Estado`) VALUES
(1, 1, '2020-10-21 00:00:00', '1000.00', 'es una prueba', 'Activo'),
(2, 4, '2020-10-21 00:00:00', '2000.00', '', 'Activo'),
(3, 3, '2020-10-22 00:00:00', '1000.00', '', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersona` int(11) NOT NULL,
  `Codigo` int(11) DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL,
  `CUIT` varchar(20) NOT NULL,
  `DireccionCom` varchar(100) NOT NULL,
  `LocalidadCom` varchar(100) NOT NULL,
  `ProvinciaCom` varchar(30) NOT NULL,
  `Rubro` varchar(50) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Estado` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `Codigo`, `Nombre`, `CUIT`, `DireccionCom`, `LocalidadCom`, `ProvinciaCom`, `Rubro`, `Telefono`, `Email`, `Estado`) VALUES
(1, 4000, 'Franco', '1213131313', 'San Miguel de Tucuman', 'San Miguel de Tucuman', 'San Miguel de Tucuman', 'Programacion', '325235235', NULL, 'Activo'),
(2, 4000, 'Juan Perez Okey', '1213131313', 'San Miguel de Tucuman', 'San Miguel de Tucuman', 'San Miguel de Tucuman', 'Programacion', '325235235', NULL, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remito`
--

CREATE TABLE `remito` (
  `idRemito` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `idCamionero` int(11) NOT NULL,
  `Codigo` varchar(100) NOT NULL,
  `Fecha` datetime NOT NULL,
  `idDestinatario` int(10) NOT NULL,
  `Flete` decimal(10,2) DEFAULT NULL,
  `Seguro` decimal(10,2) DEFAULT NULL,
  `GCReembolso` decimal(10,2) DEFAULT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Cobrado` decimal(10,2) DEFAULT NULL,
  `Diferencia` decimal(10,2) DEFAULT NULL,
  `VD` decimal(10,2) DEFAULT NULL,
  `Factura` int(11) DEFAULT NULL,
  `CReembolso` decimal(10,2) DEFAULT NULL,
  `Estado` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `remito`
--

INSERT INTO `remito` (`idRemito`, `idPersona`, `idCamionero`, `Codigo`, `Fecha`, `idDestinatario`, `Flete`, `Seguro`, `GCReembolso`, `Total`, `Cobrado`, `Diferencia`, `VD`, `Factura`, `CReembolso`, `Estado`) VALUES
(1, 1, 1, '1', '2020-10-21 00:00:00', 2, '100.00', '10.00', '100.00', '2000.00', '0.00', NULL, '1000.00', 100, '10.00', 'Activo'),
(2, 2, 1, '2', '2020-10-21 00:00:00', 1, '100.00', '10.00', '100.00', '2000.00', '0.00', NULL, '1000.00', 100, '10.00', 'Activo'),
(3, 2, 1, '3', '2020-10-21 00:00:00', 1, '100.00', '10.00', '100.00', '2000.00', '0.00', NULL, '1000.00', 100, '10.00', 'Activo'),
(4, 2, 1, '4', '2020-10-21 00:00:00', 1, '100.00', '10.00', '100.00', '2000.00', '1900.00', '100.00', '1000.00', 100, '10.00', 'Activo'),
(5, 1, 1, '5', '2021-01-20 00:00:00', 1, NULL, NULL, NULL, '2000.00', '0.00', '2000.00', NULL, NULL, NULL, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'franks', 'zLms1PZfCtgjcHJ2GcVOri6si7910uMs', '$2y$13$XGMFNOwI2SzOVEWZ.rSCn.2NFxnnHghWvUzqlQmMpEtgUm2765DIC', NULL, 'ojeador6@gmail.com', 10, 1546786023, 1546786023);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camionero`
--
ALTER TABLE `camionero`
  ADD PRIMARY KEY (`idCamionero`);

--
-- Indices de la tabla `lineasremito`
--
ALTER TABLE `lineasremito`
  ADD PRIMARY KEY (`idLineasRemitos`);

--
-- Indices de la tabla `pagosremito`
--
ALTER TABLE `pagosremito`
  ADD PRIMARY KEY (`idPagosRemito`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `remito`
--
ALTER TABLE `remito`
  ADD PRIMARY KEY (`idRemito`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camionero`
--
ALTER TABLE `camionero`
  MODIFY `idCamionero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lineasremito`
--
ALTER TABLE `lineasremito`
  MODIFY `idLineasRemitos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pagosremito`
--
ALTER TABLE `pagosremito`
  MODIFY `idPagosRemito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `remito`
--
ALTER TABLE `remito`
  MODIFY `idRemito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
