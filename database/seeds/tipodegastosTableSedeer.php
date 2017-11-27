<?php

use Illuminate\Database\Seeder;
use App\tipodegasto;

class tipodegastosTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipodegastos')->insert([
            'nombre_tipo_gasto' => 'Papeleria',
            'descripcion' => 'Talonarios',
        ]);

        DB::table('tipodegastos')->insert([
            'nombre_tipo_gasto' => 'Cafeteria',
            'descripcion' => 'Alimentacion',
        ]);

        DB::table('tipodegastos')->insert([
            'nombre_tipo_gasto' => 'Servicios',
            'descripcion' => 'Energia, Agua, internet',
        ]);
    }
}
