<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ExercicioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

        <?php $form = ActiveForm::begin([
            'action' => ['select_exercicio'],
            'method' => 'get',
        ]); ?>


        <?= $form->field($model, 'nome') ?>


        <?php // echo $form->field($model, 'equipamento_id') ?>

        <?php // echo $form->field($model, 'tipo_exercicio_id') ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
