<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function __construct(){
    $this->middleware('permission:users.create')->only(['create','store']);
    $this->middleware('permission:users.index')->only('index');
    $this->middleware('permission:users.edit')->only(['edit','update']);
    $this->middleware('permission:users.show')->only('show');
    $this->middleware('permission:users.destroy')->only('destroy');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users = User::paginate();

    return view('users.index',compact('users'));
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function show(User $user)
  {
    return view('users.show',compact('user'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function edit(User $user)
  {
    $roles = Role::get();
    return view('users.edit',compact('user','roles'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, User $user)
  {
    $user->update($request->all());
    $user->roles()->sync($request->get('roles'));
    return redirect()->route('users.edit',$user->id)->with('info','Usuario actualizado con exito');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function destroy(User $user)
  {
    $user->delete();

    return back()->with('info','Eliminado con exito');
  }
}
