<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ExercicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exercicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">

                            <?= Html::a('Create Exercicio', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                    //return Html::img("data:image/jpg;charset=utf8;base64,".base64_encode($model->exemplo));
                            'id',
                            'nome',
                            'descricao',
                            'dificuldade',
                            //'exemplo',
                            [
                                'attribute' => 'exemplo',
                                'label' => 'Exemplo',
                                'content' => function ($model) {
                                    return Html::img("data:image/jpg;charset=utf8;base64,".base64_encode($model->exemplo));
                                  }
                            ],
                            //'equipamento_id',
                            //'tipo_exercicio_id',

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

