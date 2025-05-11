@section('title')
Algoritimo - Bubble Sort
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Bubble Sort</h2>
    
    <div class="card p-4 mb-4">
        <form id="sortForm">
            <div class="input-group">
                <input type="text" 
                       class="form-control"
                       placeholder="Ex: 5,3,2,4,7,1,0,6"
                       name="numbers"
                       required>
                <button type="submit" class="btn btn-primary">
                    Ordenar!
                </button>
            </div>
        </form>
    </div>

    <div id="visualization" class="d-flex flex-wrap gap-2"></div>
</div>

<script>
document.getElementById('sortForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData(e.target);
    const response = await fetch('/api/bubble', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': token   
        },
        body: new URLSearchParams(formData)
    });
    
    const { steps } = await response.json();
    visualizeSteps(steps);
});

function visualizeSteps(steps) {
    const container = document.getElementById('visualization');
    container.innerHTML = '';
    
    let delay = 0;
    
    steps.forEach((step, index) => {
        setTimeout(() => {
            container.innerHTML = `
                <div class="step-card p-3 bg-white shadow-sm rounded">
                    <h5 class="text-muted">Passo ${index + 1}</h5>
                    <div class="d-flex gap-2">
                        ${step.array.map((num, i) => `
                            <div class="number-box 
                                ${step.comparing?.includes(i) ? 'comparing' : ''}
                                ${step.swapped?.includes(i) ? 'swapped' : ''}
                            ">
                                ${num}
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;
        }, delay += 500); // Atraso animado
    });
}
</script>

<style>
.number-box {
    width: 50px;
    height: 50px;
    border: 2px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    transition: all 0.3s;
}

.comparing {
    border-color: #ffc107!important;
    background: #fff3cd;
}

.swapped {
    border-color: #0d6efd!important;
    background: #cfe2ff;
}

.step-card {
    margin-bottom: 1rem;
    width: 100%;
}
</style>
@endsection