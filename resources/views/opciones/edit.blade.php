@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('opciones.edit', $pregunta, $opcion) }}
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Opcion</div>
        <div class="card-body">
          {!!Form::model($opcion,['route'=>['opciones.update',$pregunta->id,$opcion->id],'method'=>'put'])!!}
          @include('opciones.partials.form')
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
