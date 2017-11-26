<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(ProductosTableSeeder::class);
         $this->call(FacturaTableSeeder::class);
         $this->call(tipodegastosTableSedeer::class);
         $this->call(RetroalimetacionsTableSeeder::class);

        DB::table('productos')->insert([
            'nombre_producto' => 'Pernil',
            'precio_por_gramo' => 6.28,
            'imagen' => 'muslo.png',
        ]);
             
        DB::table('productos')->insert([
            'nombre_producto' => 'Alas',
            'precio_por_gramo' => 5,
            'imagen' => 'ala.png',
        ]);

        DB::table('productos')->insert([
            'nombre_producto' => 'Pechuga',
            'precio_por_gramo' => 10,
            'imagen' => 'pechuga.png',
        ]);

        DB::table('productos')->insert([
            'nombre_producto' => 'Muslos',
            'precio_por_gramo' => 9,
            'imagen' => 'muslo.png',
        ]);

        DB::table('productos')->insert([
            'nombre_producto' => 'Pollo Entero',
            'precio_por_gramo' => 8,
            'imagen' => "polloentero.png",
        ]);
        DB::table('productos')->insert([
            'nombre_producto' => 'Visceras',
            'precio_por_gramo' => 5,
            'imagen' => 'default.png',
        ]);
        DB::table('productos')->insert([
            'nombre_producto' => 'Corazones',
            'precio_por_gramo' => 6,
            'imagen' => 'default.png',
        ]);

        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador',
        ]);

        DB::table('users')->insert([
            'name' => 'Marlon Adarme',
            'email' => 'test@test.com',
            'password' => bcrypt('del1al9'),
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
