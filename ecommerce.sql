-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 01:38 PM
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
-- Table structure for table `existencias`
--

CREATE TABLE `existencias` (
  `id` int(11) NOT NULL,
  `grupocolores_id` int(11) NOT NULL,
  `existencias` int(10) NOT NULL,
  `talla` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `existencias`
--

INSERT INTO `existencias` (`id`, `grupocolores_id`, `existencias`, `talla`) VALUES
(13, 10, 5, '44'),
(14, 10, 8, '40'),
(15, 10, 6, '43'),
(16, 11, 3, '36'),
(17, 11, 6, '46'),
(18, 12, 6, '48'),
(19, 12, 10, '45'),
(20, 12, 11, '37');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `filesize` int(11) NOT NULL,
  `web_path` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `system_path` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `filesize`, `web_path`, `system_path`) VALUES
(13, 'fujinegro.jpg', 79527, '/Ecommerce/upload/13.jpg', 'C:/xampp/htdocs/Ecommerce/upload/13.jpg'),
(14, 'fujirojo.jpg', 54206, '/Ecommerce/upload/14.jpg', 'C:/xampp/htdocs/Ecommerce/upload/14.jpg'),
(15, 'fujiazul.jpg', 219609, '/Ecommerce/upload/15.jpg', 'C:/xampp/htdocs/Ecommerce/upload/15.jpg'),
(16, 'fujiverde.jpg', 112341, '/Ecommerce/upload/16.jpg', 'C:/xampp/htdocs/Ecommerce/upload/16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `grupocolores`
--

CREATE TABLE `grupocolores` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `color` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `grupocolores`
--

INSERT INTO `grupocolores` (`id`, `producto_id`, `color`) VALUES
(10, 6, 'negro'),
(11, 6, 'rojo'),
(12, 6, 'verde');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`) VALUES
(6, 'Asics Gel Fujitrabucco 7', 129.99, 'La zapatilla de los runners.');

-- --------------------------------------------------------

--
-- Table structure for table `productos_files`
--

CREATE TABLE `productos_files` (
  `producto_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `productos_files`
--

INSERT INTO `productos_files` (`producto_id`, `file_id`) VALUES
(6, 13),
(6, 14),
(6, 15),
(6, 16);

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
-- Indexes for table `productos_files`
--
ALTER TABLE `productos_files`
  ADD UNIQUE KEY `producto_id` (`producto_id`,`file_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT for table `existencias`
--
ALTER TABLE `existencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `grupocolores`
--
ALTER TABLE `grupocolores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `existencias`
--
ALTER TABLE `existencias`
  ADD CONSTRAINT `existencias_ibfk_1` FOREIGN KEY (`grupocolores_id`) REFERENCES `grupocolores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grupocolores`
--
ALTER TABLE `grupocolores`
  ADD CONSTRAINT `grupocolores_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `productos_files`
--
ALTER TABLE `productos_files`
  ADD CONSTRAINT `productos_files_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `productos_files_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
