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
$carrinhoItemCount = $this->params['carrinhoItemCount'];

use frontend\assets\AppAssetLoja;
AppAssetLoja::register($this);
$this->title = 'GymMethod';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <?php
        echo Html::a('GYMMETHOD',['../'],['class' => ['navbar-brand']]);
        ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            </ul>
            <form class="d-flex" action="/carrinho/index">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>Carrinho
                    <span class="badge bg-dark text-white ms-1 rounded-pill" id="carrinho-quantidade"><?php echo $carrinhoItemCount ?></span>
                </button>
            </form>
        </div>
    </div>
</nav>
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
                            <?php echo \yii\helpers\Html::a('Delete', ['/cart/delete', 'id' => $item['id']], [
                                'class' => 'btn btn-outline-danger btn-sm',
                                'data-method' => 'post',
                                'data-confirm' => 'Are you sure you want to remove this product from cart?'
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

            <p class="text-muted text-center p-5">There are no items in the cart</p>

        <?php endif; ?>

    </div>
</div>