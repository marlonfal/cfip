<?php

namespace App\Http\Controllers;

use App\tipodegasto;
use Illuminate\Http\Request;

class TipodegastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipodegastos = tipodegasto::orderBy('id', 'DESC')->paginate(10);
        return view('tipodegasto.index', compact('tipodegastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipodegasto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_tipo_gasto' => 'required',
            'descripcion' => 'required'
        ]);

        $tipodegasto = new tipodegasto();
        $tipodegasto->nombre_tipo_gasto = $request->nombre_tipo_gasto;
        $tipodegasto->descripcion = $request->descripcion;

        $tipodegasto->save();
        return redirect()->route('tipodegasto.show', $tipodegasto)->with('info', 'Se creó el gasto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipodegasto  $tipodegasto
     * @return \Illuminate\Http\Response
     */
    public function show(tipodegasto $tipodegasto)
    {
        return view('tipodegasto.show', compact('tipodegasto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipodegasto  $tipodegasto
     * @return \Illuminate\Http\Response
     */
    public function edit(tipodegasto $tipodegasto)
    {
        return view('tipodegasto.edit', compact('tipodegasto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipodegasto  $tipodegasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipodegasto $tipodegasto)
    {
        $this->validate($request, [
            'nombre_tipo_gasto' => 'required',
            'descripcion' => 'required'
        ]);
        $tipodegasto->nombre_tipo_gasto = $request->nombre_tipo_gasto;
        $tipodegasto->descripcion = $request->descripcion;

        $tipodegasto->save();
        return redirect()->route('tipodegasto.show', $tipodegasto)->with('info', 'Se actualizó la información del gasto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipodegasto  $tipodegasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipodegasto $tipodegasto)
    {
        
        $tipodegasto->delete();
        return redirect()->route('tipodegasto.index')->with('info', 'Fue eliminado exitosamente');
    }
}
