<div>
    <h1>Previsão do Tempo</h1>

    <select wire:model="selectedCity" class="form-select" aria-label="Default select example">
        <option value="">Selecione um estado</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->city }}</option>
        @endforeach
    </select>

    <button wire:click="getCurrentWeather">Clima Atual</button>
    <button wire:click="getForecastWeather">Previsão do Tempo</button>

    @if (!empty($result))
        @if (isset($result['temp']))
            <div>
                <h2>Clima Atual:</h2>
                <p>Temperatura: {{ $result['temp'] }}</p>
                <p>Temperatura Mínima: {{ $result['temp_min'] }}</p>
                <p>Temperatura Máxima: {{ $result['temp_max'] }}</p>
                <p>Descrição: {{ $result['description'] }}</p>
                <p>Ícone: <img src="http://openweathermap.org/img/wn/{{ $result['icon'] }}@2x.png" alt="Ícone"></p>
            </div>
        @else
            <div>
                <h2>Previsão do Tempo:</h2>
                @foreach ($result as $day)
                    <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                        <p>Temperatura: {{ $day['temp'] ?? 'N/A' }}</p>
                        <p>Temperatura Mínima: {{ $day['temp_min'] ?? 'N/A' }}</p>
                        <p>Temperatura Máxima: {{ $day['temp_max'] ?? 'N/A' }}</p>
                        <p>Descrição: {{ $day['description'] ?? 'N/A' }}</p>
                        <p>Ícone: 
                            @if(isset($day['icon']))
                                <img src="http://openweathermap.org/img/wn/{{ $day['icon'] }}@2x.png" alt="Ícone">
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <p>Selecione uma cidade e clique em um dos botões para exibir a previsão do tempo.</p>
    @endif
</div>
