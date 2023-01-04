<?php

use common\models\User;
use hail812\adminlte\widgets\Menu;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=\yii\helpers\Url::home()?>" class="brand-link text-decoration-none">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="GymMethod Logo" class="brand-image img-circle elevation-3 " style="opacity: .8;">
        <span class="brand-text font-weight-light">GymMethod</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="d-block text-decoration-none">Bem Vindo: <?= Yii::$app->user->identity->username; ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php

            $user = User::findOne(Yii::$app->user->getId());
            echo Menu::widget([
                'items' => [
                    /** Loja **/
                   // ['label' => 'Loja', 'header' => true],
                    /*[
                        'label' => 'Loja',
                        'icon' => 'store',
                        'visible' => Yii::$app->user->can("funcionario"),
                        'items' => [
                            ['label' => 'Produtos', 'icon' => 'store', 'url' => ['/produto'],'visible' => Yii::$app->user->can("funcionario")],

                            ],
                    ],*/
                    ['label' => 'Produtos', 'icon' => 'store', 'url' => ['/produto'],'visible' => Yii::$app->user->can("consultarProdutos")],
                    
                    ['label' => 'Aulas', 'icon' => 'store', 'items' => [
                        ['label' => 'Aulas', 'icon' => 'store', 'url' => ['/aulas'],],
                        ['label' => 'Horário', 'icon' => 'store', 'url' => ['/aulas-horario'],],
                        ['label' => 'Modalidades', 'icon' => 'store', 'url' => ['/modalidades'],],
                        ['label' => 'Inscrições', 'icon' => 'store', 'url' => ['/inscricoes'],],
                    ] ],

                    /** Planos de treino **/
                    ['label' => 'Clientes', 'icon' => 'user', 'url' => ['/cliente/clientes'],'visible' => Yii::$app->user->can("treinador")&&!Yii::$app->user->can("admin")],
                    ['label' => 'Planos de Treino', 'icon' => 'calendar', 'url' => ['/plano'],'visible' => Yii::$app->user->can("consultarPlano")],
                    ['label' => 'Exercicios', 'icon' => 'walking', 'url' => ['/exercicio'],'visible' => Yii::$app->user->can("consultarPlano")],
                    ['label' => 'Tipo de Exercicios', 'url' => ['/tipoexercicio'],'visible' => Yii::$app->user->can("consultarPlano")],

                    /** Ginasio **/
                    ['label' => 'Equipamentos', 'icon' => 'dumbbell', 'url' => ['/equipamento'],'visible' => Yii::$app->user->can("consultarEquipamentos")],

                    /** Utilizadores **/
                    ['label' => 'Clientes', 'icon' => 'user', 'url' => ['/cliente'],'visible' => Yii::$app->user->can("consultarCliente")&& $user->getRole() != 'treinador'],
                    ['label' => 'Funcionarios', 'icon' => 'user', 'url' => ['/funcionario'],'visible' => Yii::$app->user->can("consultarTrabalhador")],
                    ['label' => 'Treinadores', 'icon' => 'user', 'url' => ['/treinador'],'visible' => Yii::$app->user->can("consultarTrabalhador")],
                    ['label' => 'Nutricionistas', 'icon' => 'user', 'url' => ['/nutricionista'],'visible' => Yii::$app->user->can("consultarNutricionista")],

                    /** Consultas **/
                    ['label' => 'Consultas', 'url' => ['/consulta'],'visible' => Yii::$app->user->can("consultarConsulta")],
                ],

            ]);

            ?>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>