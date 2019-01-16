<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $user = new User();
    $user->name = 'Administrador';
    $user->email = 'admin@admin.com';
    $user->email_verified_at = now();
    $user->password = Hash::make('admin');
    $user->remember_token = str_random(10);
    if($user->save()){
      $role = Role::where('slug','admin')->first();
      $user->roles()->attach($role->id);
    }
    factory(App\User::class,20)->create();
  }
}
