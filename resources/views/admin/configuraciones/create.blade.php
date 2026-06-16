@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Registro de una nueva configuración</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
                <form action="{{url('/admin/configuraciones/store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-6">
                    <div class="form group">
                      <label for="">Nombre del hospital/clinica</label><b>*</b>
                      <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                     @error('nombre')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Dirección</label><b>*</b>
                      <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                     @error('direccion')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                  <br>
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Telefono</label><b>*</b>
                      <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control" required>
                     @error('telefono')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Correo</label><b>*</b>
                      <input type="email" value="{{old('correo')}}" name="correo" class="form-control" required>
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
                      </div>
                    </div>
                  </div>
                
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form group">
                      <a href="{{url('admin/configuraciones')}}" class="btn btn-secondary">Cancelar</a>
                      <button type="submit" class="btn btn-primary">Registrar nuevo</button>
                  </div>
                  </div>
                </div>
               </form>
              </div>
            </div>
</div>
</div>
@endsection