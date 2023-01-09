<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\AulasHorario;
use common\models\Modalidades;
use common\fixtures\ModalidadesFixture;
use common\fixtures\PerfilFixture;

class AulasHorarioTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    public function _fixtures()
    {
        return [
            'modalidade' => [
                'class' => ModalidadesFixture::class,
                'dataFile' => codecept_data_dir() . 'modalidades.php'
            ],
            'perfil' => [
                'class' => PerfilFixture::class,
                'dataFile' => codecept_data_dir() . 'perfil.php'
            ],
        ];
    }


    public function testCreate()
    {
        $aulaHorario = new AulasHorario();
        $modalidade = $this->tester->grabFixture('modalidade', 'modalidade1');
        $idInstrutor = $this->tester->grabFixture('perfil', 'perfil1');

        $aulaHorario->id_modalidade = $modalidade->id;

        $aulaHorario->id_instrutor = $idInstrutor->user_id;

        $aulaHorario->diaSemana = "segunda";

        $aulaHorario->inicio = '13:00:00';

        $aulaHorario->fim = '14:00:00';

        $aulaHorario->capacidade = 10;

        $aulaHorario->status = "Ativo";

        verify($aulaHorario->save())->true();
    }

    public function testUpdate()
    {
        $aulaHorario = new AulasHorario();
        $modalidade = $this->tester->grabFixture('modalidade', 'modalidade1');
        $idInstrutor = $this->tester->grabFixture('perfil', 'perfil1');

        $aulaHorario->id_modalidade = $modalidade->id;
        $aulaHorario->id_instrutor = $idInstrutor->user_id;
        $aulaHorario->diaSemana = "segunda";
        $aulaHorario->inicio = '13:00:00';
        $aulaHorario->fim = '14:00:00';
        $aulaHorario->capacidade = 10;
        $aulaHorario->status = "Ativo";

        $aulaHorario->save();

        $model =  AulasHorario::findOne(['id' => $aulaHorario->id]);


        $model->id_modalidade = $modalidade->id;
        $model->id_instrutor = $idInstrutor->user_id;
        $model->diaSemana = "terça";
        $model->inicio = '14:00:00';
        $model->fim = '15:00:00';
        $model->capacidade = 10;
        $model->status = "Inativo";

        verify($model->save())->true();
    }

    public function testDelete()
    {
        $aulaHorario = new AulasHorario();
        $modalidade = $this->tester->grabFixture('modalidade', 'modalidade1');
        $idInstrutor = $this->tester->grabFixture('perfil', 'perfil1');

        $aulaHorario->id_modalidade = $modalidade->id;
        $aulaHorario->id_instrutor = $idInstrutor->user_id;
        $aulaHorario->diaSemana = "segunda";
        $aulaHorario->inicio = '13:00:00';
        $aulaHorario->fim = '14:00:00';
        $aulaHorario->capacidade = 10;
        $aulaHorario->status = "Ativo";

        $aulaHorario->save();

        $model=  AulasHorario::findOne(['id' => $aulaHorario->id]);
        verify($model->delete());
    }
}
