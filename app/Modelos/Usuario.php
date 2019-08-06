<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nombre', 'correo', 'password','cedula','telefono','fecha_nacimiento','sexo'
    ];
}
