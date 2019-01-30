<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable
{
  use Notifiable, ShinobiTrait;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'cedula', 'telefono', 'ciudad', 'password',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function asignaturas(){
    return $this->belongsToMany('App\Asignatura');
  }

  public function cuestionarios(){
    return $this->hasMany('App\Cuestionario');
  }

  public function soluciones(){
    return $this->hasMany('App\Solucion');
  }

  public function esProfesor(){
    return $this->roles()->where('slug','profesor')->count()?true:false;
  }

  public function esAdministrador(){
    return $this->roles()->where('slug','admin')->count()?true:false;
  }

  public function esEstudiante(){
    return $this->roles()->where('slug','estudiante')->count()?true:false;
  }
}
