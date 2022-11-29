<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        /******* BACKOFFICE *******/

                         /*** Login ***/

        // Login (admin, funcionário, treinador, nutricionista)
        $loginBO = $auth->createPermission('loginBO');
        $loginBO->description = 'Login BO';
        $auth->add($loginBO);

                        /*** Ginásio ***/

        // Estatisticas do ginasio (admin)
        $estatisticas = $auth->createPermission('estatisticas');
        $estatisticas->description = 'Estatisticas';
        $auth->add($estatisticas);

                        /*** Trabalhadores ***/

        // Registar (admin)
        $adicionarTrabalhador = $auth->createPermission('adicionarTrabalhador');
        $adicionarTrabalhador->description = 'Adicionar trabalhador';
        $auth->add($adicionarTrabalhador);

        // Editar (admin)
        $editarTrabalhador = $auth->createPermission('editarTrabalhador');
        $editarTrabalhador->description = 'Editar trabalhador';
        $auth->add($editarTrabalhador);

        // Consultar (admin)
        $consultarTrabalhador = $auth->createPermission('consultarTrabalhador');
        $consultarTrabalhador->description = 'Consultar trabalhador';
        $auth->add($consultarTrabalhador);

        // Desativar (admin)
        $desativarTrabalhador = $auth->createPermission('desativarTrabalhador');
        $desativarTrabalhador->description = 'Desativar Trabalhador';
        $auth->add($desativarTrabalhador);

                        /*** Clientes ***/

        // Registar (admin, funcionário)
        $adicionarCliente = $auth->createPermission('adicionarCliente');
        $adicionarCliente->description = 'Adicionar cliente';
        $auth->add($adicionarCliente);

        // Editar (admin, funcionário)
        $editarCliente = $auth->createPermission('editarCliente');
        $editarCliente->description = 'Editar cliente';
        $auth->add($editarCliente);

        // Consultar (admin, funcionário)
        $consultarCliente = $auth->createPermission('consultarCliente');
        $consultarCliente->description = 'Consultar cliente';
        $auth->add($consultarCliente);

        // Desativar (admin, funcionário)
        $desativarCliente = $auth->createPermission('desativarCliente');
        $desativarCliente->description = 'Desativar cliente';
        $auth->add($desativarCliente);

                        /*** Aulas ***/

        // Adicionar (admin, funcionário)
        $adicionarAulas = $auth->createPermission('adicionarAulas');
        $adicionarAulas->description = 'Adicionar aulas';
        $auth->add($adicionarAulas);

        // Editar (admin, funcionário)
        $editarAulas = $auth->createPermission('editarAulas');
        $editarAulas->description = 'Editar aulas';
        $auth->add($editarAulas);

        // Consultar (admin, funcionário)
        $consultarAula = $auth->createPermission('consultarAula');
        $consultarAula->description = 'Consultar aula';
        $auth->add($consultarAula);

        // Remover (admin, funcionário)
        $removerAulas = $auth->createPermission('removerAulas');
        $removerAulas->description = 'Remover aulas';
        $auth->add($removerAulas);

                        /*** Planos de treino ***/

        // Adicionar (admin, treinador)
        $adicionarPlano = $auth->createPermission('adicionarPlano');
        $adicionarPlano->description = 'Adicionar plano';
        $auth->add($adicionarPlano);

        // Editar (admin, treinador)
        $editarPlano = $auth->createPermission('editarPlano');
        $editarPlano->description = 'Editar plano';
        $auth->add($editarPlano);

        // Consultar (admin, treinador)
        $consultarPlano = $auth->createPermission('consultarPlano');
        $consultarPlano->description = 'Consultar plano';
        $auth->add($consultarPlano);

        // Remover (admin, treinador)
        $removerPlano = $auth->createPermission('removerPlano');
        $removerPlano->description = 'Remover plano';
        $auth->add($removerPlano);

                         /*** Consultas Nutricionista ***/

        // Criar (admin, funcionario)
        $criarConsulta = $auth->createPermission('criarConsulta');
        $criarConsulta->description = 'Criar consulta';
        $auth->add($criarConsulta);

        // Editar (admin, funcionario)
        $editarConsulta = $auth->createPermission('editarConsulta');
        $editarConsulta->description = 'Editar consulta';
        $auth->add($editarConsulta);

        // Consultar (admin, funcionario)
        $consultarConsulta = $auth->createPermission('consultarConsulta');
        $consultarConsulta->description = 'Consultar consulta';
        $auth->add($consultarConsulta);

        // Remover (admin, funcionario)
        $removerConsulta = $auth->createPermission('removerConsulta');
        $removerConsulta->description = 'Remover consulta';
        $auth->add($removerConsulta);

                        /*** Produtos ***/

        // Adicionar (admin, funcionario)
        $adicionarProdutos = $auth->createPermission('adicionarProdutos');
        $adicionarProdutos->description = 'Adicionar Produtos';
        $auth->add($adicionarProdutos);

        // Editar (admin, funcionario)
        $editarProdutos = $auth->createPermission('editarProdutos');
        $editarProdutos->description = 'Editar Produtos';
        $auth->add($editarProdutos);

        // Consultar (admin, funcionario)
        $consultarProdutos = $auth->createPermission('consultarProdutos');
        $consultarProdutos->description = 'Consultar produtos';
        $auth->add($consultarProdutos);

        // Remover (admin, funcionario)
        $removerProdutos = $auth->createPermission('removerProdutos');
        $removerProdutos->description = 'Remover Produtos';
        $auth->add($removerProdutos);

                        /*** Equipamentos ***/

        // Adicionar (admin, funcionario)
        $adicionarEquipamentos = $auth->createPermission('adicionarEquipamentos');
        $adicionarEquipamentos->description = 'Adicionar equipamentos';
        $auth->add($adicionarEquipamentos);

        // Editar (admin, funcionario)
        $editarEquipamentos = $auth->createPermission('editarEquipamentos');
        $editarEquipamentos->description = 'Editar Equipamentos';
        $auth->add($editarEquipamentos);

        // Consultar (admin, funcionario)
        $consultarEquipamentos = $auth->createPermission('consultarEquipamentos');
        $consultarEquipamentos->description = 'Consultar equipamentos';
        $auth->add($consultarEquipamentos);

        // Remover (admin, funcionario)
        $removerEquipamentos = $auth->createPermission('removerEquipamentos');
        $removerEquipamentos->description = 'Remover Equipamentos';
        $auth->add($removerEquipamentos);

                        /******* Subscrições *******/

        // Adicionar (admin, funcionario)
        $criarSubscricao = $auth->createPermission('criarSubscricao');
        $criarSubscricao->description = 'Criar subscrição';
        $auth->add($criarSubscricao);

        // Desativar (admin, funcionario)
        $desativarSubscricao = $auth->createPermission('desativarSubscricao');
        $desativarSubscricao->description = 'Desativar Subscricao';
        $auth->add($desativarSubscricao);

        // Consultar (admin, funcionario)
        $consultarSubscricao = $auth->createPermission('consultarSubscricao');
        $consultarSubscricao->description = 'Consultar Subscricao';
        $auth->add($consultarSubscricao);

        /******* FRONTOFFICE *******/

                         /*** Login/Perfil***/

        // Login (cliente)
        $loginFO = $auth->createPermission('loginFO');
        $loginFO->description = 'Login FO';
        $auth->add($loginFO);

        // Consultar perfil (cliente)
        $consultarPerfil = $auth->createPermission('consultarPerfil');
        $consultarPerfil->description = 'Consultar perfil';
        $auth->add($consultarPerfil);

        // Editar perfil (cliente)
        $editarPerfil = $auth->createPermission('editarPerfil');
        $editarPerfil->description = 'Editar perfil';
        $auth->add($editarPerfil);

                        /*** Produtos/Carrinho ***/

        // Ver Detalhes (cliente)
        $verDetalhesProdutos = $auth->createPermission('verDetalhesProdutos');
        $verDetalhesProdutos->description = 'Ver Detalhes Produtos';
        $auth->add($verDetalhesProdutos);

        // Adicionar (cliente)
        $adicionarProdutoCarrinho = $auth->createPermission('adicionarProdutoCarrinho');
        $adicionarProdutoCarrinho->description = 'Adicionar produto ao carrinho';
        $auth->add($adicionarProdutoCarrinho);

        // Remover (cliente)
        $removerProdutoCarrinho = $auth->createPermission('removerProdutoCarrinho');
        $removerProdutoCarrinho->description = 'Remover produto ao carrinho';
        $auth->add($removerProdutoCarrinho);

        // Alterar (cliente)
        $alterarQuantidadeProduto = $auth->createPermission('alterarQuantidadeProduto');
        $alterarQuantidadeProduto->description = 'Alterar quantidade do produto';
        $auth->add($alterarQuantidadeProduto);

        // Pagar o carrinho (cliente)
        $pagarCarrinho = $auth->createPermission('pagarCarrinho');
        $pagarCarrinho->description = 'Pagar carrinho';
        $auth->add($pagarCarrinho);

                    /*** Compras ***/

        // Comprar (cliente)
        $comprarProdutos = $auth->createPermission('comprarProdutos');
        $comprarProdutos->description = 'Comprar produtos';
        $auth->add($comprarProdutos);

        // Historico compras (cliente)
        $verHistoricoCompras = $auth->createPermission('verHistoricoCompras');
        $verHistoricoCompras->description = 'Ver historico de compras';
        $auth->add($verHistoricoCompras);

        // Pagamento online (cliente)
        $pagamentoOnline = $auth->createPermission('pagamentoOnline');
        $pagarCarrinho->description = 'Pagamento online';
        $auth->add($pagamentoOnline);

        // Alterar dados de envio (cliente)
        $alterarDadosEnvio = $auth->createPermission('alterarDadosEnvio');
        $alterarDadosEnvio->description = 'Alterar dados de envio';
        $auth->add($alterarDadosEnvio);

                    /*** Aulas ***/

        // Visualizar aulas disponiveis (cliente)
        $visualizarAulas = $auth->createPermission('visualizarAulas');
        $visualizarAulas->description = 'Visualizar aulas';
        $auth->add($visualizarAulas);

        // Visualizar historico aulas (cliente)
        $visualizarHistoricoAulas = $auth->createPermission('visualizarHistoricoAulas');
        $visualizarHistoricoAulas->description = 'Visualizar historico aulas';
        $auth->add($visualizarHistoricoAulas);


                 /*** Roles ***/


        // Funcionario
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $loginBO);
        $auth->addChild($funcionario, $adicionarCliente);
        $auth->addChild($funcionario, $editarCliente);
        $auth->addChild($funcionario, $consultarCliente);
        $auth->addChild($funcionario, $desativarCliente);
        $auth->addChild($funcionario, $adicionarAulas);
        $auth->addChild($funcionario, $editarAulas);
        $auth->addChild($funcionario, $consultarAula);
        $auth->addChild($funcionario, $removerAulas);
        $auth->addChild($funcionario, $criarConsulta);
        $auth->addChild($funcionario, $editarConsulta);
        $auth->addChild($funcionario, $consultarConsulta);
        $auth->addChild($funcionario, $removerConsulta);
        $auth->addChild($funcionario, $adicionarProdutos);
        $auth->addChild($funcionario, $editarProdutos);
        $auth->addChild($funcionario, $consultarProdutos);
        $auth->addChild($funcionario, $removerProdutos);
        $auth->addChild($funcionario, $adicionarEquipamentos);
        $auth->addChild($funcionario, $editarEquipamentos);
        $auth->addChild($funcionario, $consultarEquipamentos);
        $auth->addChild($funcionario, $removerEquipamentos);
        $auth->addChild($funcionario, $criarSubscricao);
        $auth->addChild($funcionario, $desativarSubscricao);
        $auth->addChild($funcionario, $consultarSubscricao);

        // Treinador
        $treinador = $auth->createRole('treinador');
        $auth->add($treinador);
        $auth->addChild($treinador, $loginBO);
        $auth->addChild($treinador, $adicionarPlano);
        $auth->addChild($treinador, $editarPlano);
        $auth->addChild($treinador, $consultarPlano);
        $auth->addChild($treinador, $removerPlano);
        $auth->addChild($treinador, $consultarCliente);

        // Cliente
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $loginFO);
        $auth->addChild($cliente, $consultarPerfil);
        $auth->addChild($cliente, $editarPerfil);
        $auth->addChild($cliente, $pagarCarrinho);
        $auth->addChild($cliente, $comprarProdutos);
        $auth->addChild($cliente, $verHistoricoCompras);
        $auth->addChild($cliente, $pagamentoOnline);
        $auth->addChild($cliente, $alterarDadosEnvio);
        $auth->addChild($cliente, $visualizarAulas);
        $auth->addChild($cliente, $visualizarHistoricoAulas);

        // Admin
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $loginBO);
        $auth->addChild($admin, $adicionarTrabalhador);
        $auth->addChild($admin, $editarTrabalhador);
        $auth->addChild($admin, $consultarTrabalhador);
        $auth->addChild($admin, $desativarTrabalhador);
        $auth->addChild($admin, $estatisticas);
        $auth->addChild($admin, $funcionario);
        $auth->addChild($admin, $treinador);


        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.

        $auth->assign($admin, 1);
        $auth->assign($funcionario, 2);
        $auth->assign($treinador, 3);
        $auth->assign($cliente, 4);


    }
}