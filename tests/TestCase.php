<?php

namespace Vanthao03596\LaravelSubscriptions\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Vanthao03596\LaravelSubscriptions\LaravelSubscriptionsServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);

        $this->withFactories(__DIR__.'/database/factories');
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelSubscriptionsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('sluggable', [
            'source' => null,
            'maxLength' => null,
            'maxLengthKeepWords' => true,
            'method' => null,
            'separator' => '-',
            'unique' => true,
            'uniqueSuffix' => null,
            'includeTrashed' => false,
            'reserved' => null,
            'onUpdate' => false,
        ]);
    }

    public function setUpDatabase($app)
    {
        include_once __DIR__.'/../database/migrations/create_subscriptions_table.php.stub';
        (new \CreateSubscriptionsTable())->up();
    }
}
