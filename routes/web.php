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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');




Route::get('/carrito_compra', function () {
    return view('carrito');
})->name('carrito')->middleware('auth');

Route::get('/mis_datos','UsuarioControlador@mostrar_datos')
->name('mis_datos')->middleware('auth');

Route::put('/actualizar/{user}','UsuarioControlador@actualizar')
->name('actualizar');

Route::post('register', 'UsuarioControlador@registrar');

Route::post('login', 'UsuarioControlador@inicio_sesion');

Route::get('logout', 'usuarioControlador@cerrar_sesion')->name('cerrar_sesion');


//Vistas del administrador
Route::get('/inventario/{gestion}', function ($gestion) {
    return view('inventario', compact('gestion'));
})->name('inventario')->middleware('admin');

Route::get('/pedidos', function () {
    return view('pedidos');
})->name('pedidos')->middleware('admin');


Route::get('/actualizar_datos', 'EmpresaControlador@actualizar')
->name('actualizar_datos')->middleware('admin');

Route::put('/guardar', 'EmpresaControlador@guardar')
->name('guardar');

// Tipos o generos
Route::get('/tiposControl/{tipo}', 'TiposControlador@index')->name('tipos.index');
Route::post('/tiposControl', 'TiposControlador@store')->name('tipos.store');
Route::get('/tiposControl/{tipo}/{categoria}', 'TiposControlador@tipoEspecifico')->name('tipos.tipoEspecifico');
Route::post('/tiposControl/{id}', 'TiposControlador@update')->name('tipos.update'); //PUT
Route::delete('/tiposControl/{id}/{categoria}', 'TiposControlador@destroy')->name('tipos.destroy');

// Productos
Route::post('/productosControl', 'ProductoControlador@store')->name('productos.store');
Route::get('/productosControl/{tipo}/{categoria}', 'ProductoControlador@index')->name('productos.index');
Route::post('/productosControl/{id}/{categoria}', 'ProductoControlador@update')->name('productos.update'); // PUT
Route::put('/productosControl/{opcion_catalogo}/{id}', 'ProductoControlador@actualizarOpcionCatalogo')->name('productos.opcion_catalogo');
Route::delete('/productosControl/{id}', 'ProductoControlador@destroy')->name('productos.destroy');

// Carrito de compra
Route::post('/carritoControl', 'CarritoControlador@agregar')->name('carro.agregar');
Route::delete('/carritoControl/{nombre}', 'CarritoControlador@eliminar')->name('carro.eliminar');
Route::get('/carritoControl', 'CarritoControlador@obtener')->name('carro.obtener');

//llamada al metodo isAdmin del controlador usuario para hacer el menú
Route::get('/comprobarSiAdmin','usuarioControlador@isAdmin');


Route::get('/pedidos', "PedidosController@mostrar")->name('pedidos')->middleware('admin');

Route::post('/pedidos/{id}', "PedidosController@detalles")->name('detalles');

Route::put('/pedidos/{id}', "PedidosController@cambiar")->name('cambiar');
