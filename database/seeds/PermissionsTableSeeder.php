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
      'name'=>'Ver detalle de asignatura',
      'slug'=>'asignaturas.show',
      'description'=>'Ver en detalle cada asignatura del sistema',
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
  }
}
