<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Inscricoes $model */

$this->title = 'Create Inscricoes';
$this->params['breadcrumbs'][] = ['label' => 'Inscricoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscricoes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
