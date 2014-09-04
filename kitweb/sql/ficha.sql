-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2014 at 04:10 PM
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
-- Table structure for table `ficha`
--

DROP TABLE `ficha`;

CREATE TABLE IF NOT EXISTS `ficha` (
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ficha`
--

INSERT INTO `ficha` (`nome`, `valor`) VALUES
('razao_social', 'Pontual Exportação e Importação Ltda.');

INSERT INTO `ficha` (`nome`, `valor`) VALUES
('nome_fantasia', 'Pontual Import Brindes');

INSERT INTO `ficha` (`nome`, `valor`) VALUES
('slogan', 'Brindes e Presentes Promocionais');

INSERT INTO `ficha` (`nome`, `valor`) VALUES
('telefone', '(11) 3228-1113 / 3227-4026 / 3313-7704');

INSERT INTO `ficha` (`nome`, `valor`) VALUES
('endereco', 'R. Antônio de Andrade, 109 - Canindé - São Paulo, SP, CEP 03034-080');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
