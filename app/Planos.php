<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planos extends Model
{
    protected $fillable = [
        'nombre','imagen_plano','icono_plano'
    ];
}
