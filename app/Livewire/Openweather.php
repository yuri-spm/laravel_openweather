<?php

namespace App\Livewire;

use App\Models\State;
use Livewire\Component;
use App\Services\OpenWeatherService;

class Openweather extends Component
{
    public $result;
    public $city = '';

    public function render()
    {
        return view('livewire.openweather');
    }

    public function getCurrentWeather()
    {
        if ($this->city) {
            $instance = new OpenWeatherService();
            
            if ($this->city) {
                $this->result = $instance->currentWeather( $this->city);
            } else {
                $this->result = ['error' => 'Cidade não encontrada'];
            }
        }
    }

    public function getForecastWeather()
    {
        if ($this->city) {
            $instance = new OpenWeatherService();
            $this->result = $instance->weatherForecast($this->city);
        }
    }
}
