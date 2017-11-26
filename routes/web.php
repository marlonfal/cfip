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
// Rutas para los pedidos
Route::get('pedido/productosp', 'ProductoController@getProductos')->name('productosp');
Route::POST('pedido/guardardetallep', 'DetallePedidoController@store')->name('guardardetallep');
Route::POST('pedido/guardarp', 'PedidoController@store')->name('guardarp');

// Rutas para las facturas
Route::get('factura/productos', 'ProductoController@getProductos')->name('productos');
Route::get('factura/producto/{id}', 'ProductoController@getProducto');
Route::POST('factura/guardardetalle', 'DetalleFacturaController@store')->name('guardardetalle');
Route::POST('factura/guardar', 'FacturaController@store')->name('guardar');
Route::get('/imprimirfactura/{factura}', 'FacturaController@print')->name('imprimirfactura');

Route::get('/', 'InfoController@index');
Route::get('/inicio', 'InfoController@inicio');
Route::get('/configuracion', 'InfoController@configuracion');
Route::group(['middleware' => 'auth'], function(){
    Route::resource('producto', 'ProductoController');

    /**Route::get('producto', ['middleware' => 'role:admin',
    'uses' => 'ProductoController@index'])->name('producto.index');;*/
});

Route::resource('factura', 'FacturaController');
Route::resource('tipodegasto', 'TipodegastoController');
Route::resource('retroalimentacion', 'RetroalimentacionController');
Route::resource('detallefactura', "DetalleFacturaController");
Route::resource('pedido', "PedidoController");
route::get('cancelarpedido/{pedido}', 'PedidoController@cancelar')->name('cancelarpedido');
Route::resource('inventario', "InventarioController");


Auth::routes();

route::get('cambiar', 'InfoController@contraseña');
Route::get('/home', 'HomeController@index')->name('home');

