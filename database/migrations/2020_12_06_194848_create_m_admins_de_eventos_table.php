<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAdminsDeEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_admins_de_eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idEvento');
            
            $table->foreign('idUsuario')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
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
        Schema::dropIfExists('m_admins_de_eventos');
    }
}
