<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleGasto extends Model
{
    protected $table = 'detalle_gasto';
    protected $fillable = ['id_detalle',
                            'producto',
                            'cantidad',
                            'precio'];

    public function gasto()
    {
        return $this->belongsTo('App\Gasto', 'id_gasto');
    }
    public function tipodegasto()
    {
        return $this->belongsTo('App\tipodegasto', 'id_tipo_gasto');
    }
}
