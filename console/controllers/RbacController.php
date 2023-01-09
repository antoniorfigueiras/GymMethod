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

        // Dashboard (admin)
        $dashboard = $auth->createPermission('dashboard');
        $dashboard->description = 'Dashboard';
        $auth->add($dashboard);

                        /*** Funcionario ***/

        // Registar (admin)
        $adicionarFuncionario = $auth->createPermission('adicionarFuncionario');
        $adicionarFuncionario->description = 'Adicionar Funcionario';
        $auth->add($adicionarFuncionario);

        // Editar (admin)
        $editarFuncionario = $auth->createPermission('editarFuncionario');
        $editarFuncionario->description = 'Editar Funcionario';
        $auth->add($editarFuncionario);

        // Consultar (admin)
        $consultarFuncionario = $auth->createPermission('consultarFuncionario');
        $consultarFuncionario->description = 'Consultar Funcionario';
        $auth->add($consultarFuncionario);

        // Desativar (admin)
        $desativarFuncionario = $auth->createPermission('desativarFuncionario');
        $desativarFuncionario->description = 'Desativar Funcionario';
        $auth->add($desativarFuncionario);

                        /*** Treinadores ***/

        // Registar (admin)
        $adicionarTreinador = $auth->createPermission('adicionarTreinador');
        $adicionarTreinador->description = 'Adicionar Treinador';
        $auth->add($adicionarTreinador);

        // Editar (admin)
        $editarTreinador = $auth->createPermission('editarTreinador');
        $editarTreinador->description = 'Editar Treinador';
        $auth->add($editarTreinador);

        // Consultar (admin)
        $consultarTreinador = $auth->createPermission('consultarTreinador');
        $consultarTreinador->description = 'Consultar Treinador';
        $auth->add($consultarTreinador);

        // Desativar (admin)
        $desativarTreinador = $auth->createPermission('desativarTreinador');
        $desativarTreinador->description = 'Desativar Treinador';
        $auth->add($desativarTreinador);

                         /*** Nutricionistas ***/

        // Registar (admin)
        $adicionarNutricionista = $auth->createPermission('adicionarNutricionista');
        $adicionarNutricionista->description = 'Adicionar nutricionista';
        $auth->add($adicionarNutricionista);

        // Editar (admin)
        $editarNutricionista = $auth->createPermission('editarNutricionista');
        $editarNutricionista->description = 'Editar nutricionista';
        $auth->add($editarNutricionista);

        // Consultar (admin)
        $consultarNutricionista = $auth->createPermission('consultarNutricionista');
        $consultarNutricionista->description = 'Consultar nutricionista';
        $auth->add($consultarNutricionista);

        // Desativar (admin)
        $desativarNutricionista = $auth->createPermission('desativarNutricionista');
        $desativarNutricionista->description = 'Desativar Nutricionista';
        $auth->add($desativarNutricionista);

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
        $adicionarAula = $auth->createPermission('adicionarAula');
        $adicionarAula->description = 'Adicionar aula';
        $auth->add($adicionarAula);

        // Editar (admin, funcionário)
        $editarAula = $auth->createPermission('editarAula');
        $editarAula->description = 'Editar aula';
        $auth->add($editarAula);

        // Consultar (admin, funcionário)
        $consultarAula = $auth->createPermission('consultarAula');
        $consultarAula->description = 'Consultar aula';
        $auth->add($consultarAula);

        // Remover (admin, funcionário)
        $removerAula = $auth->createPermission('removerAula');
        $removerAula->description = 'Remover aula';
        $auth->add($removerAula);


                        /*** Modalidades ***/

        // Adicionar (admin, funcionário)
        $adicionarModalidade = $auth->createPermission('adicionarModalidade');
        $adicionarModalidade->description = 'Adicionar mobalidade';
        $auth->add($adicionarModalidade);

        // Editar (admin, funcionário)
        $editarModalidade = $auth->createPermission('editarModalidade');
        $editarModalidade->description = 'Editar modalidade';
        $auth->add($editarModalidade);

        // Consultar (admin, funcionário)
        $consultarModalidade = $auth->createPermission('consultarModalidade');
        $consultarModalidade->description = 'Consultar modalidade';
        $auth->add($consultarModalidade);

        // Remover (admin, funcionário)
        $removerModalidade = $auth->createPermission('removerModalidade');
        $removerModalidade->description = 'Remover modalidade';
        $auth->add($removerModalidade);

                        /*** Planos de treino ***/

        // Adicionar (admin, treinador)
        $adicionarPlano = $auth->createPermission('adicionarPlano');
        $adicionarPlano->description = 'Adicionar plano treino';
        $auth->add($adicionarPlano);

        // Editar (admin, treinador)
        $editarPlano = $auth->createPermission('editarPlano');
        $editarPlano->description = 'Editar plano treino';
        $auth->add($editarPlano);

        // Consultar (admin, treinador)
        $consultarPlano = $auth->createPermission('consultarPlano');
        $consultarPlano->description = 'Consultar plano treino';
        $auth->add($consultarPlano);

        // Remover (admin, treinador)
        $removerPlano = $auth->createPermission('removerPlano');
        $removerPlano->description = 'Remover plano treino';
        $auth->add($removerPlano);


                        /*** Equipamentos ***/

        // Adicionar (admin, funcionario)
        $adicionarEquipamento = $auth->createPermission('adicionarEquipamento');
        $adicionarEquipamento->description = 'Adicionar equipamento';
        $auth->add($adicionarEquipamento);

        // Editar (admin, funcionario)
        $editarEquipamento = $auth->createPermission('editarEquipamento');
        $editarEquipamento->description = 'Editar Equipamento';
        $auth->add($editarEquipamento);

        // Consultar (admin, funcionario)
        $consultarEquipamento = $auth->createPermission('consultarEquipamento');
        $consultarEquipamento->description = 'Consultar equipamento';
        $auth->add($consultarEquipamento);

        // Remover (admin, funcionario)
        $removerEquipamento = $auth->createPermission('removerEquipamento');
        $removerEquipamento->description = 'Remover Equipamento';
        $auth->add($removerEquipamento);


                    /*** Consultas Nutricionista ***/

        // Criar (admin, funcionario, nutricionista)
        $criarConsulta = $auth->createPermission('criarConsulta');
        $criarConsulta->description = 'Criar consulta';
        $auth->add($criarConsulta);

        // Editar (admin, funcionario, nutricionista)
        $editarConsulta = $auth->createPermission('editarConsulta');
        $editarConsulta->description = 'Editar consulta';
        $auth->add($editarConsulta);

        // Consultar (admin, funcionario, nutricionista)
        $consultarConsulta = $auth->createPermission('consultarConsulta');
        $consultarConsulta->description = 'Consultar consulta';
        $auth->add($consultarConsulta);

        // Remover (admin, funcionario, nutricionista)
        $removerConsulta = $auth->createPermission('removerConsulta');
        $removerConsulta->description = 'Remover consulta';
        $auth->add($removerConsulta);

        // Concluir (admin, funcionario, nutricionista)
        $concluirConsulta = $auth->createPermission('concluirConsulta');
        $concluirConsulta->description = 'Concluir consulta';
        $auth->add($concluirConsulta);

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


        // Mudar estado consulta (cliente)
        $mudarEstadoConsulta = $auth->createPermission('mudarEstadoConsulta');
        $mudarEstadoConsulta->description = 'Mudar estado consulta';
        $auth->add($mudarEstadoConsulta);


                 /*** Roles ***/

        // Funcionario
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $loginBO);
        $auth->addChild($funcionario, $adicionarCliente);
        $auth->addChild($funcionario, $editarCliente);
        $auth->addChild($funcionario, $consultarCliente);
        $auth->addChild($funcionario, $desativarCliente);
        $auth->addChild($funcionario, $adicionarAula);
        $auth->addChild($funcionario, $editarAula);
        $auth->addChild($funcionario, $consultarAula);
        $auth->addChild($funcionario, $removerAula);
        $auth->addChild($funcionario, $adicionarModalidade);
        $auth->addChild($funcionario, $editarModalidade);
        $auth->addChild($funcionario, $consultarModalidade);
        $auth->addChild($funcionario, $removerModalidade);
        $auth->addChild($funcionario, $criarConsulta);
        $auth->addChild($funcionario, $editarConsulta);
        $auth->addChild($funcionario, $consultarConsulta);
        $auth->addChild($funcionario, $removerConsulta);
        $auth->addChild($funcionario, $concluirConsulta);
        $auth->addChild($funcionario, $adicionarProdutos);
        $auth->addChild($funcionario, $editarProdutos);
        $auth->addChild($funcionario, $consultarProdutos);
        $auth->addChild($funcionario, $removerProdutos);
        $auth->addChild($funcionario, $adicionarEquipamento);
        $auth->addChild($funcionario, $editarEquipamento);
        $auth->addChild($funcionario, $consultarEquipamento);
        $auth->addChild($funcionario, $removerEquipamento);
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

        // Nutricionista
        $nutricionista = $auth->createRole('nutricionista');
        $auth->add($nutricionista);
        $auth->addChild($nutricionista, $loginBO);
        $auth->addChild($nutricionista, $criarConsulta);
        $auth->addChild($nutricionista, $editarConsulta);
        $auth->addChild($nutricionista, $consultarConsulta);
        $auth->addChild($nutricionista, $removerConsulta);
        $auth->addChild($nutricionista, $consultarCliente);


        // Cliente
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $loginFO);
        $auth->addChild($cliente, $consultarPerfil);
        $auth->addChild($cliente, $editarPerfil);


        // Admin
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $loginBO);
        $auth->addChild($admin, $adicionarFuncionario);
        $auth->addChild($admin, $editarFuncionario);
        $auth->addChild($admin, $consultarFuncionario);
        $auth->addChild($admin, $desativarFuncionario);
        $auth->addChild($admin, $adicionarTreinador);
        $auth->addChild($admin, $editarTreinador);
        $auth->addChild($admin, $consultarTreinador);
        $auth->addChild($admin, $desativarTreinador);
        $auth->addChild($admin, $adicionarNutricionista);
        $auth->addChild($admin, $editarNutricionista);
        $auth->addChild($admin, $consultarNutricionista);
        $auth->addChild($admin, $desativarNutricionista);
        $auth->addChild($admin, $dashboard);
        $auth->addChild($admin, $funcionario);
        $auth->addChild($admin, $treinador);
        $auth->addChild($admin, $nutricionista);
        $auth->addChild($admin, $cliente);

        $auth->assign($admin, 1);
        $auth->assign($funcionario, 2);
        $auth->assign($cliente, 4);
        $auth->assign($cliente, 107);
        $auth->assign($funcionario, 108);
        $auth->assign($treinador, 109);
        $auth->assign($treinador, 110);
        $auth->assign($nutricionista, 111);
        $auth->assign($nutricionista, 112);

    }
}