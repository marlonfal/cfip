<?php

namespace App\Http\Controllers;

use App\Gasto;
use Illuminate\Http\Request;
use App\tipodegasto;
use App\DetalleGasto;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiposdegasto = tipodegasto::pluck('nombre_tipo_gasto', 'id');
        $gastos = Gasto::tipodegastos($request->get('tipo'))->orderBy('id', 'DESC')->with('tipodegasto')->where('estado', '=', 'valido')->paginate(10);
        $tiposdegasto->prepend('Sin filtro');
        return view('gasto.index', compact('gastos', 'tiposdegasto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposdegastos = tipodegasto::pluck('nombre_tipo_gasto', 'id');
        return view('gasto.create', compact('tiposdegastos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->cantidaddetalles < 1){
            return redirect()->route('gasto.create')->with('error', 'No se puede guardar un gasto sin al menos un producto');
        }
        $gasto = new Gasto();
        $gasto->descripcion = $request->descripcion;
        $gasto->fecha = $request->fecha;
        $gasto->usuario = $request->usuario;
        $gasto->total = $request->total;
        $gasto->id_tipo_gasto = $request->id_tipo_gasto;
        $gasto->estado = 'valido';

        $gasto->save();

        for($i = 0; $i < $request->cantidaddetalles; $i++){
            $detalleGasto = new DetalleGasto();
            $detalleGasto->id_detalle = $i + 1;
            $detalleGasto->id_gasto = $gasto->id;
            $detalleGasto->producto = $request->producto[$i];
            $detalleGasto->cantidad = $request->cantidad[$i];
            $detalleGasto->precio = $request->precio[$i];

            $detalleGasto->save();
        }

        return redirect()->route('gasto.show', $gasto)->with('info', 'Se guardó el gasto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        $detalles = DetalleGasto::orderBy('id_detalle', 'ASC')->with('tipodegasto')->where('id_gasto', '=', $gasto->id)->get();
        return view('gasto.show', compact('gasto', 'detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        return view('gasto.edit', compact('gasto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        $gasto->descripcion = $request->descripcion;
        $gasto->fecha = $request->fecha;
        $gasto->usuario = $request->usuario;
        $gasto->total = $request->total;
        $gasto->id_tipo_gasto = $request->id_tipo_gasto;

        $gasto->save();

        return redirect()->route('gasto.show', $gasto)->with('info', 'Se actualizó el gasto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        $gasto->delete();
        return redirect()->route('gasto.show', $gasto)->with('info', 'Se actualizó el gasto');
    }

    /**
     * Función que cambia el estado de un gasto a no válido
     */
    public function novalido(Gasto $gasto){

        $gasto->estado = 'no valido';

        $gasto->save();

        return redirect()->route('gasto.index')->with('info', 'Se cambió el estado del gasto a "No válido"');
    }
}
