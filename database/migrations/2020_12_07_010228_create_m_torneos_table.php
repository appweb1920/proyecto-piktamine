<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_torneos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEvento');
            $table->string('Nombrejuego');
            $table->string('Formato');
            
            $table->foreign('idEvento')
                ->references('id')
                ->on('m_eventos')
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
        Schema::dropIfExists('m_torneos');
    }
}
