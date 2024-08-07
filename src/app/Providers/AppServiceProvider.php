<?php

namespace App\Providers;

use App\Services\CheckOrderFormatService;
use App\Services\OrderCheckers\CurrencyChecker;
use App\Services\OrderCheckers\NameChecker;
use App\Services\OrderCheckers\OrderCheckable;
use App\Services\OrderCheckers\PriceChecker;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrderCheckable::class, function (Application $app) {
            return collect([
                new NameChecker(),
                new PriceChecker(),
                new CurrencyChecker(),
            ]);
        });

        $this->app->bind(CheckOrderFormatService::class, function (Application $app) {
            return new CheckOrderFormatService($app->make(OrderCheckable::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
