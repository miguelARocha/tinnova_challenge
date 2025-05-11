<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleicaoController;
use App\Http\Controllers\BubbleSortController;
use App\Http\Controllers\FatorialController;
use App\Http\Controllers\SomaMultiplosController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\API\VeiculoApiController;




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

/*
* Tarefa 5
*/
Route::get('/veiculos', [VeiculoController::class, 'view'])->name('somamultiplos.view');
Route::get('/api/veiculos', [VeiculoApiController::class, 'index']);
Route::post('/api/veiculos', [VeiculoApiController::class, 'store']);
Route::get('/api/veiculos/{veiculo}', [VeiculoApiController::class, 'show']);
Route::delete('/api/veiculos/{veiculo}', [VeiculoApiController::class, 'destroy']);
Route::put('/api/veiculos/{veiculo}', [VeiculoApiController::class, 'update']);
// Rotas de relatórios
Route::get('/api/veiculos/relatorios/nao-vendidos', [VeiculoApiController::class, 'naoVendidos']);
Route::get('/api/veiculos/relatorios/por-decada', [VeiculoApiController::class, 'porDecada']);
Route::get('/api/veiculos/relatorios/ultima-semana', [VeiculoApiController::class, 'ultimaSemana']);