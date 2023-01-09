<?php

namespace common\tests\unit\models;

use common\models\Parameterizacao;
use common\models\Perfil;
use \Tests\Support\UnitTester;
use Yii;
use common\fixtures\UserFixture;

/**
 * AcceptanceTester form test
 */
class ParameterizacaoTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;


    public function testCriarParameterizacaoErrado()
    {
        $params = new Parameterizacao();
        $params->series="seriesErrado";
        $this->assertFalse($params->validate(['series']));
        $params->seriesCliente=12345678912313123123;
        $this->assertFalse($params->validate(['seriesCliente']));
        $params->repeticoes="repeticoesErrado";
        $this->assertFalse($params->validate(['repeticoes']));
        $params->repeticoesCliente=1234567891231313123123;
        $this->assertFalse($params->validate(['repeticoesCliente']));
        $params->peso="pesoErrado";
        $this->assertFalse($params->validate(['peso']));
        $params->pesoCliente="pesoErrado";
        $this->assertFalse($params->validate(['pesoCliente']));
        $params->tempo=null;
        //$this->assertFalse($params->validate(['tempo']));
        $params->tempoCliente=null;
        //$this->assertFalse($params->validate(['tempoCliente']));
        verify($params->save())->false();

    }

    public function testCriarParameterizacao()
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
        $this->assertNotNull(Parameterizacao::findOne(['id' => $params->id]));
    }



    public function testAtualizarConsulta()
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
        $model->repeticoes=22;
        $model->save();

        $this->assertEquals(22, $model->series);
        $this->assertEquals(22, $model->repeticoes);
    }

    public function testApagarConsulta()
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

        $paramD = Parameterizacao::findOne(['id' => $params->id]);
        $paramD->delete();
        $this->assertNull(Parameterizacao::findOne(['id' => $params->id]));

    }

}
