<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PlanoTreinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planos de Treino';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Plano de Treino', ['cliente/select'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [
                                'nome',
                            [
                                'attribute' => 'cliente_id',
                                'label' => 'Cliente',
                                'content' => function ($model) {
                                    return $model->cliente->nomeproprio;
                                }
                            ],
                            [
                                'attribute' => 'instrutor_id',
                                'label' => 'Instrutor',
                                'content' => function ($model) {
                                    return $model->instrutor->nomeproprio;
                                }
                            ],
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
