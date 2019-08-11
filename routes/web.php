<?php

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/quienes_somos', function () {
    return view('quienes_somos');
})->name('quienes_somos');

Route::get('/productos_plantas', function () {
    return view('productos_plantas');
})->name('productos_plantas');

Route::get('/descripcion_producto', function () {
    return view('descripcion_producto');
})->name('descripcion_producto');

Route::get('/inventario', function () {
    return view('inventario');
})->name('inventario');

Route::get('/contactanos', function () {
    return view('contactanos');
})->name('contactanos');

Route::get('/pedidos', function () {
    return view('pedidos');
})->name('pedidos');

Route::get('/carrito_compra', function () {
    return view('carrito');
})->name('carrito');

Route::get('/pedidos', function () {
    return view('pedidos');
})->name('pedidos');

Route::get('/mis_datos','UsuarioControlador@mostrar_datos')
->name('mis_datos');

Route::post('/productos', 'ProductoController@store')->name('productos.store');
Route::get('/productos', 'ProductoController@index')->name('productos.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'usuarioControlador@logout')->name('cerrar_sesion');

Route::post('register', 'UsuarioControlador@store');

Route::post('login', 'UsuarioControlador@inicio_sesion');

Route::get('/pedidos', "PedidosController@mostrar");

