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
    public function detallepedido()
    {
        return $this->belongsToMany('App\DetallePedido', 'id_tipo_producto');
    }

    /**
     * scope para buscar un producto por su nombre
     */
    public function scopeNombre($query, $nombre){
        if(trim($nombre) != ""){
            $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }

    protected $table = 'productos';
    protected $fillable =['nombre','precioventakilo', 'imagen', 'cantidad', 'gramos', 'activo', 'preciocomprakilo'];

    /**
     * función que devuelve todos los productos
     */
    public static function productos(){
        return Producto::where('activo', '=', 1)->get();
    }

    /**
     * función que devuelve un producto según su id
     */
    public static function productobyid($id){
        return Producto::where('id', '=', $id)->get();
    }

}
