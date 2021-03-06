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




Route::group([], function () {

    Route::get('/', 'ViewController@home')->name('home');

    Route::get('/login', 'ViewController@login')->name('login');
    Route::post('/login', 'UserController@login');

    Route::get('/signup', 'ViewController@signup')->name('signup');
    Route::post('/signup', 'UserController@store');

    Route::get('/logout', 'UserController@logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => '/codes'], function () {
        Route::get('/', 'PromoCodeController@index')->name('my-codes');
        Route::get('/create', 'PromoCodeController@store');
        Route::post('/redeem', 'PromoCodeController@redeem');
    });
});
