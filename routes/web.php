<?php

use App\Http\Controllers\ColaboradorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui estão as rotas web para o seu projeto.
|
*/

// Rota de dashboard → Breeze redireciona para cá após login
Route::get('/dashboard', function () {
    return redirect()->route('colaboradores.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rotas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    // Home → lista de colaboradores
    Route::get('/', [ColaboradorController::class, 'index'])->name('home');

    // CRUD completo → Laravel cria automaticamente todas as rotas (index, create, store, etc)
    Route::resource('colaboradores', ColaboradorController::class);
});

// Rotas de autenticação → Breeze já adiciona automaticamente
require __DIR__.'/auth.php';
