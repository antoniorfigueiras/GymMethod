<?php


namespace common\tests\Unit\models;

use backend\tests\UnitTester;
use Codeception\Test\Unit;
use common\fixtures\EquipamentoFixture;
use common\fixtures\Tipo_ExercicioFixture;
use common\fixtures\UserFixture;
use common\models\Exercicio;
use common\models\LoginForm;
use common\models\Perfil;
use common\models\User;
use Yii;

class ExercicioTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return [
            'equipamento' => [
                'class' => EquipamentoFixture::class,
                'dataFile' => codecept_data_dir() . 'equipamento.php'
            ],
            'tipo_exercicio' => [
                'class' => Tipo_ExercicioFixture::class,
                'dataFile' => codecept_data_dir() . 'tipo_exercicio.php'
            ]
        ];
    }

    public function testCreateExercicioUnsuccessfully()
    {

        $model = new Exercicio();
        $model->nome = 'nomeloooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong';
        $this->assertFalse($model->validate(['nome']));
        $model->descricao = 'descricaooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo';
        $this->assertFalse($model->validate(['descricao']));
        $model->dificuldade = 'dificuldadeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
        $this->assertFalse($model->validate(['dificuldade']));
        $model->exemplo = 123;
        $this->assertFalse($model->validate(['exemplo']));
        $model->equipamento_id = 3;
        $this->assertFalse($model->validate(['equipamento_id']));
        $model->tipo_exercicio_id = 2;
        $this->assertFalse($model->validate(['tipo_exercicio_id']));
        verify($model->save())->false();


    }
    public function testCreateExercicioSuccessfully()
    {
        $equipamento = $this->tester->grabFixture('equipamento', 'equipamento1');
        $tipo_exercicio = $this->tester->grabFixture('tipo_exercicio', 'tipo1');
        $model = new Exercicio();
        $model->nome = 'nome';
        $this->assertTrue($model->validate(['nome']));
        $model->descricao = 'descricao';
        $this->assertTrue($model->validate(['descricao']));
        $model->dificuldade = 'dificuldad';
        $this->assertTrue($model->validate(['dificuldade']));
        $model->exemplo = base64_encode('exemploImg');
        $this->assertTrue($model->validate(['exemplo']));
        $model->equipamento_id = $equipamento->id;
        $this->assertTrue($model->validate(['equipamento_id']));
        $model->tipo_exercicio_id = $tipo_exercicio->id;
        $this->assertTrue($model->validate(['tipo_exercicio_id']));
        verify($model->save())->true();
    }

    public function testUpdateExercicio()
    {
        $equipamento = $this->tester->grabFixture('equipamento', 'equipamento1');
        $tipo_exercicio = $this->tester->grabFixture('tipo_exercicio', 'tipo1');
        $model = new Exercicio();
        $model->nome = 'nome';
        $model->descricao = 'descricao';
        $model->dificuldade = 'dificuldad';
        $model->exemplo = base64_encode('exemploImg');
        $model->equipamento_id = $equipamento->id;
        $model->tipo_exercicio_id = $tipo_exercicio->id;
        $model->save();
        $equipamento2 = $this->tester->grabFixture('equipamento', 'equipamento1');
        $exercicio = Exercicio::findOne(['id' =>  $model->id]);

        $exercicio->nome = 'nomeUpdate';
        $exercicio->descricao = 'descricaoUpdate';
        $exercicio->equipamento_id = $equipamento2->id;
        $exercicio->save();

        $this->assertEquals('nomeUpdate', $exercicio->nome);
        $this->assertEquals('descricaoUpdate', $exercicio->descricao);
        $this->assertEquals($equipamento2->id, $exercicio->equipamento_id);
    }

    public function testDeleteExercicio()
    {
        $equipamento = $this->tester->grabFixture('equipamento', 'equipamento1');
        $tipo_exercicio = $this->tester->grabFixture('tipo_exercicio', 'tipo1');
        $model = new Exercicio();
        $model->nome = 'nome';
        $model->descricao = 'descricao';
        $model->dificuldade = 'dificuldad';
        $model->exemplo = base64_encode('exemploImg');
        $model->equipamento_id = $equipamento->id;
        $model->tipo_exercicio_id = $tipo_exercicio->id;
        $model->save();

        $exercicio = Exercicio::findOne(['id' =>  $model->id]);
        $exercicio->delete();

        $deletedExercicio = Exercicio::findOne(['id' =>  $model->id]);
        $this->assertNull($deletedExercicio);
    }
}
