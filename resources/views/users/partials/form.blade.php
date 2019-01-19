<div class="form-group">
  {{Form::label('name','Nombre')}}
  {{Form::text('name',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
  {{Form::label('email','Email')}}
  {{Form::text('email',null,['class'=>'form-control'])}}
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
