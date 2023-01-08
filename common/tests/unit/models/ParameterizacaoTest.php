<?php

namespace common\tests\unit\models;

use common\models\Parameterizacao;
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


    public function testcriarParameterizacao()
    {
        $params = new Parameterizacao();
        $params->series=1;
        $params->seriesCliente=1;
        $params->repeticoes=10;
        $params->repeticoesCliente=12;
        $params->peso=null;
        $params->pesoCliente=23;
        $params->tempo="00:05:00";
        $params->tempoCliente="00:06:00";
        verify($params->save())->true();
    }

    public function testcriarParameterizacaoErrado()
    {
        $params = new Parameterizacao();
        $params->series=1;
        $params->seriesCliente=1;
        $params->repeticoes="abcak";
        $params->repeticoesCliente=12;
        $params->peso=20;
        $params->pesoCliente=23;
        $params->tempo="00:05:00";
        $params->tempoCliente="00:06:00";
        verify($params->save())->false();

    }

    public function testatualizarConsulta()
    {
        $params = new Parameterizacao();
        $params->series=1;
        $params->seriesCliente=1;
        $params->repeticoes=10;
        $params->repeticoesCliente=12;
        $params->peso=null;
        $params->pesoCliente=23;
        $params->tempo="00:05:00";
        $params->tempoCliente="00:06:00";
        $params->save();
        $model=  Parameterizacao::findOne(['id' => $params->id]);
        $model->series=22;
        verify($model->save());
    }

    public function testapagarConsulta()
    {
        $params = new Parameterizacao();
        $params->series=1;
        $params->seriesCliente=1;
        $params->repeticoes=10;
        $params->repeticoesCliente=12;
        $params->peso=null;
        $params->pesoCliente=23;
        $params->tempo="00:05:00";
        $params->tempoCliente="00:06:00";
        $params->save();
        $params->save();
        $model=  Parameterizacao::findOne(['id' => $params->id]);
        verify($model->delete());
    }

}
