-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2024 a las 12:54:44
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
-- Base de datos: `examen_biblio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`ID`, `Nombre`) VALUES
(9, 'Ernest Hemingway'),
(10, 'Franz Kafka'),
(1, 'Gabriel García Márquez'),
(5, 'George Orwell'),
(4, 'J.K. Rowling'),
(2, 'Jane Austen'),
(6, 'Leo Tolstoy'),
(7, 'Mark Twain'),
(8, 'Virginia Woolf'),
(3, 'William Shakespeare');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID`, `Nombre`) VALUES
(2, 'Ciencia Ficción'),
(4, 'Clásicos'),
(5, 'Drama'),
(3, 'Fantasía'),
(1, 'Novela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copias_libros`
--

CREATE TABLE `copias_libros` (
  `id_libro` bigint(20) UNSIGNED NOT NULL,
  `id_copia` bigint(20) UNSIGNED NOT NULL,
  `Fecha_edicion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `copias_libros`
--

INSERT INTO `copias_libros` (`id_libro`, `id_copia`, `Fecha_edicion`) VALUES
(1, 1, '1982-03-14'),
(1, 2, '1995-06-30'),
(1, 3, '2004-09-25'),
(1, 4, '2024-12-15'),
(2, 1, '1987-04-22'),
(2, 2, '2000-11-15'),
(2, 3, '2010-07-19'),
(3, 1, '1949-06-08'),
(3, 2, '1983-02-17'),
(3, 3, '2001-05-13'),
(4, 1, '1597-01-01'),
(4, 2, '1992-08-11'),
(4, 3, '2015-04-22'),
(5, 1, '1997-06-26'),
(5, 2, '2001-11-12'),
(5, 3, '2018-03-28'),
(6, 1, '1869-03-04'),
(6, 2, '1967-10-12'),
(6, 3, '2003-12-01'),
(7, 1, '1876-06-17'),
(7, 2, '1990-09-05'),
(7, 3, '2011-11-18'),
(8, 1, '1927-05-05'),
(8, 2, '1981-07-21'),
(8, 3, '2005-02-17'),
(9, 1, '1952-09-01'),
(9, 2, '1985-12-23'),
(9, 3, '2012-04-19'),
(10, 1, '1915-10-17'),
(10, 2, '1989-03-30'),
(10, 3, '2016-06-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Titulo` varchar(30) NOT NULL,
  `Autor` bigint(20) UNSIGNED NOT NULL,
  `Categoria` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID`, `Titulo`, `Autor`, `Categoria`) VALUES
(1, 'Cien años de soledad', 1, 1),
(2, 'Orgullo y Prejuicio', 2, 4),
(3, '1984', 5, 2),
(4, 'Libro4', 3, 5),
(5, 'Libro5', 4, 3),
(6, 'Libro6', 6, 1),
(7, 'Libro7', 7, 1),
(8, 'Libro8', 8, 1),
(9, 'Libro9', 9, 5),
(10, 'Libro10', 10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `usuario` varchar(9) NOT NULL,
  `libro` bigint(20) UNSIGNED NOT NULL,
  `copia` bigint(20) UNSIGNED NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`usuario`, `libro`, `copia`, `fecha_prestamo`, `fecha_devolucion`, `estado`) VALUES
('15437862J', 1, 1, '2024-12-01', '2024-12-15', 0),
('28031749Z', 2, 2, '2024-12-05', '2024-12-20', 1),
('33742590V', 3, 3, '2024-11-30', '2024-12-14', 0),
('50913678Q', 4, 4, '2024-12-03', '2024-12-17', 1),
('59418203C', 5, 5, '2024-12-07', '2024-12-21', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `DNI` varchar(9) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Fecha_Nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `Nombre`, `Apellidos`, `Fecha_Nac`) VALUES
('15437862J', 'Ana Maite', 'Correa', '1966-04-08'),
('28031749Z', 'Maria Ángeles', 'Luque', '1983-01-02'),
('33742590V', 'Ángel', 'Espinosa', '1980-07-20'),
('50913678Q', 'Jaled', 'Armouch', '1993-12-11'),
('59418203C', 'Pacho', 'Rodríguez', '1990-10-27'),
('66125327T', 'Nasaró', 'Akrach', '1970-09-29'),
('73489512P', 'Daniel', 'Olmedo', '1955-11-15'),
('75761428A', 'Elisabeth', 'Cornejo', '1979-11-24'),
('80254271X', 'Pepe', 'Ruiz', '1987-03-18'),
('96731854B', 'Daniel', 'Martín', '2003-06-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `copias_libros`
--
ALTER TABLE `copias_libros`
  ADD PRIMARY KEY (`id_libro`,`id_copia`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `fk_libros_autor` (`Autor`),
  ADD KEY `fk_libros_cat` (`Categoria`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`usuario`,`libro`,`copia`,`fecha_prestamo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `copias_libros`
--
ALTER TABLE `copias_libros`
  ADD CONSTRAINT `fk_copia_libros` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_libros_autor` FOREIGN KEY (`Autor`) REFERENCES `autores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_libros_cat` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
