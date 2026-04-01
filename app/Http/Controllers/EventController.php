<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // 1. Validar que los datos lleguen (evita procesar basura)
    $request->validate([
        'doctor_id' => 'required',
        'fecha_reserva' => 'required',
        'hora_reserva' => 'required',
    ]);

        //$datos = request()->all();
        //return response()->json($datos);
        $doctor = Doctor::findOrFail($request->doctor_id);

        $evento = new Event();
        $evento->title = $request->hora_reserva." ".$doctor->especialidad;
        $evento->start = $request->fecha_reserva;
        $evento->end = $request->fecha_reserva;
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
    public function destroy(Event $event)
    {
        //
    }
}
