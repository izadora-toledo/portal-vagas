<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vaga;

class VagaFactory extends Factory
{
    protected $model = Vaga::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->jobTitle,
            'descricao' => $this->faker->text(200),
            'empresa' => $this->faker->company,
            'localizacao' => $this->faker->city,
            'tipo_contratacao' => $this->faker->randomElement(['Freelancer', 'PJ', 'CLT']),
            'salario' => $this->faker->randomFloat(2, 1000, 10000),          
            'status' => $this->faker->boolean(80),
        ];
    }
}
