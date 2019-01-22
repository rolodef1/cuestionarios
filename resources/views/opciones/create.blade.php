@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('opciones.create', $pregunta) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Opcion</div>
  <div class="card-body">
    {!!Form::open(['route'=>['opciones.store',$pregunta->id]])!!}
    @include('opciones.partials.form')
    {!!Form::close()!!}
  </div>
</div>
@endsection
