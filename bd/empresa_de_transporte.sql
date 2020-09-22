-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2020 a las 00:58:41
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa_de_transporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `CUIL` bigint(11) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `domilicio` varchar(255) DEFAULT NULL,
  `telefono_1` varchar(20) DEFAULT NULL,
  `telefono_2` varchar(20) DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `fecha_de_ingreso` date DEFAULT NULL,
  `fecha_de_baja` date DEFAULT NULL,
  `motivo_de_baja` varchar(255) DEFAULT NULL,
  `fecha_de_vencimiento_de_carnet` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`CUIL`, `apellido`, `nombre`, `domilicio`, `telefono_1`, `telefono_2`, `fecha_de_nacimiento`, `fecha_de_ingreso`, `fecha_de_baja`, `motivo_de_baja`, `fecha_de_vencimiento_de_carnet`) VALUES
(11111111111, 'test', 'test', 'test', '1111', '1111', '2000-10-10', '2000-10-10', NULL, NULL, '2000-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `dia_id` int(11) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`dia_id`, `descripcion`) VALUES
(1, 'lunes'),
(2, 'martes'),
(3, 'miercoles'),
(4, 'jueves'),
(5, 'viernes'),
(6, 'sabado'),
(7, 'domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE `estacion` (
  `estacion_id` int(11) NOT NULL,
  `localidad_id` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estacion`
--

INSERT INTO `estacion` (`estacion_id`, `localidad_id`, `direccion`, `telefono`) VALUES
(1, 1, 'calle 4 453', '2214273198'),
(2, 2, 'av. Antártida Argentina', '1143100700');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_partida`
--

CREATE TABLE `fecha_partida` (
  `fecha_partida_id` int(11) NOT NULL,
  `dia_id` int(11) NOT NULL,
  `hora_partida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fecha_partida`
--

INSERT INTO `fecha_partida` (`fecha_partida_id`, `dia_id`, `hora_partida`) VALUES
(1, 1, '22:40:05'),
(2, 2, '22:42:31'),
(3, 3, '22:43:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `localidad_id` int(11) NOT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `provincia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`localidad_id`, `codigo_postal`, `detalle`, `provincia_id`) VALUES
(1, 1900, 'La Plata', 1),
(2, 1104, 'CABA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `provincia_id` int(11) NOT NULL,
  `codigo_provincia` varchar(2) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`provincia_id`, `codigo_provincia`, `detalle`) VALUES
(1, 'BA', 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion`
--

CREATE TABLE `reparacion` (
  `reparacion_id` int(11) NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `tiempo_reparacion_dias` int(11) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reparacion`
--

INSERT INTO `reparacion` (`reparacion_id`, `unidad_id`, `tiempo_reparacion_dias`, `detalle`) VALUES
(1, 1, 5, 'test'),
(2, 3, 6, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `servicio_id` int(11) NOT NULL,
  `tipo_unidad_id` int(11) NOT NULL,
  `fecha_partida_id` int(11) NOT NULL,
  `estacion_id_origen` int(11) NOT NULL,
  `estacion_id_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`servicio_id`, `tipo_unidad_id`, `fecha_partida_id`, `estacion_id_origen`, `estacion_id_destino`) VALUES
(1, 1, 1, 1, 2),
(2, 3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_unidad`
--

CREATE TABLE `tipo_unidad` (
  `tipo_unidad_id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_unidad`
--

INSERT INTO `tipo_unidad` (`tipo_unidad_id`, `descripcion`) VALUES
(1, 'cama'),
(2, 'semicama'),
(3, 'mixto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `unidad_id` int(11) NOT NULL,
  `patente` varchar(20) DEFAULT NULL,
  `fecha_de_patentamiento` date DEFAULT NULL,
  `cantidad_de_asientos_cama` int(11) DEFAULT NULL,
  `cantidad_de_asientos_semicama` int(11) DEFAULT NULL,
  `tipo_unidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`unidad_id`, `patente`, `fecha_de_patentamiento`, `cantidad_de_asientos_cama`, `cantidad_de_asientos_semicama`, `tipo_unidad_id`) VALUES
(1, 'ab123cm', '2020-10-10', 20, 20, 3),
(2, 'ab456cc', '2020-10-10', 40, 0, 1),
(3, 'ab789cs', '2020-10-10', 0, 40, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre_usuario` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `contrasena`) VALUES
('admin', '$2a$10$cpRXOnqomoS2hQy4IIeege4F4BZb.qbbAGicdQv/XIhHfWTav93bO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `viaje_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `fecha_salida_efectiva` date DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`viaje_id`, `servicio_id`, `unidad_id`, `fecha_salida_efectiva`, `observaciones`) VALUES
(1, 1, 2, '2000-10-10', 'test'),
(2, 2, 1, '2020-10-10', 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_chofer`
--

CREATE TABLE `viaje_chofer` (
  `viaje_id` int(11) NOT NULL,
  `CUIL` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje_chofer`
--

INSERT INTO `viaje_chofer` (`viaje_id`, `CUIL`) VALUES
(1, 11111111111),
(2, 11111111111);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`CUIL`);

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`dia_id`);

--
-- Indices de la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD PRIMARY KEY (`estacion_id`),
  ADD KEY `fk_estacion_id` (`localidad_id`);

--
-- Indices de la tabla `fecha_partida`
--
ALTER TABLE `fecha_partida`
  ADD PRIMARY KEY (`fecha_partida_id`),
  ADD KEY `fk_dia_id` (`dia_id`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`localidad_id`),
  ADD KEY `fk_provincia_id` (`provincia_id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`provincia_id`);

--
-- Indices de la tabla `reparacion`
--
ALTER TABLE `reparacion`
  ADD PRIMARY KEY (`reparacion_id`),
  ADD KEY `fk_unidad_id` (`unidad_id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`servicio_id`),
  ADD KEY `fk_estacion_id_origen` (`estacion_id_origen`),
  ADD KEY `fk_fecha_partida_id` (`fecha_partida_id`),
  ADD KEY `fk_tipo_unidad_id` (`tipo_unidad_id`),
  ADD KEY `fk_estacion_id_destino` (`estacion_id_destino`);

--
-- Indices de la tabla `tipo_unidad`
--
ALTER TABLE `tipo_unidad`
  ADD PRIMARY KEY (`tipo_unidad_id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`unidad_id`),
  ADD KEY `fk_tipo_unidadd_id` (`tipo_unidad_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`viaje_id`),
  ADD KEY `fk_servicio_id` (`servicio_id`),
  ADD KEY `fk_unidadd_id` (`unidad_id`);

--
-- Indices de la tabla `viaje_chofer`
--
ALTER TABLE `viaje_chofer`
  ADD KEY `fk_viaje_id` (`viaje_id`),
  ADD KEY `fk_cuil` (`CUIL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dia`
--
ALTER TABLE `dia`
  MODIFY `dia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estacion`
--
ALTER TABLE `estacion`
  MODIFY `estacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fecha_partida`
--
ALTER TABLE `fecha_partida`
  MODIFY `fecha_partida_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `localidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `provincia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reparacion`
--
ALTER TABLE `reparacion`
  MODIFY `reparacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `servicio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_unidad`
--
ALTER TABLE `tipo_unidad`
  MODIFY `tipo_unidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `unidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `viaje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD CONSTRAINT `fk_estacion_id` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`localidad_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `fecha_partida`
--
ALTER TABLE `fecha_partida`
  ADD CONSTRAINT `fk_dia_id` FOREIGN KEY (`dia_id`) REFERENCES `dia` (`dia_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `fk_provincia_id` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`provincia_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparacion`
--
ALTER TABLE `reparacion`
  ADD CONSTRAINT `fk_unidad_id` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`unidad_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_estacion_id_destino` FOREIGN KEY (`estacion_id_destino`) REFERENCES `estacion` (`estacion_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estacion_id_origen` FOREIGN KEY (`estacion_id_origen`) REFERENCES `estacion` (`estacion_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fecha_partida_id` FOREIGN KEY (`fecha_partida_id`) REFERENCES `fecha_partida` (`fecha_partida_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_unidad_id` FOREIGN KEY (`tipo_unidad_id`) REFERENCES `tipo_unidad` (`tipo_unidad_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD CONSTRAINT `fk_tipo_unidadd_id` FOREIGN KEY (`tipo_unidad_id`) REFERENCES `tipo_unidad` (`tipo_unidad_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `fk_servicio_id` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unidadd_id` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`unidad_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje_chofer`
--
ALTER TABLE `viaje_chofer`
  ADD CONSTRAINT `fk_cuil` FOREIGN KEY (`CUIL`) REFERENCES `chofer` (`CUIL`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_viaje_id` FOREIGN KEY (`viaje_id`) REFERENCES `viaje` (`viaje_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
