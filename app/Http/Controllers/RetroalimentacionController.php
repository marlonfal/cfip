<?php

namespace App\Http\Controllers;

use App\Retroalimentacion;
use Illuminate\Http\Request;

class RetroalimentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $retroalimentaciones = Retroalimentacion::Tiporetroalimentacion($request->get('tipo'))->orderBy('id', 'DESC')->paginate(2);
        return view('retroalimentacion.index', compact('retroalimentaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('retroalimentacion.create');
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
            'tipo' => 'required',
            'nombre' => 'required',
            'titulo' => 'required',
            'contenido' => 'required'
        ]);

        $retroalimentacion = new Retroalimentacion();
        $retroalimentacion->tipo = $request->tipo;
        $retroalimentacion->nombre = $request->nombre;
        $retroalimentacion->titulo = $request->titulo;
        $retroalimentacion->contenido = $request->contenido;
        $retroalimentacion->email = $request->email;

        $retroalimentacion->save();
        return redirect()->route('retroalimentacion.show', $retroalimentacion)->with('info', 'Su ' . $retroalimentacion->tipo . ' se guardó');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retroalimentacion  $retroalimentacion
     * @return \Illuminate\Http\Response
     */
    public function show(Retroalimentacion $retroalimentacion)
    {
        return view('retroalimentacion.show', compact('retroalimentacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retroalimentacion  $retroalimentacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Retroalimentacion $retroalimentacion)
    {
        return view('retroalimentacion.edit', compact('retroalimentacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retroalimentacion  $retroalimentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retroalimentacion $retroalimentacion)
    {
        $this->validate($request, [
            'tipo' => 'required',
            'nombre' => 'required',
            'titulo' => 'required',
            'contenido' => 'required'
        ]);

        $retroalimentacion->tipo = $request->tipo;
        $retroalimentacion->nombre = $request->nombre;
        $retroalimentacion->titulo = $request->titulo;
        $retroalimentacion->contenido = $request->contenido;
        $retroalimentacion->email = $request->email;

        $retroalimentacion->save();
        return redirect()->route('retroalimentacion.show', $retroalimentacion)->with('info', 'Se actualizó la información');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retroalimentacion  $retroalimentacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retroalimentacion $retroalimentacion)
    {
        $retroalimentacion->delete();
        return redirect()->route('retroalimentacion.index', $producto)->with('info', 'Fue eliminado exitosamente');   
    }
}
