<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ExercicioPlano */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="exercicio-plano-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parameterizacao_id')->textInput() ?>

    <?= $form->field($model, 'exercicio_id')->textInput() ?>

    <?= $form->field($model, 'plano_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
