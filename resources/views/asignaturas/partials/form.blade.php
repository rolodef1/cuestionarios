<div class="form-group">
  {{Form::label('nombre','Nombre')}}
  {{Form::text('nombre',null,['class'=>$errors->has('nombre') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('nombre'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('nombre') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
