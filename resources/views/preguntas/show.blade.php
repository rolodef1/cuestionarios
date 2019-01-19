@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
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
    </div>
  </div>
</div>
@endsection
