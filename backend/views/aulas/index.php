<?php

use common\models\Aulas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Aulas', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


    <?=

        \yii2fullcalendar\yii2fullcalendar::widget(array(
            'events'=> $events,
        ));

    ?>

                </div>
            </div>
        </div>
    </div>
</div>
