<?php
//OpenWeather
namespace App\Http\Controllers;

use App\Models\State;
use App\Services\OpenWeatherService;
use Illuminate\Http\Request;

class OpenWeatherController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $instance = new OpenWeatherService();
        $city = $locations = State::where('city','Rondônia')->first();
       
        $result = $instance->currentWeather($city->city, $city->uf);
        dd($result);     
    }

    public function show()
    {
        $instance = new OpenWeatherService();
        $city = $locations = State::where('city','Rondônia')->first();
       
        $result = $instance->weatherForecast($city->city, $city->uf);
        dd($result);     
    }
}
