<?php

namespace App\Livewire;

use App\Models\State;
use Livewire\Component;
use App\Services\OpenWeatherService;
use Livewire\Attributes\Title;

class Openweather extends Component
{
    public $result;
    public $city = '';

    
    #[Title('Open Weather API')]
    public function render()
    {
        return view('livewire.openweather');
    }

    public function getCurrentWeather()
    {
        if ($this->city) {
            $instance = new OpenWeatherService();
            $this->result = $instance->currentWeather( $this->city);
             $this->dispatch('cidadeAtualizada', $this->city);
        }
    }
}
