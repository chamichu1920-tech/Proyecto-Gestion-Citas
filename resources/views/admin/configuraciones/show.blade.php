@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Datos de la configuración</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-6">
                    <div class="form group">
                      <label for="">Nombre del hospital/clinica</label>
                      <p>{{$configuracion->nombre}}</p>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Dirección</label>
                      <p>{{$configuracion->direccion}}</p>
                  </div>
                  </div>
                  <br>
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Telefono</label>
                      <p>{{$configuracion->telefono}}</p>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Correo</label>
                      <p>{{$configuracion->correo}}</p>
                  </div>
                  </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Logotipo</label>
                        <center>
                            <img src="{{asset('storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                        </center>
                      </div>
                    </div>
                  </div>
                
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form group">
                      <a href="{{url('admin/configuraciones')}}" class="btn btn-secondary">Volver</a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>
@endsection