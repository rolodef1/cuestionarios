<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Carbon\Carbon;

class Solucion extends Model
{
  protected $table = 'soluciones';

  use FormAccessible;
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'descripcion',
    'intentos',
    'fecha_limite',
    'fecha_asignado',
    'fecha_resuelto',
    'nota',
    'estado',
    'user_id',
    'cuestionario_id'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function cuestionario()
  {
    return $this->belongsTo('App\Cuestionario');
  }

  public function preguntas(){
    return $this->hasMany('App\PreguntaSolucion');
  }
}
