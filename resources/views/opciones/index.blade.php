@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('opciones.index', $pregunta) }}
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
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
                <th>Id</th>
                <th>Opcion</th>
                <th colspan="3">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($opciones as $opcion)
              <tr>
                <td>{{$opcion->id}}</td>
                <td>{{$opcion->opcion}}</td>
                <td>
                  @can('opciones.show')
                  <a href="{{route('opciones.show',[$pregunta->id,$opcion->id])}}" class="btn btn-sm btn-default">Ver</a>
                  @endcan
                </td>
                <td>
                  @can('opciones.edit')
                  <a href="{{route('opciones.edit',[$pregunta->id,$opcion->id])}}" class="btn btn-sm btn-default">Editar</a>
                  @endcan
                </td>
                <td>
                  @can('opciones.destroy')
                  {!! Form::open(['route'=>['opciones.destroy',$pregunta->id,$opcion->id],'method'=>'delete']) !!}
                  <button class="btn btn-sm btn-danger">Eliminar</button>
                  {!! Form::close() !!}
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$opciones->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
