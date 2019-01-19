<div class="form-group">
  {{Form::label('pregunta','Pregunta')}}
  {{Form::text('pregunta',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::label('tipo','Tipo')}}
  {{Form::select('tipo',['seleccion_unica' => 'Seleccion unica', 'seleccion_multiple' => 'Seleccion multiple'],null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
