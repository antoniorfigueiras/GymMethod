<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TreinadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Editar Treinador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    echo $this->render('../treinador/_search', ['model' => $searchModel, 'action' => $action, 'id' => $id]);
                    ?>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [


                            'nomeproprio',
                            'apelido',
                            'telemovel',
                            [

                                'format' => 'raw',
                                'label' => 'Selecionar',
                                'value' => function($model) use ($id) {

                                    return Html::a(

                                        '<i class="fa fa-check"></i>',

                                        Url::to(['update-id-funcionario', 'id' => $id,'idTreinador' => $model->user_id]),

                                        [

                                            'id'=>'grid-custom-button',

                                            'data-pjax'=>true,

                                            'action'=>Url::to(['update-id-funcionario', 'idTreinador' => $model->user_id]),

                                            'class'=>'button btn btn-default',

                                            'id'=>'btnFuncionario',

                                        ]

                                    );

                                }

                            ],


                            //'apelido',
                            //'codpostal',
                            //'pais',
                            //'cidade',
                            //'morada',


                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]);

                    ?>






                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
