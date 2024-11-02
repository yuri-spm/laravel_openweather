<?php
//OpenWeather
namespace App\Http\Controllers;

use App\Services\OpenWeatherService;
use Illuminate\Http\Request;

class OpenWeatherController extends Controller
{
    public function index()
    {
        $instance = new OpenWeatherService();
        dd($instance->currentWeather('Rio de Janeiro', 'RJ'));

    }
}
