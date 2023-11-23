-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 23-11-2023 a les 19:17:25
-- Versió del servidor: 10.4.28-MariaDB
-- Versió de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `conforama_restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `categorias`
--

CREATE TABLE `categorias` (
  `CATEGORIA_ID` int(11) NOT NULL,
  `NOMBRE_CATEGORIA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Bolcament de dades per a la taula `categorias`
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
-- Estructura de la taula `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ingrediente_id` int(11) NOT NULL,
  `nombre_ingrediente` varchar(25) NOT NULL,
  `precio_ingrediente` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Bolcament de dades per a la taula `ingredientes`
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
-- Estructura de la taula `modificacion`
--

CREATE TABLE `modificacion` (
  `MODIFICACION_ID` int(4) NOT NULL,
  `INGREDIENTE_ID` int(4) NOT NULL,
  `ACCION` tinyint(1) NOT NULL,
  `CANTIDAD_INGREDIENTE` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `pedidos`
--

CREATE TABLE `pedidos` (
  `PEDIDO_ID` int(4) NOT NULL,
  `USUARIO_ID` int(4) NOT NULL,
  `ESTADO` varchar(25) NOT NULL,
  `HORA_PEDIDO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `ARTICULO_ID` int(4) NOT NULL,
  `PEDIDO_ID` int(4) NOT NULL,
  `PRODUCTO_ID` int(4) NOT NULL,
  `MODIFICACION_ID` int(4) NOT NULL,
  `CANTIDAD` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `productos`
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
-- Bolcament de dades per a la taula `productos`
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
-- Estructura de la taula `productos_ingredientes`
--

CREATE TABLE `productos_ingredientes` (
  `PRODUCTOS_INGREDIENTES_ID` int(4) NOT NULL,
  `PRODUCTO_ID` int(4) NOT NULL,
  `INGREDIENTE_ID` int(4) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Bolcament de dades per a la taula `productos_ingredientes`
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
-- Estructura de la taula `roles`
--

CREATE TABLE `roles` (
  `ROL_ID` int(11) NOT NULL,
  `NOMBRE_ROL` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Bolcament de dades per a la taula `roles`
--

INSERT INTO `roles` (`ROL_ID`, `NOMBRE_ROL`) VALUES
(0, 'Admin'),
(1, 'Desarrollador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(4) NOT NULL,
  `rol_id` int(4) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(75) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(35) NOT NULL,
  `telefono` int(9) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Bolcament de dades per a la taula `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `rol_id`, `nombre_usuario`, `apellido_usuario`, `email`, `password`, `telefono`, `direccion`) VALUES
(2, 0, 'admin', '', 'admin@gmail.com', 'admin1234-', 999999999, ''),
(3, 1, 'Fabian', 'Doizi', 'fabian@gmail.com', 'Abc1234-', 678564432, ''),
(4, 2, 'Cliente', '', 'cliente@gmail.com', 'cliente1234-', 123456789, 'Av. Calle inventada Num.3');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CATEGORIA_ID`);

--
-- Índexs per a la taula `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ingrediente_id`);

--
-- Índexs per a la taula `modificacion`
--
ALTER TABLE `modificacion`
  ADD PRIMARY KEY (`MODIFICACION_ID`);

--
-- Índexs per a la taula `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`PEDIDO_ID`);

--
-- Índexs per a la taula `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`ARTICULO_ID`);

--
-- Índexs per a la taula `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`);

--
-- Índexs per a la taula `productos_ingredientes`
--
ALTER TABLE `productos_ingredientes`
  ADD PRIMARY KEY (`PRODUCTOS_INGREDIENTES_ID`);

--
-- Índexs per a la taula `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROL_ID`);

--
-- Índexs per a la taula `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CATEGORIA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la taula `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `ingrediente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la taula `modificacion`
--
ALTER TABLE `modificacion`
  MODIFY `MODIFICACION_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `PEDIDO_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `ARTICULO_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la taula `productos_ingredientes`
--
ALTER TABLE `productos_ingredientes`
  MODIFY `PRODUCTOS_INGREDIENTES_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `roles`
--
ALTER TABLE `roles`
  MODIFY `ROL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la taula `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
