<?php

namespace App\Http\Controllers;
use App\Factura;
use App\Gasto;
use App\Producto;
use App\Compra;
use App\DetalleFactura;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index(Request $request){
        $lcompras = Compra::orderBy('fecha', 'DESC')->with('detalles')->take(5)->get();

        foreach($lcompras as $lcompra){
            foreach($lcompra->detalles as $cd){
                $producto = Producto::where('id', '=', $cd->id_tipo_producto)->first();
                $cd->id_tipo_producto = $producto->nombre;
            }
        }

        $ventas = 0;
        $compras = 0;
        $gastos = 0;
        if(trim($request->fechainicio) != "" || trim($request->fechafin) != ""){
            $ventas = Factura::whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            $compras = Compra::whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            $gastos = Gasto::whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
        }
        $tgastos = Gasto::orderBy('total', 'DESC')->get();

        return view('balance.index', compact('ventas', 'compras', 'gastos', 'lcompras', 'tgastos'));
    }

    public function porproductos(Request $request){
        $lcompras = Compra::orderBy('fecha', 'DESC')->with('detalles')->take(5)->get();
        $productos = Producto::orderBy('id', 'ASC')->get();
        $mt = 0;
        foreach($lcompras as $lcompra){
            foreach($lcompra->detalles as $cd){
                $producto = Producto::where('id', '=', $cd->id_tipo_producto)->first();
                $cd->id_tipo_producto = $producto->nombre;
            }
        }
        if(trim($request->fechainicio) != "" || trim($request->fechafin) != ""){
            $mt = 1;
            foreach($productos as $producto){
                $producto->totalvendido = 0;
                $producto->cantidadventas = 0;
                $producto->totalcomprado = 0;
                $producto->gramosvendidos = 0;
            }
            $ventas = Factura::whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->get();

            foreach($ventas as $venta){
                $detalles = DetalleFactura::where('id_factura', '=', $venta->id)->get();
                foreach($detalles as $detalle){
                    $p = $productos->where('id', $detalle->id_tipo_producto)->first();
                    $p->totalvendido += $detalle->precio;
                    $p->cantidadventas += $detalle->cantidad;
                    $p->gramosvendidos += $detalle->peso_gramo;
                }
            }
            foreach($productos as $producto){
                $producto->totalcomprado = $producto->gramosvendidos * $producto->preciocompragramo;
            }
        }

        return view('balance.producto', compact('lcompras', 'productos', 'mt'));
    }
}
