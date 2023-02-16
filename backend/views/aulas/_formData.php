<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Aulas $model */
/** @var yii\widgets\ActiveForm $form */

//var_dump($sundays); die();
?>

<div class="aulas-form">

    <?php $form = ActiveForm::begin(['action' => ['create'], 'method' => 'post']); ?>

    <?= $form->field($model, 'data')->label('Semana')->dropDownList($sundays, [$sundays[0]]) ?>

    <div class="form-group">
        <?= Html::submitButton('create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
