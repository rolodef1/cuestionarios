@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('users.edit', $user) }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Usuario</div>
  <div class="card-body">
    {!!Form::model($user,['route'=>['users.update',$user->id],'method'=>'put'])!!}
    @include('users.partials.form')
    {!!Form::close()!!}
  </div>
</div>
@endsection
