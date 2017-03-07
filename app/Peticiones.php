<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peticiones extends Model
{
    protected $fillable = [
        'email','password_temporal','rol',
    ];
}
