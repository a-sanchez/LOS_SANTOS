<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHistorialUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historial_usuarios', function (Blueprint $table) {
            $table->dropColumn('total')->nullable();
            $table->string('folio')->nullable();
            $table->date('fecha_comprada')->nullable();
            $table->decimal("puntos_articulo",12,2)->nullable();
            $table->integer("estatus")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
