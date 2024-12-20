<div id="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#forecastModal">
        Clique aqui para obter a previsão ao longo das horas
    </button><br><br>
    
    <form id="search" wire:submit.prevent="getCurrentWeather">
        <i class="fa-solid fa-location-dot"></i>
        <input 
            type="search" 
            name="city_name" 
            id="city_name" 
            placeholder="Buscar cidade"
            wire:model="city"
        >
        <button type="button" wire:click.prevent="getCurrentWeather" id="search_button">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>

    <div id="weather">
        <h1 id="title">
            @if(!empty($city) and empty($result['error']) )
                {{ strtoupper($city) }}
            @elseif(!empty($result['error']))
                {{ strtoupper($result['error']) }}
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
                             <sup>°c</sup> 
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
                            {{ $result['temp_max'] }}<sup> °c</sup> 
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
                            {{ $result['temp_min'] }} <sup>°c</sup> 
                        @else
                           <sup> °c</sup> 
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
                            %
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
                            KM/H
                        @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="alert">
    </div>

    <script>
        document.getElementById('search_button').addEventListener('click', function() {
            document.getElementById('city_name').value = '';
        });

        document. addEventListener('keypress', function(event) { if (event. key === 'Enter') { 
            document.getElementById('city_name').value = ''; 
            } 
        });

        document.addEventListener('livewire:load', function () {
            Livewire.on('closeModal', function () {
            var modalElement = new bootstrap.Modal(document.getElementById('forecastModal'));
            modalElement.hide();
         });

        Livewire.on('openModal', function () {
            setTimeout(function () {
                var modalElement = new bootstrap.Modal(document.getElementById('forecastModal'));
                modalElement.show();
            }, 300); // Espera 300ms para abrir novamente
        });
});
    </script>
</div>