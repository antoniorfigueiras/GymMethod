<?php


use common\models\AulasHorario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
    if(isset($_SESSION['horarioError'])){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['horarioError'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['horarioError']);
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?=
                                //Html::button('Criar Horário', ['value' => Url::toRoute('/aulas-horario/select'),'class' => 'btn btn-success', 'id'=>'modalButton']);
                                Html::a('Criar Horário', ['select'], ['class' => 'btn btn-success']);
                            ?>
                        </div>
                    </div>

                    <?php
                    Modal::begin([
                        'title'=>'Treinador',
                        'id'=>'modal',
                        'size'=>'modal-lg',
                    ]);

                    echo "<div id='modalContent'></div>";

                    Modal::end();
                    ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                    'label' => 'Modalide',
                                    'value' => 'modalidade.nome',
                            ],
                            [
                                'label' => 'Instrutor',
                                'value' => 'instrutor.nomeproprio',
                            ],
                            'diaSemana',
                            'inicio',
                            'fim',
                            'status',
                            'capacidade',
                            [
                                'class' => ActionColumn::className(),
                                'template' => '{view} {update} {instrutor}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::button('<i class="fa fa-eye"></i>',['value' => Url::toRoute(['/aulas-horario/view', 'id' => $model->id]),'class' => 'btn btn-default btn-xs action-button model_popUp']);

                                    },
                                    'update' => function ($url, $model) {
                                        return Html::button('<i class="fa fa-pen"></i>',['value' => Url::toRoute(['/aulas-horario/update', 'id' => $model->id]),'class' => 'btn btn-default btn-xs action-button model_popUp']);

                                    },
                                    'instrutor' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-user"></i>',
                                            Url::to(['/aulas-horario/instrutor', 'id' => $model->id]), ['class'=>'button btn btn-default action-button']
                                        );
                                    },
                                ],
                                'urlCreator' => function ($action, AulasHorario $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
