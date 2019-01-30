<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Cuestionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PreguntaRequest;

class PreguntaController extends Controller
{

  public function __construct(){
    $this->middleware('permission:preguntas.create')->only(['create','store']);
    $this->middleware('permission:preguntas.index')->only('index');
    $this->middleware('permission:preguntas.edit')->only(['edit','update']);
    $this->middleware('permission:preguntas.show')->only('show');
    $this->middleware('permission:preguntas.destroy')->only('destroy');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Cuestionario $cuestionario)
  {
    $preguntas = $cuestionario->preguntas()->paginate();

    return view('preguntas.index',compact('cuestionario','preguntas'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Cuestionario $cuestionario)
  {
    return view('preguntas.create',compact('cuestionario'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(PreguntaRequest $request,Cuestionario $cuestionario)
  {
    $atributos = $request->all();
    $atributos['cuestionario_id']=$cuestionario->id;
    $pregunta = Pregunta::create($atributos);
    return redirect()->route('preguntas.edit',[$cuestionario->id,$pregunta->id])->with('info','Pregunta creado con exito');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Pregunta  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function show(Cuestionario $cuestionario,Pregunta $pregunta)
  {
    return view('preguntas.show',compact('cuestionario','pregunta'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Pregunta  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function edit(Cuestionario $cuestionario,Pregunta $pregunta)
  {
    return view('preguntas.edit',compact('cuestionario','pregunta'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Pregunta  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function update(PreguntaRequest $request, Cuestionario $cuestionario, Pregunta $pregunta)
  {
    $pregunta->update($request->all());
    return redirect()->route('preguntas.edit',[$cuestionario->id,$pregunta->id])->with('info','Pregunta actualizada con exito');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Pregunta  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function destroy(Cuestionario $cuestionario, Pregunta $pregunta)
  {
    $pregunta->delete();

    return back()->with('info','Eliminado con exito');
  }
}
