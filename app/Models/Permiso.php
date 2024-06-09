<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table="permisos";
    protected $fillable = [
        'usuario_id','fecha','entrada','salida','motivo','estatus','validador_id','validador2_id','tipo','auto'
    ];
}
