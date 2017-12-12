<?php

namespace App\Http\Controllers;

use App\DetalleFactura;
use App\Producto;
use Illuminate\Http\Request;

class DetalleFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalleFactura = new DetalleFactura();
        $detalleFactura->id_detalle = $request->id_detalle;
        $detalleFactura->peso_kilo = $request->peso_kilo;
        $detalleFactura->precio = $request->precio;
        $detalleFactura->cantidad = $request->cantidad;
        $detalleFactura->id_factura = $request->id_factura;
        $detalleFactura->id_tipo_producto = $request->id_tipo_producto;

        $detalleFactura->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleFactura $detalleFactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleFactura $detalleFactura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleFactura $detalleFactura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleFactura $detalleFactura)
    {
        //
    }
}
