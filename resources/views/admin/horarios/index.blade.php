@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Listado de horarios</h1>
</div>

<hr>

<div class="row">
  <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Horarios registrados</h3>

                <div class="card-tools">
                  <a href="{{ url('admin/horarios/create') }}" class="btn btn-primary">
                    Registrar nuevo
                  </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
  <thead style="background-color: #c0c0c0">
    <tr>
      <td style="text-align: center"><b>Nro</b></td>
      <td style="text-align: center"><b>Doctor</b></td>
      <td style="text-align: center"><b>Consultorio</b></td>
      <td style="text-align: center"><b>Especialidad</b></td>
      <td style="text-align: center"><b>Día de atención</b></td>
      <td style="text-align: center"><b>Hora inicio</b></td>
      <td style="text-align: center"><b>Hora fin</b></td>
      <td style="text-align: center"><b>Acciones</b></td>
    </tr>
  </thead>
  <tbody>
    <?php $contador = 1; ?>
      @foreach($horarios as $horario)
  <tr>
  <td style="text-align: center">{{$contador++}}</td>
  <td>{{$horario->doctor->nombres."".$horario->doctor->apellidos}}</td>
  <td>{{$horario->consultorio->nombre." Ubicacíon: ".$horario->consultorio->ubicacion}}</td>
  <td>{{$horario->doctor->especialidad}}</td>
  <td>{{$horario->dia}}</td>
  <td>{{$horario->hora_inicio}}</td>
  <td>{{$horario->hora_fin}}</td>
  <td style="text-align: center">
  <div class="btn-group" role="group" aria-label="Basic example">
  <a href="{{ url('admin/horarios/'.$horario->id)}}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
  <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
  <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
</div>  
</td>
</tr>
  @endforeach
  </tbody>
</table>
<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                // Agregamos guiones bajos a las variables: _START_, _END_ y _TOTAL_
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                // Agregamos guiones bajos a _MAX_
                "infoFiltered": "(Filtrado de _MAX_ total Horarios)",
                "infoPostFix": "",
                "thousands": ",",
                // Agregamos guiones bajos a _MENU_
                "lengthMenu": "Mostrar _MENU_ Horarios",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, 
            "lengthChange": true, 
            "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [
                    { text: 'Copiar', extend: 'copy' }, 
                    { extend: 'pdf' }, 
                    { extend: 'csv' }, 
                    { extend: 'excel' }, 
                    { text: 'Imprimir', extend: 'print' }
                ]
            }, {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayout: 'fixed three-column'
            }],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

              </div>
            </div>
          </div>
</diV>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <dv class="card-header">
                <h3 class="card-tittle">Calendario de atención de doctores</h3>
              </dv>
              <div class="card-body">
                <table style="font-size: 15px" class="table table-striped table-hover table-sm table-bordered">
                  <thead>
                    <tr>
                      <th>Hora</th>
                      <th>Lunes</th>
                      <th>Martes</th>
                      <th>Miercoles</th>
                      <th>Jueves</th>
                      <th>Viernes</th>
                      <th>Sabado</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $horas = ['06:00:00 - 07:00:00','07:00:00 - 08:00:00','08:00:00 - 09:00:00','09:00:00 - 10:00:00','10:00:00 - 11:00:00','11:00:00 - 12:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00'];
                    $diaSemana = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO'];
                    @endphp
                    @foreach ($horas as $hora)
                    @php
                    list($hora_inicio,$hora_fin) = explode(' - ', $hora);
                    @endphp
                    <tr>
                    <td>{{$hora}}</td>
                    @foreach ($diaSemana as $dia)
                    @php
                    $nombre_doctor = '';
                    foreach ($horarios as $horario) {
                      if(strtoupper($horario->dia) == $dia &&
                      $hora_inicio >= $horario->hora_inicio &&
                      $hora_fin <= $horario->hora_fin){
                      $nombre_doctor = $horario->doctor->nombres."".$horario->doctor->apellidos;
                      break;
                      }
                    }
                    @endphp
                    <td>{{$nombre_doctor}}</td>
                    @endforeach
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>
@endsection