@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('asignaturas.index') }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    Asignaturas
    @can('asignaturas.create')
    <a href="{{route('asignaturas.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
    @endcan
  </div>

  <div class="card-body table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th width="10px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($asignaturas as $asignatura)
        <tr>
          <td>{{$asignatura->id}}</td>
          <td>{{$asignatura->nombre}}</td>
          <td width="10px">
            <div class="dropdown">
              <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acciones
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @can('cuestionarios.index')
                <a href="{{route('cuestionarios.index',$asignatura->id)}}" class="dropdown-item">Ver cuestionarios</a>
                @endcan
                @can('asignaturas.edit')
                <a href="{{route('asignaturas.edit',$asignatura->id)}}" class="dropdown-item">Editar</a>
                @endcan
                @can('asignaturas.destroy')
                {!! Form::open(['route'=>['asignaturas.destroy',$asignatura->id],'method'=>'delete']) !!}
                <button class="dropdown-item">Eliminar</button>
                {!! Form::close() !!}
                @endcan
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$asignaturas->render()}}
  </div>
</div>
@endsection
