-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 03/09/2019 às 21:45
-- Versão do servidor: 10.0.33-MariaDB-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `farmacia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `farmacia`
--

CREATE TABLE `farmacia` (
  `id_farmacia` int(11) NOT NULL,
  `nome` varchar(450) DEFAULT NULL,
  `telefone` varchar(450) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `razao_social` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `farmacia`
--

INSERT INTO `farmacia` (`id_farmacia`, `nome`, `telefone`, `cnpj`, `razao_social`) VALUES
(1, 'Unidade Centro', '6436233286', '55.686.812/0001-24', 'Teste Mercado Ltda'),
(2, 'Unidade Presidente Vargas', '6436230332', '36.537.460/0001-09', 'Quality Mercado Ltda'),
(3, 'Unidade Popular', '6436329933', '66.600.282/0001-76', 'Quality Mercado Ltda');

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_venda`
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

--
-- Fazendo dump de dados para tabela `item_venda`
--

INSERT INTO `item_venda` (`id_item`, `usuario_id_usuario`, `farmacia_id_farmacia`, `medicamento_id_medicamento`, `pagamento_id_pagamento`, `receita_id_receita`, `quantidade`, `valor`) VALUES
(1, 5, 2, 2, 6, 1, 1, 12),
(2, 5, 2, 13, 6, 1, 1, 1),
(3, 5, 2, 10, 6, 1, 2, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicamento`
--

CREATE TABLE `medicamento` (
  `id_medicamento` int(11) NOT NULL,
  `nome` varchar(450) DEFAULT NULL,
  `bula` text,
  `quantidade` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `medicamento`
--

INSERT INTO `medicamento` (`id_medicamento`, `nome`, `bula`, `quantidade`, `valor`) VALUES
(1, 'Bombom Nestle 300gr especialidades', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 15, 10.99),
(2, 'Bombom Amandita 200g ', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 19, 12.99),
(3, 'Iogurte Nestle Chamyto 100g vitamina frut', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 25, 5.99),
(4, 'Sorvete creme mel 2L - Sonho de bombom', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 30, 21.9),
(5, 'Bebida Lactea Canto Minas 540g Morang/Coco', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 25, 3.99),
(6, 'Uva Rubi 500g', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 50, 4.99),
(7, 'Bombom Ferrero Rocher T3 Raffaello', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 15, 3.75),
(8, 'Leite Nolac Zero Lactose 1L Semidesnatado', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 30, 3.99),
(9, 'Maracuja kg ', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 50, 6.99),
(10, 'Iogurte Nestle Ninho 170g morango', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 18, 4.49),
(11, 'Laranja Bahia kg', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 300, 9.99),
(12, 'Banana terra kg', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 100, 5.49),
(13, 'Alface Crespa - Ref 12228', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 19, 1.99),
(14, 'Cheiro Verde - Ref 12228 un', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 5, 1.9),
(15, 'Couve - Ref 12228 un', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 10, 3.49),
(17, 'Pizza Sadia Sabor Bacon 460g', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 15, 9.99),
(18, 'Hot Pocket Sadia 145g frango', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 10, 6.98),
(19, 'Refrigerante Mineiro 2L Guarana', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 50, 4.78),
(20, 'Refrigerante Coca-cola 1,5L zero', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 10, 6.49),
(21, 'Refrigerante Aquarius Fresh 510ml', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 5, 4.49),
(22, 'File de Tilapia 400g', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 10, 16.99),
(23, 'Carne Bovina Musculo kg', 'As informações do produto ou embalagem exibida podem não estar atualizadas ou completas. Sempre consulte o produto físico para obter informações e avisos mais precisos. Para obter informações adicionais entre em contato com o revendedor ou fabricante.', 100, 15.49),
(25, 'Shampooõó', 'Teste de nomenclaturâ', 5, 15.99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `pagamento`
--

INSERT INTO `pagamento` (`id_pagamento`, `nome`) VALUES
(1, 'A Vista'),
(2, 'Cartao de credito'),
(3, 'Cartao de debito'),
(4, 'Cheque'),
(6, 'Bitcoin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `receita`
--

CREATE TABLE `receita` (
  `id_medicamento` int(11) NOT NULL,
  `medico` varchar(450) DEFAULT NULL,
  `cfm` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `receita`
--

INSERT INTO `receita` (`id_medicamento`, `medico`, `cfm`) VALUES
(1, 'Maria', 'nada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
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
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `rg`, `cpf`, `nascimento`, `email`, `senha`, `status`) VALUES
(3, 'Douglas', '1236547', '79668865500', '1972-05-22', 'douglas@teste.com.br', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(5, 'Gustavo Muniz', '6161616', '1616121214', '1996-01-12', 'gustavo@teste.com.br', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(9, 'Pedro Lucas Domin', '6063921', '70157769100', '1996-08-22', 'pedrolucasrv22@gmail.com', 'd9b993256f4573d37b1cdc50ea3528d8', 1),
(10, 'Douglas Teste', '1251548', '15811515863', '1992-02-21', 'douglasteste@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `farmacia`
--
ALTER TABLE `farmacia`
  ADD PRIMARY KEY (`id_farmacia`);

--
-- Índices de tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item_venda_usuario_idx` (`usuario_id_usuario`),
  ADD KEY `fk_item_venda_farmacia1_idx` (`farmacia_id_farmacia`),
  ADD KEY `fk_item_venda_medicamento1_idx` (`medicamento_id_medicamento`),
  ADD KEY `fk_item_venda_pagamento1_idx` (`pagamento_id_pagamento`),
  ADD KEY `fk_item_venda_receita1_idx` (`receita_id_receita`);

--
-- Índices de tabela `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Índices de tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `farmacia`
--
ALTER TABLE `farmacia`
  MODIFY `id_farmacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `item_venda`
--
ALTER TABLE `item_venda`
  ADD CONSTRAINT `fk_item_venda_farmacia1` FOREIGN KEY (`farmacia_id_farmacia`) REFERENCES `farmacia` (`id_farmacia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_medicamento1` FOREIGN KEY (`medicamento_id_medicamento`) REFERENCES `medicamento` (`id_medicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_pagamento1` FOREIGN KEY (`pagamento_id_pagamento`) REFERENCES `pagamento` (`id_pagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_receita1` FOREIGN KEY (`receita_id_receita`) REFERENCES `receita` (`id_medicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_venda_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
