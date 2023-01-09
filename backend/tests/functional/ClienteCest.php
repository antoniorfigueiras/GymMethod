<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\Cliente;
use common\models\User;
use common\models\Perfil;

/**
 * Class LoginCest
 */
class ClienteCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'funcionario.php'
            ],
        ];
    }
    public function _before(FunctionalTester $I)
    {
        //  Check the content of fixtures in db
        $I->seeRecord(User::className(), ['username'=>'funcionario']);
        $funcionario = User::findByUsername(['username' => 'funcionario']);
        $I->amLoggedInAs($funcionario);
    }

    public function criarCliente(FunctionalTester $I)
    {
        $I->amOnPage('cliente');

        $I->click('Criar Cliente');
        $I->fillField('Username', 'antonio');
        $I->fillField('Email', 'antonio@gmail.com');
        $I->fillField('Password', 'antonio123');
        $I->click('Guardar');
        $I->fillField('Perfil[nomeproprio]', 'Antonio');
        $I->fillField('Perfil[apelido]', 'Figueiras');
        $I->fillField('Perfil[telemovel]', '910733587');
        $I->fillField('Perfil[nif]', '123456789');
        $I->click('Save');
        $I->seeRecord(User::className(), ['username'=>'antonio']);
    }

    public function editarCliente(FunctionalTester $I)
    {
        $I->amOnPage('cliente');

        $I->click('Criar Cliente');
        $I->fillField('Username', 'antonio');
        $I->fillField('Email', 'antonio@gmail.com');
        $I->fillField('Password', 'antonio123');
        $I->click('Guardar');
        $I->fillField('Perfil[nomeproprio]', 'Antonio');
        $I->fillField('Perfil[apelido]', 'Figueiras');
        $I->fillField('Perfil[telemovel]', '910733587');
        $I->fillField('Perfil[nif]', '123456789');
        $I->click('Save');

        $I->see('Antonio');
        $I->click('Atualizar');
        $I->fillField('Perfil[apelido]', 'Update');
        $I->fillField('Perfil[altura]', '180');
        $I->click('Save');
        $I->seeRecord(Perfil::className(), ['apelido'=>'Update']);


    }


}