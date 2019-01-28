<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionSolucion extends Model
{
  protected $table = 'opciones_soluciones';
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'opcion',
    'resp_correcta',
    'resp_elegida',
    'pregunta_id'
  ];

  public function pregunta()
  {
    return $this->belongsTo('App\PreguntaSolucion','pregunta_id');
  }
}
