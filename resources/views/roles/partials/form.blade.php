<div class="form-group">
  {{Form::label('name','Nombre')}}
  {{Form::text('name',null,['class'=>$errors->has('name') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('name'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('name') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('slug','Url amigable')}}
  {{Form::text('slug',null,['class'=>$errors->has('slug') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('slug'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('slug') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('description','Descripcion')}}
  {{Form::textarea('description',null,['class'=>$errors->has('description') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('description'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('description') }}</strong>
  </span>
  @endif
</div>
<hr>
<h3>Permiso especial</h3>
<div class="form-group">
  <label>{{Form::radio('special','all-access')}} Acceso total</label>
  <label>{{Form::radio('special','no-access')}} Ningun acceso</label>
</div>
<h3>Lista de permisos</h3>
<div class="form-group">
  <ul class="list-unstyled">
    @foreach($permissions as $permission)
    <li>
      <label>
        {{Form::checkbox('permissions[]',$permission->id,null)}}
        {{$permission->name}}
        <em>({{$permission->description?:'N/A'}})</em>
      </label>
    </li>
    @endforeach
  </ul>
</div>
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
