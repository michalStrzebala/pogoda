<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
// use Illuminate\Http\RedirectResponse
use App\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();

        return view('admin.cities.index')->with(['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cityWeather = WeatherController::getSingleCityWeather($request->city_zip, $request->city_country);

        if( ! is_array( $cityWeather ) ){
            return redirect()->back()->withErrors([ $cityWeather ]);
        }

        if( $cityWeather['name'] != $request->city_name ){
            return redirect()->back()->withErrors([ 'Niepoprawna nazwa miasta dla podanego kodu pocztowego' ]);
        }

        if( City::where('name', $request->city_name)->orwhere('zip', $request->city_zip)->first() !== NULL ){
            return redirect()->back()->withErrors([ 'Takie miasto już istnieje' ]);
        }

        $city = new City;
        $city->name = $request->city_name;
        $city->zip = $request->city_zip;
        $city->country_code = $request->city_country;
        $city->temperature = $cityWeather['main']['temp'];
        $city->pressure = $cityWeather['main']['pressure'];
        $city->humidity = $cityWeather['main']['humidity'];
        $city->wind_speed = $cityWeather['wind']['speed'];
        $city->clouds = $cityWeather['clouds']['all'];
        $city->icon_code = $cityWeather['weather']['0']['icon'];

        $city->save();

        return redirect()->route('miasta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $city = City::find($id);

        return view('admin.cities.edit')->with(['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $cityWeather = WeatherController::getSingleCityWeather($request->city_zip, $request->city_country);

        if( ! is_array( $cityWeather ) ){
            return redirect()->back()->withErrors([ $cityWeather ]);
        }

        if( $cityWeather['name'] != $request->city_name ){
            return redirect()->back()->withErrors([ 'Niepoprawna nazwa miasta dla podanego kodu pocztowego' ]);
        }

        // $this->checkCityName($request->city_name, $cityWeather['name']);

        $city = City::find($id);
        $city->name = $request->city_name;
        $city->zip = $request->city_zip;
        $city->country_code = $request->city_country;
        $city->temperature = $cityWeather['main']['temp'];
        $city->pressure = $cityWeather['main']['pressure'];
        $city->humidity = $cityWeather['main']['humidity'];
        $city->wind_speed = $cityWeather['wind']['speed'];
        $city->clouds = $cityWeather['clouds']['all'];
        $city->icon_code = $cityWeather['weather']['0']['icon'];
        $city->save();

        return redirect()->route('miasta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('miasta.index');
    }

    // private function checkCityName( $enteredCityName, $receivedCityName ){
    //     if( $receivedCityName != $enteredCityName ){
    //         return redirect()->back()->withErrors([ 'Niepoprawna nazwa miasta dla podanego kodu pocztowego' ]);
    //     }
    // }
}
