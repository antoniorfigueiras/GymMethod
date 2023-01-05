<?php


namespace backend\tests\Acceptance;

use backend\tests\AcceptanceTester;

class PlanoTreinoCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function CreatePlanoSuccessfully(AcceptanceTester $I)
    {
        $I->wantTo('Criar plano de treino');
        $I->amOnPage('site/login');
        $I->fillField('LoginForm[username]', 'treinador');
        $I->fillField('LoginForm[password]', 'treinador123');
        $I->wait(2);
        $I->click('Login');
        $I->wait(2);
        $I->click('Criar Plano de Treino');
        $I->wait(2);
        $I->fillField('ClienteSearch[nomeproprio]', 'Cliente');
        $I->fillField('ClienteSearch[apelido]', '2');
        $I->click('Pesquisar');
        $I->wait(2);
        $I->click('Selecionar');
        $I->wait(2);
        $I->fillField('PlanoTreino[nome]', 'Plano de Treino Teste');
        $I->click('Save');
        $I->wait(2);
        $I->click('Inserir Exercicio');
        $I->wait(2);
        $I->fillField('ExercicioSearch[nome]', 'Bice');
        $I->click('Selecionar');
        $I->wait(2);
        $I->fillField('Parameterizacao[series]', '3');
        $I->fillField('Parameterizacao[repeticoes]', '12');
        $I->fillField('Parameterizacao[peso]', '5');
        $I->click('Save');
        $I->wait(2);
    }
}
