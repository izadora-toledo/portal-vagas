<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidato;

class CandidatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidato::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@teste.com',
            'telefone' => '(11) 99999-9999',
            'experiencia' => 'Experiência em desenvolvimento web',
            'vaga_id' => 1,
            'user_id' => 1,
        ]);

        Candidato::create([
            'nome' => 'Maria Souza',
            'email' => 'maria.souza@teste.com',
            'telefone' => '(21) 88888-8888',
            'experiencia' => 'Experiência em design gráfico',
            'vaga_id' => 2,
            'user_id' => 2,
        ]);

        Candidato::create([
            'nome' => 'Pedro Santos',
            'email' => 'pedro.santos@teste.com',
            'telefone' => '(41) 77777-7777',
            'experiencia' => 'Experiência em programação Java',
            'vaga_id' => 3,
            'user_id' => 3,
        ]);

        Candidato::create([
            'nome' => 'Ana Costa',
            'email' => 'ana.costa@teste.com',
            'telefone' => '(81) 66666-6666',
            'experiencia' => 'Experiência em marketing digital',
            'vaga_id' => 4,
            'user_id' => 4,
        ]);

        Candidato::create([
            'nome' => 'Carlos Rodrigues',
            'email' => 'carlos.rodrigues@teste.com',
            'telefone' => '(31) 55555-5555',
            'experiencia' => 'Experiência em programação Python',
            'vaga_id' => 5,
            'user_id' => 5,
        ]);
    }
}
