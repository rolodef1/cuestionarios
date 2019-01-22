@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('preguntas.edit', $cuestionario, $pregunta) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Pregunta</div>
  <div class="card-body">
    {!!Form::model($pregunta,['route'=>['preguntas.update',$cuestionario->id,$pregunta->id],'method'=>'put'])!!}
    @include('preguntas.partials.form')
    {!!Form::close()!!}
  </div>
</div>
@endsection
