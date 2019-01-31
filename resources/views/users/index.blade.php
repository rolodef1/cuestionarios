@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('users.index') }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    Usuarios
    @can('users.create')
    <a href="{{route('users.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
    @endcan
  </div>
  <div class="card-body table-responsive">
    <table id="users" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Roles</th>
          <th width="10px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{implode(',',$user->roles->pluck('name')->toArray())}}</td>
          <td width="10px">
            <div class="dropdown">
              <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acciones
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @can('users.show')
                <a href="{{route('users.show',$user->id)}}" class="dropdown-item">Ver</a>
                @endcan
                @can('users.edit')
                <a href="{{route('users.edit',$user->id)}}" class="dropdown-item">Editar</a>
                @endcan
                @can('users.destroy')
                {!! Form::open(['route'=>['users.destroy',$user->id],'method'=>'delete']) !!}
                <button class="dropdown-item">Eliminar</button>
                {!! Form::close() !!}
                @endcan
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$users->render()}}
  </div>
</div>
@endsection
