<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Venda */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="venda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeproprio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apelido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model->vendaMorada, 'morada')->textInput() ?>
    <?= $form->field($model->vendaMorada, 'cidade')->textInput() ?>
    <?= $form->field($model->vendaMorada, 'pais')->textInput() ?>
    <?= $form->field($model->vendaMorada, 'codpostal')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
