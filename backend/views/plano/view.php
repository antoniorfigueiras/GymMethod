<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\PlanoTreino */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Plano Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">



                    <?php /*  if($model->exercicio->tipoExercicio->nome == 'Aquecimento')
                       {

                       }*/?>
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,

                        'layout' => "{pager}\n{items}\n{summary}",
                        'itemView' => 'list_item',
                        'viewParams' => ['testParms' => 1],
                        'separator' => "<hr/>",
                        'itemOptions' =>['class' => 'list-view well'],

                    ]); ?>
                    <p>
                        <?= Html::a('Inserir Exercicio', ['exercicioplano/select_exercicio','idPlano' => $model->id], ['class' => 'btn btn-success']) ?>
                        <?php /*= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
                        <?= Html::a('Desativar Plano', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
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