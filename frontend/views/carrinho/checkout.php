<?php
/** @var \common\models\Venda $venda */
/** @var \common\models\Perfil $perfil */
/** @var \common\models\VendaMorada $vendaMorada */
/** @var array $itensCarrinho */
/** @var int $produtoQuantidade */

/** @var float $precoTotal */

use frontend\assets\AppAssetLogin;

AppAssetLogin::register($this);

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div>
        <?php
        echo Html::a('GYMMETHOD', ['../'], ['class' => ['navbar-brand']]);
        ?>
    </div>
</nav>
<?php $form = ActiveForm::begin([
    'id' => 'checkout-form',
]);
?>
<div class="row">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <h5>Informações do Cliente</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <?= $form->field($venda, 'nomeproprio')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($venda, 'apelido')->textInput(['autofocus' => true]) ?>
                    </div>
                </div>
                <?= $form->field($venda, 'email')->textInput(['autofocus' => true]) ?>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Informações da Morada</h5>
            </div>
            <div class="card-body">
                <?=yii\helpers\Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken)?>
                <?= $form->field($vendaMorada, 'morada') ?>
                <?= $form->field($vendaMorada, 'cidade') ?>
                <?= $form->field($vendaMorada, 'pais') ?>
                <?= $form->field($vendaMorada, 'codpostal') ?>
            </div>
        </div>

    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Pedido</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($itensCarrinho as $item): ?>
                        <tr>
                            <td>
                                <img src="<?php echo \common\models\Produto::formatImageUrl($item['imagem']) ?>"
                                     style="width: 50px;"
                            </td>
                            <td><?php echo $item['nome'] ?></td>
                            <td>
                                <?php echo $item['quantidade'] ?>
                            </td>
                            <td><?php echo Yii::$app->formatter->asCurrency($item['preco_total']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                    <table class="table">
                        <tr>
                            <td>Nº Produtos</td>
                            <td class="text-right"><?php echo $produtoQuantidade ?></td>
                        </tr>
                        <tr>
                            <td>Preço Total</td>
                            <td class="text-right">
                                <?php echo Yii::$app->formatter->asCurrency($precoTotal) ?>
                            </td>
                        </tr>
                    </table>

                    <p class="text-right mt-3">
                        <button class="btn btn-secondary">Checkout</button>
                    </p>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
