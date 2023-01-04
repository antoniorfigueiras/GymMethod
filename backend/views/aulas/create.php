<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Aulas $model */

$this->title = 'Create Aulas';
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
