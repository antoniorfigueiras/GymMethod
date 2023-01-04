<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AulasHorario $model */

$this->title = 'Update Aulas Horario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aulas Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aulas-horario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
