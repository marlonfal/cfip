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
    protected $table = 'productos';
    protected $fillable =['nombre_producto','precio_por_gramo'];

    public static function productos(){
        return Producto::all();
    }
    public static function productobyid($id){
        return Producto::where('id', '=', $id)->get();
    }

}
