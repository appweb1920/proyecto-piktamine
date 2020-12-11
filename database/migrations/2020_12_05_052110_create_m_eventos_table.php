<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('ZonaH');
            $table->date('FechaI');
            $table->tinyInteger('duracion');
            $table->unsignedBigInteger('creadopor');
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
        Schema::dropIfExists('m_eventos');
    }
}
