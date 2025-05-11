@extends('layouts.app')
@section('title')
Soma de Múltiplos de 3 ou 5
@endsection

@section('content')
<div class="container">
    <h2 class="mb-4">Soma de Múltiplos de 3 ou 5</h2>
    
    <div class="card p-4 mb-4">
        <form id="sumForm">
            <div class="input-group">
                <input type="number" 
                       class="form-control"
                       placeholder="Digite o limite (ex: 10)"
                       name="limit"
                       min="0"
                       required>
                <button type="submit" class="btn btn-primary">
                    Calcular
                </button>
            </div>
        </form>
    </div>

    <div id="result" class="alert alert-success" style="display:none;color:#fff"></div>
</div>

<script>
document.getElementById('sumForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData(e.target);
    const response = await fetch('/api/somamultiplos', {
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
        Soma dos múltiplos de 3 ou 5 abaixo de <strong>${data.limit}</strong>: 
        <span class="h4">${data.sum.toLocaleString()}</span>
    `;
});
</script>
@endsection