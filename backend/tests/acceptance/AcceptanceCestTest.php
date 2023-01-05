<?php


namespace backend\tests\Acceptance;

use backend\tests\AcceptanceTester;
use yii\helpers\Url;

class AcceptanceCestTest extends \Codeception\Test\Unit
{

    protected AcceptanceTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testSomeFeature(AcceptanceTester $I)
    {
        $I->amOnRoute(Url::toRoute('/site/index'));
        $I->see('My Application');
    }
}
