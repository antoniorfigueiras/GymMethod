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


                    /** Planos de treino **/
                    ['label' => 'Clientes', 'icon' => 'user', 'url' => ['/cliente/clientes'],'visible' => Yii::$app->user->can("treinador")&&!Yii::$app->user->can("admin")],
                    ['label' => 'Planos de Treino', 'icon' => 'calendar', 'url' => ['/plano'],'visible' => Yii::$app->user->can("consultarPlano")],
                    ['label' => 'Exercicios', 'icon' => 'walking', 'url' => ['/exercicio'],'visible' => Yii::$app->user->can("consultarPlano")],
                    ['label' => 'Tipo de Exercicios', 'url' => ['/tipoexercicio'],'visible' => Yii::$app->user->can("consultarPlano")],

                    /** Ginasio **/
                    ['label' => 'Equipamentos', 'icon' => 'dumbbell', 'url' => ['/equipamento'],'visible' => Yii::$app->user->can("consultarEquipamento")],


                    /** Consultas **/
                    [
                        'label' => 'Consultas',
                        'icon' => 'stethoscope',
                        'visible' => Yii::$app->user->can("consultarConsulta"),
                        'items' => [
                            ['label' => 'Consultar Consultas', 'icon' => 'eye', 'url' => ['/consulta']],
                            ['label' => 'Criar Consultas', 'icon' => 'plus', 'url' => ['/consulta/select_client']],
                        ],
                    ],

                    /** Utilizadores **/

                    /** Clientes **/
                    [
                        'label' => 'Clientes',
                        'icon' => 'user',
                        'visible' => Yii::$app->user->can("adicionarCliente"),
                        'items' => [
                            ['label' => 'Consultar Clientes', 'icon' => 'eye', 'url' => ['/cliente'], ],
                            ['label' => 'Criar Clientes', 'icon' => 'plus', 'url' => ['../user/create?userType=cliente'],
                            ],
                        ],
                    ],
                    /** Funcionarios **/
                    [
                        'label' => 'Funcionarios',
                        'icon' => 'user',
                        'visible' => Yii::$app->user->can("consultarFuncionario"),
                        'items' => [
                            ['label' => 'Consultar Funcionarios', 'icon' => 'eye', 'url' => ['/funcionario']],
                            ['label' => 'Criar Funcionarios', 'icon' => 'plus', 'url' => ['../user/create?userType=funcionario']],
                        ],
                    ],
                    /** Treinadores **/
                    [
                        'label' => 'Treinadores',
                        'icon' => 'user',
                        'visible' => Yii::$app->user->can("adicionarTreinador"),
                        'items' => [
                            ['label' => 'Consultar Treinadores', 'icon' => 'eye', 'url' => ['/treinador']],
                            ['label' => 'Criar Treinadores', 'icon' => 'plus', 'url' => ['../user/create?userType=treinador']],
                        ],
                    ],
                    /** Nutricionistas **/
                    [
                        'label' => 'Nutricionistas',
                        'icon' => 'user',
                        'visible' => Yii::$app->user->can("adicionarNutricionista"),
                        'items' => [
                            ['label' => 'Consultar Nutricionista', 'icon' => 'eye', 'url' => ['/nutricionista']],
                            ['label' => 'Criar Nutricionistas', 'icon' => 'plus', 'url' => ['../user/create?userType=nutricionista']],
                        ],
                    ],


                    /** Aulas **/
                    ['label' => 'Aulas', 'icon' => 'dumbbell',
                        'visible' => Yii::$app->user->can("consultarAula"),

                        'items' => [
                            ['label' => 'Modalidades', 'icon' => 'bicycle', 'url' => ['/modalidades'],],
                            ['label' => 'Horário', 'icon' => 'calendar', 'url' => ['/aulas'],],
                            ['label' => 'Aulas', 'icon' => 'dumbbell', 'url' => ['/aulas-horario'],],
                    ] ],

                    /** Loja **/
                    [
                        'label' => 'Loja',
                        'icon' => 'store',
                        'visible' => Yii::$app->user->can("consultarProdutos"),
                        'items' => [
                            ['label' => 'Vendas', 'icon' => 'store ', 'url' => ['/venda']],
                            ['label' => 'Consultar Produtos', 'icon' => 'eye', 'url' => ['/produto']],
                            ['label' => 'Criar Produtos', 'icon' => 'plus', 'url' => ['/produto/create']],
                        ],
                    ],
                ],

            ]);

            ?>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>