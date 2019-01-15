<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    //Ejecuta los seeders
    $this->call(PermissionsTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(AsignaturasTableSeeder::class);
  }
}
