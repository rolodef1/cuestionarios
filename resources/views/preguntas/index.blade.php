@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('preguntas.index', $cuestionario) }}
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
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
                <th>Id</th>
                <th>Pregunta</th>
                <th colspan="3">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($preguntas as $pregunta)
              <tr>
                <td>{{$pregunta->id}}</td>
                <td>{{$pregunta->pregunta}}</td>
                <td>
                  @can('opciones.index')
                  <a href="{{route('opciones.index',$pregunta->id)}}" class="btn btn-sm btn-default">Opciones</a>
                  @endcan
                </td>
                <td>
                  @can('preguntas.edit')
                  <a href="{{route('preguntas.edit',[$cuestionario->id,$pregunta->id])}}" class="btn btn-sm btn-default">Editar</a>
                  @endcan
                </td>
                <td>
                  @can('preguntas.destroy')
                  {!! Form::open(['route'=>['preguntas.destroy',$cuestionario->id,$pregunta->id],'method'=>'delete']) !!}
                  <button class="btn btn-sm btn-danger">Eliminar</button>
                  {!! Form::close() !!}
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$preguntas->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
