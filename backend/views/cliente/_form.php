<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="perfil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeproprio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apelido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telemovel')->input(['number'])?>

    <?= $form->field($model, 'nif')->textInput(['type' => 'number'])?>

    <?= $form->field($model, 'peso')->textInput(['type' => 'number'])?>

    <?= $form->field($model, 'altura')->textInput(['type' => 'number'])?>

    <?= $form->field($model, 'pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codpostal')->textInput(['maxlength' => true])->textInput(['type' => 'number'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
