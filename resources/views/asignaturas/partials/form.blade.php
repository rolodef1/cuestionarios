<div class="form-group">
  {{Form::label('nombre','Nombre')}}
  {{Form::text('nombre',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
