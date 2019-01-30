<div class="form-group">
  {{Form::label('descripcion','Descripcion')}}
  {{Form::text('descripcion',null,['class'=>$errors->has('descripcion') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('descripcion'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('descripcion') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('intentos','Intentos')}}
  {{Form::number('intentos',null,['class'=>$errors->has('intentos') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('intentos'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('intentos') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('fecha_limite','Fecha limite')}}
  {{Form::date('fecha_limite',null,['class'=>$errors->has('fecha_limite') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('fecha_limite'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('fecha_limite') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('hora_limite','Hora limite')}}
  {{Form::time('hora_limite',null,['class'=>$errors->has('hora_limite') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('hora_limite'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('hora_limite') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('estado','Estado')}}
  {{Form::select('estado',['Activo' => 'Activo', 'Inactivo' => 'Inactivo'],null,['class'=>$errors->has('estado') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('estado'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('estado') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
