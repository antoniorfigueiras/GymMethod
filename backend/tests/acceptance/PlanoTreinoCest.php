<?php


namespace backend\tests\Acceptance;

//use backend\tests\AcceptanceTester;
use Facebook\WebDriver\Chrome\ChromeDriver;
use backend\tests\acceptance\AcceptanceTester;
class PlanoTreinoCest
{
    public function _before(AcceptanceTester $I)
    {
    }

   /* public function CreateTipoExercicio(AcceptanceTester $I)
    {
        $I->wantTo('Criar tipo de exercicio');
        /*$I->amOnPage('site/login');
        $I->fillField('LoginForm[username]', 'treinador');
        $I->fillField('LoginForm[password]', 'treinador123');
        $I->wait(2);
        $I->click('Login');
        $I->login('treinador', 'treinador123');
        $I->wait(2);
        $I->amOnPage('tipoexercicio');
        $I->wait(2);
        $I->click('Criar tipo de exercicio');
        $I->fillField('TipoExercicio[nome]', 'Força');
        $I->click('Save');
        $I->wait(5);
    }
    public function CreateExercicio(AcceptanceTester $I)
    {
        $I->wantTo('Criar exercicio');
        /*$I->amOnPage('site/login');
        $I->fillField('LoginForm[username]', 'treinador');
        $I->fillField('LoginForm[password]', 'treinador123');
        $I->wait(2);
        $I->click('Login');
        $I->login('treinador', 'treinador123');
        $I->wait(2);
        $I->amOnPage('exercicio');
        $I->click('Criar Exercicio');
        $I->fillField('Exercicio[nome]', 'ExercicioTeste');
        $I->fillField('Exercicio[descricao]', 'descricaoteste');
        $I->fillField('Exercicio[dificuldade]', 'facil');
        $I->executeJS('document.getElementById("exercicio-equipamento_id").value=2');
        $I->executeJS('document.getElementById("exercicio-tipo_exercicio_id").value=3');
        //$I->waitForElement('#exercicio-equipamento_id.form-control.select2-hidden-accessible', 30);
        //$I->click('#exercicio-equipamento_id.form-control.select2-hidden-accessible');
        $I->attachFile('Exercicio[exemplo]', 'bicepCurl.jpg');
        $I->click('Save');
        $I->wait(5);
    }*/

    public function CreatePlanoTreino(AcceptanceTester $I)
    {
        /** Tipo Exercicio */
        $I->wantTo('Criar tipo de exercicio');
        /*$I->amOnPage('site/login');
        $I->fillField('LoginForm[username]', 'treinador');
        $I->fillField('LoginForm[password]', 'treinador123');
        $I->wait(2);
        $I->click('Login');*/
        $I->login('treinador', 'treinador123');
        $I->wait(2);
        $I->amOnPage('tipoexercicio');
        $I->wait(2);
        $I->click('Criar tipo de exercicio');
        $I->fillField('TipoExercicio[nome]', 'Força');
        $I->click('Save');
        $I->wait(3);
        /** Exercicio */
        $I->wantTo('Criar exercicio');
        /*$I->amOnPage('site/login');
        $I->fillField('LoginForm[username]', 'treinador');
        $I->fillField('LoginForm[password]', 'treinador123');
        $I->wait(2);
        $I->click('Login');*/
       // $I->login('treinador', 'treinador123');
        $I->wait(2);
        $I->amOnPage('exercicio');
        $I->click('Criar Exercicio');
        $I->fillField('Exercicio[nome]', 'ExercicioTeste');
        $I->fillField('Exercicio[descricao]', 'descricaoteste');
        $I->fillField('Exercicio[dificuldade]', 'facil');
        $I->executeJS('document.getElementById("exercicio-equipamento_id").value=2');
        $I->executeJS('document.getElementById("exercicio-tipo_exercicio_id").value=3');
        //$I->waitForElement('#exercicio-equipamento_id.form-control.select2-hidden-accessible', 30);
        //$I->click('#exercicio-equipamento_id.form-control.select2-hidden-accessible');
        $I->attachFile('Exercicio[exemplo]', 'bicepCurl.jpg');
        $I->wait(2);
        $I->click('Save');
        $I->wait(3);
        /** Plano */
        $I->wantTo('Criar plano de treino');
        /*$I->amOnPage('site/login');
        $I->fillField('LoginForm[username]', 'treinador');
        $I->fillField('LoginForm[password]', 'treinador123');
        $I->wait(2);
        $I->click('Login');*/
        //$I->login('treinador', 'treinador123');
        $I->amOnPage('plano');
        $I->wait(2);
        $I->click('Criar Plano de Treino');
        $I->fillField('ClienteSearch[nomeproprio]', 'Cliente');
        $I->fillField('ClienteSearch[apelido]', '2');
        $I->click('Pesquisar');
        $I->wait(2);
        $I->click('Selecionar');
        $I->fillField('PlanoTreino[nome]', 'Plano de Treino Teste');
        $I->wait(2);
        $I->click('Save');
        $I->wait(3);
        $I->click('Inserir Exercicio');
        $I->wait(2);
        $I->fillField('ExercicioSearch[nome]', 'ExercicioTeste');
        $I->wait(2);
        $I->click('Selecionar');
        $I->wait(2);
        $I->fillField('Parameterizacao[series]', '3');
        $I->fillField('Parameterizacao[repeticoes]', '12');
        $I->fillField('Parameterizacao[peso]', '5');
        $I->fillField('Parameterizacao[tempo]', null);
        $I->wait(2);
        $I->click('Save');
        $I->wait(3);
    }


}
