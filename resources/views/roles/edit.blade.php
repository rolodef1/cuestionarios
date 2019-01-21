@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('roles.edit', $role) }}
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Rol</div>
        <div class="card-body">
          {!!Form::model($role,['route'=>['roles.update',$role->id],'method'=>'put'])!!}
          @include('roles.partials.form')
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
