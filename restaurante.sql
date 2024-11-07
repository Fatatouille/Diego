-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2024 a las 20:24:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `Nombre` varchar(255) NOT NULL,
  `Precio` int(255) NOT NULL,
  `Clasificacion` varchar(255) NOT NULL,
  `Stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`Nombre`, `Precio`, `Clasificacion`, `Stock`) VALUES
('Agua mineral 500cc', 1000, 'Bebida', 100),
('Brownie', 2000, 'Postre', 20),
('Cerveza Red Ale', 2000, 'Bebida', 100),
('Coca Cola 1.5L', 2500, 'Bebida', 68),
('Común', 4000, 'Pizza', 100),
('Fugazzeta', 6000, 'Pizza', 50),
('Hamburguesa americana', 5000, 'Hamburguesa', 20),
('Hamburguesa común', 3000, 'Hamburguesa', 0),
('Hamburguesa extra cheddar', 6000, 'Hamburguesa', 52),
('Mila Napolitana', 4000, 'Plato', 20),
('Milanesa 40cm', 10000, 'Milanesa', 8),
('Milanesa común', 4000, 'Milanesa', 100),
('Milanesa especial', 5000, 'Milanesa', 59),
('Napolitana', 5000, 'Pizza', 20),
('Selva negra', 3000, 'Postre', 10),
('Sorrentinos con salsa blanca', 6000, 'Plato', 10),
('Tarta de acelga', 5000, 'Plato', 10),
('Tiramisú', 5000, 'Postre', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `Numero` int(255) NOT NULL COMMENT 'Numero de mesa',
  `Estado` varchar(10) NOT NULL DEFAULT 'Vacía' COMMENT 'Ocupada/Vacia',
  `Pedido` varchar(255) NOT NULL DEFAULT 'Nada',
  `Cobrar` decimal(65,0) NOT NULL DEFAULT 0,
  `Solicitud` varchar(255) NOT NULL DEFAULT 'Ninguna'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`Numero`, `Estado`, `Pedido`, `Cobrar`, `Solicitud`) VALUES
(255, 'Admin', 'Admin', 10000, 'Ninguna'),
(1, 'Vacía', 'Nada', 0, 'Ninguna'),
(2, 'Vacía', 'Nada', 0, 'Ninguna'),
(3, 'Vacía', 'Nada', 0, 'Ninguna'),
(4, 'Ocupada', 'Nada', 0, 'Ninguna'),
(5, 'Ocupada', 'Milanesa 40cm,Hamburguesa extra cheddar', 16000, 'Cobrar'),
(6, 'Vacía', 'Nada', 0, 'Ninguna'),
(7, 'Vacía', 'Nada', 0, 'Ninguna'),
(8, 'Vacía', 'Nada', 0, 'Ninguna');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD KEY `Clasificacion` (`Clasificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
