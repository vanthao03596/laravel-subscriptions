<?php

namespace Vanthao03596\LaravelSubscriptions\Commands;

use Illuminate\Console\Command;

class LaravelSubscriptionsCommand extends Command
{
    public $signature = 'laravel-subscriptions';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
