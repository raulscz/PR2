-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2021 a las 19:25:18
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_restaurante_rsc`
--
  CREATE DATABASE `bd_restaurante_rsc`;
  USE `bd_restaurante_rsc`;
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `horario_taula`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `horario_taula` (
`id_horario` int(11)
,`hora_ini` time
,`hora_fi` time
,`id_mesa` int(11)
,`capacidad` int(2)
,`estado` varchar(20)
,`id_sala` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_copia`
--

CREATE TABLE `tbl_copia` (
  `id_incidencia` int(11) NOT NULL,
  `data_incidencia` date DEFAULT NULL,
  `hora_incidencia` time DEFAULT NULL,
  `desc_incidencia` varchar(250) DEFAULT NULL,
  `id_mesa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_copia`
--

INSERT INTO `tbl_copia` (`id_incidencia`, `data_incidencia`, `hora_incidencia`, `desc_incidencia`, `id_mesa`) VALUES
(24, '2021-12-23', '12:17:18', 'Mesa Con Una Silla Rota', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `id_emp` int(11) NOT NULL,
  `nombre_emp` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_emp` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email_emp` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass_emp` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_emp` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto_emp` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`id_emp`, `nombre_emp`, `apellido_emp`, `email_emp`, `pass_emp`, `tipo_emp`, `foto_emp`) VALUES
(16, 'Admin', 'Admin', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '../img/2021-12-13-15-23-49_images.jfif'),
(17, 'Mantenimiento', 'Mantenimiento', 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mantenimiento', '../img/2021-12-13-15-21-13_bob-el-manetes.jpg'),
(18, 'Raul', 'Gracia', 'raul@raul.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Camarero', '../img/2021-12-13-15-08-17__meme01_8b7fc387.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `id_horario` int(11) NOT NULL,
  `hora_ini` time NOT NULL,
  `hora_fi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_horario`
--

INSERT INTO `tbl_horario` (`id_horario`, `hora_ini`, `hora_fi`) VALUES
(1, '08:00:00', '10:00:00'),
(2, '10:00:00', '12:00:00'),
(3, '12:00:00', '14:00:00'),
(4, '14:00:00', '16:00:00'),
(5, '16:00:00', '18:00:00'),
(6, '18:00:00', '20:00:00'),
(7, '20:00:00', '22:00:00'),
(8, '22:00:00', '24:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `data_incidencia` date DEFAULT NULL,
  `hora_incidencia` time DEFAULT NULL,
  `desc_incidencia` varchar(120) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Disparadores `tbl_incidencia`
--
DELIMITER $$
CREATE TRIGGER `AñadirInci` AFTER INSERT ON `tbl_incidencia` FOR EACH ROW BEGIN
    INSERT INTO `tbl_copia` (`id_incidencia`,`data_incidencia`,`hora_incidencia`,`desc_incidencia`,`id_mesa`) VALUES (NEW.id_incidencia, NEW.data_incidencia, NEW.hora_incidencia, NEW.desc_incidencia, NEW.id_mesa);
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesa`
--

CREATE TABLE `tbl_mesa` (
  `id_mesa` int(11) NOT NULL,
  `capacidad` int(2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_mesa`
--

INSERT INTO `tbl_mesa` (`id_mesa`, `capacidad`, `estado`, `id_sala`) VALUES
(1, 2, 'Activo', 1),
(2, 2, 'Activo', 1),
(3, 2, 'Activo', 1),
(4, 2, 'Activo', 1),
(5, 2, 'Activo', 1),
(6, 4, 'Activo', 2),
(7, 4, 'Activo', 2),
(8, 4, 'Activo', 2),
(9, 4, 'Activo', 2),
(10, 4, 'Activo', 2),
(11, 6, 'Activo', 3),
(12, 6, 'Activo', 3),
(13, 6, 'Activo', 3),
(14, 6, 'Activo', 3),
(15, 6, 'Activo', 3),
(16, 8, 'Activo', 4),
(17, 8, 'Activo', 4),
(18, 8, 'Activo', 4),
(19, 8, 'Activo', 4),
(20, 8, 'Activo', 4),
(21, 10, 'Activo', 5),
(22, 10, 'Activo', 5),
(23, 10, 'Activo', 5),
(24, 10, 'Activo', 5),
(25, 10, 'Activo', 5),
(26, 100, 'Activo', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id_reserva` int(11) NOT NULL,
  `nombre_reserva` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `data_reserva` date DEFAULT NULL,
  `id_horario` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id_reserva`, `nombre_reserva`, `data_reserva`, `id_horario`, `id_mesa`) VALUES
(32, 'Raul Santacruz', '2021-12-16', 4, 4),
(33, 'Prueba', '2021-12-24', 1, 1),
(40, 'Prueba', '2022-01-06', 7, 1),
(43, 'Iker', '2021-12-30', 1, 17),
(51, 'Marisa', '2021-12-24', 7, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sala`
--

CREATE TABLE `tbl_sala` (
  `id_sala` int(11) NOT NULL,
  `nom_sala` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_sala`
--

INSERT INTO `tbl_sala` (`id_sala`, `nom_sala`) VALUES
(1, 'Sala 2'),
(2, 'Sala 4'),
(3, 'Sala 6'),
(4, 'Sala 8'),
(5, 'Sala 10'),
(6, 'Reservado');

-- --------------------------------------------------------

--
-- Estructura para la vista `horario_taula`
--
DROP TABLE IF EXISTS `horario_taula`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `horario_taula`  AS   (select `tbl_horario`.`id_horario` AS `id_horario`,`tbl_horario`.`hora_ini` AS `hora_ini`,`tbl_horario`.`hora_fi` AS `hora_fi`,`tbl_mesa`.`id_mesa` AS `id_mesa`,`tbl_mesa`.`capacidad` AS `capacidad`,`tbl_mesa`.`estado` AS `estado`,`tbl_mesa`.`id_sala` AS `id_sala` from (`tbl_horario` join `tbl_mesa`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_copia`
--
ALTER TABLE `tbl_copia`
  ADD PRIMARY KEY (`id_incidencia`);

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indices de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_copia`
--
ALTER TABLE `tbl_copia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD CONSTRAINT `tbl_incidencia_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`);

--
-- Filtros para la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD CONSTRAINT `tbl_mesa_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `tbl_sala` (`id_sala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `tbl_reserva_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`),
  ADD CONSTRAINT `tbl_reserva_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `tbl_horario` (`id_horario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
