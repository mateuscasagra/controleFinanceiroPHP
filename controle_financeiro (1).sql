-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jun-2025 às 05:01
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle_financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`Id`, `Nome`) VALUES
(1, 'Mercado'),
(2, 'Academia'),
(3, 'Roupas'),
(4, 'Cinema'),
(5, 'Carro'),
(6, 'Lazer');

-- --------------------------------------------------------

--
-- Estrutura da tabela `meta`
--

CREATE TABLE `meta` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Categoria` varchar(50) DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  `Concluida` char(1) DEFAULT NULL CHECK (`Concluida` in ('S','N'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `Id` int(11) NOT NULL,
  `Valor` float NOT NULL,
  `Onde` varchar(100) NOT NULL,
  `Quando` date NOT NULL,
  `Direcao` varchar(20) NOT NULL,
  `IdTipo_Pagamento` int(11) DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `movimentacao`
--

INSERT INTO `movimentacao` (`Id`, `Valor`, `Onde`, `Quando`, `Direcao`, `IdTipo_Pagamento`, `IdCategoria`, `IdUsuario`) VALUES
(1, 1500, 'Empresa', '2025-06-07', 'Entrada', 1, NULL, 30),
(2, 23232, 'sdsd', '2025-06-07', 'Entrada', 1, NULL, 31),
(3, 87678, 'kik', '2025-06-28', 'Entrada', 2, NULL, 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `Id` int(11) NOT NULL,
  `Limite_Lancamento` int(11) DEFAULT NULL,
  `Limite_Metas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`Id`, `Limite_Lancamento`, `Limite_Metas`) VALUES
(1, 30, 3),
(2, 100, 10),
(3, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `Id` int(11) NOT NULL,
  `Descricao` varchar(200) DEFAULT NULL,
  `Preco` double NOT NULL,
  `PermissaoId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`Id`, `Descricao`, `Preco`, `PermissaoId`) VALUES
(1, 'Plano Inicial', 25.9, 1),
(2, 'Plano Intermediário', 49.9, 2),
(3, 'Plano Pro', 199.9, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_pagamento`
--

CREATE TABLE `tipo_pagamento` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo_pagamento`
--

INSERT INTO `tipo_pagamento` (`Id`, `Nome`) VALUES
(1, 'Pix'),
(2, 'Crédito'),
(3, 'Débito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha_Hash` varchar(100) DEFAULT NULL,
  `Data_Cadastro` date NOT NULL,
  `IdPlano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Id`, `Nome`, `Email`, `Senha_Hash`, `Data_Cadastro`, `IdPlano`) VALUES
(30, 'Mateus Zandona', 'mateus.zandonacasagrande@gmail.com', '$2y$10$9JtCnL1cYX4jbxudpQjiZuudKMwhenzY/v8p7JFB7MP.c1Bzm4Umy', '2025-06-07', 3),
(31, 'Luiz CASAGRANDE', 'l@gmail.com', '$2y$10$R4LBijr7/VqioiGxCE1Ws.NBy6TL5PIvGI7pbutqBChxaStWgKVJ6', '2025-06-07', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdTipo_Pagamento` (`IdTipo_Pagamento`),
  ADD KEY `IdCategoria` (`IdCategoria`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Índices para tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PermissaoId` (`PermissaoId`);

--
-- Índices para tabela `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_plano_id` (`IdPlano`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `meta`
--
ALTER TABLE `meta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `movimentacao_ibfk_1` FOREIGN KEY (`IdTipo_Pagamento`) REFERENCES `tipo_pagamento` (`Id`),
  ADD CONSTRAINT `movimentacao_ibfk_2` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`Id`),
  ADD CONSTRAINT `movimentacao_ibfk_3` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`Id`);

--
-- Limitadores para a tabela `planos`
--
ALTER TABLE `planos`
  ADD CONSTRAINT `planos_ibfk_1` FOREIGN KEY (`PermissaoId`) REFERENCES `permissoes` (`Id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_plano_id` FOREIGN KEY (`IdPlano`) REFERENCES `planos` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
