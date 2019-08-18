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

Route::get('/pedidos', "PedidosController@mostrar")->name('pedidos');

<<<<<<< HEAD
Route::post('/pedidos/{id}', "PedidosController@detalles");







=======
Route::post('/pedidos/{id}', "PedidosController@detalles")->name('detalles');
>>>>>>> cbf7813f2a58f43a97410fe9f9eb8a927fcaeccc
