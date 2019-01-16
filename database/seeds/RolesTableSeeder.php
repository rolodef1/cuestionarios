<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create([
        'name'=>'Administrador',
        'slug'=>'admin',
        'description'=>'Administrador del sistema',
        'special'=>'all-access'
      ]);
      Role::create([
        'name'=>'Profesor',
        'slug'=>'profesor',
        'description'=>'Profesor',
      ]);
      Role::create([
        'name'=>'Estudiante',
        'slug'=>'estudiante',
        'description'=>'Administrador del sistema',
      ]);
    }
}
