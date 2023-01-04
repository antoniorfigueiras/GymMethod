<?php
/** @var \common\models\Venda $venda */

$vendaMorada = $venda->vendaMorada;
use frontend\assets\AppAssetLogin;

AppAssetLogin::register($this);
?>
<script src="https://www.paypal.com/sdk/js?client-id=AdpBFkNKqEu9-QUssDz1g6lTpwIFdu5a_L4uLt17J5r7liSHVaIn3nQDihWz7hpvzaPvf40UpIjTjy-d&currency=EUR"></script>
<h3>Venda #<?php echo $venda->id ?> detalhes: </h3>
<hr>
<div class="row">
    <div class="col">
        <h5>Informação do cliente</h5>
        <table class="table">
            <tr>
                <th>Nome</th>
                <td><?php echo $venda->nomeproprio ?></td>
            </tr>
            <tr>
                <th>Apelido</th>
                <td><?php echo $venda->apelido ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $venda->email?></td>
            </tr>
        </table>
        <h5>Informação da morada</h5>
        <table class="table">
            <tr>
                <th>Morada</th>
                <td><?php echo $vendaMorada->morada ?></td>
            </tr>
            <tr>
                <th>Cidade</th>
                <td><?php echo $vendaMorada->cidade ?></td>
            </tr>
            <tr>
                <th>País</th>
                <td><?php echo $vendaMorada->pais ?></td>
            </tr>
            <tr>
                <th>Codigo Postal</th>
                <td><?php echo $vendaMorada->codpostal ?></td>
            </tr>
        </table>
    </div>
    <div class="col">
        <h5>Products</h5>
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($venda->itensVenda as $item): ?>
                <tr>
                    <td>
                        <img src="<?php echo $item->produto->getImageUrl() ?>"
                             style="width: 50px;">
                    </td>
                    <td><?php echo $item->nome_produto ?></td>
                    <td><?php echo $item->quantidade ?></td>
                    <td><?php echo Yii::$app->formatter->asCurrency($item->quantidade * $item->preco_unidade) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <hr>
        <table class="table">
            <tr>
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <th>Total Items</th>
                <td><?php echo $venda->getItensQuantidade() ?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td><?php echo Yii::$app->formatter->asCurrency($venda->preco_total) ?></td>
            </tr>
        </table>

        <div id="paypal-button-container"></div>
    </div>
</div>
<script>
    paypal.Buttons({
        createOrder: function (data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php echo $venda->preco_total ?>
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function (details) {
                const $form = $('#checkout-form');
                const formData = $form.serializeArray();
                $.ajax({
                    method: 'post',
                    url: '<?php echo \yii\helpers\Url::to(['carrinho/submeter-pagamento', 'vendaId' => $venda->id])?>',
                    data: formData,
                    success: function (res) {
                        // This function shows a transaction success message to your buyer.
                        alert("Thanks for your business");
                        window.location.href = '';
                    }
                })
            });
        }
    }).render('#paypal-button-container');
    // This function displays Smart Payment Buttons on your web page.
</script>