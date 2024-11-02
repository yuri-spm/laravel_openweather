<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    /**
     * OpenWeather
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::macro('openweather', function(){
            return Http::acceptJson ()
                ->baseUrl(config('openweather.url'));
        });
    }
}
