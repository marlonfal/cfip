<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_detalle');
            $table->integer('peso_kilo');
            $table->integer('precio');
            $table->integer('cantidad');
            $table->integer('id_compra')->unsigned();
            $table->integer('id_tipo_producto')->unsigned();
            $table->foreign('id_tipo_producto')->references('id')->on('productos');
            $table->foreign('id_compra')->references('id')->on('compras');
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
        Schema::dropIfExists('detalle_compras');
    }
}
