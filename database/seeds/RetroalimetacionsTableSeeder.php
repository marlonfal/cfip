<?php

use Illuminate\Database\Seeder;
use App\Retroalimentacion;

class RetroalimetacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Retroalimentacion::class, 20)->create();
    }
}
