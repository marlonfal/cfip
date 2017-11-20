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
        factory(tipodegasto::class, 20)->create();
    }
}
