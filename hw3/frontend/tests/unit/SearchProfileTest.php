<?php namespace frontend\tests;

use frontend\components\ProfileStorage;
use frontend\components\SearchProfilesService;
use PHPUnit\Framework\TestCase;

/**
 * Class SearchProfileTest
 * @package frontend\tests
 * @mixin TestCase
 */

class SearchProfileTest extends \Codeception\Test\Unit
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
         $storage = $this->getMockBuilder(ProfileStorage::class)->setMethods(['find'])->getMock();
         $storage->expects($this->once())->method('find')->with('Sergey')->willReturn('Ivanov');

        $searcher = new SearchProfilesService($storage);

        $name = $searcher->SearchProfileName('Sergey');

        expect($name)->notNull();
        expect($name)->equals('IVANOV');
    }
}