<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\User;
use common\models\Book;

class BookTestCest
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
                'dataFile' => codecept_data_dir() . 'assistente.php'
            ],
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->seeRecord(User::className(), ['username'=>'assistente']);
        $assistente = User::findByUsername(['username' => 'assistente']);
        $I->amLoggedInAs($assistente);
    }


    public function criarBook(FunctionalTester $I)
    {
        $I->amOnPage('book');
        $I->see('Books');

        $I->click('Criar Book');
    }
}
