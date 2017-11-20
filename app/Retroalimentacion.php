<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retroalimentacion extends Model
{
    protected $fillable =['tipo','titulo', 'contenido', 'nombre'];

    public function scopeTiporetroalimentacion($query, $tipo){
        $tipos = array('' => 'Seleccione', 'Queja' => 'Quejas', 'Reclamo' => 'Reclamos', 'Sugerencia' => 'Sugerencias');

        if($tipo != "" && isset($tipos[$tipo])){
            $query->where('tipo', '=', $tipo);
        }
    }
}
