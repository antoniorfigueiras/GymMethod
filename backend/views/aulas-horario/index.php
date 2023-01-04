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
                                Html::button('Create Aulas Horario', ['value' => Url::toRoute('/aulas-horario/create'),'class' => 'btn btn-success', 'id'=>'modalButton'])
                            ?>
                        </div>
                    </div>

                    <?php
                    Modal::begin([
                        'title'=>'Funcionário',
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

                            'id',
                            'modalidade.nome',
                            'instrutor.nomeproprio',
                            'diaSemana',
                            'inicio',
                            'fim',
                            'status',
                            'capacidade',
                            [
                                'class' => ActionColumn::className(),
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
