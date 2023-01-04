<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Aulas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="aulas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_aulas_horario')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Aberto' => 'Aberto', 'Cheio' => 'Cheio', 'Já decorreu' => 'Já decorreu', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
