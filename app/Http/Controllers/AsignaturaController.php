<?php

namespace App\Http\Controllers;

use App\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AsignaturaRequest;

class AsignaturaController extends Controller
{

  public function __construct(){
    $this->middleware('permission:asignaturas.create')->only(['create','store']);
    $this->middleware('permission:asignaturas.index')->only('index');
    $this->middleware('permission:asignaturas.edit')->only(['edit','update']);
    $this->middleware('permission:asignaturas.show')->only('show');
    $this->middleware('permission:asignaturas.destroy')->only('destroy');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $user = Auth::user();
    if($user->esAdministrador()){
      $asignaturas = Asignatura::paginate();
    }else{
      $asignaturas = $user->asignaturas()->paginate();
    }
    return view('asignaturas.index',compact('asignaturas'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('asignaturas.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(AsignaturaRequest $request)
  {
    $asignatura = Asignatura::create($request->all());
    return redirect()->route('asignaturas.edit',$asignatura->id)->with('info','Asignatura creada con exito');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Asignatura  $asignatura
  * @return \Illuminate\Http\Response
  */
  public function show(Asignatura $asignatura)
  {
    return view('asignaturas.show',compact('asignatura'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Asignatura  $asignatura
  * @return \Illuminate\Http\Response
  */
  public function edit(Asignatura $asignatura)
  {
    return view('asignaturas.edit',compact('asignatura'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Asignatura  $asignatura
  * @return \Illuminate\Http\Response
  */
  public function update(AsignaturaRequest $request, Asignatura $asignatura)
  {
    $asignatura->update($request->all());
    return redirect()->route('asignaturas.edit',$asignatura->id)->with('info','Asignatura actualizada con exito');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Asignatura  $asignatura
  * @return \Illuminate\Http\Response
  */
  public function destroy(Asignatura $asignatura)
  {
    $asignatura->delete();

    return back()->with('info','Eliminado con exito');
  }
}
