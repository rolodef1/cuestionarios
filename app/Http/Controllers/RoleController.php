<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{

  public function __construct(){
    $this->middleware('permission:roles.create')->only(['create','store']);
    $this->middleware('permission:roles.index')->only('index');
    $this->middleware('permission:roles.edit')->only(['edit','update']);
    $this->middleware('permission:roles.show')->only('show');
    $this->middleware('permission:roles.destroy')->only('destroy');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $roles = Role::paginate();

    return view('roles.index',compact('roles'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $permissions = Permission::get();
    return view('roles.create',compact('permissions'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(RoleRequest $request)
  {
    $role = Role::create($request->all());
    $role->permissions()->sync($request->get('permissions'));
    return redirect()->route('roles.edit',$role->id)->with('info','Rol creado con exito');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Role  $role
  * @return \Illuminate\Http\Response
  */
  public function show(Role $role)
  {
    return view('roles.show',compact('role'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Role  $role
  * @return \Illuminate\Http\Response
  */
  public function edit(Role $role)
  {
    $permissions = Permission::get();
    return view('roles.edit',compact('role','permissions'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Role  $role
  * @return \Illuminate\Http\Response
  */
  public function update(RoleRequest $request, Role $role)
  {
    $role->update($request->all());
    $role->permissions()->sync($request->get('permissions'));
    return redirect()->route('roles.edit',$role->id)->with('info','Rol actualizado con exito');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Role  $role
  * @return \Illuminate\Http\Response
  */
  public function destroy(Role $role)
  {
    $role->delete();

    return back()->with('info','Eliminado con exito');
  }
}
