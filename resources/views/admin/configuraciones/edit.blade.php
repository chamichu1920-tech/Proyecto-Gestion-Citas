@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Modificar configuración</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
                <form action="{{url('/admin/configuraciones',$configuracion->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-6">
                    <div class="form group">
                      <label for="">Nombre del hospital/clinica</label><b>*</b>
                      <input type="text" value="{{$configuracion->nombre}}" name="nombre" class="form-control" required>
                     @error('nombre')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Dirección</label><b>*</b>
                      <input type="address" value="{{$configuracion->direccion}}" name="direccion" class="form-control" required>
                     @error('direccion')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                  <br>
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Telefono</label><b>*</b>
                      <input type="text" value="{{$configuracion->telefono}}" name="telefono" class="form-control" required>
                     @error('telefono')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Correo</label><b>*</b>
                      <input type="email" value="{{$configuracion->correo}}" name="correo" class="form-control" required>
                     @error('correo')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Logotipo</label><b>*</b>
                        <input type="file" name="logo" class="form-control">
                        <center>
                            <output id="list">
                                <img src="{{asset('storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                            </output>
                        </center>
                      </div>
                    </div>
                  </div>
                
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form group">
                      <a href="{{url('admin/configuraciones')}}" class="btn btn-secondary">Cancelar</a>
                      <button type="submit" class="btn btn-success">Actualizar</button>
                  </div>
                  </div>
                </div>
               </form>
              </div>
            </div>
</div>
</div>
@endsection