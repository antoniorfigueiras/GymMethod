<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);
$this->title = 'GymMethod';
?>
<!-- ? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="index/img/logo/loder.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!--? Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="#"><img src="index/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <?php
                                            echo Html::tag('li',Html::a('LOJA',['loja']));
                                        ?>
                                        <?php
                                        if (!Yii::$app->user->isGuest)
                                        {
                                            echo Html::tag('li',Html::a('AREA CLIENTE',['/cliente/view','user_id'=>Yii::$app->user->id]));
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <?php
                                if (Yii::$app->user->isGuest) {
                                    echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn header-btn']]));
                                } else {
                                    echo Html::beginForm(['site/logout'], 'get')
                                        . Html::submitButton(
                                            'Logout (' . Yii::$app->user->identity->username . ')',
                                            ['class' => 'btn header-btn']
                                        )
                                        . Html::endForm();
                                }
                                ?>
                                    </a>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay="0.1s">com António Figueiras</span>
                                <h1 data-animation="fadeInLeft" data-delay="0.4s">Vem fazer parte da elite</h1>
                                <?php
                                if (Yii::$app->user->isGuest)
                                {
                                    echo Html::a('Registe-se',['signup'], ['class' => 'btn hero-btn'], ['data-animation' => 'fadeInLeft'], ['data-delay' => '0.8s']);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay="0.1s">com Gonçalo Vital</span>
                                <h1 data-animation="fadeInLeft" data-delay="0.4s">Aqui a saúde é uma prioridade</h1>
                                <?php
                                if (Yii::$app->user->isGuest)
                                {
                                    echo Html::a('Registe-se',['signup'], ['class' => 'btn hero-btn'], ['data-animation' => 'fadeInLeft'], ['data-delay' => '0.8s']);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video icon -->
        <div class="video-icon">
            <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=u_43TaSoRMA"><i class="fas fa-play"></i></a>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? About Area Start -->
    <section class="about-area section-padding30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <img src="index/img/gallery/about.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle3 mb-35">
                            <span>SOBRE O NOSSO GINÁSIO</span>
                            <h2>Soluções adequadas para a construção do teu corpo segura e que irá economizar o teu tempo valioso!</h2>
                        </div>
                        <p class="pera-top">Os nossos instrutores estão disponíveis para oferecer os melhores planos de treino adequados ao seu objetivo.</p>
                        <?php
                        if (Yii::$app->user->isGuest)
                        {
                            echo Html::a('Registe-se',['signup'], ['class' => 'btn']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-2 Area End -->
    <!--? Services Area Start -->
    <section class="services-area pt-100 pb-150 section-bg" data-background="index/img/gallery/section_bg01.png">
        <!--? Want To work -->
        <section class="wantToWork-area w-padding">
            <div class="container">
                <div class="row align-items-end justify-content-between">
                    <div class="col-lg-6 col-md-10 col-sm-10">
                        <div class="section-tittle section-tittle2">
                            <span>OS NOSSOS SERVIÇOS PARA SI</span>
                            <h2>PUXA OS TEUS LIMITES COM AS NOSSAS OFERTAS</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Want To work End -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <i class="flaticon-fitness"></i>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#">PLANOS DE TREINO</a></h5>
                            <p>Planos personalizados para uma melhor adaptação.</p>
                        </div>
                        <div class="img-cap">
                            <a href="#" class="">Descobre mais sobre nós<i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <i class="flaticon-healthcare-and-medical"></i>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#">CONSULTAS</a></h5>
                            <p>Consultas com nutricionistas para analisar o teu desempenho</p>
                        </div>
                        <div class="img-cap">
                            <a href="#" class="">Descobre mais sobre nós<i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <i class="flaticon-clock"></i>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#">AULAS</a></h5>
                            <p>Horarios semanais com diferentes aulas dependendo do gosto do cliente.</p>
                        </div>
                        <div class="img-cap">
                            <a href="#" class="">Descobre mais sobre nós<i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Area End -->
    <!--? About-2 Area Start -->
    <section class="about-area2 testimonial-area section-padding30 fix">
    </section>
    <!-- About-2 Area End -->
    <!--? Gallery Area Start -->
    <div class="gallery-area">
        <div class="container-fluid p-0 fix">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img" style="background-image: url(index/img/gallery/gallery1.png);"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <a href="#"><i class="ti-arrow-top-right"></i></a>
                                <h3>GYMMETHOD</h3>
                                <p>Galeria</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img small-img" style="background-image: url(index/img/gallery/gallery2.png);"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <a href="#"><i class="ti-arrow-top-right"></i></a>
                                        <h3>GYMMETHOD</h3>
                                        <p>Galeria</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img small-img" style="background-image: url(index/img/gallery/gallery3.png);"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <a href="#"><i class="ti-arrow-top-right"></i></a>
                                        <h3>GYMMETHOD</h3>
                                        <p>Galeria</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img small-img" style="background-image: url(index/img/gallery/gallery4.png);"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <a href="#"><i class="ti-arrow-top-right"></i></a>
                                        <h3>GYMMETHOD</h3>
                                        <p>Galeria</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img small-img" style="background-image: url(index/img/gallery/gallery5.png);"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <a href="#"><i class="ti-arrow-top-right"></i></a>
                                        <h3>GYMMETHOD</h3>
                                        <p>Galeria</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
    <!--? Date Tabs Start -->
    <section class="date-tabs section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section-tittle text-center mb-100">
                        <span>O NOSSO HORÁRIO</span>
                        <h2>SELECIONA O MELHOR HORÁRIO PARA TI</h2>
                    </div>
                </div>
            </div>
            <!-- Heading & Nav Button -->
            <div class="row justify-content-center mb-10">
                <div class="col-lg-11">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sábado</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Domingo</a>
                                <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Segunda</a>
                                <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Terça</a>
                                <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Quarta</a>
                                <a class="nav-item nav-link" id="nav-six" data-toggle="tab" href="#nav-nav-six" role="tab" aria-controls="nav-contact" aria-selected="false">Quinta</a>
                                <a class="nav-item nav-link" id="nav-seven" data-toggle="tab" href="#nav-nav-seven" role="tab" aria-controls="nav-seven" aria-selected="false">Sexta</a>
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                </div>
            </div>
            <!-- Tab content -->
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <!-- Nav Card -->
                    <div class="tab-content" id="nav-tabContent">
                        <!--  one -->
                        <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-wrapper">
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption active text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Two -->
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-wrapper">
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption active text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Three -->
                        <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-wrapper">
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption active text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Fur -->
                        <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-wrapper">
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption active text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Five -->
                        <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-wrapper">
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption active text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Six -->
                        <div class="tab-pane fade" id="nav-nav-six" role="tabpanel" aria-labelledby="nav-six">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-wrapper">
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption active text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  seven -->
                        <div class="tab-pane fade" id="nav-nav-seven" role="tabpanel" aria-labelledby="nav-seven">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-wrapper">
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="single-box">
                                            <div class="single-caption active text-center">
                                                <div class="caption">
                                                    <span>6am - 8am</span>
                                                    <h3>Kick Boxing</h3>
                                                    <p><span>by</span> Jhos Kusam</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Nav Card -->
                </div>
            </div>
        </div>

    </section>
    <!-- Date Tabs End -->

</main>
<footer>
    <!--? Footer Start-->
    <div class="footer-area section-bg" data-background="index/img/gallery/section_bg03.png">
        <div class="container">
            <div class="footer-top footer-padding">
                <!-- Footer Menu -->
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>EMPRESA</h4>
                                <ul>
                                    <?php
                                    echo Html::tag('li',Html::a('Loja',['loja']));
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>HORÁRIO</h4>
                                <ul>
                                    <li><a href="#">Monday 11am-7pm</a></li>
                                    <li><a href="#"> Tuesday-Friday 11am-8pm</a></li>
                                    <li><a href="#"> Saturday 10am-6pm</a></li>
                                    <li><a href="#"> Sunday 11am-6pm</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>RECURSOS</h4>
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="index/img/logo/logo2_footer.png" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                </div>
                            </div>
                            <!-- Footer Social -->
                            <div class="footer-social ">
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12">
                        <div class="footer-copy-right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> GYMMETHOD
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>