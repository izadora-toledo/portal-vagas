<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->enum('tipo_contratacao', ['CLT', 'Pessoa Jurídica', 'Freelancer']);
            $table->decimal('salario', 10, 2);
            $table->dateTime('data_criacao');
            $table->dateTime('data_atualizacao')->nullable();
            $table->enum('status', ['ativo', 'pausado', 'encerrado'])->default('ativo');
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
        Schema::dropIfExists('vagas');
    }
}
