<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleicaoController;
use App\Http\Controllers\BubbleSortController;
use App\Http\Controllers\FatorialController;
use App\Http\Controllers\SomaMultiplosController;



Route::get('/', function () {
    return view('welcome');
});

/*
* Tarefa 1
*/
Route::get('/eleicao', [EleicaoController::class, 'view'])->name('eleicao.view');
Route::get('/api/eleicao', [EleicaoController::class, 'apiResultados'])->name('eleicao.api');



/*
* Tarefa 2
*/
Route::get('/bubble', [BubbleSortController::class, 'view'])->name('bubble.view');
Route::post('/api/bubble', [BubbleSortController::class, 'sort']);


/*
* Tarefa 3
*/
Route::get('/fatorial', [FatorialController::class, 'view'])->name('fatorial.view');
Route::post('/api/fatorial', [FatorialController::class, 'calculate'])->name('fatorial.calculate');

/*
* Tarefa 4
*/
Route::get('/somamultiplos', [SomaMultiplosController::class, 'view'])->name('somamultiplos.view');
Route::post('/api/somamultiplos', [SomaMultiplosController::class, 'calculate'])->name('somamultiplos.calculate');


