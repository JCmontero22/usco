-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2021 a las 16:14:53
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `identificacion_alumno` varchar(20) NOT NULL,
  `codigo_alumno` varchar(20) NOT NULL,
  `estado_alumno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre_alumno`, `identificacion_alumno`, `codigo_alumno`, `estado_alumno`) VALUES
(1, 'Sofia Manrique', '254886', 'CDA0001', 1),
(2, 'Juan Sebastian Marin', '1254887', 'CDA0002', 0),
(3, 'Valentina Montero', '3254841', 'CDA0003', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_cursos` int(11) NOT NULL,
  `nombre_curso` varchar(100) NOT NULL,
  `codigo_curso` varchar(20) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `estado_curso` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_cursos`, `nombre_curso`, `codigo_curso`, `id_profesor`, `estado_curso`) VALUES
(1, 'Español', 'CDC25955', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_alumno`
--

CREATE TABLE `cursos_alumno` (
  `id_curso_alumno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos_alumno`
--

INSERT INTO `cursos_alumno` (`id_curso_alumno`, `id_curso`, `id_alumno`) VALUES
(4, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` int(11) NOT NULL,
  `nombre_profesor` varchar(100) NOT NULL,
  `cedula_profesor` varchar(20) NOT NULL,
  `telefono_profesor` varchar(20) NOT NULL,
  `codigo_profesor` varchar(20) NOT NULL,
  `estado_profesor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `nombre_profesor`, `cedula_profesor`, `telefono_profesor`, `codigo_profesor`, `estado_profesor`) VALUES
(1, 'Juan Pablo Rendon', '120548774', '3144189228', 'CDP0001', 1),
(2, 'Yolima Manrique', '1546', '321021548', 'CDP0002', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id_salones` int(11) NOT NULL,
  `nombre_salon` varchar(50) NOT NULL,
  `codigo_salon` varchar(20) NOT NULL,
  `estado_salon` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id_salones`, `nombre_salon`, `codigo_salon`, `estado_salon`) VALUES
(1, '201', 'CDS41970', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon_curso`
--

CREATE TABLE `salon_curso` (
  `id_salon_curso` int(11) NOT NULL,
  `id_salon` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salon_curso`
--

INSERT INTO `salon_curso` (`id_salon_curso`, `id_salon`, `id_curso`, `fecha`, `hora_ingreso`, `hora_salida`, `estado`) VALUES
(1, 1, 1, '2021-08-16', '07:00:00', '08:00:00', 1),
(2, 1, 1, '2021-08-14', '08:00:00', '09:00:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_cursos`),
  ADD KEY `fk_cursos_id_profesor` (`id_profesor`);

--
-- Indices de la tabla `cursos_alumno`
--
ALTER TABLE `cursos_alumno`
  ADD PRIMARY KEY (`id_curso_alumno`),
  ADD KEY `fk_cursos_alumno_id_curso` (`id_curso`),
  ADD KEY `fk_curso_alumno_id_alumno` (`id_alumno`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id_salones`);

--
-- Indices de la tabla `salon_curso`
--
ALTER TABLE `salon_curso`
  ADD PRIMARY KEY (`id_salon_curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_cursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos_alumno`
--
ALTER TABLE `cursos_alumno`
  MODIFY `id_curso_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id_salones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `salon_curso`
--
ALTER TABLE `salon_curso`
  MODIFY `id_salon_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_cursos_id_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`);

--
-- Filtros para la tabla `cursos_alumno`
--
ALTER TABLE `cursos_alumno`
  ADD CONSTRAINT `fk_curso_alumno_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`),
  ADD CONSTRAINT `fk_cursos_alumno_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_cursos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
