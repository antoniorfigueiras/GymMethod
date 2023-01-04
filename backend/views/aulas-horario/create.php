<?php

use yii\helpers\Html;
use yii\bootstrap5\Modal;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var common\models\AulasHorario $model */

$this->title = 'Create Aulas Horario';
$this->params['breadcrumbs'][] = ['label' => 'Aulas Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulas-horario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
