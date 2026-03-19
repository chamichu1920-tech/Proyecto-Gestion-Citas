<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // <--- AGREGA ESTA LÍNEA
use App\Models\Secretaria; // <--- AGREGA ESTA LÍNEA
use App\Models\Paciente; // <--- AÑADE ESTA LÍNEA
use App\Models\Consultorio; // <--- AÑADE ESTA LÍNEA
use App\Models\Doctor; // <--- AÑADE ESTA LÍNEA
use App\Models\Horario; // <--- AÑADE ESTA LÍNEA
class AdminController extends Controller
{
    public function index() {
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        $total_doctores = doctor::count();
        $total_horarios = horario::count();
        return view('admin.index', compact('total_usuarios','total_secretarias','total_pacientes',
        'total_consultorios','total_doctores','total_horarios'));
    } 
}
