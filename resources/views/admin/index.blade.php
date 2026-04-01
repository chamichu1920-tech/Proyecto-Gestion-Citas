@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Bienvenido: {{Auth::user()->name}} </h1>
</div>
<hr>
<div class="row">

@can('admin.usuarios.index')

  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$total_usuarios}}</h3>
                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="ion fas bi bi-file-person"></i>
              </div>
              <a href="{{url('admin/usuarios')}}" class="small-box-footer">Mas informacíon <i class="fas bi bi-file-person"></i></a>
            </div>
          </div>
          @endcan

          @can('admin.secretarias.index')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$total_secretarias}}</h3>
                <p>Secretarias</p>
              </div>
              <div class="icon">
                <i class="ion fas bi bi-person-circle"></i>
              </div>
              <a href="{{url('admin/secretarias')}}" class="small-box-footer">Mas informacíon <i class="fas bi bi-file-person"></i></a>
            </div>
          </div>
          @endcan

          @can('admin.pacientes.index')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$total_pacientes}}</h3>
                <p>Pacientes</p>
              </div>
              <div class="icon">
                <i class="ion fas bi bi-person-fill-check"></i>
              </div>
              <a href="{{url('admin/pacientes')}}" class="small-box-footer">Mas informacíon <i class="fas bi bi-file-person"></i></a>
            </div>
          </div>
          @endcan

          @can('admin.consultorios.index')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$total_consultorios}}</h3>
                <p>Consultorios</p>
              </div>
              <div class="icon">
                <i class="ion fas bi bi-hospital"></i>
              </div>
              <a href="{{url('admin/consultorios')}}" class="small-box-footer">Mas informacíon <i class="fas bi bi-file-person"></i></a>
            </div>
          </div>
          @endcan

          @can('admin.doctores.index')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$total_doctores}}</h3>
                <p>Doctores</p>
              </div>
              <div class="icon">
                <i class="ion fas bi bi-person-heart"></i>
              </div>
              <a href="{{url('admin/doctores')}}" class="small-box-footer">Mas informacíon <i class="fas bi bi-file-person"></i></a>
            </div>
          </div>
          @endcan

          @can('admin.horarios.index')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$total_horarios}}</h3>
                <p>Horarios</p>
              </div>
              <div class="icon">
                <i class="ion fas bi bi-calendar2-date"></i>
              </div>
              <a href="{{url('admin/horarios')}}" class="small-box-footer">Mas informacíon <i class="fas bi bi-file-person"></i></a>
            </div>
          </div>
          @endcan
          </div>
       <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <dv class="card-header">
                <div class="row">
                  <div class="col-md-6"><h3 class="card-tittle">Calendario de atención de doctores</h3></div>
                  <div class="col-md-6">
                    <div class="row">
                      <label for="consultorio_id">Consultorios</label>
                                <select name="consultorio_id" id="consultorio_select" class="form-control" required>
                                  <option value="">Seleccione un consultorio...</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{$consultorio->id}}">
                                            {{$consultorio->nombre . " - " . $consultorio->ubicacion}}
                                        </option>
                                    @endforeach
                                </select>
                    </div>
                  </div>
               </div>
              </dv>
              <div class="card-body">
                <script>
    // Usamos esta función para esperar a que jQuery esté cargado
    window.onload = function() {
        if (window.jQuery) {
            console.log("jQuery cargado correctamente dentro del script");
            
            $('#consultorio_select').on('change', function () {
                var consultorio_id = $(this).val();
                if (consultorio_id) {
                    var url = "{{ route('cargar_datos_consultorios', ':id') }}";
                    url = url.replace(':id', consultorio_id);
                    
                    //alert("Consultorio detectado: " + consultorio_id);

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function (data) {
                            $('#consultorio_info').html(data);
                        },
                        error: function () {
                            alert('Error al obtener los datos');
                        }
                    });
                } else {
                    $('#consultorio_info').html('');
                }
            });
        } else {
            console.error("jQuery aún no carga. Revisa las rutas en el footer.");
        }
    };
</script>
                <hr>
                <div id="consultorio_info">
                </div>
              </div>
            </div>
          </div>
</div>
</div>
<div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-warning">
              <dv class="card-header">
                <div class="row">
                  <div class="col-md-6"><h3 class="card-tittle">Calendario de reserva de citas</h3></div>
                  <div class="col-md-6">
                    <div class="row">
                      <label for="consultorio_id">Consultorios</label>
                                <select name="consultorio_id" id="consultorio_select" class="form-control" required>
                                  <option value="">Seleccione un consultorio...</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{$consultorio->id}}">
                                            {{$consultorio->nombre . " - " . $consultorio->ubicacion}}
                                        </option>
                                    @endforeach
                                </select>
                    </div>
                  </div>
              </dv>
              <div class="card-body">
                <div class="row">
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Registrar cita medica
</button>

<!-- Modal -->
<form action="{{url('/admin/eventos/create')}}" method="post"> 
  @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reserva de cita medica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Doctor</label>
              <select name="doctor_id" id="" class="form-control">
                @foreach($doctores as $doctore)
                <option value="{{$doctore->id}}">
                  {{$doctore->nombres." ".$doctore->apellidos."-".$doctore->especialidad}}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Fecha de reserva</label>
              <input type="date" id="fecha_reserva" value="{{ date('Y-m-d') }}" name="fecha_reserva" class="form-control">
              <script>
document.addEventListener('DOMContentLoaded', function(){
    const fechaReservaInput = document.getElementById('fecha_reserva');

    fechaReservaInput.addEventListener('change', function(){
        let selectedDate = this.value;
        // Obtenemos la fecha local actual (en formato YYYY-MM-DD)
        let today = new Date().toISOString().split('T')[0];

        if (selectedDate < today) {
            this.value = ''; // En los inputs de fecha es mejor usar string vacío
            alert('No se puede seleccionar una fecha pasada.');
        }
    });
});
</script>
            </div>
</div>
            <div class="col-md-12">
            <div class="form-group">
              <label for="">Hora de reserva</label>
              <input type="time" name="hora_reserva" id="hora_reserva" class="form-control">
              <script>
document.addEventListener('DOMContentLoaded', function() {
    const horaReservaInput = document.getElementById('hora_reserva');

    horaReservaInput.addEventListener('change', function() {
        let selectedTime = this.value; // Obtener el valor de la hora seleccionada

        // Asegurar que solo se capture la parte de la hora (redondear a hora en punto)
        if (selectedTime) {
            let parts = selectedTime.split(':'); // Dividir la cadena en horas y minutos
            selectedTime = parts[0] + ':00'; // Conservar solo la hora, ignorar los minutos
            this.value = selectedTime; // Establecer la hora modificada en el campo de entrada
        }

        // Verificar si la hora seleccionada está fuera del rango permitido (06:00 a 18:00)
        if (selectedTime < '06:00' || selectedTime > '17:00') {
            // Si es así, restablecer el campo
            this.value = ''; 
            alert('Por favor, seleccione una hora entre las 06:00 y las 17:00.');
        }
    });
});
</script>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>
                </div>
                <div id='calendar'></div>
            </div>
          </div>
</div>
</div>

<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:'es',
          events:[
            {
              title: '06:00-07:00 Odontologia',
              start: '2026-04-01',
              end: '2026-04-01',
              color: 'green'
            }
          ]
        });
        calendar.render();
      });

    </script>
@endsection