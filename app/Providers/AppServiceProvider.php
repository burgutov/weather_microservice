<?php

namespace App\Providers;

use App\Services\Interfaces\WeatherServiceInterface;
use App\Services\WeatherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WeatherServiceInterface::class, function ($app) {
            return new WeatherService(config('services.weather.api_key')); // передаем API ключ из конфигурации
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
