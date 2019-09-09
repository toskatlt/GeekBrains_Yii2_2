<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use Codeception\Example;
use common\fixtures\UserFixture;
use PHPUnit\Framework\TestCase;

/**
 * Class LoginCest
 * @mixin TestCase
 */
class LoginCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    /**
     * @param FunctionalTester $I
     * @dataProvider pageProvider
     */
    public function pageTest(FunctionalTester $I, Example $data)
    {
        $I->amOnPage('/site/profile');
        $I->dontSee('Profile', 'h1');

        $I->amLoggedInAs(1);
        $I->amOnPage($data['url']);

        $I->see($data['h1'], 'h1');
    }

    protected function pageProvider() {
        return [
          ['url'=>'/site/profile', 'h1'=>'Profile'],
          ['url'=>'/','h1'=>'My Yii Application']
        ];
    }
}
