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
            <div class="image">
                <img src="<?=$assetDir?>/img/user1-128x128.jpg" class="fa-solid fa-user img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username; ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Produtos', 'icon' => 'store', 'url' => ['/produto'],],
                    ['label' => 'Funcionarios', 'icon' => 'user', 'url' => ['/funcionario'],],
                    ['label' => 'Treinadores', 'icon' => 'user', 'url' => ['/treinador'],],
                    ['label' => 'Nutricionistas', 'icon' => 'user', 'url' => ['/nutricionista'],],
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