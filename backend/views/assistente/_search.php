<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\TreinadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php
        if($action == 'select') {
            $form = ActiveForm::begin([
                'action' => ['select'],
                'method' => 'get',
            ]);
        } else{
            $form = ActiveForm::begin([
                'action' => ['instrutor', 'id' => $id],
                'method' => 'get',
            ]);
        }
    ?>

    <?php //$form->field($model, 'telemovel') ?>

    <?php //$form->field($model, 'peso') ?>

    <?php //$form->field($model, 'altura') ?>

    <?=  $form->field($model, 'nomeproprio') ?>

    <?=  $form->field($model, 'apelido') ?>

    <?php // echo $form->field($model, 'codpostal') ?>

    <?php // echo $form->field($model, 'pais') ?>

    <?php // echo $form->field($model, 'cidade') ?>

    <?php // echo $form->field($model, 'morada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
