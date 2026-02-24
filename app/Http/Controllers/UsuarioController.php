<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User; // <--- ESTA ES LA LÍNEA QUE TE FALTA

use Illuminate\Support\Facades\Hash; // <--- ESTA ES LA QUE TE FALTA

class UsuarioController extends Controller
{
    public function index (){
        $usuarios =User::all();
        return view('admin.usuarios.index',compact('usuarios'));
    }
    // AÑADE ESTO:
    public function create()
    {
        return view('admin.usuarios.create');
    }
    public function store(Request $request){
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'name'=>'required|max:250',
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed',
        ]);
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Se registró al usuario de manera correcta')
        ->with('icono', 'success');

    }
}
