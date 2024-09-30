<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonagensController;

Route::get('/', [PersonagensController::class, "MostrarHome"])->name('home');
Route::get('/cadastro-personagem', [PersonagensController::class, "MostrarCadastroPersonagem"])->name('cadastro-personagem');
Route::post('/cadastrar-personagem', [PersonagensController::class, 'CadastroPersonagem'])->name('cadastrar-personagem');
Route::get('/lista-personagem', [PersonagensController::class, "MostrarPersonagemNome"])->name('lista-personagem');
Route::get('/altera-personagem/{id}', [PersonagensController::class, "MostrarPersonagemCodigo"])->name('show-altera-personagem');
Route::delete('/apagar-personagem', [PersonagensController::class, 'Destroy'])->name('apagar-personagem');
Route::put('/altera-personagem/{id}', [PersonagensController::class, 'Update'])->name('altera-personagem');
