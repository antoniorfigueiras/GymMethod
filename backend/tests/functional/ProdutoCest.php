<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\Exercicio;
use common\models\Produto;
use common\models\User;

/**
 * Class LoginCest
 */
class ProdutoCest
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
        $nutricionista = User::findByUsername(['username' => 'funcionario']);
        $I->amLoggedInAs($nutricionista);
    }
    /**
     * @param FunctionalTester $I
     */
    public function criarProduto(FunctionalTester $I)
    {
        $I->amOnPage('produto');
        $I->click('Criar Produto');
        $I->fillField('Produto[nome]', 'Produto');
        $I->fillField('Produto[descricao]', 'Descricao');
        $I->attachFile('//input[@type="file"]', 'alter.jpg');
        $I->fillField('Produto[preco]', '10');
        $I->checkOption('//input[@type="checkbox"]');
        $I->click('Save');
        $I->seeRecord(Produto::className(), ['nome'=>'Produto']);
    }
    public function editarProduto(FunctionalTester $I)
    {
        $I->amOnPage('produto');
        $I->click('Criar Produto');
        $I->fillField('Produto[nome]', 'Produto');
        $I->fillField('Produto[descricao]', 'Descricao');
        $I->attachFile('//input[@type="file"]', 'alter.jpg');
        $I->fillField('Produto[preco]', '10');
        $I->checkOption('//input[@type="checkbox"]');
        $I->click('Save');

        $I->see('Produto');
        $I->click('Update');
        $I->fillField('Produto[nome]', 'ProdutoUpdate');
        $I->fillField('Produto[descricao]', 'DescricaoUpdate');
        $I->click('Save');
        $I->seeRecord(Produto::className(), ['nome'=>'ProdutoUpdate', 'descricao' => 'DescricaoUpdate']);

    }
    public function apagarProduto(FunctionalTester $I)
    {
        $I->amOnPage('produto');
        $I->click('Criar Produto');
        $I->fillField('Produto[nome]', 'Produto');
        $I->fillField('Produto[descricao]', 'Descricao');
        $I->attachFile('//input[@type="file"]', 'alter.jpg');
        $I->fillField('Produto[preco]', '10');
        $I->checkOption('//input[@type="checkbox"]');
        $I->click('Save');

        $I->click('Delete');
        //$I->dontSeeRecord(Produto::className(), ['nome'=>'Produto', 'descricao' => 'Descricao']);
    }

}