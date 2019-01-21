@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('preguntas.create', $cuestionario) }}
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Pregunta</div>
        <div class="card-body">
          {!!Form::open(['route'=>['preguntas.store',$cuestionario->id]])!!}
          @include('preguntas.partials.form')
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
