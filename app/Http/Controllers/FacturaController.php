<?php

namespace App\Http\Controllers;


use App\Factura;
use App\DetalleFactura;
use App\Producto;
use App\Pedido;
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
        
        $facturas = Factura::Id($request->get('id'))->comprador($request->get('comprador'))->orderBy('id', 'DESC')->where('estado', '=', 'valida')->paginate(10);
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
        $factura->id_pedido = $request->id_pedido;
        $factura->estado = 'Valida';
        $factura->save();

        if($request->id_pedido != 0){
            $pedido = Pedido::where('id', '=', $request->id_pedido)->first();
            $pedido->id_factura = $factura->id;
            $pedido->save();
        }
   
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
        
        return redirect()->route('factura.show', $factura)->with('info', 'Se guardó la venta');
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
        return redirect()->route('factura.show', $factura)->with('info', 'Se actualizó la información de la venta');
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

    public function novalida(Factura $factura){

        $cantidaddetalles = DetalleFactura::where('id_factura', '=', $factura->id)->count();
        
        for($i = 1; $i <= $cantidaddetalles; $i++){
            $detalle = DetalleFactura::where('id_factura', '=', $factura->id)->where('id_detalle', '=', $i)->first();
            $producto = Producto::where('id', '=', $detalle->id_tipo_producto)->first();
            $producto->cantidad += $detalle->cantidad;
            $producto->gramos += $detalle->peso_gramo;

            $producto->save();
        }

        $factura->estado = 'No valida';
        $factura->save();

        return redirect()->route('factura.index')->with('info', 'Se cambió el estado de la venta a "No válida"');
    }

    public function print(Factura $factura){
        $height = 300;
        $nit = InfoGeneral::first()->nit;
        $detalles = DetalleFactura::orderBy('id_detalle', 'ASC')->with('producto')->where('id_factura', '=', $factura->id)->get();
        $height += sizeOf($detalles)*50;
        $pdf = PDF::loadView('pdf.factura', ['detalles' => $detalles, 'factura' => $factura, 'height' => $height, 'nit' => $nit]);
        $numero = $factura->id;
        return $pdf->stream();
    }

    public function download(Factura $factura){
        $height = 300;
        $nit = InfoGeneral::first()->nit;
        $detalles = DetalleFactura::orderBy('id_detalle', 'ASC')->with('producto')->where('id_factura', '=', $factura->id)->get();
        $height += sizeOf($detalles)*50;
        $pdf = PDF::loadView('pdf.factura', ['detalles' => $detalles, 'factura' => $factura, 'height' => $height, 'nit' => $nit]);
        $numero = $factura->id;
        return $pdf->download('factura.pdf');
    }
}
