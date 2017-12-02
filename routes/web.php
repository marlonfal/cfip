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
Route::get('compra/productosc', 'ProductoController@getProductos')->name('productosc');
// Rutas para las facturas
Route::get('factura/productos', 'ProductoController@getProductos')->name('productos');
Route::get('factura/producto/{id}', 'ProductoController@getProducto');
Route::get('/imprimirfactura/{factura}', 'FacturaController@print')->name('imprimirfactura');

Route::get('/', 'InfoController@index');
Route::get('/inicio', 'InfoController@inicio')->name('inicio');
Route::get('/configuracion', 'InfoController@configuracion');
Route::group(['middleware' => 'auth'], function(){
    Route::resource('producto', 'ProductoController');
    Route::resource('retroalimentacion', 'RetroalimentacionController');
    Route::resource('pedido', 'PedidoController');
    Route::get('pedidoencamino/{pedido}', 'PedidoController@enCamino')->name('pedidoencamino');
    /**Route::get('producto', ['middleware' => 'role:admin',
    'uses' => 'ProductoController@index'])->name('producto.index');;*/
});

Route::resource('factura', 'FacturaController');
Route::resource('tipodegasto', 'TipodegastoController');
Route::resource('detallefactura', "DetalleFacturaController");
route::get('cancelarpedido/{pedido}', 'PedidoController@cancelar')->name('cancelarpedido');
Route::resource('inventario', "InventarioController");
Route::resource('compra', "CompraController");
Route::resource('gasto', "GastoController");
Route::resource('infogeneral', "InfoGeneralController");
Route::get('balance', "BalanceController@index")->name('balance');
Auth::routes();

route::get('cambiar', 'InfoController@contraseña');
Route::get('/home', 'HomeController@index')->name('home');

