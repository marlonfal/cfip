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
// Pagina web
Route::get('/', 'InfoController@index');
// peticiones ajax
Route::get('pedido/productosp', 'ProductoController@getProductos')->name('productosp');
Route::get('pedido/factura/productos', 'ProductoController@getProductos')->name('productos');
Route::get('pedido/factura/producto/{producto}', 'ProductoController@getProductos')->name('producto');
Route::get('compra/productosc', 'ProductoController@getProductos')->name('productosc');
Route::get('factura/productos', 'ProductoController@getProductos')->name('productos');
Route::get('factura/producto/{id}', 'ProductoController@getProducto');



// Rutas comunes

Route::group(['middleware' => 'auth'], function(){
    Route::get('/inicio', 'InfoController@inicio')->name('inicio');
    Route::get('/manual', 'InfoController@manual')->name('manual');
    Route::resource('retroalimentacion', 'RetroalimentacionController');
    Route::resource('pedido', 'PedidoController');
    Route::get('pedidoencamino/{pedido}', 'PedidoController@enCamino')->name('pedidoencamino');
    route::get('cancelarpedido/{pedido}', 'PedidoController@cancelar')->name('cancelarpedido');
    route::get('pedido/factura/{pedido}', 'PedidoController@factura')->name('pedido/factura/');
    route::get('/changepassword', 'UserController@password')->name('changepassword');
    route::post('/updatepassword', 'UserController@updatePassword')->name('updatepassword');
});

//Rutas de admin y vendedor

Route::get('/imprimirfactura/{factura}', 'FacturaController@print')->name('imprimirfactura');
Route::get('/productoslist', 'ProductoController@printlist')->name('productoslist');
Route::get('/imprimirfactura/{factura}', 'FacturaController@print')->name('imprimirfactura');
Route::get('pedidoencamino/{pedido}', 'PedidoController@enCamino')->name('pedidoencamino');
route::get('pedidoentregado/{pedido}', 'PedidoController@entregado')->name('pedidoentregado');
route::get('pedidonoentregado/{pedido}', 'PedidoController@noentregado')->name('pedidonoentregado');
Route::resource('producto', 'ProductoController');
Route::resource('factura', 'FacturaController');
Route::resource('compra', "CompraController");
Route::resource('gasto', "GastoController");

//Rutas solo de admin
Route::group(['middleware' => ['role:admin']], function() {
    Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
    Route::resource('infogeneral', "InfoGeneralController");
    Route::resource('tipodegasto', 'TipodegastoController');
    Route::get('/gastonovalido/{gasto}', 'GastoController@novalido')->name('gastonovalido');
    Route::get('/compranovalida/{compra}', 'CompraController@novalida')->name('compranovalida');
    Route::get('/facturanovalida/{factura}', 'FacturaController@novalida')->name('facturanovalida');
    Route::get('imprimirbalanceporproductostabla', 'BalanceController@printtable')->name('imprimirbalanceporproductostabla');
    Route::get('imprimirestadoderesultados', 'BalanceController@printestadoderesultado')->name('imprimirestadoderesultados');
    Route::get('balance', "BalanceController@index")->name('balance');
    Route::get('balanceporproductos', "BalanceController@porproductos")->name('balanceporproductos');
});
Auth::routes();


