-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Nov-2022 às 20:25
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
-- Banco de dados: `gymdb`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1668519652),
('cliente', '4', 1668519652),
('cliente', '6', 1668520714),
('cliente', '8', 1668527553),
('cliente', '9', 1668982944),
('funcionario', '2', 1668519652),
('treinador', '3', 1668519652);

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
('adicionarAulas', 2, 'Adicionar aulas', NULL, NULL, 1668519652, 1668519652),
('adicionarCliente', 2, 'Adicionar cliente', NULL, NULL, 1668519652, 1668519652),
('adicionarEquipamentos', 2, 'Adicionar equipamentos', NULL, NULL, 1668519652, 1668519652),
('adicionarPlano', 2, 'Adicionar plano', NULL, NULL, 1668519652, 1668519652),
('adicionarProdutoCarrinho', 2, 'Adicionar produto ao carrinho', NULL, NULL, 1668519652, 1668519652),
('adicionarProdutos', 2, 'Adicionar Produtos', NULL, NULL, 1668519652, 1668519652),
('adicionarTrabalhador', 2, 'Adicionar trabalhador', NULL, NULL, 1668519652, 1668519652),
('admin', 1, NULL, NULL, NULL, 1668519652, 1668519652),
('alterarDadosEnvio', 2, 'Alterar dados de envio', NULL, NULL, 1668519652, 1668519652),
('alterarQuantidadeProduto', 2, 'Alterar quantidade do produto', NULL, NULL, 1668519652, 1668519652),
('cliente', 1, NULL, NULL, NULL, 1668519652, 1668519652),
('comprarProdutos', 2, 'Comprar produtos', NULL, NULL, 1668519652, 1668519652),
('consultarAula', 2, 'Consultar aula', NULL, NULL, 1668519652, 1668519652),
('consultarCliente', 2, 'Consultar cliente', NULL, NULL, 1668519652, 1668519652),
('consultarConsulta', 2, 'Consultar consulta', NULL, NULL, 1668519652, 1668519652),
('consultarEquipamentos', 2, 'Consultar equipamentos', NULL, NULL, 1668519652, 1668519652),
('consultarPerfil', 2, 'Consultar perfil', NULL, NULL, 1668519652, 1668519652),
('consultarPlano', 2, 'Consultar plano', NULL, NULL, 1668519652, 1668519652),
('consultarProdutos', 2, 'Consultar produtos', NULL, NULL, 1668519652, 1668519652),
('consultarSubscricao', 2, 'Consultar Subscricao', NULL, NULL, 1668519652, 1668519652),
('consultarTrabalhador', 2, 'Consultar trabalhador', NULL, NULL, 1668519652, 1668519652),
('criarConsulta', 2, 'Criar consulta', NULL, NULL, 1668519652, 1668519652),
('criarSubscricao', 2, 'Criar subscrição', NULL, NULL, 1668519652, 1668519652),
('desativarCliente', 2, 'Desativar cliente', NULL, NULL, 1668519652, 1668519652),
('desativarSubscricao', 2, 'Desativar Subscricao', NULL, NULL, 1668519652, 1668519652),
('desativarTrabalhador', 2, 'Desativar Trabalhador', NULL, NULL, 1668519652, 1668519652),
('editarAulas', 2, 'Editar aulas', NULL, NULL, 1668519652, 1668519652),
('editarCliente', 2, 'Editar cliente', NULL, NULL, 1668519652, 1668519652),
('editarConsulta', 2, 'Editar consulta', NULL, NULL, 1668519652, 1668519652),
('editarEquipamentos', 2, 'Editar Equipamentos', NULL, NULL, 1668519652, 1668519652),
('editarPerfil', 2, 'Editar perfil', NULL, NULL, 1668519652, 1668519652),
('editarPlano', 2, 'Editar plano', NULL, NULL, 1668519652, 1668519652),
('editarProdutos', 2, 'Editar Produtos', NULL, NULL, 1668519652, 1668519652),
('editarTrabalhador', 2, 'Editar trabalhador', NULL, NULL, 1668519652, 1668519652),
('estatisticas', 2, 'Estatisticas', NULL, NULL, 1668519652, 1668519652),
('funcionario', 1, NULL, NULL, NULL, 1668519652, 1668519652),
('loginBO', 2, 'Login BO', NULL, NULL, 1668519652, 1668519652),
('loginFO', 2, 'Login FO', NULL, NULL, 1668519652, 1668519652),
('pagamentoOnline', 2, NULL, NULL, NULL, 1668519652, 1668519652),
('pagarCarrinho', 2, 'Pagar carrinho', NULL, NULL, 1668519652, 1668519652),
('removerAulas', 2, 'Remover aulas', NULL, NULL, 1668519652, 1668519652),
('removerConsulta', 2, 'Remover consulta', NULL, NULL, 1668519652, 1668519652),
('removerEquipamentos', 2, 'Remover Equipamentos', NULL, NULL, 1668519652, 1668519652),
('removerPlano', 2, 'Remover plano', NULL, NULL, 1668519652, 1668519652),
('removerProdutoCarrinho', 2, 'Remover produto ao carrinho', NULL, NULL, 1668519652, 1668519652),
('removerProdutos', 2, 'Remover Produtos', NULL, NULL, 1668519652, 1668519652),
('treinador', 1, NULL, NULL, NULL, 1668519652, 1668519652),
('verDetalhesProdutos', 2, 'Ver Detalhes Produtos', NULL, NULL, 1668519652, 1668519652),
('verHistoricoCompras', 2, 'Ver historico de compras', NULL, NULL, 1668519652, 1668519652),
('visualizarAulas', 2, 'Visualizar aulas', NULL, NULL, 1668519652, 1668519652),
('visualizarHistoricoAulas', 2, 'Visualizar historico aulas', NULL, NULL, 1668519652, 1668519652);

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
('funcionario', 'adicionarCliente'),
('funcionario', 'adicionarEquipamentos'),
('treinador', 'adicionarPlano'),
('funcionario', 'adicionarProdutos'),
('admin', 'adicionarTrabalhador'),
('cliente', 'alterarDadosEnvio'),
('cliente', 'comprarProdutos'),
('funcionario', 'consultarAula'),
('funcionario', 'consultarCliente'),
('treinador', 'consultarCliente'),
('funcionario', 'consultarConsulta'),
('funcionario', 'consultarEquipamentos'),
('cliente', 'consultarPerfil'),
('treinador', 'consultarPlano'),
('funcionario', 'consultarProdutos'),
('funcionario', 'consultarSubscricao'),
('admin', 'consultarTrabalhador'),
('funcionario', 'criarConsulta'),
('funcionario', 'criarSubscricao'),
('funcionario', 'desativarCliente'),
('funcionario', 'desativarSubscricao'),
('admin', 'desativarTrabalhador'),
('funcionario', 'editarAulas'),
('funcionario', 'editarCliente'),
('funcionario', 'editarConsulta'),
('funcionario', 'editarEquipamentos'),
('cliente', 'editarPerfil'),
('treinador', 'editarPlano'),
('funcionario', 'editarProdutos'),
('admin', 'editarTrabalhador'),
('admin', 'estatisticas'),
('admin', 'funcionario'),
('admin', 'loginBO'),
('funcionario', 'loginBO'),
('treinador', 'loginBO'),
('cliente', 'loginFO'),
('cliente', 'pagamentoOnline'),
('cliente', 'pagarCarrinho'),
('funcionario', 'removerAulas'),
('funcionario', 'removerConsulta'),
('funcionario', 'removerEquipamentos'),
('treinador', 'removerPlano'),
('funcionario', 'removerProdutos'),
('admin', 'treinador'),
('cliente', 'verHistoricoCompras'),
('cliente', 'visualizarAulas'),
('cliente', 'visualizarHistoricoAulas');

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
-- Estrutura da tabela `itens_carrinho`
--

DROP TABLE IF EXISTS `itens_carrinho`;
CREATE TABLE IF NOT EXISTS `itens_carrinho` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produto` int NOT NULL,
  `quantidade` int NOT NULL,
  `created_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-itens_carrinho-id_produto` (`id_produto`),
  KEY `idx-itens_carrinho-created_by` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

DROP TABLE IF EXISTS `itens_pedido`;
CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(255) NOT NULL,
  `id_produto` int NOT NULL,
  `preco_unidade` decimal(10,2) NOT NULL,
  `id_pedido` int NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-itens_pedido-id_pedido` (`id_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
('m000000_000000_base', 1668516485),
('m130524_201442_init', 1668516489),
('m190124_110200_add_verification_token_column_to_user_table', 1668516489),
('m140506_102106_rbac_init', 1668517390),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1668517390),
('m180523_151638_rbac_updates_indexes_without_prefix', 1668517390),
('m200409_110543_rbac_update_mssql_trigger', 1668517390),
('m221115_124502_create_produtos_table', 1669051886),
('m221115_125058_create_user_moradas_table', 1668985299),
('m221115_130831_create_itens_pedido_table', 1668985913),
('m221115_131223_create_pedidos_table', 1668985300),
('m221115_155058_create_pedido_moradas_table', 1668985300),
('m221115_160831_create_itens_carrinho_table', 1668985300);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `preco_total` decimal(10,2) NOT NULL,
  `estado` int NOT NULL,
  `nomeproprio` varchar(45) NOT NULL,
  `apelido` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `transacao_id` varchar(255) DEFAULT NULL,
  `created_at` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-pedidos-created_at` (`created_at`),
  KEY `idx-pedidos-created_by` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_moradas`
--

DROP TABLE IF EXISTS `pedido_moradas`;
CREATE TABLE IF NOT EXISTS `pedido_moradas` (
  `pedido_id` int NOT NULL,
  `morada` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `CodPostal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pedido_id`),
  KEY `idx-pedido_moradas-pedido_id` (`pedido_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` longtext,
  `imagem` varchar(2000) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estado` tinyint NOT NULL,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-produtos-created_by` (`created_by`),
  KEY `idx-produtos-updated_by` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `imagem`, `preco`, `estado`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'abcde', '<p>abv</p>\r\n', '/produtos/9W1riCOU6rVniNDbWlsifTpiYa_UFhD7/06a.jpg', '12.00', 1, 1669051916, 1669061012, 1, 1),
(2, 'esfsef', '<p>efesfessefef</p>\r\n', NULL, '42342.00', 0, 1669053645, 1669053645, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'lTey3YJlVApLYgfPdYzjZqvuyktfqAeE', '$2y$13$.z7JHETKu1KvfB4GsfSub.csTVDCx.Valsfyw3hz4.0LmmsQWGNJS', NULL, 'admin@gmail.com', 10, 1668516989, 1668516989, 'GErKHVaRjvNYif8nUR0BIs2NDZ1GptIw_1668516989'),
(2, 'funcionario', '7g8dIIgrB6uX9ke16CeTx7npIYRtKDyu', '$2y$13$w33vOiTs9fNq4JN1mFCar.QEokNkR0nWzO97/cJtbTuBlihzWSbMm', NULL, 'funcionario@gmail.com', 9, 1668517091, 1668517091, 'LAYmCGDOTtC8fcmqGmITiVIt197u_P7a_1668517091'),
(3, 'treinador', 'wEayrkN849w7P4IiwHSCYiPofC3NcjUZ', '$2y$13$MqMY27gAl6kl.OhENgIVeOVCocW./WnhJK2UAQltVJORdVA.GMGaW', NULL, 'treinador@gmail.com', 9, 1668517102, 1668517102, 'E7bj8SZQeOkEqVZZl2CwTbKbskZU6bkf_1668517102'),
(4, 'cliente', 'igdiKEp2HcWekthSrJPFHDnxJyIJl-gh', '$2y$13$yWFIdiz8CLh/8ra8t4bT8uc2T2/DQ.CyE4i0E4zI6zM2ek.otxWAq', NULL, 'cliente@gmail.com', 10, 1668517129, 1668517129, 'egyShonj-ELql0VF7i1BTB6YHYCI4ADo_1668517129'),
(5, 'goncalo', 'ZKciUMY4rUQPxO1PW_w66njzpe4y3KTM', '$2y$13$JrxKtXbV.c0ZPs55pWLlP.41Ud4QVtEvaDQe2QD5T1uH7thV9YbEe', NULL, 'goncalo@gmail.com', 9, 1668520225, 1668520225, 'Sy3cDU4Dk_zLpjFN9_yEbhB62xa7AAFK_1668520225'),
(6, 'antonio', '_mkoH4aIP7eOOll-zRHyoY8h8gc8amGX', '$2y$13$qSuC23qdi44h4X/.DcuGfOWpBZpyso2wPJe70VHXMyAxILzzFZqOa', NULL, 'antonio@gmail.com', 10, 1668520714, 1668520714, NULL),
(7, 'ze', '5kckWfsYx62qw-RRX4PcQtNY8kjhD6rh', '$2y$13$OrhC5yA6uWdyubcvs7nWPO2ogF/bZby2dRWk8O6//4QWKPOk2O6YO', NULL, 'zezoca@gmail.com', 10, 1668527257, 1668527257, NULL),
(8, 'ric', 'e4PhtzSFmvxIHYnCzGYw7mjG1CgfIf3u', '$2y$13$xKksgott9KuoEc1o6jsbnujTKhz7/9f6HP/yd.8NnSqluDrKZ5.gm', NULL, 'pastilha123gmer@gmail.com', 10, 1668527553, 1668527553, NULL),
(9, 'toninho', 'xODktEnlrF0pLq4xSt5JubWdAlDAC9Y-', '$2y$13$ZKCORmnUdR.YAP6TsXeGSOvYaRYYAzRuscGL7/PZQlgzC7RadCOu6', NULL, 'toninho@gmail.com', 10, 1668982944, 1668982944, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_moradas`
--

DROP TABLE IF EXISTS `user_moradas`;
CREATE TABLE IF NOT EXISTS `user_moradas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `morada` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `CodPostal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-user_moradas-user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
