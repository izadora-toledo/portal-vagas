<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vaga;
use App\Models\Candidato;
use App\Models\VagaCandidato;

class VagasCandidatosTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vagas = Vaga::all();
        $candidatos = Candidato::all();

        foreach ($vagas as $vaga) {
            foreach ($candidatos as $candidato) {
                $vagaCandidato = new VagaCandidato;
                $vagaCandidato->vaga_id = $vaga->id;
                $vagaCandidato->candidato_id = $candidato->id;
                $vagaCandidato->user_id = 1;
                $vagaCandidato->save();
            }
        }
    }
}
