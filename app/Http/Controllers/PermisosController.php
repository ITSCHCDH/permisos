<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Permiso;

class PermisosController extends Controller
{
   //Metodo para crear un permiso
    public function altaPermiso(Request $request)
    {
        if(Auth::User()->tipo != "administrador"){           
            return response()->json(['error' => 'Usuario no autorizado'], 401);
        }
        $permiso = new Permiso(); 
        $permiso->usuario_id = $request->usuario_id;
        $permiso->fecha = $request->fecha;
        $permiso->entrada = $request->entrada;
        $permiso->salida = $request->salida;
        $permiso->motivo = $request->motivo;
        $permiso->estatus = $request->estatus;
        $permiso->validador_id = $request->validador_id;
        //Si el usuario lleva mas de 3 permisos en el mes, el segundo validador es el administrador
        $permisos = Permiso::where('usuario_id', $request->usuario_id)->whereMonth('fecha', date('m'))->get();
        if(count($permisos) >= 3){
            $permiso->validador2_id = 1;
        }else{
            $permiso->validador2_id = $request->validador2_id;
        }        
        $permiso->tipo = $request->tipo;
        //Si tipo de permiso es asignación le damos un auto de lo contrario no lo pedimos
        if($request->tipo == "asignacion"){
            $permiso->auto = $request->auto;
        }else{
            $permiso->auto = null;
        }        
        $permiso->save();
        return response()->json(['permiso' => $permiso], 200);             
    }

    
}
