@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Paciente {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
              </div>
              <div class="card-body">
                <form action="{{url('/admin/pacientes',$paciente->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                <div class="row">
                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Nombres</label>
                      <p>{{$paciente->nombres}}</p>
                  </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Apellidos</label>
                      <p>{{$paciente->apellidos}}</p>
                  </div>
                  </div>
                  
                  <div class="col-md-2">
    <div class="form-group">
        <label for="tipo_documento">Tipo documento</label>
        <p>{{$paciente->tipo_documento}}</p>
    </div>
</div>

                <div class="col-md-3">
                    <div class="form group">
                      <label for="">Numero de documento</label>
                      <p>{{$paciente->numero_documento}}</p>
                  </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form group">
                      <label for="">Fecha de nacimiento</label>
                      <p>{{$paciente->fecha_nacimiento}}</p>
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form group">
                      <label for="">Género</label>
                      <p>
                        @if($paciente->genero=='M')Masculino @else Femenino @endif 
                      </p>
                  </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Celular</label>
                      <p>{{$paciente->celular}}</p>
                  </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form group">
                      <label for="">Correo</label>
                      <p>{{$paciente->correo}}</p>
                  </div>
                  </div>
                </div>
                  
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Direccíon</label>
                      <p>{{$paciente->direccion}}</p>
                  </div>
                 </div>

                  <div class="col-md-1">
                    <div class="form group">
                      <label for="">RH</label>
                      <p>{{$paciente->grupo_sanguineo}}</p>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Contacto de emergencias</label>
                      <p>{{$paciente->contacto_emergencia}}</p>
                  </div>
                  </div>
                  </div>
                  <br>
                  <div class="row">
                  <div class="col-md-12">
                    <div class="form group">
                      <label for="">Observaciones</label>
                      <p>{{$paciente->observaciones}}</p>
                  </div>
                  </div>
                </div>
                
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form group">
                      <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>
                      <button type="submit" class="btn btn-danger">Eliminar paciente</button>
                  </div>
                  </div>
                </div>
              </form>
              </div>
            </div>
</div>
</div>
@endsection