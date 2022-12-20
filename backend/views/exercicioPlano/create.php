<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ExercicioPlano */

$this->title = 'Criar Exercicio para: '. $modelPlano->nome;
$this->params['breadcrumbs'][] = ['label' => 'Exercicio Planos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form', [
                        'model' => $model,
                        'modelPlano' => $modelPlano,
                        'modelParameterizacao' => $modelParameterizacao,
                        'listaExercicios' => $listaExercicios
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>