<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
    protected $fillable = [
        'nombre','descripcion','precio','zona','imagen', 'validado'
    ];
}
