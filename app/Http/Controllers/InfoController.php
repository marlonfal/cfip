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
        $productos = Producto::orderBy('cantidad', 'ASC')->take(5)->get();
        $pedidos = Pedido::orderBy('created_at', 'DESC')->where('estado', '=', 'Pendiente')->take(5)->get();
        $facturas = Factura::orderBy('created_at', 'DESC')->take(5)->get();
        return view('inicio', compact('facturas', 'pedidos', 'productos'));
    }

    public function configuracion()
    {
        return view('info.configuracion');
    }

    public function contraseña(){
        return view('auth.passwords.reset');
    }

    
}
