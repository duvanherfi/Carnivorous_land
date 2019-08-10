<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'nombre', 'correo', 'password', 'cedula', 'telefono', 'sexo', 'fecha_nacimiento',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
 
    public function getAuthPassword()
    {
        return $this->password;
    }

    protected $primaryKey = 'correo';
    public $incrementing = false;

//    public function setPasswordAttribute ($value)
//     {
//         $this->attributes['password'] = bcrypt($value);
//     }
    
}
