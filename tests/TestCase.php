<?php

namespace LuisLuciano\EloquentSearch\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

/**
 * Class TestCase
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();

        $this->loadLaravelMigrations();
        //$this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'pgsql');
        $app['config']->set('database.connections.pgsql', [
            'driver' => 'pgsql',
            'database' => 'eloquent_search_test',
            'username' => 'postgres',
            'password' => 'postgres',
            'charset' => 'utf8',
            'prefix' => '',
        ]);
    }
}
