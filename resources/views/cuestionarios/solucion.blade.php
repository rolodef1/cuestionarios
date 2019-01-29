@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('cuestionarios.solucion', $asignatura, $solucion->cuestionario, $solucion) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    Vista de solucion
    <span class="float-right">Nota: {{$solucion->nota}}/100</span>
  </div>
  <div class="card-body">
    @foreach($solucion->preguntas as $pregunta)
    <div class="card">
      <div class="card-header">
        {{$pregunta->pregunta}}
      </div>
      <div class="card-body">
        @foreach($pregunta->opciones as $opcion)
        @if($pregunta->tipo=='seleccion_unica')
        @php
        if($opcion->resp_correcta){
          $option_class = 'alert alert-success';
        }else{
          $option_class = 'alert alert-danger';
        }
        @endphp
        @endif
        @if($pregunta->tipo=='seleccion_multiple')
        @php
        if($opcion->resp_correcta==$opcion->resp_elegida){
          $option_class = 'alert alert-success';
        }else{
          $option_class = 'alert alert-danger';
        }
        @endphp
        @endif
        <div class="form-group {{$option_class}}">
          {{Form::label("respuestas[$pregunta->id]",$opcion->opcion)}}
          @if($pregunta->tipo=='seleccion_unica')
          {{Form::radio("respuestas[$pregunta->id]",$opcion->id,$opcion->resp_elegida,['disabled'=>true])}}
          @endif
          @if($pregunta->tipo=='seleccion_multiple')
          {{Form::checkbox("respuestas[$pregunta->id][]",$opcion->id,$opcion->resp_elegida,['disabled'=>true])}}
          @endif
        </div>
        @endforeach
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
@endsection
