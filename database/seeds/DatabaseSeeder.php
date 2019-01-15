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
      $this->call(rolDefaultSeeder::class);
       $this->call(userDefault::class);
       $this->call(categoriaDefault::class);
       $this->call(MesaDefault::class);
       $this->call(productoSeeder::class);
       $this->call(permissionSeeder::class);

    }
}
