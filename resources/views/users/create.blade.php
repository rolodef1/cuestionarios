@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('users.create') }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Usuario</div>
  <div class="card-body">
    {!!Form::open(['route'=>'users.store'])!!}
    @include('users.partials.form')
    {!!Form::close()!!}
  </div>
</div>
@endsection
