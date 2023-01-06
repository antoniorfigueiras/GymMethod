<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Inscricoes $model */

$this->title = 'Criar Inscrição';
$this->params['breadcrumbs'][] = ['label' => 'Inscricoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscricoes-create">
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
