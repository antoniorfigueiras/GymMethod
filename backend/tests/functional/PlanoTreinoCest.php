<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\User;

/**
 * Class LoginCest
 */
class PlanoTreinoCest
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

    }


    public function criarPlano(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->fillField('LoginForm[username]', 'treinador');
        $I->fillField('LoginForm[password]', 'treinador123');
        $I->click('Login');
        /** Plano */
        $I->click('Planos de Treino');
        $I->amOnRoute('/plano');
        $I->click("Criar Plano de Treino");
        $I->amOnRoute('/plano/select_client');
        $I->fillField('ClienteSearch[nomeproprio]', 'Cliente');
        $I->fillField('ClienteSearch[apelido]', '2');
        $I->click('Pesquisar');

        /*$I->click('Selecionar');
        $I->fillField('PlanoTreino[nome]', 'Plano de Treino Teste');

        $I->click('Save');

         Inserir exercicio no plano
        $I->click('Inserir Exercicio');

        $I->fillField('ExercicioSearch[nome]', 'Bicep Curl');
        $I->click('Pesquisar');
        $I->amOnRoute('/plano/select_client');
        $I->click('Selecionar');

        $I->fillField('Parameterizacao[series]', '3');
        $I->fillField('Parameterizacao[repeticoes]', '12');
        $I->fillField('Parameterizacao[peso]', '5');
        $I->fillField('Parameterizacao[tempo]', null);

        $I->click('Save');

        /** Editar parametros
        $I->click('Editar Parametros');
        $I->fillField('Parameterizacao[series]', '5');
        $I->fillField('Parameterizacao[repeticoes]', '3');
        $I->fillField('Parameterizacao[peso]', '10');

        $I->click('Save');

        /** Apagar exercicio do plano
        $I->click('Apagar');

        $I->acceptPopup();*/

    }

}