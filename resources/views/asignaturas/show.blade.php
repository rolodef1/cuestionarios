@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Asignatura</div>        
        <div class="card-body">
          <p><strong>Nombre</strong> {{$asignatura->nombre}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
