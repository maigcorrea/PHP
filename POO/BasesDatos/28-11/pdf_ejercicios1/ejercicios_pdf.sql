-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2024 a las 10:39:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicios_pdf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(3) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nif`, `nombre`, `edad`, `usuario`, `pass`) VALUES
('11111111E', 'Andrés', 28, 'andres', 'andres'),
('22222222D', 'Julia', 31, 'julia', 'julia'),
('33333333V', 'Alejandro', 27, 'alex', 'alex'),
('44444444Z', 'Iria', 35, 'iria', 'iria'),
('55555555U', 'Paula', 29, 'paula', 'paula'),
('66666666K', 'Rogelio', 35, 'roge', 'roge'),
('77777777Q', 'Héctor', 25, 'hector', 'hector'),
('88888888F', 'Luis', 25, 'luis', 'luis'),
('99999999R', 'Carmen', 25, 'carmen', 'carmen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod`, `descripcion`, `precio`) VALUES
(1, 'Chocolate', 0.25),
(2, 'Azúcar', 1.50),
(3, 'Harina', 1.25),
(4, 'Colorante', 1.50),
(5, 'Molde 1', 15.25),
(6, 'Obleas', 0.35),
(7, 'Levadura', 0.75),
(8, 'Molde 2', 13.50),
(9, 'Sacarina', 1.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `cliente` varchar(9) NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` float(5,2) NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nif`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`cliente`,`producto`,`fecha`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `cliente_venta_fk` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`nif`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_venta_fk` FOREIGN KEY (`producto`) REFERENCES `producto` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
