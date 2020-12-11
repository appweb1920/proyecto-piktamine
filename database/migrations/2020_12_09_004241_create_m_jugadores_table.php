<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_jugadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idTorneo');
            $table->string('Nombre');
            $table->string('Tag');
            $table->string('Sponsor');
            
            $table->foreign('idTorneo')
                ->references('id')
                ->on('m_torneos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
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
        Schema::dropIfExists('m_jugadores');
    }
}
