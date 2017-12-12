<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GastoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasto', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('descripcion');
            $table->string('usuario');
            $table->integer('total');
            $table->integer('id_tipo_gasto')->unsigned();
            $table->string('estado');
            $table->foreign('id_tipo_gasto')->references('id')->on('tipodegastos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gasto');
    }
}
