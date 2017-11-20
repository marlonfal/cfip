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
            $table->string('descripcion');
            $table->integer('numero')->unsigned();
            $table->integer('id_tipo_producto')->unsigned();
            $table->foreign('numero')->references('id')->on('gasto');
            $table->foreign('id_tipo_producto')->references('id')->on('productos');
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
