@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('cuestionarios.show', $asignatura, $cuestionario) }}
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Cuestionario
          @can('cuestionarios.create')
          <a href="{{route('cuestionarios.create',$asignatura->id)}}" class="btn btn-sm btn-primary float-right">Crear</a>
          @endcan
        </div>
        <div class="card-body">
          <p><strong>Descripcion</strong> {{$cuestionario->descripcion}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
