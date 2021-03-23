-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2021 a las 19:33:08
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
(40, 'sudadera seven wonders.jpg', 222709, '/Ecommerce/upload/40.jpg', 'C:/xampp/htdocs/Ecommerce/upload/40.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `existencias` int(5) NOT NULL,
  `descripcion` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `existencias`, `descripcion`) VALUES
(4, 'vestido rosa manga asimétrica ocasión', 45, 6, ''),
(5, 'Vestido azul manga asimétrica ocasión', 45, 8, ''),
(6, 'Conjunto floral rosa Hawai', 45, 15, ''),
(7, 'Crop top camisero Bella', 17, 14, ''),
(8, 'Mini vestido ISABELLA', 40, 13, ''),
(9, 'Vestido halter de flores 80\'s', 36, 2, ''),
(10, 'Vestido citricos', 19.5, 19, ''),
(11, 'Vestido blanco midi dress ', 58, 20, ''),
(12, 'Vestido camisero nudo', 58, 34, ''),
(13, 'Vestido mini chicle Claudia', 30, 13, ''),
(14, 'Vestido blazer blanco', 50, 44, ''),
(15, 'Vestido mini tachuelas blanco', 45, 12, ''),
(16, 'Vestido topitos manga asimétrica', 22, 45, ''),
(17, 'Mono Formentera', 33.99, 17, ''),
(18, 'Sudadera seven wonders', 24.5, 44, '');

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
(5, 16),
(4, 15),
(6, 17),
(7, 18),
(8, 19),
(9, 20),
(10, 21),
(10, 22),
(11, 23),
(11, 24),
(12, 25),
(13, 26),
(13, 27),
(14, 29),
(14, 30),
(15, 32),
(16, 34),
(16, 35),
(17, 37),
(17, 38),
(18, 39),
(18, 40);

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
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
