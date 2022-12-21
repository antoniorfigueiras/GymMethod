<?php

use common\models\User;
use hail812\adminlte\widgets\Menu;

$user = new User();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=\yii\helpers\Url::home()?>" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="GymMethod Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GymMethod</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user1-128x128.jpg" class="fa-solid fa-user img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username;?></a>
            </div>
        </div>






        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php


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
                    ['label' => 'Produtos', 'icon' => 'store', 'url' => ['/produto'],'visible' => Yii::$app->user->can("funcionario")],

                    /** Planos de treino **/
                    ['label' => 'Clientes', 'icon' => 'user', 'url' => ['/cliente/select'],'visible' => Yii::$app->user->can("treinador")],
                    ['label' => 'Planos de Treino', 'icon' => 'calendar', 'url' => ['/plano'],'visible' => Yii::$app->user->can("treinador")],
                    ['label' => 'Exercicios', 'icon' => 'walking', 'url' => ['/exercicio'],'visible' => Yii::$app->user->can("treinador")],
                    ['label' => 'Tipo de Exercicios', 'icon' => 'dumbbell', 'url' => ['/tipoexercicio'],'visible' => Yii::$app->user->can("treinador")],

                    /** Ginasio **/
                    ['label' => 'Equipamentos', 'icon' => 'dumbbell', 'url' => ['/equipamento'],/*'visible' => Yii::$app->user->can("funcionario")*/],

                    /** Utilizadores **/
                    ['label' => 'Clientes', 'icon' => 'user', 'url' => ['/cliente'],'visible' => Yii::$app->user->can("funcionario")],
                    ['label' => 'Funcionarios', 'icon' => 'user', 'url' => ['/funcionario'],'visible' => Yii::$app->user->can("funcionario")],
                    ['label' => 'Treinadores', 'icon' => 'user', 'url' => ['/treinador'],'visible' => Yii::$app->user->can("funcionario")],
                    ['label' => 'Nutricionistas', 'icon' => 'user', 'url' => ['/nutricionista'],'visible' => Yii::$app->user->can("funcionario")],

                    /** Consultas **/
                    ['label' => 'Consultas', 'icon' => 'walking', 'url' => ['/consulta'],'visible' => Yii::$app->user->can("criarConsulta")],



                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    //['label' => 'Logout', 'url' => ['site/logout'], 'icon' => 'sign-out-alt', 'visible' => Yii::$app->user->can("loginBO")],
                    /* YII & DEBUG*/
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ],

            ]);

            ?>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>