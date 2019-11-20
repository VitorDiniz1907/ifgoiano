-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jul-2019 às 01:20
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmacia`
--
CREATE DATABASE IF NOT EXISTS `farmacia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `farmacia`;

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
(1, 'Farmacia SÃ£o Pedro', '6436233286', '55.686.812/0001-24', 'Farmacia Sao Pedro Ltda'),
(2, 'DrogaShop', '6436230332', '36.537.460/0001-09', 'Droga Shop e C&a Ltda'),
(3, 'Farmacity Online', '6436329933', '66.600.282/0001-76', 'Farmacias City EPP'),
(4, 'Farmacon', '6436548854', '35.389.150/0001-13', 'Farmacon Lojas Ltda'),
(5, 'Marlus Farm', '6436758899', '23.987.840/0001-95', 'Marlus Farm Ecomercce S/A');

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
  `valor` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

CREATE TABLE `medicamento` (
  `id_medicamento` int(11) NOT NULL,
  `nome` varchar(450) DEFAULT NULL,
  `bula` text,
  `quantidade` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`id_medicamento`, `nome`, `bula`, `quantidade`, `valor`) VALUES
(1, 'NEVRALGEX 10 COMPRIMIDOS ', 'IndicaÃ§Ãµes: Nevralgex deixa a dor para trÃ¡s! Nevralgex atua como analgÃ©sico e relaxante muscular, sendo indicado para o alÃ­vio da dor associada Ã  contraturas musculares decorrentes de processos traumÃ¡ticos ou inflamatÃ³rios e em cefaleias tensionais. Uso oral. Uso adulto. ', 30, 0.97),
(2, 'NIMESULIDA 100MG 12 COMPRIMIDOS - CIMED - GENÃ‰RICO', 'IndicaÃ§Ãµes: Este medicamento Ã© destinado ao tratamento de uma variedade de condiÃ§Ãµes que requeiram atividade antiinflamatÃ³ria, analgÃ©sica e antipirÃ©tica. Uso oral. Uso adulto e pediÃ¡trico acima de 12 anos.', 45, 2.84),
(3, 'SAL DE FRUTA ENO TRADICIONAL 2 ENVELOPES DE 5G', 'IndicaÃ§Ãµes: Sal de Fruta Eno Ã© indicado para o alÃ­vio de azia, mÃ¡ digestÃ£o e outros transtornos estomacais, tais como excesso de acidez do estÃ´mago e indigestÃ£o Ã¡cida. Os componentes do Sal de Fruta Eno, quando dissolvidos em Ã¡gua, reagem entre si, produzindo um sal de efeito antiÃ¡cido, capaz de iniciar a reduÃ§Ã£o da acidez do estÃ´mago em 6 segundos. Uso oral. Uso adulto e pediÃ¡trico acima de 12 anos de idade.', 25, 2.5),
(4, 'Ã”MEGA 3 Ã“LEO DE PEIXE 1000MG - SIDNEY OLIVEIRA 30 CÃPSULAS GELATINOSAS', 'Suplemento de Ã”mega 3 derivado de Ã³leo de peixe em cÃ¡psulas. Possui alto conteÃºdo de Ã¡cidos graxos Ã”mega 3 - EPA e DHA.', 30, 5.99),
(5, 'DIPIRONA 500MG 10 COMPRIMIDOS - MEDLEY - GENÃ‰RICO', 'IndicaÃ§Ãµes: AnalgÃ©sico e antitÃ©rmico. ', 25, 3.54),
(6, 'DORFLEX 10 COMPRIMIDOS', 'IndicaÃ§Ãµes: Dorflex atua como analgÃ©sico e relaxante muscular, sendo indicado para o alÃ­vio da dor associada Ã  contraturas musculares decorrentes de processos traumÃ¡ticos ou inflamatÃ³rios e em cefaleias tensionais. Uso adulto. ', 50, 4.27),
(7, 'NEOSORO SOLUÃ‡ÃƒO NASAL ADULTO 30ML', 'IndicaÃ§Ãµes: Ã‰ um antissÃ©ptico nasal, que atua como descongestionante e facilita a respiraÃ§Ã£o. Pode ser usado como fluidificante das secreÃ§Ãµes nasais em casos de resfriados, rinites e demais condiÃ§Ãµes associadas ao ressecamento da mucosa nasal, como nos ambientes fechados, em casos de baixa umidade do ar e de poluiÃ§Ã£o. Uso nasal. Uso adulto.', 50, 6.75),
(8, 'RANITIDINA 150MG 20 COMPRIMIDOS - CIMED - GENÃ‰RICO', 'IndicaÃ§Ãµes: Tratamento da Ãºlcera duodenal, Ãºlcera gÃ¡strica, Ãºlcera pÃ³s-operatÃ³ria, esofagite de refluxo, sÃ­ndrome de Zollinger-Ellison e quando for desejÃ¡vel a reduÃ§Ã£o da acidez e da secreÃ§Ã£o gÃ¡strica, bem como na prevenÃ§Ã£o das hemorragias gÃ¡stricas e antes da anestesia geral em pacientes propensos Ã  aspiraÃ§Ã£o Ã¡cida (sÃ­ndrome de Mendelson), especialmente pacientes obstÃ©tricas em trabalho de parto.', 30, 6.75),
(9, 'NARIDRIN ADULTO 12 HORAS 30ML', 'IndicaÃ§Ãµes: Ã‰ indicado como vasoconstritor nasal no tratamento da congestÃ£o nasal de origem alÃ©rgica ou inflamatÃ³ria, nas rinites e rinofaringites. TambÃ©m indicado para o tratamento auxiliar da congestÃ£o nasal provocada por gripes e resfriados.', 30, 14.5),
(10, 'DORALGINA 20 DRÃGEAS', 'IndicaÃ§Ãµes: Doralgina Ã© um medicamento com atividade analgÃ©sica (diminui a dor) e antiespasmÃ³dica (diminui contraÃ§Ã£o involuntÃ¡ria) indicado para o tratamento de diversos tipos de dor de cabeÃ§a, incluindo enxaquecas ou para o tratamento de cÃ³licas. Uso oral. Uso adulto. ', 20, 4.99),
(11, 'DORFLEX 36 COMPRIMIDOS', 'IndicaÃ§Ãµes: Dorflex atua como analgÃ©sico e relaxante muscular, sendo indicado para o alÃ­vio da dor associada Ã  contraturas musculares decorrentes de processos traumÃ¡ticos ou inflamatÃ³rios e em cefaleias tensionais. Uso adulto.', 30, 14),
(12, 'GARDENAL 100MG 20 COMPRIMIDOS (C1)', 'INDICAÃ‡ÃƒO: Ã‰ um barbitÃºrico com propriedades anticonvulsivantes, devido Ã  sua capacidade de elevar o limiar de convulsÃ£o. CONTRA-INDICAÃ‡Ã•ES: O fenobarbital estÃ¡ contra-indicado em casos de porfiria aguda, insuficiÃªncia respiratÃ³ria grave, insuficiÃªncia hepÃ¡tica ou renal graves e antecedentes de hipersensibilidade aos barbitÃºricos.', 12, 7.81);

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
(1, 'Ã€ Vista - dinheiro'),
(2, 'CartÃ£o de crÃ©dito'),
(3, 'CartÃ£o de dÃ©bito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id_medicamento` int(11) NOT NULL,
  `medico` varchar(450) DEFAULT NULL,
  `cfm` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `rg`, `cpf`, `nascimento`, `email`, `senha`, `status`) VALUES
(1, 'Pedro Lucas', '6063921', '70157769100', '1996-08-22', 'pedro.lucas.rv@hotmail.com', '12303', 1),
(2, 'Marlus', '1234567', '1234568900', '1997-08-22', 'marlovi@teste.com', '12345', 0);

--
-- Indexes for dumped tables
--

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
  ADD KEY `fk_item_venda_receita1_idx` (`receita_id_receita`);

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
-- AUTO_INCREMENT for table `farmacia`
--
ALTER TABLE `farmacia`
  MODIFY `id_farmacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receita`
--
ALTER TABLE `receita`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD CONSTRAINT `fk_item_venda_farmacia1` FOREIGN KEY (`farmacia_id_farmacia`) REFERENCES `farmacia` (`id_farmacia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_medicamento1` FOREIGN KEY (`medicamento_id_medicamento`) REFERENCES `medicamento` (`id_medicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_pagamento1` FOREIGN KEY (`pagamento_id_pagamento`) REFERENCES `pagamento` (`id_pagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_receita1` FOREIGN KEY (`receita_id_receita`) REFERENCES `receita` (`id_medicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
