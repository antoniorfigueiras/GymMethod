<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

$this->title = $model->nomeproprio;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Atualizar', ['update', 'id' => $model->user_id], [
                            'class' => 'btn btn-primary',
                            'hidden' =>  !Yii::$app->user->can("funcionario")]) ?>
                        <?php if ($model->user->status==1){
                           echo Html::a('Desativar', ['desativar', 'user_id' => $model->user_id], [
                                'class' => 'btn btn-danger',
                                'hidden' =>  !Yii::$app->user->can("desativarCliente"),
                                'data' => [
                                    'confirm' => 'Tem a certeza que pretende desativar este cliente?',
                                    'method' => 'post',
                                ],
                            ]);
                        } elseif($model->user->status==0)
                        {
                            echo Html::a('Ativar Cliente', ['ativar', 'user_id' => $model->user_id], [
                                'class' => 'btn btn-info',
                                'hidden' =>  !Yii::$app->user->can("desativarCliente"),
                                'data' => [
                                    'confirm' => 'Tem a certeza que pretende ativar este cliente?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                        ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'nomeproprio',
                            'apelido',
                            'telemovel',
                            'nif',
                            'peso',
                            'altura',
                            'pais',
                            'cidade',
                            'morada',
                            'codpostal',
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