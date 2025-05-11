<?php

namespace App\Http\Controllers;

use App\Calculos\Eleicao;

class EleicaoController extends Controller {
    public function view() {
        return view('eleicao.resultados');
    }

    public function apiResultados() {
        $eleicao = new Eleicao(1000, 800, 150, 50);
        
        return response()->json([
            'validos' => $eleicao->percentualValidos(),
            'brancos' => $eleicao->percentualBrancos(),
            'nulos' => $eleicao->percentualNulos()
        ]);
    }
}