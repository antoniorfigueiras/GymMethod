<?php

namespace common\tests\unit\models;

use common\models\Consulta;
use common\models\Perfil;
use \Tests\Support\UnitTester;
use Yii;
use common\fixtures\UserFixture;

/**
 * AcceptanceTester form test
 */
class ConsultaTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return [
            'user' => [
            'class' => UserFixture::class,
            'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }

    public function testcriarConsultaErrado()
    {
        $consulta = new Consulta();
        $consulta->nome ="Consultaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($consulta->validate(['nome']));
        $consulta->descricao =123;
        $this->assertFalse($consulta->validate(['descricao']));
        $consulta->estado = "estado";
        $this->assertFalse($consulta->validate(['estado']));
        $consulta->data = null;
        $this->assertFalse($consulta->validate(['data']));
        $consulta->cliente_id = 5;
        $this->assertFalse($consulta->validate(['cliente_id']));
        $consulta->nutricionista_id = 6;
        $this->assertFalse($consulta->validate(['nutricionista_id']));
        verify($consulta->save())->false();

    }


    public function testcriarConsulta()
    {
        $cliente = $this->tester->grabFixture('user', 'user3');
        $nutricionista = $this->tester->grabFixture('user', 'user2');
        $consulta = new Consulta();
        $consulta->nome ="Consulta de Nutrição";
        $consulta->descricao ="Consulta para um plano novo de Nutrição";
        $consulta->estado = 1;
        $consulta->data = "2022-12-29 02:10:00";
        $consulta->cliente_id = $cliente->id;
        $consulta->nutricionista_id = $nutricionista->id;
        verify($consulta->save())->true();
        $this->assertNotNull(Consulta::findOne(['id' =>  $consulta->id]));
    }



    public function testatualizarConsulta()
    {
        $cliente = $this->tester->grabFixture('user', 'user3');
        $nutricionista = $this->tester->grabFixture('user', 'user2');
        $consulta = new Consulta();
        $consulta->nome ="Consulta de Nutrição";
        $consulta->descricao ="Consulta para um plano novo de Nutrição";
        $consulta->estado =1;
        $consulta->data = "2022-12-29 02:10:00";
        $consulta->cliente_id = $cliente->id;
        $consulta->nutricionista_id = $nutricionista->id;
        $consulta->save();

        $model = Consulta::findOne(['id' => $consulta->id]);
        $model->nome="Consulta Update";

        $model->descricao = 'Descricao Update';

        $model->save();

        $this->assertEquals('Consulta Update', $model->nome);
        $this->assertEquals('Descricao Update', $model->descricao);
    }

    public function testapagarConsulta()
    {
        $cliente = $this->tester->grabFixture('user', 'user3');
        $nutricionista = $this->tester->grabFixture('user', 'user2');
        $consulta = new Consulta();
        $consulta->nome ="Consulta de Nutrição";
        $consulta->descricao ="Consulta para um plano novo de Nutrição";
        $consulta->estado ="1";
        $consulta->data = "2022-12-29 02:10:00";
        $consulta->cliente_id =$cliente->id;
        $consulta->nutricionista_id =$nutricionista->id;
        $consulta->save();

        $consultaD = Consulta::findOne(['id' => $consulta->id]);
        $consultaD->delete();

        $this->assertNull(Consulta::findOne(['id' => $consulta->id]));

    }

}
