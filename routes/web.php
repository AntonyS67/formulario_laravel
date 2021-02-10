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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/create','UserController@store')->name('user.store')->middleware('age');
Route::get('/departamentos','SedeController@getDepartamentos');
Route::get('/provincias/{departmento_id}','SedeController@getProvincias');
Route::get('/distritos/{departmento_id}/{provincia_id}','SedeController@getDistritos');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
