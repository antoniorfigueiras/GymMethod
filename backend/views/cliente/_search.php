<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-3">
    <h2>Pesquisar cliente</h2>

    <?php $form = ActiveForm::begin([
        'action' => ['select'], // index -> selectClient
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nomeproprio') ?>

    <?= $form->field($model, 'apelido') ?>

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
