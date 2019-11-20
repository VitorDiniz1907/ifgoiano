-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Ago-2019 às 01:24
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, 'Unidade Centro', '6436233286', '55.686.812/0001-24', 'Quality Mercado Ltda'),
(2, 'Unidade Presidente Vargas', '6436230332', '36.537.460/0001-09', 'Quality Mercado Ltda'),
(3, 'Unidade Popular', '6436329933', '66.600.282/0001-76', 'Quality Mercado Ltda');

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
  `bula` text DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`id_medicamento`, `nome`, `bula`, `quantidade`, `valor`) VALUES
(1, 'Bombom NestlÃ© 300gr especialidades', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 15, 10.99),
(2, 'Bombom Amandita 200g ', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 10, 12.99),
(3, 'Iogurte Nestle Chamyto 100g vitamina frut', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 25, 5.99),
(4, 'Sorvete creme mel 2L - Sonho de bombom', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 30, 21.9),
(5, 'Bebida Lactea Canto Minas 540g Morang/Coco', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 25, 3.99),
(6, 'Uva Rubi 500g', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 50, 4.99),
(7, 'Bombom Ferrero Rocher T3 Raffaello', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 15, 3.75),
(8, 'Leite Nolac Zero Lactose 1L Semidesnatado', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 30, 3.99),
(9, 'Maracuja kg ', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 50, 6.99),
(10, 'Iogurte Nestle Ninho 170g morango', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 20, 4.49),
(11, 'Laranja Bahia kg', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 300, 9.99),
(12, 'Banana terra kg', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 100, 5.49),
(13, 'Alface Crespa - Ref 12228', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 10, 1.99),
(14, 'Cheiro Verde - Ref 12228 un', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 5, 1.9),
(15, 'Couve - Ref 12228 un', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 10, 3.49),
(16, 'AchocolatadoPronto Nescau 200ml ', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 50, 3.49),
(17, 'Pizza Sadia Sabor Bacon 460g', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 15, 9.99),
(18, 'Hot Pocket Sadia 145g frango', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 10, 6.98),
(19, 'Refrigerante Mineiro 2L GuaranÃ¡', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 50, 4.78),
(20, 'Refrigerante Coca-cola 1,5L zero', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 10, 6.49),
(21, 'Refrigerante Aquarius Fresh 510ml', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 5, 4.49),
(22, 'File de Tilapia 400g', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 10, 16.99),
(23, 'Carne Bovina Musculo kg', 'As informaÃ§Ãµes do produto ou embalagem exibida podem nÃ£o estar atualizadas ou completas. Sempre consulte o produto fÃ­sico para obter informaÃ§Ãµes e avisos mais precisos. Para obter informaÃ§Ãµes adicionais entre em contato com o revendedor ou fabricante.', 100, 15.49);

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
(1, 'Ã€ Vista'),
(2, 'CartÃ£o de crÃ©dito'),
(3, 'CartÃ£o de dÃ©bito'),
(4, 'Cheque');

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
(2, 'Marlus', '1234567', '1234568900', '1997-08-22', 'marlovi@teste.com', '12345', 0),
(3, 'Douglas', '1236547', '79668865500', '1972-05-22', 'douglas@teste.com.br', '12345', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `farmacia`
--
ALTER TABLE `farmacia`
  ADD PRIMARY KEY (`id_farmacia`);

--
-- Índices para tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item_venda_usuario_idx` (`usuario_id_usuario`),
  ADD KEY `fk_item_venda_farmacia1_idx` (`farmacia_id_farmacia`),
  ADD KEY `fk_item_venda_medicamento1_idx` (`medicamento_id_medicamento`),
  ADD KEY `fk_item_venda_pagamento1_idx` (`pagamento_id_pagamento`),
  ADD KEY `fk_item_venda_receita1_idx` (`receita_id_receita`);

--
-- Índices para tabela `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Índices para tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `farmacia`
--
ALTER TABLE `farmacia`
  MODIFY `id_farmacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
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
