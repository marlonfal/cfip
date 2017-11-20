<?php

namespace App\Http\Controllers;


use App\Factura;
use App\DetalleFactura;
use App\Producto;
use Illuminate\Http\Request;
use PDF;

class FacturaController extends Controller
{
    public function detalles()
    {
        return $this->hasMany('App\DetalleFactura');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $facturas = Factura::Id($request->get('id'))->comprador($request->get('comprador'))->orderBy('id', 'DESC')->paginate(15);
        return view('factura.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        return view('factura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        $factura = new Factura();
        $factura->fecha = $request->fecha;
        $factura->vendedor = $request->vendedor;
        $factura->comprador = $request->comprador;
        $factura->total = $request->total;
        $factura->save();

        $detalles = Request::All(); 
        return responser()->json($detalles);    
        for($i = 1; $i <= $request->cantidaddetalles; $i++){
            $detalleFactura = new DetalleFactura();
            $detalleFactura->id_detalle = $i;
            $detalleFactura->peso_gramo = $request->pesodetalle[$i];
            $detalleFactura->precio = $request->preciodetalle[$i];
            $detalleFactura->cantidad = $request->cantidaddetalle[$i];
            $detalleFactura->id_factura = $factura->id;
            $detalleFactura->id_tipo_producto = $request->select[$i];

            $detalleFactura->save();
        }

        return redirect()->route('factura.show', $factura)->with('info', 'Se guardó la factura');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        $productos = Producto::all();       
        $detalles = DetalleFactura::orderBy('id_detalle', 'ASC')->with('producto')->where('id_factura', '=', $factura->id)->get();
        return view('factura.show', compact('factura', 'detalles', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        return view('factura.edit', compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        $factura->fecha = $request->fecha;
        $factura->comprador = $request->comprador;
        $factura->vendedor = $request->vendedor; 

        $factura->save();
        return redirect()->route('factura.show', $factura)->with('info', 'Se actualizó la información de la factura');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {

        $factura->delete();
        return redirect()->route('factura.index')->with('info', 'Fue eliminado exitosamente');
    }

    public function print(Factura $factura){
        $height = 300;
        $detalles = DetalleFactura::orderBy('id_detalle', 'ASC')->with('producto')->where('id_factura', '=', $factura->id)->get();
        $height += sizeOf($detalles)*19;
        $pdf = PDF::loadView('pdf.factura', ['detalles' => $detalles, 'factura' => $factura, 'height' => $height]);
        $numero = $factura->id;
        return $pdf->stream();
    }
}
