<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="GymMethod Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GymMethod</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="d-block">Bem Vindo: <?= Yii::$app->user->identity->username; ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Produtos', 'icon' => 'store', 'url' => ['/produto'],],
                    ['label' => 'Exercicios', 'icon' => 'walking', 'url' => ['/exercicio'],],
                    ['label' => 'Equipamentos', 'icon' => 'dumbbell', 'url' => ['/equipamento'],],
                    ['label' => 'Tipo de Exercicios', 'icon' => 'dumbbell', 'url' => ['/tipoexercicio'],],
                    ['label' => 'Planos de Treino', 'icon' => 'calendar', 'url' => ['/plano'],],
                    ['label' => 'Clientes', 'icon' => 'user', 'url' => ['/cliente'],],
                    ['label' => 'Funcionarios', 'icon' => 'user', 'url' => ['/funcionario'],],
                    ['label' => 'Treinadores', 'icon' => 'user', 'url' => ['/treinador'],],
                    ['label' => 'Nutricionistas', 'icon' => 'user', 'url' => ['/nutricionista'],],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>