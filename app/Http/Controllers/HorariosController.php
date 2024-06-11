<?php

namespace App\Http\Controllers;

use App\Models\Horario; // Import the Horario class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HorariosController extends Controller
{
    //Metodo para crear un horario
    public function altaHorario(Request $request)
    {
        if(Auth::User()->tipo != "administrador"){           
            return response()->json(['error' => 'Usuario no autorizado'], 401);
        }
        $horario = new Horario(); 
        $horario->entrada = $request->entrada;
        $horario->salida = $request->salida;      
        $horario->save();
        return response()->json(['horario' => $horario], 200);
    }

    //Metodo para obtener todos los horarios
    public function getHorarios()
    {
        if(Auth::User()->tipo != "administrador"){           
            return response()->json(['error' => 'Usuario no autorizado'], 401);
        }
        $horarios = Horario::all();
        return response()->json(['horarios' => $horarios], 200);
    }

    //Metodo para dar de baja un horario
    public function bajaHorario($id)
    {
        if(Auth::User()->tipo != "administrador"){           
            return response()->json(['error' => 'Usuario no autorizado'], 401);
        }
        $horario = Horario::find($id);
        $horario->delete();
        return response()->json(['horario' => $horario], 200);
    }

    //Metodo para actualizar un horario
    public function updateHorario(Request $request, $id)
    {
        if(Auth::User()->tipo != "administrador"){           
            return response()->json(['error' => 'Usuario no autorizado'], 401);
        }
        $horario = Horario::find($id);
        $horario->entrada = $request->entrada;
        $horario->salida = $request->salida;      
        $horario->save();
        return response()->json(['horario' => $horario], 200);
    }
    
}
