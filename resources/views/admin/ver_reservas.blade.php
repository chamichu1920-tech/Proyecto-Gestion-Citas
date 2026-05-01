@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Listado de reservas</h1>
</div>

<hr>

<div class="row">
  <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Reservas registradas</h3>

                <div class="card-tools">
                  <a href="{{ url('admin/consultorios/create') }}" class="btn btn-primary">
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
      <td style="text-align: center"><b>Especialidad</b></td>
      <td style="text-align: center"><b>Fecha de reserva</b></td>
      <td style="text-align: center"><b>Hora de reserva</b></td>
      <td style="text-align: center"><b>Fecha y hora de registro</b></td>
      <td style="text-align: center"><b>Acciones</b></td>
    </tr>
  </thead>
  <tbody>
    <?php $contador = 1; ?>
      @foreach($eventos as $evento)
  <tr>
  <td style="text-align: center">{{$contador++}}</td>
  <td>{{$evento->doctor->nombres." ".$evento->doctor->apellidos}}</td>
  <td style="text-align: center">{{$evento->doctor->especialidad}}</td>
<td style="text-align: center">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
<td style="text-align: center">{{\Carbon\Carbon::parse($evento->start)->format('H:i')}}</td>
<td style="text-align: center">{{$evento->created_at}}</td>
  <td style="text-align: center">
  <div class="btn-group" role="group" aria-label="Basic example">
  <form action="{{ url('/admin/eventos/destroy', $evento->id) }}" method="POST" id="formulario{{$evento->id}}">
    @csrf
    @method('DELETE') 
    <button type="button" class="btn btn-danger btn-sm" onclick="preguntar{{$evento->id}}(event)">
        <i class="bi bi-trash"></i>
    </button>
</form>

<script>
    function preguntar{{$evento->id}}(event) {
        event.preventDefault();
        
        Swal.fire({
            title: "¿Estás seguro de eliminar este registro de reserva?",
            text: "Si elimina este registro, otro usuario podrá reservar en este mismo horario.",
            icon: "question",
            showDenyButton: true,
            confirmButtonText: "Eliminar",
            denyButtonText: "Cancelar",
            confirmButtonColor: '#d33', // Opcional: poner el botón de eliminar en rojo
            denyButtonColor: '#3085d6'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ahora sí seleccionamos el FORMULARIO por su ID
                document.getElementById('formulario{{$evento->id}}').submit();
            }
        });
    }
</script>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                // Agregamos guiones bajos a _MAX_
                "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                "infoPostFix": "",
                "thousands": ",",
                // Agregamos guiones bajos a _MENU_
                "lengthMenu": "Mostrar _MENU_ Reservas",
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
</div>
@endsection