<?php


namespace common\tests\Unit\models;

use backend\tests\UnitTester;
use Codeception\Test\Unit;
use common\fixtures\UserFixture;
use common\models\LoginForm;
use common\models\Perfil;
use common\models\User;
use Yii;

class PerfilTest extends \Codeception\Test\Unit
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

    public function testCreatePerfilUnsuccessfully()
    {
        $user1 = $this->tester->grabFixture('user', 'user1');
        $model = new Perfil();
        $model->user_id = $user1->id;
        $model->telemovel = '123456789999';
        $this->assertFalse($model->validate(['telemovel']));
        $model->peso = 'dasfasfsafsaf';
        $this->assertFalse($model->validate(['peso']));
        $model->altura = 'dsad';
        $this->assertFalse($model->validate(['altura']));
        $model->nomeproprio = 'tooooooooooooooooooooooooolooooooooooooooooooooongnomeeepropriooooooo';
        $this->assertFalse($model->validate(['nomeproprio']));
        $model->apelido = 'tooooooooooooooooooooooooolooooooooooooooooooooongapelidooooooooooooooooooooooooooo';
        $this->assertFalse($model->validate(['apelido']));
        $model->nif = '1234567893123';
        $this->assertFalse($model->validate(['nif']));
        $model->codpostal = '2080640123123';
        $this->assertFalse($model->validate(['codpostal']));
        $model->pais = 'Portugallllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll';
        $this->assertFalse($model->validate(['pais']));
        $model->cidade = 'Santaremmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm';
        $this->assertFalse($model->validate(['cidade']));
        $model->morada = 123213;
        $this->assertFalse($model->validate(['morada']));
        verify($model->save())->false();

    }
    public function testCreatePerfilSuccessfully()
    {
        $user1 = $this->tester->grabFixture('user', 'user1');
        $model = new Perfil();
        $model->user_id = $user1->id;
        $this->assertTrue($model->validate(['user_id']));
        $model->telemovel = '123456789';
        $this->assertTrue($model->validate(['telemovel']));
        $model->peso = 12;
        $this->assertTrue($model->validate(['peso']));
        $model->altura = 12;
        $this->assertTrue($model->validate(['altura']));
        $model->nomeproprio = 'user1';
        $this->assertTrue($model->validate(['nomeproprio']));
        $model->apelido = 'Perfil';
        $this->assertTrue($model->validate(['apelido']));
        $model->nif = '123456789';
        $this->assertTrue($model->validate(['nif']));
        $model->codpostal = '2080640';
        $this->assertTrue($model->validate(['codpostal']));
        $model->pais = 'Portugal';
        $this->assertTrue($model->validate(['pais']));
        $model->cidade = 'Santarem';
        $this->assertTrue($model->validate(['cidade']));
        $model->morada = 'Rua Moinho de Vento';
        $this->assertTrue($model->validate(['morada']));
        verify($model->save())->true();
        $this->assertNotNull( Perfil::findOne(['user_id' =>  $model->user_id]));
    }

    public function testUpdatePerfil()
    {
        $user1 = $this->tester->grabFixture('user', 'user1');

        $model = new Perfil();
        $model->user_id = $user1->id;
        $model->telemovel = '123456789';
        $model->peso = 12;
        $model->altura = 12;
        $model->nomeproprio = 'user1';
        $model->apelido = 'Perfil';
        $model->nif = '123456789';
        $model->codpostal = '2080640';
        $model->pais = 'Portugal';
        $model->cidade = 'Santarem';
        $model->morada = 'Rua Moinho de Vento';
        $model->save();

        $perfil = Perfil::findOne(['user_id' =>  $model->user_id]);

        $perfil->nomeproprio = 'userUpdate';
        $perfil->apelido = 'PerfilUpdate';
        $perfil->save();

        $this->assertEquals('userUpdate', $perfil->nomeproprio);
        $this->assertEquals('PerfilUpdate', $perfil->apelido);
    }

    public function testDeletePerfil()
    {
        $user1 = $this->tester->grabFixture('user', 'user1');

        $model = new Perfil();
        $model->user_id = $user1->id;
        $model->telemovel = '123456789';
        $model->peso = 12;
        $model->altura = 12;
        $model->nomeproprio = 'user1';
        $model->apelido = 'Perfil';
        $model->nif = '123456789';
        $model->codpostal = '2080640';
        $model->pais = 'Portugal';
        $model->cidade = 'Santarem';
        $model->morada = 'Rua Moinho de Vento';
        $model->save();

        $perfil = Perfil::findOne(['user_id' => $model->user_id]);
        $perfil->delete();

        $deletedPerfil = Perfil::findOne(['user_id' => $perfil->user_id]);
        $this->assertNull($deletedPerfil);
    }
}
