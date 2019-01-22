@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('asignaturas.show', $asignatura) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Asignatura: {{$asignatura->nombre}}</div>
  <div class="card-body">
    <p><strong>Nombre</strong> {{$asignatura->nombre}}</p>
  </div>
</div>
@endsection
