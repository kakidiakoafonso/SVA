-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Fev-2021 às 21:12
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
-- Banco de dados: `automovelbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `marca` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `modelo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ano` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `preco` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `qtdade` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `capacidade` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `combustivel` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `potencia` varchar(250) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `codigo`, `marca`, `modelo`, `ano`, `preco`, `qtdade`, `capacidade`, `tipo`, `combustivel`, `potencia`) VALUES
(1, '1000', 'Kia', 'Picanto', '2010', '2.500.000', '14', '5', 'Van', 'Gasolina', '1500'),
(2, '1111', 'BMW', 'Fire', '2018', '1.000.111.000', '3', '2', 'Conversivel', 'Gasolina', '1500'),
(3, '100112', 'Ferrari', 'FD', '2020', '3.500.000', '1', '2', 'Conversivel', 'Gasolina', '11100'),
(4, '20018', 'Toyota', 'Corola', '1996', '400.000', '89', '5', 'Conversivel', 'Gasolina', '120'),
(5, 'ffff', 'vvvvv', 'VVVVV', 'GGGG', '', '', '', 'Sedan', 'Gasolina', 'EEE'),
(6, 'ffff', 'vvvvv', 'VVVVV', 'GGGG', '', '', '', 'Sedan', 'Gasolina', 'EEE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motos`
--

DROP TABLE IF EXISTS `motos`;
CREATE TABLE IF NOT EXISTS `motos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `marca` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `modelo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ano` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `preco` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `cilindro` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `qtdade` varchar(250) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `motos`
--

INSERT INTO `motos` (`id`, `codigo`, `marca`, `modelo`, `ano`, `preco`, `tipo`, `cilindro`, `qtdade`) VALUES
(1, '1900', 'YB', 'K2', '2013', '500', 'Leve', '12', '200'),
(2, '1991', 'HD', 'X6', '2013', '400.000', 'Leve', '4', '15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `usuario` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(250) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'Kakidiako Afonso Antonio', 'kaki', 'snyder\r\n'),
(2, 'Afosnso Lutonadio', 'alonso', 'Alonso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `sobrenome` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `numero` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `morada` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `automovel` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `data` varchar(250) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `nome`, `sobrenome`, `numero`, `morada`, `automovel`, `data`) VALUES
(1, 'Kakiadiako', 'AntÃ³nio', '945176405', 'Golf 2', 'Picanto', '20/02/21'),
(2, 'Kakiadiako', 'AntÃ³nio', '945176405', 'Golf 2', 'Fire', '20/02/21'),
(3, 'DDDD', 'GGG', '965', 'GOLF 2', 'Picanto', '20/02/21'),
(4, 'DDDD', 'GGG', '965', 'GOLF 2', 'Picanto', '20/02/21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
