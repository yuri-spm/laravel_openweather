<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\OpenWeatherService;

class WeatherForecastModel extends Component
{
    public $result;
    public $city;
    protected $listeners = ['cidadeAtualizada' => 'getCity'];
    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.weather-forecast-model');
    }
    
    /**
     * showModal
     *
     * @return void
     */
    public function showModal()
    {
        $this->dispatch('closeModal');

        $this->dispatch('openModal');
    }
    
    /**
     * getCity
     *
     * @param  mixed $city
     * @return void
     */
    public function getCity($city)
    {
        $this->city = $city;
        $this->getForecastWeather();
    }
    
    /**
     * getForecastWeather
     *
     * @return void
     */
    public function getForecastWeather()
    {
        if ($this->city) {
            $instance = new OpenWeatherService();
            $this->result = $instance->weatherForecast($this->city);
        }
    }
}
