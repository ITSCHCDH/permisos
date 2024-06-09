<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suspencion extends Model
{
    protected $table="suspenciones";
    protected $fillable = [
        'usuario_id','h_inicio','h_fin','motivo','estatus','validador_id','p_inicio','p_fin','tipo','materia','grupo'
    ];
}
