<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\ValidationException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);

    $request->validate([
    'fecha_reserva' => 'required',
    'hora_reserva' => 'required',
]);

$doctor = Doctor::findOrFail($request->doctor_id);
$fecha_reserva = $request->fecha_reserva;
$hora_reserva = $request->hora_reserva;

// Convertir día a español
$dias = [
    'Monday' => 'lunes',
    'Tuesday' => 'martes',
    'Wednesday' => 'miercoles',
    'Thursday' => 'jueves',
    'Friday' => 'viernes',
    'Saturday' => 'sabado',
    'Sunday' => 'domingo',
];

$dia_en_ingles = date('l', strtotime($fecha_reserva));
$dia_buscado = $dias[$dia_en_ingles];

// valida si existe el horario del doctor
$horarios = Horario::where('doctor_id', $doctor->id)
    ->where('dia', $dia_buscado)
    ->where('hora_inicio', '<=', $hora_reserva)
    ->where('hora_fin', '>=', $hora_reserva)
    ->exists();

if (!$horarios) {
    return redirect()->back()->with([
    'mensaje' => 'El doctor no está disponible en ese horario.',
    'icono' => 'error',
    'hora_reserva' => 'El doctor no está disponible en ese horario.',
    ]);
}

// valida si existen eventos duplicados
        $eventos_duplicados = Event::where('doctor_id', $doctor->id)
        ->where('start', $fecha_reserva." ".$hora_reserva)
        ->exists();

if ($eventos_duplicados) {
    return redirect()->back()->with([
    'mensaje' => 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',
    'icono' => 'error',
    'hora_reserva' => 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',
    ]);
}

        $evento = new Event();
        $evento->title = $request->hora_reserva." ".$doctor->especialidad;
        $evento->start = $request->fecha_reserva." ".$hora_reserva;
        $evento->end = $request->fecha_reserva." ".$hora_reserva;
        $evento->color = 'green';
        $evento->user_id = Auth::user()->id;
        $evento->doctor_id = $request->doctor_id;
        $evento->consultorio_id = '1';
        $evento->save();

        return redirect()->route('admin.index')
        ->with('mensaje', 'Se registró la reserva de la cita medica de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Event::destroy($id);
       return redirect()->back()->with([
    'mensaje' => 'Se elimino la reserva de la manera correcta.',
    'icono' => 'success',
    
    ]);
    }
}
