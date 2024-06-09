<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="usuarios";
    protected $fillable = [
       'nombre','no_trabajador','email','password','departamento_id','puesto_id','horario_id'
    ];
}
