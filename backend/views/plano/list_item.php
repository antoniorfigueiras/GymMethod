<?php
// _list_item.php
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<article class="item" data-key="<?= $model->exercicio->id; ?>">


    <h3 class="title">
        <?= Html::encode($model->exercicio->nome) ?>
    </h3>
    <table>
        <tr>
            <td rowspan="10"> <?= Html::img('data:image/jpg;charset=utf8;base64,' . $model->exercicio->exemplo, ['width' => '180px', 'height' => '180px']) ?></td>
            <td style="font-weight: bold;">Descricao:</td>
            <td><?= Html::encode($model->exercicio->descricao) ?></td>
        <tr>
            <td style="font-weight: bold;">Series:</td>
            <td><?= Html::encode($model->parameterizacao->series) ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Repeticoes:</td>
            <td> <?= Html::encode($model->parameterizacao->repeticoes) ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Equipamento:</td>
            <td> <?= Html::encode($model->exercicio->equipamento->nome) ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Peso:</td>
            <td> <?= Html::encode($model->parameterizacao->peso) ?></td>
        </tr>
        <tr>
            <?php if (!is_null($model->parameterizacao->tempo))
                {?>
                    <td style="font-weight: bold;">Tempo:</td>
                    <td> <?= Html::encode($model->parameterizacao->tempo) ?></td>
            <?php  } ?>

        </tr>
        </tr>

    </table>

</article>
