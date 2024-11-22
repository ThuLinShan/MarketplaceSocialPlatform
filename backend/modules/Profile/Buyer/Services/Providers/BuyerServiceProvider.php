<?php

namespace Modules\Profile\Buyer\Services\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Profile\Buyer\Services\BuyerCommandInterface;
use Modules\Profile\Buyer\Services\BuyerQueryInterface;
use Modules\Profile\Buyer\Services\Implementations\BuyerCommand;
use Modules\Profile\Buyer\Services\Implementations\BuyerQuery;

class BuyerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BuyerCommandInterface::class, BuyerCommand::class);
        $this->app->bind(BuyerQueryInterface::class, BuyerQuery::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . "/../../Database/migrations/0001_01_01_000000_create_buyers_table.php");
        $this->mergeConfigFrom(__DIR__ . "/../../config.php", 'profile.buyer');
    }
}
