<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ClienteSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-3">
    <h2>Pesquisar</h2>

    <?php $form = ActiveForm::begin([
        'action' => ['select_client'], // index -> selectClient
        'method' => 'get',
    ]); ?>

        <div class="form-row">
            <div class="form-group col-md-6">
    <?= $form->field($model, 'nomeproprio') ?>
            </div>
            <div class="form-group col-md-6">

            <?= $form->field($model, 'apelido') ?>
            </div>
    </div>

    <?php // echo $form->field($model, 'codpostal') ?>

    <?php // echo $form->field($model, 'pais') ?>

    <?php // echo $form->field($model, 'cidade') ?>

    <?php // echo $form->field($model, 'morada') ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
