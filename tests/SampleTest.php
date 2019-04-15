<?php

namespace LuisLuciano\EloquentSearch\Tests;

/**
 * Class SampleTest
 *
 * @category Test
 * @package  LuisLuciano\EloquentSearch\Tests
 * @author   Mahmoud Zalt <mahmoud@zalt.me>
 */
class SampleTest extends TestCase
{

    public function testSayHello()
    {
        $result = "Hello";
        //$expected = __DIR__.'/database/migrations';
        $expected = "Hello";

        $this->assertEquals($result, $expected);
    }

}
