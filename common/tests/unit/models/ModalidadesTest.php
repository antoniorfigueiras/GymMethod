<?php


namespace common\tests\Unit;

use common\tests\UnitTester;
use common\models\Modalidades;
use common\fixtures\ModalidadesFixture;

class ModalidadesTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    /*public function _fixtures()
    {
        return [
            'modalidade' => [
                'class' => ModalidadesFixture::class,
                'dataFile' => codecept_data_dir() . 'modalidades_data.php'
            ]
        ];
    }*/


    protected function _before()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }

    public function testCreate()
    {
        $modalidades = new Modalidades();
        $modalidades->nome = 'cycling';
        verify($modalidades->save())->true();
    }

    public function testCreateInvalid()
    {
        $modalidades = new Modalidades();
        $modalidades->nome = 'HNxM1eZMhUjeNCrLLwQYNRxPwxCfmjDb3E7dCtCRHfRzoLoOyQPL0vadgasdfsa';
        verify($modalidades->save())->false();
    }

    public function testUpdate()
    {
        $modalidades = new Modalidades();
        $modalidades->nome = 'cycling';
        $modalidades->save();


        $model=  Modalidades::findOne(['id' => $modalidades->id]);
        $model->nome = 'Power Jump';
        verify($model->save())->true();
    }

    public function testDelete()
    {
        $modalidades = new Modalidades();
        $modalidades->nome = 'cycling';
        $modalidades->save();

        $model=  Modalidades::findOne(['id' => $modalidades->id]);
        verify($model->delete());
    }
}
