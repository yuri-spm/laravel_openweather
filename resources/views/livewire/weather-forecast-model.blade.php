<div class="modal fade bd-example-modal-lg" id="forecastModal" tabindex="-1" role="dialog"
  aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="modalItem">
        {{ strtoupper($city) }}
      </div>
      @if (!empty($result))
      <div id="itensModal">
        @foreach ($result as $day)
        <div class="card" style="width: 9rem; border: 1px solid #ccc;">
          <div class="card-body">
            {{$day["date"]}}
            <p>
              @if(isset($day['icon']))
              <img src="http://openweathermap.org/img/wn/{{ $day['icon'] }}@2x.png" alt="Ícone">
              @else
              N/A
              @endif
            </p>
            <div class="spanIten">
              <span>{{ $day['temp_min'] ?? 'N/A' }} <sup>°</sup></span>
              <span>{{ $day['temp_max'] ?? 'N/A' }} <sup>°</sup></span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>
</div>
