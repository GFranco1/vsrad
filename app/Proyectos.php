<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    protected $fillable = [
        'id_cliente','id_tecnico','id_comercial','id_plano','nombre','configuracion','estado','precio',
    ];
}
