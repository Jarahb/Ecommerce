-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2021 a las 11:09:47
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `email`, `pass`) VALUES
(23, 'Jara', 'jaruky22@hotmail.com', '$2y$10$7hv5WJ3Gz091j71zLfS3zuaJrggobBapN4ZgGhH6BVXfnh6h50LMm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idProd` int(5) NOT NULL,
  `idVenta` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existencias`
--

CREATE TABLE `existencias` (
  `id` int(11) NOT NULL,
  `grupocolores_id` int(11) DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL,
  `talla` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `existencias`
--

INSERT INTO `existencias` (`id`, `grupocolores_id`, `existencias`, `talla`) VALUES
(2, 16, 5, 'xl'),
(5, 18, 4, 'm'),
(6, 19, 5, 'xl'),
(7, 19, 3, 'xs'),
(8, 20, 3, 'm'),
(9, 21, 7, '42'),
(10, 22, 4, 's'),
(11, 22, 5, 'xs'),
(12, 23, 8, 'm'),
(13, 24, 15, 'xxxl'),
(15, 26, 10, 's'),
(16, 26, 20, 'm'),
(17, 26, 15, 'L'),
(18, 27, 22, 'L'),
(19, 27, 15, 'm'),
(20, 27, 3, 's'),
(21, 28, 8, 'xl'),
(22, 28, 5, 'm'),
(23, 28, 6, 'l'),
(24, 29, 10, '38'),
(25, 29, 15, '46'),
(26, 29, 8, '44'),
(27, 29, 3, '43'),
(28, 30, 4, '40'),
(29, 30, 7, '41'),
(30, 30, 12, '36'),
(31, 31, 9, '44'),
(32, 31, 1, '47'),
(33, 31, 3, '40'),
(34, 31, 7, '39'),
(35, 32, 2, '48'),
(36, 32, 7, '42'),
(37, 33, 11, 'S'),
(38, 33, 28, 'M'),
(39, 33, 11, 'L'),
(40, 34, 8, 'S'),
(41, 34, 17, 'M'),
(42, 34, 8, 'L'),
(43, 35, 22, 'XS'),
(44, 35, 16, 'S'),
(45, 35, 16, 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `filesize` int(11) NOT NULL,
  `web_path` varchar(250) NOT NULL,
  `system_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `filename`, `filesize`, `web_path`, `system_path`) VALUES
(5, 'greendress.jpg', 139767, '/Ecommerce/upload/5.jpg', 'C:/xampp/htdocs/Ecommerce/upload/5.jpg'),
(6, 'reddress.jpg', 110525, '/Ecommerce/upload/6.jpg', 'C:/xampp/htdocs/Ecommerce/upload/6.jpg'),
(7, 'vestido flores.jpg', 101868, '/Ecommerce/upload/7.jpg', 'C:/xampp/htdocs/Ecommerce/upload/7.jpg'),
(8, 'IMG_2508.PNG', 302312, '/Ecommerce/upload/8.PNG', 'C:/xampp/htdocs/Ecommerce/upload/8.PNG'),
(9, 'IMG_2509.jpg', 148386, '/Ecommerce/upload/9.jpg', 'C:/xampp/htdocs/Ecommerce/upload/9.jpg'),
(10, 'IMG_2508.PNG', 302312, '/Ecommerce/upload/10.PNG', 'C:/xampp/htdocs/Ecommerce/upload/10.PNG'),
(11, 'chaqueta03.jpg', 748008, '/Ecommerce/upload/11.jpg', 'C:/xampp/htdocs/Ecommerce/upload/11.jpg'),
(12, 'IMG_2508.PNG', 302312, '/Ecommerce/upload/12.PNG', 'C:/xampp/htdocs/Ecommerce/upload/12.PNG'),
(13, 'IMG_2508.PNG', 302312, '/Ecommerce/upload/13.PNG', 'C:/xampp/htdocs/Ecommerce/upload/13.PNG'),
(14, 'IMG_2508.PNG', 302312, '/Ecommerce/upload/14.PNG', 'C:/xampp/htdocs/Ecommerce/upload/14.PNG'),
(15, 'IMG_2509.jpg', 148386, '/Ecommerce/upload/15.jpg', 'C:/xampp/htdocs/Ecommerce/upload/15.jpg'),
(16, 'IMG_2508.PNG', 302312, '/Ecommerce/upload/16.PNG', 'C:/xampp/htdocs/Ecommerce/upload/16.PNG'),
(17, 'vestido_rosa_floral.png', 136558, '/Ecommerce/upload/17.png', 'C:/xampp/htdocs/Ecommerce/upload/17.png'),
(18, 'top_blanco_camisero.png', 137330, '/Ecommerce/upload/18.png', 'C:/xampp/htdocs/Ecommerce/upload/18.png'),
(19, 'mini_dress.png', 162114, '/Ecommerce/upload/19.png', 'C:/xampp/htdocs/Ecommerce/upload/19.png'),
(20, 'vestido_halter_flores_ochentero.png', 141510, '/Ecommerce/upload/20.png', 'C:/xampp/htdocs/Ecommerce/upload/20.png'),
(21, 'vestido citricos .jpg', 14631, '/Ecommerce/upload/21.jpg', 'C:/xampp/htdocs/Ecommerce/upload/21.jpg'),
(22, 'vestido citricos2.png', 162404, '/Ecommerce/upload/22.png', 'C:/xampp/htdocs/Ecommerce/upload/22.png'),
(23, 'vestido blanco midi dress.png', 110362, '/Ecommerce/upload/23.png', 'C:/xampp/htdocs/Ecommerce/upload/23.png'),
(24, 'vestido blanco midi dress_2.png', 87820, '/Ecommerce/upload/24.png', 'C:/xampp/htdocs/Ecommerce/upload/24.png'),
(25, 'vestido_camisero.png', 1517476, '/Ecommerce/upload/25.png', 'C:/xampp/htdocs/Ecommerce/upload/25.png'),
(26, 'mini_dress_chicle_claudia.png', 1857232, '/Ecommerce/upload/26.png', 'C:/xampp/htdocs/Ecommerce/upload/26.png'),
(27, 'mini_dress_chicle_claudia_2.png', 1697834, '/Ecommerce/upload/27.png', 'C:/xampp/htdocs/Ecommerce/upload/27.png'),
(28, 'vestido_blazer_blanco_2.jpg', 304848, '/Ecommerce/upload/28.jpg', 'C:/xampp/htdocs/Ecommerce/upload/28.jpg'),
(29, 'vestido blazer blancox.jpg', 217432, '/Ecommerce/upload/29.jpg', 'C:/xampp/htdocs/Ecommerce/upload/29.jpg'),
(30, 'vestido_blazer_blanco_2.jpg', 304848, '/Ecommerce/upload/30.jpg', 'C:/xampp/htdocs/Ecommerce/upload/30.jpg'),
(31, 'Vestido mini blanco tachuelas 2.png', 1566602, '/Ecommerce/upload/31.png', 'C:/xampp/htdocs/Ecommerce/upload/31.png'),
(32, 'Vestido mini blanco tachuelas 2.png', 1566602, '/Ecommerce/upload/32.png', 'C:/xampp/htdocs/Ecommerce/upload/32.png'),
(33, 'Vestido topitos manga asimetrica 2.png', 1459080, '/Ecommerce/upload/33.png', 'C:/xampp/htdocs/Ecommerce/upload/33.png'),
(34, 'vestido topitos manga asimetrica.jpg', 184785, '/Ecommerce/upload/34.jpg', 'C:/xampp/htdocs/Ecommerce/upload/34.jpg'),
(35, 'Vestido topitos manga asimetrica 2.png', 1459080, '/Ecommerce/upload/35.png', 'C:/xampp/htdocs/Ecommerce/upload/35.png'),
(36, 'Mono Formentera 2.png', 429970, '/Ecommerce/upload/36.png', 'C:/xampp/htdocs/Ecommerce/upload/36.png'),
(37, 'Mono Formentera 2.png', 429970, '/Ecommerce/upload/37.png', 'C:/xampp/htdocs/Ecommerce/upload/37.png'),
(38, 'Mono Formentera 3.jpg', 303939, '/Ecommerce/upload/38.jpg', 'C:/xampp/htdocs/Ecommerce/upload/38.jpg'),
(39, 'sudadera seven wonders 2.jpg', 228558, '/Ecommerce/upload/39.jpg', 'C:/xampp/htdocs/Ecommerce/upload/39.jpg'),
(40, 'sudadera seven wonders.jpg', 222709, '/Ecommerce/upload/40.jpg', 'C:/xampp/htdocs/Ecommerce/upload/40.jpg'),
(41, 'datascience.jpg', 407945, '/Ecommerce/upload/41.jpg', 'C:/xampp/htdocs/Ecommerce/upload/41.jpg'),
(42, 'datascience.jpg', 407945, '/Ecommerce/upload/42.jpg', 'C:/xampp/htdocs/Ecommerce/upload/42.jpg'),
(43, 'datascience.jpg', 407945, '/Ecommerce/upload/43.jpg', 'C:/xampp/htdocs/Ecommerce/upload/43.jpg'),
(44, 'vestido4.jpg', 60592, '/Ecommerce/upload/44.jpg', 'C:/xampp/htdocs/Ecommerce/upload/44.jpg'),
(45, 'vestido3.jpg', 29836, '/Ecommerce/upload/45.jpg', 'C:/xampp/htdocs/Ecommerce/upload/45.jpg'),
(46, 'vestido2.jpg', 15001, '/Ecommerce/upload/46.jpg', 'C:/xampp/htdocs/Ecommerce/upload/46.jpg'),
(47, 'vestido1.jpg', 35570, '/Ecommerce/upload/47.jpg', 'C:/xampp/htdocs/Ecommerce/upload/47.jpg'),
(48, 'fujirojo.jpg', 54206, '/Ecommerce/upload/48.jpg', 'C:/xampp/htdocs/Ecommerce/upload/48.jpg'),
(49, 'fujiazul.jpg', 219609, '/Ecommerce/upload/49.jpg', 'C:/xampp/htdocs/Ecommerce/upload/49.jpg'),
(50, 'fujiverde.jpg', 112341, '/Ecommerce/upload/50.jpg', 'C:/xampp/htdocs/Ecommerce/upload/50.jpg'),
(51, 'fujirojo.jpg', 54206, '/Ecommerce/upload/51.jpg', 'C:/xampp/htdocs/Ecommerce/upload/51.jpg'),
(52, 'fujiazul.jpg', 219609, '/Ecommerce/upload/52.jpg', 'C:/xampp/htdocs/Ecommerce/upload/52.jpg'),
(53, 'fujiverde.jpg', 112341, '/Ecommerce/upload/53.jpg', 'C:/xampp/htdocs/Ecommerce/upload/53.jpg'),
(54, 'fujinegro.jpg', 79527, '/Ecommerce/upload/54.jpg', 'C:/xampp/htdocs/Ecommerce/upload/54.jpg'),
(55, 'crop top encaje.webp', 5158, '/Ecommerce/upload/55.webp', 'C:/xampp/htdocs/Ecommerce/upload/55.webp'),
(56, 'crop top encaje 2.webp', 4598, '/Ecommerce/upload/56.webp', 'C:/xampp/htdocs/Ecommerce/upload/56.webp'),
(57, 'crop top encaje backt.webp', 3602, '/Ecommerce/upload/57.webp', 'C:/xampp/htdocs/Ecommerce/upload/57.webp'),
(58, 'crop top encaje tela.webp', 1932, '/Ecommerce/upload/58.webp', 'C:/xampp/htdocs/Ecommerce/upload/58.webp'),
(59, 'corpiño gris 2.jpg', 10828, '/Ecommerce/upload/59.jpg', 'C:/xampp/htdocs/Ecommerce/upload/59.jpg'),
(60, 'corpiño gris 1.jpg', 13958, '/Ecommerce/upload/60.jpg', 'C:/xampp/htdocs/Ecommerce/upload/60.jpg'),
(61, 'corpiño gris 3t.jpg', 8405, '/Ecommerce/upload/61.jpg', 'C:/xampp/htdocs/Ecommerce/upload/61.jpg'),
(62, 'corpiño gris 4.jpg', 14471, '/Ecommerce/upload/62.jpg', 'C:/xampp/htdocs/Ecommerce/upload/62.jpg'),
(63, 'top multi.jpg', 12446, '/Ecommerce/upload/63.jpg', 'C:/xampp/htdocs/Ecommerce/upload/63.jpg'),
(64, 'top multi 2.jpg', 10390, '/Ecommerce/upload/64.jpg', 'C:/xampp/htdocs/Ecommerce/upload/64.jpg'),
(65, 'top multi 3.jpg', 8698, '/Ecommerce/upload/65.jpg', 'C:/xampp/htdocs/Ecommerce/upload/65.jpg'),
(66, 'top multi 4.jpg', 6597, '/Ecommerce/upload/66.jpg', 'C:/xampp/htdocs/Ecommerce/upload/66.jpg'),
(67, 'top multi.jpg', 12446, '/Ecommerce/upload/67.jpg', 'C:/xampp/htdocs/Ecommerce/upload/67.jpg'),
(68, 'top multi 2.jpg', 10390, '/Ecommerce/upload/68.jpg', 'C:/xampp/htdocs/Ecommerce/upload/68.jpg'),
(69, 'top multi 3.jpg', 8698, '/Ecommerce/upload/69.jpg', 'C:/xampp/htdocs/Ecommerce/upload/69.jpg'),
(70, 'top multi 4.jpg', 6597, '/Ecommerce/upload/70.jpg', 'C:/xampp/htdocs/Ecommerce/upload/70.jpg'),
(71, 'top multi 3.jpg', 8698, '/Ecommerce/upload/71.jpg', 'C:/xampp/htdocs/Ecommerce/upload/71.jpg'),
(72, 'top multi 4.jpg', 6597, '/Ecommerce/upload/72.jpg', 'C:/xampp/htdocs/Ecommerce/upload/72.jpg'),
(73, 'top multi.jpg', 12446, '/Ecommerce/upload/73.jpg', 'C:/xampp/htdocs/Ecommerce/upload/73.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupocolores`
--

CREATE TABLE `grupocolores` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `grupocolores`
--

INSERT INTO `grupocolores` (`id`, `producto_id`, `color`) VALUES
(16, 68, 'negro'),
(18, 70, 'azul'),
(19, 71, 'rojo'),
(20, 72, 'blanco'),
(21, 72, 'amarillo'),
(22, 73, 'verde'),
(23, 73, 'negro'),
(24, 73, 'blanco'),
(26, 75, 'negro'),
(27, 75, 'rojo'),
(28, 75, 'azul'),
(29, 76, 'rojo'),
(30, 76, 'azul'),
(31, 76, 'verde'),
(32, 76, 'negro'),
(33, 77, 'blanco'),
(34, 77, 'gris'),
(35, 78, 'nude');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`) VALUES
(68, 'Mono de esquí', 120, 'mono de esquí nice'),
(70, 'Cami verano', 15.5, 'jejejeje'),
(71, 'Chandal guay', 45, 'pppp'),
(72, 'Prenda test', 20.05, 'prendaste'),
(73, 'Bufanda chachi', 12.43, 'popopopo'),
(75, 'Vestido de prueba', 45.99, 'vestido con el que estoy probando el desarrollo'),
(76, 'Asics Gel Fujitrabucco 7', 120, 'Las deportivas de los verdaderos runners. Siente el máximo confort con sus plantillas de espuma ergonómica.'),
(77, 'Corpiño de encaje', 25, 'Chic femenino. Dale estilo a nuestro corpiño de encaje con tus Levi\'s vintage favoritos o para una noche de chicas con un total look de sandalias de tacón. Este corpiño de encaje presenta todos los detalles que desea en un top;  es elegante y sexy.'),
(78, 'Top multi posición nude', 18.99, 'Envuélvalo, anúlelo, átelo. Este top multi posición puede colocarse y atarse como usted desee.\n-Suave, suave y elástico\n-96% algodón / 4% elastano\n-Lavado a mano en frío / plancha caliente\n-Consulte la imagen de muestra de tela para obtener el color más preciso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_files`
--

CREATE TABLE `productos_files` (
  `producto_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_files`
--

INSERT INTO `productos_files` (`producto_id`, `file_id`) VALUES
(18, 39),
(18, 40),
(74, 43),
(75, 44),
(75, 45),
(75, 46),
(75, 47),
(76, 51),
(76, 52),
(76, 53),
(76, 54),
(77, 55),
(77, 56),
(77, 57),
(77, 58),
(77, 59),
(77, 60),
(77, 61),
(77, 62),
(78, 67),
(78, 68),
(78, 69),
(78, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_groups`
--

CREATE TABLE `productos_groups` (
  `producto_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `poblacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `codigopostal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `pass`, `nombre`, `telefono`, `direccion`, `poblacion`, `provincia`, `codigopostal`) VALUES
('daniel.lozano@gmail.com', '$2y$10$tadX6MN7zRlzpm5AHfizRe9zjFdKSJKwVwsOOU7VEl9.eI.i1qeKu', 'Daniel Lozano', 664443939, 'C Salamanca 1', 'Madrid', 'Madrid', 20010);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `idCliente` int(5) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
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
  ADD KEY `fkidProd` (`idProd`),
  ADD KEY `fkidVenta` (`idVenta`);

--
-- Indices de la tabla `existencias`
--
ALTER TABLE `existencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupocolores_id` (`grupocolores_id`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupocolores`
--
ALTER TABLE `grupocolores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `existencias`
--
ALTER TABLE `existencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `grupocolores`
--
ALTER TABLE `grupocolores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
  ADD CONSTRAINT `idProd` FOREIGN KEY (`idProd`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idVenta` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `existencias`
--
ALTER TABLE `existencias`
  ADD CONSTRAINT `existencias_ibfk_1` FOREIGN KEY (`grupocolores_id`) REFERENCES `grupocolores` (`id`);

--
-- Filtros para la tabla `grupocolores`
--
ALTER TABLE `grupocolores`
  ADD CONSTRAINT `grupocolores_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
