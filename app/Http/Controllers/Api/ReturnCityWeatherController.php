<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\WeatherController;
use App\City;

class ReturnCityWeatherController extends Controller
{
    public function singleCity( $id ){

        $curentCity = City::find( $id );

        $response = WeatherController::getSingleCityWeather($curentCity->zip, $curentCity->country_code);

        if( is_array( $response ) ){
            $cityWeatherData = [];

            $cityWeatherData['name'] = $curentCity->name;
            $cityWeatherData['temperature'] = $response['main']['temp'];
            $cityWeatherData['pressure'] = $response['main']['pressure'];
            $cityWeatherData['humidity'] = $response['main']['humidity'];
            $cityWeatherData['wind_speed'] = $response['wind']['speed'];
            $cityWeatherData['clouds'] = $response['clouds']['all'];
            $cityWeatherData['icon_code'] = $response['weather']['0']['icon'];

            // print_r($cityWeatherData);
            // print_r('---');
            // die();
            // return response($cityWeatherData->toJson())->header('Content-Type', 'application/json');
            return json_encode($cityWeatherData);
        }else{
            // print_r($curentCity);
            // die();
            return $curentCity;
        }

    }
}
