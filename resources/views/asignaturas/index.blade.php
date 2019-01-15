@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Asignaturas
          @can('asignaturas.create')
          <a href="{{route('asignaturas.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
          @endcan
        </div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th colspan="3">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach($asignaturas as $asignatura)
              <tr>
                <td>{{$asignatura->id}}</td>
                <td>{{$asignatura->nombre}}</td>
                <td>
                  @can('asignatura.show')
                  <a href="{{route('asignaturas.show',$asignatura->id)}}" class="btn btn-sm btn-default">Ver</a>
                  @endcan
                </td>
                <td>
                  @can('asignatura.edit')
                  <a href="{{route('asignaturas.edit',$asignatura->id)}}" class="btn btn-sm btn-default">Editar</a>
                  @endcan
                </td>
                <td>
                  @can('asignatura.destroy')
                  {!! Form::open(['route'=>['asignaturas.destroy',$asignatura->id],'method'=>'delete']) !!}
                  <button class="btn btn-sm btn-danger">Eliminar</button>
                  {!! Form::close() !!}
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$asignaturas->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
