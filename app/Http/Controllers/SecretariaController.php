<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;//se agrego esta linea
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;//se agrego esta linea

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secretarias = Secretaria::with('user')->get();
        return view('admin.secretarias.index', compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.secretarias.create');
    }

    public function storeAPI(Request $request)
{
    // 1. Validar (Cambiamos 'dni' por 'cc' para que coincida con tu Postman)
    $request->validate([
        'nombres'  => 'required|string',
        'apellidos'=> 'required|string',
        'cc'       => 'required|unique:secretarias', 
        'email'    => 'required|email|unique:users',
        'password' => 'required|min:8'
    ]);

    try {
        // 2. Crear el Usuario
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        // 3. Crear la Secretaria
        $secretaria = new Secretaria();
        $secretaria->user_id = $usuario->id;
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->cc = $request->cc;
        
        // Asignamos valores por defecto o los tomamos del request si existen
        $secretaria->celular = $request->celular ?? '00000000'; 
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento ?? '2000-01-01';
        $secretaria->direccion = $request->direccion ?? 'Sin dirección';
        $secretaria->save();

        // 4. Asignar el Rol (Spatie)
        $usuario->assignRole('secretaria');

        return response()->json([
            'status' => 'success',
            'message' => 'Secretaria creada correctamente desde API',
            'id_secretaria' => $secretaria->id,
            'id_usuario' => $usuario->id
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Error: ' . $e->getMessage()
        ], 500);
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cc' => 'required|unique:secretarias',
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        $secretaria = new Secretaria();
        $secretaria->user_id =$usuario->id;
        $secretaria->nombres =$request->nombres;
        $secretaria->apellidos =$request->apellidos;
        $secretaria->cc =$request->cc;
        $secretaria->celular =$request->celular;
        $secretaria->fecha_nacimiento =$request->fecha_nacimiento;
        $secretaria->direccion =$request->direccion;
        $secretaria->save();

        $usuario->assignRole('secretaria');

        return redirect()->route('admin.secretarias.index')
        ->with('mensaje', 'Se registró a la secretaria de manera correcta')
        ->with('icono', 'success');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.show', compact('secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.edit', compact('secretaria'));
    }

//agregue este para el api
    public function updateAPI(Request $request, $id)
{
    $secretaria = Secretaria::find($id);

    if (!$secretaria) {
        return response()->json([
            'message' => 'Secretaria no encontrada'
        ], 404);
    }

    $request->validate([
        'nombres' => 'required',
        'apellidos' => 'required',
        'cc' => 'required|unique:secretarias,cc,' . $secretaria->id,
    ]);

    $secretaria->nombres = $request->nombres;
    $secretaria->apellidos = $request->apellidos;
    $secretaria->cc = $request->cc;

    $secretaria->save();

    return response()->json([
        'message' => 'Secretaria actualizada correctamente',
        'data' => $secretaria
    ], 200);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $secretaria = Secretaria::find($id);
      $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cc' => 'required|unique:secretarias,cc,'.$secretaria->id,
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email' => 'required|max:250|unique:users,email,'. $secretaria->user->id,
            'password' => 'nullable|max:250|confirmed',
        ]);   

        $secretaria->nombres =$request->nombres;
        $secretaria->apellidos =$request->apellidos;
        $secretaria->cc =$request->cc;
        $secretaria->celular =$request->celular;
        $secretaria->fecha_nacimiento =$request->fecha_nacimiento;
        $secretaria->direccion =$request->direccion;
        $secretaria->save();

        $usuario = User::find($secretaria->user->id);
        $usuario->name = $request->nombres;
      $usuario->email = $request->email;
      if($request->filled('password')){
      $usuario->password = Hash::make($request['password']);
      }
      $usuario->save();

      return redirect()->route('admin.secretarias.index')
        ->with('mensaje', 'Se actualizo a la secretaria de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id){
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.delete', compact('secretaria'));

    }
    public function destroy($id)
    {
        $secretaria = Secretaria::find($id);

        // eliminar al usuario asociado
        $user = $secretaria->user;
        $user->delete();

        // eliminar a la secretaria
        $secretaria->delete;

        return redirect()->route('admin.secretarias.index')
        ->with('mensaje', 'Se elimino a la secretaria de manera correcta')
        ->with('icono', 'success');
    }

    // lo agregue para el api
    public function destroyAPI($id)
{
    $secretaria = Secretaria::find($id);

    if (!$secretaria) {
        return response()->json([
            'message' => 'Secretaria no encontrada'
        ], 404);
    }

    $secretaria->delete();

    return response()->json([
        'message' => 'Secretaria eliminada correctamente'
    ], 200);
}
}
