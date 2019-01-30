<?php

namespace App\Http\Controllers;

use App\Cuestionario;
use App\Asignatura;
use App\Solucion;
use App\PreguntaSolucion;
use App\OpcionSolucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CuestionarioRequest;

class CuestionarioController extends Controller
{

  public function __construct(){
    $this->middleware('permission:cuestionarios.create')->only(['create','store']);
    $this->middleware('permission:cuestionarios.index')->only('index');
    $this->middleware('permission:cuestionarios.edit')->only(['edit','update']);
    $this->middleware('permission:cuestionarios.show')->only('show');
    $this->middleware('permission:cuestionarios.destroy')->only('destroy');
    $this->middleware('permission:cuestionarios.rendir')->only(['rendir','rendirSave']);
    $this->middleware('permission:cuestionarios.solucion')->only('solucion');
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
    }elseif($user->esProfesor()){
      $cuestionarios = $user->cuestionarios()->paginate();
    }else{
      date_default_timezone_set('America/Guayaquil');
      $cuestionarios = $asignatura->cuestionarios()
      ->where('estado','Activo')
      ->where('fecha_limite','>=',now())->paginate();
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
  public function store(CuestionarioRequest $request,Asignatura $asignatura)
  {
    $user = Auth::user();
    $atributos = $request->all();
    $atributos['fecha_limite'] = $atributos['fecha_limite'].' '.$atributos['hora_limite'];
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
    $user = Auth::user();
    if($user->esProfesor() || $user->esAdministrador()){
      $soluciones = $cuestionario->soluciones()->where('estado','Completo')->where('mayor_nota',true)->paginate();
    }else{
      $soluciones = $cuestionario->soluciones()->where('user_id',$user->id)->where('estado','Completo')->paginate();
    }
    return view('cuestionarios.show',compact('asignatura','cuestionario','soluciones'));
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
  public function update(CuestionarioRequest $request, Asignatura $asignatura, Cuestionario $cuestionario)
  {
    $atributos = $request->all();
    $atributos['fecha_limite'] = $atributos['fecha_limite'].' '.$atributos['hora_limite'];
    $cuestionario->update($atributos);
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

  /**
  * Display the specified resource.
  *
  * @param  \App\Cuestionario  $cuestionario
  * @return \Illuminate\Http\Response
  */
  public function rendir(Asignatura $asignatura,Cuestionario $cuestionario)
  {
    if($cuestionario->intentos>$cuestionario->soluciones()->count()){
      $user = Auth::user();
      $solucion = $user->soluciones()->where('estado','En proceso')->where('cuestionario_id',$cuestionario->id)->first();
      if(!$solucion){
        $solucion = new Solucion();
        $solucion->descripcion = $cuestionario->descripcion;
        $solucion->intentos = $cuestionario->soluciones()->count() + 1;
        $solucion->fecha_limite = $cuestionario->fecha_limite;
        $solucion->fecha_asignado = $cuestionario->created_at;
        $solucion->estado = 'En proceso';
        $solucion->user_id = $user->id;
        $solucion->cuestionario_id = $cuestionario->id;
        if($solucion->save()){
          foreach ($cuestionario->preguntas as $pregunta) {
            $preguntaSolucion = new PreguntaSolucion();
            $preguntaSolucion->pregunta = $pregunta->pregunta;
            $preguntaSolucion->tipo = $pregunta->tipo;
            $preguntaSolucion->solucion_id = $solucion->id;
            if($preguntaSolucion->save()){
              foreach ($pregunta->opciones as $opcion) {
                $opcionSolucion = new OpcionSolucion();
                $opcionSolucion->opcion = $opcion->opcion;
                $opcionSolucion->resp_correcta = $opcion->resp_correcta;
                $opcionSolucion->pregunta_id = $preguntaSolucion->id;
                $opcionSolucion->save();
              }
            }
          }
        }
      }
      return view('cuestionarios.rendir',compact('asignatura','solucion'));
    }else{
      return back()->with('info_error','No es posible rendir el cuestionario ya que se ha alcanzado el numero maximo de intentos');
    }
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function rendirSave(Request $request,Asignatura $asignatura,Solucion $solucion)
  {
    foreach ($solucion->preguntas as $pregunta) {
      if(isset($request->respuestas[$pregunta->id])){
        $respuesta = $request->respuestas[$pregunta->id];
        foreach ($pregunta->opciones as $opcion) {
          if($pregunta->tipo=='seleccion_unica'){
            if($opcion->id==$respuesta){
              $opcion->resp_elegida = true;
            }else{
              $opcion->resp_elegida = false;
            }
          }
          if($pregunta->tipo=='seleccion_multiple'){
            if(in_array($opcion->id,$respuesta)){
              $opcion->resp_elegida = true;
            }else{
              $opcion->resp_elegida = false;
            }
          }
          $opcion->save();
        }
      }else{
        foreach ($pregunta->opciones as $opcion) {
          $opcion->resp_elegida = false;
          $opcion->save();
        }
      }
    }
    $nota = $this->calificarSolucion($solucion);
    $solucion->fecha_resuelto = now();
    $solucion->estado = 'Completo';
    $solucion->nota = $nota;
    $solucion->save();
    $this->validarMejorNota($solucion->cuestionario);
    return redirect()->route('cuestionarios.show',[$asignatura->id,$solucion->cuestionario_id])->with('info','El cuestionario fue rendido con exito');
  }

  public function solucion(Asignatura $asignatura,Solucion $solucion)
  {
    return view('cuestionarios.solucion',compact('asignatura','solucion'));
  }

  private function validarMejorNota(Cuestionario $cuestionario){
    $user = Auth::user();
    $soluciones = $cuestionario->soluciones()->where('user_id',$user->id)->where('estado','Completo')->orderBy('nota','DESC')->get();
    foreach ($soluciones as $key=>$solucion) {
      if($key==0){
        $solucion->mayor_nota = true;
      }else{
        $solucion->mayor_nota = false;
      }
      $solucion->save();
    }
  }

  private function calificarSolucion(Solucion $solucion){
    $maxima_nota_solucion = 100;
    $maxima_nota_pregunta = $maxima_nota_solucion/$solucion->preguntas()->count();
    $nota_solucion = 0;
    foreach ($solucion->preguntas as $pregunta) {
      $nota_pregunta = 0;
      if($pregunta->tipo=='seleccion_unica'){
        foreach ($pregunta->opciones as $opcion) {
          if($opcion->resp_correcta && $opcion->resp_elegida){
            $nota_pregunta += $maxima_nota_pregunta;
          }
        }
      }
      if($pregunta->tipo=='seleccion_multiple'){
        $nota_opcion = $maxima_nota_pregunta/$pregunta->opciones()->count();
        foreach ($pregunta->opciones as $opcion) {
          if($opcion->resp_correcta == $opcion->resp_elegida){
            $nota_pregunta += $nota_opcion;
          }
        }
      }
      $nota_solucion += $nota_pregunta;
    }
    return $nota_solucion;
  }
}
