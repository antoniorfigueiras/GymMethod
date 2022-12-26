<?php

use hail812\adminlte3\yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Selecione um exercicio';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">


                    <?php echo $this->render('_searchExercicio', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,

                        //'filterModel' => $searchModel,
                        'columns' => [


                            'nome',
                            [
                                'format' => 'raw',
                                'label' => 'Selecionar',

                                'value' => function($model) use ($modelPlano) {

                          return Html::a('<i class="fa fa-check"></i>',

                                        Url::to(['create', 'idExercicio' => $model->id, 'idPlano' => $modelPlano->id]),
                                        [
                                            'id'=>'grid-custom-button',
                                            'data-pjax'=>true,
                                            'class'=>'button btn btn-default',
                                        ]
                                    );

                                }
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
