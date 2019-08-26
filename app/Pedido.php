<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id', 'fecha', 'nombre_cliente', 'ciudad', 'direccion', 'tipo _entrega', 'estado', 'entregado'
    ];
}
