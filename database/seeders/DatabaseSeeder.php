<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;                    // <--- AÑADE ESTA LÍNEA
use App\Models\Secretaria; // <--- AGREGA ESTA LÍNEA
use App\Models\Doctor;
use App\Models\Consultorio;
use Illuminate\Support\Facades\Hash;    // <--- AÑADE ESTA LÍNEA
use App\Models\Paciente; // <--- AGREGA ESTA LÍNEA

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([RoleSeeder::class,]);

        User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('admin');

        User::create([
            'name'=>'Secretaria',
            'email'=>'secretaria@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'secretaria',
            'apellidos' => '1',
            'cc' => '11111',
            'celular' => '3001112233',
            'fecha_nacimiento' => '25/08/1978',
            'direccion' => 'Malhabar',
            'user_id'=>'2'
        ]);

        User::create([
            'name'=>'Doctor1',
            'email'=>'doctor1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor1',
            'apellidos' => '1',
            'telefono' => '3220000000',
            'licencia_medica' => '11111',
            'especialidad' => 'PEDIATRIA',
            'user_id'=>'3'
        ]);

        User::create([
            'name'=>'Doctor2',
            'email'=>'doctor2@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor2',
            'apellidos' => '2',
            'telefono' => '3221111111',
            'licencia_medica' => '33333',
            'especialidad' => 'ODONTOLOGIA',
            'user_id'=>'4'
        ]);

        User::create([
            'name'=>'Doctor3',
            'email'=>'doctor3@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor3',
            'apellidos' => '3',
            'telefono' => '3223333333',
            'licencia_medica' => '22222',
            'especialidad' => 'FISIOTERAPIA',
            'user_id'=>'5'
        ]);

        Consultorio::create([
            'nombre' => 'PEDIATRIA',
            'ubicacion' => 'PISO 1',
            'capacidad' => '1',
            'telefono' => '111',
            'especialidad' => 'PEDIATRIA',
            'estado' => 'ACTIVO',
        ]);

        Consultorio::create([
            'nombre' => 'ODONTOLOGIA',
            'ubicacion' => 'PISO 2',
            'capacidad' => '1',
            'telefono' => '',
            'especialidad' => 'ODONTOLOGIA',
            'estado' => 'ACTIVO',
        ]);

        Consultorio::create([
            'nombre' => 'FISIOTERAPIA',
            'ubicacion' => 'PISO 3',
            'capacidad' => '1',
            'telefono' => '',
            'especialidad' => 'FISIOTERAPIA',
            'estado' => 'ACTIVO',
        ]);

        User::create([
            'name'=>'Paciente1',
            'email'=>'paciente1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('paciente');

        User::create([
            'name'=>'Usuario1',
            'email'=>'usuario1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('usuario');

    }
}
