<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\Exercicio;
use common\models\User;

/**
 * Class LoginCest
 */
class ExercicioCest
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
                'dataFile' => codecept_data_dir() . 'treinador.php'
            ],
        ];
    }
    public function _before(FunctionalTester $I)
    {
        //  Check the content of fixtures in db
        $I->seeRecord(User::className(), ['username'=>'treinador']);
        $treinador = User::findByUsername(['username' => 'treinador']);
        $I->amLoggedInAs($treinador);
    }

    public function criarExercicio(FunctionalTester $I)
    {
        $I->amOnPage('exercicio');

        $I->click('Criar Exercicio');
        $I->fillField('Exercicio[nome]', 'Bicep');
        $I->fillField('Exercicio[descricao]', 'descricaoteste');
        $I->fillField('Exercicio[dificuldade]', 'facil');
        $I->selectOption('#exercicio-equipamento_id', '');

        $I->attachFile('//input[@type="file"]', 'bicepCurl.jpg');

        $I->click('Save');
        $I->seeRecord(Exercicio::className(), ['nome'=>'Bicep']);
    }
    public function editarExercicio(FunctionalTester $I)
    {
        $I->amOnPage('exercicio');
        $I->click('Criar Exercicio');
        $I->fillField('Exercicio[nome]', 'BicepTeste');
        $I->fillField('Exercicio[descricao]', 'descricaoteste');
        $I->fillField('Exercicio[dificuldade]', 'facil');
        $I->selectOption('#exercicio-equipamento_id', '');
        $path = "//input[@type='file']";
        $I->attachFile($path, 'bicepCurl.jpg');
        $I->click('Save');

        $I->see('BicepTeste');
        $I->click('Update');
        $I->fillField('Exercicio[nome]', 'NomeUpdate');
        $I->fillField('Exercicio[descricao]', 'DescricaoUpdate');
        $I->click('Save');
        $I->seeRecord(Exercicio::className(), ['nome'=>'NomeUpdate', 'descricao' => 'DescricaoUpdate']);
    }
    public function apagarExercicio(FunctionalTester $I)
    {
        $I->amOnPage('exercicio');
        $I->click('Criar Exercicio');
        $I->fillField('Exercicio[nome]', 'BicepTeste');
        $I->fillField('Exercicio[descricao]', 'descricaoteste');
        $I->fillField('Exercicio[dificuldade]', 'facil');
        $I->selectOption('#exercicio-equipamento_id', '');
        $path = "//input[@type='file']";
        $I->attachFile($path, 'bicepCurl.jpg');
        $I->click('Save');

        $I->click('Delete');
        //$I->dontSeeRecord(Exercicio::className(), ['nome'=>'BicepTeste', 'descricao' => 'descricaoteste']);
    }



}