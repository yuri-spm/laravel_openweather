<div id="container">
    <form id="search" wire:submit.prevent="getCurrentWeather">
        <i class="fa-solid fa-location-dot"></i>
        <input 
            type="search" 
            name="city_name" 
            id="city_name" 
            placeholder="Buscar cidade"
            wire:model="city"
        >
        <button type="button" wire:click.prevent="getCurrentWeather">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>

    <div id="weather">
        <h1 id="title">
            @if(!empty($city) and empty($result['error']) )
                {{$city}}
            @elseif(!empty($result['error']))
                {{ $result['error'] }}
            @endif
        </h1>

        <div id="infos">
            <div id="temp">
                @if(!empty($result['icon']))
                    <img id="temp_img" src="http://openweathermap.org/img/wn/{{ $result['icon'] }}@2x.png" alt="">
                @else
                    <img id="temp_img" src="http://openweathermap.org/img/wn/04d@2x.png" alt="">
                @endif
                <div>
                    <p id="temp_value">
                        @if(!empty($result['temp']))
                            {{ $result['temp'] }} <sup>°C</sup>
                        @else
                             <sup>C°</sup> 
                        @endif
                    </p>
                    <p id="temp_description">
                        @if(!empty($result['description']))
                            {{ $result['description'] }}
                        @else
                           
                        @endif
                    </p>
                </div>
            </div>

            <div id="other_infos">
                <div class="info">
                    <i id="temp_max_icon" class="fa-solid fa-temperature-high"></i>

                    <div>
                        <h2>Temp. max</h2>

                        <p id="temp_max">
                            @if(!empty($result['temp_max']))
                            {{ $result['temp_max'] }} C°</sup>
                        @else
                            <sup>C°</sup> 
                        @endif
                        </p>
                    </div>
                </div>

                <div class="info">
                    <i id="temp_min_icon" class="fa-solid fa-temperature-low"></i>

                    <div>
                        <h2>Temp. min</h2>

                        <p id="temp_min">
                            @if(!empty($result['temp_min']))
                            {{ $result['temp_min'] }} C°</sup>
                        @else
                           <sup> C°</sup> 
                        @endif
                        </p>
                    </div>
                </div>

                <div class="info">
                    <i id="humidity_icon" class="fa-solid fa-droplet"></i>

                    <div>
                        <h2>Humidade</h2>

                        <p id="humidity">
                            @if(!empty($result['humidity']))
                            {{ $result['humidity']}}%
                        @else
                            50%
                        @endif
                        </p>
                    </div>
                </div>

                <div class="info">
                    <i id="wind_icon" class="fa-solid fa-wind"></i>

                    <div>
                        <h2>Vento</h2>

                        <p id="wind">
                            @if(!empty($result['wind']))
                            {{ $result['wind'] }} KM/H
                        @else
                            50 KM/H
                        @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="alert">
    </div>
</div>