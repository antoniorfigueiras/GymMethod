<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="perfil-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    if (Yii::$app->user->can('adicionarCliente')) {
        echo $form->field($model, 'imagem')->fileInput();
        echo $form->field($model, 'nomeproprio')->textInput(['maxlength' => true]);
        echo $form->field($model, 'apelido')->textInput(['maxlength' => true]);
        echo $form->field($model, 'telemovel')->input(['number']);
        echo $form->field($model, 'nif')->textInput(['type' => 'number']);
    } ?>

    <?= $form->field($model, 'peso')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'altura')->textInput(['type' => 'number']) ?>

    <?php if (Yii::$app->user->can('adicionarCliente')) {
        echo $form->field($model, 'pais')->textInput(['maxlength' => true]);
        echo $form->field($model, 'cidade')->textInput(['maxlength' => true]);

        echo $form->field($model, 'morada')->textInput(['maxlength' => true]);

        echo $form->field($model, 'codpostal')->textInput(['maxlength' => true])->textInput(['type' => 'number']);
    } ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
