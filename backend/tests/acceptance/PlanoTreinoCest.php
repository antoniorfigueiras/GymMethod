<?php


namespace backend\tests\Acceptance;

//use backend\tests\AcceptanceTester;
use backend\tests\AcceptanceTester;
use Facebook\WebDriver\Chrome\ChromeDriver;
//use backend\tests\acceptance\AcceptanceTester;

class PlanoTreinoCest
{
    public function CreatePlanoTreino(AcceptanceTester $I)
    {
        /** Exercicio */
        $I->login('treinador', 'treinador123');
        $I->wait(2);
        $I->amOnPage('exercicio');
        $I->wait(2);
        $I->click('Criar Exercicio');
        $I->fillField('Exercicio[nome]', 'Bicep Curl');
        $I->fillField('Exercicio[descricao]', 'descricaoteste');
        $I->fillField('Exercicio[dificuldade]', 'facil');
        $I->executeJS('document.getElementById("exercicio-equipamento_id").value=2'); // Alter
        $I->executeJS('document.getElementById("exercicio-tipo_exercicio_id").value=13'); // Força
        $I->attachFile('Exercicio[exemplo]', 'bicepCurl.jpg');
        $I->wait(3);
        $I->click('Save');
        $I->wait(3);
        /** Plano */
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
        /** Inserir exercicio no plano */
        $I->click('Inserir Exercicio');
        $I->wait(2);
        $I->fillField('ExercicioSearch[nome]', 'Bicep Curl');
        $I->click('Pesquisar');
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
        /** Editar parametros */
        $I->click('Editar Parametros');
        $I->fillField('Parameterizacao[series]', '5');
        $I->fillField('Parameterizacao[repeticoes]', '3');
        $I->fillField('Parameterizacao[peso]', '10');
        $I->wait(3);
        $I->click('Save');
        $I->wait(3);
        /** Apagar exercicio do plano */
        $I->click('Apagar');
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(3);
    }


}
