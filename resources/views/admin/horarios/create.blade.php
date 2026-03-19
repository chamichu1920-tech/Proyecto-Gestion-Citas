@extends('layouts.admin')

@section('content')
<div class="row">
    <h1>Registro de un nuevo horario</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Columna del Formulario -->
                    <div class="col-md-3">
                        <form action="{{url('/admin/horarios/store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="consultorio_id">Consultorios</label><b>*</b>
                                <!-- Cambié el ID a consultorio_select para que coincida con el script -->
                                <select name="consultorio_id" id="consultorio_select" class="form-control" required>
                                    <option value="">Seleccionar consultorio...</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{$consultorio->id}}">
                                            {{$consultorio->nombre . " - " . $consultorio->ubicacion}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="doctor_id">Doctores</label><b>*</b>
                                <select name="doctor_id" id="doctor_id" class="form-control" required>
                                    @foreach($doctores as $doctore)
                                        <option value="{{$doctore->id}}">
                                            {{$doctore->nombres . " " . $doctore->apellidos . " - " . $doctore->especialidad}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="dia">Día</label><b>*</b>
                                <select name="dia" id="dia" class="form-control" required>
                                    <option value="LUNES">LUNES</option>
                                    <option value="MARTES">MARTES</option>
                                    <option value="MIERCOLES">MIERCOLES</option>
                                    <option value="JUEVES">JUEVES</option>
                                    <option value="VIERNES">VIERNES</option>
                                    <option value="SABADO">SABADO</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="hora_inicio">Hora inicio</label><b>*</b>
                                <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" id="hora_inicio" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="hora_fin">Hora final</label><b>*</b>
                                <input type="time" value="{{old('hora_fin')}}" name="hora_fin" id="hora_fin" class="form-control" required>
                            </div>

                            <hr>
                            <div class="form-group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>

                    <!-- Columna del Calendario (Dinámico) -->
                    <div class="col-md-9">
                        <div id="consultorio_info">
                            <p class="text-muted text-center">Seleccione un consultorio para ver su disponibilidad.</p>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
    </div> 
</div>

<!-- Scripts al final -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script>
    $('#consultorio_select').on('change', function () {
        var consultorio_id = $(this).val();  
        var url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}";
        url = url.replace(':id', consultorio_id);

        if (consultorio_id) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    $('#consultorio_info').html(data);
                },
                error: function () {
                    alert('Error al obtener los datos del consultorio');
                }
            });
        } else {
            $('#consultorio_info').html('<p class="text-muted text-center">Seleccione un consultorio para ver su disponibilidad.</p>');
        }
    });
</script>
@endsection