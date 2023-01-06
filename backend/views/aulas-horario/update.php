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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
