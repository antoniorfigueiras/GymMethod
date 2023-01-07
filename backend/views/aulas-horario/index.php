<?php

use common\models\AulasHorario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Aulas Horarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?=
                                Html::button('Criar Horário', ['value' => Url::toRoute('/aulas-horario/select'),'class' => 'btn btn-success', 'id'=>'modalButton']);
                                //Html::a('Criar Horário', ['create'], ['class' => 'btn btn-success']);
                            ?>
                        </div>
                    </div>

                    <?php
                    Modal::begin([
                        'title'=>'Treinador',
                        'id'=>'modal',
                        'size'=>'modal-lg',
                    ]);

                    echo "<div id='modalContent'></div>";

                    Modal::end();
                    ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                    'label' => 'Modalide',
                                    'value' => 'modalidade.nome',
                            ],
                            [
                                'label' => 'Instrutor',
                                'value' => 'instrutor.nomeproprio',
                            ],
                            'diaSemana',
                            'inicio',
                            'fim',
                            'status',
                            'capacidade',
                            [
                                'class' => ActionColumn::className(),
                                'template' => '{view} {update} {instrutor}',
                                'buttons' => [
                                    'instrutor' => function ($url, $model) {
                                        return Html::button('<i class="glyphicon glyphicon-search"></i>',['value' => Url::toRoute(['/aulas-horario/instrutor', 'id' => $model->id]),'class' => 'btn btn-default btn-xs model_popUp']);
                                    },
                                ],
                                'urlCreator' => function ($action, AulasHorario $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
