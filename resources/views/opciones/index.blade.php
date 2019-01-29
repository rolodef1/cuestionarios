@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('opciones.index', $pregunta) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    Opciones
    @can('opciones.create')
    <a href="{{route('opciones.create',$pregunta->id)}}" class="btn btn-sm btn-primary float-right">Crear</a>
    @endcan
  </div>

  <div class="card-body table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Opcion</th>
          <th>Respuesta correcta</th>
          <th width="10px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($opciones as $opcion)
        <tr>
          <td>{{$opcion->opcion}}</td>
          <td>{{$opcion->resp_correcta?'Si':'No'}}</td>
          <td width="10px">
            <div class="dropdown">
              <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acciones
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @can('opciones.show')
                <a href="{{route('opciones.show',[$pregunta->id,$opcion->id])}}" class="dropdown-item">Ver</a>
                @endcan
                @can('opciones.edit')
                <a href="{{route('opciones.edit',[$pregunta->id,$opcion->id])}}" class="dropdown-item">Editar</a>
                @endcan
                @can('opciones.destroy')
                {!! Form::open(['route'=>['opciones.destroy',$pregunta->id,$opcion->id],'method'=>'delete']) !!}
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
    {{$opciones->render()}}
  </div>
</div>
@endsection
