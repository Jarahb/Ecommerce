-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 01:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `email`, `pass`) VALUES
(23, 'Jara', 'jaruky22@hotmail.com', '$2y$10$7hv5WJ3Gz091j71zLfS3zuaJrggobBapN4ZgGhH6BVXfnh6h50LMm');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detalleventas`
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
-- Table structure for table `existencias`
--

CREATE TABLE `existencias` (
  `id` int(11) NOT NULL,
  `grupocolores_id` int(11) DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL,
  `talla` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `existencias`
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
(36, 32, 7, '42');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `filesize` int(11) NOT NULL,
  `web_path` varchar(250) NOT NULL,
  `system_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
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
(54, 'fujinegro.jpg', 79527, '/Ecommerce/upload/54.jpg', 'C:/xampp/htdocs/Ecommerce/upload/54.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `grupocolores`
--

CREATE TABLE `grupocolores` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `grupocolores`
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
(32, 76, 'negro');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`) VALUES
(4, 'vestido rosa manga asimétrica ocasión', 45, ''),
(5, 'Vestido azul manga asimétrica ocasión', 45, ''),
(6, 'Conjunto floral rosa Hawai', 45, ''),
(7, 'Crop top camisero Bella', 17, ''),
(8, 'Mini vestido ISABELLA', 40, ''),
(9, 'Vestido halter de flores 80\'s', 36, ''),
(10, 'Vestido citricos', 19.5, ''),
(11, 'Vestido blanco midi dress ', 58, ''),
(12, 'Vestido camisero nudo', 58, ''),
(13, 'Vestido mini chicle Claudia', 30, ''),
(14, 'Vestido blazer blanco', 50, ''),
(15, 'Vestido mini tachuelas blanco', 45, ''),
(16, 'Vestido topitos manga asimétrica', 22, ''),
(17, 'Mono Formentera', 33.99, ''),
(18, 'Sudadera seven wonders', 24.5, ''),
(68, 'Mono de esquí', 120, 'mono de esquí nice'),
(70, 'Cami verano', 15.5, 'jejejeje'),
(71, 'Chandal guay', 45, 'pppp'),
(72, 'Prenda test', 20.05, 'prendaste'),
(73, 'Bufanda chachi', 12.43, 'popopopo'),
(75, 'Vestido de prueba', 45.99, 'vestido con el que estoy probando el desarrollo'),
(76, 'Asics Gel Fujitrabucco 7', 120, 'Las deportivas de los verdaderos runners. Siente el máximo confort con sus plantillas de espuma ergonómica.');

-- --------------------------------------------------------

--
-- Table structure for table `productos_files`
--

CREATE TABLE `productos_files` (
  `producto_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos_files`
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
(18, 40),
(74, 43),
(75, 44),
(75, 45),
(75, 46),
(75, 47),
(76, 51),
(76, 52),
(76, 53),
(76, 54);

-- --------------------------------------------------------

--
-- Table structure for table `productos_groups`
--

CREATE TABLE `productos_groups` (
  `producto_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`email`, `pass`, `nombre`, `telefono`, `direccion`, `poblacion`, `provincia`, `codigopostal`) VALUES
('daniel.lozano@gmail.com', '$2y$10$tadX6MN7zRlzpm5AHfizRe9zjFdKSJKwVwsOOU7VEl9.eI.i1qeKu', 'Daniel Lozano', 664443939, 'C Salamanca 1', 'Madrid', 'Madrid', 20010);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `idCliente` int(5) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidProd` (`idProd`),
  ADD KEY `fkidVenta` (`idVenta`);

--
-- Indexes for table `existencias`
--
ALTER TABLE `existencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupocolores_id` (`grupocolores_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupocolores`
--
ALTER TABLE `grupocolores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidCliente` (`idCliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `existencias`
--
ALTER TABLE `existencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `grupocolores`
--
ALTER TABLE `grupocolores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `idProd` FOREIGN KEY (`idProd`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idVenta` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `existencias`
--
ALTER TABLE `existencias`
  ADD CONSTRAINT `existencias_ibfk_1` FOREIGN KEY (`grupocolores_id`) REFERENCES `grupocolores` (`id`);

--
-- Constraints for table `grupocolores`
--
ALTER TABLE `grupocolores`
  ADD CONSTRAINT `grupocolores_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
