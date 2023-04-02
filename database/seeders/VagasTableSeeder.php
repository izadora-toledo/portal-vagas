<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vaga;

class VagasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vaga::create([
            'titulo' => 'Desenvolvedor Web',
            'descricao' => 'Vaga para desenvolvedor web full stack',
            'empresa' => 'Empresa A',
            'localizacao' => 'São Paulo',
            'tipo_contratacao' => 'Freelancer',
            'salario' => 5000.00,
            'status' => 'encerrado',
        ]);

        Vaga::create([
            'titulo' => 'Analista de Dados',
            'descricao' => 'Vaga para analista de dados sênior',
            'empresa' => 'Empresa B',
            'localizacao' => 'Rio de Janeiro',
            'tipo_contratacao' => 'PJ',
            'salario' => 8000.00,
            'status' => 'ativo',
        ]);

        Vaga::create([
            'titulo' => 'Designer Gráfico',
            'descricao' => 'Vaga para designer gráfico pleno',
            'empresa' => 'Empresa C',
            'localizacao' => 'Belo Horizonte',
            'tipo_contratacao' => 'CLT',
            'salario' => 4500.00,
            'status' => 'ativo',
        ]);

        Vaga::create([
            'titulo' => 'Analista de Dados',
            'descricao' => 'Análise e interpretação de dados para tomada de decisões',
            'empresa' => 'Empresa ABC',
            'localizacao' => 'Rio de Janeiro',
            'tipo_contratacao' => 'CLT',
            'salario' => 8000.00,           
            'status' => 'encerrado',
        ]);

        Vaga::create([
            'titulo' => 'Desenvolvedor Front-end',
            'descricao' => 'Desenvolvimento de interfaces web utilizando HTML, CSS e JavaScript',
            'empresa' => 'Empresa XYZ',
            'localizacao' => 'Belo Horizonte',
            'tipo_contratacao' => 'PJ',
            'salario' => 6000.00,         
            'status' => 'pausado',
        ]);
    }
}
