@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('cuestionarios.index', $asignatura) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    Cuestionarios
    @can('cuestionarios.create')
    <a href="{{route('cuestionarios.create',$asignatura->id)}}" class="btn btn-sm btn-primary float-right">Crear</a>
    @endcan
  </div>

  <div class="card-body table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Descripcion</th>
          <th>Intentos</th>
          <th>Fecha limite</th>
          <th>Estado</th>
          <th width="10px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cuestionarios as $cuestionario)
        <tr>
          <td>{{$cuestionario->descripcion}}</td>
          <td>{{$cuestionario->intentos}}</td>
          <td>{{$cuestionario->fecha_limite}}</td>
          <td>{{$cuestionario->estado}}</td>
          <td width="10px">
            <div class="dropdown">
              <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acciones
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @can('cuestionarios.show')
                <a href="{{route('cuestionarios.show',[$asignatura->id,$cuestionario->id])}}" class="dropdown-item">Ver</a>
                @endcan
                @can('preguntas.index')
                <a href="{{route('preguntas.index',$cuestionario->id)}}" class="dropdown-item">Ver preguntas</a>
                @endcan
                @can('cuestionarios.edit')
                <a href="{{route('cuestionarios.edit',[$asignatura->id,$cuestionario->id])}}" class="dropdown-item">Editar</a>
                @endcan
                @can('cuestionarios.destroy')
                {!! Form::open(['route'=>['cuestionarios.destroy',$asignatura->id,$cuestionario->id],'method'=>'delete']) !!}
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
    {{$cuestionarios->render()}}
  </div>
</div>
@endsection
