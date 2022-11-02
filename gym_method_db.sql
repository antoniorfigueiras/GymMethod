-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Nov-2022 às 13:39
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gym_method_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1666787405),
('cliente', '5', 1666787405),
('funcionario', '2', 1666787405),
('nutricionista', '4', 1666787405),
('treinador', '3', 1666787405);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('adicionarAulas', 2, 'Adicionar aulas', NULL, NULL, 1666787405, 1666787405),
('admin', 1, NULL, NULL, NULL, 1666787405, 1666787405),
('cliente', 1, NULL, NULL, NULL, 1666787405, 1666787405),
('editarAulas', 2, 'Editar aulas', NULL, NULL, 1666787405, 1666787405),
('funcionario', 1, NULL, NULL, NULL, 1666787405, 1666787405),
('nutricionista', 1, NULL, NULL, NULL, 1666787405, 1666787405),
('registarCliente', 2, 'Registar Cliente', NULL, NULL, 1666787405, 1666787405),
('registarFuncionario', 2, 'Registar Funcionario', NULL, NULL, 1666787405, 1666787405),
('removerAulas', 2, 'Remover aulas', NULL, NULL, 1666787405, 1666787405),
('treinador', 1, NULL, NULL, NULL, 1666787405, 1666787405);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('funcionario', 'adicionarAulas'),
('admin', 'cliente'),
('funcionario', 'editarAulas'),
('admin', 'funcionario'),
('admin', 'nutricionista'),
('funcionario', 'registarCliente'),
('admin', 'registarFuncionario'),
('funcionario', 'removerAulas'),
('admin', 'treinador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1666786062),
('m140506_102106_rbac_init', 1666786063),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1666786063),
('m180523_151638_rbac_updates_indexes_without_prefix', 1666786063),
('m200409_110543_rbac_update_mssql_trigger', 1666786063),
('m130524_201442_init', 1666786084),
('m190124_110200_add_verification_token_column_to_user_table', 1666786084);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'NKTarfsbu_OL9GOYOIc0eUCBulDf-J-L', '$2y$13$26GZ0Rnc/PzKlAuKKAeb5Ol/r0Mn9WXCN23wJ8dZiUm3ZPsoBjAr6', NULL, 'admin@gmail.com', 10, 1666786329, 1666786329, 'hxxliXpIYMcKNgZjXZ11x8huEVMoMiF7_1666786329'),
(2, 'funcionario', 'WM394HF_Ob5QRGb_YmPH5Gp1pt0gMcbw', '$2y$13$nSqkw.U6JT3W.tbo1miD9uJtnoBLfJXvEDpXowuLgZP0RxGjvQu56', NULL, 'funcionario@gmail.com', 10, 1666786365, 1666786365, 'wYW5OAAcTxBSpVG83RCMs88TrG4IgTmb_1666786365'),
(3, 'treinador', 'g5ZXmI4MboBb-d98tTdc1dLWZ-RXIRYg', '$2y$13$mzWqSmPrtGX7IpFt2f.xzu.mxq/Hu9fMbsbrc2pOmv6IXaRFf.QVu', NULL, 'treinador@gmail.com', 10, 1666786382, 1666786382, 'X3y2Ca-bxXFimkZPCX-SnV0C4sZJLR1H_1666786382'),
(4, 'nutricionista', 'Fem3LTBsesZNcMZRPaoSc3AnJNw-Esk2', '$2y$13$epFrzeh9gEJJkTaUdK7XQ.LYRbBNaAlr6YQTgHW4EZ2E60E9/3lq.', NULL, 'nutricionista@gmail.com', 10, 1666786438, 1666786438, 'kjIXs7irVEY_d_3UuqR9J5r4x0Rwpnfn_1666786438'),
(5, 'cliente', 'oUmlL7Cg3OFCzjjQfnWvcH1twuDn3wkB', '$2y$13$Xk6hXPH3OiETtmi9lPrNUe4ATqUOZfuopvAPCYx5hyR5oqtl6.s6i', NULL, 'cliente@gmail.com', 10, 1666786460, 1666786460, 'fgMIULHrzhUsTZL2YPWxLDaC-y_jekYV_1666786460');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
