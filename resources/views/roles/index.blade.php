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
          <th>Nombre</th>
          <th>Descripcion</th>
          <th width="10px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $role)
        <tr>
          <td>{{$role->name}}</td>
          <td>{{$role->description}}</td>
          <td width="10px">
            <div class="dropdown">
              <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acciones
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @can('roles.show')
                <a href="{{route('roles.show',$role->id)}}" class="dropdown-item">Ver</a>
                @endcan
                @can('roles.edit')
                <a href="{{route('roles.edit',$role->id)}}" class="dropdown-item">Editar</a>
                @endcan
                @if($role->slug!='admin' && $role->slug!='profesor' && $role->slug!='estudiante')
                @can('roles.destroy')
                {!! Form::open(['route'=>['roles.destroy',$role->id],'method'=>'delete']) !!}
                <button class="dropdown-item">Eliminar</button>
                {!! Form::close() !!}
                @endcan
                @endif
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$roles->render()}}
  </div>
</div>
@endsection
