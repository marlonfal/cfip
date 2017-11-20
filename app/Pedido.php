<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $fillable =  ['id', 
                            'fecha_pedido', 
                            'fecha_entrega',
                            'nombre',
                            'detalles'];
}
