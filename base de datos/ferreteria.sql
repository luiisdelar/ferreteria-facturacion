-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2020 a las 21:15:20
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ferreteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `cedula`, `direccion`) VALUES
(1, 'Luis ', 'Ortega', '12345678', 'la avenida'),
(8, 'cristina', 'lopex', '1212121', 'lobatera'),
(10, 'pedro', 'carrasco', '222222', 'tucupita'),
(11, 'luisa', 'ortega', '4332323', 'san cristobal'),
(12, 'victor', 'perez', '2912732', 'la ortiza'),
(13, 'lucia', 'oquendo', '2121234', 'lagunita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id`, `id_factura`, `id_producto`, `cantidad`) VALUES
(1, 1, 14, 2),
(2, 1, 10, 2),
(3, 1, 27, 3),
(4, 2, 9, 1),
(5, 2, 14, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `id_users`, `id_cliente`) VALUES
(1, 3, 1),
(2, 3, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidad_vendidos` int(11) NOT NULL,
  `precio` double NOT NULL,
  `precio_venta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `cantidad`, `cantidad_vendidos`, `precio`, `precio_venta`) VALUES
(2, 'aceite a granel', '1235', 3, 2, 100, 130),
(3, 'Liga para frenos', '1236', 6, 0, 100, 130),
(4, 'Hidraulico', '1237', 30, 0, 100, 130),
(5, 'valulina', '1238', 28, 0, 100, 130),
(6, 'aceite 2 tiempos', '1239', 33, 0, 100, 130),
(7, 'tapa de radiador', '1240', 5, 0, 100, 130),
(8, 'filtro universal', '1241', 1, 0, 100, 130),
(9, 'aceite 20w50', '1242', 3, 0, 100, 130),
(10, 'fucibles', '1243', 44, 0, 100, 130),
(11, 'aceite 4 tiempos', '1244', 21, 0, 100, 130),
(12, 'bombillos', '1245', 10, 0, 100, 130),
(13, 'Acido de bateria', '1246', 10, 0, 100, 130),
(14, 'Bujias', '1247', 45, 0, 100, 130),
(15, 'grasa', '1248', 10, 0, 100, 130),
(16, 'silicon', '1249', 23, 0, 100, 130),
(17, 'ducha grafitada', '1250', 1, 0, 100, 130),
(18, 'guaya de maro', '1251', 11, 0, 100, 130),
(19, 'abrazadera', '1252', 94, 0, 100, 130),
(20, 'lubri loy (adictivo)', '1253', 32, 0, 100, 130),
(21, 'terminales', '1254', 21, 0, 100, 130),
(22, 'conectores 25w60', '1255', 12, 0, 100, 130),
(24, 'formula mecanica', '1257', 10, 0, 100, 130),
(25, 'mangera', '1258', 3, 0, 100, 130),
(26, 'bornes para bateria', '1259', 2, 0, 100, 130),
(27, 'shampu limpia para brisas', '1260', 4, 0, 100, 130),
(28, 'sq', '1261', 3, 0, 0, 0),
(29, 'estapa', '1262', 11, 0, 0, 0),
(30, 'filtros de aceite', '1263', 4, 0, 0, 0),
(31, 'arrandelas', '1264', 7, 0, 0, 0),
(32, 'tornillos', '1265', 43, 0, 0, 0),
(33, 'grafito', '1266', 8, 0, 0, 0),
(34, 'carreras', '1267', 7, 0, 0, 0),
(35, 'formula marina', '1268', 6, 0, 0, 0),
(36, 'limpia caucho', '1269', 32, 0, 0, 0),
(37, 'suncho', '1270', 10, 0, 0, 0),
(38, 'tijera jardinera', '1212', 30, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `rol`, `password`, `mail`) VALUES
(1, 'admin', 'administrador del software', 'admin', 'admin', 'admin@admin'),
(2, 'luis', 'Luis De La Cruz', 'Colaborador', '1234', 'dsad@dasd.com'),
(3, 'maria', 'maria rojas', 'Empleado', 'maria', 'm@m.com'),
(4, 'yesica', 'yesica romero', 'Cliente', 'yesica', 'yes@te.com'),
(5, 'jose', 'jose lopes', 'Cliente', 'jose', 'jo@jo.com'),
(6, 'liria', 'liria sdsdsad', 'Cliente', 'liria', 'li@lo.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_users` (`id_users`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
