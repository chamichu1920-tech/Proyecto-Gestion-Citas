@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Registro de un nuevo paciente</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
                <form action="{{url('/admin/pacientes/store')}}" method="POST">
                  @csrf
                <div class="row">
                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Nombres</label><b>*</b>
                      <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                     @error('nombres')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Apellidos</label><b>*</b>
                      <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control" required>
                     @error('apellidos')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                  
                  <div class="col-md-2">
    <div class="form-group">
        <label for="tipo_documento">Tipo documento</label><b>*</b>
        <select name="tipo_documento" class="form-control" required>
            <option value="CC">Cédula de Ciudadanía</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="CE">Cédula de Extranjería</option>
            <option value="PASAPORTE">Pasaporte</option>
            <option value="RC">Registro Civil</option>
        </select>
        @error('tipo_documento')
            <small style="color:red">{{$message}}</small>
        @enderror
    </div>
</div>

                <div class="col-md-3">
                    <div class="form group">
                      <label for="">Numero de documento</label><b>*</b>
                      <input type="text" value="{{old('numero_documento')}}" name="numero_documento" class="form-control" required>
                     @error('numero_documento')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form group">
                      <label for="">Fecha de nacimiento</label><b>*</b>
                      <input type="date" value="{{old('fecha_nacimiento')}}" name="fecha_nacimiento" class="form-control" required>
                     @error('fecha_nacimiento')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form group">
                      <label for="">Género</label>
                      <select name="genero" id="" class="form-control">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO </option>
                    </select>
                  </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Celular</label><b>*</b>
                      <input type="number" value="{{old('celular')}}" name="celular" class="form-control" required>
                     @error('celular')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form group">
                      <label for="">Correo</label><b>*</b>
                      <input type="email" value="{{old('correo')}}" name="correo" class="form-control" required>
                     @error('correo')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                </div>
                  
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form group">
                      <label for="">Direccíon</label><b>*</b>
                      <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                     @error('direccion')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                 </div>

                  <div class="col-md-1">
                    <div class="form group">
                      <label for="">RH</label><b>*</b>
                      <select name="grupo_sanguineo" id="" class="form-control">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form group">
                      <label for="">Contacto de emergencias</label><b>*</b>
                      <input type="number" value="{{old('contacto_emergencia')}}" name="contacto_emergencia" class="form-control" required>
                     @error('contacto_emergencia')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                  </div>
                  <br>
                  <div class="row">
                  <div class="col-md-12">
                    <div class="form group">
                      <label for="">Observaciones</label>
                      <input type="text" value="{{old('observaciones')}}" name="observaciones" class="form-control">
                     @error('observaciones')
                        <small style="color:red">{{$message}}</small>
                      @enderror
                  </div>
                  </div>
                </div>
                
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form group">
                      <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                      <button type="submit" class="btn btn-primary">Registrar paciente</button>
                  </div>
                  </div>
                </div>
               </form>
              </div>
            </div>
</div>
</div>
@endsection