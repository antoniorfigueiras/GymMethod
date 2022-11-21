<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use frontend\assets\AppAssetLogin;
AppAssetLogin::register($this);
$this->title = 'GymMethod';
?>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../login/images/bg_3.jpg');"></div>
    <div class="contents order-2 order-md-1">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3>Bem vindo ao <strong>GymMethod</strong></h3>
                    <p class="mb-4">Cria a tua conta para teres acesso a várias funcionalidades do nosso site.</p>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <div class="form-group first">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'email') ?>
                    </div>
                    <div class="form-group last mb-1">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>

                    <div class="d-flex mb-5 align-items-center">
                        <label class="control control--checkbox mb-0">
                            <span class="caption">
                                <?php
                                echo Html::tag('div',Html::a('Já tenho conta!',['site/login']));
                                ?>
                            </span>
                        </label>
                        <!--<span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>-->
                    </div>
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-block btn-primary', 'name' => 'signup-button']) ?>


                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>


</div>
