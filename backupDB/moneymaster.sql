-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Jun-2024 às 21:37
-- Versão do servidor: 8.3.0
-- versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `moneymaster`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

DROP TABLE IF EXISTS `despesas`;
CREATE TABLE IF NOT EXISTS `despesas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorsaida` double(10,0) NOT NULL,
  `id_user` int NOT NULL,
  `data_saida` date NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id`, `descricao`, `valorsaida`, `id_user`, `data_saida`, `created`) VALUES
(2, 'Compra cato', 100, 2, '2024-06-04', '2024-06-05 20:37:46'),
(33, 'padaria', 10, 1, '2024-06-02', '2024-06-03 20:32:52'),
(34, 'Compra farmacia', 200, 1, '2024-06-03', '2024-06-03 20:37:42'),
(36, 'Ração do cachorro', 15, 0, '2024-06-04', '2024-06-05 18:09:48'),
(37, 'padaria', 10, 0, '2024-06-05', '2024-06-05 18:17:34'),
(38, 'Mercadinho', 15, 2, '2024-06-05', '2024-06-05 18:31:12'),
(39, 'Açougue', 70, 1, '2024-06-05', '2024-06-05 18:35:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

DROP TABLE IF EXISTS `niveis_acessos`;
CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Administrador', '2024-06-04 19:32:00', NULL),
(2, 'Colaborador', '2024-06-04 19:32:00', NULL),
(3, 'Usuario', '2024-06-04 19:32:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE IF NOT EXISTS `receitas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorentrada` double NOT NULL,
  `id_user` int NOT NULL,
  `data_entra` date NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id`, `descricao`, `valorentrada`, `id_user`, `data_entra`, `created`) VALUES
(9, 'padaria', 10, 1, '2024-05-23', '2024-05-30 11:09:01'),
(12, 'Trabalho de pintura', 800, 1, '2024-06-03', '2024-06-04 20:21:59'),
(13, 'Vanda de pc', 460, 1, '2024-06-20', '2024-06-05 18:34:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(520) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situacoe_id` int NOT NULL DEFAULT '0',
  `niveis_acesso_id` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `situacoe_id`, `niveis_acesso_id`, `created`, `modified`) VALUES
(1, 'Emy Matos', 'matoss393@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, '2024-06-04 19:32:01', '2024-06-04 19:32:01'),
(2, 'Simone Farias', 'simonny671@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, '2024-06-05 20:31:59', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
