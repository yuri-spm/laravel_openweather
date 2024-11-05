<?php

namespace App\Livewire;

use App\Models\State;
use Livewire\Component;
use App\Services\OpenWeatherService;

class Openweather extends Component
{
    public $result;
    public $city;
    public $selectedCity; 

    public function render()
    {
        $cities = State::all();
        return view('livewire.openweather', compact('cities'));
    }

    public function getCurrentWeather()
    {
        if ($this->selectedCity) {
            $instance = new OpenWeatherService();
            $city = State::find($this->selectedCity);
            $this->result = $instance->currentWeather($city->city, $city->uf);
        }
    }

    public function getForecastWeather()
    {
        if ($this->selectedCity) {
            $instance = new OpenWeatherService();
            $city = State::find($this->selectedCity);
            $this->result = $instance->weatherForecast($city->city, $city->uf);
        }
    }
}
