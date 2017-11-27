<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoGeneral extends Model
{
    protected $table = 'info_generals';
    protected $fillable = ['iva', 'telefono', 'correo', 'nit'];
}
