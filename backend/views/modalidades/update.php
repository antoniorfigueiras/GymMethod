<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Modalidades $model */

$this->title = 'Update Modalidades: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Modalidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modalidades-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
