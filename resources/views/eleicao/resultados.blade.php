@section('title')
    Eleição - Resultados
@endsection

@extends('layouts.app')

@section('content')
<style>
    .chart-container {
        max-width: 600px;
        margin: 2rem auto;
        padding: 20px;
        background: #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>

<div class="chart-container">
    <h3 class="text-center mb-4">Resultados da Eleição</h3>
    <canvas id="eleicaoChart"></canvas>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/eleicao')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('eleicaoChart').getContext('2d');
                
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Válidos', 'Brancos', 'Nulos'],
                        datasets: [{
                            data: [data.validos, data.brancos, data.nulos],
                            backgroundColor: [
                                '#4CAF50', // Verde
                                '#FFC107', // Amarelo
                                '#F44336'  // Vermelho
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { position: 'top' },
                            tooltip: {
                                callbacks: {
                                    label: (context) => 
                                        `${context.label}: ${context.raw.toFixed(1)}%`
                                }
                            }
                        }
                    }
                });
            });
    });
</script>

@endsection