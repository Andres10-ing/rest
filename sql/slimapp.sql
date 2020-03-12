-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 04:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slimapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Pelicula`
--

CREATE TABLE `Pelicula` (
  `id_pel` int(10) NOT NULL,
  `titulo_pel` varchar(100) NOT NULL,
  `director_pel` varchar(100) NOT NULL,
  `Productora_pel` varchar(100) NOT NULL,
  `year_pel` int(10) NOT NULL,
  `Duracion_pel` int(10) NOT NULL
);

--
-- Dumping data for table `Pelicula`
--

INSERT INTO `Pelicula` (`id_pel`, `titulo_pel`, `director_pel`, `productora_pel`, `año_pel`, `duracionMin_pel)`) VALUES
(10, 'Fast&Furious9', 'JustinLin', 'UniversalStudios', '2020', '135'),
(20, 'VengadoresEndGame', 'AnthonyRusso&JoeRusso', 'MarvelStudios', '2019', '181'),
(30, 'JumanjiSiguienteNivel', 'JakeKasdan', 'ColumbiaPictures', '2019', '122'),
(40, 'SawVIII', 'SpierigBrothers', 'TwistedPictures', '2017', '92'),
(50, 'Todopoderoso', 'TomShadyac', 'SpyglassEntertainment', '2003', '101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Pelicula`
--
ALTER TABLE `Pelicula`
  ADD PRIMARY KEY (`id_pel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `Pelicula`
  MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
