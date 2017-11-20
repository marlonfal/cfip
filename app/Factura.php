<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    public function producto()
    {
        return $this->belongsToMany('App\Producto');
    }
    public function detalles()
    {
        return $this->hasMany('App\DetalleFactura');
    }
    protected $fillable = ['comprador', 'total', 'fecha'];
}
