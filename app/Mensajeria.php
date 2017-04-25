<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajeria extends Model
{
    protected $table = 'mensajeria';

    protected $fillable = [
        'origen','destino','asunto','mensaje','leido',
    ];
}
