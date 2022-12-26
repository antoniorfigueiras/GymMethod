<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Exercicio */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Exercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'attribute'=>'exemplo',
                                'value'=> 'data:image/jpg;charset=utf8;base64,'. $model->exemplo,
                                'format' => ['image',['width'=>'100','height'=>'100']],
                            ],

                            'nome',
                            'descricao',
                            'dificuldade',
                            [
                                'attribute' => 'equipamento_id',
                                'label' => 'Equipamento',
                                'value' => function ($model) {
                                    if (isset($model->equipamento->nome))
                                    {
                                        return $model->equipamento->nome;
                                    }
                                    return 'Sem equipamento';

                                }
                            ],
                            [
                                'attribute'=>'tipo_exercicio_id',
                                'value'=> $model->tipoExercicio->nome,
                            ],
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>