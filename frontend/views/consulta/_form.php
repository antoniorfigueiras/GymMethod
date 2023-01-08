<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'cliente_id')->textInput() ?>

    <?= $form->field($model, 'nutricionista_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
