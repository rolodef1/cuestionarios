@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Opcion
          @can('opciones.create')
          <a href="{{route('opciones.create',$pregunta->id)}}" class="btn btn-sm btn-primary float-right">Crear</a>
          @endcan
        </div>
        <div class="card-body">
          <p><strong>Opcion</strong> {{$opcion->opcion}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
