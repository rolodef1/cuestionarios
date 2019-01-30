<div class="form-group">
  {{Form::label('pregunta','Pregunta')}}
  {{Form::text('pregunta',null,['class'=>$errors->has('pregunta') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('pregunta'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('pregunta') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('tipo','Tipo')}}
  {{Form::select('tipo',['seleccion_unica' => 'Seleccion unica', 'seleccion_multiple' => 'Seleccion multiple'],null,['class'=>$errors->has('tipo') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('tipo'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('tipo') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
