<?php

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
    return view('inicio');
})->name('inicio');


Route::get('/quienes_somos', function () {
    return view('quienes_somos');
})->name('quienes_somos');

Route::get('/contactanos', function () {
    return view('contactanos');
})->name('contactanos');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

