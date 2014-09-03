-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2014 at 02:47 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pontualimportb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `categorias` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `dimensoes` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `preco` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`codigo`, `descricao`, `categorias`, `dimensoes`, `preco`) VALUES
('141742', 'Cantil de inox', 'Squeezes, Cantis', '9 x 8 x 7', ''),
('143077', 'Bloco p/ anotação', 'Blocos', '3 x 3 x 2', '1270'),
('143208A', 'something', 'some cat', '2x3x4', '010');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
