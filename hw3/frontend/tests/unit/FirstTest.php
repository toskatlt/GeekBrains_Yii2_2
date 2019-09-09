<?php namespace frontend\tests;

use frontend\models\SignupForm;

class FirstTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $model = new SignupForm();
        $model ->setAttributes(['username'=>'admin', 'email'=>'test@test.ru']);

        $this->tester->assertEquals($model->username,'admin', 'Проверка имени пользователя');

        expect($model->validate())->false();

        $model->password='asdasdasdasdasd';
        expect('Проверка пароля', $model->validate())->true();
    }
}