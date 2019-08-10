<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
       'correo', 'departamento', 'ciudad', 'barrio', 'via',
    ];


    protected $primaryKey = 'correo';
    public $incrementing = false;
}
