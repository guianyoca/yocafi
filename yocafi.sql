-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2024 a las 05:26:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yocafi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_titular`
--

CREATE TABLE `afiliado_titular` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `dni` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `domicilio` text NOT NULL,
  `telefono` text NOT NULL,
  `email` text DEFAULT NULL,
  `departamento` text NOT NULL,
  `estado_civil` text NOT NULL,
  `genero` text NOT NULL,
  `tipo_socio` text NOT NULL,
  `servicio_salud` varchar(10) NOT NULL,
  `socio_vitalicio` varchar(10) NOT NULL,
  `padron` text NOT NULL,
  `sector_laboral` text NOT NULL,
  `fecha_carga` date DEFAULT NULL,
  `hora_carga` time DEFAULT NULL,
  `usuario_carga` text NOT NULL,
  `estado` text DEFAULT NULL,
  `fecha_estado` date DEFAULT NULL,
  `hora_estado` time DEFAULT NULL,
  `usuario_estado` text DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `hora_baja` time DEFAULT NULL,
  `usuario_baja` text DEFAULT NULL,
  `fecha_edicion` date DEFAULT NULL,
  `hora_edicion` time DEFAULT NULL,
  `usuario_edita` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `afiliado_titular`
--

INSERT INTO `afiliado_titular` (`id`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`, `domicilio`, `telefono`, `email`, `departamento`, `estado_civil`, `genero`, `tipo_socio`, `servicio_salud`, `socio_vitalicio`, `padron`, `sector_laboral`, `fecha_carga`, `hora_carga`, `usuario_carga`, `estado`, `fecha_estado`, `hora_estado`, `usuario_estado`, `fecha_baja`, `hora_baja`, `usuario_baja`, `fecha_edicion`, `hora_edicion`, `usuario_edita`) VALUES
(1, 'GUILLERMO ANDRES', 'YORNET', '36034573', '1992-07-01', 'LIMA 1397', '2645457386', 'guianyoca@gmail.com', 'RAWSON', 'SOLTERO', 'MASCULINO', 'POLICIA EN ACTIVIDAD', 'SI', '', '5067681', '97', '2024-02-27', '17:43:27', 'admin', 'HABILITADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_camping`
--

CREATE TABLE `agenda_camping` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `dni` int(11) NOT NULL,
  `afiliado` varchar(10) NOT NULL DEFAULT 'NO',
  `servicio` text NOT NULL,
  `monto` int(11) NOT NULL,
  `fecha_servicio` date NOT NULL,
  `hora_servicio` time NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_carga` date NOT NULL,
  `hora_carga` time NOT NULL,
  `usuario_carga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aportes`
--

CREATE TABLE `aportes` (
  `id` int(11) NOT NULL,
  `id_titular` int(11) NOT NULL,
  `concepto` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `deuda` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  `saldo` int(11) NOT NULL,
  `fecha_carga` date NOT NULL DEFAULT current_timestamp(),
  `hora_carga` time NOT NULL DEFAULT current_timestamp(),
  `usuario_carga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aportes`
--

INSERT INTO `aportes` (`id`, `id_titular`, `concepto`, `descripcion`, `deuda`, `pago`, `saldo`, `fecha_carga`, `hora_carga`, `usuario_carga`) VALUES
(1, 1, 'CUOTA SOCIO', 'DEUDA DE CUOTA MES FEBRERO 2024', 9000, NULL, -9000, '2024-02-27', '17:43:27', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asientos`
--

CREATE TABLE `asientos` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asientos`
--

INSERT INTO `asientos` (`id`, `codigo`, `nombre`) VALUES
(1, 1, 'CAJA'),
(2, 2, 'CUOTA SOCIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes`
--

CREATE TABLE `comprobantes` (
  `id` int(11) NOT NULL,
  `id_titular` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `concepto` text NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'PENDIENTE',
  `fecha_carga` date NOT NULL DEFAULT current_timestamp(),
  `hora_carga` time NOT NULL DEFAULT current_timestamp(),
  `usuario_carga` varchar(50) NOT NULL,
  `fecha_estado` date DEFAULT NULL,
  `hora_estado` time DEFAULT NULL,
  `usuario_estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comprobantes`
--

INSERT INTO `comprobantes` (`id`, `id_titular`, `monto`, `concepto`, `descripcion`, `estado`, `fecha_carga`, `hora_carga`, `usuario_carga`, `fecha_estado`, `hora_estado`, `usuario_estado`) VALUES
(1, 1, 9000, 'CUOTA SOCIO', 'DEUDA DE CUOTA MES FEBRERO 2024', 'PENDIENTE', '2024-02-27', '17:43:27', 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidad`
--

CREATE TABLE `contabilidad` (
  `id` int(11) NOT NULL,
  `concepto` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `debe` int(11) DEFAULT NULL,
  `haber` int(11) DEFAULT NULL,
  `fecha_carga` date NOT NULL DEFAULT current_timestamp(),
  `hora_carga` time NOT NULL DEFAULT current_timestamp(),
  `usuario_carga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos_sj`
--

CREATE TABLE `departamentos_sj` (
  `id` int(11) NOT NULL,
  `departamento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos_sj`
--

INSERT INTO `departamentos_sj` (`id`, `departamento`) VALUES
(1, 'CAPITAL'),
(2, 'RAWSON'),
(3, 'CHIMBAS'),
(4, 'RIVADAVIA'),
(5, 'SANTA LUCÍA'),
(6, 'POCITO'),
(7, 'CAUCETE'),
(8, 'JÁCHAL'),
(9, 'ALBARDÓN'),
(10, 'SARMIENTO'),
(11, '25 DE MAYO'),
(12, 'SAN MARTÍN'),
(13, 'CALINGASTA'),
(14, '9 DE JULIO'),
(15, 'ANGACO'),
(16, 'VALLE FÉRTIL'),
(17, 'IGLESIA'),
(18, 'ULLUM'),
(19, 'ZONDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `id_titular` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `fecha_carga` date NOT NULL DEFAULT current_timestamp(),
  `hora_carga` time NOT NULL DEFAULT current_timestamp(),
  `usuario_carga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `id` int(11) NOT NULL,
  `id_titular` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `dni` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` text NOT NULL,
  `vinculo` text NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'HABILITADO',
  `fecha_carga` date NOT NULL DEFAULT current_timestamp(),
  `hora_carga` time NOT NULL DEFAULT current_timestamp(),
  `usuario_carga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id`, `id_titular`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`, `genero`, `vinculo`, `estado`, `fecha_carga`, `hora_carga`, `usuario_carga`) VALUES
(1, 1, 'VALENTINA', 'YORNET', 54930474, '2015-09-02', 'FEMENINO', 'HIJO', 'HABILITADO', '2024-02-28', '19:38:21', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id` int(11) NOT NULL,
  `id_titular` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `tipo_observacion` varchar(50) NOT NULL,
  `fecha_carga` date NOT NULL DEFAULT current_timestamp(),
  `hora_carga` time NOT NULL DEFAULT current_timestamp(),
  `usuario_carga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id`, `id_titular`, `observacion`, `tipo_observacion`, `fecha_carga`, `hora_carga`, `usuario_carga`) VALUES
(1, 1, '                    AGREGA A SU HIJA VALENTINA YORNET DNI 54.930.474', 'AGREGA INTEGRANTE', '2024-02-27', '20:21:38', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores_laborales`
--

CREATE TABLE `sectores_laborales` (
  `id` int(11) NOT NULL,
  `centro` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `sectores_laborales`
--

INSERT INTO `sectores_laborales` (`id`, `centro`, `descripcion`) VALUES
(1, 0, ''),
(2, 1, ''),
(3, 3, ''),
(4, 11, ''),
(5, 17, ''),
(6, 19, ''),
(7, 26, ''),
(8, 31, ''),
(9, 33, ''),
(10, 38, ''),
(11, 43, ''),
(12, 59, ''),
(13, 63, ''),
(14, 65, ''),
(15, 67, ''),
(16, 76, ''),
(17, 80, ''),
(18, 86, ''),
(19, 94, ''),
(20, 96, ''),
(21, 97, ''),
(22, 98, ''),
(23, 99, ''),
(24, 7, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `servicio` text NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` text NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `servicio`, `descripcion`, `ubicacion`, `costo`) VALUES
(1, 'ENTRADA CAMPING RAWSON', 'INGRESO PARA CAMPING CESAP RAWSON', 'CAMPING RAWSON', 2000),
(2, 'ALQUILER DE SALON 1 DE CAMPING RAWSON', 'SALON GRANDE CON 8 TABLEROS Y 40 SILLAS', 'CAMPING RAWSON', 15000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_socios`
--

CREATE TABLE `tipos_socios` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `descripcion` text NOT NULL,
  `valor_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_socios`
--

INSERT INTO `tipos_socios` (`id`, `tipo`, `descripcion`, `valor_servicio`) VALUES
(1, 'POLICIA EN ACTIVIDAD', 'POLCIA AGENTE O SUBOFICIAL QUE SE ENCUENTRE EN ACTIVIDAD AUN', 9000),
(2, 'POLICIA RETIRADO', 'POLCIA AGENTE O SUBOFICIAL QUE SE ENCUENTRE EN ESTADO DE RETIRO DE LA ACTIVIDAD', 5000),
(3, 'OFICIAL POLICIA DE SJ', 'POLCIA OFICIAL DE LA POLICIA DE SAN JUAN QUE SE ENCUENTRE EN ACTIVIDAD AUN', 9000),
(4, 'PENITENCIARIO', 'PERSONAL DE LA FUERZA PENITENCIARIA QUE SE ENCUENTRE EN ACTIVIDAD AUN', 9000),
(5, 'DOCENTE', 'EMPLEADO PUBLICO DEL SECTOR EDUCATIVO QUE EL DESCUENTO SE REALIZARA POR COMPUTOS', 9000),
(6, 'PENSIONADO', 'PERSONA QUE SE QUEDA CON EL BENEFICIO DE SU PARIENTE FALLECIDO', 3000),
(7, 'ADHERENTE', 'PERSONA QUE PAGA DIRECTO POR SEDE', 8000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `correo` text NOT NULL,
  `clave` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `tipo_usuario`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 1, 1),
(2, 'admin', 'admin', 'admin@gmail.com', '$2y$10$o7yEYWN4d6Uk6f5NBgVm.elW5Z3QPhulO8QngLCeOeqsiRIYxtO0u', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliado_titular`
--
ALTER TABLE `afiliado_titular`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `agenda_camping`
--
ALTER TABLE `agenda_camping`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aportes`
--
ALTER TABLE `aportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_titular` (`id_titular`) USING BTREE;

--
-- Indices de la tabla `asientos`
--
ALTER TABLE `asientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_titular` (`id_titular`) USING BTREE;

--
-- Indices de la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos_sj`
--
ALTER TABLE `departamentos_sj`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_titular` (`id_titular`) USING BTREE;

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_titular` (`id_titular`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_titular` (`id_titular`) USING BTREE;

--
-- Indices de la tabla `sectores_laborales`
--
ALTER TABLE `sectores_laborales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_socios`
--
ALTER TABLE `tipos_socios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliado_titular`
--
ALTER TABLE `afiliado_titular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `agenda_camping`
--
ALTER TABLE `agenda_camping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aportes`
--
ALTER TABLE `aportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asientos`
--
ALTER TABLE `asientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos_sj`
--
ALTER TABLE `departamentos_sj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sectores_laborales`
--
ALTER TABLE `sectores_laborales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_socios`
--
ALTER TABLE `tipos_socios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aportes`
--
ALTER TABLE `aportes`
  ADD CONSTRAINT `aportes_ibfk_1` FOREIGN KEY (`id_titular`) REFERENCES `afiliado_titular` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD CONSTRAINT `comprobantes_ibfk_1` FOREIGN KEY (`id_titular`) REFERENCES `afiliado_titular` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id_titular`) REFERENCES `afiliado_titular` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `integrantes_ibfk_1` FOREIGN KEY (`id_titular`) REFERENCES `afiliado_titular` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`id_titular`) REFERENCES `afiliado_titular` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
