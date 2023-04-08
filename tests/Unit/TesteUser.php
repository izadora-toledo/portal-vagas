<?php 

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class TesteUser extends TestCase
{
    use RefreshDatabase;

    /*
        Testa se a senha do usuário está sendo criptografada corretamente 
        @return void 
    */
    public function testSenhaDoUsuarioEstaCriptografada()
    {
        $user = User::factory()->create([
            'name' => 'João',
            'email' => 'joao@teste.com',
            'password' => '12345678'
        ]);

        $this->assertNotEquals('12345678', $user->password);
    }
}
