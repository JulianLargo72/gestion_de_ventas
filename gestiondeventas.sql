-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 06:58:21
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
-- Base de datos: `gestiondeventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `contrasena`, `direccion`) VALUES
(2, 'Jessica', 'Avendaño', 'jessica123', '456 La florida'),
(3, 'Manuel', 'Arias', 'manuel123', '789 Chipre'),
(4, 'Esteban', 'Valencia', 'esteban123', '576 Malabar'),
(5, 'Ricardo', 'Lopez', 'ricardo123', '451 Minitas'),
(6, 'Jose', 'Perez', 'jose123', '921 Milan'),
(7, 'Marco', 'Guarin', 'marco123', '389 Colinas'),
(8, 'Juan ', 'Marin', 'juan123', '587 Milan'),
(9, 'Santiago', 'Ocampo', 'santiago123', '649 San Sebatian'),
(10, 'Valentina', 'Franco', 'valentina123', '100 Carmen'),
(11, 'David', 'Castaño', 'david123', '245 Minitas'),
(12, 'Julian', 'Largo', 'julian123', '632 Malabar'),
(13, 'Sally ', 'Largo Betancur ', 'sara12345', 'Cervantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `Precio`, `Stock`, `imagen`) VALUES
(2, 'Choclitos', 2500, 30, 'img/choclitos.png'),
(3, 'Doritos', 3000, 20, 'img/doritos.png'),
(4, 'Arroz', 3000, 20, 'img/arroz.png'),
(5, 'Panela', 6000, 20, 'img/panela.png'),
(6, 'Mantequilla', 3500, 80, 'img/mantequilla.png'),
(7, 'Sal', 3500, 50, 'img/sal.png'),
(8, 'Manteca', 3500, 66, 'img/manteca.png'),
(9, 'Coca Cola', 4000, 17, 'img/cocacola.png'),
(10, 'Pepsi', 4000, 20, 'img/pepsi.png'),
(11, 'Fanta', 2000, 20, 'img/fanta.png'),
(12, 'Gelatina', 2000, 20, 'img/gelatina.png'),
(13, 'Lentejas', 4000, 24, 'img/lentejas.png'),
(14, 'Frijoles', 5000, 110, 'img/frijoles.png'),
(15, 'Tomate', 1000, 20, 'img/tomate.png'),
(16, 'Chocolatina', 1500, 44, 'img/chocolatina.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `clienteid` int(11) DEFAULT NULL,
  `productoid` int(11) DEFAULT NULL,
  `fechaventa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `clienteid`, `productoid`, `fechaventa`) VALUES
(59, 2, 2, '2023-05-02'),
(60, 3, 3, '2023-05-06'),
(61, 4, 4, '2023-05-03'),
(62, 5, 5, '2023-05-12'),
(63, 6, 6, '2023-05-07'),
(64, 7, 7, '2023-05-03'),
(65, 8, 8, '2023-05-27'),
(66, 9, 9, '2023-05-20'),
(67, 10, 10, '2023-05-10'),
(69, 2, 12, '2023-05-27'),
(70, 3, 13, '2023-05-13'),
(71, 4, 14, '2023-05-26'),
(72, 5, 15, '2023-05-14'),
(74, 7, 2, '2023-05-19'),
(75, 8, 4, '2023-05-19'),
(76, 9, 5, '2023-05-14'),
(77, 10, 6, '2023-05-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clienteid` (`clienteid`),
  ADD KEY `productoid` (`productoid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`clienteid`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`productoid`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
