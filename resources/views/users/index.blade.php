@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('users.index') }}
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Usuarios
        </div>
        <div class="card-body table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Roles</th>
                <th colspan="3">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{implode(',',$user->roles->pluck('name')->toArray())}}</td>
                <td width="10px">
                  @can('users.show')
                  <a href="{{route('users.show',$user->id)}}" class="btn btn-sm btn-default">Ver</a>
                  @endcan
                </td>
                <td width="10px">
                  @can('users.edit')
                  <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-default">Editar</a>
                  @endcan
                </td>
                <td width="10px">
                  @can('users.destroy')
                  {!! Form::open(['route'=>['users.destroy',$user->id],'method'=>'delete']) !!}
                  <button class="btn btn-sm btn-danger">Eliminar</button>
                  {!! Form::close() !!}
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$users->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
