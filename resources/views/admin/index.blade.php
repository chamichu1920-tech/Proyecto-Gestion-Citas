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
@endsection