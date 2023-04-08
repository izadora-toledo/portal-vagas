<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VagaController;

Route::get('/', function () {
    return view('home.welcome');
});

// Rota padrão
Route::get('/welcome', function () {
    return view('home.welcome');
});

// Rotas de autenticação
Auth::routes();

// Redirecionar o usuário para a tela welcome.blade.php depois de fazer login
Route::get('/home', function () {
    return view('home.welcome');
})->name('home')->middleware('auth');

// Rotas do usuário
Route::group(['middleware' => ['auth']], function () {
    // Rotas para exibição e edição do usuário
    Route::resource('users', UserController::class);
    Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update', [UserController::class, 'update'])->name('user.update');    
    // Rota para deletar usuário
    Route::delete('/users', [UserController::class, 'destroy'])->name('user.delete'); 
});

// Rotas de registro de usuário
Route::get('/register', function () {
    return view('auth.users.register');
})->name('register');

Route::post('/register', [UserController::class, 'register']);

// Rotas de login e logout
Route::get('/login', function () {
    return view('auth.users.login');
})->name('login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Rotas de vagas
Route::get('/vagas', [VagaController::class, 'index'])->name('vagas.index');
Route::get('/vagas/{id}', [VagaController::class, 'show'])->name('vagas.show');

// Rotas de vagas que exigem autenticação
Route::middleware('auth')->group(function () {
    // Rotas para criar, editar, exibir e atualizar vagas
    Route::get('/vagas/create', [VagaController::class, 'create'])->name('vagas.create');
    Route::post('/vagas', [VagaController::class, 'store'])->name('vagas.store');
    Route::get('/vagas/{id}/edit', [VagaController::class, 'edit'])->name('vagas.edit');
    Route::patch('/vagas/{id}', [VagaController::class, 'update'])->name('vagas.update');
    Route::delete('/vagas/{id}', [VagaController::class, 'destroy'])->name('vagas.destroy');
    // Rotas para candidatura, pausar e ativar vagas
    Route::post('/vagas/{id}/toggle-candidatura', [VagaController::class, 'toggleCandidatura'])->name('vagas.toggle-candidatura');
    Route::post('/vagas/{id}/pausar', [VagaController::class, 'pausar'])->name('vagas.pausar');
    Route::post('/vagas/{id}/ativar', [VagaController::class, 'ativar'])->name('vagas.ativar');    
    // Rota para atualizar o status da vaga
    Route::post('/atualizar-status', [VagaController::class, 'atualizarStatus']);
});


























