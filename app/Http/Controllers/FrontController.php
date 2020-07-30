<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WeatherController;

use App\City;

class FrontController extends Controller
{
    public function index(){

        $cities = City::all();

        $firstCity = $cities->first();
        
        $cityWeather = WeatherController::getSingleCityWeather( $firstCity->zip, $firstCity->country_code );

        if( is_array( $cityWeather ) ){

            $firstCityWeatherData = collect([]);

            $firstCityWeatherData->name = $firstCity->name;
            $firstCityWeatherData->temperature = $cityWeather['main']['temp'];
            $firstCityWeatherData->pressure = $cityWeather['main']['pressure'];
            $firstCityWeatherData->humidity = $cityWeather['main']['humidity'];
            $firstCityWeatherData->wind_speed = $cityWeather['wind']['speed'];
            $firstCityWeatherData->clouds = $cityWeather['clouds']['all'];
            $firstCityWeatherData->icon_code = $cityWeather['weather']['0']['icon'];
        }else{
            $firstCityWeatherData = $firstCity;
        }

        return view('home')->with([ 'cities' => $cities, 'firstCity' => $firstCityWeatherData ]);
    }
}
