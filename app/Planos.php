<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planos extends Model
{
    protected $fillable = [
        'nombre', 'nombre_class', 'imagen_plano','icono_plano', 'validado'
    ];
}

