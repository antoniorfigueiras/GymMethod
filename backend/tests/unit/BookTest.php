<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Book;

class BookTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;


    public function testCreate()
    {
        $book = new Book();
        $book->nome = 'Livro3';
        $book->descricao = 'dsafsaf';
        verify($book->save())->true();
    }

    public function testCreateInvalid()
    {
        $book = new Book();
        $book->nome = 'HNxM1eZMhUjeNCrLLwQYNRxPwxCfmjDb3E7dCtCRHfRzoLoOyQPL0vadgsafsafasgfgsafawfasasdfsa';
        $book->descricao = 'dsafsaf';
        verify($book->save())->false();
    }

    public function testUpdate()
    {
        $book = new Book();
        $book->nome = 'Livro3';
        $book->descricao = 'dsafsaf';
        verify($book->save())->true();


        $model=  Book::findOne(['id' => $book->id]);
        $book->nome = 'Senhor dos Aneis';
        $book->descricao = 'cvncvbncvbcnv';
        verify($model->save())->true();
    }

    public function testDelete()
    {
        $book = new Book();
        $book->nome = 'Livro3';
        $book->descricao = 'dsafsaf';
        verify($book->save())->true();

        $model=  Book::findOne(['id' => $book->id]);
        verify($model->delete());
    }
}
