<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = 'pedido';
    protected $fillable =  ['id',
                            'hora_entrega', 
                            'fecha_entrega',
                            'estado',
                            'nombre',
                            'detalles'];
                            
    public function producto()
    {
        return $this->belongsToMany('App\Producto');
    }

    public function detalles()
    {
        return $this->hasMany('App\DetallePedido', 'id_pedido');
    }
}
