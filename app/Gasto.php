<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table = 'gasto';
    protected $fillable = ['fecha', 'descripción', 'total', 'id_tipo_gasto', 'usuario'];

    public function tipodegasto()
    {
        return $this->belongsTo('App\tipodegasto', 'id');
    }
}
