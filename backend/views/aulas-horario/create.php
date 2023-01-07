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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?=$this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
