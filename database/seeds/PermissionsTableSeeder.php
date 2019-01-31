<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    //Permisos de usuario por defecto
    Permission::create([
      'name'=>'Navegar usuarios',
      'slug'=>'users.index',
      'description'=>'Lista y navega todos los usuarios del sistema',
    ]);
    Permission::create([
      'name'=>'Ver detalle de usuario',
      'slug'=>'users.show',
      'description'=>'Ver en detalle cada usuario del sistema',
    ]);
    Permission::create([
      'name'=>'Creación de usuarios',
      'slug'=>'users.create',
      'description'=>'Crear un nuevo usuario en el sistema',
    ]);
    Permission::create([
      'name'=>'Edición de usuario',
      'slug'=>'users.edit',
      'description'=>'Editar cualquier dato de usuario del sistema',
    ]);
    Permission::create([
      'name'=>'Eliminar usuario',
      'slug'=>'users.destroy',
      'description'=>'Eliminar cualquier usuario del sistema',
    ]);

    //Roles
    Permission::create([
      'name'=>'Navegar roles',
      'slug'=>'roles.index',
      'description'=>'Lista y navega todos los roles del sistema',
    ]);
    Permission::create([
      'name'=>'Ver detalle de rol',
      'slug'=>'roles.show',
      'description'=>'Ver en detalle cada rol del sistema',
    ]);
    Permission::create([
      'name'=>'Creación de roles',
      'slug'=>'roles.create',
      'description'=>'Crear un nuevo rol en el sistema',
    ]);
    Permission::create([
      'name'=>'Edición de roles',
      'slug'=>'roles.edit',
      'description'=>'Editar cualquier dato de un rol del sistema',
    ]);
    Permission::create([
      'name'=>'Eliminar rol',
      'slug'=>'roles.destroy',
      'description'=>'Eliminar cualquier rol del sistema',
    ]);

    //Asignaturas
    Permission::create([
      'name'=>'Navegar asignaturas',
      'slug'=>'asignaturas.index',
      'description'=>'Lista y navega todos las asignaturas del sistema',
    ]);
    Permission::create([
      'name'=>'Creación de asignaturas',
      'slug'=>'asignaturas.create',
      'description'=>'Crear una nueva asignatura en el sistema',
    ]);
    Permission::create([
      'name'=>'Edición de asignaturas',
      'slug'=>'asignaturas.edit',
      'description'=>'Editar cualquier dato de una asignatura del sistema',
    ]);
    Permission::create([
      'name'=>'Eliminar asignatura',
      'slug'=>'asignaturas.destroy',
      'description'=>'Eliminar cualquier asignatura del sistema',
    ]);

    //Cuestionarios
    Permission::create([
      'name'=>'Navegar cuestionarios',
      'slug'=>'cuestionarios.index',
      'description'=>'Lista y navega todos los cuestionarios del sistema',
    ]);
    Permission::create([
      'name'=>'Ver detalle de cuestionario',
      'slug'=>'cuestionarios.show',
      'description'=>'Ver en detalle cada cuestionario del sistema',
    ]);
    Permission::create([
      'name'=>'Creación de cuestionarios',
      'slug'=>'cuestionarios.create',
      'description'=>'Crear un nuevo cuestionario en el sistema',
    ]);
    Permission::create([
      'name'=>'Edición de cuestionarios',
      'slug'=>'cuestionarios.edit',
      'description'=>'Editar cualquier dato de un cuestionario del sistema',
    ]);
    Permission::create([
      'name'=>'Eliminar cuestionario',
      'slug'=>'cuestionarios.destroy',
      'description'=>'Eliminar cualquier cuestionario del sistema',
    ]);
    Permission::create([
      'name'=>'Rendir cuestionarios',
      'slug'=>'cuestionarios.rendir',
      'description'=>'Rendir cualquier cuestionario del sistema',
    ]);
    Permission::create([
      'name'=>'Ver soluciones',
      'slug'=>'cuestionarios.solucion',
      'description'=>'Ver cualquier solucion del sistema',
    ]);

    //Preguntas
    Permission::create([
      'name'=>'Navegar preguntas',
      'slug'=>'preguntas.index',
      'description'=>'Lista y navega todos las preguntas del sistema',
    ]);
    Permission::create([
      'name'=>'Ver detalle de pregunta',
      'slug'=>'preguntas.show',
      'description'=>'Ver en detalle cada pregunta del sistema',
    ]);
    Permission::create([
      'name'=>'Creación de preguntas',
      'slug'=>'preguntas.create',
      'description'=>'Crear una nueva pregunta en el sistema',
    ]);
    Permission::create([
      'name'=>'Edición de preguntas',
      'slug'=>'preguntas.edit',
      'description'=>'Editar cualquier dato de una pregunta del sistema',
    ]);
    Permission::create([
      'name'=>'Eliminar pregunta',
      'slug'=>'preguntas.destroy',
      'description'=>'Eliminar cualquier pregunta del sistema',
    ]);

    //Opciones
    Permission::create([
      'name'=>'Navegar opciones',
      'slug'=>'opciones.index',
      'description'=>'Lista y navega todos las opciones del sistema',
    ]);
    Permission::create([
      'name'=>'Ver detalle de opcion',
      'slug'=>'opciones.show',
      'description'=>'Ver en detalle cada opcion del sistema',
    ]);
    Permission::create([
      'name'=>'Creación de opciones',
      'slug'=>'opciones.create',
      'description'=>'Crear una nueva opcion en el sistema',
    ]);
    Permission::create([
      'name'=>'Edición de opciones',
      'slug'=>'opciones.edit',
      'description'=>'Editar cualquier dato de una opcion del sistema',
    ]);
    Permission::create([
      'name'=>'Eliminar opcion',
      'slug'=>'opciones.destroy',
      'description'=>'Eliminar cualquier opcion del sistema',
    ]);
  }
}
