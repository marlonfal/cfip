<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Compra;
use Illuminate\Http\Request;
use PDF;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::nombre($request->get('nombre'))->orderBy('activo', 'DESC')->orderBy('cantidad', 'ASC')->paginate(10);
        return view('producto.index', compact('productos'));
    }

    /**
     * Función que devuelve un json con la información de todos los productos
     */
    public function getProductos(Request $request){
        if($request->ajax()){
            $productos = Producto::productos();
            return response()->json($productos);
        }
    }
    public function getProducto(Request $request, $id){
        if($request->ajax()){
            $productos = Producto::productobyid($id);
            return response()->json($productos);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        if(Producto::where('nombre', '=', $request->nombre)->count() > 0){
            $producto = Producto::where('nombre', '=', $request->nombre)->get();
            return redirect()->route('producto.create')->with('info', 'Ya existe un producto con ese nombre!');
        }else{
            $this->validate($request, [
                'imagen' => 'image'
            ]);
            $producto = new Producto();
            $producto->imagen = $request->file('imagen')->store('public');
            $producto->nombre = $request->nombre;
            $producto->precioventakilo = $request->precioventakilo;
            $producto->cantidad = $request->cantidad;
            $producto->gramos = $request->gramos;
            $producto->preciocomprakilo = $request->preciocomprakilo;
            $producto->activo = $request->activo;
            $producto->save();
            return redirect()->route('producto.show', $producto)->with('info', 'Se creó el producto');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {  
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $this->validate($request, [
            'imagen' => 'image'
        ]);
        if($request->hasFile('imagen')){
            $producto->imagen = $request->file('imagen')->store('public');
        }
        
        $producto->nombre = $request->nombre;
        $producto->precioventakilo = $request->precioventakilo;
        $producto->cantidad = $request->cantidad;
        $producto->gramos = $request->gramos;
        $producto->preciocomprakilo = $request->preciocomprakilo;
        $producto->activo = $request->activo;

        $producto->save();
        return redirect()->route('producto.show', $producto)->with('info', 'Se actualizó la información del producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index')->with('info', 'Fue eliminado exitosamente');
    }

    /**
     * Función que imprime la lista de productos
     */
    public function printlist(){
        $productos = Producto::orderBy('activo', 'DESC')->orderBy('cantidad', 'ASC')->get();
        $pdf = PDF::loadView('pdf.productoslist', ['productos' => $productos]);
        return $pdf->stream();
    }
}
