<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculos\Fatorial;

class FatorialController extends Controller {
    public function view() {
        return view('fatorial.fatorial');
    }
    public function calculate(Request $request) {
        $validated = $request->validate([
            'number' => 'required|integer|min:0' // Limita entrada para evitar overflow
        ]);

        $result = Fatorial::calculate($validated['number']);

        return response()->json([
            'number' => $validated['number'],
            'factorial' => ($result === INF) ? 'Número muito grande' : $result
        ]);
    }
}