<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tinnova Challenge - Aurelio Miguel</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .task-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #2c3e50, #3498db);
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark gradient-bg mb-5">
        <div class="container">
            <a class="navbar-brand" href="/">
                <h1 class="display-5">
                    <i class="bi bi-code-slash"></i>
                    Tinnova Challenge
                </h1>
                <small class="text-white-50">by Aurelio Miguel</small>
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row g-4">
            <!-- Task 1 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 task-card shadow">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-pie-chart-fill text-primary"></i>
                            Cálculo de Votos
                        </h5>
                        <p class="card-text">Calcule percentuais de votos válidos com gráfico interativo.</p>
                        <a href="/eleicao" class="btn btn-primary">
                            Acessar <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Task 2 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 task-card shadow">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-sort-numeric-down text-success"></i>
                            Bubble Sort
                        </h5>
                        <p class="card-text">Visualize o passo a passo do algoritmo de ordenação.</p>
                        <a href="/bubble" class="btn btn-success">
                            Experimentar <i class="bi bi-arrow-repeat"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Task 3 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 task-card shadow">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-calculator-fill text-danger"></i>
                            Cálculo Fatorial
                        </h5>
                        <p class="card-text">Calcule o fatorial de qualquer número inteiro positivo.</p>
                        <a href="/fatorial" class="btn btn-danger">
                            Calcular <i class="bi bi-exclamation-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Task 4 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 task-card shadow">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-plus-slash-minus text-warning"></i>
                            Soma de Múltiplos
                        </h5>
                        <p class="card-text">Some todos os múltiplos de 3 ou 5 abaixo de um limite.</p>
                        <a href="/somamultiplos" class="btn btn-warning text-white">
                            Somar <i class="bi bi-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Task 5 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 task-card shadow">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-car-front-fill text-info"></i>
                            Cadastro de Veículos
                        </h5>
                        <p class="card-text">Gerencie veículos com CRUD completo e relatórios.</p>
                        <a href="/veiculos" class="btn btn-info text-white">
                            Gerenciar <i class="bi bi-gear"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-5 py-4 text-center text-muted">
            <small>
                Desenvolvido com Laravel e Bootstrap
                <i class="bi bi-cup-hot-fill"></i>
            </small>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>