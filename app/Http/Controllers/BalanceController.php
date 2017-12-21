<?php

namespace App\Http\Controllers;
use App\Factura;
use App\Gasto;
use App\Producto;
use App\Compra;
use App\Meses;
use PDF;
use App\DetalleFactura;
use Illuminate\Http\Request;

use \Carbon\Carbon;
use DateTime;
class BalanceController extends Controller
{
    /**
     * Devuelve la vista para calcular un estado de resultados, después de seleccionar la fecha,
     * calcula el estado de resultados 
     */
    public function index(Request $request) {

        $fechai = $request->fechainicio;
        $fechaf = $request->fechafinal;
        $lcompras = Compra::where('estado', '=', 'valida')->orderBy('fecha', 'DESC')->with('detalles')->take(5)->get();
        foreach($lcompras as $lcompra){
            foreach($lcompra->detalles as $cd){
                $producto = Producto::where('id', '=', $cd->id_tipo_producto)->first();
                $cd->id_tipo_producto = $producto->nombre;
            }
        }
        $meses = Meses::orderBy('id', 'ASC')->get();
        $tgastos = Gasto::where('estado', '=', 'valido')->orderBy('total', 'DESC')->get();
        $ventas = 0;
        $compras = 0;
        $gastos = 0;
        if(trim($request->fechainicio) != "" || trim($request->fechafinal) != "") {

            $fechainicio = new Datetime($request->fechainicio);
            $fechafin = new Datetime($request->fechafinal);
            $fic = Carbon::parse($request->fechainicio);
            $ffc = Carbon::parse($request->fechafinal);
            if($fic->diffInDays($ffc) > 365){
                return redirect()->route('balance', ['ventas' => $ventas,
                'compras' => $compras,
                'gastos' => $gastos, 
                'lcompras' => $lcompras,
                'tgastos' => $tgastos,
                'meses' => $meses,
                'fechai' => $fechai,
                'fechaf' => $fechaf])
                ->with('info', 'No podemos calular ese estado de resultados :(, calcula año por año.');
            }
            if($fechainicio > $fechafin) {
                return redirect()->route('balance', ['ventas' => $ventas,
                                                    'compras' => $compras,
                                                    'gastos' => $gastos, 
                                                    'lcompras' => $lcompras,
                                                    'tgastos' => $tgastos,
                                                    'meses' => $meses,
                                                    'fechai' => $fechai,
                                                    'fechaf' => $fechaf])
                ->with('info', 'La fecha de inicio debe ser anterior a la fecha final');
            }
            $diafin = (int)$fechafin->format('d');
            $mesfin = (int)$fechafin->format('m');
            $añofin = (int)$fechafin->format('y');
            $diainicio = (int)$fechainicio->format('d');
            $mesinicio = (int)$fechainicio->format('m');
            $añoinicio = (int)$fechainicio->format('y');
            
            foreach($meses as $mes){
                $mes->gastos = 0;
                $mes->compras = 0;
                $mes->ventas = 0;
                $mes->ganancia = 0; 
            }
            if($añofin > $añoinicio){
                for($i = $mesinicio; $i <= 12; $i++) {
                    
                    $mes = $meses->where('id', $i)->first();
                    if($i == $mesinicio) {
                        $fecha1 = '20'.$añoinicio.'-'.$i.'-'.$diainicio;
                    } else {
                    $fecha1 = '20'.$añoinicio.'-'.$i.'-1';
                    }
                    $fecha2 = '20'.$añoinicio.'-'.$i.'-31';
                    $mes->ventas += Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->compras += Compra::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->gastos += Gasto::where('estado', '=', 'valido')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->ganancia += $mes->ventas - $mes->compras - $mes->gastos; 
                }
                for($i = 1; $i <= $mesfin; $i++){
                    $mes = $meses->where('id', $i)->first();
                    $fecha1 = '20'.$añofin.'-'.$i.'-1';
                    if($i == $mesfin) {
                        $fecha2 = '20'.$añofin.'-'.$i.$diafin;
                    } else {
                    $fecha2 = '20'.$añoinicio.'-'.$i.'-1';
                    }
                    $mes->ventas += Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->compras += Compra::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->gastos += Gasto::where('estado', '=', 'valido')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->ganancia += $mes->ventas - $mes->compras - $mes->gastos; 
                }
            }else{
                for($i = $mesinicio; $i <= $mesfin; $i++) {
                    
                    $mes = $meses->where('id', $i)->first();
                    if($i == $mesinicio) {
                        $fecha1 = '20'.$añoinicio.'-'.$i.'-'.$diainicio;
                    } else {
                    $fecha1 = '20'.$añoinicio.'-'.$i.'-1';
                    }
                    if($i == $mesfin) {
                        $fecha2 = '20'.$añofin.'-'.$i.'-'. $diafin;
                    } else {
                    $fecha2 = '20'.$añofin.'-'.$i.'-31';
                    }
                    $mes->ventas += Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->compras += Compra::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->gastos += Gasto::where('estado', '=', 'valido')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->ganancia += $mes->ventas - $mes->compras - $mes->gastos; 
                }
            }
            
            $ventas = Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            $compras = Compra::where('estado', '=', 'valida')->whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            $gastos = Gasto::where('estado', '=', 'valido')->whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            
        }
        return view('balance.index', compact('ventas', 'compras', 'gastos', 'lcompras', 'tgastos', 'meses', 'fechai', 'fechaf'));
    }
    /**
     * Función que calcula la diferencia entre ventas y compras de productos
     */
    public function porproductos(Request $request) {
        $lcompras = Compra::where('estado', '=', 'valida')->orderBy('fecha', 'DESC')->with('detalles')->take(5)->get();
        $productos = Producto::orderBy('id', 'ASC')->get();
        $mt = 0;
        $ganancia = 0;
        $fechai = $request->fechainicio;
        $fechaf = $request->fechafinal;
        foreach($lcompras as $lcompra){
            foreach($lcompra->detalles as $cd){
                $producto = Producto::where('id', '=', $cd->id_tipo_producto)->first();
                $cd->id_tipo_producto = $producto->nombre;
            }
        }
        if(trim($request->fechainicio) != "" || trim($request->fechafin) != ""){
            $mt = 1;
            $fechainicio = new Datetime($request->fechainicio);
            $fechafin = new Datetime($request->fechafinal);
            $ventas = Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->get();
            if($fechainicio > $fechafin) {
                return redirect()->route('balanceporproductos', ['ganancia' => $ganancia,
                                                    'productos' => $productos,
                                                    'mt' => $mt, 
                                                    'lcompras' => $lcompras,
                                                    'fechaf' => $fechaf,
                                                    'fechaf' => $fechaf])
                ->with('info', 'La fecha de inicio debe ser anterior a la fecha final');
            }
            foreach($productos as $producto){
                $producto->totalvendido = 0;
                $producto->cantidadventas = 0;
                $producto->totalcomprado = 0;
                $producto->gramosvendidos = 0;
            }
            

            foreach($ventas as $venta){
                $detalles = DetalleFactura::where('id_factura', '=', $venta->id)->get();
                foreach($detalles as $detalle){
                    $p = $productos->where('id', $detalle->id_tipo_producto)->first();
                    $p->totalvendido += $detalle->precio;
                    $p->cantidadventas += $detalle->cantidad;
                    $p->gramosvendidos += $detalle->peso_kilo;
                }
            }
            foreach($productos as $producto){
                $producto->totalcomprado = (int)($producto->gramosvendidos * $producto->preciocomprakilo);
                $ganancia += (int)($producto->totalvendido - $producto->totalcomprado);
            }
        }

        return view('balance.producto', compact('lcompras', 'productos', 'mt', 'ganancia', 'fechai', 'fechaf'));
    }

    /**
     * Función que imprime la diferencia entre ventas y compras de productos
     */
    public function printtable(Request $request){
        $productos = Producto::orderBy('id', 'ASC')->get();
        $ganancia = 0;

        $fechai = $request->fechai;
        $fechaf = $request->fechaf;
        foreach($productos as $producto){
            $producto->totalvendido = 0;
            $producto->cantidadventas = 0;
            $producto->totalcomprado = 0;
            $producto->gramosvendidos = 0;
        }

        $ventas = Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($request->fechai, $request->fechaf))->get();

        foreach($ventas as $venta){
            $detalles = DetalleFactura::where('id_factura', '=', $venta->id)->get();
            foreach($detalles as $detalle){
                $p = $productos->where('id', $detalle->id_tipo_producto)->first();
                $p->totalvendido += $detalle->precio;
                $p->cantidadventas += $detalle->cantidad;
                $p->gramosvendidos += $detalle->peso_kilo;
            }
        }
        foreach($productos as $producto){
            $producto->totalcomprado = $producto->gramosvendidos * $producto->preciocomprakilo;
            $ganancia += $producto->totalvendido - $producto->totalcomprado;
        }

        $pdf = PDF::loadView('pdf.balancetabla', ['productos' => $productos, 'ganancia' => $ganancia, 'fechai' => $fechai, 'fechaf' => $fechaf]);
        return $pdf->stream('balancetabla.pdf');
    }

    /**
     * Función que imprime la diferencia el estado de resultados
     */
    public function printestadoderesultado(Request $request){
        $fechai = $request->fechainicio;
        $fechaf = $request->fechafinal;
        $meses = Meses::orderBy('id', 'ASC')->get();

            $fechainicio = new Datetime($request->fechainicio);
            $fechafin = new Datetime($request->fechafinal);
            
            $diafin = (int)$fechafin->format('d');
            $mesfin = (int)$fechafin->format('m');
            $añofin = (int)$fechafin->format('y');
            $diainicio = (int)$fechainicio->format('d');
            $mesinicio = (int)$fechainicio->format('m');
            $añoinicio = (int)$fechainicio->format('y');
            
            foreach($meses as $mes){
                $mes->gastos = 0;
                $mes->compras = 0;
                $mes->ventas = 0;
                $mes->ganancia = 0; 
            }
            if($añofin > $añoinicio){
                for($i = $mesinicio; $i <= 12; $i++) {
                    
                    $mes = $meses->where('id', $i)->first();
                    if($i == $mesinicio) {
                        $fecha1 = '20'.$añoinicio.'-'.$i.'-'.$diainicio;
                    } else {
                    $fecha1 = '20'.$añoinicio.'-'.$i.'-1';
                    }
                    $fecha2 = '20'.$añoinicio.'-'.$i.'-31';
                    $mes->ventas += Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->compras += Compra::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->gastos += Gasto::where('estado', '=', 'valido')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->ganancia += $mes->ventas - $mes->compras - $mes->gastos; 
                }
                for($i = 1; $i <= $mesfin; $i++){
                    $mes = $meses->where('id', $i)->first();
                    $fecha1 = '20'.$añofin.'-'.$i.'-1';
                    if($i == $mesfin) {
                        $fecha2 = '20'.$añofin.'-'.$i.$diafin;
                    } else {
                    $fecha2 = '20'.$añoinicio.'-'.$i.'-1';
                    }
                    $mes->ventas += Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->compras += Compra::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->gastos += Gasto::where('estado', '=', 'valido')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->ganancia += $mes->ventas - $mes->compras - $mes->gastos; 
                }
            }else{
                for($i = $mesinicio; $i <= $mesfin; $i++) {
                    
                    $mes = $meses->where('id', $i)->first();
                    if($i == $mesinicio) {
                        $fecha1 = '20'.$añoinicio.'-'.$i.'-'.$diainicio;
                    } else {
                    $fecha1 = '20'.$añoinicio.'-'.$i.'-1';
                    }
                    if($i == $mesfin) {
                        $fecha2 = '20'.$añofin.'-'.$i.'-'. $diafin;
                    } else {
                    $fecha2 = '20'.$añofin.'-'.$i.'-31';
                    }
                    $mes->ventas += Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->compras += Compra::where('estado', '=', 'valida')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->gastos += Gasto::where('estado', '=', 'valido')->whereBetween('fecha', array($fecha1, $fecha2))->sum('total');
                    $mes->ganancia += $mes->ventas - $mes->compras - $mes->gastos; 
                }
            }
            $ventas = Factura::where('estado', '=', 'valida')->whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            $compras = Compra::where('estado', '=', 'valida')->whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            $gastos = Gasto::where('estado', '=', 'valido')->whereBetween('fecha', array($request->fechainicio, $request->fechafinal))->sum('total');
            $pdf = PDF::loadView('pdf.estadoderesultados', ['meses' => $meses,
                                                            'fechai' => $fechai,
                                                            'fechaf' => $fechaf,
                                                            'ventas' => $ventas,
                                                            'compras' => $compras,
                                                            'gastos' => $gastos]);
            return $pdf->stream('estadoderesultados.pdf'); 
        }    
}
