-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/11/2023 às 23:14
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `magnitech`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `condominios`
--

CREATE TABLE `condominios` (
  `ID_Condominios` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Senha` varchar(255) DEFAULT NULL,
  `CNPJ` varchar(14) DEFAULT NULL,
  `CEP` varchar(9) DEFAULT NULL,
  `Endereco` varchar(255) DEFAULT NULL,
  `Fone` varchar(13) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `condominios`
--

INSERT INTO `condominios` (`ID_Condominios`, `Nome`, `Senha`, `CNPJ`, `CEP`, `Endereco`, `Fone`, `Email`) VALUES
(2, 'yas', '123', '890', '4444', 'rfd', '2244', 'frfss');

-- --------------------------------------------------------

--
-- Estrutura para tabela `em_uso`
--

CREATE TABLE `em_uso` (
  `ID_Maquina` int(11) DEFAULT NULL,
  `IMG` varchar(255) DEFAULT NULL,
  `Nome_Maquina` longtext DEFAULT NULL,
  `ID_Condominios` int(11) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `em_uso`
--

INSERT INTO `em_uso` (`ID_Maquina`, `IMG`, `Nome_Maquina`, `ID_Condominios`, `estado`) VALUES
(1, 'esteira.png', 'Esteira', 1, 'inativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `maquinas_condominios`
--

CREATE TABLE `maquinas_condominios` (
  `ID_Maquina` int(11) NOT NULL,
  `N_Maquina` int(11) DEFAULT NULL,
  `Nome_Maquina` longtext DEFAULT NULL,
  `IMG` varchar(255) DEFAULT NULL,
  `Kg` int(11) DEFAULT NULL,
  `ID_Condominios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `maquinas_estoque`
--

CREATE TABLE `maquinas_estoque` (
  `N_Maquina` int(11) DEFAULT NULL,
  `Nome_Maquina` longtext DEFAULT NULL,
  `IMG` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `maquinas_estoque`
--

INSERT INTO `maquinas_estoque` (`N_Maquina`, `Nome_Maquina`, `IMG`) VALUES
(1, 'Agachamento Hack', 'C:/Users/MANACÁ/Downloads/Imagens Máquinas/Agachamento_Hack'),
(2, 'Bicicleta', 'C:/Users/MANACÁ/Downloads/Imagens Máquinas/Bicicleta'),
(3, 'Esteira', 'C:/Users/MANACÁ/Downloads/Imagens Máquinas/Esteira'),
(4, 'Mesa Flexora', 'C:/Users/MANACÁ/Downloads/Imagens Máquinas/Mesa_Flexora'),
(5, 'Supino Reto', 'C:/Users/MANACÁ/Downloads/Imagens Máquinas/Supino_Reto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `moradores`
--

CREATE TABLE `moradores` (
  `CPF` varchar(12) NOT NULL,
  `Condominios` text DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `AP` int(11) DEFAULT NULL,
  `Bloco` varchar(255) DEFAULT NULL,
  `Fone` varchar(13) DEFAULT NULL,
  `Senha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `moradores`
--

INSERT INTO `moradores` (`CPF`, `Condominios`, `Nome`, `AP`, `Bloco`, `Fone`, `Senha`) VALUES
('54096638889', 'guatemala', 'yasmin', 12, 'b', '88889999', 123);

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `ID_Maquina` int(11) DEFAULT NULL,
  `Horario` time DEFAULT NULL,
  `Dia` date DEFAULT NULL,
  `ID_Condominios` int(11) DEFAULT NULL,
  `Nome_Maquina` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `movimentacao`
--

INSERT INTO `movimentacao` (`ID_Maquina`, `Horario`, `Dia`, `ID_Condominios`, `Nome_Maquina`) VALUES
(1, '18:07:00', '2023-11-13', NULL, 'Esteira'),
(2, '18:08:00', '2023-11-13', NULL, 'Hack'),
(3, '18:09:00', '2023-11-13', NULL, 'Bicicleta'),
(3, '18:09:00', '2023-11-13', NULL, 'Bicicleta'),
(1, '17:14:00', '2023-11-14', NULL, 'Esteira'),
(1, '18:02:00', '2023-11-14', NULL, 'Esteira');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `condominios`
--
ALTER TABLE `condominios`
  ADD PRIMARY KEY (`ID_Condominios`);

--
-- Índices de tabela `maquinas_condominios`
--
ALTER TABLE `maquinas_condominios`
  ADD PRIMARY KEY (`ID_Maquina`);

--
-- Índices de tabela `moradores`
--
ALTER TABLE `moradores`
  ADD PRIMARY KEY (`CPF`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `condominios`
--
ALTER TABLE `condominios`
  MODIFY `ID_Condominios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `maquinas_condominios`
--
ALTER TABLE `maquinas_condominios`
  MODIFY `ID_Maquina` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
