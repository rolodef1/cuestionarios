<div class="form-group">
  {{Form::label('opcion','Opcion')}}
  {{Form::text('opcion',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::label('resp_correcta','Respuesta correcta')}}
  {{Form::select('resp_correcta',[true => 'Si', false => 'No'],null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
