<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Produto', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                    'attribute' => 'id',
                                'contentOptions' => [
                                        'style' => 'width: 60px'
                                ]
                            ],
                            [
                                'label' => 'Imagem Produto',
                                'attribute' => 'imagem',
                                'content' => function($model) {
                        /** @var \common\models\Produto $model */
                        return Html::img($model->getImageUrl(), ['style' => 'width: 100px']);
                                }
                            ],
                            'nome',
                            'preco:currency',
                            [
                                    'attribute' => 'estado',
                                'content' => function ($model) {
                                    /** @var \common\models\Produto $model */
                                    return Html::tag('span', $model->estado ? 'Ativo' : 'Desativado', [
                                            'class' => $model->estado ? 'badge badge-success' : 'badge badge-danger'
                                    ]);
                                }
                            ],
                            [
                                    'attribute' => 'created_at',
                                'format' => 'datetime',
                                'contentOptions' => ['style' => 'white-space: nowrap']
                            ],
                            [
                                'attribute' => 'updated_at',
                                'format' => 'datetime',
                                'contentOptions' => ['style' => 'white-space: nowrap']
                            ],
                            //'created_by',
                            //'updated_by',

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
