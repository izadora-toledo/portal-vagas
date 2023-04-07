<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UserController::class);
});

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
});

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// ROTAS DE VAGAS

Route::get('/vagas', [VagaController::class, 'index'])->name('vagas.index');
Route::middleware('auth')->group(function () {
    Route::get('/vagas/create', [VagaController::class, 'create'])->name('vagas.create');
    Route::post('/vagas', [VagaController::class, 'store'])->name('vagas.store');
    Route::get('/vagas/{id}/edit', [VagaController::class, 'edit'])->name('vagas.edit');
    Route::patch('/vagas/{id}', [VagaController::class, 'update'])->name('vagas.update');
    Route::delete('/vagas/{id}', [VagasController::class, 'destroy'])->name('vagas.destroy');
    Route::post('/vagas/{id}/toggle-candidatura', [VagaController::class, 'toggleCandidatura'])->name('vagas.toggle-candidatura');
});
Route::post('/vagas/{id}/pausar', 'VagaController@pausar')->name('vagas.pausar');
Route::post('/vagas/{id}/retomar', 'VagaController@retomar')->name('vagas.retomar');

Route::get('/vagas/{id}', [VagaController::class, 'show'])->name('vagas.show');

Route::post('/atualizar-status', 'VagaController@atualizarStatus');

Route::post('/vagas/{id}/pausar', [VagaController::class, 'pausar'])->name('vagas.pausar');
Route::post('/vagas/{id}/ativar', [VagaController::class, 'ativar'])->name('vagas.ativar');




























