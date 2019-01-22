@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('roles.create') }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Rol</div>
  <div class="card-body">
    {!!Form::open(['route'=>'roles.store'])!!}
    @include('roles.partials.form')
    {!!Form::close()!!}
  </div>
</div>
@endsection
