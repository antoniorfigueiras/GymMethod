-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2023 at 01:53 PM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymdb_teste`
--
CREATE DATABASE IF NOT EXISTS `gymdb_teste` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gymdb_teste`;

-- --------------------------------------------------------

--
-- Table structure for table `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `id_aulas_horario` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `ocupacao` int(11) NOT NULL DEFAULT '0',
  `status` enum('Aberto','Cheio','Já decorreu') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Aberto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aulas_horario`
--

CREATE TABLE `aulas_horario` (
  `id` int(11) NOT NULL,
  `id_modalidade` int(11) DEFAULT NULL,
  `id_instrutor` int(11) DEFAULT NULL,
  `diaSemana` enum('segunda','terça','quarta','quinta','sexta','sábado') COLLATE utf8_unicode_ci NOT NULL,
  `inicio` time DEFAULT NULL,
  `fim` time DEFAULT NULL,
  `capacidade` int(11) NOT NULL DEFAULT '10',
  `status` enum('Ativo','Inativo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1672863949),
('cliente', '107', 1672863949),
('cliente', '4', 1672863949),
('funcionario', '108', 1672863949),
('funcionario', '2', 1672863949),
('nutricionista', '111', 1672863949),
('nutricionista', '112', 1672863949),
('treinador', '109', 1672863949),
('treinador', '110', 1672863949);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('adicionarAula', 2, 'Adicionar aula', NULL, NULL, 1672863949, 1672863949),
('adicionarCliente', 2, 'Adicionar cliente', NULL, NULL, 1672863949, 1672863949),
('adicionarEquipamento', 2, 'Adicionar equipamento', NULL, NULL, 1672863949, 1672863949),
('adicionarFuncionario', 2, 'Adicionar Funcionario', NULL, NULL, 1672863949, 1672863949),
('adicionarModalidade', 2, 'Adicionar mobalidade', NULL, NULL, 1672863949, 1672863949),
('adicionarNutricionista', 2, 'Adicionar nutricionista', NULL, NULL, 1672863949, 1672863949),
('adicionarPlano', 2, 'Adicionar plano treino', NULL, NULL, 1672863949, 1672863949),
('adicionarProdutos', 2, 'Adicionar Produtos', NULL, NULL, 1672863949, 1672863949),
('adicionarTreinador', 2, 'Adicionar Treinador', NULL, NULL, 1672863949, 1672863949),
('admin', 1, NULL, NULL, NULL, 1672863949, 1672863949),
('cliente', 1, NULL, NULL, NULL, 1672863949, 1672863949),
('consultarAula', 2, 'Consultar aula', NULL, NULL, 1672863949, 1672863949),
('consultarCliente', 2, 'Consultar cliente', NULL, NULL, 1672863949, 1672863949),
('consultarConsulta', 2, 'Consultar consulta', NULL, NULL, 1672863949, 1672863949),
('consultarEquipamento', 2, 'Consultar equipamento', NULL, NULL, 1672863949, 1672863949),
('consultarFuncionario', 2, 'Consultar Funcionario', NULL, NULL, 1672863949, 1672863949),
('consultarModalidade', 2, 'Consultar modalidade', NULL, NULL, 1672863949, 1672863949),
('consultarNutricionista', 2, 'Consultar nutricionista', NULL, NULL, 1672863949, 1672863949),
('consultarPerfil', 2, 'Consultar perfil', NULL, NULL, 1672863949, 1672863949),
('consultarPlano', 2, 'Consultar plano treino', NULL, NULL, 1672863949, 1672863949),
('consultarProdutos', 2, 'Consultar produtos', NULL, NULL, 1672863949, 1672863949),
('consultarSubscricao', 2, 'Consultar Subscricao', NULL, NULL, 1672863949, 1672863949),
('consultarTreinador', 2, 'Consultar Treinador', NULL, NULL, 1672863949, 1672863949),
('criarConsulta', 2, 'Criar consulta', NULL, NULL, 1672863949, 1672863949),
('criarSubscricao', 2, 'Criar subscrição', NULL, NULL, 1672863949, 1672863949),
('dashboard', 2, 'Dashboard', NULL, NULL, 1672863949, 1672863949),
('desativarCliente', 2, 'Desativar cliente', NULL, NULL, 1672863949, 1672863949),
('desativarFuncionario', 2, 'Desativar Funcionario', NULL, NULL, 1672863949, 1672863949),
('desativarNutricionista', 2, 'Desativar Nutricionista', NULL, NULL, 1672863949, 1672863949),
('desativarSubscricao', 2, 'Desativar Subscricao', NULL, NULL, 1672863949, 1672863949),
('desativarTreinador', 2, 'Desativar Treinador', NULL, NULL, 1672863949, 1672863949),
('editarAula', 2, 'Editar aula', NULL, NULL, 1672863949, 1672863949),
('editarCliente', 2, 'Editar cliente', NULL, NULL, 1672863949, 1672863949),
('editarConsulta', 2, 'Editar consulta', NULL, NULL, 1672863949, 1672863949),
('editarEquipamento', 2, 'Editar Equipamento', NULL, NULL, 1672863949, 1672863949),
('editarFuncionario', 2, 'Editar Funcionario', NULL, NULL, 1672863949, 1672863949),
('editarModalidade', 2, 'Editar modalidade', NULL, NULL, 1672863949, 1672863949),
('editarNutricionista', 2, 'Editar nutricionista', NULL, NULL, 1672863949, 1672863949),
('editarPerfil', 2, 'Editar perfil', NULL, NULL, 1672863949, 1672863949),
('editarPlano', 2, 'Editar plano treino', NULL, NULL, 1672863949, 1672863949),
('editarProdutos', 2, 'Editar Produtos', NULL, NULL, 1672863949, 1672863949),
('editarTreinador', 2, 'Editar Treinador', NULL, NULL, 1672863949, 1672863949),
('funcionario', 1, NULL, NULL, NULL, 1672863949, 1672863949),
('loginBO', 2, 'Login BO', NULL, NULL, 1672863949, 1672863949),
('loginFO', 2, 'Login FO', NULL, NULL, 1672863949, 1672863949),
('nutricionista', 1, NULL, NULL, NULL, 1672863949, 1672863949),
('removerAula', 2, 'Remover aula', NULL, NULL, 1672863949, 1672863949),
('removerConsulta', 2, 'Remover consulta', NULL, NULL, 1672863949, 1672863949),
('removerEquipamento', 2, 'Remover Equipamento', NULL, NULL, 1672863949, 1672863949),
('removerModalidade', 2, 'Remover modalidade', NULL, NULL, 1672863949, 1672863949),
('removerPlano', 2, 'Remover plano treino', NULL, NULL, 1672863949, 1672863949),
('removerProdutos', 2, 'Remover Produtos', NULL, NULL, 1672863949, 1672863949),
('treinador', 1, NULL, NULL, NULL, 1672863949, 1672863949);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('funcionario', 'adicionarAula'),
('funcionario', 'adicionarCliente'),
('funcionario', 'adicionarEquipamento'),
('admin', 'adicionarFuncionario'),
('funcionario', 'adicionarModalidade'),
('admin', 'adicionarNutricionista'),
('treinador', 'adicionarPlano'),
('funcionario', 'adicionarProdutos'),
('admin', 'adicionarTreinador'),
('admin', 'cliente'),
('funcionario', 'consultarAula'),
('funcionario', 'consultarCliente'),
('nutricionista', 'consultarCliente'),
('treinador', 'consultarCliente'),
('funcionario', 'consultarConsulta'),
('nutricionista', 'consultarConsulta'),
('funcionario', 'consultarEquipamento'),
('admin', 'consultarFuncionario'),
('funcionario', 'consultarModalidade'),
('admin', 'consultarNutricionista'),
('cliente', 'consultarPerfil'),
('treinador', 'consultarPlano'),
('funcionario', 'consultarProdutos'),
('funcionario', 'consultarSubscricao'),
('admin', 'consultarTreinador'),
('funcionario', 'criarConsulta'),
('nutricionista', 'criarConsulta'),
('funcionario', 'criarSubscricao'),
('admin', 'dashboard'),
('funcionario', 'desativarCliente'),
('admin', 'desativarFuncionario'),
('admin', 'desativarNutricionista'),
('funcionario', 'desativarSubscricao'),
('admin', 'desativarTreinador'),
('funcionario', 'editarAula'),
('funcionario', 'editarCliente'),
('funcionario', 'editarConsulta'),
('nutricionista', 'editarConsulta'),
('funcionario', 'editarEquipamento'),
('admin', 'editarFuncionario'),
('funcionario', 'editarModalidade'),
('admin', 'editarNutricionista'),
('cliente', 'editarPerfil'),
('treinador', 'editarPlano'),
('funcionario', 'editarProdutos'),
('admin', 'editarTreinador'),
('admin', 'funcionario'),
('admin', 'loginBO'),
('funcionario', 'loginBO'),
('nutricionista', 'loginBO'),
('treinador', 'loginBO'),
('cliente', 'loginFO'),
('admin', 'nutricionista'),
('funcionario', 'removerAula'),
('funcionario', 'removerConsulta'),
('nutricionista', 'removerConsulta'),
('funcionario', 'removerEquipamento'),
('funcionario', 'removerModalidade'),
('treinador', 'removerPlano'),
('funcionario', 'removerProdutos'),
('admin', 'treinador');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nome` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` longtext COLLATE utf8mb4_unicode_ci,
  `data` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `cliente_id` int(11) NOT NULL,
  `nutricionista_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`id`, `nome`, `descricao`, `data`, `estado`, `cliente_id`, `nutricionista_id`) VALUES
(9, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(10, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(12, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(13, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(15, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(16, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(18, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(19, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(21, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(22, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(24, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(25, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(27, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(28, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(30, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(31, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(33, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(34, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(36, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(37, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(39, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(40, 'Consulta Rotina', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 1, 1),
(42, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(43, 'Consulta Update', 'Descricao Update', '2022-12-29 02:10:00', 1, 3, 2),
(45, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(46, 'Consulta Update', 'Descricao Update', '2022-12-29 02:10:00', 1, 3, 2),
(48, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(49, 'Consulta Update', 'Descricao Update', '2022-12-29 02:10:00', 1, 3, 2),
(51, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(52, 'Consulta Update', 'Descricao Update', '2022-12-29 02:10:00', 1, 3, 2),
(54, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(55, 'Consulta Update', 'Descricao Update', '2022-12-29 02:10:00', 1, 3, 2),
(57, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(58, 'Consulta Update', 'Descricao Update', '2022-12-29 02:10:00', 1, 3, 2),
(60, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(61, 'Consulta Update', 'Descricao Update', '2022-12-29 02:10:00', 1, 3, 2),
(63, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(64, 'Consulta Update', 'Descricao Update', '2022-12-29 02:10:00', 1, 3, 2),
(66, 'Consulta de Nutrição', 'Consulta para um plano novo de Nutrição', '2022-12-29 02:10:00', 1, 3, 2),
(67, 'Consulta Update', 'Descricao Update', '2022-12-29 02:10:00', 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercicio`
--

CREATE TABLE `exercicio` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descricao` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dificuldade` varchar(20) CHARACTER SET latin1 NOT NULL,
  `exemplo` longblob NOT NULL,
  `equipamento_id` int(11) DEFAULT NULL,
  `tipo_exercicio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercicio_plano`
--

CREATE TABLE `exercicio_plano` (
  `id` int(11) NOT NULL,
  `parameterizacao_id` int(11) NOT NULL,
  `exercicio_id` int(11) NOT NULL,
  `plano_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inscricoes`
--

CREATE TABLE `inscricoes` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itens_carrinho`
--

CREATE TABLE `itens_carrinho` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `preco_unidade` decimal(10,2) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `preco_unidade` decimal(10,2) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
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
('m221115_160831_create_itens_carrinho_table', 1668985300),
('m221123_154218_create_perfil_table', 1669218475),
('m221123_162103_create_consultas_table', 1669220957),
('m221123_162753_create_exercicios_table', 1669220957),
('m221123_163056_create_equipamentos_table', 1669221149),
('m221123_164224_create_tipos_subscricao_table', 1669221898),
('m221123_164344_create_subscricoes_table', 1669221898),
('m221123_165049_create_tipo_exercicios_table', 1669222310),
('m221123_165213_create_plano_treinos_table', 1669222474);

-- --------------------------------------------------------

--
-- Table structure for table `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(56) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parameterizacoes`
--

CREATE TABLE `parameterizacoes` (
  `id` int(11) NOT NULL,
  `series` int(11) DEFAULT NULL,
  `seriesCliente` int(11) DEFAULT NULL,
  `repeticoes` int(11) DEFAULT NULL,
  `repeticoesCliente` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `pesoCliente` int(11) DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  `tempoCliente` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `preco_total` decimal(10,2) NOT NULL,
  `estado` int(11) NOT NULL,
  `nomeproprio` varchar(45) NOT NULL,
  `apelido` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `transacao_id` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pedido_moradas`
--

CREATE TABLE `pedido_moradas` (
  `pedido_id` int(11) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `CodPostal` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `user_id` int(11) NOT NULL,
  `telemovel` int(9) NOT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `nomeproprio` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apelido` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` int(9) NOT NULL,
  `codpostal` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morada` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plano_treino`
--

CREATE TABLE `plano_treino` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `instrutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` longtext,
  `imagem` varchar(2000) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `imagem`, `preco`, `estado`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(16, 'ProdutoUpdate', 'DescricaoUpdate', NULL, '10.00', 1, 1673212017, 1673272078, 1, 1),
(5, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211128, 1673211128, 1, 1),
(3, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211034, 1673211034, 1, 1),
(6, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211146, 1673211146, 1, 1),
(7, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211146, 1673211146, 1, 1),
(8, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211251, 1673211251, 1, 1),
(9, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211252, 1673211252, 1, 1),
(10, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211488, 1673211488, 1, 1),
(11, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211488, 1673211488, 1, 1),
(12, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211488, 1673211488, 1, 1),
(13, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211757, 1673211757, 1, 1),
(14, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211758, 1673211758, 1, 1),
(15, 'Produto', 'Descricao', NULL, '10.00', 1, 1673211758, 1673211758, 1, 1),
(17, 'Produto', 'Descricao', NULL, '10.00', 1, 1673212017, 1673212017, 1, 1),
(18, 'Produto', 'Descricao', NULL, '10.00', 1, 1673212018, 1673212018, 1, 1),
(19, 'Produto', 'Descricao', NULL, '10.00', 1, 1673212361, 1673212361, 1, 1),
(20, 'Produto', 'Descricao', NULL, '10.00', 1, 1673212361, 1673212361, 1, 1),
(21, 'Produto', 'Descricao', NULL, '10.00', 1, 1673212361, 1673212361, 1, 1),
(22, 'Produto', 'Descricao', NULL, '10.00', 1, 1673212392, 1673212392, 1, 1),
(23, 'Produto', 'Descricao', NULL, '10.00', 1, 1673212393, 1673212393, 1, 1),
(24, 'Produto', 'Descricao', NULL, '10.00', 1, 1673212393, 1673212393, 1, 1),
(25, 'Produto', 'Descricao', NULL, '10.00', 1, 1673213908, 1673213908, 1, 1),
(26, 'Produto', 'Descricao', NULL, '10.00', 1, 1673213908, 1673213908, 1, 1),
(27, 'Produto', 'Descricao', NULL, '10.00', 1, 1673213909, 1673213909, 1, 1),
(28, 'Produto', 'Descricao', NULL, '10.00', 1, 1673223051, 1673223051, 1, 1),
(29, 'Produto', 'Descricao', NULL, '10.00', 1, 1673223051, 1673223051, 1, 1),
(30, 'Produto', 'Descricao', NULL, '10.00', 1, 1673223051, 1673223051, 1, 1),
(31, 'Produto', 'Descricao', NULL, '10.00', 1, 1673257063, 1673257063, 1, 1),
(32, 'Produto', 'Descricao', NULL, '10.00', 1, 1673257063, 1673257063, 1, 1),
(33, 'Produto', 'Descricao', NULL, '10.00', 1, 1673257063, 1673257063, 1, 1),
(34, 'Produto', 'Descricao', NULL, '10.00', 1, 1673272077, 1673272077, 1, 1),
(35, 'Produto', 'Descricao', NULL, '10.00', 1, 1673272078, 1673272078, 1, 1),
(36, 'Produto', 'Descricao', NULL, '10.00', 1, 1673272079, 1673272079, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscricoes`
--

CREATE TABLE `subscricoes` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_subscricao` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipos_subscricao`
--

CREATE TABLE `tipos_subscricao` (
  `id` int(11) NOT NULL,
  `nome` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_exercicio`
--

CREATE TABLE `tipo_exercicio` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_moradas`
--

CREATE TABLE `user_moradas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `CodPostal` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aulas_horario` (`id_aulas_horario`);

--
-- Indexes for table `aulas_horario`
--
ALTER TABLE `aulas_horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modalidade` (`id_modalidade`),
  ADD KEY `id_instrutor` (`id_instrutor`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-consultas-idcliente` (`cliente_id`);

--
-- Indexes for table `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipamento_id` (`equipamento_id`),
  ADD KEY `tipo_exercicio_id` (`tipo_exercicio_id`);

--
-- Indexes for table `exercicio_plano`
--
ALTER TABLE `exercicio_plano`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parameterizacao_id` (`parameterizacao_id`),
  ADD KEY `plano_id` (`plano_id`),
  ADD KEY `exercicio_id` (`exercicio_id`) USING BTREE;

--
-- Indexes for table `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indexes for table `itens_carrinho`
--
ALTER TABLE `itens_carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-itens_carrinho-id_produto` (`id_produto`),
  ADD KEY `idx-itens_carrinho-created_by` (`created_by`);

--
-- Indexes for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-itens_pedido-id_pedido` (`id_pedido`);

--
-- Indexes for table `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-itens_pedido-id_pedido` (`id_venda`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameterizacoes`
--
ALTER TABLE `parameterizacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-pedidos-created_at` (`created_at`),
  ADD KEY `idx-pedidos-created_by` (`created_by`);

--
-- Indexes for table `pedido_moradas`
--
ALTER TABLE `pedido_moradas`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `idx-pedido_moradas-pedido_id` (`pedido_id`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `idx-perfil-iduser` (`user_id`) USING BTREE;

--
-- Indexes for table `plano_treino`
--
ALTER TABLE `plano_treino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `instrutor_id` (`instrutor_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-produtos-created_by` (`created_by`),
  ADD KEY `idx-produtos-updated_by` (`updated_by`);

--
-- Indexes for table `subscricoes`
--
ALTER TABLE `subscricoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-subscricoes-id_cliente` (`id_cliente`),
  ADD KEY `idx-subscricoes-id_tipo_subscricao` (`id_tipo_subscricao`);

--
-- Indexes for table `tipos_subscricao`
--
ALTER TABLE `tipos_subscricao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_exercicio`
--
ALTER TABLE `tipo_exercicio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_moradas`
--
ALTER TABLE `user_moradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_moradas-user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `aulas_horario`
--
ALTER TABLE `aulas_horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `exercicio_plano`
--
ALTER TABLE `exercicio_plano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `inscricoes`
--
ALTER TABLE `inscricoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itens_carrinho`
--
ALTER TABLE `itens_carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parameterizacoes`
--
ALTER TABLE `parameterizacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plano_treino`
--
ALTER TABLE `plano_treino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subscricoes`
--
ALTER TABLE `subscricoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipos_subscricao`
--
ALTER TABLE `tipos_subscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_exercicio`
--
ALTER TABLE `tipo_exercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_moradas`
--
ALTER TABLE `user_moradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `exercicio`
--
ALTER TABLE `exercicio`
  ADD CONSTRAINT `exercicio_ibfk_1` FOREIGN KEY (`equipamento_id`) REFERENCES `equipamentos` (`id`),
  ADD CONSTRAINT `exercicio_ibfk_2` FOREIGN KEY (`tipo_exercicio_id`) REFERENCES `tipo_exercicio` (`id`);

--
-- Constraints for table `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `plano_treino`
--
ALTER TABLE `plano_treino`
  ADD CONSTRAINT `plano_treino_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `perfil` (`user_id`),
  ADD CONSTRAINT `plano_treino_ibfk_3` FOREIGN KEY (`instrutor_id`) REFERENCES `perfil` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
