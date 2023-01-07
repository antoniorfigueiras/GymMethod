<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Perfil;
use common\models\User;

class PerfilTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }


    public function CreatePerfilUnsuccessfully()
    {
        $user = new Perfil();

        $user->setAttribute('nomeproprio', 'tooooooooooooooooooooooooooooooooooolooooooooooooooongnaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaame');
        $this->assertFalse($user->validate(['nomeproprio']));

        /*$user->setName('toolooooongnaaaaaaameeee');
        $this->assertFalse($user->validate(['username']));

        $user->setName('davert');
        $this->assertTrue($user->validate(['username']));*/
    }
}
