<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap5\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TreinadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Selecione um Treinador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <?php
                    Modal::begin([
                        'title'=>'Treinador',
                        'id'=>'modal',
                        'size'=>'modal-lg',
                    ]);

                    echo "<div id='modalContent'></div>";

                    Modal::end();
                    ?>

                    <?php
                        echo $this->render('../treinador/_search', ['model' => $searchModel, 'action' => $action]);
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
                                   'value' => function($model) {
                                       return Html::button('<i class="fa fa-check"></i>',['value' => Url::toRoute(['/aulas-horario/create', 'id' => $model->user_id]),'class' => 'btn btn-default btn-xs action-button model_popUp']);

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
