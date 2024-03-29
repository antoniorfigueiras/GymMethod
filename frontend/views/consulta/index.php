<?php
/* @var $model common\models\Perfil */

/** @var yii\web\View $this */
/* @var $searchModel frontend\models\search\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\grid\GridView;
use yii\helpers\Url;

use frontend\assets\AppAssetCliente;
AppAssetCliente::register($this);
$this->title = 'GymMethod';
?>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <?php
    echo Html::a('GymMethod',['../'],['class' => ['navbar-brand ps-3']]);
    ?>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <?php
                echo Html::tag('li',Html::a('Perfil',['view','user_id'=>Yii::$app->user->id],['class' => ['dropdown-item']]));
                ?>
                <li><a class="dropdown-item" href="../site/logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Funcionalidades</div>
                    <?php
                    echo Html::a('Consultas',['/consulta/index'],['class' => ['nav-link']]);
                    ?>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'attribute' => 'nome',
                            'contentOptions' => [
                                'style' => 'width: 260px'
                            ]
                        ],
                        [
                            'attribute' => 'data',
                            'format' => ['datetime', 'php:d.m.Y H:i'],
                            'contentOptions' => [
                                'style' => 'width: 160px'
                            ]
                        ],
                       /* [
                            'attribute' => 'cliente_id',
                            'label' => 'Cliente',
                            'content' => function ($model) {
                                $nomeCompleto = $model->cliente->nomeproprio . " " . $model->cliente->apelido;
                                return $nomeCompleto;
                            }
                        ],*/
                        [
                            'attribute' => 'nutricionista_id',
                            'label' => 'Nutricionista',
                            'content' => function ($model) {
                                $nomeCompleto = $model->nutricionista->nomeproprio . " " . $model->nutricionista->apelido;
                                return $nomeCompleto;
                            }
                        ],
                        [
                            'attribute' => 'estado',
                            'content' => function ($model) {
                                /** @var \common\models\Consulta $model */
                                if ($model->estado == 0)
                                {
                                    return Html::tag('span', 'Marcada', [
                                        'class' => 'badge bg-primary'
                                    ]);
                                } elseif ($model->estado == 1)
                                {
                                    return Html::tag('span', 'Concluida', [
                                        'class' => 'badge bg-success'
                                    ]);
                                }elseif ($model->estado == 2)
                                {
                                    return Html::tag('span', 'Cancelada', [
                                        'class' => 'badge bg-danger'
                                    ]);
                                }

                            },
                            'contentOptions' => [
                                'style' => 'width: 160px'
                            ]
                        ],

                        ['class' => 'hail812\adminlte3\yii\grid\ActionColumn',
                            'template' => '{view}'],
                    ],
                    'summaryOptions' => ['class' => 'summary mb-2'],
                    'pager' => [
                        'class' => 'yii\bootstrap5\LinkPager',
                    ]
                ]); ?>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; GymMethod 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
