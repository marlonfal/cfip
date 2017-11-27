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
            'nombre_producto' => 'Pernil',
            'precio_por_gramo' => 6.28,
            'imagen' => 'muslo.jpg',
            'cantidad' => 20,
            'gramos' => 20000,
        ]);
             
        DB::table('productos')->insert([
            'nombre_producto' => 'Alas',
            'precio_por_gramo' => 5,
            'imagen' => 'ala.jpg',
            'cantidad' => 18,
            'gramos' => 18000,
        ]);

        DB::table('productos')->insert([
            'nombre_producto' => 'Pechuga',
            'precio_por_gramo' => 10,
            'imagen' => 'pechuga.jpg',
            'cantidad' => 13,
            'gramos' => 12567,
        ]);

        DB::table('productos')->insert([
            'nombre_producto' => 'Pollo Entero',
            'precio_por_gramo' => 8,
            'imagen' => "polloentero.png",
            'cantidad' => 17,
            'gramos' => 12456,
        ]);

        DB::table('productos')->insert([
            'nombre_producto' => 'Visceras',
            'precio_por_gramo' => 5,
            'imagen' => 'visceras.jpg',
            'cantidad' => 20,
            'gramos' => 20000,
        ]);

        DB::table('productos')->insert([
            'nombre_producto' => 'Corazones',
            'precio_por_gramo' => 6,
            'imagen' => 'corazones.jpg',
            'cantidad' => 18,
            'gramos' => 34890,
        ]);

        DB::table('productos')->insert([
            'nombre_producto' => 'Rabadilla',
            'precio_por_gramo' => 6,
            'imagen' => 'rabadilla.jpg',
            'cantidad' => 4,
            'gramos' => 5000,
        ]);
    }
}
