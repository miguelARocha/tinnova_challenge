<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{
    public function view() {
        return view('veiculos.veiculos', [
            'marcasValidas' => Veiculo::marcasValidas()
        ]);
    }
}