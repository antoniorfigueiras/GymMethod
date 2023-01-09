<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\VendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'ordersTable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class
        ],
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width: 80px;']
            ],
            [
                'attribute' => 'fullname',
                'content' => function ($model) {
                    return $model->nomeproprio . ' ' . $model->apelido;
                },
            ],
            'preco_total:currency',
            //'email:email',
            //'transaction_id',
            //'paypal_order_id',
            [
                'attribute' => 'estado',
                'content' =>function($model) {
                if ($model->estado == 0) {
                    return \yii\bootstrap4\Html::tag('span', 'Completo', ['class' => 'badge badge-success']); }
                else if ($model->estado == 1) {
                    return \yii\bootstrap4\Html::tag('span', 'Pago', ['class' => 'badge badge-secondary']); }}
            ],
            'created_at:datetime',
            //'created_by',

            [
                'class' => 'common\grid\ActionColumn',
                'template' => '{view} {update}',
                'contentOptions' => [
                    'class' => 'td-actions'
                ]
            ],
        ],
    ]); ?>


</div>