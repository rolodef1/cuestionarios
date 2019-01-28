<div class="form-group">
  {{Form::label('descripcion','Descripcion')}}
  {{Form::text('descripcion',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::label('intentos','Intentos')}}
  {{Form::number('intentos',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::label('fecha_limite','Fecha limite')}}
  {{Form::date('fecha_limite',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::label('hora_limite','Hora limite')}}
  {{Form::time('hora_limite',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::label('estado','Estado')}}
  {{Form::select('estado',['Activo' => 'Activo', 'Inactivo' => 'Inactivo'],null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
