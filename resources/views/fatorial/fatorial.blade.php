@section('title')
Fatorial
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Calculadora de Fatorial</h2>
    
    <div class="card p-4 mb-4">
        <form id="fatorialForm">
            <div class="input-group">
                <input type="number" 
                       class="form-control"
                       placeholder="Digite um número (ex: 5)"
                       name="number"
                       min="0"
                       
                       required>
                <button type="submit" class="btn btn-primary">
                    Calcular!
                </button>
            </div>
        </form>
    </div>

    <div id="result" class="alert alert-success" style="display: block;color: #fff;"></div>
</div>

<script>
document.getElementById('fatorialForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData(e.target);
    const response = await fetch('/api/fatorial', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': token
        },
        body: new URLSearchParams(formData)
    });
    
    const data = await response.json();
    const resultDiv = document.getElementById('result');
    resultDiv.style.display = 'block';  
    resultDiv.innerHTML = `
    ${data.factorial === 'Número muito grande' 
        ? `<span class="text-danger">${data.number}! é muito grande para ser calculado</span>` 
        : `<strong>${data.number}! = ${data.factorial.toLocaleString()}</strong>`}
`;
});
</script>
@endsection