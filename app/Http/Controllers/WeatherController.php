<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    
    public static function getSingleCityWeather( $city )
    {
        $response = Http::get('api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=45602048fa3fe1a78e3792008dc4a439')->json();
        return $response;
    }

}
