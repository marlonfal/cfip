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
         $this->call(ProductosTableSeeder::class);

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
