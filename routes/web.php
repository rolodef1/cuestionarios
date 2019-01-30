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
  if(Auth::check()){
    return redirect()->route('home');
  }
  return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas
Route::middleware(['auth'])->group(function(){
  //roles
  Route::resource('roles','RoleController');

  //usuarios
  Route::resource('users','UserController');

  //asignaturas
  Route::resource('asignaturas','AsignaturaController')->except(['show']);

  //cuestionarios
  Route::resource('/asignaturas/{asignatura}/cuestionarios','CuestionarioController');
  Route::get('/asignaturas/{asignatura}/cuestionarios/{cuestionario}/rendir','CuestionarioController@rendir')->name('cuestionarios.rendir');
  Route::post('/asignaturas/{asignatura}/cuestionarios/{solucion}/rendirSave','CuestionarioController@rendirSave')->name('cuestionarios.rendirSave');
  Route::get('/asignaturas/{asignatura}/cuestionarios/{solucion}/solucion','CuestionarioController@solucion')->name('cuestionarios.solucion');

  //preguntas
  Route::resource('/cuestionarios/{cuestionario}/preguntas','PreguntaController');

  //opciones
  Route::resource('/preguntas/{pregunta}/opciones','OpcionController');

});
