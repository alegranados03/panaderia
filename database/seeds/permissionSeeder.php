<?php

use Illuminate\Database\Seeder;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //administrador
      DB::table('permissions')->insert([
        'name'=>'Gestionar Categoria',
        'slug'=>'gestionar_categoria',
        'description'=>'Permite hacer operaciones generales de categorias']);

      DB::table('permissions')->insert([
          'name'=>'Gestionar Producto',
          'slug'=>'gestionar_producto',
          'description'=>'Permite hacer operaciones generales de productos']);

      DB::table('permissions')->insert([
         'name'=>'Gestionar Materia Prima',
         'slug'=>'gestionar_materia',
         'description'=>'Permite hacer operaciones generales de Materia Prima']);
      DB::table('permissions')->insert([
          'name'=>'Gestionar Usuarios',
          'slug'=>'gestionar_usuarios',
          'description'=>'Permite hacer operaciones generales de usuarios']);

      DB::table('permissions')->insert([
          'name'=>'Gestionar Mesas',
          'slug'=>'gestionar_mesas',
          'description'=>'Permite hacer operaciones generales de Mesas']);

          //contador
      DB::table('permissions')->insert([
          'name'=>'Gestionar Costeo',
          'slug'=>'gestionar_costeo',
          'description'=>'Permite hacer operaciones de costeo']);

        DB::table('permissions')->insert([
          'name'=>'Gestionar Recetas',
          'slug'=>'gestionar_recetas',
          'description'=>'Permite hacer operaciones generales de recetas']);

          //empleado
       DB::table('permissions')->insert([
          'name'=>'Gestionar Ordenes',
          'slug'=>'gestionar_ordenes',
          'description'=>'Permite hacer operaciones de Ordenes']);
         //todos
       DB::table('permissions')->insert([
          'name'=>'Editar Perfil',
          'slug'=>'editar_perfil',
          'description'=>'Permite hacer operaciones de Edición de perfil']);

      DB::table('permissions')->insert([
          'name'=>'Ver Perfil',
          'slug'=>'ver_perfil',
          'description'=>'Permite ver perfil propio']);

        DB::table('permissions')->insert([
          'name'=>'Cambiar Contraseña',
          'slug'=>'cambiar_contrasena',
          'description'=>'Permite Editar contraseña propia']);


          DB::table('permission_role')->insert(['permission_id'=>'2','role_id'=>'1']);
          DB::table('permission_role')->insert(['permission_id'=>'1','role_id'=>'1']);
          DB::table('permission_role')->insert(['permission_id'=>'3','role_id'=>'1']);
          DB::table('permission_role')->insert(['permission_id'=>'4','role_id'=>'1']);
          DB::table('permission_role')->insert(['permission_id'=>'5','role_id'=>'1']);
          DB::table('permission_role')->insert(['permission_id'=>'8','role_id'=>'2']);
          DB::table('permission_role')->insert(['permission_id'=>'6','role_id'=>'3']);
          DB::table('permission_role')->insert(['permission_id'=>'7','role_id'=>'3']);
          DB::table('permission_role')->insert(['permission_id'=>'9','role_id'=>'1']);
          DB::table('permission_role')->insert(['permission_id'=>'10','role_id'=>'1']);
          DB::table('permission_role')->insert(['permission_id'=>'11','role_id'=>'1']);
          DB::table('permission_role')->insert(['permission_id'=>'9','role_id'=>'2']);
          DB::table('permission_role')->insert(['permission_id'=>'10','role_id'=>'2']);
          DB::table('permission_role')->insert(['permission_id'=>'11','role_id'=>'2']);
          DB::table('permission_role')->insert(['permission_id'=>'9','role_id'=>'3']);
          DB::table('permission_role')->insert(['permission_id'=>'10','role_id'=>'3']);
          DB::table('permission_role')->insert(['permission_id'=>'11','role_id'=>'3']);
          DB::table('permission_role')->insert(['permission_id'=>'9','role_id'=>'4']);
          DB::table('permission_role')->insert(['permission_id'=>'10','role_id'=>'4']);
          DB::table('permission_role')->insert(['permission_id'=>'11','role_id'=>'4']);
    }

}
