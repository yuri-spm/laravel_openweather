<?php
//OpenWeather
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

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
    public function currentWeather($city)
    {
        try{
            $response = $this->getAPI('data/2.5/weather', [
                    'q' => "{$city}"
                ]
            );
    
            if (isset($response['main']) && isset($response['weather'][0])) {
                return  [
                    'temp'        => (int) round($response['main']['temp']),
                    'temp_min'    => (int) round($response['main']['temp_min']),
                    'temp_max'    => (int) round($response['main']['temp_max']),
                    'humidity'    => (int) round($response['main']['humidity']),
                    'wind'    => (int) round($response['wind']['speed']),
                    'description' => $response['weather'][0]['description'] ?? '',
                    'icon'        => $response['weather'][0]['icon'] ?? '',
                    
                ];
            }

        }catch(RequestException $e){
            return ['error' => "Cidade não encontrada"];
        }
        
    
        
    }
    /**
     * weatherForecast
     * request seven days forecast 
     * @param  mixed $city
     * @param  mixed $uf
     * @return void
     */
    public function weatherForecast($city)
    {
        try{
            $response = $this->getAPI('data/2.5/forecast', [
                    'q' => "{$city}"
                ]
            );

            if (isset($response['list']) && is_array($response['list'])) {
                return collect($response['list'])
                    ->take(10)
                    ->map(function($item){
                        return[
                        'date'        =>  \Carbon\Carbon::parse($item['dt_txt'])->format('d/m H:i') ,
                        'temp'        => (int)round($item['main']['temp']),
                        'temp_min'    => (int)round($item['main']['temp_min']),
                        'temp_max'    => (int)round($item['main']['temp_max']),
                        'description' => $item['weather'][0]['description'] ?? '',
                        'icon'        => $item['weather'][0]['icon'] ?? '',
                        ];
                    });        
            }
        }catch(RequestException $e){
            return ['error' => "Cidade não encontrada"];
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