@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('roles.index') }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    Roles
    @can('roles.create')
    <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
    @endcan
  </div>

  <div class="card-body table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th colspan="3">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $role)
        <tr>
          <td>{{$role->id}}</td>
          <td>{{$role->name}}</td>
          <td width="10px">
            @can('roles.show')
            <a href="{{route('roles.show',$role->id)}}" class="btn btn-sm btn-default">Ver</a>
            @endcan
          </td>
          <td width="10px">
            @can('roles.edit')
            <a href="{{route('roles.edit',$role->id)}}" class="btn btn-sm btn-default">Editar</a>
            @endcan
          </td>
          @if($role->slug!='admin' && $role->slug!='profesor' && $role->slug!='estudiante')
          <td width="10px">
            @can('roles.destroy')
            {!! Form::open(['route'=>['roles.destroy',$role->id],'method'=>'delete']) !!}
            <button class="btn btn-sm btn-danger">Eliminar</button>
            {!! Form::close() !!}
            @endcan
          </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$roles->render()}}
  </div>
</div>
@endsection
