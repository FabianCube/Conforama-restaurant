-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2023 a las 17:35:46
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
-- Base de datos: `conforama_restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `CATEGORIA_ID` int(11) NOT NULL,
  `NOMBRE_CATEGORIA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`CATEGORIA_ID`, `NOMBRE_CATEGORIA`) VALUES
(0, 'cafes'),
(1, 'bocadillos'),
(2, 'smoothies'),
(3, 'muffins'),
(4, 'batidos'),
(5, 'bonuts');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ingrediente_id` int(11) NOT NULL,
  `nombre_ingrediente` varchar(25) NOT NULL,
  `precio_ingrediente` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`ingrediente_id`, `nombre_ingrediente`, `precio_ingrediente`) VALUES
(1, 'Azúcar blanco', 0.00),
(2, 'Azúcar moreno', 0.00),
(3, 'Miel', 0.30),
(4, 'Hielo', 0.35),
(5, 'Anís', 0.55),
(6, 'Leche de avena', 0.50),
(7, 'Lechuga', 0.00),
(8, 'Tomate', 0.00),
(9, 'Queso', 0.50),
(10, 'Pan integral', 1.95),
(11, 'Pepinillos', 0.00),
(12, 'Menta', 0.00),
(13, 'Nata', 0.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion`
--

CREATE TABLE `modificacion` (
  `MODIFICACION_ID` int(4) NOT NULL,
  `INGREDIENTE_ID` int(4) NOT NULL,
  `ACCION` tinyint(1) NOT NULL,
  `CANTIDAD_INGREDIENTE` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(4) NOT NULL,
  `usuario_id` int(4) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `hora_pedido` datetime NOT NULL,
  `precio_total` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `usuario_id`, `estado`, `hora_pedido`, `precio_total`) VALUES
(29, 15, 'En curso', '2023-12-14 16:59:31', 1.99),
(30, 15, 'En curso', '2023-12-14 17:00:08', 13.96),
(31, 15, 'En curso', '2023-12-18 17:20:43', 7.97),
(32, 15, 'En curso', '2023-12-18 17:28:23', 14.97),
(33, 15, 'En curso', '2023-12-18 17:33:48', 35.82),
(34, 15, 'En curso', '2023-12-18 17:34:26', 13.96);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `articulo_id` int(4) NOT NULL,
  `pedido_id` int(4) NOT NULL,
  `producto_id` int(4) NOT NULL,
  `modificacion_id` int(4) NOT NULL,
  `cantidad` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`articulo_id`, `pedido_id`, `producto_id`, `modificacion_id`, `cantidad`) VALUES
(1, 1, 6, 0, 0),
(2, 1, 6, 0, 0),
(3, 1, 1, 0, 0),
(4, 1, 2, 0, 0),
(5, 1, 1, 0, 0),
(6, 18, 3, 0, 0),
(7, 19, 1, 0, 0),
(8, 20, 1, 0, 0),
(9, 20, 1, 0, 0),
(10, 22, 1, 0, 0),
(11, 22, 2, 0, 0),
(12, 22, 1, 0, 0),
(13, 24, 1, 0, 0),
(14, 24, 1, 0, 0),
(15, 24, 2, 0, 0),
(16, 24, 3, 0, 0),
(17, 24, 4, 0, 0),
(18, 27, 1, 0, 0),
(19, 27, 2, 0, 0),
(20, 24, 1, 0, 0),
(21, 29, 1, 0, 1),
(22, 30, 1, 0, 1),
(23, 30, 2, 0, 1),
(24, 30, 3, 0, 1),
(25, 31, 6, 0, 1),
(26, 31, 8, 0, 1),
(27, 32, 2, 0, 3),
(28, 33, 6, 0, 18),
(29, 34, 3, 0, 2),
(30, 34, 1, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `nombre_producto` varchar(25) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio_producto` decimal(5,2) NOT NULL,
  `url_img` text NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre_producto`, `descripcion`, `precio_producto`, `url_img`, `categoria_id`) VALUES
(1, 'Cafe solo', 'Café solo.', 1.99, 'coffe-1.png', 0),
(2, 'Sandwich vegetal', 'Un delicioso Sandwich vegetal con lechuga, tomate, motzarela.', 4.99, 'sandwich-1.png', 1),
(3, 'Sandwich de pollo', 'Sandwich de pollo con sobrasada preparado al momento.', 4.99, 'sandwich-2.png', 1),
(4, 'Smoothie de frutos', 'Smootie de frutos del bosque con el toque perfecto de azúcar. ', 3.99, 'smoothie-1.png', 2),
(5, 'Soothie fresa', 'Smoothie de fresa con menta, ¡se sirve bien fresquito!', 3.99, 'smoothie-2.png', 2),
(6, 'Muffin de chocolate', 'Un delicioso Muffin de chocolate perfecto para acompañar tus cafés.', 1.99, 'muffin-1.png', 3),
(7, 'Muffic con pepitas', 'Muffin con pepitas de cocolate.', 1.99, 'muffin-2.png', 3),
(8, 'Milkshake chocolate', 'Milkshake de chocolate con nata.', 3.99, 'milkshake-1.png', 4),
(9, 'Milkshake de cereza', 'Milkshake de cereza.', 3.99, 'milkshake-2.png', 4),
(10, 'Donut chocolate blanco', 'Donut de azúcar cubierto con chocolate blanco.', 1.99, 'donut-1.png', 5),
(11, 'Donut chocolate', 'Donut de azúcar cubierto de chocolate.', 1.99, 'donut-2.png', 5),
(14, 'Café con chocolate', 'Clásico café con chocolate para endulzar tus mañanas.', 2.99, 'coffe-2.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_ingredientes`
--

CREATE TABLE `productos_ingredientes` (
  `PRODUCTOS_INGREDIENTES_ID` int(4) NOT NULL,
  `PRODUCTO_ID` int(4) NOT NULL,
  `INGREDIENTE_ID` int(4) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos_ingredientes`
--

INSERT INTO `productos_ingredientes` (`PRODUCTOS_INGREDIENTES_ID`, `PRODUCTO_ID`, `INGREDIENTE_ID`, `CANTIDAD`) VALUES
(1, 2, 7, 2),
(2, 2, 8, 1),
(3, 2, 9, 2),
(4, 3, 8, 1),
(5, 3, 11, 3),
(6, 3, 9, 2),
(7, 5, 12, 1),
(8, 4, 12, 1),
(9, 8, 13, 1),
(10, 9, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ROL_ID` int(11) NOT NULL,
  `NOMBRE_ROL` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ROL_ID`, `NOMBRE_ROL`) VALUES
(0, 'Admin'),
(1, 'Desarrollador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(4) NOT NULL,
  `rol_id` int(4) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(75) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `rol_id`, `nombre_usuario`, `apellido_usuario`, `email`, `password`, `telefono`, `direccion`) VALUES
(11, 2, 'HASH', 'HASH', 'pruebahash@gmail.com', '$2y$10$B91Zt7HOw2XsK77Fe5HOC.7hdIpwv6iMtU3BbXbvmk5BS./PIGemK', 454, 'ooo'),
(12, 2, 'algo', 'algo', 'algo@gmail.com', '$2y$10$KvU1b/xMTFDZulZD76DN0.owVS7HFvw84U.tGm0lWHuvYRjSLFiOq', 1234, 'algo'),
(13, 0, 'admin', 'admin', 'admin@gmail.com', '$2y$10$EqpFsdK9pu4KHbALHgUcJORKnp8fjaveucRYy/yZmWJlyeEAURYw.', 666666666, 'Direccion del admin'),
(14, 2, 'Juan', 'Algo', 'juan@gmail.com', '$2y$10$qb1PthdjYueIuerHbAm4LOHoYYV5p7VuqsbKYiBcMBaDKSadCj5dG', 123232323, 'Calle de Juan, 1234'),
(15, 2, 'Fabian', 'Doizi', 'fabian@gmail.com', '$2y$10$Bnp7JCHmEMXAajOS5h4NCOiZN5rXzSKxlFJ7mEbt6xg/TneYybv0S', 657890085, 'Av. calle de envio 2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CATEGORIA_ID`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ingrediente_id`);

--
-- Indices de la tabla `modificacion`
--
ALTER TABLE `modificacion`
  ADD PRIMARY KEY (`MODIFICACION_ID`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`articulo_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `productos_ingredientes`
--
ALTER TABLE `productos_ingredientes`
  ADD PRIMARY KEY (`PRODUCTOS_INGREDIENTES_ID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROL_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CATEGORIA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `ingrediente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `modificacion`
--
ALTER TABLE `modificacion`
  MODIFY `MODIFICACION_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `articulo_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos_ingredientes`
--
ALTER TABLE `productos_ingredientes`
  MODIFY `PRODUCTOS_INGREDIENTES_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ROL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
