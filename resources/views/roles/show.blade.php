@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('roles.show', $role) }}
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Rol</div>
        <div class="card-body">
          <p><strong>Nombre</strong> {{$role->name}}</p>
          <p><strong>Slug</strong> {{$role->slug}}</p>
          <p><strong>Descripcion</strong> {{$role->description}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
