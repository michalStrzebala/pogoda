<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\WeatherController;

class DashboardController extends Controller
{
    public function index()
    {

        $city = WeatherController::getSingleCityWeather('Zwoleń');

        print_r($city);
        die();

        return view('admin.index');
    }
}
