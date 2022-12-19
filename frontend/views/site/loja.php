<?php

/** @var yii\web\View $this */
/** @var \yii\data\ActiveDataProvider $dataProvider */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

use frontend\assets\AppAssetLoja;
AppAssetLoja::register($this);
$this->title = 'GymMethod';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <?php
        echo Html::a('GYMMETHOD',['../'],['class' => ['navbar-brand']]);
        ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            </ul>
            <form class="d-flex" action="/carrinho/index">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>Carrinho
                    <span class="badge bg-dark text-white ms-1 rounded-pill" id="carrinho-quantidade">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">GYMMETHOD SHOP</h1>
            <p class="lead fw-normal text-white-50 mb-0">Os melhores produtos que vão te ajudar a manter o ritmo!</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-4">
    <div class="container px-4 px-lg-5 mt-5">
    <?php  echo \yii\widgets\ListView::widget([
                'layout' => '{summary}<div class="row">{items}</div>{pager}',
                    'dataProvider' => $dataProvider,
                'itemView' => '_item_produto',
                'itemOptions' => [
                    'class' => 'col-lg-3 col-md-6 mb-4 item-produto'
                ],
                'pager' => [
                    'class' => \yii\bootstrap4\LinkPager::class
                ]
            ]) ?>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; GymMethod 2022</p></div>
</footer>