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

Route::get('pedido/factura/productos', 'ProductoController@getProductos')->name('productos');
Route::get('pedido/factura/producto/{producto}', 'ProductoController@getProductos')->name('producto');
Route::get('compra/productosc', 'ProductoController@getProductos')->name('productosc');
// Rutas para las facturas
Route::get('factura/productos', 'ProductoController@getProductos')->name('productos');
Route::get('factura/producto/{id}', 'ProductoController@getProducto');
Route::get('/imprimirfactura/{factura}', 'FacturaController@print')->name('imprimirfactura');
Route::get('imprimirbalanceporproductostabla', 'BalanceController@printtable')->name('imprimirbalanceporproductostabla');
Route::get('imprimirestadoderesultados', 'BalanceController@printestadoderesultado')->name('imprimirestadoderesultados');
Route::get('/gastonovalido/{gasto}', 'GastoController@novalido')->name('gastonovalido');
Route::get('/compranovalida/{compra}', 'CompraController@novalida')->name('compranovalida');
Route::get('/facturanovalida/{factura}', 'FacturaController@novalida')->name('facturanovalida');
Route::get('/productoslist', 'ProductoController@printlist')->name('productoslist');
Route::get('/imprimirfactura/{factura}', 'FacturaController@print')->name('imprimirfactura');

Route::get('/', 'InfoController@index');
Route::get('/inicio', 'InfoController@inicio')->name('inicio');
Route::get('/manual', 'InfoController@manual')->name('manual');
Route::get('/configuracion', 'InfoController@configuracion');
Route::group(['middleware' => 'auth'], function(){
    Route::resource('producto', 'ProductoController');
    Route::resource('retroalimentacion', 'RetroalimentacionController');
    Route::resource('pedido', 'PedidoController');
    Route::get('pedidoencamino/{pedido}', 'PedidoController@enCamino')->name('pedidoencamino');
    route::get('cancelarpedido/{pedido}', 'PedidoController@cancelar')->name('cancelarpedido');
    route::get('pedidoentregado/{pedido}', 'PedidoController@entregado')->name('pedidoentregado');
    route::get('pedidonoentregado/{pedido}', 'PedidoController@noentregado')->name('pedidonoentregado');
    route::get('pedido/factura/{pedido}', 'PedidoController@factura')->name('pedido/factura/');
    route::get('/changepassword', 'UserController@password')->name('changepassword');
    route::post('/updatepassword', 'UserController@updatePassword')->name('updatepassword');
    /**Route::get('producto', ['middleware' => 'role:admin',
    'uses' => 'ProductoController@index'])->name('producto.index');;*/
});

Route::resource('factura', 'FacturaController');
Route::resource('tipodegasto', 'TipodegastoController');
Route::resource('detallefactura', "DetalleFacturaController");
Route::resource('inventario', "InventarioController");
Route::resource('compra', "CompraController");
Route::resource('gasto', "GastoController");
Route::resource('infogeneral', "InfoGeneralController");
Route::get('balance', "BalanceController@index")->name('balance');
Route::get('balanceporproductos', "BalanceController@porproductos")->name('balanceporproductos');
Auth::routes();

route::get('cambiar', 'InfoController@contraseña');
Route::get('/home', 'HomeController@index')->name('home');

