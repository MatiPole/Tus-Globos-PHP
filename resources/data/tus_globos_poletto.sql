-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2023 a las 22:14:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tus_globos_poletto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `producto_id`, `cantidad`, `usuario_id`) VALUES
(76, 16, 1, 2),
(77, 2, 1, 2),
(87, 16, 1, 11),
(88, 2, 1, 11),
(89, 16, 2, 1),
(90, 2, 2, 1),
(91, 3, 2, 1),
(92, 18, 1, 1),
(98, 16, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`id`, `usuario_id`, `metodo_pago`, `total`) VALUES
(1, 6, 'efectivo', '3947.97'),
(2, 6, 'mercado_pago', '3947.97'),
(3, 6, 'mercado_pago', '5409.55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `unidadesporbolsa` int(11) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `tipo`, `descripcion`, `precio`, `unidadesporbolsa`, `categoria`, `imagen`, `stock`) VALUES
(1, 'Amarillo', 'Standard', 'Globos color Amarillo. Son los mejores globos para tus fiestas.', '730.79', 25, 'Cálidos', 'amarillo-standard', 100),
(2, 'Azul', 'Standard', 'Globos color Azul. Son los mejores globos para tus fiestas.', '730.79', 25, 'Fríos', 'azul-standard', 93),
(3, 'Blanco', 'Standard', 'Globos color Blanco. Son los mejores globos para tus fiestas.', '730.79', 25, 'Fríos', 'blanco-standard', 96),
(4, 'Bordó', 'Standard', 'Globos color Bordó. Son los mejores globos para tus fiestas.', '500.00', 25, 'Cálidos', 'bordo-standard', 100),
(5, 'Celeste', 'Standard', 'Globos color Celeste. Son los mejores globos para tus fiestas.', '730.79', 25, 'Fríos', 'celeste-standard', 100),
(6, 'Fucsia', 'Standard', 'Globos color Fucsia. Son los mejores globos para tus fiestas.', '500.00', 25, 'Fríos', 'fucsia-standard', 100),
(7, 'Lila', 'Standard', 'Globos color Lila. Son los mejores globos para tus fiestas.', '730.79', 25, 'Fríos', 'lila-standard', 100),
(8, 'Marrón', 'Standard', 'Globos color Marrón. Son los mejores globos para tus fiestas.', '730.79', 25, 'Fríos', 'marron-standard', 100),
(9, 'Multicolor', 'Standard', 'Globos color Multicolor. Son los mejores globos para tus fiestas.', '730.79', 25, 'Multicolor', 'multicolor-standard', 100),
(10, 'Naranja', 'Standard', 'Globos color Naranja. Son los mejores globos para tus fiestas.', '730.79', 25, 'Cálidos', 'naranja-standard', 100),
(11, 'Negro', 'Standard', 'Globos color Negro. Son los mejores globos para tus fiestas.', '730.79', 25, 'Fríos', 'negro-standard', 100),
(12, 'Rojo', 'Standard', 'Globos color Rojo. Son los mejores globos para tus fiestas.', '730.79', 25, 'Cálidos', 'rojo-standard', 100),
(13, 'Rosa', 'Standard', 'Globos color Rosa. Son los mejores globos para tus fiestas.', '730.79', 25, 'Cálidos', 'rosa-standard', 100),
(14, 'Verde', 'Standard', 'Globos color Verde. Son los mejores globos para tus fiestas.', '730.79', 25, 'Fríos', 'verde-standard', 100),
(15, 'Violeta', 'Standard', 'Globos color Violeta. Son los mejores globos para tus fiestas.', '730.79', 25, 'Fríos', 'violeta-standard', 100),
(16, 'Amarillo', 'Perlado', 'Globos color Amarillo. Son los mejores globos para tus fiestas.', '877.80', 25, 'Cálidos', 'amarillo-perlado', 94),
(17, 'Azul', 'Perlado', 'Globos color Azul. Son los mejores globos para tus fiestas.', '877.80', 25, 'Fríos', 'azul-perlado', 100),
(18, 'Blanco', 'Perlado', 'Globos color Blanco. Son los mejores globos para tus fiestas.', '877.80', 25, 'Fríos', 'blanco-perlado', 98),
(19, 'Bordó', 'Perlado', 'Globos color Bodró. Son los mejores globos para tus fiestas.', '550.00', 25, 'Cálidos', 'bordo-perlado', 100),
(20, 'Celeste', 'Perlado', 'Globos color Celeste. Son los mejores globos para tus fiestas.', '877.80', 25, 'Fríos', 'celeste-perlado', 100),
(21, 'Fucsia', 'Perlado', 'Globos color Fucsia. Son los mejores globos para tus fiestas.', '550.00', 25, 'Fríos', 'fucsia-perlado', 100),
(22, 'Lila', 'Perlado', 'Globos color Lila. Son los mejores globos para tus fiestas.', '877.80', 25, 'Fríos', 'lila-perlado', 100),
(23, 'Multicolor', 'Perlado', 'Globos color Multicolor. Son los mejores globos para tus fiestas.', '877.80', 25, 'Multicolor', 'multicolor-perlado', 100),
(24, 'Naranja', 'Perlado', 'Globos color Naranja. Son los mejores globos para tus fiestas.', '877.80', 25, 'Cálidos', 'naranja-perlado', 100),
(25, 'Negro', 'Perlado', 'Globos color Negro. Son los mejores globos para tus fiestas.', '877.80', 25, 'Fríos', 'negro-perlado', 100),
(26, 'Oro', 'Perlado', 'Globos color Oro. Son los mejores globos para tus fiestas.', '877.80', 25, 'Cálidos', 'oro-perlado', 100),
(27, 'Plata', 'Perlado', 'Globos color Plata. Son los mejores globos para tus fiestas.', '877.80', 25, 'Fríos', 'plata-perlado', 100),
(28, 'Rojo', 'Perlado', 'Globos color Rojo. Son los mejores globos para tus fiestas.', '877.80', 25, 'Cálidos', 'rojo-perlado', 100),
(29, 'Rosa', 'Perlado', 'Globos color Rosa. Son los mejores globos para tus fiestas.', '877.80', 25, 'Cálidos', 'rosa-perlado', 100),
(30, 'Verde', 'Perlado', 'Globos color Verde. Son los mejores globos para tus fiestas.', '877.80', 25, 'Fríos', 'verde-perlado', 100),
(31, 'Violeta', 'Perlado', 'Globos color Violeta. Son los mejores globos para tus fiestas.', '877.80', 25, 'Fríos', 'violeta-perlado', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `direccion`, `nivel`) VALUES
(1, 'Juan', 'Pérez', 'juan@example.com', '7c6a180b36896a0a8c02787eeafb0e4c', 'Calle Principal 123', 1),
(2, 'María', 'Gómez', 'maria@example.com', '7c6a180b36896a0a8c02787eeafb0e4c', 'Avenida Central 456', 1),
(3, 'matiii', 'poletto', 'matias@example.com', '123456', 'corrientes32147', 1),
(4, 'roman', 'riquelme', '', 'e10adc3949ba59abbe56e057f20f883e', '', 1),
(6, 'Martin', 'bataglia', 'martin@example.com', 'e10adc3949ba59abbe56e057f20f883e', 'catamarca 1531', 1),
(7, 'palermo', 'martin', 'asdf', '123456', 'corrientes', 1),
(10, 'Poletto', 'Roberto', 'polettomatias@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 'Corrientes 3147', 1),
(11, 'Administrador', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Corrientes 3147', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carrito_productos` (`producto_id`),
  ADD KEY `fk_carrito_usuarios` (`usuario_id`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
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
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_productos` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_carrito_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
