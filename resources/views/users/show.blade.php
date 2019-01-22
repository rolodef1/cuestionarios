@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('users.show', $user) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Usuario</div>
  <div class="card-body">
    <p><strong>Nombre</strong> {{$user->name}}</p>
    <p><strong>Email</strong> {{$user->email}}</p>
  </div>
</div>
@endsection
