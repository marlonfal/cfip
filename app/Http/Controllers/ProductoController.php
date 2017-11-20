<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('id', 'DESC')->paginate(10);
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
        $this->validate($request, [
            'nombre_producto' => 'required',
            'precio_por_gramo'=> 'required'
        ]);
        $producto = new Producto();
        $producto->nombre_producto = $request->nombre_producto;
        $producto->precio_por_gramo = $request->precio_por_gramo;

        $producto->save();
        return redirect()->route('producto.show', $producto)->with('info', 'Se creó del producto');
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
            'nombre_producto' => 'required',
            'precio_por_gramo'=> 'required'
        ]);
        $producto->nombre_producto = $request->nombre_producto;
        $producto->precio_por_gramo = $request->precio_por_gramo;

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
}
