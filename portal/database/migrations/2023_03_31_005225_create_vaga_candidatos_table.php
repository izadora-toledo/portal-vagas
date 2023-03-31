<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagaCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas_candidatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vaga_id');
            $table->unsignedBigInteger('candidato_id');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->timestamps();
            
            $table->foreign('vaga_id')
                ->references('id')->on('vagas')
                ->onDelete('cascade');

            $table->foreign('candidato_id')
                ->references('id')->on('candidatos')
                ->onDelete('cascade');
                
            $table->foreign('usuario_id')
                ->references('id')->on('usuarios')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaga_candidatos');
    }
}
