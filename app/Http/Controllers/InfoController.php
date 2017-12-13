<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\Pedido;
use App\Producto;
use App\InfoGeneral;
use Auth;
use Carbon\Carbon;


class InfoController extends Controller
{   
    /**
     * Función que devuelve la vista de inicio la página web
     */
    public function index()
    {   
        $infogeneral = InfoGeneral::first();
        $productos = Producto::orderBy('id', 'ASC')->get();
        return view('info.index', compact('productos', 'infogeneral'));
    }

    /**
     * Función que devuelve la vista de inicio de la aplicación web
     */
    public function inicio()
    {
        $productos = Producto::orderBy('cantidad', 'ASC')->where('activo', '=', 1)->take(5)->get();
        $cantidadpedidospendientes = Pedido::where('estado', '=', 'Pendiente')->count();
        $cantidadpedidospendienteshoy = Pedido::where('fecha_entrega', '=', Carbon::now()->toDateString())->count();
        $cantidadpedidosencamino = Pedido::where('estado', '=', 'En camino')->count();

        $pedidospendientes = Pedido::orderBy('fecha_entrega', 'DESC')->with('detalles')->where('estado', '=', 'Pendiente')->take(6)->get();
        foreach($pedidospendientes as $pedido){
            foreach($pedido->detalles as $pd){
                $producto = Producto::where('id', '=', $pd->id_tipo_producto)->first();
                $pd->id_tipo_producto = $producto->nombre;
                $pd->cantidaddisponible = $producto->cantidad;
            }
        }
        $pedidoscliente = Pedido::orderBy('fecha_entrega', 'DESC')->with('detalles')->where('nombre', '=', Auth::user()->name)->get();
        foreach($pedidoscliente as $pedido){
            foreach($pedido->detalles as $pd){
                $producto = Producto::where('id', '=', $pd->id_tipo_producto)->first();
                $pd->id_tipo_producto = $producto->nombre;
                $pd->cantidaddisponible = $producto->cantidad;
            }
        }

        $pedidosencamino = Pedido::orderBy('fecha_entrega', 'DESC')->with('detalles')->where('estado', '=', 'En camino')->take(6)->get();
        foreach($pedidosencamino as $pedido){
            foreach($pedido->detalles as $pd){
                $producto = Producto::where('id', '=', $pd->id_tipo_producto)->first();
                $pd->id_tipo_producto = $producto->nombre;
                $pd->cantidaddisponible = $producto->cantidad;
            }
        }

        $facturas = Factura::orderBy('created_at', 'DESC')->take(5)->get();
        return view('inicio', compact('facturas', 'pedidospendientes', 'productos', 'pedidosencamino', 'pedidoscliente',
                                'cantidadpedidospendientes', 'cantidadpedidospendienteshoy', 'cantidadpedidosencamino'));
    }

    /**
     * Función que devuelve la vista del manual
     */
    public function manual(){
        return view('manual');
    }
    
}
