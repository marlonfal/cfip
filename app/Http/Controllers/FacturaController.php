<?php

namespace App\Http\Controllers;


use App\Factura;
use App\DetalleFactura;
use App\Producto;
use Illuminate\Http\Request;
use PDF;
use App\InfoGeneral;

class FacturaController extends Controller
{
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
        $infogeneral = InfoGeneral::first();
        return view('factura.create', compact('infogeneral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $factura = new Factura();
        $factura->fecha = $request->fecha;
        $factura->vendedor = $request->vendedor;
        $factura->comprador = $request->comprador;
        $factura->subtotal = $request->subtotal;
        $factura->iva = $request->ivacompra;
        $factura->total = $request->total;
        $factura->save();
   
        for($i = 0; $i < $request->cantidaddetalles; $i++){
                //Select es el producto
                $detalleFactura = new DetalleFactura();
                $detalleFactura->id_detalle = $i +1;
                $detalleFactura->peso_gramo = $request->pesodetalle[$i];
                $detalleFactura->precio = $request->preciodetalle[$i];
                $detalleFactura->cantidad = $request->cantidaddetalle[$i];
                $detalleFactura->id_factura = $factura->id;
                $detalleFactura->id_tipo_producto = $request->select[$i];

                $detalleFactura->save();

                $producto = Producto::where('id', '=', $request->select[$i])->first();
                $producto->cantidad -= $request->cantidaddetalle[$i];
                $producto->gramos -= $request->preciodetalle[$i];
                if($producto->cantidad < 0){
                    $producto->cantidad = 0;
                }
                if($producto->gramos < 0){
                    $producto->gramos = 0;
                }
                $producto->save();
            
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
        $detalles = DetalleFactura::orderBy('id_detalle', 'ASC')->with('producto')->where('id_factura', '=', $factura->id)->get();
        return view('factura.show', compact('factura', 'detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        $detalles = DetalleFactura::orderBy('id_detalle', 'ASC')->with('producto')->where('id_factura', '=', $factura->id)->get();
        return view('factura.edit', compact('factura', 'detalles'));
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
        $nit = InfoGeneral::first()->nit;
        $detalles = DetalleFactura::orderBy('id_detalle', 'ASC')->with('producto')->where('id_factura', '=', $factura->id)->get();
        $height += sizeOf($detalles)*24;
        $pdf = PDF::loadView('pdf.factura', ['detalles' => $detalles, 'factura' => $factura, 'height' => $height, 'nit' => $nit]);
        $numero = $factura->id;
        return $pdf->stream();
    }
}
