<?php


// Información del negocio
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/quienes_somos', 'EmpresaControlador@mostrar')->name('quienes_somos');

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
Route::get('/inventario/{gestion}', function ($gestion) {
    return view('inventario', compact('gestion'));
})->name('inventario');

Route::get('/pedidos', function () {
    return view('pedidos');
})->name('pedidos');


Route::get('/actualizar_datos', 'EmpresaControlador@actualizar')
->name('actualizar_datos');

Route::put('/guardar', 'EmpresaControlador@guardar')
->name('guardar');

// Tipos o generos
Route::get('/tiposControl/{tipo}', 'TiposControlador@index')->name('tipos.index');
Route::post('/tiposControl', 'TiposControlador@store')->name('tipos.store');

// Productos
Route::post('/productosControl', 'ProductoControlador@store')->name('productos.store');
Route::get('/productosControl', 'ProductoControlador@index')->name('productos.index');


//llamada al metodo isAdmin del controlador usuario para hacer el menú
Route::get('/comprobarSiAdmin','usuarioControlador@isAdmin');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pedidos', "PedidosController@mostrar");

Route::post('/pedidos/{id}', "PedidosController@detalles")->name('detalles');