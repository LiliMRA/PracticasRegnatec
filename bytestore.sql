-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 23:49:58
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
-- Estructura de tabla para la tabla `escaner`
--

CREATE TABLE `escaner` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `lectura` varchar(10) DEFAULT NULL,
  `uso` varchar(10) DEFAULT NULL,
  `escaneado` varchar(10) DEFAULT NULL,
  `interface` varchar(10) DEFAULT NULL,
  `tecnologia` varchar(10) DEFAULT NULL,
  `soporte` varchar(20) DEFAULT NULL
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
(15, 'Hardware', ''),
(16, 'Software', ''),
(23, 'Periféricos', ''),
(27, 'piezas segunda', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresora_termica`
--

CREATE TABLE `impresora_termica` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `peso` varchar(20) DEFAULT NULL,
  `dimensiones` varchar(50) DEFAULT NULL,
  `alimentacion` varchar(20) DEFAULT NULL,
  `resolucion` varchar(20) DEFAULT NULL,
  `velocidad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitores`
--

CREATE TABLE `monitores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `procesador` varchar(100) DEFAULT NULL,
  `memoria` varchar(100) DEFAULT NULL,
  `disco` varchar(100) DEFAULT NULL,
  `pantalla` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `monitores`
--

INSERT INTO `monitores` (`id`, `nombre`, `foto`, `procesador`, `memoria`, `disco`, `pantalla`) VALUES
(6, 'Posiflex366 PS-3316E TPV ', '1716833405_a29.jpg', 'Intel3 J190066 Quad Core (Cache 2Mb)', ' DDR3 de 4 GB', 'SSD366 de GB', ''),
(7, 'Posiflex36688 PS-3316E TPV ', '1716833825_a29.jpg', 'Intel J190000 Quad Core (Cache 2Mb)', ' DDR300 de 4 GB', 'SSD36600 de GB', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portamonedas`
--

CREATE TABLE `portamonedas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `medidas` varchar(20) DEFAULT NULL,
  `conexiones` varchar(20) DEFAULT NULL,
  `billetera` int(10) DEFAULT NULL,
  `monedero` int(10) DEFAULT NULL,
  `profundidad` varchar(10) DEFAULT NULL,
  `anchura` varchar(10) DEFAULT NULL,
  `altura` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idId` int(11) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `Descripccion` varchar(255) DEFAULT NULL,
  `Precio` double DEFAULT NULL,
  `Imagen1` varchar(255) DEFAULT NULL,
  `Imagen2` varchar(255) DEFAULT NULL,
  `Imagen3` varchar(255) DEFAULT NULL,
  `familias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de Productos';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idId`, `Nombre`, `Descripccion`, `Precio`, `Imagen1`, `Imagen2`, `Imagen3`, `familias_id`) VALUES
(15, 'teclado', '', 30, '', NULL, NULL, 23),
(16, 'teclado inalámbrico', '', 30, '', '', '', 15),
(17, 'Canvas free', '', 150, '', '', '', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol` varchar(255) DEFAULT 'Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `password`, `rol`) VALUES
(2, 'Admin2', 'admin2@bytestore.com', '$2y$10$7aY3FCOQggScbM9IKKfOye6Vc1s/AlQ5R6WC0TBRkMMHf9TP/uKsG', 'Usuario'),
(5, 'usuario6', 'usuario6@bytestore.com', '$2y$10$hhGV2CtZXaeoTfw2aJiyiOyyvbdg8bBD4dNNXN/204ITKRZxLv/mC', 'Usuario'),
(8, 'Usuario 10', 'usuario8@bytestore.com', '$2y$10$vwc7BqN0nBwQh3Y6wujkkumGwPQLSpu2MIdlgPLNoJgpbuM83ArG.', 'Usuario'),
(9, 'usuario15', 'usuario15@bytestore.com', '$2y$10$GV5zhkBh5ddF32CNPqBSBejVF6Ki6c1I/X7H3XqH8eAIN6yoQ.6lW', 'Administrador');

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
-- Indices de la tabla `escaner`
--
ALTER TABLE `escaner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impresora_termica`
--
ALTER TABLE `impresora_termica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monitores`
--
ALTER TABLE `monitores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `portamonedas`
--
ALTER TABLE `portamonedas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idId`),
  ADD KEY `fk_productos_familias_idx` (`familias_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT de la tabla `escaner`
--
ALTER TABLE `escaner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `impresora_termica`
--
ALTER TABLE `impresora_termica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `monitores`
--
ALTER TABLE `monitores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `portamonedas`
--
ALTER TABLE `portamonedas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_familias` FOREIGN KEY (`familias_id`) REFERENCES `familias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
