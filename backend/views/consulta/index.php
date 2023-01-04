<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $model common\models\Consulta */
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Consulta', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            [
                                'attribute' => 'nome',
                                'contentOptions' => [
                                    'style' => 'width: 260px'
                                ]
                            ],
                            [
                                'attribute' => 'data',
                                'format' => ['datetime', 'php:d.m.Y H:i'],
                                'contentOptions' => [
                                    'style' => 'width: 160px'
                                ]
                            ],
                            [
                                'attribute' => 'cliente_id',
                                'label' => 'Cliente',
                                'content' => function ($model) {
                                $nomeCliente = $model->cliente->nomeproprio . " " . $model->cliente->apelido;
                                return $nomeCliente;
                                }
                            ],
                            [
                                'attribute' => 'nutricionista_id',
                                'label' => 'Nutricionista',
                                'content' => function ($model) {
                                    $nomeNutricionista = $model->nutricionista->nomeproprio . " " . $model->nutricionista->apelido;
                                    return $nomeNutricionista;
                                }
                            ],
                            [
                                'attribute' => 'estado',
                                'content' => function ($model) {
                                    /** @var \common\models\Consulta $model */
                                    if ($model->estado == 0)
                                    {
                                        return Html::tag('span', 'Marcada', [
                                            'class' => 'badge badge-primary'
                                        ]);
                                    } elseif ($model->estado == 1)
                                    {
                                        return Html::tag('span', 'Realizada', [
                                            'class' => 'badge badge-success'
                                        ]);
                                    }elseif ($model->estado == 2)
                                    {
                                        return Html::tag('span', 'Cancelada', [
                                            'class' => 'badge badge-alert'
                                        ]);
                                    }

                                },
                                'contentOptions' => [
                                    'style' => 'width: 160px'
                                ]
                            ],
                            //'idcliente',
                            //'created_by',

                            ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
