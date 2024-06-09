-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2024 a las 23:39:23
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
-- Base de datos: `bytestore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cesta`
--

CREATE TABLE `cesta` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `Codigo` double DEFAULT 1 COMMENT 'Id de producto',
  `Descripcion` varchar(255) DEFAULT NULL COMMENT 'Nombre y descripcción del producto comprado',
  `Precio` double DEFAULT NULL COMMENT 'Precio final de compra',
  `unidades` double DEFAULT NULL COMMENT 'Unidades compradas',
  `email` varchar(255) DEFAULT NULL COMMENT 'Dirección de correo electrónico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(255) DEFAULT NULL,
  `Cif` varchar(50) DEFAULT NULL,
  `Direccion_Envio` varchar(50) DEFAULT NULL COMMENT 'Domicilio Envío',
  `Poblacion` varchar(50) DEFAULT NULL COMMENT 'Población',
  `Provincia` varchar(50) DEFAULT NULL COMMENT 'Provincia',
  `cp` varchar(50) DEFAULT NULL COMMENT 'Codigo Postal',
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de Clientes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `PrecioUnitario` decimal(20,0) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descargado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`id`, `idVenta`, `idProducto`, `PrecioUnitario`, `Cantidad`, `Descargado`) VALUES
(17, 15, 7, 90, 1, 0),
(18, 15, 8, 200, 1, 0),
(19, 15, 8, 200, 1, 0),
(20, 18, 7, 90, 1, 0),
(21, 18, 8, 200, 1, 0),
(22, 18, 8, 200, 1, 0),
(23, 19, 7, 90, 1, 0),
(24, 19, 8, 200, 1, 0),
(25, 19, 8, 200, 1, 0),
(26, 20, 7, 90, 1, 0),
(27, 20, 8, 200, 1, 0),
(28, 20, 8, 200, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(255) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL COMMENT 'Imagen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de familias';

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `name`, `Imagen`) VALUES
(9, 'sofware', ''),
(10, 'Hardware', ''),
(11, 'perifericos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idId` int(11) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `Descripccion` varchar(255) DEFAULT NULL,
  `familias_id` int(11) NOT NULL,
  `Precio` double DEFAULT NULL,
  `Imagen1` varchar(255) DEFAULT NULL,
  `Imagen2` varchar(255) DEFAULT NULL,
  `Imagen3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de Productos';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idId`, `Nombre`, `Descripccion`, `familias_id`, `Precio`, `Imagen1`, `Imagen2`, `Imagen3`) VALUES
(7, 'Monitor', 'Monitor 5 táctil', 9, 90, '1717958276_1717697646_producto.jpg', '1717959297_1717958436_1717697646_producto.jpg', '1717958436_1717697646_producto.jpg'),
(8, 'Monitor', 'Monitor 5 táctil', 11, 200, '1717959156_producto.jpg', '1717959156_raton.jpg', '1717959156_teclado.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol` varchar(255) DEFAULT `usuario`
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `password`, `rol`) VALUES
(1, 'Admin', 'admin1@bytestore.com', '$2y$10$/h8T6ITraZYxEw83GmGpAufvspDOJLRjRuHsf77V2j38k7ewgYaNa', 'Administrador'),
(2, 'Usuario', 'usuario1@bytestore.com', '$2y$10$Pzv7zaS5JGyYspYIl6a9wOxoUP42NlCysmUm4A4PoW3VzXxodwWjq', 'Usuario'),
(3, 'Usuario2', 'usuario2@bytestore.com', '$2y$10$gP2/L1fpQwgdxopaPGZvme2bsCEVvM3vKkguUmNYJao7Qkps5SL1W', 'Usuario'),
(4, 'Usuario3', 'usuario3@bytestore.com', '$2y$10$ATK/zOi/c8Mr5TrOEeCRVeFFy0fyTdpDq.AeLE5FrjMXV3ZC4OkXS', 'Usuario3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `ClaveTransaccion` varchar(255) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(5000) NOT NULL,
  `Total` decimal(60,0) NOT NULL,
  `Status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `Status`) VALUES
(1, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 11:49:32', 'usuario2@bytestore.com', 250, ''),
(2, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 11:49:32', 'usuario2@bytestore.com', 266, ''),
(3, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 12:45:22', 'usuario2@bytestore.com', 286, ''),
(4, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 12:52:50', 'usuario2@bytestore.com', 286, ''),
(5, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 12:53:01', 'usuario2@bytestore.com', 286, ''),
(6, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 12:55:03', 'usuario2@bytestore.com', 286, ''),
(7, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 12:59:25', 'usuario2@bytestore.com', 286, 'pendiente'),
(8, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 13:00:01', 'usuario2@bytestore.com', 286, 'pendiente'),
(9, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 13:12:08', 'usuario2@bytestore.com', 286, 'pendiente'),
(10, '', '', '2024-06-08 13:12:53', 'usuario2@bytestore.com', 0, 'pendiente'),
(11, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 13:13:15', 'usuario2@bytestore.com', 286, 'pendiente'),
(12, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 13:49:09', 'usuario2@bytestore.com', 286, 'pendiente'),
(13, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 13:58:35', 'usuario2@bytestore.com', 286, 'pendiente'),
(14, 'ipoj350tm4ebe6dcrkrueh658j', '', '2024-06-08 14:24:15', 'usuario2@bytestore.com', 21, 'pendiente'),
(15, 'luid0692qvdlu62omvmm9bf7v2', '', '2024-06-09 20:57:00', 'usuario15@bytestore.com', 490, 'pendiente'),
(16, '', '', '2024-06-09 20:58:30', 'usuario15@bytestore.com', 0, 'pendiente'),
(17, '', '', '2024-06-09 20:58:49', 'usuario15@bytestore.com', 0, 'pendiente'),
(18, 'luid0692qvdlu62omvmm9bf7v2', '', '2024-06-09 20:59:25', 'usuario15@bytestore.com', 490, 'pendiente'),
(19, 'luid0692qvdlu62omvmm9bf7v2', '', '2024-06-09 20:59:33', 'usuario15@bytestore.com', 490, 'pendiente'),
(20, 'luid0692qvdlu62omvmm9bf7v2', '', '2024-06-09 21:00:00', 'usuario15@bytestore.com', 490, 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cesta`
--
ALTER TABLE `cesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idId`),
  ADD KEY `id_familias` (`familias_id`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cesta`
--
ALTER TABLE `cesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `detalleventas_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventas_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`familias_id`) REFERENCES `familias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
