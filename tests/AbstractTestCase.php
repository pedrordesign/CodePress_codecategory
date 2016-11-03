<?php

namespace CodePress\CodeCategory\Tests;

use Orchestra\Testbench\TestCase;

/**
 * Class AbstractTestCase
 * @package CodePress\CodeCategory\Tests
 */
abstract class AbstractTestCase extends TestCase
{
    /**
     * Execute migrations files from TestCase
     */
    public function migrate()
    {
        $this->artisan('migrate', [
            '--realpath' => realpath(__DIR__ . '/../src/resources/migrations')
        ]);

        $this->artisan('migrate', [
            '--realpath' => realpath(__DIR__ . '/../../codepost/src/resources/migrations')
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    public function getPackageProviders($app)
    {
        return [
            \Cviebrock\EloquentSluggable\ServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}