<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleFacturaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_detalle');
            $table->double('peso_kilo');
            $table->integer('precio');
            $table->integer('cantidad');
            $table->integer('id_factura')->unsigned();
            $table->integer('id_tipo_producto')->unsigned();
            $table->foreign('id_tipo_producto')->references('id')->on('productos');
            $table->foreign('id_factura')->references('id')->on('facturas');
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
        Schema::drop('detalle_factura');
    }
}
