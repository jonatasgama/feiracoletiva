-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Abr-2020 às 21:20
-- Versão do servidor: 10.3.11-MariaDB
-- versão do PHP: 7.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feira`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nome`, `email`, `telefone`, `senha`, `criado_em`) VALUES
(1, 'Jonatas', 'jonatas@email.com', '123', '3f83164cab55dccb72d71c7d8fcbef60', '2020-04-02 00:13:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_autonomo`
--

CREATE TABLE `tbl_autonomo` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `area_de_cobertura` text DEFAULT NULL,
  `forma_de_pagamento` varchar(100) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_estado` int(11) NOT NULL,
  `ext` varchar(5) DEFAULT 'jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_autonomo`
--

INSERT INTO `tbl_autonomo` (`id`, `nome`, `area_de_cobertura`, `forma_de_pagamento`, `telefone`, `criado_em`, `id_estado`, `ext`) VALUES
(2, 'José Ladeira', 'Leblon Barra Centro RJ', 'Débito / Crédito', '(21) 9 8833-4563', '2020-04-02 00:12:40', 1, 'jpg'),
(3, 'Zeca Baleiro', 'Centro RJ Laranjeiras', 'Dinheiro', '(21) 9 8899-0976', '2020-04-02 00:12:40', 2, 'jpg'),
(4, 'Laurindo', 'Barra Tijuca', 'Dinheiro / Débito / Crédito', '(21) 9 9987-5420', '2020-04-02 00:12:40', 3, 'jpg'),
(5, 'Gabriella', 'Centro', 'Dinheiro', '(21) 9 8909-0065', '2020-04-02 00:12:40', 4, 'jpg'),
(6, 'Pedro Paulo', 'Zona Sul', 'Dinheiro', '(21) 9 8766-0087', '2020-04-04 23:05:47', 5, 'jpg'),
(7, 'Herley', 'Zona Norte RJ', 'Cartão / Dinheiro', '(21)9 6643-6643', '2020-04-04 23:51:53', 5, 'jpg'),
(8, 'Andrei', 'Zona Sul', 'Dinheiro', '(21) 3277-0917', '2020-04-04 23:53:54', 7, 'jpg'),
(9, 'Edir', 'Zona Oeste', 'Dinheiro', '(21) 3455-9800', '2020-04-04 23:54:58', 8, 'jpg'),
(10, 'test', 'Zona Norte', 'Dinheiro', '123', '2020-04-04 23:56:09', 9, 'jpg'),
(11, 'Nelza Zamboja', 'Estácio / Amarelinho', 'Dinheiro', '(21) 9 8861-8898', '2020-04-16 16:50:26', 10, 'png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_avaliacao`
--

CREATE TABLE `tbl_avaliacao` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_autonomo` int(11) NOT NULL,
  `avaliacao` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_avaliacao`
--

INSERT INTO `tbl_avaliacao` (`id`, `id_usuario`, `id_autonomo`, `avaliacao`, `timestamp`) VALUES
(1, 1, 2, 4, '2020-04-16 16:11:09'),
(2, 1, 7, 2, '2020-04-16 16:11:22'),
(3, 1, 6, 3, '2020-04-15 01:07:58'),
(4, 2, 7, 2, '2020-04-15 01:36:14'),
(5, 1, 3, 4, '2020-04-15 23:00:19'),
(6, 1, 4, 5, '2020-04-16 16:11:30'),
(7, 3, 3, 5, '2020-04-22 15:49:01'),
(8, 3, 2, 2, '2020-04-22 15:49:05'),
(9, 4, 7, 5, '2020-04-22 16:00:12'),
(10, 4, 9, 4, '2020-04-22 16:00:20'),
(11, 6, 7, 5, '2020-04-22 17:15:06'),
(12, 6, 9, 1, '2020-04-22 17:15:11'),
(13, 6, 4, 4, '2020-04-22 17:15:19'),
(14, 6, 10, 4, '2020-04-22 17:15:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `ext` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id`, `categoria`, `criado_em`, `ext`) VALUES
(1, 'mecânico', '2020-04-04 18:32:10', 'jpg'),
(2, 'eletricista', '2020-04-04 18:32:28', 'jpg'),
(3, 'motorista', '2020-04-04 22:46:27', 'jpg'),
(4, 'Bombeiro', '2020-04-04 22:48:28', 'jpg'),
(5, 'Agricultor', '2020-04-06 03:11:07', 'jpg'),
(6, 'Design', '2020-04-26 14:20:49', 'jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_categoria_autonomo`
--

CREATE TABLE `tbl_categoria_autonomo` (
  `id` int(11) NOT NULL,
  `id_autonomo` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_categoria_autonomo`
--

INSERT INTO `tbl_categoria_autonomo` (`id`, `id_autonomo`, `id_categoria`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 6, 1),
(5, 6, 4),
(6, 7, 2),
(7, 7, 4),
(8, 8, 1),
(9, 8, 3),
(10, 9, 2),
(11, 10, 1),
(12, 10, 2),
(13, 5, 5),
(14, 4, 2),
(15, 3, 3),
(16, 3, 4),
(17, 3, 1),
(18, 11, 3),
(19, 11, 5),
(20, 6, 5),
(21, 5, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_estado`
--

CREATE TABLE `tbl_estado` (
  `id` int(11) NOT NULL,
  `codigouf` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `uf` char(2) NOT NULL,
  `regiao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_estado`
--

INSERT INTO `tbl_estado` (`id`, `codigouf`, `nome`, `uf`, `regiao`) VALUES
(1, 12, 'Acre', 'AC', 1),
(2, 27, 'Alagoas', 'AL', 2),
(3, 16, 'Amapá', 'AP', 1),
(4, 13, 'Amazonas', 'AM', 1),
(5, 29, 'Bahia', 'BA', 2),
(6, 23, 'Ceará', 'CE', 2),
(7, 53, 'Distrito Federal', 'DF', 5),
(8, 32, 'Espírito Santo', 'ES', 3),
(9, 52, 'Goiás', 'GO', 5),
(10, 21, 'Maranhão', 'MA', 2),
(11, 51, 'Mato Grosso', 'MT', 5),
(12, 50, 'Mato Grosso do Sul', 'MS', 5),
(13, 31, 'Minas Gerais', 'MG', 3),
(14, 15, 'Pará', 'PA', 1),
(15, 25, 'Paraíba', 'PB', 2),
(16, 41, 'Paraná', 'PR', 4),
(17, 26, 'Pernambuco', 'PE', 2),
(18, 22, 'Piauí', 'Pi', 2),
(19, 33, 'Rio de Janeiro', 'RJ', 3),
(20, 24, 'Rio Grande do norte', 'RN', 2),
(21, 43, 'Rio Grande do Sul', 'RS', 4),
(22, 11, 'Rondônia', 'RO', 1),
(23, 14, 'Roraima', 'RR', 1),
(24, 42, 'Santa catarina', 'SC', 4),
(25, 35, 'São Paulo', 'SP', 3),
(26, 28, 'Sergipe', 'SE', 2),
(27, 17, 'Tocantins', 'TO', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome`, `email`, `telefone`, `senha`, `criado_em`) VALUES
(1, 'Usuário', 'usuario@email.com', '(21) 9 8709-9902', 'f8032d5cae3de20fcec887f395ec9a6a', '2020-04-02 00:13:19'),
(2, 'Usuário 2', 'usuario2@email.com', '(21) 9 7765-9908', '2fb6c8d2f3842a5ceaa9bf320e649ff0', '2020-04-15 01:34:52'),
(3, 'Gabriella Santos', 'gabriella_s06@email.com', '', '662efb936d76b1c99fb881e804ddf21e', '2020-04-22 15:47:10'),
(4, 'Rosangela Santos', 'rosangela@email.com', '', '9ebc7ea29d46dddda3cb282e5cb8cf34', '2020-04-22 15:58:52'),
(5, 'Sanderson Guimarães', 'sanderson@email.com', '(21) 9 8567-4456', 'bf4fffad26f09ce2c548841ac5ffb5c4', '2020-04-22 16:08:29'),
(6, 'Amanda', 'amanda@email.com', '(21) 9 9888-0000', 'e1f99843a57862faf577bda3ef4bd319', '2020-04-22 16:51:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_autonomo`
--
ALTER TABLE `tbl_autonomo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_avaliacao`
--
ALTER TABLE `tbl_avaliacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria` (`categoria`);

--
-- Indexes for table `tbl_categoria_autonomo`
--
ALTER TABLE `tbl_categoria_autonomo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_estado`
--
ALTER TABLE `tbl_estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_autonomo`
--
ALTER TABLE `tbl_autonomo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_avaliacao`
--
ALTER TABLE `tbl_avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_categoria_autonomo`
--
ALTER TABLE `tbl_categoria_autonomo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_estado`
--
ALTER TABLE `tbl_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
