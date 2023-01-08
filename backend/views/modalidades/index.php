<?php

use common\models\Modalidades;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Modalidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?=
                            Html::button('Criar Modalidades', ['value' => Url::toRoute('/modalidades/create'),'class' => 'btn btn-success', 'id'=>'modalButton']);
                            ?>
                        </div>
                    </div>

                    <?php
                    Modal::begin([
                        'title'=>'Modalidades',
                        'id'=>'modal',
                        'size'=>'modal-lg',
                    ]);

                    echo "<div id='modalContent'></div>";

                    Modal::end();
                    ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'nome',
                            [
                                'class' => ActionColumn::className(),
                                'template' => '{view} {update}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::button('<i class="fa fa-eye"></i>',['value' => Url::toRoute(['/modalidades/view', 'id' => $model->id]),'class' => 'btn btn-default btn-xs action-button model_popUp']);

                                    },
                                    'update' => function ($url, $model) {
                                        return Html::button('<i class="fa fa-pen"></i>',['value' => Url::toRoute(['/modalidades/update', 'id' => $model->id]),'class' => 'btn btn-default btn-xs action-button model_popUp']);

                                    },
                                ],
                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
