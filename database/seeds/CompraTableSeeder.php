<?php

use Illuminate\Database\Seeder;
use App\Compra;

class CompraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Compra::class, 150)->create();
    }
}
