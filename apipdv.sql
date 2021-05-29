-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Maio-2021 às 23:02
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `apipdv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ccs`
--

DROP TABLE IF EXISTS `ccs`;
CREATE TABLE IF NOT EXISTS `ccs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_department` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_departments_css` (`id_department`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ccs`
--

INSERT INTO `ccs` (`id`, `id_department`, `name`) VALUES
(1, 1, 100),
(2, 1, 200),
(3, 2, 300),
(4, 2, 400),
(5, 3, 500),
(6, 3, 600),
(9, 2, 901),
(10, 4, 1000),
(14, 2, 999);

-- --------------------------------------------------------

--
-- Estrutura da tabela `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'nenhum'),
(2, 'financeiro'),
(3, 'Recursos Humanos'),
(4, 'compras'),
(10, 'TI'),
(11, 'consultoria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_26_170241_create_all', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `offices`
--

DROP TABLE IF EXISTS `offices`;
CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `offices`
--

INSERT INTO `offices` (`id`, `name`) VALUES
(1, 'nenhum'),
(2, 'gerente'),
(3, 'supervisor'),
(4, 'assistente'),
(5, 'treinee');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_office` int(20) NOT NULL DEFAULT 1,
  `id_department` int(20) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH,
  KEY `FK_departments` (`id_department`),
  KEY `FK_offices` (`id_office`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `id_office`, `id_department`, `name`, `email`, `password`) VALUES
(1, 2, 2, 'Rodrigo', 'teste@teste.com', '$2y$10$48MpXaILbMtd7NdBG61wfOC1XqxLJcbiVXj9CQ9BmgQBOo/i1zwD.'),
(23, 2, 2, 'Vanderley', 'v@t.com', '$2y$10$L1VENRbB53YWVxb18u8TIejX4xBkaDU4OTFRXle78ABRASlkmNqY6'),
(39, 4, 10, 'Carlos', 'carlos@ipdv.com', '$2y$10$d.Xr4uzQFFPksx4eoW6LA.QlGux1sS4801agUGUlOkdZSkzWRz3.a'),
(40, 2, 10, 'Guilherme', 'gui@tdd.com', '$2y$10$AtGMyzn1x4mms2jhUDTWyODkZNaW.oRouIfrZuPVtgUHWQFvSkyQy'),
(11, 5, 3, 'José Santos', 'jose@gmail.com', '$2y$10$zCu1xlh3GOqZ1qGpM.MO3eLmdLaqjd7hwADU5Mpxt5TVTL/2vyjJO'),
(41, 2, 10, 'Marcos', 'marcos@sys.com', '$2y$10$2YcoZoxivnM8zqk5o9EwaeLKF6cylm8SW0mg.WG5aDsSgzVXzwQZi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
