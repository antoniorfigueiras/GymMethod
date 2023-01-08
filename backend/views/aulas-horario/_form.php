<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use common\models\Modalidades;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var common\models\AulasHorario $model */
/** @var yii\widgets\ActiveForm $form */


$modalidades = Modalidades::find()->all();

$listmodalidades=ArrayHelper::map($modalidades,'id','nome');

?>

<div class="aulas-horario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_instrutor')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'id_modalidade')->label('Modalidade')->dropDownList(
        $listmodalidades,
        ['prompt'=>'Select...']
    ) ?>

    <?= $form->field($model, 'diaSemana')->dropDownList([ 'segunda' => 'Segunda', 'terça' => 'Terça', 'quarta' => 'Quarta', 'quinta' => 'Quinta', 'sexta' => 'Sexta', 'sábado' => 'Sábado', ], ['prompt' => 'Select...']) ?>

    <?= $form->field($model, 'inicio')->widget(TimePicker::className(), [
        'name' => 't1',
        'pluginOptions' => [
            'showSeconds' => true,
            'showMeridian' => false,
            'minuteStep' => 1,
            'secondStep' => 5,
        ]
    ]) ?>

    <?= $form->field($model, 'fim')->widget(TimePicker::className(), [
        'name' => 't1',
        'pluginOptions' => [
            'showSeconds' => true,
            'showMeridian' => false,
            'minuteStep' => 1,
            'secondStep' => 5,
        ]
    ])  ?>

    <?= $form->field($model, 'status')->dropDownList(
            ['Ativo' => 'Ativo','Inativo' => 'Inativo']
    ) ?>

    <?= $form->field($model, 'capacidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
