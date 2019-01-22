@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('cuestionarios.create', $asignatura) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Cuestionario</div>
  <div class="card-body">
    {!!Form::open(['route'=>['cuestionarios.store',$asignatura->id]])!!}
    @include('cuestionarios.partials.form')
    {!!Form::close()!!}
  </div>
</div>
@endsection
