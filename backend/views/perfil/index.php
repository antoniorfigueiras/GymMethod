<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PerfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar funcionario', ['funcionario/create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'label' => 'Id',
                                'value' => function($model) {
                                    return $model->id;
                                }

                            ],
                            'telemovel',
                            'peso',
                            'altura',
                            [
                                'label' => 'User',
                                'value' => function($model) {
                                    return $model->userId->username;
                                }

                            ],
                            [
                                'label' => '',
                                'value' => function($model) {
                                    if ($model->userId->status == 10){
                                        return "Ativo";
                                    }else
                                        return "Inativo";
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
