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

        /******* FUNCIONÁRIOS *******/

        // Clientes
        $registarCliente = $auth->createPermission('registarCliente');
        $registarCliente->description = 'Registar Cliente';
        $auth->add($registarCliente);

                        /*** Aulas ***/

        // Adicionar
        $adicionarAulas = $auth->createPermission('adicionarAulas');
        $adicionarAulas->description = 'Adicionar aulas';
        $auth->add($adicionarAulas);

        // Editar
        $editarAulas = $auth->createPermission('editarAulas');
        $editarAulas->description = 'Editar aulas';
        $auth->add($editarAulas);

        // Remover
        $removerAulas = $auth->createPermission('removerAulas');
        $removerAulas->description = 'Remover aulas';
        $auth->add($removerAulas);

                        /*** Produtos ***/

        // Adicionar
        $adicionarProdutos = $auth->createPermission('adicionarProdutos');
        $adicionarProdutos->description = 'Adicionar Produtos';
        $auth->add($adicionarProdutos);

        // Editar
        $editarProdutos = $auth->createPermission('editarProdutos');
        $editarProdutos->description = 'Editar Produtos';
        $auth->add($editarProdutos);

        // Remover
        $removerProdutos = $auth->createPermission('removerProdutos');
        $removerProdutos->description = 'Remover Produtos';
        $auth->add($removerProdutos);

                        /*** Equipamentos ***/

        // Adicionar
        $adicionarEquipamentos = $auth->createPermission('adicionarEquipamentos');
        $adicionarEquipamentos->description = 'Adicionar equipamentos';
        $auth->add($adicionarEquipamentos);

        // Editar
        $editarEquipamentos = $auth->createPermission('editarEquipamentos');
        $editarEquipamentos->description = 'Editar Equipamentos';
        $auth->add($editarEquipamentos);

        // Remover
        $removerEquipamentos = $auth->createPermission('removerEquipamentos');
        $removerEquipamentos->description = 'Remover Equipamentos';
        $auth->add($removerEquipamentos);


        /******* ADMIN *******/

        $registarFuncionario = $auth->createPermission('registarFuncionario');
        $registarFuncionario->description = 'Registar Funcionario';
        $auth->add($registarFuncionario);

        // add "author" role and give this role the "createPost" permission
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $registarCliente);
        $auth->addChild($funcionario, $adicionarAulas);
        $auth->addChild($funcionario, $editarAulas);
        $auth->addChild($funcionario, $removerAulas);

        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);


        $treinador = $auth->createRole('treinador');
        $auth->add($treinador);


        $nutricionista = $auth->createRole('nutricionista');
        $auth->add($nutricionista);


        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $registarFuncionario);
        $auth->addChild($admin, $funcionario);
        $auth->addChild($admin, $cliente);
        $auth->addChild($admin, $treinador);
        $auth->addChild($admin, $nutricionista);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.

        $auth->assign($admin, 1);
        $auth->assign($funcionario, 2);
        $auth->assign($treinador, 3);
        $auth->assign($nutricionista, 4);
        $auth->assign($cliente, 5);


    }
}