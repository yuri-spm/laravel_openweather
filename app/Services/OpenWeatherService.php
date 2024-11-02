<?php
//OpenWeather
namespace App\Services;

use Illuminate\Support\Facades\Http;

use function Ramsey\Uuid\v1;

class OpenWeatherService {

    private $api_key;

    public function __construct()
    {
        $this->api_key = config('services.openweather.api_key');
    }
    
    public function currentWeather($city, $uf)
    {
        return $this->getAPI('data/2.5/weather', [
                'q' => "{$city},BR-{$uf},BRA"
            ]
        );
    }

    public function weatherForecast($city, $uf)
    {
        return $this->getAPI('data/2.5/forecast', [
                'q' => "{$city},BR-{$uf},BRA"
            ]
        );
    }

    private function getAPI($resource, $params = [])
    {
        $params['units'] = 'metric';
        $params['lang']  = 'pt_br';
        $params['appid'] = $this->api_key;

         return Http::openweather()
        ->get($resource, $params)
        ->throw()
        ->json();
    }
}