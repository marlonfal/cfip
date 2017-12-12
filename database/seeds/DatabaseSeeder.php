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
        $this->call(ProductosTableSeeder::class);
         //$this->call(ProductosTableSeeder::class);
        $this->call(FacturaTableSeeder::class);
        $this->call(tipodegastosTableSedeer::class);
        $this->call(RetroalimetacionsTableSeeder::class);
        $this->call(GastoTableSeeder::class);
        $this->call(CompraTableSeeder::class);
        $this->call(PedidoTableSeeder::class);


        DB::table('users')->insert([
            'name' => 'Marlon Adarme',
            'email' => 'test@test.com',
            'password' => bcrypt('del1al9'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jhan Karlo Trejos',
            'email' => 'vendedor@test.com',
            'password' => bcrypt('del1al9'),
        ]);

        DB::table('users')->insert([
            'name' => 'Sebastián Moncada',
            'email' => 'cliente@test.com',
            'password' => bcrypt('del1al9'),
        ]);

        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador',
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'vendedor',
            'display_name' => 'Vendedor',
            'description' => 'Vendedor',
        ]);
        
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'cliente',
            'display_name' => 'Cliente',
            'description' => 'Cliente',
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2,
        ]);

        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 3,
        ]);

        DB::table('info_generals')->insert([
            'id' => 1,
            'iva' => 19,
            'telefono' => '(2) 268 26 68',
            'correo' => 'pollospaisa@gmail.com',
            'nit' => '12314566-2',
            'descuentos' => 0,
        ]);
        

        //Meses

        DB::table('meses')->insert([
            'id' => 1,
            'nombre' => 'Enero'
        ]);
        DB::table('meses')->insert([
            'id' => 2,
            'nombre' => 'Febrero'
        ]);
        DB::table('meses')->insert([
            'id' => 3,
            'nombre' => 'Marzo'
        ]);
        DB::table('meses')->insert([
            'id' => 4,
            'nombre' => 'Abril'
        ]);
        DB::table('meses')->insert([
            'id' => 5,
            'nombre' => 'Mayo'
        ]);
        DB::table('meses')->insert([
            'id' => 6,
            'nombre' => 'Junio'
        ]);
        DB::table('meses')->insert([
            'id' => 7,
            'nombre' => 'Julio'
        ]);
        DB::table('meses')->insert([
            'id' => 8,
            'nombre' => 'Agosto'
        ]);
        DB::table('meses')->insert([
            'id' => 9,
            'nombre' => 'Septiembre'
        ]);
        DB::table('meses')->insert([
            'id' => 10,
            'nombre' => 'Octubre'
        ]);
        DB::table('meses')->insert([
            'id' => 11,
            'nombre' => 'Noviembre'
        ]);
        DB::table('meses')->insert([
            'id' => 12,
            'nombre' => 'Diciembre'
        ]);
    }
}
