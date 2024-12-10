-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2024 a las 14:21:08
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
-- Base de datos: `kahoot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `cod` int(11) NOT NULL,
  `enunciado` varchar(200) NOT NULL,
  `respuesta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`cod`, `enunciado`, `respuesta`) VALUES
(1, '¿De qué color es el caballo blanco de Santiago?', 'Blanco'),
(2, '¿Cuántos minutos tiene una hora?', '60'),
(3, '¿Qué lenguajes damos en la escuela?', 'Java,PHP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(200) NOT NULL,
  `tEmpieza` timestamp NOT NULL DEFAULT current_timestamp(),
  `tFinal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `tEmpieza`, `tFinal`) VALUES
(' vcg', '2024-12-10 11:57:24', '2024-12-10 11:57:24'),
('aerfg', '2024-12-10 11:50:14', '2024-12-10 11:50:14'),
('bgf', '2024-12-10 11:27:57', '2024-12-10 11:27:57'),
('fbv', '2024-12-10 11:29:06', '2024-12-10 11:29:06'),
('hk, ', '2024-12-10 11:43:35', '2024-12-10 11:43:35'),
('Mai', '2024-12-10 11:50:33', '2024-12-10 11:50:33'),
('Maite', '2024-12-10 11:21:46', '2024-12-10 11:21:46'),
('tuhn', '2024-12-10 11:48:47', '2024-12-10 11:48:47'),
('vfbrfv', '2024-12-10 11:21:15', '2024-12-10 11:21:15'),
('vfd', '2024-12-10 12:01:23', '2024-12-10 12:01:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
