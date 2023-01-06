<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Modalidades $model */

$this->title = 'Create Modalidades';
$this->params['breadcrumbs'][] = ['label' => 'Modalidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modalidades-create">
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
