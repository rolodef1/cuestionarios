<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
  protected $table = 'opciones';
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'opcion',
    'resp_correcta',
    'pregunta_id'
  ];

  public function pregunta()
  {
    return $this->belongsTo('App\Pregunta');
  }
}
