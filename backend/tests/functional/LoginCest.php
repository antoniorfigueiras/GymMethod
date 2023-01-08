<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\User;

/**
 * Class LoginCest
 */
class LoginCest
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
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ],
            'treinador' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'treinador.php'
            ]
        ];
    }
    public function _before(FunctionalTester $I)
    {
        //  Check the content of fixtures in db
        $I->seeRecord(User::className(), ['username'=>'admin', 'email'=>'admin@gmail.com']);
        $I->seeRecord(User::className(), ['username'=>'funcionario', 'email'=>'funcionario@gmail.com']);
        $I->seeRecord(User::className(), ['username'=>'treinador', 'email'=>'treinador@gmail.com']);

    }
    /**
     * @param FunctionalTester $I
     */
    public function loginAdmin(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Login');
        $I->see('Logout');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }
    public function loginFuncionario(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->fillField('LoginForm[username]', 'funcionario');
        $I->fillField('LoginForm[password]', 'funcionario123');
        $I->click('Login');
        $I->see('Logout');
        $I->dontSeeLink('Login');

    }
    public function loginTreinador(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->fillField('LoginForm[username]', 'treinador');
        $I->fillField('LoginForm[password]', 'treinador123');
        $I->click('Login');
        $I->see('Logout', );
        $I->dontSeeLink('Login');

    }
    public function loginNutricionista(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->fillField('LoginForm[username]', 'nutricionista');
        $I->fillField('LoginForm[password]', 'nutricionista123');
        $I->click('Login');
        $I->see('Logout', );
        $I->dontSeeLink('Login');

    }
}