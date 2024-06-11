<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Departamento;

class DepartamentosController extends Controller
{
     //Metodo para dar de alta departamentos
     public function altaDepartamento(Request $request)
     {
         if(Auth::User()->tipo != "administrador"){           
             return response()->json(['error' => 'Usuario no autorizado'], 401);
         }
         $departamento = new Departamento();
         $departamento->nombre = $request->nombre;
         $departamento->save();
         return response()->json(['departamento' => $departamento], 200);
     }
 
     //Metodo para obtener todos los departamentos
     public function getDepartamentos()
     {
         if(Auth::User()->tipo != "administrador"){           
             return response()->json(['error' => 'Usuario no autorizado'], 401);
         }
         $departamentos = Departamento::all();
         return response()->json(['departamentos' => $departamentos], 200);
     }
 
     //Metodo para dar de baja departamentos
     public function bajaDepartamento($id)
     {
         if(Auth::User()->tipo != "administrador"){           
             return response()->json(['error' => 'Usuario no autorizado'], 401);
         }
         $departamento = Departamento::find($id);
         $departamento->delete();
         return response()->json(['departamento' => $departamento], 200);
     }
 
     //Metodo para actualizar departamentos
     public function updateDepartamento(Request $request, $id)
     {
         if(Auth::User()->tipo != "administrador"){           
             return response()->json(['error' => 'Usuario no autorizado'], 401);
         }
         $departamento = Departamento::find($id);
         $departamento->nombre = $request->nombre;
         $departamento->save();
         return response()->json(['departamento' => $departamento], 200);
     }
}
