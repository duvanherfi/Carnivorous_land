<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    protected $table = "datos_empresa";
 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable= [
        'mision', 'vision',
    ];
}
