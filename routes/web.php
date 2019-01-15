<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas
Route::middleware(['auth'])->group(function(){
  //roles
  Route::post('roles/store','RoleController@store')->name('roles.store')
  ->middleware('permission:roles.create');

  Route::get('roles','RoleController@index')->name('roles.index')
  ->middleware('permission:roles.index');

  Route::get('roles/create','RoleController@create')->name('roles.create')
  ->middleware('permission:roles.create');

  Route::put('roles/{role}','RoleController@update')->name('roles.update')
  ->middleware('permission:roles.edit');

  Route::get('roles/{role}','RoleController@show')->name('roles.show')
  ->middleware('permission:roles.show');

  Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
  ->middleware('permission:roles.destroy');

  Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
  ->middleware('permission:roles.edit');

  //asignaturas
  Route::post('asignaturas/store','AsignaturaController@store')->name('asignaturas.store')
  ->middleware('permission:asignaturas.create');

  Route::get('asignaturas','AsignaturaController@index')->name('asignaturas.index')
  ->middleware('permission:asignaturas.index');

  Route::get('asignaturas/create','AsignaturaController@create')->name('asignaturas.create')
  ->middleware('permission:asignaturas.create');

  Route::put('asignaturas/{asignatura}','AsignaturaController@update')->name('asignaturas.update')
  ->middleware('permission:asignaturas.edit');

  Route::get('asignaturas/{asignatura}','AsignaturaController@show')->name('asignaturas.show')
  ->middleware('permission:asignaturas.show');

  Route::delete('asignaturas/{asignatura}','AsignaturaController@destroy')->name('asignaturas.destroy')
  ->middleware('permission:asignaturas.destroy');

  Route::get('asignaturas/{asignatura}/edit','AsignaturaController@edit')->name('asignaturas.edit')
  ->middleware('permission:asignaturas.edit');

  //usuarios
  Route::get('users','UserController@index')->name('users.index')
  ->middleware('permission:users.index');

  Route::put('users/{user}','UserController@update')->name('users.update')
  ->middleware('permission:users.edit');

  Route::get('users/{user}','UserController@show')->name('users.show')
  ->middleware('permission:users.show');

  Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
  ->middleware('permission:users.destroy');

  Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
  ->middleware('permission:users.edit');
});
