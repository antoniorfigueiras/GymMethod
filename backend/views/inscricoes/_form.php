<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Inscricoes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inscricoes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_aula')->textInput() ?>

    <?= $form->field($model, 'id_perfil')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
