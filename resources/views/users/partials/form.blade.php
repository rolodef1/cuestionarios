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
  {{Form::label('email','Email')}}
  {{Form::text('email',null,['class'=>$errors->has('email') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('email'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('email') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('cedula','Cedula')}}
  {{Form::text('cedula',null,['class'=>$errors->has('cedula') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('cedula'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('cedula') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('telefono','Telefono')}}
  {{Form::text('telefono',null,['class'=>$errors->has('telefono') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('telefono'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('telefono') }}</strong>
  </span>
  @endif
</div>
<div class="form-group">
  {{Form::label('ciudad','Ciudad')}}
  {{Form::text('ciudad',null,['class'=>$errors->has('ciudad') ? 'form-control is-invalid' : 'form-control'])}}
  @if ($errors->has('ciudad'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('ciudad') }}</strong>
  </span>
  @endif
</div>
<hr>
<h3>Lista de roles</h3>
<div class="form-group">
  <ul class="list-unstyled">
    @foreach($roles as $role)
    <li>
      <label>
        {{Form::checkbox('roles[]',$role->id,null)}}
        {{$role->name}}
        <em>({{$role->description?:'N/A'}})</em>
      </label>
    </li>
    @endforeach
  </ul>
</div>
<hr>
@if($user->esProfesor() || $user->esEstudiante())
<h3>Lista de asignaturas</h3>
<div class="form-group">
  <ul class="list-unstyled">
    @foreach($asignaturas as $asignatura)
    <li>
      <label>
        {{Form::checkbox('asignaturas[]',$asignatura->id,null)}}
        {{$asignatura->nombre}}
      </label>
    </li>
    @endforeach
  </ul>
</div>
@endif
<div class="form-group">
  {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
