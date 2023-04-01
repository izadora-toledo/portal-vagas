<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Vaga;
use App\Models\Candidato;
use App\Models\VagaCandidato;

class VagaCandidatoFactory extends Factory
{
    protected $model = VagaCandidato::class;

    public function definition()
    {
        return [
            'vaga_id' => Vaga::factory(),
            'candidato_id' => Candidato::factory(),
            'user_id' => User::factory(),
        ];
    }
}
