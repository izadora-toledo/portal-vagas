<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVagasCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vagas_candidatos', function (Blueprint $table) {
            $table->unsignedBigInteger('vaga_id');
            $table->unsignedBigInteger('candidato_id');
            $table->unsignedBigInteger('user_id');
    
            $table->foreign('vaga_id')->references('id')->on('vagas');
            $table->foreign('candidato_id')->references('id')->on('candidatos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vagas_candidatos', function (Blueprint $table) {
            $table->dropForeign(['vaga_id']);
            $table->dropForeign(['candidato_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['vaga_id', 'candidato_id', 'user_id']);
        });
    }
}
