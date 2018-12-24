<?php

use Illuminate\Database\Seeder;

class userDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    App\User::create([
      'primerNombre' =>'administrador',
      'segundoNombre' =>'administrador',
      'primerApellido' =>'administrador',
      'segundoApellido' =>'administrador',
      'username' => 'admin',
      'direccion'=>'Panaderia',
      'email' => 'panaderia@panaderia.com',
      'password' => bcrypt('123456'),
    ]);
    DB::table('role_user')->insert(['role_id'=>'1','user_id'=>'1']);
    }
}
