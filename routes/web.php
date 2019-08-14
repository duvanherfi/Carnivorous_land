<?php


// Información del negocio
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/quienes_somos', function () {
    return view('quienes_somos');
})->name('quienes_somos');

Route::get('/productos/{tipo}', function ($tipo) {
    return view('productos', compact('tipo'));
})->name('productos');

Route::get('/descripcion_producto', function () {
    return view('descripcion_producto');
})->name('descripcion_producto');

Route::get('/contactanos', function () {
    return view('contactanos');
})->name('contactanos');



//Vistas del usuario cliente
Auth::routes();

Route::get('/carrito_compra', function () {
    return view('carrito');
})->name('carrito');

Route::get('/mis_datos','UsuarioControlador@mostrar_datos')
->name('mis_datos');


Route::put('/actualizar/{user}','UsuarioControlador@actualizar')
->name('actualizar');

Route::post('register', 'UsuarioControlador@registrar');

Route::post('login', 'UsuarioControlador@inicio_sesion');

Route::get('logout', 'usuarioControlador@cerrar_sesion')->name('cerrar_sesion');


//Vistas del administrador
Route::get('/inventario', function () {
    return view('inventario');
})->name('inventario');


Route::get('/pedidos', function () {
    return view('pedidos');
})->name('pedidos');

Route::get('/tiposControl/{tipo}', 'TiposControlador@index')->name('tipos.index');

Route::post('/tiposControl', 'TiposControlador@store')->name('tipos.store');

Route::post('/productosControl', 'ProductoControlador@store')->name('productos.store');

Route::get('/productosControl', 'ProductoControlador@index')->name('productos.index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pedidos', "PedidosController@mostrar");

Route::post('/pedidos/{id}', "PedidosController@detalles")->name('detalles');

