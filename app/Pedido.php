<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id', 'referencia', 'fecha', 'nombre_cliente', 'ciudad', 'direccion', 'telefono', 'estado', 'total', 'entregado'
    ];
}
