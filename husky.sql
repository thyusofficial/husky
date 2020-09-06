-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Set-2020 às 19:35
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `husky`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `origin_cep` varchar(8) DEFAULT NULL,
  `origin_number` varchar(5) DEFAULT NULL,
  `origin_street` varchar(50) DEFAULT NULL,
  `origin_complement` varchar(50) DEFAULT NULL,
  `origin_neighborhood` varchar(50) DEFAULT NULL,
  `origin_reference` varchar(50) DEFAULT NULL,
  `destination_cep` varchar(8) DEFAULT NULL,
  `destination_street` varchar(50) DEFAULT NULL,
  `destination_number` varchar(5) DEFAULT NULL,
  `destination_complement` varchar(50) DEFAULT NULL,
  `destination_neighborhood` varchar(50) DEFAULT NULL,
  `destination_reference` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
