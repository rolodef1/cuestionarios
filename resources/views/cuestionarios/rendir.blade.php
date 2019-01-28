@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('cuestionarios.rendir', $asignatura, $solucion->cuestionario) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Rendir cuestionario</div>
  <div class="card-body">
    {!!Form::open(['route'=>['cuestionarios.rendirSave',$asignatura->id,$solucion->id]])!!}
    @foreach($solucion->preguntas as $pregunta)
    <div class="card">
      <div class="card-header">
        {{$pregunta->pregunta}}
      </div>
      <div class="card-body">
        @foreach($pregunta->opciones as $opcion)
        <div class="form-group">
          {{Form::label("respuestas[$pregunta->id]",$opcion->opcion)}}
          @if($pregunta->tipo=='seleccion_unica')
          {{Form::radio("respuestas[$pregunta->id]",$opcion->id,false)}}
          @endif
          @if($pregunta->tipo=='seleccion_multiple')
          {{Form::checkbox("respuestas[$pregunta->id][]",$opcion->id,false)}}
          @endif
        </div>
        @endforeach
      </div>
    </div>
    @endforeach
    <div class="form-group">
      {{Form::submit('Enviar solución',['class'=>'btn btn-sm btn-primary'])}}
    </div>
  </div>
  {!!Form::close()!!}
</div>
</div>
@endsection
