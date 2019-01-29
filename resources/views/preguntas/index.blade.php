@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('preguntas.index', $cuestionario) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    Preguntas
    @can('preguntas.create')
    <a href="{{route('preguntas.create',$cuestionario->id)}}" class="btn btn-sm btn-primary float-right">Crear</a>
    @endcan
  </div>
  <div class="card-body table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Pregunta</th>
          <th>Tipo</th>
          <th width="10px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($preguntas as $pregunta)
        <tr>
          <td>{{$pregunta->pregunta}}</td>
          <td>
            @if($pregunta->tipo=='seleccion_unica')
            Seleccion unica
            @endif
            @if($pregunta->tipo=='seleccion_multiple')
            Seleccion multiple
            @endif
          </td>
          <td width="10px">
            <div class="dropdown">
              <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acciones
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @can('opciones.index')
                <a href="{{route('opciones.index',$pregunta->id)}}" class="dropdown-item">Ver opciones</a>
                @endcan
                @can('preguntas.edit')
                <a href="{{route('preguntas.edit',[$cuestionario->id,$pregunta->id])}}" class="dropdown-item">Editar</a>
                @endcan
                @can('preguntas.destroy')
                {!! Form::open(['route'=>['preguntas.destroy',$cuestionario->id,$pregunta->id],'method'=>'delete']) !!}
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
    {{$preguntas->render()}}
  </div>
</div>
@endsection
