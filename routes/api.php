<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Endpoint auth
Route::prefix('auth')->group(function () {
    Route::post('/register', 'Auth\RegisterController@__invoke');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LogoutController@logout');
});

// Endpoint api mobil
Route::get('/mobil', 'MobilController@index');
Route::get('/mobil/{id}', 'MobilController@show');
Route::post('/mobil', 'MobilController@store');
Route::put('/mobil/{id}', 'MobilController@update');
Route::delete('/mobil/{id}', 'MobilController@destroy');

// Endpoint penyewaan
Route::get('/penyewaan', 'PenyewaanController@index');
Route::get('/penyewaan/{id}', 'PenyewaanController@show');
Route::post('/penyewaan', 'PenyewaanController@store');
Route::put('/penyewaan/{id}', 'PenyewaanController@update');
Route::delete('/penyewaan/{id}', 'PenyewaanController@destroy');
