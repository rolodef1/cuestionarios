@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('asignaturas.create') }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Asignatura</div>
  <div class="card-body">
    {!!Form::open(['route'=>'asignaturas.store'])!!}
    @include('asignaturas.partials.form')
    {!!Form::close()!!}
  </div>
</div>
@endsection
