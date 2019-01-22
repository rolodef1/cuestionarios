@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('preguntas.show', $cuestionario, $pregunta) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    Pregunta
    @can('preguntas.create')
    <a href="{{route('preguntas.create',$cuestionario->id)}}" class="btn btn-sm btn-primary float-right">Crear</a>
    @endcan
  </div>
  <div class="card-body">
    <p><strong>Pregunta</strong> {{$pregunta->pregunta}}</p>
  </div>
</div>
@endsection
