<?php

namespace backend\tests\acceptance;

use backend\tests\_generated\AcceptanceTesterActions;

class AcceptanceTester extends \Codeception\Actor
{
    // do not ever remove this line!
    use AcceptanceTesterActions;

    public function login($username, $password)
    {
        $I = $this;
        if ($I->loadSessionSnapshot('login')) {
            return;
        }
        $I->amOnPage('site/login');
        $I->fillField('LoginForm[username]', $username);
        $I->fillField('LoginForm[password]', $password);
        $I->wait(2);
        $I->click('Login');
        $I->saveSessionSnapshot('login');
    }
}