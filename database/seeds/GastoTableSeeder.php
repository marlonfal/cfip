<?php

use App\Gasto;
use Illuminate\Database\Seeder;

class GastoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Gasto::class, 50)->create();
    }
}
