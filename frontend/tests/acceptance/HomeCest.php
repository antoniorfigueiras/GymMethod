<?php

namespace frontend\tests\acceptance;


use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnRoute(Url::toRoute('http://gymmethod.frontend/'));
        $I->see('My Application');

        $I->seeLink('Loja');
        $I->click('Loja');
        $I->wait(2); // wait for page to be opened

        $I->see('This is the About page.');
    }
}
