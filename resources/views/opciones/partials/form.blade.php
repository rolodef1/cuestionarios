<div class="form-group">
  {{Form::label('opcion','Opcion')}}
  {{Form::text('opcion',null,['class'=>$errors->has('opcion') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('opcion'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('opcion') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('resp_correcta','Respuesta correcta')}}
  @php
  $opciones_resp_correcta = $resp_correcta_seleccionada?[false => 'No']:[true => 'Si', false => 'No'];
  @endphp
  {{Form::select('resp_correcta',$opciones_resp_correcta,null,['class'=>$errors->has('resp_correcta') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('resp_correcta'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('resp_correcta') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
