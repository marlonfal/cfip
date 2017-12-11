<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $fillable = ['proveedor', 'fecha', 'total', 'usuario'];

    public function producto()
    {
        return $this->belongsToMany('App\Producto');
    }

    public function detalles()
    {
        return $this->hasMany('App\DetalleCompra', 'id_compra');
    }
}
