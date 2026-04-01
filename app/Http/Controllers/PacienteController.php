<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');
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
            'tipo_documento' => 'required',
            'numero_documento' => 'required|unique:pacientes',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'correo' => 'required|max:250|unique:pacientes',
            'direccion' => 'required',
            'grupo_sanguineo' => 'required',
            'contacto_emergencia' => 'required',
    ]);
    
        $paciente = new Paciente();
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->tipo_documento = $request->tipo_documento;
        $paciente->numero_documento = $request->numero_documento;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();

        $usuario->assignRole('paciente');

        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Se registró al paciente de manera correcta')
        ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'tipo_documento' => 'required',
            'numero_documento' => 'required|unique:pacientes,numero_documento,'.$paciente->id,
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'correo' => 'required|max:250|unique:pacientes,correo,'.$paciente->id,
            'direccion' => 'required',
            'grupo_sanguineo' => 'required',
            'contacto_emergencia' => 'required',
    ]);

        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->tipo_documento = $request->tipo_documento;
        $paciente->numero_documento = $request->numero_documento;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();

        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Se actualizo al paciente de manera correcta')
        ->with('icono', 'success');

    }

    public function confirmDelete($id){

    $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.delete', compact('paciente'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

    // 1. Buscamos al paciente y lo eliminamos
    $paciente = Paciente::find($id);

    if($paciente){
        $paciente->delete(); // Esta es la línea que te faltaba
    }

        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Se eliminó al paciente de manera correcta')
        ->with('icono', 'success');
    }
}
