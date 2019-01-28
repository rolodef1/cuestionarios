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
          <th>Id</th>
          <th>Descripcion</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cuestionarios as $cuestionario)
        <tr>
          <td>{{$cuestionario->id}}</td>
          <td>{{$cuestionario->descripcion}}</td>
          <td>
            @can('preguntas.index')
            <a href="{{route('preguntas.index',$cuestionario->id)}}" class="btn btn-sm btn-default">Preguntas</a>
            @endcan
            @can('cuestionarios.edit')
            <a href="{{route('cuestionarios.edit',[$asignatura->id,$cuestionario->id])}}" class="btn btn-sm btn-default">Editar</a>
            @endcan
            @can('cuestionarios.destroy')
            {!! Form::open(['route'=>['cuestionarios.destroy',$asignatura->id,$cuestionario->id],'method'=>'delete']) !!}
            <button class="btn btn-sm btn-danger">Eliminar</button>
            {!! Form::close() !!}
            @endcan
            @can('cuestionarios.show')
            <a href="{{route('cuestionarios.show',[$asignatura->id,$cuestionario->id])}}" class="btn btn-sm btn-default">Ver</a>
            @endcan
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$cuestionarios->render()}}
  </div>
</div>
@endsection
