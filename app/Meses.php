<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
    protected $fillable = ['nombre'];
    protected $table = 'meses';
}
