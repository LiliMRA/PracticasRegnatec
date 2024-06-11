-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 22:48:44
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
(1, 'Software', '1718129625_software1.jpg'),
(2, 'Periféricos', '1718129641_perifericos.webp'),
(3, 'Hardware', '1718129686_hardware.png');

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
(1, 'Neon Viper GX', 'Sensor óptico UltraPrecision 20,000 DPI Tecnología inalámbrica HyperLink 9 botones programables Peso ligero de 70 gramos Vida de la batería de hasta 75 horas Iluminación RGB NeoGlow Diseño ambidiestro', 2, 149.99, '1718129915_raton3.jpg', '1718129915_raton3.jpg', '1718129915_raton3.jpg'),
(2, 'Green Strike Pro', 'Sensor HERO Xtreme 25K, hasta 25,600 DPI Tecnología inalámbrica FastConnect 6 botones programables Peso ligero de 85 gramos Vida de la batería de hasta 65 horas Iluminación RGB SyncPulse Diseño ergonómico para diestros', 2, 139.99, '1718132020_raton5.jpg', '1718132020_raton5.jpg', '1718132020_raton5.jpg');

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
(1, 'Admin', 'admin1@bytestore.com', '$2y$10$2z5mi92k3J8t3A6l2AHZjOr1oGOWUieXi36GyXFLQTU1dxLuwIFz2', 'Administrador'),
(4, 'Usuario 1', 'usuario1@bytestore.com', '$2y$10$Ga9QCl4pyRQmyEVqjHSGlO1WRUfys3R9gI3FzjZrsERqaWEhEUAxu', 'Usuario 1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
