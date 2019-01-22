@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('cuestionarios.edit', $asignatura, $cuestionario) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Cuestionario</div>
  <div class="card-body">
    {!!Form::model($cuestionario,['route'=>['cuestionarios.update',$asignatura->id,$cuestionario->id],'method'=>'put'])!!}
    @include('cuestionarios.partials.form')
    {!!Form::close()!!}
  </div>
</div>
@endsection
