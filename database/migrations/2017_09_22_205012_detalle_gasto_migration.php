<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleGastoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_gasto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_gasto')->unsigned();
            $table->integer('id_detalle');
            $table->string('producto');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->foreign('id_gasto')->references('id')->on('gasto');
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
        Schema::drop('detalle_gasto');
    }
}
