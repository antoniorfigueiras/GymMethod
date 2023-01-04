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

                            <?= Html::a('Criar Exercicio', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [

                    //return Html::img("data:image/jpg;charset=utf8;base64,".base64_encode($model->exemplo));
                            'nome',

                            [
                                'attribute' => 'equipamento_id',
                                'label' => 'Equipamento',
                                'content' => function ($model) {
                                   if (isset($model->equipamento->nome))
                                   {
                                       return $model->equipamento->nome;
                                   }
                                   return 'Sem equipamento';

                                }
                            ],
                            [
                                'attribute' => 'tipo_exercicio_id',
                                'label' => 'Tipo de exercicio',
                                'content' => function ($model) {
                                    return $model->tipoExercicio->nome;
                                }
                            ],
                            'dificuldade',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => [],
                                'template' => '{view} {update} {delete}',
                            ],
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

