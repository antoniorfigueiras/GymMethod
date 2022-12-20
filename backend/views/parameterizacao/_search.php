<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ParameterizacaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'series') ?>

    <?= $form->field($model, 'seriesCliente') ?>

    <?= $form->field($model, 'repeticoes') ?>

    <?php // echo $form->field($model, 'repeticoesCliente') ?>

    <?php // echo $form->field($model, 'peso') ?>

    <?php // echo $form->field($model, 'pesoCliente') ?>

    <?php // echo $form->field($model, 'tempo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
