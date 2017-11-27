<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipodegasto extends Model
{
    protected $table = 'tipodegastos';
    protected $fillable =['nombre_tipo_gasto','descripcion'];


    public function gasto()
    {
        return $this->hasMany('App\Gasto');
    }

}
