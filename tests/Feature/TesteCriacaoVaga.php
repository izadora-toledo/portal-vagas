<?php

namespace Tests\Feature;

use App\Models\Vaga;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class TesteCriacaoVaga extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testa a criação de uma nova vaga.
     *
     * @return void
     */
    public function testCriacaoDeVaga()
    {
        $vagaData = [
            'titulo' => 'Vaga de teste',
            'descricao' => 'Descrição da vaga de teste',
            'empresa' => 'Empresa de teste',
            'localizacao' => 'Localização de teste',
            'tipo_contratacao' => 'CLT',
            'salario' => 5000,
            'status' => 'ATIVO',
        ];

        $response = $this->post(route('vagas.store'), $vagaData);

        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect(route('vagas.index'));

        $this->assertDatabaseHas('vagas', $vagaData);
    }

    /**
     * Define as rotas utilizadas no teste.
     *
     * @return void
     */
    protected function setUpRoutes(): void
    {
        Route::resource('vagas', 'App\Http\Controllers\VagaController');
    }
    
    /**
     * Configuração do ambiente de teste.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpRoutes();
    }
}
