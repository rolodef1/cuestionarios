<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
  $trail->push('Inicio', route('home'));
});

//Roles
Breadcrumbs::for('roles.index', function ($trail) {
  $trail->parent('home');
  $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('roles.create', function ($trail) {
  $trail->parent('roles.index');
  $trail->push('Creacion de rol', route('roles.create'));
});

Breadcrumbs::for('roles.show', function ($trail, $role) {
  $trail->parent('roles.index');
  $trail->push('Vista de rol: '.$role->name, route('roles.show',$role));
});

Breadcrumbs::for('roles.edit', function ($trail, $role) {
  $trail->parent('roles.index');
  $trail->push('Edicion de rol: '.$role->name, route('roles.edit',$role));
});

//Usuarios
Breadcrumbs::for('users.index', function ($trail) {
  $trail->parent('home');
  $trail->push('Usuarios', route('users.index'));
});

Breadcrumbs::for('users.create', function ($trail) {
  $trail->parent('users.index');
  $trail->push('Creacion de usuario', route('users.create'));
});

Breadcrumbs::for('users.show', function ($trail, $user) {
  $trail->parent('users.index');
  $trail->push('Vista de usuario: '.$user->name, route('users.show',$user));
});

Breadcrumbs::for('users.edit', function ($trail, $user) {
  $trail->parent('users.index');
  $trail->push('Edicion de usuario: '.$user->name, route('users.edit',$user));
});

//Asignaturas
Breadcrumbs::for('asignaturas.index', function ($trail, $asignatura = null) {
  $trail->parent('home');
  if(!$asignatura){
    $trail->push('Asignaturas', route('asignaturas.index'));
  }else{
    $trail->push('Asignatura: '.$asignatura->nombre, route('asignaturas.index'));
  }
});

Breadcrumbs::for('asignaturas.create', function ($trail) {
  $trail->parent('asignaturas.index');
  $trail->push('Creacion de asignatura', route('asignaturas.create'));
});

Breadcrumbs::for('asignaturas.edit', function ($trail, $asignatura) {
  $trail->parent('asignaturas.index');
  $trail->push('Edicion de asignatura: '.$asignatura->nombre, route('asignaturas.edit',$asignatura));
});

//Cuestionarios
Breadcrumbs::for('cuestionarios.index', function ($trail, $asignatura, $cuestionario = null) {
  $trail->parent('asignaturas.index',$asignatura);
  if(!$cuestionario){
    $trail->push('Cuestionarios', route('cuestionarios.index',$asignatura));
  }else{
    $trail->push('Cuestionario: '.$cuestionario->id, route('cuestionarios.index',$asignatura));
  }
});

Breadcrumbs::for('cuestionarios.create', function ($trail, $asignatura) {
  $trail->parent('cuestionarios.index',$asignatura);
  $trail->push('Creacion de cuestionario', route('cuestionarios.create',$asignatura));
});

Breadcrumbs::for('cuestionarios.show', function ($trail, $asignatura, $cuestionario) {
  $trail->parent('cuestionarios.index',$asignatura);
  $trail->push('Vista de cuestionario: '.$cuestionario->descripcion, route('cuestionarios.show',[$asignatura,$cuestionario]));
});

Breadcrumbs::for('cuestionarios.edit', function ($trail, $asignatura, $cuestionario) {
  $trail->parent('cuestionarios.index',$asignatura);
  $trail->push('Edicion de cuestionario: '.$cuestionario->descripcion, route('cuestionarios.edit',[$asignatura,$cuestionario]));
});

Breadcrumbs::for('cuestionarios.rendir', function ($trail, $asignatura, $cuestionario) {
  $trail->parent('cuestionarios.index',$asignatura);
  $trail->push('Rendir cuestionario: '.$cuestionario->descripcion, route('cuestionarios.rendir',[$asignatura,$cuestionario]));
});

Breadcrumbs::for('cuestionarios.solucion', function ($trail, $asignatura, $cuestionario, $solucion) {
  $trail->parent('cuestionarios.show',$asignatura, $cuestionario);
  $trail->push('Vista de solucion', route('cuestionarios.solucion',[$asignatura,$solucion]));
});

//Preguntas
Breadcrumbs::for('preguntas.index', function ($trail, $cuestionario, $pregunta = null) {
  $trail->parent('cuestionarios.index',$cuestionario->asignatura, $cuestionario);
  if(!$pregunta){
    $trail->push('Preguntas', route('preguntas.index',$cuestionario));
  }else{
    $trail->push('Pregunta: '.$pregunta->id, route('preguntas.index',$cuestionario));
  }
});

Breadcrumbs::for('preguntas.create', function ($trail, $cuestionario) {
  $trail->parent('preguntas.index',$cuestionario);
  $trail->push('Creacion de pregunta', route('preguntas.create',$cuestionario));
});

Breadcrumbs::for('preguntas.show', function ($trail, $cuestionario, $pregunta) {
  $trail->parent('preguntas.index',$cuestionario);
  $trail->push('Vista de pregunta: '.$pregunta->id, route('preguntas.show',[$cuestionario,$pregunta]));
});

Breadcrumbs::for('preguntas.edit', function ($trail, $cuestionario, $pregunta) {
  $trail->parent('preguntas.index',$cuestionario);
  $trail->push('Edicion de pregunta: '.$pregunta->id, route('preguntas.edit',[$cuestionario,$pregunta]));
});

//Opciones
Breadcrumbs::for('opciones.index', function ($trail, $pregunta) {
  $trail->parent('preguntas.index',$pregunta->cuestionario, $pregunta);
  $trail->push('Opciones', route('opciones.index',$pregunta));
});

Breadcrumbs::for('opciones.create', function ($trail, $pregunta) {
  $trail->parent('opciones.index',$pregunta);
  $trail->push('Creacion de opcion', route('opciones.create',$pregunta));
});

Breadcrumbs::for('opciones.show', function ($trail, $pregunta, $opcion) {
  $trail->parent('opciones.index',$pregunta);
  $trail->push('Vista de opcion: '.$opcion->id, route('opciones.show',[$pregunta,$opcion]));
});

Breadcrumbs::for('opciones.edit', function ($trail, $pregunta, $opcion) {
  $trail->parent('opciones.index',$pregunta);
  $trail->push('Edicion de opcion: '.$opcion->id, route('opciones.edit',[$pregunta,$opcion]));
});
