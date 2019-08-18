<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id', 'fecha', 'nombre_cliente', 'nombre_producto', 'ciudad', 'direccion', 'tipo _entrega', 'estado', 'cantidad', 'subtotal', 'imagen', 'total'
    ];
}
