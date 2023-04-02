<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVagaCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      /* Em caso de usar o comando: php artisan migrate:reset, deixar comentado o metodo dentro da função up e down e quando 
      for usar: php artisan migrate é só remover o comentário */
    public function up()
    {
        Schema::table('vaga_candidatos', function (Blueprint $table) {
            $table->unsignedBigInteger('vaga_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('candidato_id');

            $table->foreign('vaga_id')->references('id')->on('vagas');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('candidato_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaga_candidatos', function (Blueprint $table) {
            $table->dropForeign(['vaga_id']);
            $table->dropForeign(['candidato_id']);
            $table->dropForeign(['user_id']);       
        });
    }
}
