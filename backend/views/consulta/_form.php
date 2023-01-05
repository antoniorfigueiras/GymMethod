<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\datetime\DateTimePicker;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model common\models\Consulta */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->widget(CKEditor::class, [
        'options' => (['rows' => 6]),
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'data')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Introduza a data da consulta'],
        'language' =>'pt',
        'pluginOptions' => [
            'autoclose' => true,
        ],

    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
