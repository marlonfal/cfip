<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_tipo_producto');
    }
    protected $table = 'detalle_pedido';
    protected $fillable = ['id_pedido', 'id_detalle','id_tipo_producto', 'cantidad'];

}
