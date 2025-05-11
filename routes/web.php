<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleicaoController;


Route::get('/', function () {
    return view('welcome');
});

// Rota para a view HTML
Route::get('/eleicao', [EleicaoController::class, 'viewResultados'])->name('eleicao.view');

// Rota para a API JSON 
Route::get('/api/eleicao', [EleicaoController::class, 'apiResultados'])->name('eleicao.api');