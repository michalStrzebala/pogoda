@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="city_list">Example select</label>
            <select class="form-control" id="city_list">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="weather-box">
            <h2 id="city_name">{{ $firstCity->name }}</h2>      
            <div class="weather-box__temp">
                <img id="city__icon" src="http://openweathermap.org/img/wn/{{ $firstCity->icon_code }}@2x.png" alt="">
                <h3 id="city__temp">{{ $firstCity->temperature }}&#x2103;</h3>
            </div>
            <div class="weather-box__data">
                <div class="weather-box__data-item">
                    Ciśnienie: <span id="city__pressure">{{ $firstCity->pressure }}</span>hPa
                </div>
                <div class="weather-box__data-item">
                    Wilgotność: <span id="city__humidity">{{ $firstCity->humidity }}</span> %
                </div>
                <div class="weather-box__data-item">
                    Prędkość wiatru: <span id="city__wind_speed">{{ $firstCity->wind_speed }}</span> m/s
                </div>
                <div class="weather-box__data-item">
                    Zachmurzenie: <span id="city__clouds">{{ $firstCity->clouds }}</span> %
                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection