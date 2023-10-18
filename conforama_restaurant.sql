-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 18-10-2023 a les 18:44:47
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

-- --------------------------------------------------------

--
-- Estructura de la taula `ingredientes`
--

CREATE TABLE `ingredientes` (
  `INGREDIENTE_ID` int(11) NOT NULL,
  `NOMBRE_INGREDIENTE` varchar(25) NOT NULL,
  `PRECIO_INGREDIENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

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
  `PRODUCTO_ID` int(11) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(25) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `PRECIO_PRODUCTO` int(11) NOT NULL,
  `CATEGORIA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Bolcament de dades per a la taula `productos`
--

INSERT INTO `productos` (`PRODUCTO_ID`, `NOMBRE_PRODUCTO`, `DESCRIPCION`, `PRECIO_PRODUCTO`, `CATEGORIA_ID`) VALUES
(1, 'Café con leche', 'cafe con leche blabla', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `productos_ingredientes`
--

CREATE TABLE `productos_ingredientes` (
  `PRODUCTOS_INGREDIENTES_ID` int(4) NOT NULL,
  `PRODUCTO_ID` int(4) NOT NULL,
  `INGREDIENTE_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `roles`
--

CREATE TABLE `roles` (
  `ROL_ID` int(11) NOT NULL,
  `NOMBRE_ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `usuarios`
--

CREATE TABLE `usuarios` (
  `USUARIO_ID` int(4) NOT NULL,
  `ROL_ID` int(4) NOT NULL,
  `NOMBRE_USUARIO` varchar(50) NOT NULL,
  `APELLIDO_USUARIO` varchar(75) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `TELEFONO` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

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
  ADD PRIMARY KEY (`INGREDIENTE_ID`);

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
  ADD PRIMARY KEY (`PRODUCTO_ID`);

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
  ADD PRIMARY KEY (`USUARIO_ID`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CATEGORIA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `INGREDIENTE_ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `PRODUCTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la taula `productos_ingredientes`
--
ALTER TABLE `productos_ingredientes`
  MODIFY `PRODUCTOS_INGREDIENTES_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `roles`
--
ALTER TABLE `roles`
  MODIFY `ROL_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUARIO_ID` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
