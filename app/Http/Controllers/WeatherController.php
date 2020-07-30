<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    
    public static function getSingleCityWeather( $zip, $countryCode )
    {
        $response = Http::get('api.openweathermap.org/data/2.5/weather?zip=' . $zip . ',' . $countryCode . '&units=metric&appid=' . config('services.openweather.key') . '')->json();

        // print_r($response);
        // die();

        if( empty( self::returnErrorMessage($response) ) ){
            return $response;
        }else{
            return self::returnErrorMessage($response);
        }
    }

    private static function returnErrorMessage( $response ){
        
        if( $response['cod'] != 200 ){
            
            if( $response['message'] == 'city not found' ){
                return 'Nie ma takiego miasta';
            }elseif( $response['message'] == 'invalid zip code' ){
                return  'Niewłaściwy kod pocztowy';
            }else{
                return 'Błąd połącznia. Spróbuj ponownie później';
            }

        }
    }

}
