<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'pregunta',
    'tipo',
    'cuestionario_id'
  ];

  public function cuestionario()
  {
    return $this->belongsTo('App\Cuestionario');
  }

  public function opciones(){
    return $this->hasMany('App\Opcion');
  }
}
