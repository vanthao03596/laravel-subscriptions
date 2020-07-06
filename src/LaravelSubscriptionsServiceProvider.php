<?php

namespace Vanthao03596\LaravelSubscriptions;

use Illuminate\Support\ServiceProvider;
use Vanthao03596\LaravelSubscriptions\Commands\LaravelSubscriptionsCommand;

class LaravelSubscriptionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-subscriptions.php' => config_path('laravel-subscriptions.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-subscriptions'),
            ], 'views');

            if (! class_exists('CreateSubscriptionsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_subscriptions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_subscriptions_table.php'),
                ], 'migrations');
            }

            $this->commands([
                LaravelSubscriptionsCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-subscriptions');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-subscriptions.php', 'laravel-subscriptions');
    }
}
