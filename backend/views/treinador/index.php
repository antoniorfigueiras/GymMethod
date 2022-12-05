<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TreinadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Treinador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Treinador', ['user/create', 'userType' => 'treinador'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'nomeproprio',
                            'telemovel',
                            'peso',
                            'altura',
                            [
                                'attribute' => 'estado',
                                'content' => function ($model) {
                                            if ($model->user_Id->status == '10'){
                                                return Html::tag('span', 'Ativo', [
                                                    'class' => 'badge badge-success'
                                                ]);
                                            }else
                                            {
                                                return Html::tag('span', 'Inativo', [
                                                    'class' =>'badge badge-danger'
                                                ]);
                                            }

                                }
                            ],
                            //'nomeproprio',
                            //'apelido',
                            //'codpostal',
                            //'pais',
                            //'cidade',
                            //'morada',

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
