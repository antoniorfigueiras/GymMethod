<?php

use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Parameterizacao */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="parameterizacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'series')->textInput() ?>

    <?= $form->field($model, 'repeticoes')->textInput() ?>

    <?= $form->field($model, 'peso')->textInput() ?>

    <?= $form->field($model, 'tempo')->widget(TimePicker::classname(), [
        'pluginOptions' => [
            'defaultTime' => '00:00:00',
            'showMeridian' => false,
            'showSeconds' => true,
            'autoclose' => true,
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
