<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Atualizar', ['update', 'id' => $model->id],
                            ['class' => 'btn btn-primary',
                            ]) ?>
                        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => "<tr><th style='width: 15%;'>{label}</th><td>{value}</td></tr>",
                        'attributes' => [
                            'id',
                            [
                                'attribute' => 'nome',
                            ],
                            'descricao:html',
                            [
                                'attribute' => 'cliente_id',
                                'label' => 'Cliente',
                                'value' => function ($model) {
                                    $nomeCompleto = $model->cliente->nomeproprio . " " . $model->cliente->apelido;
                                    return $nomeCompleto;
                                }
                            ],
                            [
                                'attribute' => 'nutricionista_id',
                                'label' => 'Nutricionista',
                                'value' => function ($model) {
                                    $nomeCompleto = $model->nutricionista->nomeproprio . " " . $model->nutricionista->apelido;
                                    return $nomeCompleto;
                                }
                            ],
                            [
                                'attribute' => 'data',
                                'format' => ['datetime', 'php:d.m.Y H:i'],
                            ],
                            [
                                'attribute' => 'estado',
                                'format' => 'html',
                                'value' => function ($model) {
                                    /** @var \common\models\Consulta $model */
                                    if ($model->estado == 0)
                                    {
                                        return Html::tag('span', 'Marcada', [
                                            'class' => 'badge badge-primary'
                                        ]);
                                    } elseif ($model->estado == 1)
                                    {
                                        return Html::tag('span', 'Concluida', [
                                            'class' => 'badge badge-success'
                                        ]);
                                    }elseif ($model->estado == 2)
                                    {
                                        return Html::tag('span', 'Cancelada', [
                                            'class' => 'badge badge-danger'
                                        ]);
                                    }

                                },
                                'contentOptions' => [
                                    'style' => 'width: 160px'
                                ]
                            ],
                        ],
                    ]) ?>
                    <p>
                        <?php
                        if ($model->estado==0)
                            {
                                echo Html::a('Consulta Concluida', ['concluir', 'id' => $model->id], [
                                    'class' => 'btn btn-info',
                                    'data' => [
                                        'confirm' => 'Tem a certeza que esta consulta foi concluida?',
                                        'method' => 'post',
                                    ],
                                ]);
                                echo "&nbsp;&nbsp";
                                echo Html::a('Consulta Cancelada', ['cancelar', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Tem a certeza que pretende cancelar esta consulta?',
                                        'method' => 'post',
                                    ],
                                ]);
                            }
                        ?>
                    </p>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>