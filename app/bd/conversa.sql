-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/01/2024 às 14:07
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `conversa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(150) NOT NULL,
  `TELEFONE` varchar(14) NOT NULL,
  `CEP` int(11) DEFAULT NULL,
  `LOGRADOURO` varchar(200) NOT NULL,
  `BAIRRO` varchar(200) NOT NULL,
  `NUMERO` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`ID`, `NOME`, `TELEFONE`, `CEP`, `LOGRADOURO`, `BAIRRO`, `NUMERO`) VALUES
(5, 'Djasmim Rosa Sobrinho Machado', '34988994173', 38443081, 'Rua Estados Unidos', 'Independência', 805),
(8, 'Vicente de Paulo Machado', '34988070830', 38441078, 'Rua Anápolis', 'Maria Eugênia', 1),
(10, 'Abadia Santos', '34998756623', 38440042, 'Avenida Minas Gerais', 'Centro', 369),
(12, 'Sirlene sivla', '34988888888', 38443081, 'Rua Estados Unidos', 'Independência', 785);

-- --------------------------------------------------------

--
-- Estrutura para tabela `parametros_globais`
--

CREATE TABLE `parametros_globais` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `VALOR` varchar(10) NOT NULL,
  `CONTEXTO` varchar(500) DEFAULT NULL,
  `CHECKABLE` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `parametros_globais`
--

INSERT INTO `parametros_globais` (`ID`, `NOME`, `VALOR`, `CONTEXTO`, `CHECKABLE`) VALUES
(1, 'BUSCA_DATA_PRIN', '1', 'NA PAGINA LISTA, DESEJA BUSCAR PELA DATA EXATA?', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `ID` int(11) NOT NULL,
  `JOGO` int(11) DEFAULT NULL,
  `CADEIRA` int(11) DEFAULT NULL,
  `MESA` int(11) DEFAULT NULL,
  `PULA` int(11) DEFAULT NULL,
  `DATA` datetime DEFAULT NULL,
  `CODIGO_CLIENTE` int(11) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`ID`, `JOGO`, `CADEIRA`, `MESA`, `PULA`, `DATA`, `CODIGO_CLIENTE`, `VALOR`) VALUES
(39, 16, 12, 0, 1, '2024-01-26 00:00:00', 6, 1.00),
(41, 125, 0, 0, 1, '2024-01-26 00:00:00', 3, 1.00),
(42, 69, 0, 0, 1, '2024-02-07 00:00:00', 5, 1.00),
(43, 24, 0, 0, 1, '2024-01-29 00:00:00', 1, 1.00),
(44, 27, 0, 0, 1, '2024-01-29 00:00:00', 7, 1.00),
(45, 15, 0, 0, 0, '2024-01-29 00:00:00', 1, 1.00),
(46, 15, 0, 0, 0, '2024-01-29 00:00:00', 1, 1.00),
(47, 36, 0, 0, 1, '2024-01-29 00:00:00', 9, 1.00),
(48, 25, 3, 0, 1, '2024-01-29 00:00:00', 9, 1.00),
(50, 15, 0, 0, 0, '2024-01-29 00:00:00', 1, 1.00),
(51, 15, 0, 0, 0, '2024-01-29 00:00:00', 1, 1.00),
(52, 15, 0, 0, 0, '2024-01-29 00:00:00', 1, 1.00),
(53, 15, 0, 0, 0, '2024-01-29 00:00:00', 1, 356.00),
(54, 26, 0, 0, 0, '2024-01-29 00:00:00', 1, 102.00),
(55, 0, 0, 2, 1, '2024-01-29 00:00:00', 3, 10.00),
(56, 26, 6, 0, 1, '2024-01-30 00:00:00', 1, 250.00),
(57, 36, 0, 15, 0, '2024-02-15 00:00:00', 9, 278.00),
(59, 36, 0, 0, 1, '2024-01-31 00:00:00', 10, 380.00),
(60, 35, 0, 0, 1, '2024-01-31 00:00:00', 5, 165.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'marcos ', 'marcos.machado', '12345'),
(2, 'marcelo', 'marcelo', '12345'),
(3, 'marcelo', 'marcelo', '12345'),
(4, 'bruno', 'bruno', '123'),
(5, 'bruno', 'bruno', '123'),
(6, 'bruno', 'bruno', '12345'),
(7, 'bruno', 'bruno', '12345'),
(8, 'marcelo', 'marcelo', '12345'),
(9, 'marilia', 'marilia', '12345'),
(10, 'marilia', 'marilia', '12345'),
(11, 'marilia', 'marilia', '12345'),
(12, 'teste', 'vaca', 'vaca'),
(13, 'teste', 'vaca', 'vaca'),
(14, 'teste geral', 'teste', '1'),
(15, 'teste geral', 'teste', '1'),
(16, 'teste geral1994', 'teste', '1'),
(17, 'teste geral1994', 'teste', 'vaca'),
(18, 'teste', 'teste', 'stes'),
(19, 'este', 'deste', 'teste'),
(20, 'teste', 'teste', 'dsa'),
(21, 'teste', 'testet', '12345'),
(22, 'teste', 'testet', '12345'),
(23, 'teste', 'testet', '12345'),
(24, 'Pedro', 'Pedro', 'pedro'),
(25, 'Thales', 'Thales', '12345');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `parametros_globais`
--
ALTER TABLE `parametros_globais`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `parametros_globais`
--
ALTER TABLE `parametros_globais`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
