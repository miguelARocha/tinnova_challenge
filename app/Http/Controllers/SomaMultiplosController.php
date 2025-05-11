<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculos\SomaMultiplos;

class SomaMultiplosController extends Controller {
    public function view() {
        return view('somamultiplos.somamultiplos');
    }

    public function calculate(Request $request) {
        $validated = $request->validate([
            'limit' => 'required|integer|min:0'
        ]);

        return response()->json([
            'limit' => $validated['limit'],
            'sum' => SomaMultiplos::SomaMultiplos($validated['limit'])
        ]);
    }
}