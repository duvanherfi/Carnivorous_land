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
})->name('principal');


Route::get('/quienes_somos', function () {
    return view('quienes_somos');
<<<<<<< HEAD
});

Route::get('/contactanos', function () {
    return view('contactanos');
});
=======
})->name('quienes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 93f8a5563c75ce947c9ed6db39e59b97a8bfb797
