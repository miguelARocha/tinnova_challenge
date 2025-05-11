<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sorters\BubbleSort;

class BubbleSortController extends Controller
{
    public function view()
    {
        return view('bubble.bubble');
    }

    // Método para processar a API
    public function sort(Request $request)
    {
        // Validação rigorosa
        $validated = $request->validate([
            'numbers' => 'required|string|regex:/^[\d,]+$/'
        ]);

        // Converte para array de inteiros
        $numbers = array_map(
            'intval',
            explode(',', $validated['numbers'])
        );

        return response()->json([
            'steps' => BubbleSort::sort($numbers)
        ]);
    }
}