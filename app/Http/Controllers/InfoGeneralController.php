<?php

namespace App\Http\Controllers;

use App\InfoGeneral;
use Illuminate\Http\Request;

class InfoGeneralController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\InfoGeneral  $infoGeneral
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $infogeneral = InfoGeneral::first();
        return view('infogeneral.show', compact('infogeneral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoGeneral  $infoGeneral
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $infogeneral = InfoGeneral::first();
        return view('infogeneral.edit', compact('infogeneral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoGeneral  $infoGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoGeneral $infoGeneral)
    {
        $infogeneral = InfoGeneral::first();
        $infogeneral->iva = $request->iva;
        $infogeneral->nit = $request->nit;
        $infogeneral->correo = $request->correo;
        $infogeneral->telefono = $request->telefono;
        $infogeneral->descuentos = $request->descuentos;

        $infogeneral->save();

        return redirect()->route('infogeneral.show', $infogeneral)->with('info', 'Se actualizó la información');
    }

}
