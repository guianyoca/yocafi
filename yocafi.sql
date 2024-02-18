-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2024 a las 01:06:04
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
(1, 'Guille', 'Yornet', '36034573', '1992-07-01', 'LIMA 1397 barrio victoria', '2645457386', 'guianyoca@gmail.com', 'RAWSON', 'SOLTERO', 'MASCULINO', 'POLICIA EN ACTIVIDAD', 'SI', 'NO', '5067681', '98', '2023-11-27', '00:00:00', '', 'HABILITADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(2, 'sad', 'asd', '36034573', '0015-02-21', 'asd', '+542645457386', 'guianyoca@gmail.com', 'CAPITAL', 'CASADO', 'MASCULINO', 'POLICIA RETIRADO', 'SI', 'NO', '988595', '97', '2023-12-11', '00:00:00', '', 'HABILITADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(3, 'Guille', 'Yornet', '36034575', '0000-00-00', 'LIMA', '+542645457386', 'guianyoca@gmail.com', 'CAPITAL', 'SOLTERO', 'MASCULINO', 'POLICIA EN ACTIVIDAD', 'SI', 'NO', '6546', '0', '2024-01-07', '00:00:00', '07-01-2024', 'HABILITADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(4, 'Guille', 'Yornet', '36034579', '0009-05-02', 'LIMA', '+542645457386', 'guianyoca@gmail.com', 'CAPITAL', 'SOLTERO', 'MASCULINO', 'POLICIA EN ACTIVIDAD', 'SI', 'NO', '958989', '0', '2024-01-07', '00:00:00', 'admin', 'HABILITADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, 'CARLOS', 'GODOY', '89858745', '0002-02-22', 'PEDRO VALDIVIA 1234 OESTE', '264897952', 'tr@gl.com', 'CAPITAL', 'VIUDO', 'MASCULINO', 'POLICIA RETIRADO', 'NO', '', '7456', '0', NULL, NULL, 'admin', 'HABILITADO', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '20:21:56', 'admin'),
(6, 'TOTO', 'RODRIGUEZ', '7854122', '1955-04-02', 'AGUILAR 321 SUR', '2645987878', 'toto@gmail.com', 'RAWSON', 'CASADO', 'MASCULINO', 'OFICIAL POLICIA DE SJ', 'NO', '', '589548', '97', '0000-00-00', '22:21:17', 'admin', 'HABILITADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 5, 'CUOTA SOCIO', 'PAGA MES DE FEBRERO 2024', -5000, 5000, 0, '2024-02-10', '20:57:09', 'admin'),
(2, 5, 'CUOTA SOCIO', '                    ', -4000, NULL, -4000, '2024-02-17', '19:36:23', 'admin'),
(3, 5, 'CUOTA SOCIO', '                    pago cuota', NULL, 4000, 0, '2024-02-17', '19:36:52', 'admin'),
(4, 5, 'OTRO', '                    prestamo', -7000, NULL, -7000, '2024-02-17', '19:42:50', 'admin'),
(6, 5, 'OTRO', '               paga parte     ', NULL, 3000, -4000, '2024-02-17', '19:45:45', 'admin');

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
(1, 1, 'CAJA');

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
  `fecha_carga` date NOT NULL,
  `hora_carga` time NOT NULL,
  `usuario_carga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidad`
--

CREATE TABLE `contabilidad` (
  `id` int(11) NOT NULL,
  `id_titular` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `concepto` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `debe` int(11) DEFAULT NULL,
  `haber` int(11) DEFAULT NULL,
  `saldo` int(11) NOT NULL,
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

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `id_titular`, `descripcion`, `ubicacion`, `fecha_carga`, `hora_carga`, `usuario_carga`) VALUES
(3, 3, '5641', 'documentos/escudo sj vectorizado.png', '2024-01-31', '00:56:05', 'admin'),
(4, 3, '63543', 'documentos/1.png', '2024-01-31', '00:56:36', 'admin');

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
(6, 4, 'UGCFDKJHGCKJU', 'JFCVLICFV', 5181691, '0001-11-11', 'MASCULINO', 'CONYUGUE', 'HABILITADO', '2024-01-10', '23:01:35', 'admin'),
(7, 4, 'OGHOADSF', 'AGBRBAERTBH', 19169919, '0001-11-11', 'MASCULINO', 'CONYUGUE', 'HABILITADO', '2024-01-10', '23:03:28', 'admin');

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
(1, 4, 'asfdsafsdfasdfgsda', 'HABILITA', '2024-01-29', '22:30:55', 'admin'),
(2, 3, '                SE MUESTRA PRUEBA    ', 'OTRO', '2024-02-12', '13:39:47', 'admin');

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
-- Estructura de tabla para la tabla `tipos_socios`
--

CREATE TABLE `tipos_socios` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_socios`
--

INSERT INTO `tipos_socios` (`id`, `tipo`, `descripcion`) VALUES
(1, 'POLICIA EN ACTIVIDAD', 'POLCIA AGENTE O SUBOFICIAL QUE SE ENCUENTRE EN ACTIVIDAD AUN'),
(2, 'POLICIA RETIRADO', 'POLCIA AGENTE O SUBOFICIAL QUE SE ENCUENTRE EN ESTADO DE RETIRO DE LA ACTIVIDAD'),
(3, 'OFICIAL POLICIA DE SJ', 'POLCIA OFICIAL DE LA POLICIA DE SAN JUAN QUE SE ENCUENTRE EN ACTIVIDAD AUN'),
(4, 'PENITENCIARIO', 'PERSONAL DE LA FUERZA PENITENCIARIA QUE SE ENCUENTRE EN ACTIVIDAD AUN'),
(5, 'DOCENTE', 'EMPLEADO PUBLICO DEL SECTOR EDUCATIVO QUE EL DESCUENTO SE REALIZARA POR COMPUTOS'),
(6, 'PENSIONADO', 'PERSONA QUE SE QUEDA CON EL BENEFICIO DE SU PARIENTE FALLECIDO'),
(7, 'ADHERENTE', 'PERSONA QUE PAGA DIRECTO POR SEDE');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_titular` (`id_titular`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `aportes`
--
ALTER TABLE `aportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `asientos`
--
ALTER TABLE `asientos`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sectores_laborales`
--
ALTER TABLE `sectores_laborales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
