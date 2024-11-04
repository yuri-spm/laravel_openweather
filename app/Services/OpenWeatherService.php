<?php
//OpenWeather
namespace App\Services;

use Illuminate\Support\Facades\Http;

use function Ramsey\Uuid\v1;

class OpenWeatherService {

    private $api_key;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->api_key = config('services.openweather.api_key');
    }
        
    /**
     * currentWeather
     * request day forecast
     * @param  mixed $city
     * @param  mixed $uf
     * @return void
     */
    public function currentWeather($city, $uf)
    {
        return $this->getAPI('data/2.5/weather', [
                'q' => "{$city},BR-{$uf},BRA"
            ]
        );
    }
    
    /**
     * weatherForecast
     * request seven days forecast 
     * @param  mixed $city
     * @param  mixed $uf
     * @return void
     */
    public function weatherForecast($city, $uf)
    {
        $response = $this->getAPI('data/2.5/forecast', [
                'q' => "{$city},BR-{$uf},BRA"
            ]
        );

        if (isset($response['list']) && is_array($response['list'])) {
            $weather_forecast = collect($response['list'])
                ->take(7)
                ->map(function($item){
                    return[
                       'temp'        => (int)round($item['main']['temp']),
                       'temp_min'    => (int)round($item['main']['temp_min']),
                       'temp_max'    => (int)round($item['main']['temp_max']),
                       'description' => $item['weather'][0]['description'] ?? '',
                       'icon'        => $item['weather'][0]['icon'] ?? '',
                    ];
                });

            return $weather_forecast;
                
        }

       
    }
    
    /**
     * getAPI
     * request to API
     * @param  mixed $resource
     * @param  mixed $params
     * @return void
     */
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