<?php

namespace App\Http\Controllers;

use App\Cuestionario;
use App\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuestionarioController extends Controller
{

  public function __construct(){
    $this->middleware('permission:cuestionarios.create')->only(['create','store']);
    $this->middleware('permission:cuestionarios.index')->only('index');
    $this->middleware('permission:cuestionarios.edit')->only(['edit','update']);
    $this->middleware('permission:cuestionarios.show')->only('show');
    $this->middleware('permission:cuestionarios.destroy')->only('destroy');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Asignatura $asignatura)
  {
    $user = Auth::user();
    if($user->esAdministrador()){
      $cuestionarios = Cuestionario::paginate();
    }else{
      $cuestionarios = $user->cuestionarios()->paginate();
    }
    return view('cuestionarios.index',compact('asignatura','cuestionarios'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Asignatura $asignatura)
  {
    return view('cuestionarios.create',compact('asignatura'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request,Asignatura $asignatura)
  {
    $user = Auth::user();
    $atributos = $request->all();
    $atributos['user_id']=$user->id;
    $atributos['asignatura_id']=$asignatura->id;
    //dd($atributos);
    $cuestionario = Cuestionario::create($atributos);
    return redirect()->route('cuestionarios.edit',[$asignatura->id,$cuestionario->id])->with('info','Cuestionario creado con exito');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Cuestionario  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function show(Asignatura $asignatura,Cuestionario $cuestionario)
  {
    return view('cuestionarios.show',compact('asignatura','cuestionario'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Cuestionario  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function edit(Asignatura $asignatura,Cuestionario $cuestionario)
  {
    return view('cuestionarios.edit',compact('asignatura','cuestionario'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Cuestionario  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Asignatura $asignatura, Cuestionario $cuestionario)
  {
    $cuestionario->update($request->all());
    return redirect()->route('cuestionarios.edit',[$asignatura->id,$cuestionario->id])->with('info','Cuestionario actualizado con exito');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Cuestionario  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function destroy(Asignatura $asignatura, Cuestionario $cuestionario)
  {
    $cuestionario->delete();

    return back()->with('info','Eliminado con exito');
  }
}
