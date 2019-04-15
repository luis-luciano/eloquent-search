<?php

namespace LuisLuciano\EloquentSearch\Tests;

use LuisLuciano\EloquentSearch\Tests\Models\User;

/**
 *
 */
class UserTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function test_user_is_created()
    {
        $user = User::create([
            'name' => 'name test',
            'email' => 'test@test.com',
            'password' => 'testing',
        ]);

        $this->assertNotEmpty($user);
    }
}
