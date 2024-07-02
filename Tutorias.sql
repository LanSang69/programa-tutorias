-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2024 at 11:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tutorias`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123*');

-- --------------------------------------------------------

--
-- Table structure for table `Tutor`
--

CREATE TABLE `Tutor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `cupos` int(11) NOT NULL,
  `genero` enum('hombre','mujer') NOT NULL DEFAULT 'hombre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Tutor`
--

INSERT INTO `Tutor` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `cupos`, `genero`) VALUES
(1, 'Martha Patricia', 'Jiménez', 'Villanueva', 11, 'mujer'),
(2, 'Patricia', 'Escamilla', 'Miranda', 5, 'mujer'),
(3, 'Laura', 'Méndez', 'Segundo', 5, 'mujer'),
(4, 'Laura', 'Muñoz', 'Salazar', 5, 'mujer'),
(5, 'Judith Margarita', 'Tirado', 'Lule', 5, 'mujer'),
(6, 'Karina', 'Viveros', 'Vela', 5, 'mujer'),
(7, 'Rocio', 'Palacios', 'Solano', 5, 'mujer'),
(8, 'Claudia', 'Díaz', 'Huerta', 5, 'mujer'),
(9, 'Elia', 'Ramírez', 'Martínez', 5, 'mujer'),
(10, 'Gabriela', 'López', 'Ruiz', 5, 'mujer'),
(11, 'José Asunción', 'Enríquez', 'Zárate', 5, 'hombre'),
(12, 'Alberto Jesús', 'Alcántara', 'Méndez', 5, 'hombre'),
(13, 'Felipe de Jesús', 'Figueroa', 'del Prado', 5, 'hombre'),
(14, 'Erick', 'Linares', 'Vallejo', 5, 'hombre'),
(15, 'Edgar Armando', 'Catalán', '', 5, 'hombre'),
(16, 'Jorge', 'Cortés', 'Galicia', 5, 'hombre'),
(17, 'Edgardo Franco', 'Martínez', '', 5, 'hombre'),
(18, 'Vicente', 'García', 'Sales', 5, 'hombre'),
(19, 'Iván', 'Mosso', 'García', 5, 'hombre'),
(20, 'Miguel Ángel', 'Rodríguez', '', 11, 'hombre');

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `numero_boleta` char(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `semestre` tinyint(4) NOT NULL CHECK (`semestre` between 1 and 10),
  `carrera` varchar(100) NOT NULL,
  `preferencia_tutor` enum('hombre','mujer') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tutoria` enum('individual','grupal','recuperacion','regularizacion','de pares') NOT NULL,
  `tutor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`numero_boleta`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `semestre`, `carrera`, `preferencia_tutor`, `email`, `password`, `tutoria`, `tutor_id`) VALUES
('2003630491', 'Patricia', 'Escamilla', 'Miranda', '5564779982', 1, 'ISC', 'hombre', 'paty1918@alumno.ipn.mx', 'paty123*', 'individual', NULL),
('2023630418', 'Alan', 'Sánchez', 'Gómez', '5564779988', 1, 'ISC', 'hombre', 'alanisg@alumno.ipn.mx', 'sangom69*', 'individual', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Tutor`
--
ALTER TABLE `Tutor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`numero_boleta`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tutoria` (`tutoria`),
  ADD KEY `fk_tutor_id` (`tutor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Tutor`
--
ALTER TABLE `Tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_tutor_id` FOREIGN KEY (`tutor_id`) REFERENCES `Tutor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
