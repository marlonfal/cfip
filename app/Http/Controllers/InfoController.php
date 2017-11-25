<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\Pedido;

class InfoController extends Controller
{
    public function index()
    {   
        return view('info.index');
    }
    public function inicio()
    {
        $pedidos = Pedido::orderBy('created_at', 'DESC')->take(5)->get();
        $facturas = Factura::orderBy('created_at', 'DESC')->take(5)->get();
        return view('inicio', compact('facturas', 'pedidos'));
    }

    public function configuracion()
    {
        return view('info.configuracion');
    }

    public function contraseña(){
        return view('auth.passwords.reset');
    }

    
}
