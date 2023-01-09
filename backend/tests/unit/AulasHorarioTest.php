<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\AulasHorario;
use common\fixtures\ModalidadesFixture;
use common\fixtures\UserFixture;

class AulasHorarioTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    public function _fixtures()
    {
        return [
            'modalidade' => [
                'class' => ModalidadesFixture::class,
                'dataFile' => codecept_data_dir() . 'modalidades_data.php'
            ],
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user_data.php'
            ],
        ];
    }

    protected function _before()
    {

    }



    public function testCreate()
    {
        $aulaHorario = new AulasHorario();
        $modalidade = $this->tester->grabFixture('modalidade', 'modalidade1');
        $idInstrutor = $this->tester->grabFixture('user', 'user1');



        $aulaHorario->id_modalidade = $modalidade->id;
        $aulaHorario->id_instrutor = $idInstrutor->id;
        $aulaHorario->diaSemana = "2023-01-07";
        $aulaHorario->inicio = "13:00:00";
        $aulaHorario->fim = "14:00:00";
        $aulaHorario->capacidade = 10;
        $aulaHorario->status = "Ativo";

        verify($aulaHorario->save())->true();
    }
}
