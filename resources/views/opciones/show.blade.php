@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('opciones.show', $pregunta, $opcion) }}
@endsection
@section('content')
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
@endsection
