<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function detalle()
    {
        return $this->hasMany('App\DetalleFactura');
    }

    public function factura()
    {
        return $this->belongsToMany('App\Factura');
    }

    /**
     * scope para buscar un producto por su nombre
     */
    public function scopeNombre($query, $nombre){
        if(trim($nombre) != ""){
            $query->where('nombre_producto', 'LIKE', "%$nombre%");
        }
    }

    protected $table = 'productos';
    protected $fillable =['nombre_producto','precio_por_gramo', 'imagen', 'cantidad', 'gramos'];

    /**
     * función que devuelve todos los productos
     */
    public static function productos(){
        return Producto::all();
    }

    /**
     * función que devuelve un producto según su id
     */
    public static function productobyid($id){
        return Producto::where('id', '=', $id)->get();
    }

}
