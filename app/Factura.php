<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['comprador', 'total', 'fecha', 'id_pedido', 'vendedor', 'subtotal', 'iva', 'estado'];

    public function scopeId($query, $id){
        if(trim($id) != ""){
            $query->where('id', '=', $id);
        }
    }

    public function scopeComprador($query, $comprador){
        if(trim($comprador) != ""){
            $query->where('comprador', 'LIKE', "%$comprador%");
        }
    }

    public function producto()
    {
        return $this->belongsToMany('App\Producto');
    }

    public function detalles()
    {
        return $this->hasMany('App\DetalleFactura');
    }
    
}
