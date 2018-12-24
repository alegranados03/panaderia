<?php

use Illuminate\Database\Seeder;

class rolDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert(['name'=>'Administrador','slug'=>'administrador','special'=>'all-access']);
      DB::table('roles')->insert(['name'=>'Empleado','slug'=>'empleado']);
      DB::table('roles')->insert(['name'=>'Cliente','slug'=>'cliente']);
    }
}
