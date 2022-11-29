<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
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
                            'id',
                            [
                                    'attribute' => 'imagem',
                                    'format' => ['html'],
                                    'value' => fn() => Html::img($model->getImageUrl(), ['style' => 'width: 50px']),
                            ],
                            [
                                'attribute' => 'nome',
                                'options' => [
                                    'style' => 'white-space: normal'
                                ]
                            ],
                            'descricao:html',
                            'preco:currency',
                            [
                                'attribute' => 'estado',
                                'format' => 'html',
                                'value' => fn() => Html::tag('span', $model->estado ? 'Ativo' : 'Desativado', [
                                'class' => $model->estado ? 'badge badge-success' : 'badge badge-danger'
                             ]),
                            ],
                            'created_at:datetime',
                            'updated_at:datetime',
                            'createdBy.username',
                            'updatedBy.username',
                        ],
                    ]) ;
                    ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>