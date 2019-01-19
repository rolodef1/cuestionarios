<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Carbon\Carbon;

class Cuestionario extends Model
{
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
    'estado',
    'user_id',
    'asignatura_id'
  ];

  public function formFechaLimiteAttribute($value)
  {
    return Carbon::parse($value)->format('Y-m-d');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function asignatura()
  {
    return $this->belongsTo('App\Asignatura');
  }

  public function preguntas(){
    return $this->hasMany('App\Pregunta');
  }
}
