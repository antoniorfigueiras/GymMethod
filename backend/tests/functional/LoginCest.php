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
                'dataFile' => codecept_data_dir() . 'admin.php'
            ],
        ];
    }
    public function _before(FunctionalTester $I)
    {
        //  Check the content of fixtures in db
        $I->seeRecord(User::className(), ['username'=>'admin']);
    }

    public function emptyLogin(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->amGoingTo('Login sem credenciais');
        $I->fillField('LoginForm[username]', '');
        $I->fillField('LoginForm[password]', '');
        $I->click('Login');
        $I->see('Username cannot be blank.');
        $I->see('Password cannot be blank.');
    }

    public function wrongCredencials(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->amGoingTo('Login com credenciais erradas');
        $I->fillField('LoginForm[username]', 'adminn');
        $I->fillField('LoginForm[password]', 'admin321');
        $I->click('Login');
        $I->see('Incorrect username or password.');
    }

    public function validLogin(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->amGoingTo('Login com credenciais certas');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Login');
        $I->see('Logout');
        $I->see('Bem Vindo: admin');
        $I->dontSee('Login');
    }

}