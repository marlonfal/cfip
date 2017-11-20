<?php

use Illuminate\Database\Seeder;
use App\Factura;

class FacturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Factura::class, 20)->create();
    }
}
