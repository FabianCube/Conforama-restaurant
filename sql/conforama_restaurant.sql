-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2024 a las 17:44:18
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
  `modificacion_id` int(4) NOT NULL,
  `ingrediente_id` int(4) NOT NULL,
  `accion` tinyint(1) NOT NULL,
  `cantidad_ingrediente` int(4) NOT NULL,
  `precio_suplemento` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `modificacion`
--

INSERT INTO `modificacion` (`modificacion_id`, `ingrediente_id`, `accion`, `cantidad_ingrediente`, `precio_suplemento`) VALUES
(1, 5, 1, 1, 1.00),
(2, 5, 1, 1, 0.55),
(3, 5, 1, 1, 0.55),
(4, 5, 1, 3, 0.55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `opinion_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `opinion` varchar(999) NOT NULL,
  `puntuacion` int(1) NOT NULL,
  `fecha_opinion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`opinion_id`, `usuario_id`, `titulo`, `opinion`, `puntuacion`, `fecha_opinion`) VALUES
(1, 15, 'Me ha gustado', 'Mu wapo mucha grasia', 5, '2024-01-09'),
(2, 14, 'Bastante bien', 'La verdad es que bla bla bla', 4, '2024-01-18'),
(3, 15, 'NO RECOMIENDO!!', 'Es un timo porque dasdalsd y sajndjasda asique no caigáis en el timo...', 1, '2024-01-22'),
(4, 15, 'PRUEBA RESEÑA', 'Esto es una prueba snskndasndlansdlansldnalksndlkasndlkanslkdnas', 3, '0000-00-00'),
(5, 15, 'PRUEBA 2', 'Pruebasdjkansd ad ams dma smd asmd asmd as', 2, '0000-00-00'),
(6, 15, 'PRUEBA 3', 'Esto es una priebasdakjsnda sdknas dkas', 4, '0000-00-00'),
(10, 12, 'Soy otro user', 'es ersdfknsnflasnf ljas fa sdn as', 4, '2024-01-24'),
(31, 15, 'HOLA', 'sdkmalsdml aksmndlka skldmnalskd as', 3, '2024-02-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(4) NOT NULL,
  `usuario_id` int(4) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `hora_pedido` datetime NOT NULL,
  `precio_total` decimal(5,2) NOT NULL,
  `propina` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `usuario_id`, `estado`, `hora_pedido`, `precio_total`, `propina`) VALUES
(29, 15, 'En curso', '2023-12-14 16:59:31', 1.99, 0.00),
(30, 15, 'En curso', '2023-12-14 17:00:08', 13.96, 0.00),
(31, 15, 'En curso', '2023-12-18 17:20:43', 7.97, 0.00),
(32, 15, 'En curso', '2023-12-18 17:28:23', 14.97, 0.00),
(33, 15, 'En curso', '2023-12-18 17:33:48', 35.82, 0.00),
(34, 15, 'En curso', '2023-12-18 17:34:26', 13.96, 0.00),
(35, 15, 'En curso', '2024-01-06 19:35:27', 6.98, 0.00),
(36, 15, 'En curso', '2024-01-07 16:21:55', 3.98, 0.00),
(37, 15, 'En curso', '2024-01-07 18:03:26', 1.99, 0.00),
(38, 15, 'En curso', '2024-01-08 17:32:47', 1.99, 0.00),
(39, 15, 'En curso', '2024-01-09 17:55:32', 6.98, 0.00),
(40, 15, 'En curso', '2024-02-05 16:18:04', 6.98, 0.00),
(41, 15, 'En curso', '2024-02-12 19:22:26', 0.00, 0.00),
(42, 15, 'En curso', '2024-02-12 20:07:27', 1.99, 0.00),
(43, 15, 'En curso', '2024-02-12 20:08:20', 1.99, 0.00),
(44, 15, 'En curso', '2024-02-12 20:24:01', 9.98, 0.00),
(45, 15, 'En curso', '2024-02-12 20:26:21', 9.98, 0.00),
(46, 15, 'En curso', '2024-02-12 20:28:35', 9.98, 0.00),
(47, 15, 'En curso', '2024-02-12 20:30:41', 0.00, 0.00),
(48, 15, 'En curso', '2024-02-15 16:32:07', 1.99, 0.00),
(49, 15, 'En curso', '2024-02-15 16:34:47', 1.99, 0.00),
(50, 15, 'En curso', '2024-02-15 16:35:36', 1.99, 0.00),
(51, 15, 'En curso', '2024-02-15 16:37:11', 4.99, 0.00),
(52, 15, 'En curso', '2024-02-15 16:38:07', 4.99, 0.00),
(53, 15, 'En curso', '2024-02-15 16:39:35', 1.99, 0.00),
(54, 15, 'En curso', '2024-02-15 16:40:41', 4.99, 0.00),
(55, 15, 'En curso', '2024-02-15 16:46:10', 1.99, 0.00),
(56, 15, 'En curso', '2024-02-15 16:47:31', 4.99, 0.00),
(57, 15, 'En curso', '2024-02-15 16:48:46', 0.00, 0.00),
(58, 15, 'En curso', '2024-02-15 16:52:14', 0.00, 0.00),
(59, 15, 'En curso', '2024-02-15 16:53:18', 0.00, 0.00),
(60, 15, 'En curso', '2024-02-15 16:54:50', 0.00, 0.00),
(61, 15, 'En curso', '2024-02-15 16:55:06', 0.00, 0.00),
(62, 15, 'En curso', '2024-02-15 17:02:17', 0.00, 0.00),
(63, 15, 'En curso', '2024-02-15 17:06:16', 0.00, 0.00),
(64, 15, 'En curso', '2024-02-15 17:13:53', 0.00, 0.00),
(65, 15, 'En curso', '2024-02-15 17:14:38', 0.00, 0.00),
(66, 15, 'En curso', '2024-02-15 17:18:51', 4.99, 0.00),
(67, 15, 'En curso', '2024-02-15 19:22:40', 3.98, 0.00),
(68, 15, 'En curso', '2024-02-15 19:47:14', 4.99, 0.00),
(69, 15, 'En curso', '2024-02-15 19:51:48', 4.99, 0.00),
(70, 15, 'En curso', '2024-02-15 20:03:30', 4.99, 0.00),
(71, 15, 'En curso', '2024-02-15 20:05:33', 4.99, 0.00),
(72, 15, 'En curso', '2024-02-15 20:11:21', 1.99, 0.00),
(73, 15, 'En curso', '2024-02-15 20:14:57', 1.99, 0.00),
(74, 15, 'En curso', '2024-02-15 20:16:54', 1.99, 0.00),
(75, 15, 'En curso', '2024-02-15 20:18:55', 1.99, 0.00),
(76, 15, 'En curso', '2024-02-15 20:21:35', 1.99, 0.00),
(77, 15, 'En curso', '2024-02-15 20:23:58', 1.99, 0.00),
(78, 15, 'En curso', '2024-02-15 20:25:27', 1.99, 0.00),
(79, 15, 'En curso', '2024-02-15 20:32:43', 4.99, 0.00),
(80, 15, 'En curso', '2024-02-15 20:44:26', 6.98, 0.00),
(81, 15, 'En curso', '2024-02-15 20:46:18', 1.99, 0.00),
(82, 15, 'En curso', '2024-02-15 20:52:03', 1.99, 0.00),
(83, 15, 'En curso', '2024-02-15 20:55:01', 4.99, 0.00),
(84, 15, 'En curso', '2024-02-15 20:56:01', 4.99, 0.00),
(85, 15, 'En curso', '2024-02-15 20:56:09', 0.00, 0.00),
(86, 15, 'En curso', '2024-02-15 21:03:25', 4.99, 0.00),
(87, 15, 'En curso', '2024-02-15 21:07:23', 3.99, 0.00),
(88, 15, 'En curso', '2024-02-15 21:14:13', 4.99, 0.00),
(89, 15, 'En curso', '2024-02-15 21:18:12', 4.99, 0.00),
(90, 15, 'En curso', '2024-02-15 21:27:58', 1.99, 0.00),
(91, 15, 'En curso', '2024-02-15 21:35:16', 3.49, 0.00),
(92, 15, 'En curso', '2024-02-15 21:37:00', 9.98, 0.00),
(93, 15, 'En curso', '2024-02-15 21:37:50', 4.98, 0.00),
(94, 15, 'En curso', '2024-02-15 21:49:48', 9.98, 0.00),
(95, 15, 'En curso', '2024-02-15 21:53:08', 4.99, 0.00),
(96, 15, 'En curso', '2024-02-16 17:08:35', 4.99, 0.00),
(97, 15, 'En curso', '2024-02-16 17:13:05', 1.99, 0.00),
(98, 15, 'En curso', '2024-02-16 17:18:48', 4.99, 0.00),
(99, 15, 'En curso', '2024-02-16 17:22:46', 4.99, 1.50),
(100, 15, 'En curso', '2024-02-16 17:24:57', 4.99, 1.50),
(101, 15, 'En curso', '2024-02-16 17:29:49', 4.99, 1.50),
(102, 15, 'En curso', '2024-02-16 17:34:13', 6.49, 1.50),
(103, 15, 'En curso', '2024-02-16 17:39:15', 3.14, 0.15);

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
(30, 34, 1, 0, 2),
(31, 35, 3, 0, 1),
(32, 35, 1, 0, 1),
(33, 36, 1, 0, 2),
(34, 37, 1, 0, 1),
(35, 38, 1, 0, 1),
(36, 39, 2, 0, 1),
(37, 39, 1, 0, 1),
(38, 40, 2, 0, 1),
(39, 40, 1, 0, 1),
(40, 42, 1, 0, 1),
(41, 43, 1, 0, 1),
(42, 44, 2, 0, 2),
(43, 45, 2, 0, 2),
(44, 46, 2, 0, 2),
(45, 48, 1, 0, 1),
(46, 49, 1, 0, 1),
(47, 50, 1, 0, 1),
(48, 51, 2, 0, 1),
(49, 52, 2, 0, 1),
(50, 53, 6, 0, 1),
(51, 54, 3, 0, 1),
(52, 55, 6, 0, 1),
(53, 56, 2, 0, 1),
(54, 66, 2, 0, 1),
(55, 67, 1, 0, 2),
(56, 68, 2, 0, 1),
(57, 69, 2, 0, 1),
(58, 70, 2, 0, 1),
(59, 71, 2, 0, 1),
(60, 72, 1, 0, 1),
(61, 73, 1, 0, 1),
(62, 74, 10, 0, 1),
(63, 75, 1, 0, 1),
(64, 76, 6, 0, 1),
(65, 77, 6, 0, 1),
(66, 78, 7, 0, 1),
(67, 79, 2, 0, 1),
(68, 80, 7, 0, 1),
(69, 80, 2, 0, 1),
(70, 81, 6, 0, 1),
(71, 82, 7, 0, 1),
(72, 83, 2, 0, 1),
(73, 84, 2, 0, 1),
(74, 86, 2, 0, 1),
(75, 87, 9, 0, 1),
(76, 88, 2, 0, 1),
(77, 89, 2, 0, 1),
(78, 90, 1, 0, 1),
(79, 91, 2, 0, 1),
(80, 92, 2, 0, 1),
(81, 92, 3, 0, 1),
(82, 93, 6, 0, 1),
(83, 93, 3, 0, 1),
(84, 94, 2, 0, 2),
(85, 95, 2, 0, 1),
(86, 96, 2, 0, 1),
(87, 97, 11, 0, 1),
(88, 98, 2, 0, 1),
(89, 99, 2, 0, 1),
(90, 100, 2, 0, 1),
(91, 101, 2, 0, 1),
(92, 102, 2, 0, 1),
(93, 103, 2, 0, 1);

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
(1, 'Cafe solo', 'Café solo.nmnb', 1.99, 'coffe-1.png', 0),
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
(14, 'Café con chocolate', 'Clásico café con chocolate para endulzar tus mañanas.', 2.99, 'coffe-2.png', 0),
(15, 'cafe2', 'cafe2', 2.99, 'cafe3.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_ingredientes`
--

CREATE TABLE `productos_ingredientes` (
  `productos_ingredientes_id` int(4) NOT NULL,
  `producto_id` int(4) NOT NULL,
  `ingrediente_id` int(4) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos_ingredientes`
--

INSERT INTO `productos_ingredientes` (`productos_ingredientes_id`, `producto_id`, `ingrediente_id`, `cantidad`) VALUES
(1, 2, 7, 2),
(2, 2, 8, 1),
(3, 2, 9, 2),
(4, 3, 8, 1),
(5, 3, 11, 3),
(6, 3, 9, 2),
(7, 5, 12, 1),
(8, 4, 12, 1),
(9, 8, 13, 1),
(10, 9, 13, 1),
(11, 1, 1, 0),
(12, 1, 2, 0),
(13, 1, 3, 0),
(14, 1, 5, 0);

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
  `direccion` varchar(50) NOT NULL,
  `puntos` int(11) NOT NULL,
  `nivel_acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `rol_id`, `nombre_usuario`, `apellido_usuario`, `email`, `password`, `telefono`, `direccion`, `puntos`, `nivel_acceso`) VALUES
(12, 2, 'algo', 'algo', 'algo@gmail.com', '$2y$10$KvU1b/xMTFDZulZD76DN0.owVS7HFvw84U.tGm0lWHuvYRjSLFiOq', 1234, 'algo', 0, 0),
(13, 0, 'admin', 'admin', 'admin@gmail.com', '$2y$10$EqpFsdK9pu4KHbALHgUcJORKnp8fjaveucRYy/yZmWJlyeEAURYw.', 666666666, 'Direccion del admin', 0, 0),
(14, 2, 'Juan', 'Algo', 'juan@gmail.com', '$2y$10$qb1PthdjYueIuerHbAm4LOHoYYV5p7VuqsbKYiBcMBaDKSadCj5dG', 123232323, 'Calle de Juan, 1234', 0, 0),
(15, 2, 'Fabian', 'Doizi Bonilla', 'fabian@gmail.com', '$2y$10$Bnp7JCHmEMXAajOS5h4NCOiZN5rXzSKxlFJ7mEbt6xg/TneYybv0S', 657890085, 'Av. calle de envio 2', 3525, 0);

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
  ADD PRIMARY KEY (`modificacion_id`);

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`opinion_id`);

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
  ADD PRIMARY KEY (`productos_ingredientes_id`);

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
  MODIFY `modificacion_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `opinion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `articulo_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos_ingredientes`
--
ALTER TABLE `productos_ingredientes`
  MODIFY `productos_ingredientes_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
