<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\NutricionistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nutricionistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Nutricionista', ['user/create','userType' => 'nutricionista'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,

                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'user_id',
                            'nomeproprio',
                            'apelido',
                            'telemovel',
                           [
                                'attribute' => 'user_id',
                                'label' => 'Estado',
                                'content' => function ($model) {
                                   return Html::tag('span', $model->user->status ? 'Ativo' : 'Inativo', [
                                        'class' => $model->user->status ? 'badge badge-success' : 'badge badge-danger'
                                    ]);
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
