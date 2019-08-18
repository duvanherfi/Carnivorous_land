<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'id_compra', 'nombre_articulo', 'cantidad', 'valor', 'imagen', 
    ];
}
