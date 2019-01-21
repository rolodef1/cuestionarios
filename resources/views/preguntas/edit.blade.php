@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('preguntas.edit', $cuestionario, $pregunta) }}
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Pregunta</div>
        <div class="card-body">
          {!!Form::model($pregunta,['route'=>['preguntas.update',$cuestionario->id,$pregunta->id],'method'=>'put'])!!}
          @include('preguntas.partials.form')
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
