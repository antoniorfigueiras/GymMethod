<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = 'Venda #' . $model->id . ' detalhes';
$this->params['breadcrumbs'][] = ['label' => 'Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$vendaMorada = $model->vendaMorada;
?>
<div class="order-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'preco_total:currency',
            [
                'attribute' => 'estado',
                'format' => 'html',
                'value' =>function($model) {
                    if ($model->estado == 0) {
                        return \yii\bootstrap4\Html::tag('span', 'Completo', ['class' => 'badge badge-success']); }
                    else if ($model->estado == 1) {
                        return \yii\bootstrap4\Html::tag('span', 'Pago', ['class' => 'badge badge-secondary']); }
                    else if ($model->estado == 2) {
                        return \yii\bootstrap4\Html::tag('span', 'Cancelada', ['class' => 'badge badge-danger']); }}
            ],
            'nomeproprio',
            'apelido',
            'email:email',
            'created_at:datetime',
        ],
    ]) ?>

    <h4>Morada</h4>
    <?= DetailView::widget([
        'model' => $vendaMorada,
        'attributes' => [
            'morada',
            'cidade',
            'pais',
            'codpostal',
        ],
    ]) ?>

    <h4>Items Venda</h4>
    <table class="table table-sm">
        <thead>
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Preço Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model->itensVenda as $item): ?>
            <tr>
                <td>
                    <img src="<?php echo $item->produto ? $item->produto->getImageUrl() : \common\models\Produto::formatImageUrl(null) ?>"
                         style="width: 50px;">
                </td>
                <td><?php echo $item->nome_produto ?></td>
                <td><?php echo $item->quantidade ?></td>
                <td><?php echo Yii::$app->formatter->asCurrency($item->preco_unidade) ?></td>
                <td><?php echo Yii::$app->formatter->asCurrency($item->quantidade * $item->preco_unidade) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    if ($model->estado==0)
    {
        echo Html::a('Venda Paga', ['pago', 'id' => $model->id], [
            'class' => 'btn btn-info',
            'data' => [
                'confirm' => 'Tem a certeza que esta consulta foi paga?',
                'method' => 'post',
            ],
        ]);
        echo "&nbsp;&nbsp";
        echo Html::a('Venda Cancelada', ['cancelar', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende cancelar esta consulta?',
                'method' => 'post',
            ],
        ]);
    }
    ?>

</div>