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
            $table->string('titulo', 100);
            $table->text('descricao',500);
            $table->string('empresa',200);
            $table->string('localizacao',200);
            $table->enum('tipo_contratacao', ['Freelancer','CLT', 'PJ']);
            $table->decimal('salario', 10, 2);     
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
