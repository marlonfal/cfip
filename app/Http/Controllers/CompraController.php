<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use App\DetalleCompra;
use App\Producto;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::orderBy('id', 'ASC')->paginate(15);
        return view('compra.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = new Compra();
        $compra->usuario = $request->usuario;
        $compra->fecha = $request->fecha;
        $compra->proveedor = $request->proveedor;
        $compra->total = $request->total;

        $compra->save();

        for($i = 0; $i < $request->cantidaddetalles; $i++){

            $detalleCompra = new DetalleCompra();
            $detalleCompra->id_detalle = $i +1;
            $detalleCompra->peso_kilo = $request->pesodetalle[$i];
            $detalleCompra->precio = $request->preciodetalle[$i];
            $detalleCompra->cantidad = $request->cantidaddetalle[$i];
            $detalleCompra->id_compra = $compra->id;
            $detalleCompra->id_tipo_producto = $request->select[$i];

            $detalleCompra->save();

            $producto = Producto::where('id', '=', $request->select[$i])->first();
            $producto->preciocomprakilo = $request->preciodetalle[$i] / $request->pesodetalle[$i];
            $producto->cantidad += $request->cantidaddetalle[$i];
            $producto->gramos += $request->pesodetalle[$i];
            $producto->save();
        }

        return redirect()->route('compra.show', $compra)->with('info', 'Se guardó la compra');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        $detalles = DetalleCompra::orderBy('id_detalle', 'ASC')->with('producto')->where('id_compra', '=', $compra->id)->get();
        return view('compra.show', compact('compra', 'detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        return view('compra.edit', compact('compra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        $compra->fecha = $request->fecha;
        $compra->proveedor = $request->proveedor;
        
        $compra->save();
        return redirect()->route('compra.show', $compra)->with('info', 'Se actualizó la información de la compra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compra.index')->with('info', 'Se eliminó la venta');
    }
}
