@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
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
                <th colspan="3">Acciones</th>
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
                </td>
                <td>
                  @can('cuestionarios.edit')
                  <a href="{{route('cuestionarios.edit',[$asignatura->id,$cuestionario->id])}}" class="btn btn-sm btn-default">Editar</a>
                  @endcan
                </td>
                <td>
                  @can('cuestionarios.destroy')
                  {!! Form::open(['route'=>['cuestionarios.destroy',$asignatura->id,$cuestionario->id],'method'=>'delete']) !!}
                  <button class="btn btn-sm btn-danger">Eliminar</button>
                  {!! Form::close() !!}
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$cuestionarios->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
