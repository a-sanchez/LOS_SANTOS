<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("categoria");
            $table->string("nombre");
            $table->decimal('precio',12,2);
            $table->decimal('inventario',12,2);
            $table->string('imagen',500)->nullable();
            /**DATOS ARTE*/
            $table->string('descripcion_arte')->nullable();
            $table->string('obra')->nullable();
            $table->string('autor')->nullable();
            $table->string("medidas")->nullable();
            $table->string("material_arte")->nullable();
            /** RELOJES*/
            $table->string("modelo_reloj")->nullable();
            $table->string("correa")->nullable();
            /** ROPA*/
            $table->string("modelo_ropa")->nullable();
            $table->string("color")->nullable();
            /**JOYERIA */
            $table->string("modelo_joyeria")->nullable();
            $table->string("material_joyeria")->nullable();
            /**VUELOS */
            $table->string("descripcion_vuelos")->nullable();
            $table->date("fecha_inicio")->nullable();
            $table->date("fecha_final")->nullable();
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
        Schema::dropIfExists('productos');
    }
}
