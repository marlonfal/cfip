<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Factura;
use App\Producto;
use App\InfoGeneral;
use App\DetallePedido;
use Illuminate\Http\Request;
use Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::estado($request->get('estado'))->nombre($request->get('nombre'))->orderBy('fecha_entrega', 'DESC')->paginate(10);
        foreach($pedidos as $pedido){
            foreach($pedido->detalles as $pd){
                $producto = Producto::where('id', '=', $pd->id_tipo_producto)->first();
                $pd->id_tipo_producto = $producto->nombre;
                $pd->cantidaddisponible = $producto->cantidad;
            }
        }
        
        return view('pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedido.create');
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
            return redirect()->route('pedido.create')->with('error', 'No se puede hacer un pedido sin al menos un producto');
        }
        $pedido = new Pedido();
        $pedido->estado = 'Pendiente';
        $pedido->fecha_entrega = $request->fecha_entrega;
        $pedido->hora_entrega = $request->hora_entrega;
        $pedido->nombre = $request->nombre;
        $pedido->telefono = $request->telefono;
        $pedido->id_factura = 0;
        $pedido->direccion = $request->direccion;

        $pedido->save();

        for($i = 0; $i < $request->cantidaddetalles; $i++){
            $detallePedido = new DetallePedido();
            $detallePedido->id_detalle = $i + 1;
            $detallePedido->id_pedido = $pedido->id;
            $detallePedido->id_tipo_producto = $request->select[$i];
            $detallePedido->cantidad = $request->cantidad[$i];

            $detallePedido->save();
        }

        return redirect()->route('pedido.show', $pedido)->with('info', 'Se hizo el pedido');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $productos = Producto::all();       
        $detalles = DetallePedido::orderBy('id_detalle', 'ASC')->with('producto')->where('id_pedido', '=', $pedido->id)->get();
        return view('pedido.show', compact('pedido', 'detalles', 'productos'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $detalles = DetallePedido::orderBy('id_detalle', 'ASC')->with('producto')->where('id_pedido', '=', $pedido->id)->get();
        return view('pedido.edit', compact('pedido', 'detalles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        
        $pedido->estado = $request->estado;
        $pedido->fecha_entrega = $request->fecha_entrega;
        $pedido->hora_entrega = $request->hora_entrega;
        $pedido->nombre = $request->nombre;
        $pedido->direccion = $request->direccion;
        
        $pedido->save();
        return redirect()->route('pedido.show', $pedido)->with('info', 'Se actualizó el pedido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        
    }

    public function cancelar(Pedido $pedido){
        $pedido->estado = 'Cancelado';

        $pedido->save();
        return redirect()->route('pedido.show', $pedido)->with('info', 'Se canceló el pedido');
    }

    public function enCamino(Pedido $pedido){
        $pedido->estado = 'En camino';

        $pedido->save();
        return redirect()->route('inicio')->with('infopedidopendiente', 'Se despachó el pedido');
    }

    public function entregado(Pedido $pedido){
        $pedido->estado = 'Entregado';
        $pedido->save();

        return redirect()->route('inicio')->with('infopedidoentregado', 'Se entregó el pedido');
    }

    public function noentregado(Pedido $pedido){
        $pedido->estado = 'Pendiente';
        $pedido->save();

        return redirect()->route('inicio')->with('infopedidoentregado', 'Se cambió el estado del pedido');
    }

    public function factura(Pedido $pedido){
        $infogeneral = InfoGeneral::first();
        $detalles = DetallePedido::orderBy('id_detalle', 'ASC')->where('id_pedido', '=', $pedido->id)->with('producto')->get();
        return view('pedido.factura', compact('detalles', 'pedido', 'infogeneral'));
    }


}
