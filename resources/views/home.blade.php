@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('home') }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Bienvenido al sistema</div>
  <div class="card-body">
    <p>
      Este sistema esta destinado para la creacion de cuestionarios relacionados
      a diferentes asignaturas y que los estudiantes pueden resolver, el sistema califica de
      forma automatica sobre 100 puntos y permite rendir varios intentos de un mismo cuestionario si el profesor asi lo ha estipulado.
    </p>    
  </div>
</div>
@endsection
