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
         $this->call(FacturaTableSeeder::class);
         $this->call(tipodegastosTableSedeer::class);
         $this->call(RetroalimetacionsTableSeeder::class);
    }
}
