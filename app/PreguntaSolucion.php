<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaSolucion extends Model
{
  protected $table = 'preguntas_soluciones';
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'pregunta',
    'tipo',
    'solucion_id'
  ];

  public function solucion()
  {
    return $this->belongsTo('App\Solucion');
  }

  public function opciones(){
    return $this->hasMany('App\OpcionSolucion','pregunta_id');
  }
}
