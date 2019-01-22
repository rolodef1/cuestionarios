@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('asignaturas.edit', $asignatura) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Asignatura</div>
  <div class="card-body">
    {!!Form::model($asignatura,['route'=>['asignaturas.update',$asignatura->id],'method'=>'put'])!!}
    @include('asignaturas.partials.form')
    {!!Form::close()!!}
  </div>
</div>
@endsection
