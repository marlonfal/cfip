<?php
use App\Producto;
use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombre' => 'Pernil',
            'precioventagramo' => 6.28,
            'preciocompragramo' => 400,
            'imagen' => 'muslo.jpg',
            'cantidad' => 20,
            'gramos' => 20000,
            'activo' => 1,
        ]);
             
        DB::table('productos')->insert([
            'nombre' => 'Alas',
            'precioventagramo' => 5,
            'preciocompragramo' => 400,
            'imagen' => 'ala.jpg',
            'cantidad' => 18,
            'gramos' => 18000,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pechuga',
            'precioventagramo' => 10,
            'preciocompragramo' => 400,
            'imagen' => 'pechuga.jpg',
            'cantidad' => 13,
            'gramos' => 12567,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pollo Entero',
            'precioventagramo' => 8,
            'preciocompragramo' => 400,
            'imagen' => "polloentero.png",
            'cantidad' => 17,
            'gramos' => 12456,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Visceras',
            'precioventagramo' => 5,
            'preciocompragramo' => 400,
            'imagen' => 'visceras.jpg',
            'cantidad' => 20,
            'gramos' => 20000,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Corazones',
            'precioventagramo' => 6,
            'preciocompragramo' => 400,
            'imagen' => 'corazones.jpg',
            'cantidad' => 18,
            'gramos' => 34890,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Rabadilla',
            'precioventagramo' => 6,
            'preciocompragramo' => 400,
            'imagen' => 'rabadilla.jpg',
            'cantidad' => 4,
            'gramos' => 5000,
            'activo' => 1,
        ]);
    }
}
