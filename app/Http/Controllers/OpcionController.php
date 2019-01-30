<?php

namespace App\Http\Controllers;

use App\Opcion;
use App\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OpcionRequest;

class OpcionController extends Controller
{

  public function __construct(){
    $this->middleware('permission:opciones.create')->only(['create','store']);
    $this->middleware('permission:opciones.index')->only('index');
    $this->middleware('permission:opciones.edit')->only(['edit','update']);
    $this->middleware('permission:opciones.show')->only('show');
    $this->middleware('permission:opciones.destroy')->only('destroy');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Pregunta $pregunta)
  {
    $opciones = $pregunta->opciones()->paginate();

    return view('opciones.index',compact('pregunta','opciones'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Pregunta $pregunta)
  {
    $resp_correcta_seleccionada = 0;
    if($pregunta->tipo=='seleccion_unica'){
      foreach ($pregunta->opciones as $opcion_pregunta) {
        if($opcion_pregunta->resp_correcta){
          $resp_correcta_seleccionada = 1;
        }
      }
    }
    return view('opciones.create',compact('pregunta','resp_correcta_seleccionada'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(OpcionRequest $request,Pregunta $pregunta)
  {
    $atributos = $request->all();
    $atributos['pregunta_id']=$pregunta->id;
    $opcion = Opcion::create($atributos);
    return redirect()->route('opciones.edit',[$pregunta->id,$opcion->id])->with('info','Opcion creada con exito');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Pregunta  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function show(Pregunta $pregunta, $opcion)
  {
    $opcion = Opcion::findOrFail($opcion);
    return view('opciones.show',compact('pregunta','opcion'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Pregunta  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function edit(Pregunta $pregunta, $opcion)
  {
    $opcion = Opcion::findOrFail($opcion);
    $resp_correcta_seleccionada = 0;
    if($pregunta->tipo=='seleccion_unica' && !$opcion->resp_correcta){
      foreach ($pregunta->opciones as $opcion_pregunta) {
        if($opcion_pregunta->resp_correcta){
          $resp_correcta_seleccionada = 1;
        }
      }
    }
    return view('opciones.edit',compact('pregunta','opcion','resp_correcta_seleccionada'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Pregunta  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function update(OpcionRequest $request, Pregunta $pregunta, $opcion)
  {
    $opcion = Opcion::findOrFail($opcion);
    $opcion->update($request->all());
    return redirect()->route('opciones.edit',[$pregunta->id,$opcion->id])->with('info','Opcion actualizada con exito');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Pregunta  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function destroy(Pregunta $pregunta, $opcion)
  {
    $opcion = Opcion::findOrFail($opcion);
    $opcion->delete();
    return back()->with('info','Eliminado con exito');
  }
}
