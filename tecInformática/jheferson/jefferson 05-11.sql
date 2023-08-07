-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05-Nov-2019 às 13:18
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
-- Database: `jefferson`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `logradouro` varchar(450) DEFAULT NULL,
  `numero` varchar(450) DEFAULT NULL,
  `complemento` varchar(450) DEFAULT NULL,
  `cidade` varchar(450) DEFAULT NULL,
  `estado` varchar(450) DEFAULT NULL,
  `cep` varchar(450) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `bairro` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `logradouro`, `numero`, `complemento`, `cidade`, `estado`, `cep`, `usuario_idusuario`, `bairro`) VALUES
(1, 'ctyvgbuhni', 'werxtcrfyvgubhi', 'w4xerctvygbuhn', 'vygbuhnijmo', 'AL', 'gh8u9jmi,p', 4, NULL),
(2, 'fghjk', 'cvbnm', 'ghjm,', 'bnm', 'AC', 'ybhnum', 4, NULL),
(3, 'yguhij', 'yghuj', 'hjk', 'ghj', 'AC', 'j', 4, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `farmacia`
--

CREATE TABLE `farmacia` (
  `idfarmacia` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `razaoSocial` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `farmacia`
--

INSERT INTO `farmacia` (`idfarmacia`, `nome`, `telefone`, `cnpj`, `razaoSocial`) VALUES
(3, 'farmacia teste', '123', '321', NULL),
(4, 'ogweljn', 'oerlnsgd', 'orlndsvm', 'orisdvnl'),
(5, 'Ã§srkgdv,.', 'lsdknvx', 'Ã§dskmv', 'lÃ§mkdsvx'),
(6, 'Jeff', '1245843', '+9845312984651653', 'zxrctvybuijpoÃ§knm,'),
(7, 'farmacia teste', '123', '321', NULL),
(8, 'farmacia teste', '123', '321', NULL),
(9, 'farmacia teste', '123', '321', 'teste'),
(10, 'farmacia teste', '123', '321', 'teste'),
(11, 'farmacia teste', '123', '321', 'teste'),
(12, 'farmacia teste', '123', '321', 'teste'),
(13, 'Jefffarmacia', '333', '333', 'testee'),
(14, 'farmacia teste2', '123', '321', 'teste'),
(15, '', '', '', ''),
(16, '', '', '', '');

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
  `receita_id_receita` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `logradouro` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `bairro` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `cidade` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `estado` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `referencia` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_venda`
--

INSERT INTO `item_venda` (`id_item`, `usuario_id_usuario`, `farmacia_id_farmacia`, `medicamento_id_medicamento`, `pagamento_id_pagamento`, `receita_id_receita`, `quantidade`, `valor`, `logradouro`, `bairro`, `cidade`, `estado`, `referencia`, `data`) VALUES
(7, 2, 3, 1, 1, 16, 2, 10, '0', '0', '0', '0', '0', '0000-00-00'),
(8, 2, 3, 2, 1, 16, 1, 5.5, '0', '0', '0', '0', '0', '0000-00-00'),
(9, 2, 3, 3, 1, 16, 1, 7.2, '0', '0', '0', '0', '0', '0000-00-00'),
(10, 2, 3, 1, 1, 16, 1, 5, '0', '0', '0', '0', '0', '0000-00-00'),
(11, 2, 3, 3, 1, 16, 1, 7.2, '0', '0', '0', '0', '0', '0000-00-00'),
(12, 2, 3, 2, 1, 16, 2, 11, '0', '0', '0', '0', '0', '0000-00-00'),
(13, 4, 4, 3, 2, 33, 2, 14.4, 'Rua B', 'Centro', 'Rio Verde', 'Goias', '0', '0000-00-00'),
(14, 4, 3, 3, 2, 34, 2, 14.4, 'yvgubhnijmok,l', 'fvgbhnjmlk,ç', 'ygbuhnlkm', ',çgbuhnijmk', '0', '0000-00-00'),
(15, 4, 4, 3, 2, 35, 1, 7.2, '7tvy8biunoim', 'cvbuyinuomi', 'yvubyinuomi', 'byiunom', '0', '0000-00-00'),
(16, 4, 4, 3, 2, 38, 1, 7.2, 'wedfgbhn', 'ghjm,', 'dfgbhn', 'jhgf', '0', '0000-00-00'),
(17, 4, 4, 2, 2, 39, 1, 5.5, 'omkfd', 'oljkdr', 'ojsld ', 'ojld g', '0', '0000-00-00'),
(18, 4, 4, 2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-08'),
(19, 4, 4, 2, 2, 60, 3, 16.5, 'fgyhuij', 'ghjk', 'guhij', 'guhj', '1710201921374', '2019-10-17'),
(20, 4, 3, 3, 1, 61, 2, 14.4, ' hijklk', 'hnjmkl', 'jkl', 'hnijm', '2910201910334', '2019-10-29'),
(21, 4, 3, 2, 1, 61, 1, 5.5, ' hijklk', 'hnjmkl', 'jkl', 'hnijm', '2910201910334', '2019-10-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

CREATE TABLE `medicamento` (
  `idmedicamento` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `bula` mediumtext DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`idmedicamento`, `nome`, `bula`, `quantidade`, `valor`) VALUES
(2, 'dorflex', 'analgesico', 200, 5.5),
(3, 'medicamento teste', 'analgesico', 20, 7.2),
(4, 'maconha medicinal em cÃ¡psula', 'analgesico', 20, 25),
(5, 'metanfetamina', 'Vende mÃ³veis  do quarto', 200, 150);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idpagamento` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`idpagamento`, `nome`) VALUES
(1, 'CartÃ£o de CrÃ©dito'),
(2, 'Dinheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `idreceita` int(11) NOT NULL,
  `medico` varchar(45) DEFAULT NULL,
  `cfm` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`idreceita`, `medico`, `cfm`) VALUES
(1, 'rewq', '753'),
(2, 'rewq', '753'),
(3, '', ''),
(4, 'gc', '465'),
(5, 'noldk', '4856'),
(6, 'noldk', '4856'),
(7, 'Ramiro', '4653'),
(8, '', ''),
(9, 'Ramiro', '162'),
(10, 'Ramiro', '162'),
(11, 'ctfvgybuhnijmok', '65'),
(12, 'ctfvgybuhnijmok', '65'),
(13, 'Doutor estranho', 'vbdbc'),
(14, 'Doutor estranho', '446465'),
(15, '', ''),
(16, 'Doutor estranho', 'vbdbc'),
(17, '', ''),
(18, 'ramiro', '7532215'),
(19, 'ramiro', '7532215'),
(20, 'ramiro', '7532215'),
(21, 'ramiro', '7532215'),
(22, 'ramiro', '7532215'),
(23, 'ramiro', '452'),
(24, 'ramiro', '452'),
(25, 'Felipe', '753'),
(26, 'Felipe', '753'),
(27, 'Felipe', '753'),
(28, 'Felipe', '753'),
(29, 'Felipe', '753'),
(30, 'Jose', '15985'),
(31, 'Jose', '15985'),
(32, 'Jose', '15985'),
(33, 'Jose', '15985'),
(34, 'dfghjk\'', '743910632'),
(35, '</script>uviybuo', 'cvbuyinuomi'),
(36, '</script>uviybuo', 'cvbuyinuomi'),
(37, '</script>uviybuo', 'cvbuyinuomi'),
(38, '3erfgbn', 'kjhgfdsz'),
(39, 'wed', '7452'),
(40, 'cvubyiu', 'vbuhin'),
(41, 'cvubyiu', 'vbuhin'),
(42, 'cvubyiu', 'vbuhin'),
(43, 'cvubyiu', 'vbuhin'),
(44, '', ''),
(45, 'dfghjkplhjklÃ§', 'fgyhuji'),
(46, 'dfghjkplhjklÃ§', 'fgyhuji'),
(47, 'dfghjkplhjklÃ§', 'fgyhuji'),
(48, 'dfghjkplhjklÃ§', 'fgyhuji'),
(49, 'dfghjkplhjklÃ§', 'fgyhuji'),
(50, 'dfghjkplhjklÃ§', 'fgyhuji'),
(51, 'dfghjkplhjklÃ§', 'fgyhuji'),
(52, 'dfghjkplhjklÃ§', 'fgyhuji'),
(53, 'dfghjkplhjklÃ§', 'fgyhuji'),
(54, 'dfghjkplhjklÃ§', 'fgyhuji'),
(55, 'dfghjkplhjklÃ§', 'fgyhuji'),
(56, 'dfghjkplhjklÃ§', 'fgyhuji'),
(57, 'dfghjkplhjklÃ§', 'fgyhuji'),
(58, 'dfghjkplhjklÃ§', 'fgyhuji'),
(59, 'dfghjkplhjklÃ§', 'fgyhuji'),
(60, 'dfghjkplhjklÃ§', 'fgyhuji'),
(61, 'vbuni', 'buhnijmo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `rg` int(11) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `senha`, `rg`, `cpf`, `nascimento`, `status`) VALUES
(1, 'admin', 'admin@mail.com', '321', 147369, '147369', '2019-07-02', 1),
(3, 'mais um usuÃ¡rio teste', 'maisumusuario@mail.com', '14569', 2146316545, '111', '2019-07-12', 0),
(4, 'Vitor Diniz', 'vitor@gmail.com', '123', 456789, '123.485.753-52', '2000-12-15', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fk_endereco_usuario1_idx` (`usuario_idusuario`);

--
-- Indexes for table `farmacia`
--
ALTER TABLE `farmacia`
  ADD PRIMARY KEY (`idfarmacia`);

--
-- Indexes for table `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item_venda_usuario_idx` (`usuario_id_usuario`),
  ADD KEY `fk_item_venda_farmacia1_idx` (`farmacia_id_farmacia`),
  ADD KEY `fk_item_venda_medicamento1_idx` (`medicamento_id_medicamento`),
  ADD KEY `fk_item_venda_pagamento1_idx` (`pagamento_id_pagamento`),
  ADD KEY `fk_item_venda_receita1_idx` (`receita_id_receita`);

--
-- Indexes for table `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`idmedicamento`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idpagamento`);

--
-- Indexes for table `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`idreceita`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmacia`
--
ALTER TABLE `farmacia`
  MODIFY `idfarmacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `idmedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idpagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receita`
--
ALTER TABLE `receita`
  MODIFY `idreceita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_endereco_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
