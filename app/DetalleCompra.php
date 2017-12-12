<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    public function compra()
    {
        return $this->belongsTo('App\Compra', 'id_compra');
    }
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_tipo_producto');
    }

    protected $table = 'detalle_compras';
    protected $fillable = [ 'id_detalle',
                            'peso_kilo', 
                            'precio', 
                            'cantidad', 
                            'id_compra', 
                            'id_tipo_producto'];
}
