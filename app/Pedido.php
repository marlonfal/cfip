<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = 'pedido';
    protected $fillable =  ['id',
                            'direccion',
                            'telefono',
                            'hora_entrega', 
                            'fecha_entrega',
                            'estado',
                            'nombre',
                            'id_factura'];
                            
    public function producto()
    {
        return $this->belongsToMany('App\Producto');
    }

    public function detalles()
    {
        return $this->hasMany('App\DetallePedido', 'id_pedido');
    }

    public function scopeEstado($query, $estado){
        $estados = array('Pendiente' => 'Pendiente', 'En camino' => 'En camino', 'Entregado' => 'Entregado', 'Cancelado' => 'Cancelado');

        if($estados != "" && isset($estados[$estado])){
            $query->where('estado', '=', $estado);
        }
    }

    public function scopeNombre($query, $nombre){
        if(trim($nombre) != ""){
            $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }
}
