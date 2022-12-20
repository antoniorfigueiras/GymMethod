<?php
/** @var array $items */

/** @var yii\web\View $this */
/** @var \yii\data\ActiveDataProvider $dataProvider */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

use frontend\assets\AppAssetLoja;
AppAssetLoja::register($this);
$this->title = 'GymMethod';
?>


<div class="card">
    <div class="card-header">
        <h3>Your cart items</h3>
    </div>
    <div class="card-body p-0">

        <?php if (!empty($items)): ?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($items as $item): ?>
                    <tr data-id="<?php echo $item['id'] ?>" data-url="<?php echo \yii\helpers\Url::to(['/cart/change-quantity']) ?>">
                        <td><?php echo $item['nome'] ?></td>
                        <td>
                            <img src="<?php echo \common\models\Produto::formatImageUrl($item['imagem']) ?>"
                                 style="width: 50px;"
                                 alt="<?php echo $item['nome'] ?>">
                        </td>
                        <td><?php echo Yii::$app->formatter->asCurrency($item['preco']) ?></td>
                        <td>
                            <input type="number" min="1" class="form-control item-quantity" style="width: 60px" value="<?php echo $item['quantidade'] ?>">
                        </td>
                        <td><?php echo Yii::$app->formatter->asCurrency($item['preco_total']) ?></td>
                        <td>
                            <?php echo \yii\helpers\Html::a('Delete', ['carrinho/delete', 'id' => $item['id']], [
                                'class' => 'btn btn-outline-danger btn-sm',
                                'data-method' => 'post',
                                'data-confirm' => 'Tem a certeza que deseja remover este produto do seu carrinho?'
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="card-body text-right">
                <a href="<?php echo \yii\helpers\Url::to(['/cart/checkout']) ?>" class="btn btn-primary">Checkout</a>
            </div>
        <?php else: ?>

            <p class="text-muted text-center p-5">Não existem itens no teu carrinho :(</p>

        <?php endif; ?>

    </div>
</div>