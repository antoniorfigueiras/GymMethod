<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Exercicio */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="exercicio-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dificuldade')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'exemplo', [
        'template' => '
                <div class="custom-file">
                    {input}
                    {label}
                    {error}
                </div>
            ',
        'labelOptions' => ['class' => 'custom-file-label'],
        'inputOptions' => ['class' => 'custom-file-input']
    ])->fileInput() ?>



    <?php /*<?= $form->field($model, 'equipamento_id')->textInput() */?>
    <?= $form->field($model, 'equipamento_id')->dropDownList($lista_equipamentos, ['prompt' => '-Escolha um equipamento-']) ?>

    <?php /*<?= $form->field($model, 'tipo_exercicio_id')->textInput() */?>
    <?= $form->field($model, 'tipo_exercicio_id')->dropDownList($lista_tipo_exercicios, ['prompt' => '-Escolha um tipo de exercicio-']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
