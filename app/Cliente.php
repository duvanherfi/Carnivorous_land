<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'direccion_residencia'
    ];


    protected $primaryKey = 'correo_cliente';
    public $incrementing = false;
}
