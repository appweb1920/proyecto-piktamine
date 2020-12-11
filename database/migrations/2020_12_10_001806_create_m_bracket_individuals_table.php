<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMBracketIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_bracket_individuals', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('idTorneo');
            $table->unsignedBigInteger('idOp1')->default(0);;
            $table->unsignedBigInteger('idOp2')->default(0);;
            $table->tinyInteger('Res1');
            $table->tinyInteger('Res2');
            $table->tinyInteger('nRonda');
            $table->tinyInteger('Capacidad');
            
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
        Schema::dropIfExists('m_bracket_individuals');
    }
}
