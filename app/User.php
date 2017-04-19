<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidos','dni','email', 'password','telefono','rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $roles = [
        'invitado','cliente', 'comercial', 'tecnico', 'director_comercial', 'administrador'
    ];

    public function hasRole($role)
    {
        return User::$roles[$this->rol] == $role;
    }

    public function getRole() {
        return User::$roles[$this->rol];
    }
}
