<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@index')->name('home');

// Route::get('/admin', function () {
//     return view('admin.cities.index');
// })->name('admin');

Auth::routes();

Route::get('/admin', 'Admin\DashboardController@index');

Route::resource('/admin/miasta', 'Admin\CityController');

// Route::get('/home', 'HomeController@index')->name('home');
