<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ExercicioPlano */
/* @var $modelParameterizacao common\models\Parameterizacao */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="exercicio-plano-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelParameterizacao, 'series')->textInput() ?>


    <?= $form->field($modelParameterizacao, 'repeticoes')->textInput() ?>


    <?= $form->field($modelParameterizacao, 'peso')->textInput() ?>


    <?= $form->field($modelParameterizacao, 'tempo')->textInput() ?>

    <?php /*= $form->field($model, 'exercicio_id')->textInput() */?>
    <?= $form->field($model, 'exercicio_id')->dropDownList($listaExercicios, ['prompt' => '-Escolha um exercicio-']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
