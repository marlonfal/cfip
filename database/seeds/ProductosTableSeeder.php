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
            'precioventakilo' => 6300,
            'preciocomprakilo' => 5600,
            'imagen' => 'muslo.jpg',
            'cantidad' => 20,
            'gramos' => 20,
            'activo' => 1,
        ]);
             
        DB::table('productos')->insert([
            'nombre' => 'Alas',
            'precioventakilo' => 5900,
            'preciocomprakilo' => 3900,
            'imagen' => 'ala.jpg',
            'cantidad' => 18,
            'gramos' => 18,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pechuga',
            'precioventakilo' => 7000,
            'preciocomprakilo' => 6000,
            'imagen' => 'pechuga.jpg',
            'cantidad' => 13,
            'gramos' => 12,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pollo Entero',
            'precioventakilo' => 8000,
            'preciocomprakilo' => 6000,
            'imagen' => "polloentero.png",
            'cantidad' => 17,
            'gramos' => 12,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Visceras',
            'precioventakilo' => 5,
            'preciocomprakilo' => 3,
            'imagen' => 'visceras.jpg',
            'cantidad' => 20,
            'gramos' => 20000,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Corazones',
            'precioventakilo' => 6000,
            'preciocomprakilo' => 4000,
            'imagen' => 'corazones.jpg',
            'cantidad' => 18,
            'gramos' => 18,
            'activo' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Rabadilla',
            'precioventakilo' => 6000,
            'preciocomprakilo' => 5000,
            'imagen' => 'rabadilla.jpg',
            'cantidad' => 4,
            'gramos' => 5,
            'activo' => 1,
        ]);
    }
}
