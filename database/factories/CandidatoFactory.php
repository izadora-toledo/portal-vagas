<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Candidato;

class CandidatoFactory extends Factory
{
    protected $model = Candidato::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'experiencia' => $this->faker->paragraph,
            'vaga_id' => rand(1, 20),
            'user_id' => rand(1, 10),
        ];
    }
}
