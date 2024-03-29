<?php
// _list_item.php
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<article class="item" data-key="<?= $model->exercicio->id; ?>">


    <h3 class="title">
        <?= Html::encode($model->exercicio->nome) ?>
        <?= Html::a('Editar Parametros', ['parameterizacao/update', 'id' => $model->parameterizacao->id, 'idplano'=>$model->plano->id], ['class' => 'btn btn-info'])?>
        <?= Html::a('Apagar', ['exercicioplano/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </h3>
    <table>
        <tr>
            <td rowspan="10"> <?= Html::img('data:image/jpg;charset=utf8;base64,' . $model->exercicio->exemplo, ['width' => '180px', 'height' => '180px']) ?></td>
            <td style="font-weight: bold;">Descricao:</td>
            <td><?= Html::encode($model->exercicio->descricao)?></td>
        <tr>
            <td style="font-weight: bold;">Series:</td>
            <td><?= Html::encode($model->parameterizacao->series) ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Repeticoes:</td>
            <td> <?= Html::encode($model->parameterizacao->repeticoes) ?></td>
        </tr>
        <tr>
            <?php if (!is_null($model->exercicio->equipamento)) {
                ?>
                <td style="font-weight: bold;">Equipamento:</td>
                <td> <?= Html::encode($model->exercicio->equipamento->nome) ?></td>
            <?php } ?>

        </tr>
        <tr>
            <?php if (!is_null($model->parameterizacao->peso)) {
                ?>
                <td style="font-weight: bold;">Peso:</td>
                <td> <?= Html::encode($model->parameterizacao->peso) ?></td>
            <?php } ?>
        </tr>
        <tr>
            <?php if (!is_null($model->parameterizacao->tempo)) {
                ?>
                <td style="font-weight: bold;">Tempo:</td>
                <td> <?= Html::encode($model->parameterizacao->tempo) ?></td>
            <?php } ?>

        </tr>
        </tr>

    </table>

</article>
