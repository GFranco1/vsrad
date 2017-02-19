<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //la tabla que tiene los proyectos se llama proyectos
    //poner a mano que tabla va a coger
    protected $table = "proyectos";

    public function isValidado(){
        if($this->validado == 1)
            return "Proyecto validado";

    }
public function cliente()//devolver el modelo de usuario del proyecto
{
    return $this->belongsTo('\App\User', 'cliente_id');

}

    public function tecnico()//devolver el modelo de usuario del proyecto
    {
        return $this->belongsTo('\App\User', 'tecnico_id');

    }

    public function comercial()//devolver el modelo de usuario del proyecto
    {
        return $this->belongsTo('\App\User', 'comercial_id');

    }
}
