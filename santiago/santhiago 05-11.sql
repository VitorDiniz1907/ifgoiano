-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05-Nov-2019 às 13:02
-- Versão do servidor: 10.2.22-MariaDB
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `santhiago`
--
CREATE DATABASE IF NOT EXISTS `santhiago` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `santhiago`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `logradouro` varchar(450) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `complemento` varchar(450) DEFAULT NULL,
  `cidade` varchar(450) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `logradouro`, `bairro`, `numero`, `complemento`, `cidade`, `estado`, `cep`, `usuario_id_usuario`) VALUES
(1, 'yvgubhin', 'hnj', 'buhnij', 'hnjk', 'hn', 'AC', '4161', 1),
(2, 'dctfvygbuhnijmok,p', 'xdrcftvygbhunjimko,', 'dctfvygbuhnijmko,', 'dcftvgybuhnjimko,pl', 'xdrcftvygbhunijmok', 'AL', '9648521464', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `farmacia`
--

CREATE TABLE `farmacia` (
  `id_farmacia` int(11) NOT NULL,
  `nome` varchar(450) DEFAULT NULL,
  `telefone` varchar(450) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `razao_social` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `farmacia`
--

INSERT INTO `farmacia` (`id_farmacia`, `nome`, `telefone`, `cnpj`, `razao_social`) VALUES
(1, 'Drogaria SaÃºde', '(64) 3621-0722', '12.452.158/0001-60', 'drogaria SaÃºde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `id_item` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `farmacia_id_farmacia` int(11) NOT NULL,
  `medicamento_id_medicamento` int(11) NOT NULL,
  `pagamento_id_pagamento` int(11) NOT NULL,
  `receita_id_medicamento` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data` date NOT NULL,
  `referencia` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_venda`
--

INSERT INTO `item_venda` (`id_item`, `usuario_id_usuario`, `farmacia_id_farmacia`, `medicamento_id_medicamento`, `pagamento_id_pagamento`, `receita_id_medicamento`, `quantidade`, `valor`, `data`, `referencia`) VALUES
(1, 1, 1, 3, 1, 35, 2, 44, '2019-10-18', '19101810481'),
(2, 1, 1, 2, 1, 35, 2, 10, '2019-10-18', '19101810481');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

CREATE TABLE `medicamento` (
  `id_medicamento` int(11) NOT NULL,
  `nome` varchar(450) DEFAULT NULL,
  `bula` text DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`id_medicamento`, `nome`, `bula`, `quantidade`, `valor`, `status`) VALUES
(1, 'Dipirona', 'Dipirona SÃ³dica 50mg', 50, 5, 0),
(2, 'Parecetamol', 'paracetamol\r\n', 48, 5, 1),
(3, 'Amoxilina', 'Amoxilina', 48, 22, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id_pagamento`, `nome`) VALUES
(1, 'Dinheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id_medicamento` int(11) NOT NULL,
  `medico` varchar(450) DEFAULT NULL,
  `cfm` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`id_medicamento`, `medico`, `cfm`) VALUES
(1, 'gbhuj', '1569'),
(2, 'gbhuj', '1569'),
(3, 'ugybfinocmkpÃ§', '+.65421'),
(4, 'XETCRYVUB', '753741'),
(5, 'ertyu', '2345678'),
(6, 'ertyu', '2345678'),
(7, '3456789', '7532215'),
(8, '3456789', '7532215'),
(9, '3456789', '7532215'),
(10, '3456789', '7532215'),
(11, 'jhgkdk', '751'),
(12, 'jhgkdk', '751'),
(13, 'utjgnv', '965'),
(14, 'dfghjkl', '753'),
(15, '123456789', '853'),
(16, 'GIs', '752'),
(17, 'GIs', '752'),
(18, 'GIs', '752'),
(19, 'GIs', '752'),
(20, 'GIs', '752'),
(21, 'GIs', '752'),
(22, 'GIs', '752'),
(23, 'GIs', '752'),
(24, 'Lucas', '4632'),
(25, 'Lucas', '4632'),
(26, 'Lucas', '4632'),
(27, 'Lucas', '4632'),
(28, 'Lucas', '4632'),
(29, 'Lucas', '4632'),
(30, 'Lucas', '4632'),
(31, 'xcvgbh', 'fgyhino'),
(32, 'xcvgbh', 'fgyhino'),
(33, 'xcvgbh', 'fgyhino'),
(34, 'cvubhin', 'bhinjomk'),
(35, 'jl', 'kj');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(450) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `rg`, `cpf`, `nascimento`, `status`, `email`, `senha`) VALUES
(1, 'Vitor Diniz', '123', '456.789.456-28', '2000-12-15', '1', 'vitor.d1907@gmail.com', '25778413'),
(2, 'Pedro Pereira', '456321', '456.123.123-85', '1997-05-22', '0', 'pedro@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fk_endereco_usuario1_idx` (`usuario_id_usuario`);

--
-- Indexes for table `farmacia`
--
ALTER TABLE `farmacia`
  ADD PRIMARY KEY (`id_farmacia`);

--
-- Indexes for table `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item_venda_usuario_idx` (`usuario_id_usuario`),
  ADD KEY `fk_item_venda_farmacia1_idx` (`farmacia_id_farmacia`),
  ADD KEY `fk_item_venda_medicamento1_idx` (`medicamento_id_medicamento`),
  ADD KEY `fk_item_venda_pagamento1_idx` (`pagamento_id_pagamento`),
  ADD KEY `fk_item_venda_receita1_idx` (`receita_id_medicamento`);

--
-- Indexes for table `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Indexes for table `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmacia`
--
ALTER TABLE `farmacia`
  MODIFY `id_farmacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receita`
--
ALTER TABLE `receita`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_endereco_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD CONSTRAINT `fk_item_venda_farmacia1` FOREIGN KEY (`farmacia_id_farmacia`) REFERENCES `farmacia` (`id_farmacia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_medicamento1` FOREIGN KEY (`medicamento_id_medicamento`) REFERENCES `medicamento` (`id_medicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_pagamento1` FOREIGN KEY (`pagamento_id_pagamento`) REFERENCES `pagamento` (`id_pagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_receita1` FOREIGN KEY (`receita_id_medicamento`) REFERENCES `receita` (`id_medicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
