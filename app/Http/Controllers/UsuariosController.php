<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Usuario;



class UsuariosController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        if(Auth::User()->tipo != "administrador"){           
            return response()->json(['error' => 'Usuario no autorizado'], 401);
        }
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->no_trabajador = $request->no_trabajador;
        $usuario->email = $request->email;     
        $usuario->password = Hash::make($request->password);       
        $usuario->departamento_id = $request->departamento_id;
        $usuario->puesto_id = $request->puesto_id;
        $usuario->horario_id = $request->horario_id;        
        $usuario->save();      
        return response()->json(['usuario' => $usuario], 200);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Metodo para actualizar un usuario
        if(Auth::User()->tipo != "administrador"){           
            return response()->json(['error' => 'Usuario no autorizado'], 401);
        }
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->no_trabajador = $request->no_trabajador;
        $usuario->email = $request->email;
        $usuario->departamento_id = $request->departamento_id;
        $usuario->puesto_id = $request->puesto_id;
        $usuario->horario_id = $request->horario_id;
        $usuario->save();
        return response()->json(['usuario' => $usuario], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Metodo para eliminar un usuario
        if(Auth::User()->tipo != "administrador"){           
            return response()->json(['error' => 'Usuario no autorizado'], 401);
        }
        $usuario = Usuario::find($id);
        $usuario->delete();
        return response()->json(['usuario' => $usuario], 200);
    }

    //Metodo para obtener todos los usuarios
    public function index()
    {
        if(Auth::User()->tipo != "administrador"){           
            return response()->json(['error' => 'Usuario no autorizado'], 401);
        }
        $usuarios = Usuario::all();
        return response()->json(['usuarios' => $usuarios], 200);
    }   
}
