<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
/**
 *
 */
class UserSeeder extends Seeder
{

  public function run()
  {

    User::create
    ([
      'email' => 'correo@gmail.com',
      'password' => Hash::make('asdf')
    ]);
  }
}
