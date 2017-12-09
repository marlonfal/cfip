<?php

namespace App\Http\Controllers;
use App\Factura;
use App\Gasto;
use App\Compra;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index(Request $request){
        $lcompras = Compra::orderBy('fecha', 'DESC')->take(5)->get();
        $ventas = 0;
        $compras = 0;
        $gastos = 0;
        if(trim($request->fechainicio) != "" || trim($request->fechafin) != ""){
            $fecha = 1;
            $ventas = Factura::whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            $compras = Compra::whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            $gastos = Gasto::whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
        }
        $tgastos = Gasto::orderBy('total', 'DESC')->get();

        return view('balance.index', compact('ventas', 'compras', 'gastos', 'lcompras', 'tgastos'));
    }
}
