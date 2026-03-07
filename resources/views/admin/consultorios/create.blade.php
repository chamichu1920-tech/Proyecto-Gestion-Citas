@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Registro de un nuevo consultorio</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
                <form action="{{url('/admin/consultorios/store')}}" method="POST">
                  @csrf
                <div class="row">
                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Nombre del consultorio</label><b>*</b>
                      <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                     @error('nombre')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Ubicacíon</label><b>*</b>
                      <input type="text" value="{{old('ubicacion')}}" name="ubicacion" class="form-control" required>
                     @error('ubicacion')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Capacidad</label>
                      <input type="text" value="{{old('capacidad')}}" name="capacidad" class="form-control">
                     @error('capacidad')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Telefono</label>
                      <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control">
                     @error('telefono')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Especialidad</label><b>*</b>
                      <input type="text" value="{{old('especialidad')}}" name="especialidad" class="form-control" required>
                     @error('especialidad')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>

                   <div class="col-md-3">
                    <div class="form group">
                      <label for="">Estado</label>
                      <select name="estado" id="" class="form-control">
                        <option value="activo">ACTIVO</option>
                        <option value="inactivo">INACTIVO </option>
                    </select>
                  </div>
                  </div>
                 </div>

                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form group">
                      <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                      <button type="submit" class="btn btn-primary">Registrar consultorio</button>
                  </div>
                  </div>
                </div>
               </form>
              </div>
            </div>
</div>
</div>
@endsection