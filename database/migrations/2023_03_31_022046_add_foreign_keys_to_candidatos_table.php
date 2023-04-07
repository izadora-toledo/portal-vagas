<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCandidatosTable extends Migration
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
        Schema::table('candidatos', function (Blueprint $table) {
            $table->foreignId('vaga_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
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
        Schema::table('candidatos', function (Blueprint $table) {
            $table->dropForeign(['vaga_id']);
            $table->dropColumn('vaga_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');                     
        });
    }
}
