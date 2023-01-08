<?php

namespace common\tests\unit\models;

use common\models\Consulta;
use \Tests\Support\UnitTester;
use Yii;
use common\fixtures\UserFixture;

/**
 * Login form test
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


    public function testcriarConsulta()
    {
        $consulta = new Consulta();
        $consulta->nome ="Consulta de Nutrição";
        $consulta->descricao ="Consulta para um plano novo de Nutrição";
        $consulta->estado ="1";
        $consulta->data = "2022-12-29 02:10:00";
        $consulta->cliente_id ="1";
        $consulta->nutricionista_id ="1";
        verify($consulta->save())->true();
    }

    public function testcriarConsultaerrado()
    {
        $consulta = new Consulta();
        $consulta->nome ="Consulta";
        $consulta->descricao ="Consulta";
        $consulta->estado ="2";
        $consulta->data = null;
        $consulta->cliente_id ="1";
        $consulta->nutricionista_id ="1";
        verify($consulta->save())->false();

    }

    public function testatualizarConsulta()
    {
        $consulta = new Consulta();
        $consulta->nome ="Consulta de Nutrição";
        $consulta->descricao ="Consulta para um plano novo de Nutrição";
        $consulta->estado ="1";
        $consulta->data = "2022-12-29 02:10:00";
        $consulta->cliente_id ="1";
        $consulta->nutricionista_id ="1";
        $consulta->save();
        $model=  Consulta::findOne(['id' => $consulta->id]);
        $model->nome="Consulta Rotina";
        verify($model->save());
    }

    public function testapagarConsulta()
    {
        $consulta = new Consulta();
        $consulta->nome ="Consulta de Nutrição";
        $consulta->descricao ="Consulta para um plano novo de Nutrição";
        $consulta->estado ="1";
        $consulta->data = "2022-12-29 02:10:00";
        $consulta->cliente_id ="1";
        $consulta->nutricionista_id ="1";
        $consulta->save();
        $model=  Consulta::findOne(['id' => $consulta->id]);
        verify($model->delete());
    }

}
