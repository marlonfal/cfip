<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    public function factura()
    {
        return $this->belongsTo('App\Factura', 'id_factura');
    }
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_tipo_producto');
    }

    protected $table = 'detalle_factura';
    protected $fillable = [ 'id_detalle',
                            'peso_kilo', 
                            'precio', 
                            'cantidad', 
                            'id_factura', 
                            'id_tipo_producto'];
}
