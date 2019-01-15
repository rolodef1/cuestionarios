<?php

use Illuminate\Database\Seeder;

class AsignaturasTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    factory(App\Asignatura::class, 10)->create();
  }
}
