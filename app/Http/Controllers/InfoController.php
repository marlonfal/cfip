<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\Pedido;
use App\Producto;


class InfoController extends Controller
{
    public function index()
    {   
        $productos = Producto::orderBy('id', 'ASC')->get();
        return view('info.index', compact('productos'));
    }
    public function inicio()
    {
        $productos = Producto::orderBy('cantidad', 'ASC')->where('activo', '=', 1)->take(5)->get();
        $pedidospendientes = Pedido::orderBy('fecha_entrega', 'DESC')->with('detalles')->where('estado', '=', 'Pendiente')->take(6)->get();
        foreach($pedidospendientes as $pedido){
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
        return view('inicio', compact('facturas', 'pedidospendientes', 'productos', 'pedidosencamino'));
    }

    public function manual(){
        return view('manual');
    }
    
}
