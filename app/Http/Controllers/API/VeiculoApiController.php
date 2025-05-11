<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoApiController extends Controller
{
    public function index(Request $request)
    {
        return Veiculo::when($request->marca, fn($q) => $q->where('marca', $request->marca))
            ->when($request->ano, fn($q) => $q->where('ano', $request->ano))
            ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'veiculo' => 'required',
            'marca' => 'required|in:' . implode(',', Veiculo::marcasValidas()),
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'descricao' => 'required',
            'vendido' => 'sometimes|boolean'
        ]);

        $veiculo = Veiculo::create($request->all());
        $veiculo->refresh(); // <--- Adicione esta linha
        return $veiculo;    
    }

    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return response()->noContent();
    }

    // app/Http/Controllers/API/VeiculoController.php
    public function update(Request $request, Veiculo $veiculo)
    {
        $request->validate([
            'veiculo' => 'sometimes|required',
            'marca' => 'sometimes|in:' . implode(',', Veiculo::marcasValidas()),
            'ano' => 'sometimes|integer|min:1900|max:' . (date('Y') + 1),
            'descricao' => 'sometimes|required',
            'vendido' => 'sometimes|boolean'
        ]);

        $veiculo->update($request->all());
        return $veiculo;
    }

    public function show(Veiculo $veiculo)
    {
        return $veiculo;
    }

    // Métodos dos relatórios
    public function naoVendidos()
    {
        return ['count' => Veiculo::where('vendido', false)->count()];
    }

    public function porDecada()
    {
        return Veiculo::selectRaw('FLOOR(ano/10)*10 as decada, COUNT(*) as total')
            ->groupBy('decada')
            ->orderBy('decada')
            ->get();
    }

    public function ultimaSemana()
    {
        return Veiculo::where('created_at', '>=', now()->subWeek())
            ->get();
    }
}
